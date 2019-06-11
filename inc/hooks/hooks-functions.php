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


// Header menu hook function
if( ! function_exists( 'fitness_header_cb' ) ) {
	function fitness_header_cb() {
		if( ! is_404() ) {
			$header = get_post_meta( absint( get_the_ID() ) ,'_fitness_builderpage_header_show', true );
			get_template_part( 'templates/header', 'nav' );
            if( is_home() ){
	            if( fitness_opt('fitness-featured-post-toggle') || fitness_opt( 'fitness-category-show' ) ){

		            if( fitness_opt('fitness-featured-post-toggle') ){
			            fitness_featured_post_cb();
                    }
		            if( fitness_opt( 'fitness-category-show' ) ){
			            fitness_category_block();
                    }

                }else{
		            get_template_part( 'templates/header', 'bottom' );
                }

            }
			elseif( ! is_page_template( 'template-builder.php' ) || $header == 'show'  ) {
				get_template_part( 'templates/header', 'bottom' );
			}

			
		}
		
	}
}
 
// Footer area hook function
if( ! function_exists( 'fitness_footer_area' ) ) {
	function fitness_footer_area() {

		$footerWidget = fitness_opt( 'fitness-widget-toggle-settings', false );

		$noWidgets = ! empty( $footerWidget ) ? 'footer-area section-gap' : ' no-widgets';

		if( ! is_404() ) {
			echo '<footer class="'.esc_attr( $noWidgets ).'"><div class="container">';

			// Footer widget

			if( $footerWidget ) {
				get_template_part( 'templates/footer', 'widgets' );
			}
			
			// Footer bottom
			get_template_part( 'templates/footer', 'bottom' );	

			echo '</div></footer>';
			
		}
	}
}
 
// Footer back to top hook function
if( ! function_exists( 'fitness_back_to_top' ) ) {
	function fitness_back_to_top() {
		$opt = get_theme_mod( 'fitness-gototop-toggle-settings' );
					
		if( $opt ):
			?>
			<div class="btn-back-to-top bg0-hov" id="myBtn">
				<span class="symbol-btn-back-to-top">
					<i class="fa fa-angle-double-up" aria-hidden="true"></i>
				</span>
			</div>
			<?php
		endif;
	}
}

// Blog, single, page, search, archive pages wrapper start hook function.
if( ! function_exists( 'fitness_wrp_start_cb' ) ) {
	function fitness_wrp_start_cb() {
		echo '<section class="post-content-area single-post-area"><div class="container"><div class="row">';
	}
}
// Blog, single, page, search, archive pages wrapper end hook function.
if( ! function_exists( 'fitness_wrp_end_cb' ) ) {
	function fitness_wrp_end_cb() {
		echo '</div></div></section>';
	}
}

//page wrapper start hook function.
if( ! function_exists( 'fitness_page_wrp_start_cb' ) ) {
	function fitness_page_wrp_start_cb() {
		echo '<section class="post-content-area"><div class="container"><div class="row">';
	}
}
// Blog, single, page, search, archive pages wrapper end hook function.
if( ! function_exists( 'fitness_page_wrp_end_cb' ) ) {
	function fitness_page_wrp_end_cb() {
		echo '</div></div></section>';
	}
}


// Blog, single, search, archive pages column start hook function.
if( ! function_exists( 'fitness_blog_col_start_cb' ) ) {
	function fitness_blog_col_start_cb() {
		
		$sidebarOpt = fitness_sidebar_opt();

		//
		if( ! is_page() ) {

			$pullRight  = fitness_pull_right( $sidebarOpt , '3' );

			if( $sidebarOpt != '1' ) {
				$col = '8'.$pullRight;
			} else {
				$col = '10 offset-lg-1';
			}

		} else {
			$col = '8';
		}
		
		echo '<div class="col-lg-'.esc_attr( $col ).' posts-list">';
	}
}
// Blog, single, search, archive pages column end hook function.
if( ! function_exists( 'fitness_blog_col_end_cb' ) ) {
	function fitness_blog_col_end_cb() {
		echo '</div>';
	}
}

// Page column start hook function.
if( ! function_exists( 'fitness_page_col_start_cb' ) ) {
	function fitness_page_col_start_cb() {

		$pagesidebarOpt = fitness_page_sidebar_opt();

		//
		if( is_page() || ! is_home() ) {

			$pullRight  = fitness_pull_right( $pagesidebarOpt , '3' );

			if( $pagesidebarOpt != '1' ) {
				$col = '8'.$pullRight;
			} else {
				$col = '10 offset-lg-1';
			}

		} else {
			$col = '8';
		}

		echo '<div class="col-lg-'.esc_attr( $col ).' ">';
	}
}
// Page column End hook function.
if( ! function_exists( 'fitness_page_col_end_cb' ) ) {
	function fitness_page_col_end_cb() {
		echo '</div>';
	}
}

// Blog post thumbnail hook function.
if( ! function_exists( 'fitness_blog_posts_thumb_cb' ) ) {
	function fitness_blog_posts_thumb_cb() {

		// Thumbnail Show
		if( has_post_thumbnail() ) {
					
			if( !is_single() ) {
			
				$html = '';
				$html .= fitness_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() )
					)
				);
			
			} else {
				
				$html = '';
				$html .= fitness_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() )
					)
				);

			}

			echo wp_kses_post( $html );
			
		}
		// Thumbnail check and video and audio thumb show
		if( ! is_single() && ! has_post_thumbnail() ) {
			$html = '';
			if( has_post_format( array( 'video' ) ) ) {
				
				$html .= '<div class="post--img blog-post-video">';
				$html .= fitness_embedded_media( array( 'video', 'iframe' ) );
				$html .= '</div>';

			} else {

				if( has_post_format( array( 'audio' ) ) ) {
					
					$html .= '<div class="post--img blog-post-audio">';
					$html .= fitness_embedded_media( array( 'audio', 'iframe' ) );
					$html .= '</div>';
				}
			}
			
			echo apply_filters( 'fitness_audio_embedded_media', $html );

		}
	}
}

// Blog post title hook function.
if( ! function_exists( 'fitness_blog_posts_title_cb' ) ) {
	function fitness_blog_posts_title_cb() {
		if( get_the_title() ) {
			
			if( ! is_single() ) {
				echo '<a href="'.esc_url( get_the_permalink() ).'" class="posts-title"><h3>'.esc_html( get_the_title() ).'</h3></a>';
			} else {
				echo '<span class="posts-title"><h3>'.esc_html( get_the_title() ).'</h3></span>';
			}

		}
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'fitness_blog_posts_meta_cb' ) ) {
	function fitness_blog_posts_meta_cb() {
		$tags = fitness_post_tags();
		if( $tags ):
			?>
            <ul class="tags">
				<?php
				echo wp_kses_post( $tags );
				?>
            </ul>
		<?php
		endif;
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'fitness_blog_posts_bottom_meta_cb' ) ) {
	function fitness_blog_posts_bottom_meta_cb() {

		$date_format = get_option( 'date_format' );

		?>
		<div class="user-details row">

			<p class="user-name col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a> <span class="lnr lnr-user"></span></p>
			<p class="date col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( fitness_blog_date_permalink() ); ?>"><?php echo esc_html( get_the_date( $date_format ) ); ?></a> <span class="lnr lnr-calendar-full"></span></p>
			<?php 
			if( fitness_opt('fitness-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
				echo '<p class="view col-lg-12 col-md-12 col-6">'.get_simple_likes_button( absint( get_the_ID() ) ).'</p>';
			}
			?>
			<p class="comments col-lg-12 col-md-12 col-6"><?php echo fitness_posted_comments(); ?></p>
			<?php
			// Social Share Icons
			if( fitness_opt( 'fitness-blog-social-share-toggle' ) && function_exists( 'fitness_social_sharing_buttons' ) ) {
				echo '<div class="social-links col-lg-12 col-md-12 col-6">'.fitness_social_sharing_buttons().'</div>';
			} ?>



		</div>
		<?php
	}
}

// Blog posts excerpt hook function.
if( ! function_exists( 'fitness_blog_posts_excerpt_cb' ) ) {
	function fitness_blog_posts_excerpt_cb() {
		?>
		<div class="p-b-12">
			<?php 
			// Post excerpt
			echo fitness_excerpt_length( esc_html( fitness_opt('fitness_post_excerpt') ) );

			// Link Pages
			fitness_link_pages();
			?>
		</div>	
		<a href="<?php the_permalink(); ?>" class="primary-btn">
			<?php esc_html_e( 'View More', 'fitness' ); ?>
		</a>			
		<?php

	}
}

// Blog posts content hook function.
if( ! function_exists( 'fitness_blog_posts_content_cb' ) ) {
	function fitness_blog_posts_content_cb() {
		the_content();
		// Link Pages
		fitness_link_pages();
	}
}

// Page content hook function.
if( ! function_exists( 'fitness_page_content_cb' ) ) {
	function fitness_page_content_cb() {
		?>
		<div class="page--content">
			<?php 
			the_content();

			// Link Pages
			fitness_link_pages();
			?>

		</div>
		<?php
		// comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

// Blog page sidebar hook function.
if( ! function_exists( 'fitness_blog_sidebar_cb' ) ) {
	function fitness_blog_sidebar_cb() {
		
		$sidebarOpt = fitness_sidebar_opt();
		
		if( $sidebarOpt != '1' ) {
			get_sidebar();
		}
	
			
	}
}

// Page sidebar hook function.
if( ! function_exists( 'fitness_page_sidebar_cb' ) ) {
	function fitness_page_sidebar_cb() {

		$sidebarOpt = fitness_page_sidebar_opt();

		if( $sidebarOpt != '1'  ) {
			get_sidebar();
		}


	}
}


// Blog single post  social share hook function.
if( ! function_exists( 'fitness_blog_posts_share_cb' ) ) {
	function fitness_blog_posts_share_cb() {
					
		if( function_exists( 'fitness_social_sharing_buttons' ) ) {
			fitness_social_sharing_buttons();
		}			
	}
}

/**
 * Blog single post meta category, tag, next-previous link, comments form and biography hook function.
 */
if( ! function_exists('fitness_blog_single_meta_cb') ) {
	function fitness_blog_single_meta_cb() {

		$date_format = get_option( 'date_format' );
		?>


            <p class="user-name col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a> <span class="lnr lnr-user"></span></p>
            <p class="date col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( fitness_blog_date_permalink() ); ?>"><?php echo esc_html( get_the_date( $date_format ) ) ?></a> <span class="lnr lnr-calendar-full"></span></p>
            <?php
            if( fitness_opt('fitness-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
                echo '<p class="view col-lg-12 col-md-12 col-6">'.get_simple_likes_button( absint( get_the_ID() ) ).'</p>';
            }
            ?>
            <p class="comments col-lg-12 col-md-12 col-6"><?php echo fitness_posted_comments(); ?></p>
			<?php
            // Category
            $cats = fitness_post_cats();
            if( $cats ) {
                echo '<div class="category col-lg-12 col-md-12 col-6">' . $cats . '</div>';
            }

            // Social Share Icons
			if( fitness_opt( 'fitness-blog-social-share-toggle' ) && function_exists( 'fitness_social_sharing_buttons' ) ) {
				echo '<div class="social-links col-lg-12 col-md-12 col-6">'.fitness_social_sharing_buttons().'</div>';
			}


	}
}


/** 
 * Blog single footer nav
 */
if( ! function_exists('fitness_blog_single_footer_nav_cb') ) {
	function fitness_blog_single_footer_nav_cb() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
		?>
		<div class="navigation-area">
            <div class="row">
            	<?php 
            	$offset = ' offset-sm-6';
            	if( get_next_post_link() ):
            		$offset = '';
            		$nextPost = get_next_post();
            	?>
                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                    <?php if( has_post_thumbnail() ){ ?>
                        <div class="thumb">
							<a href="<?php the_permalink( absint( $nextPost->ID ) ) ?>">
								<?php
								$url = get_the_post_thumbnail_url( absint( $nextPost->ID ), 'fitness-np-thumb' );
								echo fitness_img_tag(
									array(
										'url'	=> esc_url( $url ),
										'class'	=> esc_attr( 'img-fluid' )
									)
								);
								?>
							</a>
						</div>
						<div class="arrow">
							<a href="<?php the_permalink( absint( $nextPost->ID ) ) ?>"><span class="lnr text-white lnr-arrow-left"></span></a>
						</div>
                    <?php
                    } ?>
                    <div class="details">
                        <p><?php esc_html_e( 'Next Post', 'fitness' ); ?></p>
                        <h4><?php echo get_next_post_link( '%link', '%title', false ); ?></h4>
                    </div>
                </div>
				<?php 
				endif;
				//
            	if( get_previous_post_link() ):
            		$prevPost = get_previous_post();
				?>

				<div class="col-lg-6 <?php echo esc_attr( $offset ); ?> col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">			
                    <div class="details">
                        <p><?php esc_html_e( 'Prev Post', 'fitness' ); ?></p>
                        <h4><?php echo get_previous_post_link( '%link', '%title','', false ); ?></h4>
					</div>
					<div class="arrow">
						<a href="<?php the_permalink( absint( $prevPost->ID ) ) ?>"><span class="lnr text-white lnr-arrow-right"></span></a>
					</div>
		            <?php if( has_post_thumbnail() ){ ?>
                        <div class="thumb">
							<a href="<?php the_permalink( absint( $prevPost->ID ) ) ?>">
								<?php
								$url = get_the_post_thumbnail_url( absint( $prevPost->ID ), 'fitness-np-thumb' );
								echo fitness_img_tag(
									array(
										'url' 	 => esc_url( $url ),
										'class'	 => esc_attr( 'img-fluid' )
									)
								);
								?>
							</a>
						</div>
						
			            <?php
		            } ?>
                </div>
				<?php 
				endif;
				?>
            </div>   
        </div>
		<?php
		endif;

		// Author biography
		if( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'templates/biography' );
		}
	}
}

// Blog 404 page hook function.
if( ! function_exists( 'fitness_fof_cb' ) ) {
	function fitness_fof_cb() {
		get_template_part( 'templates/404' );			
	}
}


// Featured Post
if( ! function_exists( 'fitness_featured_post_cb' ) ) {
	function fitness_featured_post_cb() {
		$postID       = fitness_opt( 'fitness_featured_post' );
		$featuredPost = new WP_Query( array( 'p' => $postID, 'post_type' => 'post' ) );
		if ( $featuredPost->have_posts() ) {
			while ( $featuredPost->have_posts() ) {
				$featuredPost->the_post();

				$bgImg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				?>
                <section class="banner-area relative blog-home-banner" id="home"
                         style="background-image: url(<?php echo esc_url( $bgImg ); ?>)">
                    <div class="overlay overlay-bg"></div>
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content blog-header-content col-lg-12">
                                <h1 class="text-white">
									<?php the_title(); ?>
                                </h1>
                                <p class="text-white">
									<?php echo wp_trim_words( get_the_content(), 15, '' ); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>"
                                   class="primary-btn"><?php echo esc_html__( 'View More', 'fitness' ); ?></a>
                            </div>
                        </div>
                    </div>
                </section>

				<?php
			}
		}
	}
}

// Category Block
    function fitness_category_block(){
        ?>
        <section class="top-category-widget-area pt-90">
            <div class="container">
                <div class="row">
                    <?php
                    $cats = get_categories( array( 'number' => absint( fitness_opt( 'fitness_cat_number', 3 ) ) ) );

                    if( ! empty( $cats ) ):
                        foreach( $cats as $cat ):
                            $imgId = get_term_meta ( absint( $cat ->term_id ), 'category-image-id', true );
                            ?>
                            <div class="col-lg-4">
                                <div class="single-cat-widget">
                                    <div class="content relative">
                                        <div class="overlay overlay-bg"></div>
                                        <a href="<?php echo esc_url( get_category_link( absint( $cat->term_id ) ) ); ?>" target="_blank">
                                            <div class="thumb">
                                                <?php
                                                echo wp_get_attachment_image( absint( $imgId ), 'full' , array( 'class' => 'content-image img-fluid d-block mx-auto' )  );
                                                ?>
                                            </div>
                                            <div class="content-details">
                                                <h4 class="content-title mx-auto text-uppercase"><?php echo esc_html( $cat ->name ) ?></h4>
                                                <span></span>
                                                <?php
                                                if( ! empty( $cat->description ) ) {
                                                    echo '<p>' . esc_html( $cat->description ) . '</p>';
                                                }
                                                ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </section>
    <?php
    }