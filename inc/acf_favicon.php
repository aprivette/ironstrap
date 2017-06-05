<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

// Output favicon markup in head
class IronStrap_Favicons
{
    function __construct($init_args = null)
    {
        $this->args = $init_args;
        $uploads_dir = wp_upload_dir();
        $this->icons_dir = $uploads_dir['baseurl'].'/favicons/';
    }

    // Microsoft favicons
    public function favicon_microsoft()
    {
        add_action('wp_head', function () {
            $output = '';

            foreach ($this->args as $size) {
                $file = $this->icons_dir.'favicon-'.$size.'.png';
                $output .= '<meta name="msapplication-TileImage" content="'.$file.'">';
            }
            echo $output;
        });
    }

    // Theme colors - mostly for Windows metro grid
    public function favicon_color()
    {
        add_action('wp_head', function () {
            $output = '';

            $output .= '<meta name="msapplication-TileColor" content="'.$this->args.'">';
            $output .= '<meta name="theme-color" content="'.$this->args.'">';

            echo $output;
        });
    }

    // Standard favicons
    public function favicon_std()
    {
        add_action('wp_head', function () {
            $output = '';

            foreach ($this->args as $size) {
                $file = $this->icons_dir.'favicon-'.$size.'.png';
                $output .= '<link rel="icon" type="image/png" sizes="'.$size.'x'.$size.'" href="'.$file.'">';
            }

            echo $output;
        });
    }

    // Apple favicons
    public function favicon_apple()
    {
        add_action('wp_head', function () {
            $output = '';

            foreach ($this->args as $size) {
                $file = $this->icons_dir.'favicon-'.$size.'.png';
                $output .= '<link rel="apple-touch-icon" sizes="'.$size.'x'.$size.'" href="'.$file.'">';
            }

            echo $output;
        });
    }

    // Android favicons
    public function favicon_android()
    {
        add_action('wp_head', function () {
            $parsed = parse_url(get_template_directory_uri());

            // Android home links require a manifest.json file to specify icon locations and the app's name
            $output = '<link rel="manifest" href="'.$parsed['path'].'/resources/manifest.php">';

            echo $output;
        });
    }
}

// Validate the favicon field and ensure that there is an image editor package installed on the server
add_action('acf/validate_value/name=favicon', function ($valid, $value, $field, $input) {
    // If it's not valid anyway then stop
    if (!$valid || !$value) {
        return $valid;
    }

    $parsed_url = parse_url($value);
    $path = get_attached_file($parsed_url['path']);
    if (!is_wp_error(wp_get_image_editor($path))) {
        // If a favicons directory does not exist, attempt to create it
        if (!file_exists(ABSPATH.'wp-content/uploads/favicons/')) {
            wp_mkdir_p(ABSPATH.'wp-content/uploads/favicons/');
        }

        // Combination of all the required favicon dimensions
        $sizes = [57, 60, 72, 76, 114, 120, 144, 152, 180, 192, 32, 96, 16];
        foreach ($sizes as $size) {
            $favicon_editor = wp_get_image_editor($path);
            $favicon_editor->resize($size, $size, true);
            $favicon_editor->save(ABSPATH.'wp-content/uploads/favicons/favicon-'.$size, 'image/png');
        }
    } else {
        $valid = "Your host does not support image manipulation.";
    }

    return $valid;
}, 10, 4);

// Set up favicon data, instantiate the class, and execute the favicon loading functions
if (get_field('favicon', 'option')) {
    $favicon_data = [
        'apple' => [57, 60, 72, 76, 114, 120, 144, 152, 180, 192],
        'std' => [192, 32, 96, 16],
        'microsoft' => [144]
    ];

    $favicon_std = new IronStrap_Favicons($favicon_data['std']);
    $favicon_std->favicon_std();
    $favicon_apple = new IronStrap_Favicons($favicon_data['apple']);
    $favicon_apple->favicon_apple();
    $favicon_android = new IronStrap_Favicons();
    $favicon_android->favicon_android();
}

// Set up theme color data, instantiate the class, and execute the color loading function
if (get_field('theme_color', 'option')) {
    $color = get_field('theme_color', 'option');
    $favicon_color = new IronStrap_Favicons($color);
    $favicon_color->favicon_color();
}

// Set up Twitter, LinkedIn, and Facebook share images
add_action('wp_head', function () {
    $output = '';

    // Check if global or override share image is set for LinkedIn, Facebook, and Twitter
    // LinkedIn share image
    if (get_field('linkedin_share_image', 'option') || get_field('linkedin_share_image_override')) {
        // The override field on an individual page is given priority
        if (get_field('linkedin_share_image_override') && !is_home()) {
            $img = get_field('linkedin_share_image_override');
        } else {
            $img = get_field('linkedin_share_image', 'option');
        }

        // Listing the LinkedIn share image before the Facebook one prevents Facebook from using the smaller image
        $img = wp_get_attachment_image_src($img, 'full');
        $output .= '<meta property="og:image" content="'.$img[0].'" /><!-- LinkedIn image -->';
        $output .= '<meta property="og:image:width" content="'.$img[1].'" />';
        $output .= '<meta property="og:image:height" content="'.$img[2].'" />';
    }

    // Facebook share image
    if (get_field('facebook_share_image', 'option') || get_field('facebook_share_image_override')) {
        // The override field on an individual page is given priority
        if (get_field('facebook_share_image_override') && !is_home()) {
            $img = get_field('facebook_share_image_override');
        } else {
            $img = get_field('facebook_share_image', 'option');
        }

        $img = wp_get_attachment_image_src($img, 'full');
        $output .= '<meta property="og:image" content="'.$img[0].'" /><!-- Facebook image -->';
        $output .= '<meta property="og:image:width" content="'.$img[1].'" />';
        $output .= '<meta property="og:image:height" content="'.$img[2].'" />';
    }

    // Twitter share image
    if (get_field('twitter_share_image', 'option') || get_field('twitter_share_image_override')) {
        if (get_field('twitter_share_image_override') && !is_home()) {
            $img = get_field('twitter_share_image_override');
        } else {
            $img = get_field('twitter_share_image', 'option');
        }

        $output .= '<meta name="twitter:image" content="'.wp_get_attachment_image_url($img, 'full').'"><!-- Twitter image -->';
    }

    if ($output) {
        echo $output;
    }
});
