<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function modify_read_more_link() {
    return '<a class="transparent-btn" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Get the first image from each post and resize it.
 *
 * @return string $first_img.
 * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
 * @link https://gist.github.com/SilentComics/0a7ea47942eb759dbb48eac2b7be1bbc/
 * Usage: Include in functions.php
 * Call <?php echo get_first_image('thumbnail'); ?> in page template.
 */
function get_first_image() {
    global $post;
    $first_img = '';
    preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
    $first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

    if ( empty( $first_img ) ) {
        return get_template_directory_uri() . '/assets/images/family-hands.jpg'; // path to default image.
    }

    // Now we have the $first_img but we want the thumbnail of that image.
    $explode = explode( '.', $first_img );
    $count = count( $explode );
    $size = ''; // Our panel ratio (2:1) 312x156 for lighther page, 624x312 for retina; use add_image_size() and Force Regenerate Thumbnails plugin when changing sizes.
    $explode[ $count -2 ] = $explode[ $count -2 ] . '' . $size;
    $thumb_img = implode( '.', $explode );
    return $thumb_img;
}
add_filter( 'get_first_image', 'thumbnail' );


function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyB5rB06qFWoCFFRbP-rnG7aNx1_HHEXFuo');
}

add_action('acf/init', 'my_acf_init');