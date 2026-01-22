(function ($) {
    "use strict";

    $(document).ready(function () {
        // back to top
        $('#back-top').on('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // mobile menu
        const windowWidth = $(window).width();
        const subMenuToggle = $('.sub-menu-toggle');

        if (subMenuToggle.length) {
            subMenuToggle.on('click', function () {
                if (windowWidth < 992) {
                    const $this = $(this);
                    const $parentMenuItem = $this.closest('.menu-item-has-children');

                    // Toggle class 'active'
                    $this.toggleClass('active');
                    $parentMenuItem.children('.sub-menu').slideToggle();

                    // Close all other submenus, including child levels
                    $parentMenuItem.siblings('.menu-item-has-children')
                        .find('.sub-menu-toggle').removeClass('active')
                        .end().find('.sub-menu').slideUp();

                    // Close all submenus within the current level
                    $parentMenuItem.find('.menu-item-has-children .sub-menu')
                        .slideUp()
                        .prev('.sub-menu-toggle').removeClass('active');
                }
            });
        }

        // close menu when click outside
        $(document).on('click', function (event) {
            const clickTarget = $(event.target);
            const primaryMenu = $("#primary-menu");

            if (!clickTarget.closest('#primary-menu, .sub-menu-toggle').length) {
                primaryMenu.collapse('hide');
                primaryMenu.find('.sub-menu').slideUp();
                primaryMenu.find('.sub-menu-toggle').removeClass('active');
            }
        });

        // loading
        $(window).on("load", function () {
            $('#site-loading').remove();
        });

        // scroll event
        let isScrolling;
        $(window).on('scroll', function () {
            if (isScrolling) cancelAnimationFrame(isScrolling);

            isScrolling = requestAnimationFrame(function () {
                let $scrollTop = $(window).scrollTop();

                if ($scrollTop > 200) {
                    $('#back-top').addClass('active_top');
                } else {
                    $('#back-top').removeClass('active_top');
                }
            });
        });

        // offcanvas menu-mobile resize
        let resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if ($(window).width() > 991) {
                    $('.offcanvas-menu-mobile.show').each(function() {
                        const instance = bootstrap.Offcanvas.getInstance(this);
                        if (instance) instance.hide();
                    });
                }
            }, 150); // Chỉ chạy sau khi ngừng kéo chuột 150ms
        });


        // handle click show submenu on mobile
        handleClickShowSubmenuOnMobile()
    });

    // handle click show submenu on mobile
    const handleClickShowSubmenuOnMobile = () => {
        const subMenuToggle = $('.sub-menu-toggle')

        if ( subMenuToggle.length ) {
            subMenuToggle.each(function () {
                $(this).on( 'click', function () {
                    const widthScreen = $(window).width()

                    if ( widthScreen < 992 ) {
                        $(this).toggleClass('active')
                        $(this).closest( '.menu-item-has-children' ).siblings().find( subMenuToggle ).removeClass( 'active' )
                        $(this).parent().children( '.sub-menu' ).slideToggle()
                        $(this).parents( '.menu-item-has-children' ).siblings().find( '.sub-menu' ).slideUp()
                    }
                } )
            })
        }
    }
})(jQuery);