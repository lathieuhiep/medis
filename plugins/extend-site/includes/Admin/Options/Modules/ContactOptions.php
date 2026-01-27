<?php

namespace ExtendSite\Admin\Options\Modules;

use Carbon_Fields\Field;
use ExtendSite\Admin\Options\OptionBase;
use ExtendSite\Admin\Options\OptionIF;
use ExtendSite\Helpers\ESHelpers;

defined('ABSPATH') || exit;

class ContactOptions extends OptionBase implements OptionIF
{
    // Key prefix
    private const KEY = 'es_otp_contact_';
    private const WORKING_HOURS = self::KEY . 'working_hours';
    private const HOTLINE = self::KEY . 'hotline';
    private const ZALO = self::KEY . 'zalo';
    private const MESSENGER = self::KEY . 'messenger';
    private const BOOKING = self::KEY . 'booking';
    private const EMAIL = self::KEY . 'email';
    private const ADDRESS = self::KEY . 'address';

    /**
     * fields
     */
    public static function fields(): array
    {
        return [
            // Contact
            Field::make('text', self::WORKING_HOURS, esc_html__('Working hours', 'extend-site'))
                ->set_default_value(esc_html__('09:00 - 19:00 (cả thứ 7, chủ nhật)', 'extend-site')),

            Field::make('text', self::HOTLINE, esc_html__('Hotline', 'extend-site'))
                ->set_default_value('0938.575.118'),

            Field::make('text', self::ZALO, esc_html__('ZaLo (Phone/ID OA)', 'extend-site'))
                ->set_default_value('0938575118'),

            Field::make('text', self::MESSENGER, esc_html__('Messenger (Link)', 'extend-site'))
                ->set_default_value(''),

            Field::make( 'select', self::BOOKING, esc_html__( 'Booking (page)', 'extend-site' ) )
                ->add_options( ESHelpers::get_all_page() ),

            Field::make('text', self::EMAIL, esc_html__('Email', 'extend-site')),

            Field::make('text', self::ADDRESS, esc_html__('Address', 'extend-site'))
                ->set_default_value(esc_html__('64 Bùi Văn Hòa, Biên Hòa, Đồng Nai', 'extend-site')),
        ];
    }

    /**
     * get data
     */

    // get working hours
    public static function get_working_hours(): string
    {
        return (string)self::get(self::WORKING_HOURS);
    }

    // get hotline
    public static function get_hotline(): string
    {
        return (string)self::get(self::HOTLINE);
    }

    // get zalo
    public static function get_zalo(): string
    {
        return (string)self::get(self::ZALO);
    }

    // get messenger
    public static function get_messenger(): string
    {
        return (string)self::get(self::MESSENGER);
    }

    // get booking page ID
    public static function get_booking(): int
    {
        return (int)self::get(self::BOOKING);
    }

    // get email
    public static function get_email(): string
    {
        return (string)self::get(self::EMAIL);
    }

    // get address
    public static function get_address(): string
    {
        return (string)self::get(self::ADDRESS);
    }

    // get all options
    public static function get_all(): array
    {
        return [
            'working_hours' => self::get_working_hours(),
            'hotline' => self::get_hotline(),
            'zalo' => self::get_zalo(),
            'messenger' => self::get_messenger(),
            'email' => self::get_email(),
            'address' => self::get_address(),
            'booking' => self::get_booking(),
        ];
    }
}