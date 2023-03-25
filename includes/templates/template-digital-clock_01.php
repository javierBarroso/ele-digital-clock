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



<section class="ele-dclock-container">
    
    <div class="ele-dclock" id="card">
        <h2 class="clock-title"><?= esc_html($settings['head-text']) ?></h2>
        <div class="time">
            <div class="cell-cont hcont <?= esc_attr( $style_preset ) ?>">
                <div class="cell hour">00<span class="am-tag">PM</span></div>
                <div class="tag htag"><?= esc_html($settings['hour-text']) ?></div>
            </div>
            <div class="cell-cont mcont <?= esc_attr( $style_preset ) ?>">
                <div class="cell minute">00</div>
                <div class="tag mtag"><?= esc_html($settings['minute-text']) ?></div>
            </div>
            <div class="cell-cont scont <?= esc_attr( $style_preset ) ?>">
                <div class="cell second">00</div>
                <div class="tag stag"><?= esc_html($settings['second-text']) ?></div>
            </div>
            
        </div>
    </div>
</section>
