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


<section class="ele-dclock-container clock-02">
    <h2 class="clock-title"><?= esc_html($settings['head-text']) ?></h2>
    <div class="ele-dclock">
        <div class="cell-cont hcont">
            <div class="cell hour">00</div>
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
        <span class="am-tag">AM</span>
    </div>
</section>

<!-- <section class="ele-dclock-container">
    <script>setInterval(ele_digital_clock, 1000);</script>
    <div class="ele-dclock" id="card">
        <h2><?= esc_html($settings['head-text']) ?></h2>
        <div id="time">
            <div class="cell-cont hcont <?= esc_attr( $style_preset ) ?>" id="hcont">
                <div class="cell hour" id="hour">00<span id="am-tag"></span></div>
                <div class="tag" id="htag"><?= esc_html($settings['hour-text']) ?></div>
            </div>
            <div class="cell-cont mcont <?= esc_attr( $style_preset ) ?>" id="mcont">
                <div class="cell minute" id="minute">00</div>
                <div class="tag" id="mtag"><?= esc_html($settings['minute-text']) ?></div>
            </div>
            <div class="cell-cont scont <?= esc_attr( $style_preset ) ?>" id="scont">
                <div class="cell second" id="second">00</div>
                <div class="tag" id="stag"><?= esc_html($settings['second-text']) ?></div>
            </div>
            
        </div>
    </div>
</section> -->
