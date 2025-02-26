<?php
/**
 * Function that return the render
 * @param $cat String Category from this enum ["tv_cinema", "art_litterature", "musique", "actu_politique", "culture_generale", "sport", "jeux_videos", "all"]
 * @param $dif String Difficulty from this enum ["facile","normal", "difficile", "all"]
 * @param $elv Boolean Show or not a shadow around the block
 * @param $fill Boolean Fill or not the answer pill
 * @param $url Url of the API
 * 
 */

function simplequizblock_show_quiz_response($attributes, $url)
{

  // Construct and perform the API request
  $category = $attributes['category'] === 'all' ? '' : '&category=' . $attributes['category'];
  $difficulty = $attributes['difficulty'] === 'all' ? '' : '&difficulty=' . $attributes['difficulty'];
  $response = wp_remote_get($url . $category . $difficulty);
  $response = $response['body'];
  $response = json_decode($response);

  // if there isn't any corresponding quiz, just selected a random quiz from all the DB
  if($response->count == 0){
  $response = wp_remote_get($url);
  $response = $response['body'];
  $response = json_decode($response);
  }

  // Get data to display
  $question = $response->quizzes[0]->question;
  $answer = $response->quizzes[0]->answer;
  $badAnswers = $response->quizzes[0]->badAnswers;
  // create an array with good and bad answer and shuffling it
  $allAnswers = $badAnswers;
  $allAnswers[] = $answer;
  shuffle($allAnswers);
  // generate Unique Id to allow multiple quiz block on a single page
  $str=rand();
  $randomId = md5($str);

?>
    <!-- Pass the Unique ID through an hidden DIV, and attribute this ID to the main div -->
    <div class="simplequizblock-random-id" hidden><?php echo esc_html($randomId); ?></div>
  <div class="simplequizblock-container <?php echo $attributes['elevation'] ? esc_attr("simplequizblock-shadow") : null;?>" id="<?php echo esc_attr($randomId); ?>">
    <div class="simplequizblock-question">
      <?php echo esc_html($question); ?>
    </div>
    <div class="simplequizblock-answers">
      <!-- Display the answers' array -->
      <?php
      for ($i = 0; $i < sizeof($allAnswers); $i++) {
      ?>
        <div class="simplequizblock-unique-answer"><?php echo esc_html($allAnswers[$i]); ?></div>
      <?php
      }
      ?>
    </div>
    <div class="simplequizblock-result" hidden>
    <?php if($attributes['showLink']) { ?>
      <div class="simplequizblock-signature">
        <a class="simplequizblock-signature-link" href="https://quizzapi.jomoreschi.fr/" target="_blank">Proposez vos questions</a>
      </div>
    <?php
    }
    ?>
    </div>
    <!-- Pass the good Answer through an Hidden div -->
    <div class="simplequizblock-good" hidden><?php echo esc_html($answer); ?></div>
    <div class="simplequizblock-fill" hidden><?php echo esc_html($attributes['fill']); ?></div>

  </div>
<?php
}
