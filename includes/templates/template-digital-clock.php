<section class="ele-dclock-container">
    <script>setInterval(ele_digital_clock, 1000);</script>
    <div class="ele-dclock" id="card">
        <h2><?= esc_html($settings['head-text']) ?></h2>
        <div id="time">
            <div class="cell-cont hcont" id="hcont">
                <div class="cell" id="hour">00<span id="am-tag"></span></div>
                <div class="tag" id="htag"><?= esc_html($settings['hour-text']) ?></div>
            </div>
            <div class="cell-cont mcont" id="mcont"><div class="cell" id="minute">00</div><div class="tag" id="mtag"><?= esc_html($settings['minute-text']) ?></div></div>
            <div class="cell-cont scont" id="scont"><div class="cell" id="second">00</div><div class="tag" id="stag"><?= esc_html($settings['second-text']) ?></div></div>
            
        </div>
    </div>
</section>