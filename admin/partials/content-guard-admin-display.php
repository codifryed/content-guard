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
?>
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
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
        <div id="poststuff">
            <div id="post-body" class="metabox-holder">
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <div class="postbox">
                            <fieldset>
                                <legend class="screen-reader-text"><span>Enable Content Protection</span></legend>
                                <label for="<?php echo $this->plugin_name; ?>-enable_protection">
                                    <h2><input type="checkbox"
                                               id="<?php echo $this->plugin_name; ?>-enable_protection"
                                               name="<?php echo $this->plugin_name; ?>[enable_protection]"
                                               value="1"
											<?php checked( $enable_protection, 1 ); ?>
                                        />
                                        <span><?php esc_attr_e( 'Enable Content Guard', $this->plugin_name ); ?></span>
                                    </h2>
                                </label>
                                <div class="inside">
                                    <p>
										<?php esc_attr_e( 'Check this to enable the plugin\'s protection features.',
											$this->plugin_name ); ?>
                                    </p>
                                </div>
                            </fieldset>
                        </div>
                        <div class="postbox">
                            <fieldset>
                                <legend class="screen-reader-text"><span>Protect all content on the site</span></legend>
                                <label for="<?php echo $this->plugin_name; ?>-protect_all_content">
                                    <h2><input
                                                type="checkbox"
                                                id="<?php echo $this->plugin_name; ?>-protect_all_content"
                                                name="<?php echo $this->plugin_name; ?>[protect_all_content]"
                                                value="1"
											<?php checked( $protect_all_content, 1 ); ?>
                                        /> <span><?php esc_attr_e( 'Protect every page', $this->plugin_name ); ?></span>
                                    </h2>
                                </label>
                                <div class="inside">
                                    <p>
										<?php esc_attr_e( 'Check this to enable protection on every post and page.',
											$this->plugin_name ); ?><br/>
										<?php esc_attr_e( 'When this is not checked, protection is enabled on a per post and per page basis.',
											$this->plugin_name ); ?><br/>
										<?php esc_attr_e( 'Every post and page edit screen contains an option in the sidebar to enable protection for that content.',
											$this->plugin_name ); ?>
                                    </p>
                                </div>
                            </fieldset>
                        </div>
                        <div class="postbox">
                            <fieldset>
                                <legend class="screen-reader-text"><span>Protect the whole page</span></legend>
                                <label for="<?php echo $this->plugin_name; ?>-html_protect">
                                    <h2><input
                                                type="checkbox"
                                                id="<?php echo $this->plugin_name; ?>-html_protect"
                                                name="<?php echo $this->plugin_name; ?>[html_protect]"
                                                value="1"
											<?php checked( $protect_html, 1 ); ?>
                                        />
                                        <span><?php esc_attr_e( 'Protect the whole page', $this->plugin_name ); ?></span>
                                    </h2>
                                </label>
                                <div class="inside">
                                    <p>
										<?php esc_attr_e( 'This protects the entire page or post, including headers and menus, not just the main content section.',
											$this->plugin_name ); ?>
                                    </p>
                                </div>
                            </fieldset>
                        </div>
                        <div class="postbox">
                            <fieldset>
                                <legend class="screen-reader-text"><span>Disable protection for admins</span></legend>
                                <label for="<?php echo $this->plugin_name; ?>-disable_for_admins"><h2><input
                                                type="checkbox"
                                                id="<?php echo $this->plugin_name; ?>-disable_for_admins"
                                                name="<?php echo $this->plugin_name; ?>[disable_for_admins]"
                                                value="1"
											<?php checked( $disable_for_admins, 1 ); ?>
                                        />
                                        <span><?php esc_attr_e( 'Disable protection for admins', $this->plugin_name ); ?></span>
                                    </h2>
                                </label>
                                <div class="inside">
                                    <p>
										<?php esc_attr_e( 'This disables content protection for the admin when logged in.',
											$this->plugin_name ); ?>
                                    </p>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php submit_button( esc_attr__( 'Save and apply settings', $this->plugin_name ), 'primary', 'Save', true ); ?>
    </form>
</div>

