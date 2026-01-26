<?php

namespace ExtendSite\ElementorAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use ExtendSite\Constants\Config;
use ExtendSite\Helpers\ESHelpers;

defined('ABSPATH') || exit;

class TermGrid extends Widget_Base
{
    // widget name
    public function get_name(): string
    {
        return 'es-term-grid';
    }

    // widget title
    public function get_title(): string
    {
        return esc_html__('Danh mục dạng lưới', 'extend-site');
    }

    // widget icon
    public function get_icon(): string
    {
        return 'eicon-gallery-grid';
    }

    // widget categories
    public function get_categories(): array
    {
        return ['es-addons'];
    }

    // widget keywords
    public function get_keywords(): array
    {
        return ['term', 'grid', 'extend site'];
    }

    // widget controls
    protected function register_controls(): void
    {
        // ===== CONTENT =====
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Nội dung', 'extend-site'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'term_name',
            [
                'label' => esc_html__('Tiêu đề', 'extend-site'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Tiêu đề', 'extend-site'),
                'label_block' => true
            ]
        );

        $repeater->add_control(
            'term_id',
            [
                'label' => esc_html__('Chọn danh mục', 'extend-site'),
                'type' => Controls_Manager::SELECT,
                'options' => ESHelpers::get_tax_list('category'),
                'label_block' => true
            ]
        );

        $repeater->add_control(
            'custom_image',
            [
                'label' => esc_html__('Ảnh / Icon (ghi đè)', 'extend-site'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Danh sách hiển thị', 'extend-site'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ term_name }}}',
            ]
        );

        $this->end_controls_section();

        // ===== LAYOUT =====
        $this->start_controls_section(
            'layout_section',
            [
                'label' => esc_html__('Thiết lập giao diện', 'extend-site'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'column_number',
            [
                'label' => esc_html__('Số cột', 'extend-site'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
                'default' => 3,
                'selectors' => [
                    '{{WRAPPER}} .es-grid-layout' => 'grid-template-columns: repeat({{VALUE}}, 1fr)',
                ],
            ]
        );

        $this->add_responsive_control(
            'gap',
            [
                'label' => esc_html__('Khoảng cách', 'extend-site'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .es-grid-layout' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE TERM NAME =====
        $this->start_controls_section(
            'style_term_name',
            [
                'label' => esc_html__('Tên danh mục', 'extend-site'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'term_name_typography',
                'label' => esc_html__('Kiểu chữ', 'extend-site'),
                'selector' => '{{WRAPPER}} .item .title',
            ]
        );

        $this->add_control(
            'term_name_color',
            [
                'label' => esc_html__('Màu sắc', 'extend-site'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'term_name_color_hover',
            [
                'label' => esc_html__('Màu sắc (di chuột)', 'extend-site'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE TERM DESC =====
        $this->start_controls_section(
            'style_term_desc',
            [
                'label' => esc_html__('Nội dung danh mục', 'extend-site'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'term_desc_typography',
                'label' => esc_html__('Kiểu chữ', 'extend-site'),
                'selector' => '{{WRAPPER}} .item .description',
            ]
        );

        $this->add_control(
            'term_desc_color',
            [
                'label' => esc_html__('Màu sắc', 'extend-site'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // widget render
    protected function render(): void
    {
        $settings = $this->get_settings_for_display();
        $items = $settings['items'] ?? [];

        if (empty($items)) {
            return;
        }
        ?>
        <div class="es-addon-term-grid es-grid-layout">
            <?php
            foreach ($items as $item) :
                $term_id = (int)($item['term_id'] ?? 0);

                // get valid term ID
                if (!$term_id) {
                    continue;
                }

                // Get term object
                $term = get_term($term_id);
                if (!$term || is_wp_error($term)) {
                    continue;
                }

                // Get term link and description
                $link = get_term_link($term);
                $desc = wp_strip_all_tags($term->description);

                // Get custom image or term thumbnail
                $image_url = Config::$url . 'assets/images/no-image.png';

                if (!empty($item['custom_image']['url'])) {
                    $image_url = esc_url($item['custom_image']['url']);
                }
                ?>

                <div class="item">
                    <div class="item__thumbnail">
                        <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($term->name); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>"/>
                        </a>
                    </div>

                    <div class="item__body">
                        <h3 class="title">
                            <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($term->name); ?>">
                                <?php echo esc_html($item['term_name']); ?>
                            </a>
                        </h3>

                        <?php if (!empty($desc)) : ?>
                            <div class="description">
                                <?php echo wpautop($desc); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php
            endforeach;
            ?>
        </div>
        <?php
    }
}