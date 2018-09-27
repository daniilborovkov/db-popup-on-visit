<?php

function db_popup_on_visit_register_options_page()
{
    add_options_page('First page visit modal window', 'First Page visit', 'manage_options', 'db_popup_on_visit', 'db_popup_on_visit_options_page');
}
add_action('admin_menu', 'db_popup_on_visit_register_options_page');

function db_popup_on_visit_register_settings()
{
    register_setting('db_popup_on_visit-settings-group', 'youtube_video_link');
    register_setting('db_popup_on_visit-settings-group', 'accept_text');
    register_setting('db_popup_on_visit-settings-group', 'decline_text');
}
add_action('admin_init', 'db_popup_on_visit_register_settings', $priority = 10, $accepted_args = 1);

function db_popup_on_visit_options_page()
{
    ?>
    <h1>First page visit modal window</h1>
    
    <form method="post" action="options.php">
      <?php settings_fields('db_popup_on_visit-settings-group');?>
      <?php do_settings_sections('db_popup_on_visit-settings-group');?>
      <table class="form-table">
          <tr valign="top">
          <th scope="row">Youtube video link:</th>
          <td><input type="text" name="youtube_video_link" value="<?php echo esc_attr(get_option('youtube_video_link')); ?>" /></td>
          </tr>

          <tr valign="top">
          <th scope="row">Accept text:</th>
          <td><input type="text" name="accept_text" value="<?php echo esc_attr(get_option('accept_text')); ?>" /></td>
          </tr>

          <tr valign="top">
          <th scope="row">Decline text:</th>
          <td><input type="text" name="decline_text" value="<?php echo esc_attr(get_option('decline_text')); ?>" /></td>
          </tr>
      </table>

      <?php submit_button();?>
    </form>
  <?php
}