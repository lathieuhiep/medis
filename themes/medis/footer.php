    </main><!-- close .sticky-footer -->

    <?php
    if ( !is_404() ) :
        get_template_part('components/footer/inc', 'layout');
     endif;

    get_template_part('components/inc', 'loading');
    get_template_part('components/inc', 'back-top');
     ?>
</div><!-- close #wrapper -->

<?php wp_footer(); ?>

</body>
</html>