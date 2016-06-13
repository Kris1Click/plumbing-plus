<h1>Plumbing Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'one-click-specialists-group' ); ?>
	<?php do_settings_sections( 'admin_one_click_specialists' ); ?>
	<?php submit_button(); ?>
</form>