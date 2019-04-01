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
class Fitness_Course extends Widget_Base {

	public function get_name() {
		return 'fitness-course';
	}

	public function get_title() {
		return __( 'Course', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'course_heading',
            [
                'label' => esc_html__( 'Course Section Heading', 'fitness' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => esc_html__( 'Section Title', 'fitness' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => esc_html__( 'Section Sub-title', 'fitness' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Course content ------------------------------
		$this->start_controls_section(
			'course_block',
			[
				'label' => esc_html__( 'Course', 'fitness' ),
			]
        );
        $this->add_control(
            'select_style', [
                'label' => esc_html__( 'Select Course Style', 'fitness' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style1' => __('Carousel Style', 'fitness'),
                    'style2' => __('Two Column Style', 'fitness')
                ],
                'default'   => 'style1'

            ]
        );
        
		$this->add_control(
            'course_content', [
                'label' => esc_html__( 'Create Training', 'fitness' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ course_name }}}',
                'fields' => [
                    [
                        'name'  => 'course_name',
                        'label' => esc_html__( 'Course Name', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => esc_html__('Flex your muscle', 'fitness')
                    ],
                    [
                        'name'  => 'course_fee',
                        'label' => esc_html__( 'Course Fee', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default'   => esc_html__('$200', 'fitness')
                    ],
                    [
                        'name'  => 'btn_label',
                        'label' => esc_html__( 'Button Label', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default'   => esc_html__( 'Join Now', 'fitness' )
                    ],
                    [
                        'name'  => 'join_url',
                        'label' => esc_html__( 'Course Join URL', 'fitness' ),
                        'type'  => Controls_Manager::URL,
                        'placeholder'=> esc_html__('Enter url ', 'fitness'),
                        'show_external' => false,
                    ],
                    
                    [
                        'name'  => 'feature_image',
                        'label' => esc_html__( 'Feature Image', 'fitness' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Course content


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

        //------------------------------ Style course Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => esc_html__( 'Style Course Carousel Content', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'style1'
                ]
            ]

        );
        $this->add_control(
            'color_coursetitle', [
                'label' => esc_html__( 'Title Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-price a h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_coursetitleHover', [
                'label' => esc_html__( 'Title Hover Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-price a:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'color_coursePrice', [
                'label' => esc_html__( 'Price Text Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-price .price' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'course_btn_label_color', [
                'label' => esc_html__( 'Button Lable Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-carusel .join-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'course_btn_hover_color', [
                'label' => esc_html__( 'Button Hover Label Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-carusel .join-btn:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'course_btn_bg', [
                'label' => esc_html__( 'Button Background Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-carusel .join-btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'course_btn_hover_bg', [
                'label' => esc_html__( 'Button Hover Background Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-carusel .join-btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style course Box ------------------------------
        $this->start_controls_section(
            'style_course_column', [
                'label' => esc_html__( 'Style Course Column Content', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'style2'
                ]
            ]
        );
        $this->add_control(
            'course_title_color', [
                'label' => esc_html__( 'Title Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-package .price h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'course_title_hover', [
                'label' => esc_html__( 'Title Hover Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-package:hover .price h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'course_price_color', [
                'label' => esc_html__( 'Price Text Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'course_price_hover_color', [
                'label' => esc_html__( 'Price Hover Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-package:hover .price span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'price_hover_btn_color', [
                'label' => esc_html__( 'Price Hover Button Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .packages-area .single-package:hover .btn a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'price_hover_btn_bg_color', [
                'label' => esc_html__( 'Price Hover Button Background Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .packages-area .single-package:hover .btn a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    

	}

	protected function render() {

    $settings = $this->get_settings();
    $this->load_widget_script();


    if( $settings['select_style'] == 'style1' ){
        ?>
        <section class="top-course-area section-gap">
            <div class="container">
                <?php
                    // Section Heading
                    fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>
                <div class="row">
                    <div class="active-topcourse-carusel">
                    <?php 
                        if( ! empty( $settings['course_content'] ) ):
                            foreach( $settings['course_content'] as $val ):

                                $bgUrl   = ! empty( $val['feature_image']['url'] ) ? $val['feature_image']['url'] : '';
                                
                                ?>
                                <div class="single-carusel item">
                                    <div class="thumb">
                                        <?php
                                        // Image
                                        echo fitness_img_tag(
                                            array(
                                                'url'   => esc_url( $bgUrl ),
                                                'class'   => 'img-fluid'
                                            )
                                        );
                                        ?>
                                        <div class="join-btn">
                                            <a href="<?php echo esc_url( $val['btn_url']['url'] ) ?>"><?php echo esc_html( $val['btn_label'] ) ?></a>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="title-price d-flex justify-content-between">
                                        <?php
                                        if( ! empty( $val['course_name'] ) ) { ?>
                                            <a href="<?php echo esc_url( $val['btn_url']['url'] ) ?>">
                                                <?php
                                                // Course Name
                                                echo fitness_heading_tag(
                                                    array(
                                                        'tag'  => 'h4',
                                                        'text' => esc_html( $val['course_name'] )
                                                    )
                                                );
                                            
                                                ?>
                                            </a>
                                            <?php
                                        }
                                        // Course Fee
                                        if( ! empty( $val['course_fee'] ) ) {
                                            echo fitness_heading_tag(
                                                array(
                                                    'tag'  => 'h4',
                                                    'text' => esc_html( $val['course_fee'] ),
                                                    'class'=> esc_attr('price')
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
            </div>	
        </section>
        <?php
    }
    else{ ?>
        <section class="packages-area section-gap">
				<div class="container">
                    <?php
                        // Section Heading
                        fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                    ?>					
					<div class="row">
                    <?php 
                        if( ! empty( $settings['course_content'] ) ):
                            foreach( $settings['course_content'] as $val ):
                                $bgUrl   = ! empty( $val['feature_image']['url'] ) ? $val['feature_image']['url'] : '';
                                ?>
                                <div class="single-package col-lg-6">
                                    <div class="thumb relative">
                                        <div class="overlay overlay-bg"></div>
                                        <?php
                                        // Image
                                        echo fitness_img_tag(
                                            array(
                                                'url'   => esc_url( $bgUrl ),
                                                'class'   => 'img-fluid'
                                            )
                                        );
                                        ?>
                                    </div>
                                    <div class="price">
                                        <?php
                                        // Course Name
                                        echo fitness_heading_tag(
                                            array(
                                                'tag'  => 'h6',
                                                'text' => esc_html( $val['course_name'] )
                                            )
                                        );
                                    
                                       // Course Fee
                                       if( ! empty( $val['course_fee'] ) ) {
                                            echo fitness_heading_tag(
                                                array(
                                                    'tag'  => 'span',
                                                    'text' => esc_html( $val['course_fee'] ),
                                                )
                                            );
                                        }
                                    ?>
                                    </div>
                                    <div class="btn">
                                        <a href="<?php echo esc_url( $val['btn_url']['url'] ) ?>" class="primary-btn"><?php echo esc_html( $val['btn_label'] ) ?></a>
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
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active-topcourse-carusel').owlCarousel({
                items:3,
                loop:true,
                margin: 30,
                dots: true,
                autoplayHoverPause: true,
                smartSpeed:650,         
                autoplay:true,    
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    961: {
                        items: 3,
                    }            
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }

}
