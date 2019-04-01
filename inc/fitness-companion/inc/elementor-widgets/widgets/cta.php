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
 * Fitness elementor few words section widget.
 *
 * @since 1.0
 */
class Fitness_Cta extends Widget_Base {

	public function get_name() {
		return 'fitness-cta';
	}

	public function get_title() {
		return __( 'Call to Action', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'sh_content',
            [
                'label' => __( 'Select Call to Action Style', 'fitness' ),
            ]
        );
        $this->add_control(
            'select_cta',
            [
                'label'       => esc_html__( 'Select Call to Action Style', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::SELECT,
                'options'      => [
                    'style_1'   => esc_html__('Single Column', 'fitness'),
                    'style_2'   => esc_html__('Dual Column', 'fitness')
                ],
                'default'     => 'style_1'
            ]
        );
        $this->end_controls_section(); // End few words content

        // Single Column Call to Action Settings
        $this->start_controls_section(
            'single_cta_sec',
            [
                'label' => __( 'Call to Action', 'fitness' ),
                'condition' => [
                    'select_cta' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'single_col_title',
            [
                'label'       => esc_html__( 'Title', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( "It's never late to start, join us today!", "fitness" )
            ]
        );
        $this->add_control(
            'single_col_desc',
            [
                'label'       => esc_html__( 'Description', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Thinking about overseas adventure travel? Have you put any thought into the best places to go when it comes to overseas adventure travel? Nepal is one of the most popular places of all.', 'fitness' )
            ]
        );
        $this->add_control(
            'single_col_btn_label',
            [
                'label'       => esc_html__( 'Button Label', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Become a Member', 'fitness' )
            ]
        );
        $this->add_control(
            'single_col_btn_url',
            [
                'label'       => esc_html__( 'Button URL', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => esc_html__( 'Background', 'fitness' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .callto-area',
            ]
        );

        $this->end_controls_section();
        //End  Single Column Call to Action Settings

        // Left Column Call to Action Settings ==============================
        $this->start_controls_section(
            'dual_col_cta_sec',
            [
                'label' => __( 'Left Column Call to Action', 'fitness' ),
                'condition' => [
                    'select_cta' => 'style_2'
                ]
            ]
        );
        $this->add_control(
            'left_col_title',
            [
                'label'       => esc_html__( 'Title', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( "Get into shape now", "fitness" )
            ]
        );
        $this->add_control(
            'left_col_subtitle',
            [
                'label'       => esc_html__( 'Sub-title', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Book an appointment', 'fitness' )
            ]
        );
        $this->add_control(
            'left_col_btn_label',
            [
                'label'       => esc_html__( 'Button Label', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Book Now', 'fitness' )
            ]
        );
        $this->add_control(
            'left_col_btn_url',
            [
                'label'       => esc_html__( 'Button URL', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'left_sectionbg',
                'label' => esc_html__( 'Background', 'fitness' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cta1',
            ]
        );

        $this->end_controls_section();

        // Right Column Call to Action Settings =====================================
        $this->start_controls_section(
            'right_col_cta_sec',
            [
                'label' => __( 'Right Column Call to Action', 'fitness' ),
                'condition' => [
                    'select_cta' => 'style_2'
                ]
            ]
        );
        $this->add_control(
            'right_col_title',
            [
                'label'       => esc_html__( 'Title', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( "Get into shape now", "fitness" )
            ]
        );
        $this->add_control(
            'right_col_subtitle',
            [
                'label'       => esc_html__( 'Sub-title', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Book an appointment', 'fitness' )
            ]
        );
        $this->add_control(
            'right_col_btn_label',
            [
                'label'       => esc_html__( 'Button Label', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Book Now', 'fitness' )
            ]
        );
        $this->add_control(
            'right_col_btn_url',
            [
                'label'       => esc_html__( 'Button URL', 'fitness' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'right_sectionbg',
                'label' => esc_html__( 'Background', 'fitness' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cta2',
            ]
        );

        $this->end_controls_section();
        // End Dual Column ================================================



        //------------------------------ Style CTA Full width Settings  ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Call To Action', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_cta' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .call-wrap h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .call-wrap h1',
            ]
        );

        $this->add_control(
            'color_cta_desc', [
                'label'     => __( 'Description Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .call-wrap p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_cta_desc',
                'selector'  => '{{WRAPPER}} .call-wrap p',
            ]
        );
        $this->add_control(
            'color_btn_label', [
                'label'     => __( 'Button Label Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .call-wrap .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btn_hover_label', [
                'label'     => __( 'Button Hover Label Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .call-wrap .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btn_bg', [
                'label'     => __( 'Button Background Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .call-wrap .primary-btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btn_hover_bg', [
                'label'     => __( 'Button Hover Background Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .call-wrap .primary-btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style CTA Dual Column Settings ------------------------------
        $this->start_controls_section(
            'style_cta_2', [
                'label' => __( 'Style CTA Dual Column', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_cta' => 'style_2'
                ]
            ]
        );
        $this->add_control(
            'color_cta_cl', [
                'label'     => __( 'Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-cta h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_title_typo_cl',
                'selector'  => '{{WRAPPER}} .single-cta h1',
            ]
        );

        $this->add_control(
            'color_cta_subt_cl', [
                'label'     => __( 'Sub-title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-cta h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_subt_typo_cl',
                'selector'  => '{{WRAPPER}} .single-cta h6',
            ]
        );
        $this->add_control(
            'color_cta_btn_cl', [
                'label'     => __( 'Button Label Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-cta .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hover_cl', [
                'label'     => __( 'Button Hover Label Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .single-cta .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_bg_cl', [
                'label'     => __( 'Button Background Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .single-cta .primary-btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hbg_cl', [
                'label'     => __( 'Button Hover Background Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-cta .primary-btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();




	}

	protected function render() {

        $settings = $this->get_settings();


        if( $settings['select_cta'] == 'style_1' ){
            ?>
            <section class="callto-area section-gap relative">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row">
                        <div class="call-wrap mx-auto">
                        <?php 
                            // Title
                            if( !empty( $settings['single_col_title'] ) ){
                                echo fitness_heading_tag(
                                    array(
                                        'tag'   => 'h1',
                                        'text'  => esc_html( $settings['single_col_title'] ),
                                    )
                                );
                            }
                            // Sub Title
                            if( !empty( $settings['single_col_desc'] ) ){
                                echo fitness_paragraph_tag(
                                    array(
                                        'text'  => esc_html( $settings['single_col_desc'] ),
                                    )
                                );
                            }

                            if( ! empty( $settings['single_col_btn_label'] ) ){ ?>
                                <a href="<?php echo esc_url( $settings['single_col_btn_url']['url'] ) ?>" class="primary-btn"><?php echo esc_html( $settings['single_col_btn_label'] ) ?></a>
                                <?php
                            }
                            ?>				
                        </div>
                    </div>
                </div>	
            </section>
            <?php 
        } 
        elseif( $settings['select_cta'] == 'style_2' ){ ?>
            <section class="cta-area">
				<div class="container-fluid">
					<div class="row no-padding">
						<div class="col-lg-6 single-cta cta1 no-padding section-gap relative">
                        <div class="overlay overlay-bg"></div>
                        <?php 
                            // Sub Title
                            if( !empty( $settings['left_col_subtitle'] ) ){
                                echo fitness_heading_tag(
                                    array(
                                        'tag'   => 'h6',
                                        'text'  => esc_html( $settings['left_col_subtitle'] ),
                                        'class' => esc_attr('text-uppercase')
                                    )
                                );
                            }
                            // Title
                            if( !empty( $settings['left_col_title'] ) ){
                                echo fitness_heading_tag(
                                    array(
                                        'tag'   => 'h1',
                                        'text'  => esc_html( $settings['left_col_title'] ),
                                    )
                                );
                            }
                            // Button
                            if( ! empty( $settings['left_col_btn_label'] ) ){ ?>
                                <a href="<?php echo esc_url( $settings['left_col_btn_url']['url'] ) ?>" class="primary-btn"><?php echo esc_html( $settings['left_col_btn_label'] ) ?></a>
                                <?php
                            }
                            ?>
						</div>
						<div class="col-lg-6 single-cta cta2 no-padding section-gap relative">
							<div class="overlay overlay-bg"></div>
							<?php 
                            // Sub Title
                            if( !empty( $settings['right_col_subtitle'] ) ){
                                echo fitness_heading_tag(
                                    array(
                                        'tag'   => 'h6',
                                        'text'  => esc_html( $settings['right_col_subtitle'] ),
                                        'class' => esc_attr('text-uppercase')
                                    )
                                );
                            }
                            // Title
                            if( !empty( $settings['right_col_title'] ) ){
                                echo fitness_heading_tag(
                                    array(
                                        'tag'   => 'h1',
                                        'text'  => esc_html( $settings['right_col_title'] ),
                                    )
                                );
                            }
                            // Button
                            if( ! empty( $settings['right_col_btn_label'] ) ){ ?>
                                <a href="<?php echo esc_url( $settings['right_col_btn_url']['url'] ) ?>" class="primary-btn"><?php echo esc_html( $settings['right_col_btn_label'] ) ?></a>
                                <?php
                            }
                            ?>			
		
						</div>
					</div>
				</div>	
			</section>
            <?php
        } ?>


        <?php

    }
	
}
