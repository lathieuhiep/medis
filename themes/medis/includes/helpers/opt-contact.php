<?php

use ExtendSite\Admin\Options\Modules\ContactOptions;

defined('ABSPATH') || exit;

/**
 * Get contact address
 */
function medis_opt_contact_address(): string
{
    return medis_opt(ContactOptions::class)::get_address() ?? '';
}

/**
 * Get working hours
 */
function medis_opt_contact_working_hours(): string
{
    return medis_opt(ContactOptions::class)::get_working_hours() ?? '';
}

/**
 * Get hotline number
 */
function medis_opt_contact_hotline(): string
{
    return medis_opt(ContactOptions::class)::get_hotline() ?? '';
}

/**
 * Get Zalo contact
 */
function medis_opt_contact_zalo(): string
{
    return medis_opt(ContactOptions::class)::get_zalo() ?? '';
}

/**
 * Get Messenger link
 */
function medis_opt_contact_messenger(): string
{
    return medis_opt(ContactOptions::class)::get_messenger() ?? '';
}

/**
 * Get Booking page ID
 */
function medis_opt_contact_booking(): int
{
    return medis_opt(ContactOptions::class)::get_booking() ?? 0;
}