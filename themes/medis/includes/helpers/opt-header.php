<?php

use ExtendSite\Admin\Options\Modules\HeaderOptions;

defined('ABSPATH') || exit;

/**
 * Get header sticky menu option
 */
function medis_opt_header_sticky_menu(): bool
{
    return medis_opt(HeaderOptions::class)::get_position_fixed_menu() ?? true;
}