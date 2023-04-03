<?php

/**
 * Plugin Name: Ele Digital Clock
 * Description: Fancy and customizable Digital Clock widgets for Elementor.
 * Version:     1.2.0
 * Author:      Javier Barroso
 * Author URI:  https://profiles.wordpress.org/javierbarroso/
 */

/*
Ele Digital Clock is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

Ele Digital Clock is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Ele Digital Clock. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
*/

/**
 * Elementor tested up to: 3.10.2
 * Elementor pro tested up to: 3.10.1
 */








if(!defined('ABSPATH')){
    exit();
}

if(!defined('ELE_DIGITAL_CLOCK_URL')){
    define('ELE_DIGITAL_CLOCK_URL', plugin_dir_url(__FILE__));
}
if(!defined('ELE_DIGITAL_CLOCK_PATH')){
    define('ELE_DIGITAL_CLOCK_PATH', plugin_dir_path(__FILE__));
}
if(!defined('ELE_DIGITAL_CLOCK_TIMEZONE')){
    define('ELE_DIGITAL_CLOCK_TIMEZONE', DateTimeZone::listAbbreviations());
}

function eledc_digital_clock(){

    require_once(__DIR__.'/includes/ele-digital-clock-plugin.php');
    if (class_exists('Eledc_Digital_Clock_Plugin')){
        Eledc_Digital_Clock_Plugin::instance();
    }

}

add_action('plugin_loaded', 'eledc_digital_clock');


function eledc_activate_ele_digital_clock(){
    flush_rewrite_rules(  );
}
function eledc_deactivate_ele_digital_clock(){
    flush_rewrite_rules(  );
}

register_activation_hook( __FILE__, 'eledc_activate_ele_digital_clock' );

register_deactivation_hook( __FILE__, 'eledc_deactivate_ele_digital_clock' );