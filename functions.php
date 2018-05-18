<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package OceanWP WordPress theme
 */

function oceanwp_child_enqueue_parent_style() {
    // Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
    $theme   = wp_get_theme( 'OceanWP' );
    $version = $theme->get( 'Version' );
    // Load the stylesheet
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );

}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


function eztouse_tgmpa_register() {

    // Get array of recommended plugins
    $plugins = array(

        array(
            'name'				=> '(OceanWP) Extra Settings',
            'slug'				=> 'ocean-extra',
            'version'           => '1.4.11',
            'required'			=> true,
            'force_activation'	=> true,
        ),
        array(
            'name'              => '(OceanWP) Hooks',
            'slug'              => 'ocean-hooks',
            'version'           => '1.0.6',
            'description'       => 'Add HTML or PHP code before or after any area of your wordpress template.',
            'source'            => get_stylesheet_directory() . '/lib/plugins/ocean-hooks.zip',
            'required'          => true,
            'force_activation'  => false,
        ),
        array(
            'name'				=> 'Elementor',
            'slug'				=> 'elementor',
            'version'           => '2.0.11',
            'required'			=> true,
            'force_activation'	=> true,
        ),
        array(
            'name'              => 'JetPack',
            'slug'              => 'jetpack',
            'version'           => '6.1',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => '(Woo) WooCommerce',
            'slug'              => 'woocommerce',
            'version'           => '3.3.5',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => '(Woo) WooCommerce Services',
            'slug'              => 'woocommerce-services',
            'version'           => '1.12.3',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => '(Tools) EWWW Image Optimizer',
            'slug'              => 'ewww-image-optimizer',
            'version'           => '4.2.1',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => 'Yoast SEO',
            'slug'              => 'wordpress-seo',
            'version'           => '7.4.2',
            'required'          => true,
            'force_activation'  => true,
        ),
        array(
            'name'              => '(Tools) WP Fastest Cache',
            'slug'              => 'wp-fastest-cache',
            'version'           => '0.8.7.9',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => '(Tools) Duplicate Page',
            'slug'              => 'duplicate-page',
            'version'           => '2.6',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => '(Tools) Wordfence Security',
            'slug'              => 'wordfence',
            'version'           => '7.1.4',
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => '(Tools) All-in-One WP Migration',
            'slug'              => 'all-in-one-wp-migration',
            'version'           => '6.67',
            'required'          => false,
            'force_activation'  => false,
        ),
    );

    // Register notice
    tgmpa( $plugins, array(
        'id'           => 'KEYSTONEWEBSTUDIOS_theme',
        'domain'       => 'KEYSTONEWEBSTUDIOS',
        'menu'         => 'install-required-plugins',
        'has_notices'  => true,
        'is_automatic' => true,
        'dismissable'  => true,
    ) );

}
add_action( 'tgmpa_register', 'eztouse_tgmpa_register' );



add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Developer Setup', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
    //https://www.dropbox.com/s/8ma770dd2mac81m/elementor-coming-soon-template.json?dl=0#
echo '<img src="https://keystonewebstudios.com/wp-content/uploads/2017/08/72-1-1024x443.png" style="width: 100%; margin-top: 25px;"><p>Add a custom dashboard widget by changing this code.</p>';

echo '<hr style="margin-top: 20px; margin-bottom: 20px;" /><p>You can load any custom Wordpress functions in this file. If you have any questions email levi@keystonewebstudios.com</p>';

}
