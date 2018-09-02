<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       Open
 * @since      1.0.0
 *
 * @package    Content_Guard
 * @subpackage Content_Guard/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Content_Guard
 * @subpackage Content_Guard/public
 * @author     Some Guy <someguy@mail.de>
 */
class Content_Guard_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * The plugin options
     *
     * @since 1.0.0
     * @access  private
     * @var array $options The options for this plugin
     */
    private $options;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->options = get_option($this->plugin_name);

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Content_Guard_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Content_Guard_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        if (!empty($this->options['enable_protection'])) {
            if (!empty($this->options['protect_all_content'])) {
                $this->protection_css();
            } elseif ($this->page_is_protected()) {
                $this->protection_css();
            }
        }
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Content_Guard_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Content_Guard_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        if (!empty($this->options['enable_protection'])) {
            if (!empty($this->options['protect_all_content'])) {
                $this->protection_js();
            } elseif ($this->page_is_protected()) {
                $this->protection_js();
            }
        }
    }

    private function protection_css()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/content-guard-public.css',
            array(), $this->version, 'all');
    }

    private function protection_js()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/content-guard-public.js',
            array('jquery'), $this->version, false);
    }

    private function page_is_protected()
    {
        global $post;
        $is_checked = get_post_meta($post->ID, '_' . str_replace('-', '_', $this->plugin_name) . '_checked', true);
        if (!empty($is_checked)) {
            return true;
        }
        return false;
    }

}
