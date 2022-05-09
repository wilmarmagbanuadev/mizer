<?php
get_header();
?>
    <div class="site-content">
        <main id="primary" class="site-main">

            <?php
            while ( have_posts() ) :
                the_post(); 
                $class = '';
                if ( has_post_thumbnail() ) {
                    $class = 'single-post-bg';
                } ?>
                <div class="single-post-header">
                    <div class="single-post-thumbnail <?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
                            <div class="single-post-header-content">
                                <?php 
                                    $categories_list = get_the_category_list( esc_html__( ', ', 'mizer' ) );
                                    if ( $categories_list ) {
                                        /* translators: 1: list of categories. */
                                        printf( '<span class="cat-links">' . esc_html__( '%1$s', 'mizer' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    }

                                    the_title( '<h1 class="entry-title">', '</h1>' );
                                ?>
                                <div class="single-post-meta">
                                    <span class="post-author">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 60 ); ?>
                                        <?php echo esc_html__( 'by ', 'mizer' ) ?>
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                    <span class="post-date">
                                        <time itemprop="datePublished" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_html( get_the_date() ); ?>">
                                            <?php the_time('d M, Y'); ?>
                                        </time>
                                    </span>
                                    <span class="post-comments"> <?php comments_popup_link( __( 'Leave a Comment', 'mizer' ), __( '1 Comment', 'mizer' ), __( '% Comments', 'mizer' ), 'comments-link', __( 'Comments are off', 'mizer' )); ?>
                                    </span>
                                </div>

                            </div>
                    </div>
                    <div class="single-post-bg-overlay"></div>
                </div>                
                <div class="container">
                    <?php get_template_part( 'template-parts/content-single' );
                    // Author Box
                    get_template_part('template-parts/author-box');
                    
                    /*the_post_navigation(
                        array(
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'mizer' ) . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'mizer' ) . '</span> <span class="nav-title">%title</span>',
                        )
                    );
                    */
                    // Author Box
                    get_template_part('template-parts/related-posts');

                    ?>
                </div>
                <?php // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile; // End of the loop. ?>

        </main><!-- #main -->
        <?php //get_sidebar(); ?>
    </div>

<?php
get_footer();
