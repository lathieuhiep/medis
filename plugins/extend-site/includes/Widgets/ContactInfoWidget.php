<?php

namespace ExtendSite\Widgets;

use ExtendSite\Helpers\ESHelpers;
use WP_Widget;

if (!defined('ABSPATH')) {
    exit;
}

class ContactInfoWidget extends WP_Widget
{
    /* Widget setup */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'es-contact-info-widget',
            'description' => esc_html__('A widget that displays your info company', 'extend-site'),
        );

        parent::__construct('es-contact-info-widget', 'Extend Site: Thông tin liên hệ', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance): void
    {
        echo wp_kses_post($args['before_widget']);

        if (!empty($instance['title'])) {
            echo wp_kses_post($args['before_title']) . apply_filters('widget_title', $instance['title']) . wp_kses_post($args['after_title']);
        }
        ?>

        <div class="es-contact-info-widget">
            <?php if (!empty($instance['address'])) : ?>
                <div class="item">
                    <div class="item__icon">
                        <i class="es-icon-mask es-icon-mask-location-dot"></i>
                    </div>

                    <div class="item__content">
                        <?php echo esc_html($instance['address']); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($instance['hotline'])) : ?>
                <div class="item">
                    <div class="item__icon">
                        <i class="es-icon-mask es-icon-mask-phone"></i>
                    </div>

                    <div class="item__content">
                        <a href="tel:<?php echo esc_attr( ESHelpers::preg_replace_ony_number( $instance['hotline'] ) ); ?>">
                            <?php echo esc_html($instance['hotline']); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($instance['facebook'])) : ?>
                <div class="item">
                    <div class="item__icon">
                        <i class="es-icon-mask es-icon-mask-facebook-f"></i>
                    </div>

                    <div class="item__content">
                        <a href="<?php echo esc_url($instance['facebook']); ?>" target="_blank" rel="noopener">
                            <?php echo esc_html($instance['facebook']); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($instance['mail'])) : ?>
                <div class="item">
                    <div class="item__icon">
                        <i class="es-icon-mask es-icon-mask-envelope"></i>
                    </div>

                    <div class="item__content">
                        <a href="mailto:<?php echo esc_attr($instance['mail']); ?>">
                            <?php echo esc_html($instance['mail']); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php
        echo wp_kses_post($args['after_widget']);
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    function form($instance): void
    {
        $defaults = array(
            'title' => '',
            'address' => '',
            'hotline' => '',
            'facebook' => '',
            'mail' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php esc_html_e('Tiêu đề:', 'extend-site'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>"
                   value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>">
                <?php esc_html_e('Địa chỉ:', 'extend-site'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>"
                   name="<?php echo $this->get_field_name('address'); ?>"
                   value="<?php echo esc_attr($instance['address']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hotline'); ?>">
                <?php esc_html_e('Hotline:', 'extend-site'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('hotline'); ?>"
                   name="<?php echo $this->get_field_name('hotline'); ?>"
                   value="<?php echo esc_attr($instance['hotline']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">
                <?php esc_html_e('Facebook:', 'extend-site'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>"
                   name="<?php echo $this->get_field_name('facebook'); ?>"
                   value="<?php echo esc_attr($instance['facebook']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('mail'); ?>">
                <?php esc_html_e('Mail:', 'extend-site'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('mail'); ?>"
                   name="<?php echo $this->get_field_name('mail'); ?>"
                   value="<?php echo esc_attr($instance['mail']); ?>" />
        </p>
        <?php

    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    function update($new_instance, $old_instance): array
    {
        $instance = array();

        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['address'] = sanitize_text_field($new_instance['address']);
        $instance['hotline'] = sanitize_text_field($new_instance['hotline']);
        $instance['facebook'] = esc_url_raw($new_instance['facebook']);
        $instance['mail'] = sanitize_email($new_instance['mail']);

        return $instance;
    }
}
