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

// enqueue css
function fitness_common_custom_css() {

	wp_enqueue_style( 'fitness-common', get_template_directory_uri().'/assets/css/common.css' );

	$headerBg          	 = ! empty( get_header_image() ) ? 'background-image:url(' . esc_url( get_header_image() ) . ')' : '';

	$headerTextColor     = esc_attr( fitness_opt( 'fitness_headertextcolor', '#fff' ) );
	$headerbgcolor       = esc_attr( fitness_opt( 'fitness_headerbgcolor', 'rgba(4,9,30,0.85)' ) );
	$headerOverlay       = esc_attr( fitness_opt( 'fitness_headeroverlaycolor', 'rgba(0,0,0,0.2)' ) );
	$stickynavbarbg      = esc_attr( fitness_opt( 'fitness_header_navbarsticky_bgColor', '#f6214b' ) );
	$navbarBgColor       = esc_attr( fitness_opt( 'fitness_header_navbar_bgColor', '#f6214b' ) );
	$navmenuColor 		 = esc_attr( fitness_opt( 'fitness_header_navbar_menuColor', '#fff' ) );
	$navmenuHovColor 	 = esc_attr( fitness_opt( 'fitness_header_navbar_menuHovColor', '#fff' ) );
	$stickynavmenuColor  = esc_attr( fitness_opt( 'fitness_header_sticky_navbar_menuColor', '#fff' ) );
	$stickynavmenuHovColor = esc_attr( fitness_opt( 'fitness_header_sticky_navbar_menuHovColor', '#fff' ) );
	$foftext1     	     = esc_attr( fitness_opt( 'fitness_fof_textonecolor_settings', '#404551' ) );
	$foftext2     	     = esc_attr( fitness_opt( 'fitness_fof_texttwocolor_settings', '#abadbe' ) );
	$fofbgcolor          = esc_attr( fitness_opt( 'fitness_fof_bgcolor_settings', '#fff' ) );
	
	//Footer Widget Background
	$footerbgImg         = fitness_opt( 'fitness_footer_bgimg_settings' );
	$footerbgImg 		 = json_decode( $footerbgImg );
	$footerbgImgAttr 	 = '';
	if( ! empty( $footerbgImg->url ) ) {
		$footerbgImgAttr = 'background-image:url( ' .esc_url( $footerbgImg->url ). ' );';
	}

	$footerbgColor     = esc_attr( fitness_opt( 'fitness_footer_widget_bgColor_settings', '#fff' ) );
	$footerTextColor   = esc_attr( fitness_opt( 'fitness_footer_widget_color_settings', '#777' ) );
	$anchorcolor 	   = esc_attr( fitness_opt( 'fitness_footer_widget_anchorcolor_settings', '#777' ) );
	$anchorhovcolor    = esc_attr( fitness_opt( 'fitness_footer_widget_anchorhovcolor_settings', '#f6214b' ) );
	$widgettitlecolor  = esc_attr( fitness_opt( 'fitness_footer_widgettitlecolor_settings', '#222' ) );
	$themecolor  	   = esc_attr( fitness_opt( 'fitness_themecolor', '#f6214b' ) );

	$footerbtomtextcolor 		= esc_attr( fitness_opt( 'fitness_footer_bottom_textcolor_settings', '#777' ) );
	$footerbtomanchorcolor 		= esc_attr( fitness_opt( 'fitness_footer_bottom_anchorcolor_settings', '#f6214b' ) );
	$footerbtomanchorhovercolor = esc_attr( fitness_opt( 'fitness_footer_bottom_anchorhovercolor_settings', '#f6214b' ) );

	$customcss ="
				
			.genric-btn.primary,
			.genric-btn.primary-border:hover,
			.default-switch input + label,
			.primary-switch input:checked + label:before,
			.top-head-btn, .single-footer-widget .click-btn,
			.primary-btn,
			.image-carusel-area .owl-dot.active,
			.testomial-area .owl-dot.active,
			.generic-banner,
			.blog-posts-area .single-blog-post .primary-btn:hover,
			.blog-pagination .page-item.active .page-link,
			.blog-pagination .page-link:hover,
			.search-widget form.search-form input[type=text],
			.search-widget form.search-form button,
			.single-sidebar-widget .popular-post-widget .popular-title,
			.single-sidebar-widget .category-title,
			.widget-wrap .newsletter-widget .newsletter-title,
			.widget-wrap .newsletter-widget .bbtns,
			.widget-wrap .tag-cloud-widget .tagcloud-title,
			.widget-wrap .tag-cloud-widget ul li:hover,
			.comments-area .btn-reply:hover,
			.pagination a.active-pagination,
			.pagination a:hover,
			.blog-detail-txt [type='submit'],
			.default-switch input+label,
			.page-links a span:hover,
			.post-content-area .single-post .primary-btn:hover,
			.widget-wrap .search-widget form.search-form input[type=text],
			.widget-wrap .search-widget form.search-form button,
			.widget_fitness_recent_widget .popular-title,
			.widget-wrap .single-sidebar-widget .widgets-title,
			.primary-switch input:checked+label:before,
			.content--area .page-links a span:hover,
			.tagcloud a:hover, 
			.tags-widget ul li:hover,
			.pagination .nav-links .current, .pagination .nav-links .page-numbers:hover,
			.top-category-widget-area .single-cat-widget:hover .overlay-bg,
			.global-banner {
				background-color: {$themecolor};
			}

			b, 
			sup, 
			sub, 
			u,
			del,
			.genric-btn.primary:hover,
			.genric-btn.primary-border,
			.ordered-list li,
			.ordered-list-alpha li,
			.ordered-list-roman li,
			.default-select .nice-select .list .option.selected,
			.default-select .nice-select .list .option:hover,
			.form-select .nice-select .list .option.selected,
			.form-select .nice-select .list .option:hover,
			.header-top .header-top-left a:hover i,
			.nav-menu ul li:hover > a,
			#mobile-nav ul .menu-has-children i.fa-chevron-up,
			#mobile-nav ul .menu-item-active,
			.primary-btn:hover,
			.primary-btn.white:hover,
			.primary-btn.white:hover span,
			.about-video-left h6,
			.single-feature .icon .fa,
			.feature-area .single-feature:hover h4, .feature-area .single-feature:hover .fa,
			.process-area .single-process:hover .fa,
			.single-testimonial:hover h4,
			.footer-area .footer-widget .footer-nav li a:hover,
			.footer-area .copyright-text a,
			.footer-area .copyright-text .footer-social a:hover,
			.contact-page-area .form-area .primary-btn:hover,
			.contact-page-area .wpcf7-form .primary-btn:hover,
			.contact-page-area .single-contact-address .fa,
			.contact-page-area .single-contact-address span,
			.blog-posts-area .single-blog-post .meta-details .tags li a:hover,
			.blog-posts-area .single-blog-post .user-name a:hover, 
			.blog-posts-area .single-blog-post .date a:hover, 
			.blog-posts-area .single-blog-post .view a:hover, 
			.blog-posts-area .single-blog-post .comments a:hover,
			.protfolio-widget .social-links li a:hover,
			.single-widget ul li:hover p,
			.single-blog-post .social-links li a:hover,
			.single-blog-post .tags li:first-child:after,
			.single-blog-post .tags li:hover a,
			.single-blog-post .tags li:hover a,
			.single-blog:hover h4,
			.footer-widget ul li a:hover,
			.single-service h4:hover,
			.post-content-area .single-post .meta-details .tags li a:hover,
			.post-content-area .single-post .user-name a:hover,
			.post-content-area .single-post .date a:hover,
			.post-content-area .single-post .view a:hover,
			.post-content-area .single-post .comments a:hover,
			.widget-wrap .user-info-widget .social-links li a:hover,
			.widget-wrap .post-category-widget .cat-list li:hover p,
			.copy-right-text i, .copy-right-text a,
			.footer-text a, .footer-text i,
			.footer-area .footer-nav li a:hover,
			.appoinment-area .appoinment-right .primary-btn:hover,
			.home-about-area .single-services span,
			.default-select .nice-select .list .option.selected,
			.comment-form .primary-btn:hover,
			.single-sidebar-widget ul li:hover a,
			.footer-social a:hover i,
			.widget-wrap .widget_fitness_recent_widget .single-post-list .details h6:hover {
				color: {$themecolor};
			}
			.genric-btn.primary:hover,
			.genric-btn.primary-border,
			blockquote,
			.generic-blockquote,
			.unordered-list li:before,
			.single-input-primary:focus,
			#header #logo h1 a, #header #logo h1 a:hover,
			.primary-btn:hover,
			.contact-page-area .form-area .primary-btn:hover,
			.contact-page-area .wpcf7-form .primary-btn:hover,
			.single-widget ul li:hover,
			.pagination a,
			.appoinment-area .appoinment-right .primary-btn:hover,
			.blog-post-list  .single-blog-post.sticky,
			.blog-detail-txt [type='submit'],
			.comment-form .primary-btn:hover,
			.page-links a span,
			.page-links span:not(:first-child), 
			.content--area .page-links a span, 
			.content--area .page-links span:not(:first-child),
			.widget-wrap .post-category-widget .cat-list li:hover,
			.single-sidebar-widget ul li:hover {
				border-color: {$themecolor};
			}

			.global-banner {
				{$headerBg};
			}
			.banner-area .overlay-bg,
			.global-banner .overlay-bg {
				background-color: {$headerOverlay}
			}
			.about-content h1, 
			.about-content a,
			.bread-crumb.link-nav {
				color: {$headerTextColor};
			}
			.global-banner {
				background-color: {$headerbgcolor}
			}

			#f0f{
				background-color: {$fofbgcolor}
			}
			.inner-child-fof .h1 {
				color: {$foftext1}
			}
			.inner-child-fof a,
			.inner-child-fof p {
				color: {$foftext2}
			}
			.footer-area{
				{$footerbgImgAttr};
				background-color: {$footerbgColor};
				color: {$footerTextColor};
			}
			caption,
			footer-widget p,
			.footer-widget,
			footer {
				color: {$footerTextColor};
			}
			.single-footer-widget ul li a,
			.footer-widget a {
				color: {$anchorcolor};
			}
			.footer-widget a:hover,
			.footer-widget ul li a:hover,
			.footer-bottom a:hover{
				color: {$anchorhovcolor};
			}
			.footer-area .footer-widget h4{
				color: {$widgettitlecolor};
			}
			.footer-area .footer-text{
				color: {$footerbtomtextcolor};
			}
			.footer-area .footer-text a {
				color: {$footerbtomanchorcolor};
			}
			.footer-area .footer-text a:hover {
				color: {$footerbtomanchorhovercolor};
			}
			.main-menu {
				background-color: {$navbarBgColor};
			}
			.header-scrolled .main-menu,
			#header.header-scrolled {
				background: {$stickynavbarbg};
			}
			.nav-menu a {
				color: {$navmenuColor};
			}
			.nav-menu li:hover > a, 
			.nav-menu > .menu-active > a,
			.nav-menu a:hover {
				color: {$navmenuHovColor};
			}
			.header-scrolled .nav-menu > li > a {
				color: {$stickynavmenuColor};
			}
			.header-scrolled .nav-menu > li > a:hover {
				color: {$stickynavmenuHovColor};
			}


        ";

	wp_add_inline_style( 'fitness-common', $customcss );

}
add_action( 'wp_enqueue_scripts', 'fitness_common_custom_css', 50 );