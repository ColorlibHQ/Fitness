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
class Fitness_Schedule extends Widget_Base {

	public function get_name() {
		return 'fitness-schedule';
	}

	public function get_title() {
		return __( 'Schedule', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Schedule Section Heading ------------------------------
        $this->start_controls_section(
            'schedule_heading',
            [
                'label' => __( 'Schedule Section Heading', 'fitness' ),
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
        
		// ----------------------------------------   Schedule content ------------------------------
		$this->start_controls_section(
			'schedule_block',
			[
				'label' => __( 'Schedule', 'fitness' ),
			]
        );
		$this->add_control(
            'schedule_content', [
                'label' => __( 'Create Schedule', 'fitness' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ course_name }}}',
                'fields' => [
                    [
                        'name'  => 'course_name',
                        'label' => __( 'Course Name', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Flex Muscle', 'fitness' )
                    ],
                    [
                        'name'  => 'monday_time',
                        'label' => __( 'Monday', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__( '10.00', 'fitness' )
                    ],
                    [
                        'name'  => 'tuesday_time',
                        'label' => __( 'Tuesday', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__( '10.00', 'fitness' )
                    ],
                    [
                        'name'  => 'wednesday_time',
                        'label' => __( 'Wednesday', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__( '10.00', 'fitness' )
                    ],
                    [
                        'name'  => 'thursday_time',
                        'label' => __( 'Thursday', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__( '10.00', 'fitness' )
                    ],
                    [
                        'name'  => 'friday_time',
                        'label' => __( 'Friday', 'fitness' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__( '10.00', 'fitness' )
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End schedule content


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

        //------------------------------ Style Schedule ------------------------------
        $this->start_controls_section(
            'style_schedule', [
                'label' => __( 'Style Schedule', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'schedule_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'fitness' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_table_heading', [
                'label' => __( 'Table Heading Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .thead-light .head' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_table_hbg', [
                'label' => __( 'Table Heading Background Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#e9ecef',
                'selectors' => [
                    '{{WRAPPER}} .table .thead-light th' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_schedule_heading',
                'selector'  => '{{WRAPPER}} .thead-light .head',
            ]
        );
        $this->add_control(
            'color_table_row_hover', [
                'label' => __( 'Table Row Hover Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .table tr:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_table_row_hover_bg', [
                'label' => __( 'Table Row Hover Background Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .table tr:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_schedule_cont', [
                'label' => __( 'Table Content Color', 'fitness' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .schdule-table tbody tr td, .schdule-table tbody tr th' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_schedule_desc',
                'selector'  => '{{WRAPPER}} .single-schedule p',
            ]
        );

        


        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();
    ?>

    <section class="schedule-area section-gap relative" id="schedule">
        <div class="container">
            <?php
                // Section Heading
                fitness_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>						
            <div class="row">
                <div class="table-wrap col-lg-12">
                    <table class="schdule-table table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="head" scope="col"><?php echo esc_html__( 'Course name', 'fitness' ) ?></th>
                                    <th class="head" scope="col"><?php echo esc_html__( 'mon', 'fitness' ) ?></th>
                                    <th class="head" scope="col"><?php echo esc_html__( 'tue', 'fitness' ) ?></th>
                                    <th class="head" scope="col"><?php echo esc_html__( 'wed', 'fitness' ) ?></th>
                                    <th class="head" scope="col"><?php echo esc_html__( 'thu', 'fitness' ) ?></th>
                                    <th class="head" scope="col"><?php echo esc_html__( 'fri', 'fitness' ) ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if( is_array( $settings['schedule_content'] ) && count( $settings['schedule_content'] ) > 0 ):
                                foreach( $settings['schedule_content'] as $schedule ):
                                    ?>
                                    <tr>
                                        <th class="name" scope="row"><?php echo esc_html( $schedule['course_name'] ) ?></th>
                                        <td><?php echo esc_html( $schedule['monday_time'] ) ?></td>				      
                                        <td><?php echo esc_html( $schedule['tuesday_time'] ) ?></td>				      
                                        <td><?php echo esc_html( $schedule['wednesday_time'] ) ?></td>				      
                                        <td><?php echo esc_html( $schedule['thursday_time'] ) ?></td>				      
                                        <td><?php echo esc_html( $schedule['friday_time'] ) ?></td>				      
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                            </tbody>
                    </table>							
                </div>
            </div>
        </div>	
    </section>

    <?php

    }

	
}
