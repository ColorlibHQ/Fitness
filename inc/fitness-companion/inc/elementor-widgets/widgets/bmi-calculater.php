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
class Fitness_BMI_Calculater extends Widget_Base {

	public function get_name() {
		return 'fitness_bmi_calculater';
	}

	public function get_title() {
		return __( 'BMI Calculater', 'fitness' );
	}

	public function get_icon() {
		return 'eicon-calculater';
	}

	public function get_categories() {
		return [ 'fitness-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'bmi_calculater_heading',
            [
                'label' => __( 'BMI Calculater Section Heading', 'fitness' ),
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
        
		// ----------------------------------------   BMI_Calculater content ------------------------------
		$this->start_controls_section(
			'bmi_calculater_block',
			[
				'label' => __( 'BMI Calculater', 'fitness' ),
			]
		);
		$this->add_control(
            'submit_label', [
                'label' => __( 'Form Button Label', 'fitness' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Calculate Your BMI', 'fitness')

            ]
        );

		$this->end_controls_section(); // End BMI_Calculater content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'fitness' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_bg',
                'label' => esc_html__( 'Background', 'fitness' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .aclculation-area',
            ]
        );
        $this->add_control(
            'section_overlay_color', [
                'label'     => __( 'Section Overlay Background Color', 'fitness' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .aclculation-area .overlay-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
    // call load widget script
    $this->load_widget_script();

    $settings      = $this->get_settings();
    $sec_title     = ! empty( $settings['sect_title'] ) ? $settings['sect_title'] : '';
    $sect_subtitle = ! empty( $settings['sect_subtitle'] ) ? $settings['sect_subtitle'] : '';
    $submit_label  = ! empty( $settings['submit_label'] ) ? $settings['submit_label'] : 'Calculate Your BMI';

    
    // define variables and set to empty values
    // $height = $weight = "";

    // if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['height']) && !empty($_POST['weight']) ) {
    //     $height = $_POST["height"];
    //     $weight = $_POST["weight"];


    //     $oneInche = 0.0254;
    //     $meter = $oneInche * $height;
    //     $meterSquare = $meter * $meter;
    //     $total = $weight / $meterSquare;

    //     $totalWeight = number_format((float)$total, 2, '.', '');
    // }

        

   


    ?>
        <section class="aclculation-area section-gap relative">
            <div class="overlay overlay-bg"></div>				
            <div class="container">
                <div class="row section-title relative">
                    <?php
                    if( $sec_title ){ 
                        echo '<h1 class="text-white">'. esc_html( $sec_title ).'</h1>';
                    } 
                    if( $sect_subtitle ){ 
                        echo '<p class="text-white">'. esc_html( $sect_subtitle ).'</p>';
                    } 
                    ?>            
                </div>
              
                <form action="#" method="post">
         
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-3 title-row">
                            <p class="text-white"><?php echo esc_html__('Your Height(inches)', 'fitness') ?></p>
                        </div>
                        <div class="col-lg-3">
                            <input type="number" class="form-control heigh"  placeholder="Enter Value"  required >
                        </div>
                        <div class="col-lg-3">
                            <div class="form-control"><?php echo esc_html__('Your Body Mass Index Is:', 'fitness') ?> <span class="result"></span></div>
						</div>
                                        
                    </div>
                    <div class="row justify-content-center align-items-center pt-30">
                        <div class="col-lg-3 title-row">
                            <p class="text-white"><?php echo esc_html__('Your Weight(Ibs)', 'fitness') ?></p>
                        </div>
                        <div class="col-lg-3">
                            <input type="number" class="form-control weight" id="weight" value="" name="weight" placeholder="Enter Value" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Value '" required >
                        </div>
                        <div class="col-lg-3">
                            <input id="submit" type="button" class="primary-btn aclculation-btn" value="Submit">
                            
                        </div>							
                    </div>
                </form>

            </div>	
            
        </section>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
            ( function( $ ){

                

            })(jQuery);
        </script>
        <?php 
        }
    }

}
