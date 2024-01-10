<?php
/**

* Add textdomain support to the theme

*/

add_action('after_setup_theme', 'load_textdomain_func');

function load_textdomain_func()

{

load_theme_textdomain('gbi_esterel', get_template_directory() . '/languages');

}