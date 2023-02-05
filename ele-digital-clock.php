<?php

/**
 * Plugin Name: Ele Digital Clock
 * Description: Fancy and customizable Digital Clock widgets for Elementor.
 * Version:     1.0.0
 * Author:      Javier Barroso
 * Author URI:  https://profiles.wordpress.org/javierbarroso/
 */

/*
Ele Digital Clock is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Ele Digital Clock is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Ele Digital Clock. If not, see {URI to Plugin License}.
*/

/**
 * Elementor tested up to: 3.10.2
 * Elementor pro tested up to: 3.10.1
 */

define( 'MY_PLUGIN_PATH', plugin_dir_path( __DIR__ ) );

if(!defined('ABSPATH')){
    exit();
}

function ele_digital_clock(){

    require_once(__DIR__.'/includes/plugin.php');

    Plugin::instance();

    

}

add_action('plugin_loaded', 'ele_digital_clock');


function activate_ele_digital_clock(){
    flush_rewrite_rules(  );
}
function deactivate_ele_digital_clock(){
    flush_rewrite_rules(  );
}

register_activation_hook( __FILE__, 'activate_ele_digital_clock' );

register_deactivation_hook( __FILE__, 'deactivate_ele_digital_clock' );