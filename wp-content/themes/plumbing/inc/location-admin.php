<h1>Plumbing Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'one-click-location-group' ); ?>
	<?php do_settings_sections( 'admin_one_click_location' ); ?>
	<?php submit_button(); ?>
</form>