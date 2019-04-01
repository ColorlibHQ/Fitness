<?php
/**
 * @Packge     : Fitness Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'FITNESS_COMPANION_VERSION' ) ) {
    define( 'FITNESS_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'FITNESS_COMPANION_DIR_PATH' ) ) {
    define( 'FITNESS_COMPANION_DIR_PATH',  get_parent_theme_file_path().'/inc/fitness-companion/' );
}

// Define inc dir path constant
if( ! defined( 'FITNESS_COMPANION_INC_DIR_PATH' ) ) {
    define( 'FITNESS_COMPANION_INC_DIR_PATH', FITNESS_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'FITNESS_COMPANION_SW_DIR_PATH' ) ) {
    define( 'FITNESS_COMPANION_SW_DIR_PATH', FITNESS_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'FITNESS_COMPANION_EW_DIR_PATH' ) ) {
    define( 'FITNESS_COMPANION_EW_DIR_PATH', FITNESS_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'FITNESS_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'FITNESS_COMPANION_DEMO_DIR_PATH', FITNESS_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'FITNESS_THEME_DIR_URL' ) ) {
    define( 'FITNESS_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'FITNESS_COMPANION_DIR_URL' ) ) {
    define( 'FITNESS_COMPANION_DIR_URL', FITNESS_THEME_DIR_URL . '/inc/fitness-companion/' );
}

// Define inc dir url constant
if( ! defined( 'FITNESS_COMPANION_INC_DIR_URL' ) ) {
    define( 'FITNESS_COMPANION_INC_DIR_URL', FITNESS_COMPANION_DIR_URL . '/inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'FITNESS_COMPANION_EW_DIR_URL' ) ) {
    define( 'FITNESS_COMPANION_EW_DIR_URL', FITNESS_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define Demo Data dir url constant
if( ! defined( 'FITNESS_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'FITNESS_COMPANION_DEMO_DIR_URL', FITNESS_COMPANION_INC_DIR_URL . 'demo-data/' );
}

// Define Meta dir url constant
if( ! defined( 'FITNESS_COMPANION_META_DIR_URL' ) ) {
    define( 'FITNESS_COMPANION_META_DIR_URL', FITNESS_COMPANION_INC_DIR_URL . 'fitness-meta/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Fitness' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Fitness' == $is_parent->get( 'Name' ) ) ) {
    require_once FITNESS_COMPANION_DIR_PATH . 'fitness-init.php';
} else {

    add_action( 'admin_notices', 'fitness_companion_admin_notice', 99 );
    function fitness_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/fitness/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Fitness Companion</strong> plugin you have to also install the %1$sFitness Theme%2$s', 'fitness' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
