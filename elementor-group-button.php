<?php
/**
 * Plugin Name: Elementor Group Button Widget
 * Description: Custom Elementor widget for a group button.
 * Version: 1.0
 * Author: Tarikul Islam 
 * Author URI: mailto: tarikul47@gmail.com
 *License: GPLv2 or later
 *Text Domain: tarikul-egbw
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Register Custom Widget Category
function register_group_button_widget_category($elements_manager)
{
    $elements_manager->add_category(
        'tarikul-widgets',
        [
            'title' => __('Tarikul Widgets', 'tarikul-egbw'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'register_group_button_widget_category');

// Register the widget
function register_group_button_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/group-button-widget.php');
    $widgets_manager->register(new \Elementor\Group_Button_Widget());
}
add_action('elementor/widgets/register', 'register_group_button_widget');
