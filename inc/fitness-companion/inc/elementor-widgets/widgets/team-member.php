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
class Fitness_Team_Member extends Widget_Base {

	public function get_name() {
		return 'fitness-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => esc_html__( 'Team Section Top', 'fitness' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => esc_html__( 'Title', 'fitness' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => esc_html__( 'Sub Title', 'fitness' ),
                'type' => Controls_Manager::TEXTAREA,

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => esc_html__( 'Team Member', 'fitness' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => esc_html__( 'Create Team Member', 'fitness' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => esc_html__( 'Name', 'fitness' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Name', 'fitness')
                    ],
                    [
                        'name' => 'desig',
                        'label' => esc_html__( 'Designation', 'fitness' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true
                    ],
                    [
                        'name' => 'img',
                        'label' => esc_html__( 'Photo', 'fitness' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'facebook',
                        'label' => esc_html__( 'Facebook URL', 'fitness' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => esc_url('www.facebook.com/')
                    ],
                    [
                        'name' => 'twitter',
                        'label' => esc_html__( 'Twitter URL', 'fitness' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => esc_url('www.twitter.com/')
                    ],
                    [
                        'name' => 'linkedin',
                        'label' => esc_html__( 'Linkedin URL', 'fitness' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => esc_url('www.linkedin.com/')
                    ]

                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content



        //------------------------------ Style Section Title ------------------------------
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
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => esc_html__( 'Style Team Member Info', 'fitness' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => esc_html__( 'Member Image Hover Color', 'fitness' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'memberimghoverbg',
                'label' => esc_html__( 'Background', 'fitness' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .team-area .thumb div',
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => esc_html__( 'Name Style', 'fitness' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => esc_html__( 'Name Color', 'fitness' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .single-team h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => esc_html__( 'Designation Style', 'fitness' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => esc_html__( 'Designation Color', 'fitness' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .single-team p',
            ]
        );


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="trainer-area section-gap" id="trainer">
        <div class="container">
            <?php
            // Section Heading
            fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>					
            <div class="row justify-content-center d-flex align-items-center">
                <?php 
                    if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ):
                        foreach( $settings['teamslider'] as $team ):
                        ?>
                        <div class="col-lg-3 col-md-6 single-trainer">
                            <div class="thumb">
                                <?php 
                                // Member Image
                                if( ! empty( $team['img']['url'] ) ) {
                                    echo fitness_img_tag(
                                        array(
                                            'url'   => esc_url( $team['img']['url'] ),
                                            'class' => 'img-fluid'
                                        )
                                    );
                                }
                                ?>
                                <div class="align-items-center justify-content-center d-flex">
                                    <?php
                                        if( !empty( $team['facebook'] ) ) {
                                            echo '<a href="'. esc_url( $team['facebook'] ) .'"><i class="fa fa-facebook"></i></a>';
                                        }
                                        if( !empty( $team['twitter'] ) ) {
                                            echo '<a href="'. esc_url( $team['twitter'] ) .'"><i class="fa fa-twitter"></i></a>';
                                        }
                                        if( !empty( $team['linkedin'] ) ) {
                                            echo '<a href="'. esc_url( $team['linkedin'] ) .'"><i class="fa fa-linkedin"></i></a>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="meta-text mt-30 text-center">
                                <?php
                                // Member Name
                                if( !empty( $team['label'] ) ){
                                    echo fitness_heading_tag(
                                        array(
                                            'tag'  => 'h4',
                                            'text' => esc_html( $team['label'] )
                                        )
                                    );
                                }
                                // Designation
                                if( !empty( $team['desig'] ) ){
                                    echo fitness_paragraph_tag(
                                        array(
                                            'text' => esc_html( $team['desig'] )
                                        )
                                    );
                                }
                                ?>		    	
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
	
}
