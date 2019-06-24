<?php 
/**
 * @Packge 	   : fitness
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 *
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'FITNESS_DIR_URI' ) ) {
	define( 'FITNESS_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'FITNESS_DIR_ASSETS_URI' ) ) {
	define( 'FITNESS_DIR_ASSETS_URI', FITNESS_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'FITNESS_DIR_CSS_URI' ) ) {
	define( 'FITNESS_DIR_CSS_URI', FITNESS_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'FITNESS_DIR_JS_URI' ) ) {
	define( 'FITNESS_DIR_JS_URI', FITNESS_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'FITNESS_DIR_PATH' ) ) {
	define( 'FITNESS_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'FITNESS_DIR_PATH_INC' ) ) {
	define( 'FITNESS_DIR_PATH_INC', FITNESS_DIR_PATH.'inc/' );
}

//fitness libraries Folder Directory
if( ! defined( 'FITNESS_DIR_PATH_LIBS' ) ) {
	define( 'FITNESS_DIR_PATH_LIBS', FITNESS_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'FITNESS_DIR_PATH_CLASSES' ) ) {
	define( 'FITNESS_DIR_PATH_CLASSES', FITNESS_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'FITNESS_DIR_PATH_HOOKS' ) ) {
	define( 'FITNESS_DIR_PATH_HOOKS', FITNESS_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'FITNESS_DIR_PATH_WIDGET' ) ) {
	define( 'FITNESS_DIR_PATH_WIDGET', FITNESS_DIR_PATH_INC.'widgets/' );
}


// Admin Enqueue script
function fitness_admin_script(){
    wp_enqueue_style( 'fitness-admin', get_template_directory_uri().'/assets/css/fitness_admin.css', false, '1.0.0' );
    wp_enqueue_script( 'fitness_admin', get_template_directory_uri().'/assets/js/fitness_admin.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'fitness_admin_script' );


/**
 * Include File
 *
 */

require_once( FITNESS_DIR_PATH_INC . 'fitness-companion/fitness-companion.php' );
require_once( FITNESS_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( FITNESS_DIR_PATH_INC . 'category-meta.php' );
require_once( FITNESS_DIR_PATH_INC . 'widgets-reg.php' );
require_once( FITNESS_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( FITNESS_DIR_PATH_INC . 'fitness-functions.php' );
require_once( FITNESS_DIR_PATH_INC . 'commoncss.php' );
require_once( FITNESS_DIR_PATH_INC . 'support-functions.php' );
require_once( FITNESS_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( FITNESS_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( FITNESS_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( FITNESS_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( FITNESS_DIR_PATH_HOOKS . 'hooks.php' );
require_once( FITNESS_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( FITNESS_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( FITNESS_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate fitness object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new fitness();
