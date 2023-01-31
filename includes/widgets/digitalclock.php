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
        return 'wn-dclock';
    }

    public function get_title() {
        return esc_html__( 'Digital Clock', 'wn-digital-clock' );
    }

	public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_custom_help_url() {}

	public function get_categories() {
        return [ 'wirenomads' ];
    }

	public function get_keywords() {
        return [ 'keyword', 'keyword' ];
    }

    protected function register_controls(){

        $this->start_controls_section(
			'layout_section',
			[
				'label' => esc_html__( 'Content', 'wn-digital-clock' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'head-text',[
                'label'=>esc_html('Header Text', 'wn-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Time is Now',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );
        $this->add_control(
            'hour-text',[
                'label'=>esc_html('Hour Text', 'wn-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Hours',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );
        $this->add_control(
            'minute-text',[
                'label'=>esc_html('Minute Text', 'wn-digital-clock'),
                'type'=>Controls_Manager::TEXT,
                'default'=>'Minutes',
                'dynamic'=>[
                    'active'=>true
                ]

            ]
        );
        $this->add_control(
            'second-text',[
                'label'=>esc_html('Second Text', 'wn-digital-clock'),
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
				'label' => esc_html__( 'Style', 'wn-digital-clock' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'=>esc_html__('Header Font', 'wn-digital-clock' ),
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
                'label'=>esc_html__('Numbers Font', 'wn-digital-clock' ),
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
                'label'=>esc_html__('Tags Font', 'wn-digital-clock' ),
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
				'label' => esc_html__( 'Cell Padding', 'wn-digital-clock' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #time div #hour' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #time div #minute' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #time div #second' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'tag-height', [
                'label'=>esc_html('Tag Height', 'wn-digital-clock' ),
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
                'label'=>esc_html('Hour Cell Color', 'wn-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #hour'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'minute-color',[
                'label'=>esc_html('Minute Cell Color', 'wn-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #minute'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'second-color',[
                'label'=>esc_html('Second Cell Color', 'wn-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #second'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'hour-tag-color',[
                'label'=>esc_html('Hour Tag Color', 'wn-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #htag'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'minute-tag-color',[
                'label'=>esc_html('Minute Tag Color', 'wn-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #mtag'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'secund-tag-color',[
                'label'=>esc_html('Second Tag Color', 'wn-digital-clock'),
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
            <h2>'.$settings['head-text'].'</h2>
            <div id="time">
                <div>
                    <span id="hour">00</span>
                    <span id="htag">'.$settings['hour-text'].'</span>
                </div>
                <div><span id="minute">00</span><span id="mtag">'.$settings['minute-text'].'</span></div>
                <div><span id="second">00</span><span id="stag">'.$settings['second-text'].'</span></div>
            </div>
        </div>
    </section>';

        echo $html;

    }

}