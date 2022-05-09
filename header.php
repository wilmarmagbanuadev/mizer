<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mizer' ); ?></a>

	<header id="masthead" class="site-header">
        <?php if(get_option('header_text')=='false' && get_option('header_socmed')=='false'){?>

        <?php }elseif(get_option('top_header_text') || get_option('fb') || get_option('twitter') || get_option('linkedin') || get_option('header_socmed')=='true' || get_option('header_socmed')=='true'){ ?>
            <div class="top-header-bar">
                <?php if(get_option('header_text')=='true'){ ?>
                        <?php if(get_option('top_header_text')){ ?>
                            <div class="recent-news-feed">
                                <?php echo (get_option('top_header_text'))?get_option('top_header_text'):'If you can Dream it you can Configure it';?>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    <?php if(get_option('header_socmed')=='true'){ ?>
                    <div class="header-social-links">
                        <ul>
                            <?php if(get_option('fb')){ ?><li><a href="<?php echo get_option('fb');?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
                            <?php if(get_option('twitter')){ ?><li><a href="<?php echo get_option('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
                            <?php if(get_option('linkedin')){ ?><li><a href="<?php echo get_option('linkedin');?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="main-header clearfix">
            <div class="site-branding">
                <?php
                $site_logo = the_custom_logo();
                if(get_option('site_logo')=='true'){
                    echo ($site_logo)?$site_logo:'<img src="'.get_template_directory_uri().'/assets/images/mizer-logo.png">';
                }
                
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo (get_bloginfo( 'name' ))? get_bloginfo( 'name' ):''; ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo (get_bloginfo( 'name' ))? get_bloginfo( 'name' ):''; ?></a></p>
                    <?php
                endif;
                $blank_description = get_bloginfo( 'description', 'display' );
                if ( $blank_description || is_customize_preview() ) {
                    ?>
                    <p class="site-description"><?php echo (get_bloginfo( 'description')) ? get_bloginfo( 'description'): 'If you can Dream it you can Configure it'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php }else{ ?>
                    <p class="site-description"><?php echo (get_bloginfo( 'description')) ? get_bloginfo( 'description'): 'If you can Dream it you can Configure it'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
               <?php } ?>
            </div><!-- .site-branding -->
            <div class="container">
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="btn_menu"></span></button>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
	</header><!-- #masthead -->
