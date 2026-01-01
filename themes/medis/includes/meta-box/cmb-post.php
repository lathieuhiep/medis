<?php
add_action('cmb2_admin_init', 'medis_post_meta_boxes');
function medis_post_meta_boxes(): void {
    $cmb = new_cmb2_box(array(
        'id' => 'medis_cmb_post',
        'title' => esc_html__('Tùy chọn metabox', 'medis'),
        'object_types' => array('post'),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true,
    ));

    $cmb->add_field( array(
        'id'   => 'medis_cmb_post_title',
        'name' => esc_html__( 'Tiêu đề', 'medis' ),
        'type' => 'title',
        'desc' => esc_html__( 'Đây là mô tả tiêu đề', 'medis' ),
    ) );
}