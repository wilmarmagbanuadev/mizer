<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inner-post">
        <?php blank_post_thumbnail(); ?>
        <header class="entry-header">
            <?php
            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta">
                    <?php
                    blank_posted_on();
                    blank_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif;

            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            echo blank_excerpt_limit('10');

            printf( '<div class="read-more"><a href="%1$s">%2$s<i class="fa fa-angle-right"></i></a></div>', esc_url( get_the_permalink() ), esc_html( 'read article' ) );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mizer' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php //blank_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
