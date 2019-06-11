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
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'fitness_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_general_options_section',
        'default'     => '#f6214b',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'fitness_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'fitness' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'fitness' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'fitness_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);


/***********************************
 * Header Section Fields
 ***********************************/

// Header top Phone number
Epsilon_Customizer::add_field(
	'fitness-header-top-phone',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Phone Number', 'fitness' ),
		'section'     => 'fitness_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '+953 012 3654 896',
	)
);
// Header top email
Epsilon_Customizer::add_field(
	'fitness-header-top-email',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Email Address', 'fitness' ),
		'section'     => 'fitness_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'support@colorlib.com',
	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'fitness_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav-bar Background Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_headertop_options_section',
        'default'     => '',
    )
);

// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'fitness_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_headertop_options_section',
        'default'     => '',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'fitness_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'fitness_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'fitness_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'fitness_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_headertop_options_section',
        'default'     => '#fff',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'fitness_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(4,9,30,0.85)',
    )
);
// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'fitness_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);
// Header overlay switch field
Epsilon_Customizer::add_field(
    'fitness-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'fitness' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'fitness_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(0,0,0,0.2)',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
// Featured Post
Epsilon_Customizer::add_field(
	'fitness-featured-post-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured post Show/Hide', 'fitness' ),
		'section'     => 'fitness_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'fitness_featured_post',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Featured Post ID', 'fitness' ),
		'section'     => 'fitness_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '',
	)
);

// Category show
Epsilon_Customizer::add_field(
	'fitness-category-show',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured Category Show/Hide', 'fitness' ),
		'section'     => 'fitness_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
// Category Number
Epsilon_Customizer::add_field(
	'fitness_cat_number',
	array(
		'type'        => 'epsilon-slider',
		'label'       => esc_html__( 'Featured Category Number', 'fitness' ),
		'description' => esc_html__( 'Set how many featured categories you want to show in blog page top.', 'fitness' ),
		'section'     => 'fitness_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '3',
	)
);

// Post excerpt length field
Epsilon_Customizer::add_field(
    'fitness_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'fitness' ),
        'description' => esc_html__( 'Set post excerpt length.', 'fitness' ),
        'section'     => 'fitness_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'fitness-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'fitness' ),
        'section'  => 'fitness_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'fitness' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'FITNESS_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'fitness-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'fitness' ),
        'section'     => 'fitness_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'fitness-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'fitness' ),
        'section'     => 'fitness_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'fitness-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'fitness' ),
		'section'  => 'fitness_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'fitness' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
			'3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				),
				3 => array(
					'index' => 3,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'fitness_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'fitness' ),
        'section'           => 'fitness_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'fitness_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'fitness' ),
        'section'           => 'fitness_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'fitness_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'fitness_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'fitness_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'fitness-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'fitness' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'fitness' ),
        'section'     => 'fitness_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'fitness' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'fitness-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'fitness' ),
        'section'     => 'fitness_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'fitness_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'fitness_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'fitness_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'fitness_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#222',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'fitness_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'fitness_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#f6214b',
    )
);

// Footer bottom text Color
Epsilon_Customizer::add_field(
    'fitness_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#777',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'fitness_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#f6214b',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'fitness_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'fitness' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitness_footer_options_section',
        'default'     => '#f6214b',
    )
);
