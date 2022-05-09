<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @return void
 */
function mizer_elementor_fail_load_admin_notice() {
	// Leave to Elementor Pro to manage this.
	if ( function_exists( 'elementor_pro_load_plugin' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
		return;
	}

	if ( 'true' === get_user_meta( get_current_user_id(), '_mizer_elementor_install_notice', true ) ) {
		return;
	}

	$plugin = 'elementor/elementor.php';

	$installed_plugins = get_plugins();

	$is_elementor_installed = isset( $installed_plugins[ $plugin ] );
	

	if ( $is_elementor_installed ) {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		$message = __( 'Mizer Theme is a lightweight starter theme. We recommend you to use it together with Elementor Page Builder plugin, they work perfectly together!', 'mizer' );

		$button_text = __( 'Activate Elementor', 'mizer' );
		$button_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$message = __( 'Mizer Theme is a lightweight starter theme. We recommend you to use it together with Elementor Page Builder plugin, they work perfectly together!', 'mizer' );

		$button_text = __( 'Install Elementor', 'mizer' );
		$button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
	}




	?>
	<style>
		.notice.mizer-elementor-notice {
			border: 1px solid #ccd0d4;
			border-left: 4px solid #9b0a46 !important;
			box-shadow: 0 1px 4px rgba(0,0,0,0.15);
			display: flex;
			padding: 0px;
		}
		.rtl .notice.mizer-elementor-notice {
			border-right-color: #9b0a46 !important;
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-aside {
			width: 50px;
			display: flex;
			align-items: start;
			justify-content: center;
			padding-top: 15px;
			background: rgba(215,43,63,0.04);
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-aside img{
			width: 1.5rem;
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-inner {
			display: table;
			padding: 20px 0px;
			width: 100%;
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-content {
			padding: 0 20px;
		}
		.notice.mizer-elementor-notice p {
			padding: 0;
			margin: 0;
		}
		.notice.mizer-elementor-notice h3 {
			margin: 0 0 5px;
		}
		.notice.mizer-elementor-notice .mizer-elementor-install-now {
			display: block;
			margin-top: 15px;
		}
		.notice.mizer-elementor-notice .mizer-elementor-install-now .mizer-elementor-install-button {
			background: #127DB8;
			border-radius: 3px;
			color: #fff;
			text-decoration: none;
			height: auto;
			line-height: 20px;
			padding: 0.4375rem 0.75rem;
			text-transform: capitalize;
		}
		.notice.mizer-elementor-notice .mizer-elementor-install-now .mizer-elementor-install-button:active {
			transform: translateY(1px);
		}
		@media (max-width: 767px) {
			.notice.mizer-elementor-notice.mizer-elementor-install-elementor {
				padding: 0px;
			}
			.notice.mizer-elementor-notice .mizer-elementor-notice-inner {
				display: block;
				padding: 10px;
			}
			.notice.mizer-elementor-notice .mizer-elementor-notice-inner .mizer-elementor-notice-content {
				display: block;
				padding: 0;
			}
			.notice.mizer-elementor-notice .mizer-elementor-notice-inner .mizer-elementor-install-now {
				display: none;
			}
		}
	</style>
	<script>jQuery( function( $ ) {
			$( 'div.notice.mizer-elementor-install-elementor' ).on( 'click', 'button.notice-dismiss', function( event ) {
				event.preventDefault();

				$.post( ajaxurl, {
					action: 'mizer_elementor_set_admin_notice_viewed'
				} );
			} );
		} );</script>
	<div class="notice updated  mizer-elementor-notice mizer-elementor-install-elementor">
		<div class="mizer-elementor-notice-inner">
			<div class="mizer-elementor-notice-content">
				<h3><?php esc_html_e( 'Thanks for installing Mizer Theme!', 'mizer' ); ?></h3>
				<p><?php echo esc_html( $message ); ?></p>
				<div class="mizer-elementor-install-now">
					<a class="mizer-elementor-install-button" href="<?php echo esc_attr( $button_link ); ?>"><?php echo esc_html( $button_text ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}




// woocommerce
function woocommerce_elements_fail_load_admin_notice() {
	// Leave to Elementor Pro to manage this.
	if ( function_exists( 'elementor_pro_load_plugin' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
		return;
	}

	if ( 'true' === get_user_meta( get_current_user_id(), '_mizer_woocommerce_install_notice', true ) ) {
		return;
	}

	$woocommerce_plugin = 'woocommerce/woocommerce.php';

	$installed_woocommerce_plugins = get_plugins();

	$is_woocommerce_installed = isset( $installed_woocommerce_plugins[ $woocommerce_plugin ] );
	

	if ( $is_woocommerce_installed ) {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$woocommerce_message = __( 'Mizer Theme is a lightweight starter theme. We recommend you to use it together with WooCommerce plugin, they work perfectly together!', 'mizer' );

		$woocommerce_button_text = __( 'Activate Woocommerce', 'mizer' );
		$woocommerce_button_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $woocommerce_plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $woocommerce_plugin );
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$woocommerce_message = __( 'Mizer Theme is a lightweight starter theme. We recommend you to use it together with WooCommerce plugin, they work perfectly together!', 'mizer' );

		$woocommerce_button_text = __( 'Install Woocommerce', 'mizer' );
		$woocommerce_button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' );
	}



	?>
	<style>
		.notice.mizer-elementor-notice {
			border: 1px solid #ccd0d4;
			border-left: 4px solid #9b0a46 !important;
			box-shadow: 0 1px 4px rgba(0,0,0,0.15);
			display: flex;
			padding: 0px;
		}
		.rtl .notice.mizer-elementor-notice {
			border-right-color: #9b0a46 !important;
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-aside {
			width: 50px;
			display: flex;
			align-items: start;
			justify-content: center;
			padding-top: 15px;
			background: rgba(215,43,63,0.04);
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-aside img{
			width: 1.5rem;
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-inner {
			display: table;
			padding: 20px 0px;
			width: 100%;
		}
		.notice.mizer-elementor-notice .mizer-elementor-notice-content {
			padding: 0 20px;
		}
		.notice.mizer-elementor-notice p {
			padding: 0;
			margin: 0;
		}
		.notice.mizer-elementor-notice h3 {
			margin: 0 0 5px;
		}
		.notice.mizer-elementor-notice .mizer-elementor-install-now {
			display: block;
			margin-top: 15px;
		}
		.notice.mizer-elementor-notice .mizer-elementor-install-now .mizer-elementor-install-button {
			background: #127DB8;
			border-radius: 3px;
			color: #fff;
			text-decoration: none;
			height: auto;
			line-height: 20px;
			padding: 0.4375rem 0.75rem;
			text-transform: capitalize;
		}
		.notice.mizer-elementor-notice .mizer-elementor-install-now .mizer-elementor-install-button:active {
			transform: translateY(1px);
		}
		@media (max-width: 767px) {
			.notice.mizer-elementor-notice.mizer-elementor-install-woocommerce {
				padding: 0px;
			}
			.notice.mizer-elementor-notice .mizer-elementor-notice-inner {
				display: block;
				padding: 10px;
			}
			.notice.mizer-elementor-notice .mizer-elementor-notice-inner .mizer-elementor-notice-content {
				display: block;
				padding: 0;
			}
			.notice.mizer-elementor-notice .mizer-elementor-notice-inner .mizer-elementor-install-now {
				display: none;
			}
		}
	</style>
	<script>jQuery( function( $ ) {
			$( 'div.notice.mizer-elementor-install-woocommerce' ).on( 'click', 'button.notice-dismiss', function( event ) {
				event.preventDefault();

				$.post( ajaxurl, {
					action: 'mizer_woocommerce_set_admin_notice_viewed'
				} );
			} );
		} );</script>
	
	<div class="notice updated  mizer-elementor-notice mizer-elementor-install-woocommerce" style="<?php if ( class_exists( 'woocommerce' ) ) { echo 'display:none';} ?>">
		<div class="mizer-elementor-notice-inner">
			<div class="mizer-elementor-notice-content">
				<h3><?php esc_html_e( 'Thanks for installing Mizer Theme!', 'mizer' ); ?></h3>
				<p><?php echo esc_html( $woocommerce_message ); ?></p>
				<div class="mizer-elementor-install-now">
					<a class="mizer-elementor-install-button" href="<?php echo esc_attr( $woocommerce_button_link ); ?>"><?php echo esc_html( $woocommerce_button_text ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}


/**
 * Set Admin Notice Viewed.
 *
 * @return void
 */
function ajax_mizer_elementor_set_admin_notice_viewed() {
	update_user_meta( get_current_user_id(), '_mizer_elementor_install_notice', 'true' );
	die;
}

add_action( 'wp_ajax_mizer_elementor_set_admin_notice_viewed', 'ajax_mizer_elementor_set_admin_notice_viewed' );
if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'mizer_elementor_fail_load_admin_notice' );
}

// woocommerce
function ajax_mizer_woocommerce_set_admin_notice_viewed() {
	update_user_meta( get_current_user_id(), '_mizer_woocommerce_install_notice', 'true' );
	die;
}
add_action( 'wp_ajax_mizer_woocommerce_set_admin_notice_viewed', 'ajax_mizer_woocommerce_set_admin_notice_viewed' );
if ( ! did_action( 'woocommerce/loaded' ) ) {
	add_action( 'admin_notices', 'woocommerce_elements_fail_load_admin_notice' );
}

// add_action( 'wp_ajax_mizer_elements_set_admin_notice_viewed', 'ajax_mizer_elements_set_admin_notice_viewed' );
// if ( ! did_action( 'mizer/loaded' ) ) {
// 	add_action( 'admin_notices', 'mizer_elements_fail_load_admin_notice' );
// }
