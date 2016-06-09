<h1>Our Services Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'one-click-services-group' ); ?>
	<?php do_settings_sections( 'admin_one_click_services' ); ?>
	<?php submit_button(); ?>
</form>