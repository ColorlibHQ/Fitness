<?php 
/**
 * @Packge     : Fitness
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'fitness_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'fitness' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'fitness_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'fitness' ),
            'panel'    => 'fitness_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'fitness_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'fitness' ),
            'panel'    => 'fitness_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'fitness_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'fitness' ),
            'panel'    => 'fitness_options_panel',
            'priority' => 3,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'fitness_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'fitness' ),
			'panel'    => 'fitness_options_panel',
			'priority' => 4,
		),
	),


	/**
     * 404 Page Section
     */
    array(
        'id'   => 'fitness_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'fitness' ),
            'panel'    => 'fitness_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'fitness_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'fitness' ),
            'panel'    => 'fitness_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
