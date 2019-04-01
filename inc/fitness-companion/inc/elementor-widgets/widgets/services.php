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
class Fitness_Services extends Widget_Base {

	public function get_name() {
		return 'fitness-services';
	}

	public function get_title() {
		return __( 'Services', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Services Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'fitness' ),
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
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'fitness' ),
			]
        );
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Services', 'fitness' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Regular Exercise', 'fitness' )
                    ],
                    [
                        'name'  => 'description',
                        'label' => __( 'Description', 'fitness' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'fitness' )
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Title URL', 'fitness' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                        
                    ],
                    [
                        'name'  => 'service_img',
                        'label' => __( 'Service Item Image', 'fitness' ),
                        'type'  => Controls_Manager::MEDIA,
                        'label_block' => true,
                        
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End services content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .section-title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_fsec_title',
                'selector'  => '{{WRAPPER}} .section-title h1',
            ]
        );
        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_fsec_desc',
                'selector'  => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Services ------------------------------
        $this->start_controls_section(
            'style_services', [
                'label' => __( 'Style Services', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'services_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'fitness' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_servicetitle', [
                'label' => __( 'Title Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .single-service h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_service_title',
                'selector'  => '{{WRAPPER}} .single-service h4',
            ]
        );
        $this->add_control(
            'color_service_desc', [
                'label' => __( 'Feature Description Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_service_desc',
                'selector'  => '{{WRAPPER}} .single-service p',
            ]
        );

        $this->end_controls_section();
        
	}

	protected function render() {

    $settings = $this->get_settings();
    

    ?>
        <section class="offred-area section-gap">
            <div class="container">
                <?php
                    // Section Heading
                    fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>					
                <div class="row">
                <?php
                    if( is_array( $settings['services_content'] ) && count( $settings['services_content'] ) > 0 ):
                        foreach( $settings['services_content'] as $service ):
                            $service_title = !empty( $service['label'] ) ? $service['label'] : '';
                            $title_url = !empty( $service['title_url']['url'] ) ? $service['title_url']['url'] : '';
                            $f_image = ! empty( $service['service_img']['url'] ) ? $service['service_img']['url'] : '';
                            ?>
                            <div class="col-lg-4">
                                <div class="single-offred">
                                    <?php if( $f_image ){
                                        echo '<img class="img-fluid" src="'. esc_url( $f_image ) .'" alt="'.esc_html__( 'service image', 'fitness' ).'">';
                                    }
                                    
                                    if( !empty( $title_url ) ){
                                        echo '<a href="'. esc_url( $title_url ) .'"><h4>'. esc_html( $service_title ) .'</h4></a>';
                                    }else{
                                        echo '<h4>'. esc_html( $service_title ) .'</h4>';
                                    }
                                    ?>
                                    <p><?php echo esc_html( $service['description'] ); ?></p>
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
