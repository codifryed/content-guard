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
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <form method="post" name="intia_general_options" action="options.php">

		<?php
		$options = get_option( $this->plugin_name );

		$enable_protection   = isset( $options['enable_protection'] ) ? $options['enable_protection'] : 0;
		$protect_all_content = isset( $options['protect_all_content'] ) ? $options['protect_all_content'] : 0;
		$protect_html        = isset( $options['html_protect'] ) ? $options['html_protect'] : 0;
		$disable_for_admins  = isset( $options['disable_for_admins'] ) ? $options['disable_for_admins'] : 0;

		// adds a nonce, option_page, action and http_referer field
		settings_fields( $this->plugin_name );
		do_settings_sections( $this->plugin_name );
		?>
        <fieldset>
            <legend class="screen-reader-text"><span>Enable Content Protection</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-enable_protection"> <input type="checkbox"
                                                                                     id="<?php echo $this->plugin_name; ?>-enable_protection"
                                                                                     name="<?php echo $this->plugin_name; ?>[enable_protection]"
                                                                                     value="1"
					<?php checked( $enable_protection, 1 ); ?>
                /> <span><?php esc_attr_e( 'Enable Content Guard', $this->plugin_name ); ?></span> </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>Protect all content on the site</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-protect_all_content"> <input type="checkbox"
                                                                                       id="<?php echo $this->plugin_name; ?>-protect_all_content"
                                                                                       name="<?php echo $this->plugin_name; ?>[protect_all_content]"
                                                                                       value="1"
					<?php checked( $protect_all_content, 1 ); ?>
                /> <span><?php esc_attr_e( 'Protect all site content', $this->plugin_name ); ?></span> </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>Protect the entire site</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-html_protect"> <input type="checkbox"
                                                                                id="<?php echo $this->plugin_name; ?>-html_protect"
                                                                                name="<?php echo $this->plugin_name; ?>[html_protect]"
                                                                                value="1"
					<?php checked( $protect_html, 1 ); ?>
                /> <span><?php esc_attr_e( 'Protect the entire site', $this->plugin_name ); ?></span> </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span>Disable protection for admins</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-disable_for_admins"> <input type="checkbox"
                                                                                      id="<?php echo $this->plugin_name; ?>-disable_for_admins"
                                                                                      name="<?php echo $this->plugin_name; ?>[disable_for_admins]"
                                                                                      value="1"
					<?php checked( $disable_for_admins, 1 ); ?>
                /> <span><?php esc_attr_e( 'Disable protection for admins', $this->plugin_name ); ?></span> </label>
        </fieldset>

		<?php submit_button( 'Save', 'primary', 'Save', true ); ?>

    </form>
</div>

