<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       Open
 * @since      1.0.0
 *
 * @package    Content_Guard
 * @subpackage Content_Guard/admin/partials
 */
// TODO: Options page
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!--

options:

protection enabled or not
admins auto-disable protection...
whole site protected OR just individual pages
individual page instructions

-->
<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <form method="post" name="intia_general_options" action="options.php">

        <?php
        $options = get_option($this->plugin_name);

        $enable_protection = $options['enable_protection'];

        // adds a nonce, option_page, action and http_referer field
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>
        <fieldset>
            <legend class="screen-reader-text"><span>Enable Content Protection</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-enable_protection"> <input type="checkbox"
                                                                                     id="<?php echo $this->plugin_name; ?>-enable_protection"
                                                                                     name="<?php echo $this->plugin_name; ?>[enable_protection]"
                                                                                     value="1"
                    <?php checked($enable_protection, 1); ?>
                /> <span><?php esc_attr_e('Enable Content Guard', $this->plugin_name); ?></span> </label>
        </fieldset>

        <?php submit_button('Save', 'primary', 'Save', true); ?>

    </form>
</div>

