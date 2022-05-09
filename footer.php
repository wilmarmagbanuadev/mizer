<footer id="colophon" class="site-footer">
        <div class="footer-container">
            <div class="site-info">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                echo '©'.date('Y').' ';
                $check_title = (get_bloginfo( 'title' )==null)?'Mizer':get_bloginfo( 'title' );
                echo (get_option('footer_text'))?'<a href="'.home_url().'">'.get_option('footer_text').'</a>':'<a href="'.home_url().'">'.$check_title.'</a>';
                ?>
            </div><!-- .site-info -->
            <?php if(get_option('footer_socmed')=='true'){ ?>
            <div class="footer-social-links">
                <ul>
                <?php if(get_option('fb')){ ?><li><a href="<?php echo get_option('fb');?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
                <?php if(get_option('twitter')){ ?><li><a href="<?php echo get_option('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
                <?php if(get_option('linkedin')){ ?><li><a href="<?php echo get_option('linkedin');?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
