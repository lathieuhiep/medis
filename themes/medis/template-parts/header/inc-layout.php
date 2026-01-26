<?php
$sticky_menu = medis_opt_header_sticky_menu();
?>

<header class="main-header <?php echo esc_attr( $sticky_menu ? 'active-sticky-nav' : '' ); ?>">
    <?php
    get_template_part('template-parts/header/parts/inc', 'top');
    get_template_part('template-parts/header/parts/inc', 'nav');
    ?>
</header>

<?php get_template_part('template-parts/header/parts/inc', 'menu-mobile'); ?>