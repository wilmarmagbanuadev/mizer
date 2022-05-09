<?php
get_header();
?>
    <div class="site-content">
        <div class="container clearfix">
            <main id="primary" class="site-main">
                <div class="content content-home">
                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) :
                            ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                            <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;
                        the_posts_navigation(
                            array(
                                'prev_text' => __('Older Articles', 'mizer').'<i class="fa fa-angle-right"></i>',
                                'next_text' => '<i class="fa fa-angle-left"></i>'.__('Newer Articles', 'mizer'),
                                'screen_reader_text' => __('Posts navigation', 'mizer')
                            )
                        );

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>
            </main><!-- #main -->

            <?php get_sidebar(); ?>
        </div>
    </div>
<?php
get_footer();
