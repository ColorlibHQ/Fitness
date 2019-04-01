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
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'fitness_preloader', 'fitness_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'fitness_header', 'fitness_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'fitness_footer', 'fitness_footer_area', 10 );
add_action( 'fitness_footer', 'fitness_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'fitness_wrp_start', 'fitness_wrp_start_cb', 10 );
add_action( 'fitness_wrp_end', 'fitness_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'fitness_page_wrp_start', 'fitness_page_wrp_start_cb', 10 );
add_action( 'fitness_page_wrp_end', 'fitness_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'fitness_blog_col_start', 'fitness_blog_col_start_cb', 10 );
add_action( 'fitness_blog_col_end', 'fitness_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'fitness_page_col_start', 'fitness_page_col_start_cb', 10 );
add_action( 'fitness_page_col_end', 'fitness_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'fitness_blog_posts_thumb', 'fitness_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'fitness_blog_posts_title', 'fitness_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'fitness_blog_posts_meta', 'fitness_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'fitness_blog_posts_bottom_meta', 'fitness_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'fitness_blog_posts_excerpt', 'fitness_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'fitness_blog_posts_content', 'fitness_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'fitness_blog_sidebar', 'fitness_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'fitness_page_sidebar', 'fitness_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'fitness_blog_posts_share', 'fitness_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'fitness_blog_single_meta', 'fitness_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'fitness_blog_single_footer_nav', 'fitness_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'fitness_page_content', 'fitness_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'fitness_fof', 'fitness_fof_cb', 10 );
