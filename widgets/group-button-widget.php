<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Group_Button_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'group_button_widget';
    }

    public function get_title()
    {
        return __('Tarikul Group Button', 'tarikul-egbw');
    }

    public function get_icon()
    {
        return 'fa fa-link';
    }

    public function get_categories()
    {
        return ['custom-widgets'];
    }

    public function get_keywords()
    {
        return ['button', 'link', 'group'];
    }

    protected function _register_controls()
    {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'tarikul-egbw'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Button 1 controls
        $this->add_control(
            'button_1_text',
            [
                'label' => __('Button 1 Text', 'tarikul-egbw'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button 1', 'tarikul-egbw'),
            ]
        );

        $this->add_control(
            'button_1_link',
            [
                'label' => __('Button 1 Link', 'tarikul-egbw'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'tarikul-egbw'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        // Button 2 controls
        $this->add_control(
            'button_2_text',
            [
                'label' => __('Button 2 Text', 'tarikul-egbw'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button 2', 'tarikul-egbw'),
            ]
        );

        $this->add_control(
            'button_2_link',
            [
                'label' => __('Button 2 Link', 'tarikul-egbw'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'tarikul-egbw'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'tarikul-egbw'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button 1 Styling
        $this->add_control(
            'button_1_color',
            [
                'label' => __('Button 1 Color', 'tarikul-egbw'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-1' => 'background-color: {{VALUE}};',
                ],
                'default' => '#28a745',
            ]
        );

        $this->add_control(
            'button_1_hover_color',
            [
                'label' => __('Button 1 Hover Color', 'tarikul-egbw'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-1:hover' => 'background-color: {{VALUE}};',
                ],
                'default' => '#218838',
            ]
        );

        // Button 2 Styling
        $this->add_control(
            'button_2_color',
            [
                'label' => __('Button 2 Color', 'tarikul-egbw'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-2' => 'background-color: {{VALUE}};',
                ],
                'default' => '#dc3545',
            ]
        );

        $this->add_control(
            'button_2_hover_color',
            [
                'label' => __('Button 2 Hover Color', 'tarikul-egbw'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-2:hover' => 'background-color: {{VALUE}};',
                ],
                'default' => '#c82333',
            ]
        );

        // Button Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'tarikul-egbw'),
                'selector' => '{{WRAPPER}} .btn-1, {{WRAPPER}} .btn-2',
            ]
        );

        // Padding and Margin Controls
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Button Padding', 'tarikul-egbw'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-1, {{WRAPPER}} .btn-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '10',
                    'right' => '35',
                    'bottom' => '10',
                    'left' => '35',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Button Margin', 'tarikul-egbw'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-1, {{WRAPPER}} .btn-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Button Border Radius', 'tarikul-egbw'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-1' => 'border-top-left-radius: {{TOP}}{{UNIT}}; border-bottom-left-radius: {{BOTTOM}}{{UNIT}};',
                    '{{WRAPPER}} .btn-2' => 'border-top-right-radius: {{TOP}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '5',
                    'right' => '0',
                    'bottom' => '5',
                    'left' => '0',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $button_1_text = $settings['button_1_text'];
        $button_1_link = $settings['button_1_link']['url'];
        $button_1_target = $settings['button_1_link']['is_external'] ? ' target="_blank"' : '';

        $button_2_text = $settings['button_2_text'];
        $button_2_link = $settings['button_2_link']['url'];
        $button_2_target = $settings['button_2_link']['is_external'] ? ' target="_blank"' : '';

        echo '<div class="group-button-widget" style="display: flex; width: 100%;">';

        echo '<a href="' . esc_url($button_1_link) . '" class="btn-1" ' . $button_1_target . '>';
        echo esc_html($button_1_text);
        echo '</a>';

        echo '<a href="' . esc_url($button_2_link) . '" class="btn-2" ' . $button_2_target . '>';
        echo esc_html($button_2_text);
        echo '</a>';

        echo '</div>';
    }

    protected function _content_template()
    {
        ?>
        <# var button_1_link=settings.button_1_link.url; var button_1_target=settings.button_1_link.is_external
            ? ' target="_blank"' : '' ; var button_2_link=settings.button_2_link.url; var
            button_2_target=settings.button_2_link.is_external ? ' target="_blank"' : '' ; #>

            <div class="group-button-widget" style="display: flex; width: 100%;">
                <a href="{{ button_1_link }}" class="btn-1" {{ button_1_target }}>
                    {{{ settings.button_1_text }}}
                </a>
                <a href="{{ button_2_link }}" class="btn-2" {{ button_2_target }}>
                    {{{ settings.button_2_text }}}
                </a>
            </div>
            <?php
    }
}
