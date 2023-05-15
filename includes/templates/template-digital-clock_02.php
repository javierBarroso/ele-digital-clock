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
    <div class="clock-02 <?= esc_attr( $style_preset ) ?>">
        <h2 class="clock-title"><?= esc_html($settings['head-text']) ?></h2>
        <div class="ele-dclock">
            <div class="cell-cont hcont">
                <div class="cell hour" data-h="<?= esc_attr( $settings['hour_format'] ) ?>">00</div>
                <div class="tag"><?= esc_html($settings['hour-text']) ?></div>
            </div>
            <div class="dot">:</div>
            <div class="cell-cont mcont">
                <div class="cell minute">00</div>
                <div class="tag"><?= esc_html($settings['minute-text']) ?></div>
            </div>
            <div class="dot">:</div>
            <div class="cell-cont scont">
                <div class="cell second">00</div>
                <div class="tag"><?= esc_html($settings['second-text']) ?></div>
            </div>
            <span class="am-tag" style="display:<?= esc_attr( $settings['hour_format'] == 24 ? 'none' : 'block' ) ?>">AM</span>
        </div>
    </div>
</section>

