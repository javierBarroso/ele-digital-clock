<?php
    $style_preset = 'default-style-preset';
    if(!empty($settings)){
        switch($settings['style_presets']){
            case 'glass':
                $style_preset = 'glass-style-preset';
                break;
            case 'light':
                $style_preset = 'light-style-preset';
                break;
            case 'dark':
                $style_preset = 'dark-style-preset';
                break;
            
        }

    }
?>


<script>set_timezone('<?= esc_html($settings['clock_time_zone']) ?>')</script>
<section class="ele-dclock-container">
    <div class="clock-03 <?= esc_attr( $style_preset ) ?>">
        <h2 class="clock-title"><?= esc_html($settings['head-text']) ?></h2>
        <div class="ele-dclock">
            <div class="cell-cont hcont">
                <div class="dot hr_dot"></div>
                <svg>
                    <circle cx='70' cy='70' r='70px'></circle>
                    <circle cx='70' cy='70' r='70px' class="hh"></circle>
                </svg>
                <div class="cell-data">
                    <div class="cell hour" data-h="<?= esc_attr( $settings['hour_format'] ) ?>">00</div>
                    <div class="tag">Hour</div>
                </div>
            </div>
            <div class="cell-cont mcont">
                <div class="dot min_dot"></div>
                <svg>
                    <circle cx='70' cy='70' r='70'></circle>
                    <circle cx='70' cy='70' r='70' class="mm"></circle>
                </svg>
                <div class="cell-data">

                    <div class="cell minute">00</div>
                    <div class="tag">minute</div>
                </div>
                
            </div>
            <div class="cell-cont scont">
                <div class="dot sec_dot"></div>
                <svg>
                    <circle cx='70' cy='70' r='70'></circle>
                    <circle cx='70' cy='70' r='70' class="ss"></circle>
                </svg>
                <div class="cell-data">

                    <div class="cell second">00</div>
                    <div class="tag">second</div>
                </div>
                
            </div>
            <span class="am-tag" style="display:<?= esc_attr( $settings['hour_format'] == 24 ? 'none' : 'block' ) ?>">AM</span>
        </div>
    </div>
</section>

