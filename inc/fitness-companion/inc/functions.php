<?php 
/**
 * @Packge     : Fitness Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'fitness_260x180', 260, 180, true );


// Instagram object Instance
function fitness_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function fitness_blog_section( $postnumber ) {
    
    ?>
    <div class="row">
        <?php   
        $date_format = get_option( 'date_format' );

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_html( $postnumber ),
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ):
            while( $query->have_posts() ):
                $query->the_post();
                ?>

                <div class="col-lg-3 col-md-6 single-blog">
	                <?php
                    // Thumbnail
	                if( has_post_thumbnail() ) {
		                echo '<div class="thumb">';
		                the_post_thumbnail( 'fitness_260x180', array( 'class' => 'img-fluid' ) );
		                echo '</div>';
	                }
	                ?>
                    <p class="date"><?php echo esc_html( get_the_date( esc_html( $date_format ) ) ); ?></p>
                    <a href="<?php the_permalink(); ?>">
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <?php
                        // Limited Excerpt
                        echo fitness_excerpt_length( '9' );
                    ?>
                    <div class="meta-bottom d-flex justify-content-between">
	                    <?php
	                    if( fitness_opt('fitness-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
		                    echo '<p><span class="lnr lnr-heart"></span>'.get_simple_likes_button( absint( get_the_ID() ) ).'</p>';
	                    }
	                    ?>
                        <p><?php echo fitness_posted_comments(); ?></p>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
}

// 
function fitness_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
        ?>
        <div class="row section-title">
            <?php 
            // Title
            if( $title ){
                echo fitness_heading_tag(
                    array(
                        'tag'   => 'h1',
                        'text'  => esc_html( $title ),
                    )
                );
            }
            // Sub Title
            if( $subtitle ){
                echo fitness_paragraph_tag(
                    array(
                        'text'  => esc_html( $subtitle ),
                    )
                );
            }
            ?>
        </div>
        <?php
    endif;
}

// Set contact form 7 default form template
function fitness_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {
        $template =
            '<div class="row"><div class="col-lg-6 form-group">[text* text-650 class:common-input class:mb-20 class:form-control placeholder "Enter your name"][email* email-694 class:common-input class:mb-20 class:form-control placeholder "Enter email address"][text* subject class:common-input class:mb-20 class:form-control placeholder "Enter subject"]</div><div class="col-lg-6 form-group">[textarea* message class:common-textarea class:form-control placeholder "Enter message"]</div><div class="col-lg-12"><div class="alert-msg" style="text-align: left;"></div>[submit class:genric-btn class:primary "Send message"]</div></div>';
        return $template;
    } 
    else {
        return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'fitness_contact7_form_content', 10, 2 );
