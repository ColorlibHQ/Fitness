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
 * Fitness elementor section widget.
 *
 * @since 1.0
 */
class Fitness_Testimonial extends Widget_Base {

	public function get_name() {
		return 'fitness-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // Testimonial Heading
		$this->start_controls_section(
			'testimonial_heading',
			[
				'label' => __( 'Testimonial Section Heading', 'fitness' ),
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


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'fitness' ),
			]
		);
		$this->add_control(
			'select_style', [
				'label'     => __( 'Testimonial Style', 'fitness' ),
				'type'      => Controls_Manager::SELECT,
                'options'   => [
                     'style_1'  => esc_html__('Carousel Style', 'fitness'),
                     'style_2'  => esc_html__('Column Style', 'fitness')
                ],
                'default'   => 'style_1'

			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'fitness' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Desiganation', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => __('CEO at Google', 'fitness')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'fitness' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'fitness')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'fitness' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
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

        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'fitness' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'fitness' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'fitness' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testomial-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>
    <?php
        if( $settings['select_style'] == 'style_2' ) {
            ?>
            <section class="feedback-area-area pt-120">
                <div class="container">
                    <div class="row">
                        <?php
                        if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                            foreach ( $settings['review_slider'] as $review ): ?>
                                <div class="col-lg-4">
                                    <div class="single-feedback">
	                                    <?php
	                                    if ( ! empty( $review['img']['url'] ) ) {
		                                    echo fitness_img_tag(
			                                    array(
				                                    'url'   => esc_url( $review['img']['url'] ),
				                                    'class' => esc_attr( 'mx-auto' )
			                                    )
		                                    );
	                                    }
	                                    
	                                    // Description
	                                    if ( ! empty( $review['desc'] ) ) {
		                                    echo fitness_get_textareahtml_output( $review['desc'] );
	                                    } ?>
                                        <a href="#">
                                            <?php
                                            // Name =======
                                            if ( ! empty( $review['label'] ) ) {
                                                echo fitness_heading_tag(
                                                    array(
                                                        'tag'  => 'h5',
                                                        'text' => esc_html( $review['label'] ),
                                                        'class' => esc_attr('text-uppercase')
                                                    )
                                                );
                                            } ?>
                                        </a>
                                        <?php
                                        // designation
                                        if ( ! empty( $review['designation'] ) ) {
	                                        echo fitness_paragraph_tag(
		                                        array(
			                                        'text' => esc_html( $review['designation'] )
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
        else{
	        ?>
            <section class="testomial-area section-gap" id="testimonail">
                <div class="container">
			        <?php
			        // Section Heading
			        fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
			        ?>
                    <div class="row">
                        <div class="active-testimonial-carusel">
					        <?php
					        if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
						        foreach ( $settings['review_slider'] as $review ):
							        ?>
                                    <div class="single-testimonial item">
								        <?php
								        if ( ! empty( $review['img']['url'] ) ) {
									        echo fitness_img_tag(
										        array(
											        'url'   => esc_url( $review['img']['url'] ),
											        'class' => esc_attr( 'mx-auto' )
										        )
									        );
								        }
								        ?>
                                        <div class="desc">
									        <?php
									        // Description
									        if ( ! empty( $review['desc'] ) ) {
										        echo fitness_get_textareahtml_output( $review['desc'] );
									        } ?>
                                        </div>
								        <?php
								        // Name =======
								        if ( ! empty( $review['label'] ) ) {
									        echo fitness_heading_tag(
										        array(
											        'tag'  => 'h5',
											        'text' => esc_html( $review['label'] ),
										        )
									        );
								        }
								        //
								        if ( ! empty( $review['designation'] ) ) {
									        echo fitness_paragraph_tag(
										        array(
											        'text' => esc_html( $review['designation'] )
										        )
									        );
								        } ?>
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


    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active-testimonial-carusel').owlCarousel({
                items: 3,
                loop: true,
                margin: 30,
                dots: true,
                autoplay: true,
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
