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
                'clock_type_section',
                [
                    'label' => esc_html__('Clock Type', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'clock_type',
                [
                    'label' => esc_html__( 'Clock type', 'ele-digital-clock' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default'  => esc_html__( 'Vibrant color clock', 'ele-digital-clock' ),
                        'glass' => esc_html__( 'Glass clock', 'ele-digital-clock' ),
                    ],
                ]
            );

            $this->end_controls_section();

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
                        'glass' => esc_html__( 'Glass', 'ele-digital-clock' ),
                        'dark' => esc_html__( 'Dark', 'ele-digital-clock' ),
                        'light' => esc_html__( 'Light', 'ele-digital-clock' ),
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
                    'selector' => '{{WRAPPER}} .clock-title',
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
                    'selector' => '{{WRAPPER}} .am-tag',
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
                    'selector' => '{{WRAPPER}} .cell-cont .cell',
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
                    'selector' => '{{WRAPPER}} .cell-cont .tag',
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
                        '{{WRAPPER}} .cell-cont' => 'width:{{SIZE}}{{UNIT}}',
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
                        '{{WRAPPER}} .cell-cont .cell' => 'padding:{{SIZE}}{{UNIT}} 0',
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
                        '{{WRAPPER}} .cell-cont .tag' => 'padding:{{SIZE}}{{UNIT}} 0',
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
                        '{{WRAPPER}} html' => '--fontColor: {{VALUE}}',
                    
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
                        '{{WRAPPER}} .hcont' => 'background:{{VALUE}}'
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
                        '{{WRAPPER}} .mcont' => 'background:{{VALUE}}'
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
                        '{{WRAPPER}} .scont' => 'background:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'hour-tag-background-color',
                [
                    'label' => esc_html('Hour Tag Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htag' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'minute-tag-background-color',
                [
                    'label' => esc_html('Minute Tag Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .mtag' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'secund-tag-background-color',
                [
                    'label' => esc_html('Second Tag Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .stag' => 'background-color:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'clock-background-color',
                [
                    'label' => esc_html('Clock Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => 'glass',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock' => 'background:{{VALUE}}'
                    ]
                ]
            );


            $this->end_controls_section();
        }

        protected function render()
        {
            echo '<script>setInterval(ele_digital_clock, 1000);</script>';

            $settings = $this->get_settings_for_display();

            switch ($settings['clock_type']) {
                case 'default':
                    
                    include ELE_DIGITAL_CLOCK_PATH . 'includes/templates/template-digital-clock_01.php';
                    break;
                case 'glass':
                    
                    include ELE_DIGITAL_CLOCK_PATH . 'includes/templates/template-digital-clock_02.php';
                    break;
                default:
                    # code...
                    break;
            }

        }
    }
}
