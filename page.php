<?php
get_header();
if ( class_exists( 'WooCommerce' ) ) {
    
}else{
    the_content();
}

?>
<div class="site-content">
        <div class="container clearfix">
            <main id="primary" class="site-main" style="padding-left:10px;padding-right:10px;">

                <?php
               if(get_option('blank-elements-pro')){
                $posts_per_page =  (get_option('blank-elements-pro')['product_per_page-count'][0]==null)?5:get_option('blank-elements-pro')['product_per_page-count'][0];
                $products_limit = ($posts_per_page)?'products limit="'.$posts_per_page.'"': null;

                $shop_page_style = get_option('blank-elements-pro')['shop_page_style'][0];
                $columns = ($shop_page_style)?'columns="'.$shop_page_style.'"':null;

                $display_pagination = get_option('blank-elements-pro')['display_pagination'][0];
                $paginate = ($display_pagination=='show')?'paginate=true':'paginate=false';
               }
               
                // check for plugin using plugin name
                if ( class_exists( 'WooCommerce' ) ) {
                    if(in_array('configurator-elements/configurator-elements.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
                            
                        if(is_woocommerce()){
                                //echo do_shortcode('[products limit='. $posts_per_page.' paginate=true]');
                                if(get_option('blank-elements-pro')){
                                    echo do_shortcode('['.$products_limit.' '.$columns.' '.$paginate.']');
                                }else{
                                    echo do_shortcode('[products]');
                                }
                            }else if(is_cart()){
                                echo do_shortcode('[woocommerce_cart]');
                            }else if(is_checkout()){
                                echo do_shortcode('[woocommerce_checkout]');
                            }
                            elseif(is_account_page()){
                                echo do_shortcode('[woocommerce_my_account]');
                            }
                    }
                    else{
                        while ( have_posts() ) :
                            the_post();  
                                get_template_part( 'template-parts/content', 'page' );
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
    
                        endwhile; // End of the loop.
                    }
                }
                else{
                    while ( have_posts() ) :
                        the_post();  
                            get_template_part( 'template-parts/content', 'page' );
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                   
                }
                ?>

            </main><!-- #main -->
            <?php //get_sidebar(); ?>
        </div>
    </div>
<?php
get_footer();