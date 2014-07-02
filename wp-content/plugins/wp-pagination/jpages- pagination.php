<?php
/*
Plugin Name: Wp Pagination
Plugin URI: http://wordpress.org/extend/plugins/wp-pagination/
Version: 1.6
Description: Add jQuery pagination for gallery, comments etc.
Author: Kishore
Author URI: http://blog.kishorechandra.co.in/
Text Domain: jpages
Domain Path: /languages
*/


define( 'JPAGES_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'JPAGES_LANGUAGE_DIR',  'wp-pagination/languages' );
define( 'JPAGES_INCLUDES_DIR',  JPAGES_PLUGIN_DIR . '/includes' );

define( 'JPAGES_PLUGIN_URL',        WP_PLUGIN_URL . '/wp-pagination/' );
define( 'JPAGES_SCRIPTS_URL',   JPAGES_PLUGIN_URL . 'js' );
define( 'JPAGES_STYLES_URL',        JPAGES_PLUGIN_URL . 'css' );



/*
*
*
* Loads the required javascript files (only when not in admin area)
*/
function load_jpages_scripts() {
    if ( is_admin() ) return;

    wp_enqueue_script(
        'jquery-jpages',
        JPAGES_SCRIPTS_URL . '/jPages.js',
        array( 'jquery' )
    );

    wp_enqueue_script(
        'jquery-script',
        JPAGES_SCRIPTS_URL . '/script.js',
        array( 'jquery' )
    );

    // Scr added for commnets
    $pages = get_option('comments_per_page');
    $default_page = get_option('default_comments_page');

    // get option value from the database
    $options = get_option( 'jpages_gallery_options' );
    $gallery_per_page_value = $options['gallery_per_page'];


    wp_localize_script(
            'jquery-script', 'jPages_count', array(
            'get_comment_pages_count'   => $pages,
            'get_default_comments_page' => $default_page,
        'get_default_gallery_per_page'      => $gallery_per_page_value
        )
    );
}

//* Enqueue jpages js file for site
add_action( 'wp_enqueue_scripts', 'load_jpages_scripts' );


/*
*
*
* Loads the required css (only when not in admin area)
*/
function load_jpages_styles() {
    if ( is_admin() ) return;

    wp_enqueue_style(
            'jquery-jpages',
            JPAGES_STYLES_URL . '/jPages.css' );
    wp_enqueue_style(
            'jquery-custom-jpages',
            JPAGES_STYLES_URL . '/custom-style.css' );

 /*   wp_enqueue_style(
            'jquery-css',
            JPAGES_STYLES_URL . '/style.css' );

    wp_enqueue_style(
            'jquery-animate',
            JPAGES_STYLES_URL . '/animate.css' ); */


}

//* Enqueue jpages js file for site
add_action( 'wp_enqueue_scripts', 'load_jpages_styles' );

// Register and define the settings
add_action('admin_init', 'load_jpages_admin_init');
function load_jpages_admin_init(){
    register_setting(
        'media',                                // settings page
        'jpages_gallery_options',               // option name
        'jpages_gallery_validate_options'       // validation callback
    );

    add_settings_field(
        'gallery_pages_count',                  // id
        'Gallery Per Page',                     // setting title
        'jpages_gallery_setting_input',         // display callback
        'media',                                // settings page
        'default'                               // settings section
    );
}

// Display and fill the form field
function jpages_gallery_setting_input() {
    // get option value from the database
    $options = get_option( 'jpages_gallery_options' );
    $gallery_per_page_value = $options['gallery_per_page'];

    // echo the field
    ?>
<input id='gallery_per_page' name='jpages_gallery_options[gallery_per_page]'
 type='text' value='<?php echo esc_attr( $gallery_per_page_value ); ?>' /> Add the pagination break down for gallery
    <?php
}

// Validate user input
function jpages_gallery_validate_options( $input ) {
    $valid = array();
    if ( is_numeric( $input['gallery_per_page'] ) ) {
        $valid['gallery_per_page'] = (int)$input['gallery_per_page'];
    } else {
        $valid['gallery_per_page'] = $input['gallery_per_page'] = 5;
    }

    // Something dirty entered? Warn user.
    if( $valid['gallery_per_page'] != $input['gallery_per_page'] ) {
        add_settings_error(
            'jpages_gallery_per_page',          // setting title
            'jpages_gallery_texterror',         // error ID
            'Invalid input, please fix',        // error message
            'error'                             // type of message
        );
    }

    return $valid;
}
