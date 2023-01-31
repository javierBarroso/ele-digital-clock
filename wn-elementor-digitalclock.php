<?php
/**
 * Plugin Name: Ele Digital Clock
 * Description: Fancy and customizable Digital Clock widgets for Elementor.
 * Version:     1.0.0
 * Author:      Javier Barroso
 * Author URI:  https://profiles.wordpress.org/javierbarroso/
 */

 /**
 * Elementor tested up to: 3.6.1
 * Elementor Pro tested up to: 3.6.0
 */

if(!defined('ABSPATH')){
    exit();
}

function wn_digital_clock_addon(){

    require_once(__DIR__.'/includes/plugin.php');

    wn_digital_clock\Plugin::instance();

}

add_action('plugin_loaded', 'wn_digital_clock_addon');