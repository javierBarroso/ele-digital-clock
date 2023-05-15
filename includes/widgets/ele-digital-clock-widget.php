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

        public function set_time_zone()
        {

            foreach (ELE_DIGITAL_CLOCK_TIMEZONE as $key => $timezone) {
                $timezone_list[$timezone[0]['offset']] = $timezone[0]['timezone_id'];
            }

            return $timezone_list;
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
                    'label' => esc_html__('Clock type', 'ele-digital-clock'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default'  => esc_html__('Clock 01', 'ele-digital-clock'),
                        'clock-02' => esc_html__('Clock 02', 'ele-digital-clock'),
                        'clock-03' => esc_html__('Clock 03', 'ele-digital-clock'),
                    ],
                ]
            );
            $this->add_control(
                'hour_format',
                [
                    'label' => esc_html__('Hour format', 'ele-digital-clock'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default'  => esc_html__('12 hours', 'ele-digital-clock'),
                        '24' => esc_html__('24 hours', 'ele-digital-clock'),
                    ],
                ]
            );
            $timeZoneData = timezone_abbreviations_list();
            $timeZone = [];

            foreach ($timeZoneData as $key => $zone) {
                foreach ($zone as $key => $time) {
                    if($time['timezone_id']){
                        $timeZone[$time['timezone_id']] = $time['timezone_id'];
                    }
                }
            }

            ksort($timeZone);
            

            $this->add_control(
                'clock_time_zone',
                [
                    'label' => esc_html__('Time zone', 'ele-digital-clock'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => $timeZone,
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
                        '{{WRAPPER}} .clock-02' => 'justify-content: {{VALUE}}',
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
                    'label' => esc_html__('Style Presets', 'ele-digital-clock'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default'  => esc_html__('Custom Theme', 'ele-digital-clock'),
                        'glass' => esc_html__('Glass Theme', 'ele-digital-clock'),
                        'dark' => esc_html__('Dark Theme', 'ele-digital-clock'),
                        'light' => esc_html__('Light Theme', 'ele-digital-clock'),
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'font_section',
                [
                    'label' => esc_html__('Font', 'ele-digital-clock'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__('Title Font', 'ele-digital-clock'),
                    'name' => 'typography_header',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'condition' => [
                        'clock_type' => ['default', 'clock-02', 'clock-03'],
                    ],
                    'selector' => '{{WRAPPER}} .clock-title',
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
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
                        'font_size' => ['default' => ['size' => 20]],
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
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} .cell-cont .cell, {{WRAPPER}} .dot',
                    'condition' => [
                        'clock_type' => ['default', 'clock-02', 'clock-03'],
                    ],
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_size' => ['default' => ['size' => 50]],
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
                    'condition' => [
                        'clock_type' => ['default', 'clock-02', 'clock-03'],
                    ],
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
                    'condition' => [
                        'clock_type' => ['default', 'clock-02', 'clock-03'],
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
                    'condition' => [
                        'clock_type' => ['default', 'clock-02', 'clock-03'],
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
                    'condition' => [
                        'clock_type' => ['default'],
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
                    'label' => esc_html('Title Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'condition' => [
                        'clock_type' => ['default', 'clock-02'],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--titleColor:{{VALUE}}'
                    ]
                ]
            );

            $this->add_control(
                'font-color',
                [
                    'label' => esc_html('Font Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => ['default', 'clock-02'],
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--fontColor: {{VALUE}}',

                    ]
                ]
            );

            $this->add_control(
                'hour-background-color',
                [
                    'label' => esc_html('Hour Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => null,
                    'condition' => [
                        'clock_type' => 'default',
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--hcont:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'minute-background-color',
                [
                    'label' => esc_html('Minute Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => null,
                    'condition' => [
                        'clock_type' => 'default',
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--mcont:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'second-background-color',
                [
                    'label' => esc_html('Second Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'default' => null,
                    'condition' => [
                        'clock_type' => 'default',
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--scont:{{VALUE}}'
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
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--htag:{{VALUE}}'
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
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--mtag:{{VALUE}}'
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
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ele-dclock-container' => '--stag:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'clock-background-color-clock-02',
                [
                    'label' => esc_html('Clock Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => 'clock-02',
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .clock-02' => '--clockBackground:{{VALUE}}'
                    ]
                ]
            );
            $this->add_control(
                'cell-background-color-clock-02',
                [
                    'label' => esc_html('Cell Background Color', 'ele-digital-clock'),
                    'type' => Controls_Manager::COLOR,
                    'condition' => [
                        'clock_type' => 'clock-02',
                        'style_presets' => 'default',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .clock-02' => '--cellBackground:{{VALUE}}'
                    ]
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            switch ($settings['clock_type']) {
                case 'default':

                    include ELE_DIGITAL_CLOCK_PATH . 'includes/templates/template-digital-clock_01.php';
                    break;

                case 'clock-02':

                    include ELE_DIGITAL_CLOCK_PATH . 'includes/templates/template-digital-clock_02.php';
                    break;
                case 'clock-03':

                    include ELE_DIGITAL_CLOCK_PATH . 'includes/templates/template-digital-clock_03.php';
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
}
