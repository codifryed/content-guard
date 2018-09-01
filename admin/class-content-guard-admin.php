<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       Open
 * @since      1.0.0
 *
 * @package    Content_Guard
 * @subpackage Content_Guard/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Guard
 * @subpackage Content_Guard/admin
 * @author     Some Guy <someguy@mail.de>
 */
class Content_Guard_Admin
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

    private $args;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->args = Array(
            'name'             => $this->plugin_name,
            'name_underscores' => str_replace('-', '_', $this->plugin_name),
            'title'            => __('Content Guard', $this->plugin_name),
            'protection_on'    => __('Turn protection on for this post', $this->plugin_name),
            'post_types'       => get_post_types(array('public' => true)),
        );
    }

    /**
     * Register the stylesheets for the admin area.
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/content-guard-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/content-guard-admin.js', array('jquery'), $this->version, false);

    }

    public function add_meta_boxes()
    {

        foreach ($this->args['post_types'] as $screen) {

            add_meta_box(
                $this->args['name'],
                $this->args['title'],
                array($this, 'display_checkbox'),
                $screen,
                'side'
            );

        }
    }

    public function save_post($post_id)
    {
        if (!isset($_POST[$this->args['name'] . '-nonce'])) {
            return $post_id;
        }

        if (!wp_verify_nonce($_POST[$this->args['name'] . '-nonce'], $this->args['name'])) {
            return $post_id;
        }

        // sanitize the checkbox
        $is_checked = isset($_POST[$this->args['name'] . '-checked']) && !empty($_POST[$this->args['name'] . '-checked']) ? 1 : 0;

        update_post_meta($post_id, '_' . $this->args['name_underscores'] . '_checked', $is_checked);

        return $post_id;
    }

    public function display_checkbox($post)
    {
        $is_checked = get_post_meta($post->ID, '_' . $this->args['name_underscores'] . '_checked', true);

        wp_nonce_field($this->args['name'], $this->args['name'] . '-nonce');

        ?>
        <h4><?php echo $this->args['protection_on']; ?></h4>
        <fieldset>
            <legend class="screen-reader-text"><span>Turn content protection on</span></legend>
            <label for="<?php echo $this->args['name'] . '-checked'; ?>"> <input type="checkbox"
                                                                                 name="<?php echo $this->args['name'] . '-checked'; ?>"
                                                                                 value="1"
                    <?php checked($is_checked, 1); ?>/> </label>
        </fieldset>
        <?php

        return $post;
    }
}
