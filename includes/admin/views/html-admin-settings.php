<?php
/**
 * Admin View: Settings
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
?>
<div class="wrap auto-load-next-post">
	<form method="post" id="mainform" action="" enctype="multipart/form-data">
		<h2 class="nav-tab-wrapper">
			<?php echo Auto_Load_Next_Post()->name; ?>
			<?php
				foreach ( $tabs as $name => $label ) {
					echo '<a href="' . admin_url( 'options-general.php?page=' . 'auto-load-next-post-settings&tab=' . $name ) . '" class="nav-tab ' . ( $current_tab == $name ? 'nav-tab-active' : '' ) . '">' . $label . '</a>';
				}
				do_action( 'auto_load_next_post_settings_tabs' );
			?>
		</h2>
		<?php
		do_action( 'auto_load_next_post_sections_' . $current_tab );
		do_action( 'auto_load_next_post_settings_' . $current_tab );
		?>
		<p class="submit">
			<?php if ( ! isset( $GLOBALS['hide_save_button'] ) ) { ?>
				<input name="save" class="button-primary" type="submit" value="<?php _e( 'Save changes', AUTO_LOAD_NEXT_POST_TEXT_DOMAIN ); ?>" />
			<?php } ?>
			<input type="hidden" name="subtab" id="last_tab" />
			<?php wp_nonce_field( 'auto-load-next-post-settings' ); ?>
		</p>
	</form>
</div>
