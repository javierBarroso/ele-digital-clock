<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;

if (!class_exists('Eledc_Digital_Clock_Widget')) {

    class Eledc_Digital_Clock_Widget extends Widget_Base
    {

        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'ele-digital-clock';
        }

        public function get_title()
        {
            return esc_html__('Digital Clock', 'ele-digital-clock');
        }

        public function get_icon()
        {
            return 'ele_dclock_widget_icon_svg';
        }

        public function get_custom_help_url()
        {
        }

        public function get_categories()
        {
            return ['jb-eledc-widget'];
        }

        public function get_keywords()
        {
            return ['keyword', 'keyword'];
        }

        protected function register_controls()
        {

            $this->start_controls_section(
                'layout_section',
                [
                    'label' => esc_html__('Content', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'head-text',
                [
                    'label' => esc_html('Header Text', 'ele-digital-clock'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'your time is now',
                    'dynamic' => [
                        'active' => true
                    ]

                ]
            );
            $this->add_control(
                'hour-text',
                [
                    'label' => esc_html('Hour Text', 'ele-digital-clock'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Hours',
                    'dynamic' => [
                        'active' => true
                    ]

                ]
            );
            $this->add_control(
                'minute-text',
                [
                    'label' => esc_html('Minute Text', 'ele-digital-clock'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Minutes',
                    'dynamic' => [
                        'active' => true
                    ]

                ]
            );
            $this->add_control(
                'second-text',
                [
                    'label' => esc_html('Second Text', 'ele-digital-clock'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Seconds',
                    'dynamic' => [
                        'active' => true
                    ]

                ]
            );

            $this->add_control(
                'alignment',
                [
                    'label' => esc_html__('Alignment', 'ele-digital-clock'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__('flex-start', 'ele-digital-clock'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'ele-digital-clock'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__('flex-end', 'ele-digital-clock'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => 'justify-content: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();
            
            $this->start_controls_section(
                'style_presets_section',
                [
                    'label' => esc_html__('Style Presets', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'style_presets',
                [
                    'label' => esc_html__( 'Style Presets', 'ele-digital-clock' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default'  => esc_html__( 'Default', 'ele-digital-clock' ),
                        '--fillterBlur: 8px; --hmcont: #aaa6; --scont: #aaa6; --hmtag: #aaa2; --stag: #aaa2;' => esc_html__( 'Glass', 'ele-digital-clock' ),
                        '--fillterBlur: 0; --hmcont: #222; --scont: #3a3a3a; --hmtag: #555; --stag: #545454;' => esc_html__( 'Dark', 'ele-digital-clock' ),
                        '--fillterBlur: 0; --hmcont: #fefefe; --scont: #fcfcfc; --hmtag: #dcdcdc; --stag: #dbdbdb; --fontColor: #222;' => esc_html__( 'Light', 'ele-digital-clock' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} #time' => '{{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'background_style_presets',
                [
                    'label' => esc_html__( 'BG Style Presets', 'ele-digital-clock' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'  => esc_html__( 'None', 'ele-digital-clock' ),
                        '--showBackGround: visible; --backgroundFigureBorderRadius: 100px;' => esc_html__( 'Color Balls', 'ele-digital-clock' ),
                        '--showBackGround: visible; --backgroundFigureBorderRadius: 0px;' => esc_html__( 'Color Square', 'ele-digital-clock' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} #time' => '{{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'font_section',
                [
                    'label' => esc_html__('Font', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__('Header Font', 'ele-digital-clock'),
                    'name' => 'typography_header',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} .ele-dclock-container .ele-dclock h2',
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_size' => ['default' => ['size' => 25]],
                        'font_weight' => ['default' => 200],
                        'font_family' => ['default' => 'Poppins-eledc'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__('AM PM Font', 'ele-digital-clock'),
                    'name' => 'typography_anpm',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} #time .cell-cont .cell #am-tag',
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_size' => ['default' => ['size' => 14]],
                        'font_weight' => ['default' => 200],
                        'line-height' => ['default' => 1],
                        'font_family' => ['default' => 'Poppins-eledc'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__('Clock Font', 'ele-digital-clock'),
                    'name' => 'typography_clock',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY, 'size' => 25
                    ],
                    'selector' => '{{WRAPPER}} #time .cell-cont .cell',
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_size' => ['default' => ['size' => 65]],
                        'font_weight' => ['default' => 200],
                        'font_family' => ['default' => 'Poppins-eledc'],
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__('Tags Font', 'ele-digital-clock'),
                    'name' => 'typography_tag',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} #time .cell-cont .tag',
                    'separator' => 'before',
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_size' => ['default' => ['size' => 14]],
                        'font_weight' => ['default' => 200],
                        'font_family' => ['default' => 'Poppins-eledc'],
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'size_section',
                [
                    'label' => esc_html__('Size', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'clock-width',
                [
                    'label' => esc_html('Clock Width', 'ele-digital-clock'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => ['px' => ['min' => 5, 'max' => 900]],
                    'default' => [
                        'unit' => 'px',
                        'size' => 150,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} #time .cell-cont' => 'width:{{SIZE}}{{UNIT}}',
                    ]
                ]
            );
            $this->add_responsive_control(
                'clock-height',
                [
                    'label' => esc_html('Clock Height', 'ele-digital-clock'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => ['px' => ['min' => 0, 'max' => 100]],
                    'default' => [
                        'unit' => 'px',
                        'size' => 14,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} #time .cell-cont .cell' => 'padding:{{SIZE}}{{UNIT}} 0',
                    ]
                ]
            );

            $this->add_responsive_control(
                'cell-height',
                [
                    'label' => esc_html('Tag Height', 'ele-digital-clock'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => ['px' => ['min' => 0, 'max' => 50]],
                    'default' => [
                        'unit' => 'px',
                        'size' => 5,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} #time .cell-cont .tag' => 'padding:{{SIZE}}{{UNIT}} 0',
                    ]
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'color_section',
                [
                    'label' => esc_html__('Color', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'header-color',
                [
                    'label' => esc_html('Header Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock h2' => 'color:{{VALUE}}'
                    ]
                ]
            );

            $this->add_control(
                'font-color',
                [
                    'label' => esc_html('Font Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} #time' => '--fontColor: {{VALUE}}',
                    
                    ]
                ]
            );

            $this->add_control(
                'hour-background-color',
                [
                    'label' => esc_html('Hour Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => null,
                    'selectors' => [
                        '{{WRAPPER}} #time #hcont' => 'background:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'minute-background-color',
                [
                    'label' => esc_html('Minute Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => null,
                    'selectors' => [
                        '{{WRAPPER}} #time #mcont' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'second-background-color',
                [
                    'label' => esc_html('Second Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => null,
                    'selectors' => [
                        '{{WRAPPER}} #time #scont' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'hour-tag-background-color',
                [
                    'label' => esc_html('Hour Tag Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} #time #htag' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'minute-tag-background-color',
                [
                    'label' => esc_html('Minute Tag Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} #time #mtag' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'secund-tag-background-color',
                [
                    'label' => esc_html('Second Tag Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} #time #stag' => 'background-color:{{VALUE}}'
                    ]
                ]
            );


            $this->end_controls_section();
        }

        protected function render()
        {

            $settings = $this->get_settings_for_display();

            include ELE_DIGITAL_CLOCK_PATH . 'includes/templates/template-digital-clock.php';

            /* $html = '<section class="ele-dclock-container">
                        <script>setInterval(ele_digital_clock, 1000);</script>
                        <div class="ele-dclock" id="card">
                            <h2>' . esc_html($settings['head-text']) . '</h2>
                            <div id="time">
                                <div class="cell-cont hcont" id="hcont">
                                    <div class="cell" id="hour">00<span id="am-tag"></span></div>
                                    <div class="tag" id="htag">' . esc_html($settings['hour-text']) . '</div>
                                </div>
                                <div class="cell-cont mcont" id="mcont"><div class="cell" id="minute">00</div><div class="tag" id="mtag">' . esc_html($settings['minute-text']) . '</div></div>
                                <div class="cell-cont scont" id="scont"><div class="cell" id="second">00</div><div class="tag" id="stag">' . esc_html($settings['second-text']) . '</div></div>
                                
                            </div>
                        </div>
                    </section>';

            echo $html; */
        }
    }
}
