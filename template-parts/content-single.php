<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inner-post">
        <div class="single-post-breadcrumb">
            <?php 
                if( function_exists('is_woocommerce') && get_option('blank-elements-pro') ) { 
                    if(is_woocommerce()){
                        if(get_option('blank-elements-pro')['display_breadcrumb-option'][0]=='show'){
                            woocommerce_breadcrumb();
                        }
                    }
                } else{
                    //echo 'test';
                    blank_breadcrumb();
                }
                
            ?>
        </div>
        <div class="entry-content">
            <?php the_content();
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php //blank_entry_footer(); ?>
            <div class="single-tags">
                <?php the_tags( '', '', '' ); ?>
            </div>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
