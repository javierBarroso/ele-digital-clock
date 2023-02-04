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
                'default'=>'your time is now',
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

        $this->add_control(
            'alignment',
			[
				'label' => esc_html__( 'Alignment', 'ele-digital-clock' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'flex-start', 'ele-digital-clock' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ele-digital-clock' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'flex-end', 'ele-digital-clock' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wn-dclock-container' => 'justify-content: {{VALUE}}',
				],
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
				'selector' => '{{WRAPPER}} #time .cell-cont .cell',
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
				'selector' => '{{WRAPPER}} #time .cell-cont .tag',
                'separator' => 'before',
			]
		);
        
        $this->add_responsive_control(
            'clock-width', [
                'label'=>esc_html('Clock Width', 'ele-digital-clock' ),
                'type'=>Controls_Manager::SLIDER,
                'size_units'=>['%'],
                'range'=>['%'=>['min'=>25,'max'=>100]],
                'default' => [
					'unit' => '%',
				],
                'selectors'=>[
					'{{WRAPPER}} #time .cell-cont'=>'width:{{SIZE}}{{UNIT}}',
				]
            ]
        );
        $this->add_responsive_control(
            'clock-height', [
                'label'=>esc_html('Clock Height', 'ele-digital-clock' ),
                'type'=>Controls_Manager::SLIDER,
                'size_units'=>['px'],
                'range'=>['px'=>['min'=>50,'max'=>500]],
                'default' => [
					'unit' => 'px',
				],
                'selectors'=>[
					'{{WRAPPER}} #time'=>'height:{{SIZE}}{{UNIT}}',
				]
            ]
        );

        $this->add_responsive_control(
            'cell-height', [
                'label'=>esc_html('Cell Height', 'ele-digital-clock' ),
                'type'=>Controls_Manager::SLIDER,
                'size_units'=>['%'],
                'range'=>['%'=>['min'=>10,'max'=>100]],
                'default' => [
					'unit' => '%',
				],
                'selectors'=>[
					'{{WRAPPER}} #time .cell-cont .cell'=>'height:{{SIZE}}{{UNIT}}',
				]
            ]
        );

        $this->add_control(
            'am-color',[
                'label'=>esc_html('AM Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #hcont #hour #am-tag'=>'color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'hour-color',[
                'label'=>esc_html('Hour Cell Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #hcont'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'minute-color',[
                'label'=>esc_html('Minute Cell Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #mcont'=>'background-color:{{VALUE}}'
				]
            ]
        );
        $this->add_control(
            'second-color',[
                'label'=>esc_html('Second Cell Color', 'ele-digital-clock'),
                'type'=>Controls_Manager::COLOR,
                'default'=>'',
                'selectors'=>[
					'{{WRAPPER}} #time #scont'=>'background-color:{{VALUE}}'
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
        <script>setInterval(digital_clock, 1000);</script>
        <div class="wn-dclock">
            <h2>' . esc_html( $settings['head-text'] ) . '</h2>
            <div id="time">
                <div class="cell-cont" id="hcont">
                    <div class="cell" id="hour">00<span id="am-tag"></span></div>
                    <div class="tag" id="htag">' . esc_html( $settings['hour-text'] ) .'</div>
                </div>
                <div class="cell-cont" id="mcont"><div class="cell" id="minute">00</div><div class="tag" id="mtag">' . esc_html( $settings['minute-text'] ) . '</div></div>
                <div class="cell-cont" id="scont"><div class="cell" id="second">00</div><div class="tag" id="stag">' . esc_html( $settings['second-text'] ) . '</div></div>
                
            </div>
        </div>
    </section>';

        echo $html;

    }

}

//TODO: aling text verticaly