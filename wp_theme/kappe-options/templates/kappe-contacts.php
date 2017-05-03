<h1>Contacts options</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
  <?php settings_fields( 'kappe-contacts-group' ); ?>
  <?php do_settings_sections( 'kappe_contacts' ); ?>
  <?php submit_button(); ?>
</form>