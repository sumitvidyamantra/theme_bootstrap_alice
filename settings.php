<?php

/**
 * Settings for the bootstrap theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    

	$name = 'theme_bootstrap_alice/enablejquery';
    $title = get_string('enablejquery','theme_bootstrap_alice');
    $description = get_string('enablejquerydesc', 'theme_bootstrap_alice');
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);
    
    	$settings->add(new admin_setting_heading('theme_bootstrap_alice_layout_header', get_string('pagelayoutsettings', 'theme_bootstrap_alice'), ''));
     // Display logo or heading
    $name = 'theme_bootstrap_alice/displaylogo';
    $title = get_string('displaylogo','theme_bootstrap_alice');
    $description = get_string('displaylogodesc', 'theme_bootstrap_alice');
    $default = '0';
    $choices = array(0=>get_string('heading', 'theme_bootstrap_alice'),1=>get_string('mylogo', 'theme_bootstrap_alice'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting); 
    

    
    // Logo file setting
    $name = 'theme_bootstrap_alice/logo';
    $title = get_string('logo','theme_bootstrap_alice');
    $description = get_string('logodesc', 'theme_bootstrap_alice');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $settings->add($setting);



}