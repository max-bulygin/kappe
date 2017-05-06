<h1>Theme options</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
  <?php settings_fields( 'kappe-settings-group' ); ?>
  <?php do_settings_sections( 'kappe_options' ); ?>
  <?php submit_button(); ?>
</form>