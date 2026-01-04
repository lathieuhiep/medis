<?php
use ExtendSite\Admin\Options\Modules\HeaderOptions;

defined('ABSPATH') || exit;

$sticky_menu = medis_opt(HeaderOptions::class)::get_position_fixed_menu() ?? true;
?>

<header class="main-header <?php echo esc_attr( $sticky_menu ? 'active-sticky-nav' : '' ); ?>">
    <?php
    get_template_part('template-parts/header/parts/inc', 'top');
    get_template_part('template-parts/header/parts/inc', 'nav');
    ?>
</header>