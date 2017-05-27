<?php

/*-----------------------------------------------------------------------------------
 * Create Kappe Menu
 *-----------------------------------------------------------------------------------*/

function kp_add_admin_page()
{
  // Generate Kappe admin page
  add_menu_page( 'Kappe Theme Options', 'Kappe', 'manage_options', 'kappe_options', 'kp_theme_create_page', 'dashicons-layout', 100 );

  // Generate Kappe admin sub pages

  // General
  add_submenu_page( 'kappe_options', 'Kappe Theme Options', 'General Settings', 'manage_options', 'kappe_options', 'kp_theme_create_page' );

  // Contacts
  add_submenu_page( 'kappe_options', 'Kappe Contacts Options', 'Contacts', 'manage_options', 'kappe_contacts', 'kp_theme_contacts_page' );

  add_action( 'admin_init', 'kp_custom_settings' );
}

add_action( 'admin_menu', 'kp_add_admin_page' );

function kp_custom_settings()
{
  // General
  register_setting( 'kappe-settings-group', 'meta_application_name' );
  register_setting( 'kappe-settings-group', 'meta_application_color' );
  add_settings_section( 'kappe-application-options', 'Head Options', 'kp_application_options', 'kappe_options' );
  add_settings_field( 'application-name', 'Meta Application Name', 'kp_application_name', 'kappe_options', 'kappe-application-options' );
  add_settings_field( 'application-color', 'Mobile Status Bar Color', 'kp_application_color', 'kappe_options', 'kappe-application-options' );

  // Contacts
  register_setting( 'kappe-contacts-group', 'phone' );
  register_setting( 'kappe-contacts-group', 'email' );
  register_setting( 'kappe-contacts-group', 'skype' );
  add_settings_section( 'kappe-contacts-options', 'Personal Contacts', 'kp_contacts_options', 'kappe_contacts' );
  add_settings_field( 'phone-account', 'Phone Number', 'kp_phone', 'kappe_contacts', 'kappe-contacts-options' );
  add_settings_field( 'email-account', 'Email Address', 'kp_email', 'kappe_contacts', 'kappe-contacts-options' );
  add_settings_field( 'skype-account', 'Skype', 'kp_skype', 'kappe_contacts', 'kappe-contacts-options' );

  // Social
  register_setting( 'kappe-contacts-group', 'github' );
  register_setting( 'kappe-contacts-group', 'facebook' );
  register_setting( 'kappe-contacts-group', 'twitter' );
  register_setting( 'kappe-contacts-group', 'linkedin' );
  add_settings_section( 'kappe-social-options', 'Social Icons', 'kp_social_options', 'kappe_contacts' );
  add_settings_field( 'github-account', 'Github', 'kp_github_icon', 'kappe_contacts', 'kappe-social-options' );
  add_settings_field( 'facebook-account', 'Facebook', 'kp_facebook_icon', 'kappe_contacts', 'kappe-social-options' );
  add_settings_field( 'twitter-account', 'Twitter', 'kp_twitter_icon', 'kappe_contacts', 'kappe-social-options' );
  add_settings_field( 'linkedin-account', 'Linkedin', 'kp_linkedin_icon', 'kappe_contacts', 'kappe-social-options' );
}

/*-----------------------------------------------------------------------------------
 * General subpage
 *-----------------------------------------------------------------------------------*/

function kp_application_name()
{
  $field_value = esc_attr(get_option( 'meta_application_name' ));
  echo '<input type="text" name="meta_application_name" value="' . $field_value . '">';
}

function kp_application_color()
{
  $field_value = esc_attr(get_option( 'meta_application_color' ));
  echo '<input type="text" name="meta_application_color" value="' . $field_value . '">';
  echo '<span style="display:inline-block;width:20px;height:20px;vertical-align:middle;background:'. $field_value . '"></span>';
}

function kp_application_options()
{
  echo '<p>Set up your meta-application-name field and status bar color for mobile devices</p>';
}

function kp_theme_create_page()
{
  require_once( OPTS_DIR . '/templates/kappe-admin.php' );
}

/*-----------------------------------------------------------------------------------
 * Contacts subpage
 *-----------------------------------------------------------------------------------*/

function kp_theme_contacts_page()
{
  require_once( OPTS_DIR . '/templates/kappe-contacts.php' );
}

// Contacts

function kp_contacts_options()
{
  echo '<p>Keep field blank if you don\'t want particular option appear on front end</p>';
}

function kp_phone() {
  $field_value = esc_attr(get_option( 'phone' ));
  echo '<input type="phone" name="phone" value="' . $field_value . '">';
}

function kp_email() {
  $field_value = esc_attr(get_option( 'email' ));
  echo '<input type="email" name="email" value="' . $field_value . '">';
}

function kp_skype() {
  $field_value = esc_attr(get_option( 'skype' ));
  echo '<input type="text" name="skype" value="' . $field_value . '">';
}

// Social

function kp_social_options()
{
  echo '<p>Keep field blank if you don\'t want particular icon to appear on front end</p>';
}

function kp_github_icon() {
  $field_value = esc_attr(get_option( 'github' ));
  echo '<input type="text" name="github" value="' . $field_value . '">';
}

function kp_facebook_icon() {
  $field_value = esc_attr(get_option( 'facebook' ));
  echo '<input type="text" name="facebook" value="' . $field_value . '">';
}

function kp_twitter_icon() {
  $field_value = esc_attr(get_option( 'twitter' ));
  echo '<input type="text" name="twitter" value="' . $field_value . '">';
}

function kp_linkedin_icon() {
  $field_value = esc_attr(get_option( 'linkedin' ));
  echo '<input type="text" name="linkedin" value="' . $field_value . '">';
}