<?php 
    $orig_post = $post;
    global $post;

    $categories = '';
    $tags = '';

    $categories = get_the_category($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args=array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 3, // Number of related posts that will be shown.
            'ignore_sticky_posts'=>1
        );
    }
    if ($categories) {
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) {
            echo '<div class="relatedposts"><h3 class="section-heading">' . __('Recent Posts','mizer') . '</h3><ul>';
            while( $my_query->have_posts() ) {
                $my_query->the_post();?>
                <li>
                    <div class="related-content">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="relatedthumb">
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow">
                                    <?php the_post_thumbnail('related'); ?>
                                </a>
                            </div><!-- .relatedthumb -->
                        <?php } ?>
                        <div class="relatedcontent">
                            <?php 
                                $categories_list = get_the_category_list( esc_html__( ', ', 'mizer' ) );
                                if ( $categories_list ) {
                                    /* translators: 1: list of categories. */
                                    printf( '<span class="cat-links">' . esc_html__( '%1$s', 'mizer' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                }
                            ?>
                            <header>
                                <h2 class="title widgettitle">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow"><?php the_title(); ?></a>
                                </h2>
                            </header><!--.header-->
                            <div class="post-meta">
                                <span class="post-author">
                                    <?php echo esc_html__( 'by ', 'mizer' ) ?>
                                    <?php the_author_posts_link(); ?>
                                </span>
                            </div>
                            <?php printf( '<div class="read-more"><a href="%1$s">%2$s</a></div>', esc_url( get_the_permalink() ), esc_html( 'read article' ) ); ?>
                        </div><!--relatedcontent-->
                    </div><!--.related-content-->
                </li>
                <?php
            }
            echo '</ul></div>';
        }
    }
    $post = $orig_post;
    wp_reset_query();
?>