<?php
namespace Fitnesselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Fitness elementor Team Member section widget.
 *
 * @since 1.0
 */
class Fitness_Gallery extends Widget_Base {

	public function get_name() {
		return 'fitness-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'gallery_heading',
            [
                'label' => __( 'Gallery Section Heading', 'fitness' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'fitness' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'fitness' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_block',
			[
				'label' => __( 'Gallery', 'fitness' ),
			]
		);
		$this->add_control(
            'gallery_content', [
                'label' => __( 'Upload Imgaes', 'fitness' ),
                'type'  => Controls_Manager::GALLERY,
                                
            ]
		);

		$this->end_controls_section(); // End Gallery content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Style Section Heading', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => esc_html__( 'Section Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .section-title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .section-title h1',
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_desc',
                'selector'  => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $img_gallery = ! empty( $settings['gallery_content'] ) ? $settings['gallery_content'] : '';
    ?>
    <section class="image-gallery-area section-gap">
        <div class="container">
            <?php
                // Section Heading
                fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>					
            <div class="row">
                <div class="col-lg-4 single-gallery">
                    <?php 
                    $count = count( $img_gallery );
                    $i = 0;
                    foreach( $img_gallery as $gallery ){
                        $i++;
                        echo '<a href="'. $gallery['url'] .'" class="img-gal"><img class="img-fluid" src="'. $gallery['url'] .'" alt="'.__('gallery image', 'fitness').'"></a>';

                        if( $i % 2 == 0 && $count >$i ) {
                            echo '</div><div class="col-lg-4 single-gallery">';
                        }
                        
                    }

                    ?>
                </div>	
				
            </div>
        </div>	
    </section>
    <?php

    }

}
