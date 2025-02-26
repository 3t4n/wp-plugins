<?php
/*
 * Copyright © 2023 Information Aesthetics. All rights reserved.
 * This work is licensed under the GPL2, V2 license.
 */

namespace IAMG;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed

class IAMG_ImageHandler
{
    const THUMBNAIL_SIZE = 150;
    const VIDEO_THUMBNAIL_WIDTH = 160;
    const VIDEO_THUMBNAIL_HEIGHT = 90;
    const VIDEO_TUMB_WIDTHS = [
        self::VIDEO_THUMBNAIL_WIDTH,
        4 * self::VIDEO_THUMBNAIL_WIDTH,
        8 * self::VIDEO_THUMBNAIL_WIDTH,
        12 * self::VIDEO_THUMBNAIL_WIDTH,
        24 * self::VIDEO_THUMBNAIL_WIDTH
    ];
    const VIDEO_TUMB_HEIGHT = [
        self::VIDEO_THUMBNAIL_HEIGHT,
        4 * self::VIDEO_THUMBNAIL_HEIGHT,
        8 * self::VIDEO_THUMBNAIL_HEIGHT,
        12 * self::VIDEO_THUMBNAIL_HEIGHT,
        24 * self::VIDEO_THUMBNAIL_HEIGHT
    ];

    /**
     * @var array
     */
    private $images = [];
    public $videos = [];
    private $slug = IAMG_SLUG;

    function __construct($video = false)
    {
        if ($video === "none") return;

        if ($video) {
            $this->videos = $this->get_videos();
        }

        if (!$video || $video === "all") {
            $this->images = $this->get_images();
        }
    }

    /**
     * Generates a list of images for the generation of the gallery.
     * @param array $ids the ids of the images to inlude in the gallery
     * @return array of the form:
     * [
     * "sizes" => [
     *      "medium" => ["url", [width, height]] ,
     *      "large" => ["url", [width, height]],
     *      "full" => ["url", [width, height]]
     *      ]
     * "title" => $info['title'],
     * "caption" => $info['caption'],
     * "description" => $info['description'],
     * "alt" => $info['alt'],
     * "download" => original_url,
     * "thumbnail" => $sizes_info['thumbnail']
     * ];
     */
    public function get_for_gallery(&$images = null)
    {
        $image_map = [];
        $video_map = [];


        foreach ($this->images as $image) {
            $image_map[$image['id']] = $image;
        }

        foreach ($this->videos as $video) {
            $video_map[$video['id']] = $video;
        }

        if (!$images) {
            $ids = array_keys($image_map);
        } else {
            $ids = $images;
        }


        $result = [];
        foreach ($ids as $i => $id) {
            $data = null;
            $video = null;
            if (is_array($id)) {
                $data = ($id["data"]) ?? "";
                $video = ($id["video"]) ?? "";
                $id = $id["id"];
            }
            if (isset($image_map[$id])) {
                $img_info = $this->convert_image_info_for_gallery($image_map[$id]);
                $img_info["id"] = $id;
                if ($data) {
                    $img_info["data"] = $data;
                }
                $result[] = $img_info;
            }
            if (isset($video_map[$id])) {
                $video = $this->convert_video_info_for_gallery($video_map[$id], $video, $id);
                $video["id"] = $id;
//                if ($data) {
//                    $video["data"] = $data;
//                }
                $result[] = $video;
            }
        }

        return $result;
    }

    /**
     * Generates a list of images for the library API used to show thumbnail in the GUI.
     * @param int $start the index of the first image to include
     * @param int $number the number of images to include
     * @param bool $video whether to include videos
     * @param string $album filter images by album/tag, if empty or "all", all images are included
     * albums/tags must be defined in the image description as "Album: album1, album2, album3." or "Tag: tag1, tag2, tag3."
     * @return array of the form:
     * [
     * "id" => $im['id'],
     * "title" => $im['title'],
     * "url" => $url,
     * "full" => $full,
     * "large" => $lagre,
     * "medium" => $medium,
     * "width" => $width,
     * "height" => $height,
     * ];
     */
    public function get_for_library($start = 0, $number = null, $video = false, $album = "")
    {
        if (!($start)) {
            $start = 0;
        }
        $media = ($video) ? $this->videos : $this->images;
        if ($album && strtolower($album) !== "all") {
            $media = $this->get_images_from_album($album);
        }

        $part = array_slice($media, $start, $number);

//        wp_send_json(["here2", $start, $number,  $part]);

        if ($video) {
            //remove thumbnails that start with data: except for the first one
            foreach ($part as $i => $video) {
                foreach ($video['thumbnail'] as $j => $thumb) {
                    if ($j === 0) {
                        continue;
                    }
                    if (strpos($thumb['url'], 'data:') === 0) {
                        unset($part[$i]['thumbnail'][$j]);
                    }
                }
            }
            return $part;
        }

        $result = array_map(function ($im) {
            $url = $im['thumbnail'];
            $width = $im['sizes']['thumbnail']['width'];
            $height = $im['sizes']['thumbnail']['height'];
            if (!$url) {
                $url = $im['sizes']['medium']['url'];
            }
            if (!$url) {
                $url = $im['sizes']['large']['url'];
            }
            if (!$url) {
                $url = $im['sizes']['full']['url'];
            }
            if (!$url || strpos($im['url'], $url) !== false) {
                $url = $im['url'];
            }

            $medium = null;
            if (isset($im['sizes']['medium']) && $im['sizes']['medium']['url']) {
                $medium = [
                    $im['sizes']['medium']['url'],
                    $im['sizes']['medium']['width'],
                    $im['sizes']['medium']['height']
                ];
                if (!$width) {
                    $width = $im['sizes']['medium']['width'];
                    $height = $im['sizes']['medium']['height'];
                }
            }
            $lagre = null;
            if (isset($im['sizes']['lagre']) && $im['sizes']['large']['url']) {
                $lagre = [
                    $im['sizes']['large']['url'],
                    $im['sizes']['large']['width'],
                    $im['sizes']['large']['height']
                ];
                if (!$width) {
                    $width = $im['sizes']['large']['width'];
                    $height = $im['sizes']['large']['height'];
                }
            }
            $full = null;
            if (isset($im['sizes']['full']) && $im['sizes']['full']['url']) {
                $full = [
                    $im['sizes']['full']['url'],
                    $im['sizes']['full']['width'],
                    $im['sizes']['full']['height']
                ];
                if (!$width) {
                    $width = $im['sizes']['full']['width'];
                    $height = $im['sizes']['full']['height'];
                }
            }

            if (!$url) {
                return [];
            }

            if ((!$width || !$height) && extension_loaded('gd')) {
                $upload_dir = wp_upload_dir();

                // Check if the URL is within the uploads directory
                if (strpos($url, $upload_dir['baseurl']) === 0) {
                    // Get the relative path from the base URL
                    $relative_path = str_replace($upload_dir['baseurl'], '', $url);

                    // Construct the local file path
                    $local_file_path = $upload_dir['basedir'] . $relative_path;
                    $getimagesize = getimagesize($local_file_path);
                    list($width, $height) = $getimagesize;
                }

            }

            $img_info = [
                "id" => $im['id'],
                "title" => $im['title'],
                "url" => $url,
                "full" => $full,
                "large" => $lagre,
                "medium" => $medium,
                "width" => $width,
                "height" => $height,
            ];

            return $img_info;
        }, $part);

        $result = array_values(array_filter($result));

        return $result;
    }

    public static function get_album_names()
    {
        list($slug, $_) = explode('/', plugin_basename(__FILE__));
        $last_image_update = get_option($slug . "_last_image_update");
        $last_index_time = get_option($slug . "_last_image_index");

        if (!$last_image_update || !$last_index_time || $last_index_time > $last_image_update) {
            $index = (new IAMG_ImageHandler())->build_image_index();
        } else {
            $index = get_option($slug . "_image_album_index");
        }

        $albums = ['All'];
        if (isset($index['albums']) && $index['albums']) {
            $album_names = array_keys($index['albums']);
            sort($album_names);
            $album_names = array_map(function ($name) {
                return ucwords($name);
            }, $album_names);
            $albums = array_merge($albums, $album_names);
        }
        return $albums;
    }

    /**
     * Removes all information from settings["images"] except for thumbnails.
     * @param $settings
     * @return array
     */
    public static function sanitize($settings): array
    {
        if (isset($settings['images'])) {
            $settings["images"] = array_map(function ($image) {
                return [
                    'title' => $image['title'],
                    'thumbnail' => $image['thumbnail']
                ];
            }, $settings['images']);
        }
        return $settings;
    }

    //Private methods

    private function get_images($date = null, $end_date = null, $reversed = true)
    {
        $query_images_args = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'post_status' => 'inherit',
            'posts_per_page' => -1,
        );

        if ($date) {
            $date = $this->process_date($date);
            if ($date) {
                if (!$end_date) {
                    $end_date = $this->process_date($date . " +24 hours");
                }
                $query_images_args['date_query'] = [
                    [
                        'after' => $date, // Start date
                        'before' => $end_date, // End date
                        'inclusive' => true, // Include posts from the start and end dates
                    ],
                ];
            }
        }

        $images = array();

        $query_images = new \WP_Query($query_images_args);

        foreach ($query_images->posts as $image) {
            $id = $image->ID;
            $meta = wp_get_attachment_metadata($id);
            $url = esc_url(wp_get_attachment_url($id));

            $base_url = implode("/", array_slice(explode("/", $url), 0, -1));

            $imageSizes = $this->get_image_sizes($meta, $base_url);

            if (!isset($imageSizes['thumbnail'])) {
                $imageSizes['thumbnail'] = [
                    "url" => $url,
                    "width" => 100,
                    "height" => 100
                ];
            }

            $images[] = [
                "id" => $id,
                "url" => $url,
                "title" => $image->post_title,
                "thumbnail" => esc_url($imageSizes['thumbnail']['url']),
                "caption" => $image->post_excerpt,
                "description" => $image->post_content,
                "alt" => get_post_meta($id, '_wp_attachment_image_alt', true),
                "sizes" => $imageSizes,
                "date" => $image->post_date
            ];
        }

        if ($reversed) {
            usort($images, function ($a, $b) {
                return (int)$b["id"] - (int)$a['id'];
            });
        } else {
            usort($images, function ($a, $b) {
                return (int)$a["id"] - (int)$b['id'];
            });
        }


//        $date && wp_send_json([$date, $end_date, $images]);

        return $images;
    }

    private function get_videos()
    {
        $query_images_args = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'video',
            'post_status' => 'inherit',
            'posts_per_page' => -1,
        );


        $query_images = new \WP_Query($query_images_args);
        $videos = array();
        $missing_thumbnails = [];
        foreach ($query_images->posts as $i => $video) {
            $id = $video->ID;
            $meta = wp_get_attachment_metadata($id);
            $url = wp_get_attachment_url($id);


//            $base_url = implode("/", array_slice(explode("/", $url), 0, -1));

            $thumbnail = $this->get_video_thumbnail($id);
            if (!$thumbnail) {
                $missing_thumbnails[$url] = $i;
            } else {
                if (isset($thumbnail['url'])) {
                    $thumbnail = [$thumbnail];
                }
            }
            $videos[$i] = [
                "id" => $id,
                "url" => $url,
                "type" => "local",
                "title" => $video->post_title,
                "thumbnail" => $thumbnail,
                "caption" => $video->post_excerpt,
                "description" => $video->post_content,
                "alt" => get_post_meta($id, '_wp_attachment_image_alt', true),
                "width" => $meta["width"],
                "height" => $meta["height"],
            ];
        }

        if ($missing_thumbnails) {

            $IAMG_Client = new IAMG_Client();
            if (!$IAMG_Client->is_local_server()) {
                if (count($missing_thumbnails) > 10) {
                    $missing_thumbnails = array_slice($missing_thumbnails, 0, 10);
                }
                $thumbnails = $IAMG_Client->generate_video_thumbnail(array_keys($missing_thumbnails),
                    self::THUMBNAIL_SIZE, self::THUMBNAIL_SIZE);
                foreach ($thumbnails as $url => $thumbnail) {
                    //validate base64 string
                    if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $thumbnail)) {
                        $videos[$missing_thumbnails[$url]]["thumbnail"] = "data:image/jpg;base64," . $thumbnail;
                        add_post_meta($videos[$missing_thumbnails[$url]]["id"], '_thumbnail', $thumbnail, true);
                    }
                }
            } else {
                foreach ($missing_thumbnails as $url => $index) {
                    $videos[$index]["thumbnail"] = [
                        [
                            "url" => IAMG_URL . 'images/admin/no_thumb.png',
                            "width" => self::VIDEO_THUMBNAIL_WIDTH,
                            "height" => self::VIDEO_THUMBNAIL_HEIGHT
                        ]
                    ];
                }
            }
        }

        usort($videos, function ($a, $b) {
            return (int)$a["id"] - (int)$b['id'];
        });

        $external_videos = $this->get_external_videos();


        $videos = array_merge($videos, $external_videos);


        return $videos;
    }

    private function process_video_info($url, $info, $type)
    {
        $vid_info = [
            'type' => $type,
            'id' => $info['id'] ?? crc32($url),
            'url' => $url,
            'title' => $info['title'] ?? '',
            'description' => $info['description'] ?? '',
        ];

        $pictures = $info['pictures'] ?? '';
        if ($pictures) {
            // Loop over pictures and find the one with max of height and width that is closest to 150
            $max_size = 0;
            $thumbnail = null;
            $sizes = [];
            foreach ($pictures as $pic) {
                $size = max($pic['height'], $pic['width']);
                if ($size > $max_size && $size <= 200) {
                    $max_size = $size;
                    $thumbnail = [
                        "url" => $pic['url'],
                        "width" => $max_size,
                        "height" => $max_size
                    ];
                }
                if ($size > 200) {
                    $sizes[] = [
                        "url" => $pic['url'],
                        "width" => $pic['width'],
                        "height" => $pic['height']
                    ];
                }
            }
            if ($thumbnail) {
                $vid_info["thumbnail"][] = $thumbnail;
            }
            if ($sizes) {
                if (!isset($vid_info["thumbnail"])) {
                    $vid_info["thumbnail"] = [];
                }
                $vid_info["thumbnail"] = array_merge($vid_info["thumbnail"], $sizes);
            }
        }
        return $vid_info;
    }

    public function add_external_video($info)
    {
        $url = $info['url'];
        if (!$url) {
            return false;
        }
        if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
            $info = $this->process_video_info($url, $info, 'youtube');
        } elseif (strpos($url, 'vimeo.com') !== false) {
            $info = $this->process_video_info($url, $info, 'vimeo');
        } else {
            if ($this->is_video_url($url)) {
                $id = (string)($info['id'] ?? crc32($url));
                $thumbnail = $info['thumbnail'] ?? '';
                if ($thumbnail && is_string($thumbnail)) {
                    $thumbnail = [
                        "url" => $thumbnail,
                        "width" => self::VIDEO_THUMBNAIL_WIDTH,
                        "height" => self::VIDEO_THUMBNAIL_HEIGHT
                    ];
                }
                $info = [
                    'id' => $id,
                    'type' => 'external',
                    'url' => $url,
                    'title' => $info['title'] ?? basename($url),
                    'description' => $info['description'] ?? '',
                    'thumbnail' => $thumbnail ? [$thumbnail] : [],
                    'sizes' => []
                ];
                $this->add_thumbnail_and_sizes($url, $info, $id);
            } else {
                return false;
            }
        }


        $external_videos = $this->get_external_videos();

        $external_videos[] = $info;
        $this->save_external_videos($external_videos);
        return $external_videos;
    }

    public function remove_external_video($id)
    {
        $external_videos = $this->get_external_videos();
        if (!$external_videos) {
            return;
        }

        //find the video with the given id in the external videos
        $vid_info = array_filter($external_videos, function ($video) use ($id) {
            return $video['id'] === $id;
        });

        if (!$vid_info) {
            return;
        }
        $vid_info = reset($vid_info);

        //remove any generated thumbnails
        if (isset($vid_info['thumbnail'])) {
            $upload_dir = wp_get_upload_dir();
            $upload_base_dir = $upload_dir['basedir'] . '/iamg';
            foreach ($vid_info['thumbnail'] as $thumb) {
                $url = $thumb['url'];
                if (strpos($url, $upload_base_dir) === 0) {
                    $relative_path = str_replace($upload_dir['baseurl'], '', $url);
                    $local_file_path = $upload_dir['basedir'] . $relative_path;

                    if (file_exists($local_file_path)) {
                        unlink($local_file_path);
                    }
                }
            }
        }

        $external_videos = array_filter($external_videos, function ($video) use ($id) {
            return $video['id'] !== $id;
        });

        $this->save_external_videos($external_videos);
    }

    public function update_external_video($id = null, $info = null)
    {
        if (!$id || !$info) {
            $this->save_external_videos($this->get_external_videos()); //remove any duplicates
            return;
        }
        $this->remove_external_video($id);
        $info['id'] = $id;
        $this->add_external_video($info);
    }

    private function process_date(
        $date,
        $format = "Y-m-d H:i:s"
    )
    {
        if (is_numeric($date) && !is_string($date)) {
            $date = gmdate($format, floor($date));
            return $date;
        }
        $timestamp = strtotime($date);
        if ($timestamp === false) {
            return null;
        }

        return gmdate($format, $timestamp);
    }

    private function get_image_sizes_by_id($image_id)
    {
        $sizes_info = [];
        $meta = wp_get_attachment_metadata($image_id);
        $url_base = wp_get_attachment_url($image_id);
        $base_url = implode("/", array_slice(explode("/", $url_base), 0, -1));

        if ($meta && isset($meta['sizes'])) {
            foreach ($meta['sizes'] as $size => $size_info) {
                $sizes_info[] = [
                    'url' => esc_url($base_url . '/' . $size_info['file']),
                    'width' => $size_info['width'],
                    'height' => $size_info['height']
                ];
            }
        }

        // Add the full size image
        $sizes_info[] = [
            'url' => esc_url($url_base),
            'width' => $meta['width'],
            'height' => $meta['height']
        ];

        return $sizes_info;
    }

    private
    function get_video_thumbnail(
        string $id
//        string $base_url
    )
    {
        //check if post has a featured image
        $thumbnail_id = get_post_thumbnail_id($id);
        if ($thumbnail_id) {
            return $this->get_image_sizes_by_id($thumbnail_id);
        }

        $thumbnail = get_post_meta($id, '_thumbnail', true);
        if ($thumbnail) {
            //if the thumbnail is an url, return it
            if (is_array($thumbnail) && isset($thumbnail['url']) && wp_http_validate_url($thumbnail['url'])) {
                return [$thumbnail];
            }
            if (is_array($thumbnail) && is_array($thumbnail[0])) {
                return $thumbnail;
                return "data:image/jpg;base64," . $thumbnail['base64'];
            }
            if (is_string($thumbnail) && preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $thumbnail)) {
                //for backward compatibility
                //get size of the image
                $image_info = getimagesizefromstring(base64_decode($thumbnail));
                //get extension of the image
                $ext = image_type_to_extension($image_info[2], false);
                return [
                    [
                        "url" => "data:image/" . $ext . ";base64," . $thumbnail,
                        "width" => $image_info[0],
                        "height" => $image_info[1]
                    ]
                ];
            }
        }
        return [];
    }

    public function clear_saved_thumbnails()
    {
        $query_images_args = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'video',
            'post_status' => 'inherit',
            'posts_per_page' => -1,
        );

        $query_images = new \WP_Query($query_images_args);

        $removed = 0;

//        wp_send_json($query_images->posts);

        foreach ($query_images->posts as $video) {
            $id = $video->ID;
            if (delete_post_meta($id, '_thumbnail')) {
                $removed++;
            };
        }

        $external_videos = $this->get_external_videos();
        foreach ($external_videos as &$video) {
            if ($video['type'] === 'external' && isset($video['thumbnail'])) {
                $video['thumbnail'] = [];
                $video['sizes'] = [];
                $this->add_thumbnail_and_sizes($video['url'], $video);
                $removed++;
            }
        }
        $this->save_external_videos($external_videos);

        return $removed;
    }

    private function convert_thumbnails_to_url($id, $id_for_name = "")
    {
        $in_post = true;
        if (is_array($id)) {
            $thumbnail = $id;
            $in_post = false;
            if (!$id_for_name) {
                $id_for_name = strval(rand(1e6, 1e7));
            }
        } else {
            $thumbnail = $this->get_video_thumbnail($id);
            $id_for_name = $id;
        }
        if (!$thumbnail) {
            return;
        }

        $changed = false;


        foreach ($thumbnail as &$tumb) {
            if (!isset($tumb['url']) || wp_http_validate_url($tumb['url'])) {
                continue;
            }


            if ($tumb['url'] === "data:image/jpg;base64," || strpos($tumb['url'], 'data:') !== 0) {
                continue;
            }
            $base64 = explode(',', $tumb['url'])[1];
            if (!isset($tumb['width'])) {
                //get size of the image
                $image_info = getimagesizefromstring(base64_decode($base64));
                $tumb['width'] = $image_info[0];
                $tumb['height'] = $image_info[1];
            }

            $tumb_id = "tumb_" . $id_for_name . "_" . $tumb['width'] . "x" . $tumb['height'];


            $url = $this->save_base64_image($base64, $tumb_id);
            if ($url) {
                $tumb['url'] = $url['url'];
                $tumb['width'] = $url['width'];
                $tumb['height'] = $url['height'];
                $changed = true;
            }
        }

        if ($changed && $in_post) {
            update_post_meta($id, '_thumbnail', $thumbnail);
        }

        return $thumbnail;
    }

    private
    function save_base64_image(
        $base64,
        $id
    )
    {
        $upload_dir = wp_get_upload_dir();
        $upload_path = $upload_dir['basedir'];
        //if missing, creat subdirectory iamg
        if (!file_exists($upload_path . '/iamg')) {
            mkdir($upload_path . '/iamg');
        }

        if (strpos($base64, ',') !== false) {
            $data = explode(',', $base64);
            if (isset($data[1])) {
                $data = $data[1];
            } else {
                return false;
            }
        } else {
            $data = $base64;
        }

        $img_data = base64_decode($data);

        $image_info = getimagesizefromstring($img_data);

        if ($image_info === false) {
            // The data is not a valid image
            return false;
        }

        $ext = image_type_to_extension($image_info[2]);

        $upload_path = $upload_path . '/iamg';
        $upload_url = $upload_dir['baseurl'];
        $upload_url = $upload_url . '/iamg';

        $file_path = $upload_path . '/' . $id . $ext;
        $file_url = $upload_url . '/' . $id . $ext;
        $file = fopen($file_path, 'wb');
        fwrite($file, $img_data);
        fclose($file);
        return ["url" => $file_url, "width" => $image_info[0], "height" => $image_info[1]];
    }

    /**
     * Check if the given URL is a video file by accessing the resource.
     *
     * @param string $url The URL to check.
     * @return bool True if the URL is a video file, false otherwise.
     */
    public
    function is_video_url(
        $url
    )
    {
        $headers = get_headers($url, 1);
        if ($headers === false) {
            return false;
        }

        if (isset($headers['Content-Type'])) {
            $content_type = is_array($headers['Content-Type']) ? $headers['Content-Type'][0] : $headers['Content-Type'];
            return strpos($content_type, 'video/') === 0;
        }

        return false;
    }

    private
    function get_image_sizes(
        $meta,
        $url_base,
//        $sizes = ['medium', 'large', 'thumbnail']
        $sizes = null
    )
    {
        $images = [];
        $expl = explode('/', $meta["file"]);
        $images['full'] = [
            "url" => esc_url($url_base . "/" . array_pop($expl)),
            "width" => (int)$meta["width"],
            "height" => (int)$meta["height"]
        ];

        if (!$sizes && isset($meta['sizes'])) {
//            get sizes from teh keys of meta['sizes']
            $sizes = array_keys($meta['sizes']);
        } else {
            $sizes = ['medium', 'large', 'thumbnail'];
        }
        foreach ($sizes as $size) {
            if (isset($meta['sizes'][$size])) {
                $im_size_data = $meta['sizes'][$size];
                $images[$size] = [
                    "url" => esc_url($url_base . "/" . $im_size_data['file']),
                    "width" => (int)$im_size_data["width"],
                    "height" => (int)$im_size_data["height"]
                ];
            }
        }


        if (isset($meta['original_image'])) {
            $images['original'] = [esc_url($url_base . "/" . $meta['original_image'])];
        }

        return $images;
    }

    private
    function get_images_from_album(
        $album
    )
    {
        if (is_array($album)) {
            $images = [];
            foreach ($album as $alb) {
                $images = array_merge($images, $this->get_images_from_album($alb));
            }
            return $images;
        }

        $last_image_update = get_option($this->slug . "_last_image_update");
        $last_index_time = get_option($this->slug . "_last_image_index");

        if (!$last_image_update || !$last_index_time || $last_index_time > $last_image_update) {
            $index = $this->build_image_index();
        } else {
            $index = get_option($this->slug . "_image_album_index");
        }


        $album = strtolower($album);

        preg_match('/^date\((.+)\)$/i', $album, $date);

        if ($date) {
            $date = explode(",", $date[1]);
            if ($date) {
                return $this->get_images_from_date($date[0], isset($date[1]) ? $date[1] : null, $index);
            }
        }


        if (isset($index['albums'][$album])) {
            return $index['albums'][$album];
        }

        return [];

    }

    private
    function build_image_index()
    {
        $regex = '/(?:Albums|Tags|Album|Tag):\s*([\p{L}0-9,;@-_\s]+)\s*(?:\.|$)/iu';
        $index = [
            "dates" => [],
            "albums" => [],
        ];

        foreach ($this->images as $image) {
            $date = explode(" ", $this->process_date($image['date'], 'Y m d'));
            $index["dates"][$date[0]][$date[1]][$date[2]][] = $image;
            $description = $image['description'];
            if (!$description) {
                continue;
            }

            $matches = [];
            preg_match_all($regex, $description, $matches);
            if ($matches[1]) {
                foreach ($matches[1] as $match) {
                    $albums = $match;
                    if (isset($albums)) {
                        $albums = explode(",", str_replace(";", ",", $albums));
                        if ($albums) {
                            foreach ($albums as $album_name) {
                                $album_name = strtolower(trim($album_name));
                                $index["albums"][$album_name][] = $image;
                            }
                        }
                    }
                }
            }
        }

        if ($index) {
            if (get_option($this->slug . "_last_image_index")) {
                update_option($this->slug . "_last_image_index", microtime(true), false);
                update_option($this->slug . "_image_album_index", $index, false);
            } else {
                add_option($this->slug . "_last_image_index", microtime(true), '', false);
                add_option($this->slug . "_image_album_index", $index, '', false);
            }
        }

        return $index;
    }

    private
    function convert_image_info_for_gallery(
        $info
    )
    {
        $sizes_info = $info['sizes'];

        $size_names = [
//            "medium", "large",
            "full"
        ];

        $sizes_from_info = array_keys($sizes_info);
// prepand all sizes from $sizes_info that are not in $size_names and not thumbnail
        $size_names = array_merge(array_diff($sizes_from_info, $size_names, ["thumbnail"]), $size_names);

        foreach ($size_names as $size) {
            if (isset($sizes_info[$size])) {
                $sizes[] = [
                    $sizes_info[$size]["url"],
                    [$sizes_info[$size]["width"], $sizes_info[$size]["height"]]
                ];
            }
        }
        $result = [
            "sizes" => $sizes,
            "title" => $info['title'],
            "caption" => $info['caption'],
            "description" => $info['description'],
            "alt" => $info['alt'],
            "download" => $sizes_info['original'][0] ?? "",
            "thumbnail" => $sizes_info['thumbnail']
        ];

        return $result;
    }


    private
    function get_images_from_date(
        string  $start,
        ?string $end,
                $index
    )
    {
        $start_date = $this->process_date($start);
        if ($end) {
            $end_date = $this->process_date($end);
            if (!$start_date || !$end_date) {
                return [];
            }
//            wp_send_json([$start_date, $end_date]);

            if (substr($start_date, -8) !== "00:00:00" || substr($end_date, -8) !== "00:00:00") {
//                wp_send_json(["here", $start, $end, $start_date, $end_date]);
                return $this->get_images($start_date, $end_date);
            }


            $explode_s = explode("-", $start);
            $explode_e = explode("-", $end);

            $start_range = array_map(function ($v) {
                return (is_numeric($v) ? (int)$v : false);
            }, $explode_s);
            $end_range = array_map(function ($v) {
                return (is_numeric($v) ? (int)$v : false);
            }, $explode_e,);

//            wp_send_json([$start, $end, $start_range, $end_range]);

            if (in_array(false, $start_range) || in_array(false, $end_range)) {
//                wp_send_json("here2");
                return $this->get_images($start_date, $end_date);
            }
            return $this->get_images_range($start_range, $end_range, $index["dates"]);
        }

        if (!$start_date) {
            return [];
        }

        if (substr($start_date, -8) !== "00:00:00") {
            return $this->get_images($start_date);
        }

        $start_range = array_map(function ($v) {
            return (is_numeric($v) ? (int)$v : false);
        }, explode("-", $start));
        return $this->get_images_range($start_range, $start_range, $index["dates"]);
    }

    private
    function get_images_range(
        array $start_range,
        array $end_range,
              $index
    )
    {
        if (!$start_range) {
            $start_range = [0];
        }
        if (!$end_range) {
            $end_range = [100];
        }
        $start = array_shift($start_range);
        $end = array_shift($end_range);
        $result = [];
        foreach ($index as $i => $next_level) {
            if ($i >= $start && $i <= $end) {
                if (isset($next_level['url'])) {
                    $result[] = $next_level;
                } else {
                    if ($i !== $start) {
                        $s_range = array_fill(0, count($start_range), 0);
                    } else {
                        $s_range = $start_range;
                    }

                    if ($i !== $end) {
                        $e_range = array_fill(0, count($end_range), 100);
                    } else {
                        $e_range = $end_range;
                    }

                    $result = array_merge($result, $this->get_images_range($s_range, $e_range, $next_level));
                }
            }
        }

        return $result;
    }

    /**
     * @return false|mixed|null
     */
    public
    function get_external_videos()
    {
        $external_videos = get_option($this->slug . "_external_videos");
        return (is_array($external_videos)) ? $external_videos : [];
    }

    /**
     * @param $external_videos
     * @return void
     * todo: in future version, convert to DB
     */
    private
    function save_external_videos(
        $external_videos
    ): void
    {
        $external_videos = $this->filter_duplicates_by_crc($external_videos);
        update_option($this->slug . "_external_videos", $external_videos, false);
    }

    /**
     * Filters out duplicate entries based on CRC.
     * @param array $entries The array of entries to filter.
     * @return array The filtered array with unique entries.
     */
    private
    function filter_duplicates_by_crc(array $entries): array
    {
        $unique_entries = [];
        $crc_set = [];

        foreach ($entries as $entry) {
            $string = json_encode($entry);
            $crc = crc32($string);
            if (!isset($crc_set[$crc])) {
                $unique_entries[] = $entry;
                $crc_set[$crc] = $entry;
            } elseif (crc32(json_encode($crc_set[$crc]) . "1") !== crc32($string . "1")) {
                //some extra check to avoid collision
                $unique_entries[] = $entry;
            }
        }

        return $unique_entries;
    }

    /**
     * @param $url
     * @param $thumbnail
     * @param array $info
     * @return array
     */
    private
    function add_thumbnail_and_sizes(
        $url,
        array &$info,
        $to_url_id = false
    ): array
    {
        $sizes = (new IAMG_Client())->generate_video_thumbnail($url, self::VIDEO_TUMB_WIDTHS,
            self::VIDEO_TUMB_HEIGHT);
        $thumbnails = [];
        foreach ($sizes as $i => $thumbnail) {
            $url = null;
            if (isset($thumbnail['base64'])) {
                $url = "data:image/jpg;base64," . $thumbnail['base64'];
            } elseif (isset($thumbnail['url'])) {
                $url = $thumbnail['url'];
            }
            if (!$url) {
                continue;
            }
            $thumbnail = [
                "url" => $url,
                "width" => $thumbnail['width'],
                "height" => $thumbnail['height']
            ];

            $thumbnails[] = $thumbnail;

        }
        if ($to_url_id && is_string($to_url_id)) {
            $thumbnails = $this->convert_thumbnails_to_url($thumbnails, $to_url_id);
        }
        $info['thumbnail'] = $thumbnails;
        return $info;
    }

    private function convert_video_info_for_gallery($info, &$video, $id)
    {
        $title = $info['title'] ?? '';
        $new_title = $video['title'] ?? '';
        if ($new_title === "Video") { //ignore generic title
            $new_title = "";
        }
        if ($title !== $new_title) {
            $title = $new_title;
        }

        if (isset($video['description'])) {
            $description = $video['description'];
        } else {
            $description = $info['description'] ?? '';
        }

        if (isset($video['caption'])) {
            $caption = $video['caption'];
        } else {
            $caption = $info['caption'] ?? '';
        }

        $new_thumbnails = $video['thumbnail'] ?? [];

        if ($new_thumbnails) {
            $thumbnails = $this->format_external_thumbnails_gallery($new_thumbnails, $id);
        } else {
            $thumbnails = $this->format_external_thumbnails_gallery($info['thumbnail'] ?? [], $id);
        }

        //it is possible that a based64 thumbnail was converted to local url. We need to capture this and update the video info
        if (isset($video['thumbnail'])) {
            foreach ($video['thumbnail'] as $i => $thumb) {
                $width = $thumb['width'];
                //find the thumbnail with the given width inside the new thumbnails
                $new_thumb = array_filter($thumbnails, function ($t) use ($width) {
                    return $t[1] === $width;
                });
                if ($new_thumb && $new_thumb[0][0] !== $thumb['url']) {
                    $video['thumbnail'][$i] = [
                        "url" => $new_thumb[0][0],
                        "width" => $new_thumb[0][1],
                        "height" => $new_thumb[0][2]
                    ];
                }
            }
        }

        $result = [
            "sizes" => $thumbnails,
            "title" => $title,
            "caption" => $caption,
            "description" => $description,
//            "alt" => $info['alt'],
            "thumbnail" => $thumbnails[0]
        ];

        return $result;
    }

    private function format_external_thumbnails_gallery($new_thumbnails, $id)
    {
        $thumbnails = $this->convert_thumbnails_to_url($new_thumbnails, $id);

        $thumbnails = array_map(function ($thumb) {
            return [
                $thumb['url'],
                $thumb['width'],
                $thumb['height']
            ];
        }, $thumbnails);

        //sort by width
        usort($thumbnails, function ($a, $b) {
            return $a[1] - $b[1];
        });

        return $thumbnails;
    }
}