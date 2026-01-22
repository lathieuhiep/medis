<?php

namespace ExtendSite\Admin\Options\Modules;

use Carbon_Fields\Field;
use ExtendSite\Admin\Options\OptionBase;
use ExtendSite\Admin\Options\OptionIF;

defined('ABSPATH') || exit;

class ContactOptions extends OptionBase implements OptionIF
{
    // Key prefix
    private const KEY = 'es_otp_contact_';
    private const WORKING_HOURS = self::KEY . 'working_hours';
    private const HOTLINE = self::KEY . 'hotline';
    private const ZALO = self::KEY . 'zalo';
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
            'hotline' => self::get_hotline(),
            'zalo' => self::get_zalo(),
            'email' => self::get_email(),
            'address' => self::get_address(),
        ];
    }
}