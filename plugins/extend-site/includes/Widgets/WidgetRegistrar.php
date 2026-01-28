<?php

namespace ExtendSite\Widgets;

if (!defined('ABSPATH')) {
    exit;
}

final class WidgetRegistrar {

    /**
     * Boot widget registration
     */
    public static function boot(): void
    {
        add_action('widgets_init', [self::class, 'register']);
    }

    /**
     * Register all widgets
     */
    public static function register(): void {
        register_widget(ContactInfoWidget::class);
    }
}