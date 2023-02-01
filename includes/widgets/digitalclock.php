<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;

class Digital_Clock extends Widget_Base{
    
    public function __construct($data = array(), $args = null)
	{
		parent::__construct($data, $args);

		wp_enqueue_style('wn-dclock-css', plugin_dir_url(__FILE__).'/css/dClock_style.css');
        wp_enqueue_script('wn-dclock-js', plugin_dir_url(__FILE__).'/js/dClock_script.js');
	}

    public function get_name() {
        return 'ele-dclock';
    }

    public function get_title() {
        return esc_html__( 'Digital Clock', 'ele-digital-clock' );
    }

	public function get_icon() {
        return 'eicon-clock-o';
    }

    public function get_custom_help_url() {}

	public function get_categories() {
        return [ 'jbplugins' ];
    }

	public function get_keywords() {
        return [ 'keyword', 'keyword' ];
    }

    protected function register_controls(){

        $this->start_controls_section(
			'layout_section',
			[
				'label' => esc_html__( 'Content', 'ele-digital-clock' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'head-text',[
                'label'=>esc_html('Header Text', 'ele-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Time is Now',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );
        $this->add_control(
            'hour-text',[
                'label'=>esc_html('Hour Text', 'ele-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Hours',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );
        $this->add_control(
            'minute-text',[
                'label'=>esc_html('Minute Text', 'ele-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Minutes',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );
        $this->add_control(
            'second-text',[
                'label'=>esc_html('Second Text', 'ele-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Seconds',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'ele-digital-clock' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'=>esc_html__('Header Font', 'ele-digital-clock' ),
				'name' => 'typography_header',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .wn-dclock-container .wn-dclock h2',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'=>esc_html__('Numbers Font', 'ele-digital-clock' ),
				'name' => 'typography_number',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} #time span',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'=>esc_html__('Tags Font', 'ele-digital-clock' ),
				'name' => 'typography_tag',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} #time span:nth-child(2)',
                'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'cell-padding',
			[
				'label' => esc_html__( 'Cell Padding', 'ele-digital-clock' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} #time div #hour' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #time div #minute' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #time div #second' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'default' => [ 'isLinked' => true, 'top' => 5, 'right' => 20, 'bottom' => 5, 'left' => 20, 'unit' => 'px' ],
                
			]
		);
        $this->add_responsive_control(
            'tag-height', [
                'label'=>esc_html('Tag Height', 'ele-digital-clock' ),
                'type'=>Controls_Manager::SLIDER,
                'size_units'=>['px'],
                'range'=>['px'=>['min'=>20,'max'=>300]],
                'default' => [
					'unit' => 'px',
					
				],
                'selectors'=>[
					'{{WRAPPER}} #time div #htag'=>'height:{{SIZE}}{{UNIT}}',
					'{{WRAPPER}} #time div #mtag'=>'height:{{SIZE}}{{UNIT}}',
					'{{WRAPPER}} #time div #stag'=>'height:{{SIZE}}{{UNIT}}',
				]
            ]
        );

        

        $this->add_control(
            'hour-color',[
                'label'=>esc_html('Hour Cell Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #hour'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'minute-color',[
                'label'=>esc_html('Minute Cell Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #minute'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'second-color',[
                'label'=>esc_html('Second Cell Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #second'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'hour-tag-color',[
                'label'=>esc_html('Hour Tag Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #htag'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'minute-tag-color',[
                'label'=>esc_html('Minute Tag Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #mtag'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'secund-tag-color',[
                'label'=>esc_html('Second Tag Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #stag'=>'background-color:{{VALUE}}'
				]
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){

        $settings = $this->get_settings_for_display();
        
        $html = '<section class="wn-dclock-container">
        <div class="wn-dclock">
            <h2>' . esc_html( $settings['head-text'] ) . '</h2>
            <div id="time">
                <div>
                    <span id="hour">00</span>
                    <span id="htag">' . esc_html( $settings['hour-text'] ) .'</span>
                </div>
                <div><span id="minute">00</span><span id="mtag">' . esc_html( $settings['minute-text'] ) . '</span></div>
                <div><span id="second">00</span><span id="stag">' . esc_html( $settings['second-text'] ) . '</span></div>
            </div>
        </div>
    </section>';

        echo $html;

    }

}