<?php
namespace Brickdots\AdminTodotastic\rest;

use Richdho\Utils\Service;
use Brickdots\AdminTodotastic\base\UtilsProvider;
use WP_REST_Response;
use WP_REST_Request;
use WP_User_Query;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;
use Brickdots\AdminTodotastic\Transformers\TodoTransformer;
use Brickdots\AdminTodotastic\Transformers\UserTransformer;
use Brickdots\AdminTodotastic\Models\Todo;
use Brickdots\AdminTodotastic\Models\Status;
use Jenssegers\Blade\Blade;
use Corcel\Model\User;
use Illuminate\Database\Eloquent\Builder;
use Brickdots\AdminTodotastic\Helpers\StrHelper;
use Exception;

// @codeCoverageIgnoreStart
defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Create an example REST Service.
 *
 * @codeCoverageIgnore Example implementations gets deleted the most time after plugin creation!
 */
class TodoController {
    use UtilsProvider;

    /* Manager $fractal */
    private $fractal;

    /* Blade $blade */
    private $blade;
    /**
     * C'tor.
     */
    private function __construct() {
        $this->fractal = new Manager();
        $this->blade = new Blade(__DIR__ . '/../Views/Mail', __DIR__ . '/../../cache');
        $this->blade->directive('wpescape', function ($expression) {
            return "<?php echo sanitize_text_field($expression); ?>";
        });
    }

    /**
     * Register test endpoints.
     */
    public function rest_api_init() {
        $namespace = Service::getNamespace($this);
        // Get users for mentions
        register_rest_route($namespace, '/user', [
            'methods' => 'GET',
            'callback' => [$this, 'users'],
            'permission_callback' => [$this, 'checkPermission']
        ]);
        // Get todos
        register_rest_route($namespace, '/todo', [
            'methods' => 'GET',
            'callback' => [$this, 'index'],
            'permission_callback' => [$this, 'checkPermission']
        ]);
        // Create a todo
        register_rest_route($namespace, '/todo', [
            'methods' => 'POST',
            'callback' => [$this, 'store'],
            'permission_callback' => [$this, 'checkPermission']
        ]);
        // Delete a todo
        register_rest_route($namespace, '/todo/(?P<id>\d+)', [
            'methods' => 'DELETE',
            'callback' => [$this, 'delete'],
            'permission_callback' => [$this, 'checkPermission']
        ]);
        // Update a todo
        register_rest_route($namespace, '/todo/(?P<id>\d+)', [
            'methods' => 'PUT',
            'callback' => [$this, 'update'],
            'permission_callback' => [$this, 'checkPermission']
        ]);
    }

    /**
     * Check if the user has permission to access to todotastic
     * @param WP_REST_Request $request
     * @return Boolean
     */
    public function checkPermission(WP_REST_Request $request) {
        return wp_verify_nonce($request->get_header('x_wp_nonce'), 'wp_rest');
    }

    /**
     * Get user list for mentions
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function users(WP_REST_Request $request) {
        $search_string = esc_attr(trim($request->get_param('s')));
        $users = new WP_User_Query([
            'search' => '*' . $search_string . '*',
            'role__not_in' => ['Customer'],
            'number' => 6,
            'search_columns' => ['user_login', 'display_name']
        ]);
        $users_found = $users->get_results();
        $resource = new Collection($users_found, new UserTransformer());
        return new WP_REST_Response($this->fractal->createData($resource)->toArray());
    }

    /**
     * Create a todo item
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     * @throws Exception $e
     */
    public function store(WP_REST_Request $request) {
        $entityId = $request->get_param('entity_id');
        $description = StrHelper::sanitizeMentionInput($request->get_param('description'));
        $mentions = $request->get_param('mentions');

        try {
            $todo = Todo::create([
                'description' => $description,
                'entity_id' => $entityId,
                'author_id' => get_current_user_id(),
                'position' => $this->getNewTodoPosition($entityId),
                'status_id' => 1
            ]);
            if (is_array($mentions) && !empty($mentions)) {
                $todo->mentions()->attach($mentions);
            }
        } catch (Exception $e) {
            $data['errors'][] = 'Cannot create todo item. Please check with plugin developer ' . $e->getMessage();
            return new WP_REST_Response($data, 500);
        }
        if (!empty($mentions)) {
            try {
                $users = User::whereIn('id', $mentions)->get();
                $emails = $users->pluck('user_email')->all();
                $this->sendTodoEmail($entityId, $emails, $description);
            } catch (Exception $e) {
                $errors[] = 'Item created, but no email was sent.';
            }
        }

        $resource = new Collection([$todo], new TodoTransformer($request));
        $rep = $this->fractal->createData($resource)->toArray();
        $rep['errors'] = $errors;
        return new WP_REST_Response($rep);
    }

    /**
     * Get the todo list
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     * @throws Exception $e
     */
    public function index(WP_REST_Request $request) {
        $limit = $request->get_param('limit') ?? 8000;
        $page = $request->get_param('page') ?? 1;
        try {
            $todos = $this->criteria($request)->paginate($limit, ['*'], 'page', $page);
            $resource = new Collection($todos, new TodoTransformer($request));
        } catch (Exception $e) {
            $rep['errors'][] =
                'Error accured. please contact developer with the following message: ' . $e->getMessage();
            return new WP_REST_Response($rep, 400);
        }
        $rep = $this->fractal->createData($resource)->toArray();
        $rep['currentPage'] = $todos->currentPage();
        $rep['total'] = $todos->total();
        $rep['errors'] = [];
        return new WP_REST_Response($rep);
    }

    /**
     * Criteria for filte todos
     * @param WP_REST_Request $request
     */
    private function criteria(WP_REST_Request $request) {
        $entityId = $request->get_param('entity_id');
        $isDone = $request->get_param('is_done');
        $isMineOnly = $request->get_param('is_mine_only');
        $entityType = $request->get_param('entity_type') ?? 'post';

        if (!empty($request->get_param('mentions'))) {
            $mentions = explode(',', $request->get_param('mentions')) ?? [];
        }

        if ($isMineOnly) {
            $mentions = [get_current_user_id()];
        }

        if (!empty($request->get_param('statuses'))) {
            $statuses = explode(',', $request->get_param('statuses')) ?? [];
        }

        $model = Todo::query();
        if (!empty($entityType)) {
            $model = $model->where('entity_type', $entityType);
        }

        if (!empty($entityId) || $entityId === '0') {
            $model = $model->where('entity_id', $entityId);
        }

        if (!empty($mentions)) {
            $model = $model->whereHas('mentions', function (Builder $query) use ($mentions) {
                $query->whereIn('user_id', $mentions);
            });
        }

        if (!empty($statuses) || $isDone !== null) {
            $model = $model->whereHas('status', function (Builder $query) use ($statuses, $isDone) {
                if (!empty($statuses)) {
                    $query->whereIn('label', $statuses);
                }
                if ($isDone !== null) {
                    $query->where('is_marked_as_done', $isDone);
                }
            });
        }

        return $model;
    }

    /**
     * Delete a todo item.
     * @param WP_REST_Request $data
     * @return WP_REST_Response
     * @throws Exception $e
     */
    public function delete(WP_REST_Request $data) {
        try {
            if (!Todo::where('id', $data['id'])->count() > 0) {
                throw new Exception('item not found');
            }

            Todo::where('id', $data['id'])->delete();
        } catch (Exception $e) {
            $rep['errors'][] = 'Todo item not found or has been deleted.';
            return new WP_REST_Response($rep, 404);
        }
        $rep['message'] = 'Todo id ' . $data['id'] . ' deleted.';
        return new WP_REST_Response($rep);
    }

    /**
     * Delete a todo item.
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     * @throws Exception $e
     */
    public function update(WP_REST_Request $request) {
        try {
            if (!($todo = Todo::find($request['id']))) {
                throw new Exception('item not found');
            }
            $label = $request->get_param('status')['label'];
            if ($label && ($status = Status::where('label', $label)->first())) {
                $todo->status_id = $status->id;
                $todo->save();
            }
        } catch (Exception $e) {
            $rep['errors'][] = 'Todo item not found or has been deleted.';
            return new WP_REST_Response($rep, 404);
        }

        $resource = new Collection([$todo], new TodoTransformer($request));
        $rep = $this->fractal->createData($resource)->toArray();
        $rep['errors'] = $errors;
        return new WP_REST_Response($rep);
    }

    /**
     * Get new position for new created Todo
     * @param int $entityId
     * @param string $entityType
     * @return int
     */
    public function getNewTodoPosition(int $entityId, string $entityType = 'post'): int {
        $currentMax = Todo::where('entity_type', $entityType)
            ->where('entity_id', $entityId)
            ->orderBy('position', 'desc')
            ->first();

        if (!$currentMax) {
            return 1;
        }

        return $currentMax->position + 1;
    }

    /**
     * Send email with todo information
     * @param int $entityId
     * @param array $recipients
     * @param string $description
     * @param string $entityType
     * @return null
     * @throws Exception $e
     */
    public function sendTodoEmail(int $entityId, array $recipients, string $description, string $entityType = 'post') {
        if ($entityType !== 'post') {
            return;
        }

        $currentUser = wp_get_current_user();
        $subject = $currentUser->display_name . ' mentioned you in a post todo';

        $message = $this->blade
            ->make('NewTodo', [
                'description' => $description,
                'mentionedBy' => $currentUser->display_name,
                'siteTitle' => get_bloginfo('name'),
                'entityLink' => get_edit_post_link($entityId, false)
            ])
            ->render();

        if (!wp_mail($recipients, $subject, $message)) {
            throw new Exception('Mail sent failed.');
        }
    }

    /**
     * New instance.
     */
    public static function instance() {
        return new TodoController();
    }
}
