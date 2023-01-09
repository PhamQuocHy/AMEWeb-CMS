<?php
/*
Plugin Name: CMS AME Digital
Description: CMS AME Digital là hệ thống quản trị website chuyên nghiệp dành cho khách hàng đang sử dụng website do AME Digital cung cấp và phát triển.
Donate link: https://amedigital.vn/
Author: AME Digital.
Author URI: https://amedigital.vn/
Version: 1.0
Requires at least: 4.1
Tested up to: 6.0
Requires PHP: 7.0
Domain Path: languages
Text Domain: ame-digital
License: GPLv2 or later
License URI: https://amedigital.vn/
*/


if (!defined('ABSPATH')) {
	die('-1');
}

// Plugin constants
define('WPS_HIDE_LOGIN_VERSION', '1.9.6');
define('WPS_HIDE_LOGIN_FOLDER', 'wps-hide-login');

define('WPS_HIDE_LOGIN_URL', plugin_dir_url(__FILE__));
define('WPS_HIDE_LOGIN_DIR', plugin_dir_path(__FILE__));
define('WPS_HIDE_LOGIN_BASENAME', plugin_basename(__FILE__));

require_once WPS_HIDE_LOGIN_DIR . 'autoload.php';

register_activation_hook(__FILE__, array('\WPS\WPS_Hide_Login\Plugin', 'activate'));

add_action('plugins_loaded', 'plugins_loaded_wps_hide_login_plugin');
function plugins_loaded_wps_hide_login_plugin()
{
	\WPS\WPS_Hide_Login\Plugin::get_instance();

	load_plugin_textdomain('wps-hide-login', false, dirname(WPS_HIDE_LOGIN_BASENAME) . '/languages');
}
require_once WPS_HIDE_LOGIN_DIR . 'custom-admin.php';
// 
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!class_exists('ACF')) {

	/**
	 * The main ACF class
	 */
	class ACF
	{

		/**
		 * The plugin version number.
		 *
		 * @var string
		 */
		public $version = '6.0.6';

		/**
		 * The plugin settings array.
		 *
		 * @var array
		 */
		public $settings = array();

		/**
		 * The plugin data array.
		 *
		 * @var array
		 */
		public $data = array();

		/**
		 * Storage for class instances.
		 *
		 * @var array
		 */
		public $instances = array();

		/**
		 * A dummy constructor to ensure ACF is only setup once.
		 *
		 * @date    23/06/12
		 * @since   5.0.0
		 *
		 * @return  void
		 */
		public function __construct()
		{
			// Do nothing.
		}

		/**
		 * Sets up the ACF plugin.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @return  void
		 */
		public function initialize()
		{

			// Define constants.
			$this->define('ACF', true);
			$this->define('ACF_PATH', plugin_dir_path(__FILE__));
			$this->define('ACF_BASENAME', plugin_basename(__FILE__));
			$this->define('ACF_VERSION', $this->version);
			$this->define('ACF_MAJOR_VERSION', 6);
			$this->define('ACF_FIELD_API_VERSION', 5);
			$this->define('ACF_UPGRADE_VERSION', '5.5.0'); // Highest version with an upgrade routine. See upgrades.php.

			// Define settings.
			$this->settings = array(
				'name'                   => __('Advanced Custom Fields', 'acf'),
				'slug'                   => dirname(ACF_BASENAME),
				'version'                => ACF_VERSION,
				'basename'               => ACF_BASENAME,
				'path'                   => ACF_PATH,
				'file'                   => __FILE__,
				'url'                    => plugin_dir_url(__FILE__),
				'show_admin'             => true,
				'show_updates'           => true,
				'stripslashes'           => false,
				'local'                  => true,
				'json'                   => true,
				'save_json'              => '',
				'load_json'              => array(),
				'default_language'       => '',
				'current_language'       => '',
				'capability'             => 'manage_options',
				'uploader'               => 'wp',
				'autoload'               => false,
				'l10n'                   => true,
				'l10n_textdomain'        => '',
				'google_api_key'         => '',
				'google_api_client'      => '',
				'enqueue_google_maps'    => true,
				'enqueue_select2'        => true,
				'enqueue_datepicker'     => true,
				'enqueue_datetimepicker' => true,
				'select2_version'        => 4,
				'row_index_offset'       => 1,
				'remove_wp_meta_box'     => true,
				'rest_api_enabled'       => true,
				'rest_api_format'        => 'light',
				'rest_api_embed_links'   => true,
				'preload_blocks'         => true,
				'enable_shortcode'       => true,
			);

			// Include utility functions.
			include_once ACF_PATH . 'includes/acf-utility-functions.php';

			// Include previous API functions.
			acf_include('includes/api/api-helpers.php');
			acf_include('includes/api/api-template.php');
			acf_include('includes/api/api-term.php');

			// Include classes.
			acf_include('includes/class-acf-data.php');
			acf_include('includes/fields/class-acf-field.php');
			acf_include('includes/locations/abstract-acf-legacy-location.php');
			acf_include('includes/locations/abstract-acf-location.php');

			// Include functions.
			acf_include('includes/acf-helper-functions.php');
			acf_include('includes/acf-hook-functions.php');
			acf_include('includes/acf-field-functions.php');
			acf_include('includes/acf-field-group-functions.php');
			acf_include('includes/acf-form-functions.php');
			acf_include('includes/acf-meta-functions.php');
			acf_include('includes/acf-post-functions.php');
			acf_include('includes/acf-user-functions.php');
			acf_include('includes/acf-value-functions.php');
			acf_include('includes/acf-input-functions.php');
			acf_include('includes/acf-wp-functions.php');

			// Include core.
			acf_include('includes/fields.php');
			acf_include('includes/locations.php');
			acf_include('includes/assets.php');
			acf_include('includes/compatibility.php');
			acf_include('includes/deprecated.php');
			acf_include('includes/l10n.php');
			acf_include('includes/local-fields.php');
			acf_include('includes/local-meta.php');
			acf_include('includes/local-json.php');
			acf_include('includes/loop.php');
			acf_include('includes/media.php');
			acf_include('includes/revisions.php');
			acf_include('includes/updates.php');
			acf_include('includes/upgrades.php');
			acf_include('includes/validation.php');
			acf_include('includes/rest-api.php');

			// Include ajax.
			acf_include('includes/ajax/class-acf-ajax.php');
			acf_include('includes/ajax/class-acf-ajax-check-screen.php');
			acf_include('includes/ajax/class-acf-ajax-user-setting.php');
			acf_include('includes/ajax/class-acf-ajax-upgrade.php');
			acf_include('includes/ajax/class-acf-ajax-query.php');
			acf_include('includes/ajax/class-acf-ajax-query-users.php');
			acf_include('includes/ajax/class-acf-ajax-local-json-diff.php');

			// Include forms.
			acf_include('includes/forms/form-attachment.php');
			acf_include('includes/forms/form-comment.php');
			acf_include('includes/forms/form-customizer.php');
			acf_include('includes/forms/form-front.php');
			acf_include('includes/forms/form-nav-menu.php');
			acf_include('includes/forms/form-post.php');
			acf_include('includes/forms/form-gutenberg.php');
			acf_include('includes/forms/form-taxonomy.php');
			acf_include('includes/forms/form-user.php');
			acf_include('includes/forms/form-widget.php');

			// Include admin.
			if (is_admin()) {
				acf_include('includes/admin/admin.php');
				acf_include('includes/admin/admin-field-group.php');
				acf_include('includes/admin/admin-field-groups.php');
				acf_include('includes/admin/admin-notices.php');
				acf_include('includes/admin/admin-tools.php');
				acf_include('includes/admin/admin-upgrade.php');
			}

			// Include legacy.
			acf_include('includes/legacy/legacy-locations.php');

			// Include PRO.
			acf_include('pro/acf-pro.php');

			// Add actions.
			add_action('init', array($this, 'init'), 5);
			add_action('init', array($this, 'register_post_types'), 5);
			add_action('init', array($this, 'register_post_status'), 5);
			add_action('activated_plugin', array($this, 'deactivate_other_instances'));
			add_action('pre_current_active_plugins', array($this, 'plugin_deactivated_notice'));

			// Add filters.
			add_filter('posts_where', array($this, 'posts_where'), 10, 2);
		}

		/**
		 * Completes the setup process on "init" of earlier.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @return  void
		 */
		public function init()
		{

			// Bail early if called directly from functions.php or plugin file.
			if (!did_action('plugins_loaded')) {
				return;
			}

			// This function may be called directly from template functions. Bail early if already did this.
			if (acf_did('init')) {
				return;
			}

			// Update url setting. Allows other plugins to modify the URL (force SSL).
			acf_update_setting('url', plugin_dir_url(__FILE__));

			// Load textdomain file.
			acf_load_textdomain();

			// Include 3rd party compatiblity.
			acf_include('includes/third-party.php');

			// Include wpml support.
			if (defined('ICL_SITEPRESS_VERSION')) {
				acf_include('includes/wpml.php');
			}

			// Include fields.
			acf_include('includes/fields/class-acf-field-text.php');
			acf_include('includes/fields/class-acf-field-textarea.php');
			acf_include('includes/fields/class-acf-field-number.php');
			acf_include('includes/fields/class-acf-field-range.php');
			acf_include('includes/fields/class-acf-field-email.php');
			acf_include('includes/fields/class-acf-field-url.php');
			acf_include('includes/fields/class-acf-field-password.php');
			acf_include('includes/fields/class-acf-field-image.php');
			acf_include('includes/fields/class-acf-field-file.php');
			acf_include('includes/fields/class-acf-field-wysiwyg.php');
			acf_include('includes/fields/class-acf-field-oembed.php');
			acf_include('includes/fields/class-acf-field-select.php');
			acf_include('includes/fields/class-acf-field-checkbox.php');
			acf_include('includes/fields/class-acf-field-radio.php');
			acf_include('includes/fields/class-acf-field-button-group.php');
			acf_include('includes/fields/class-acf-field-true_false.php');
			acf_include('includes/fields/class-acf-field-link.php');
			acf_include('includes/fields/class-acf-field-post_object.php');
			acf_include('includes/fields/class-acf-field-page_link.php');
			acf_include('includes/fields/class-acf-field-relationship.php');
			acf_include('includes/fields/class-acf-field-taxonomy.php');
			acf_include('includes/fields/class-acf-field-user.php');
			acf_include('includes/fields/class-acf-field-google-map.php');
			acf_include('includes/fields/class-acf-field-date_picker.php');
			acf_include('includes/fields/class-acf-field-date_time_picker.php');
			acf_include('includes/fields/class-acf-field-time_picker.php');
			acf_include('includes/fields/class-acf-field-color_picker.php');
			acf_include('includes/fields/class-acf-field-message.php');
			acf_include('includes/fields/class-acf-field-accordion.php');
			acf_include('includes/fields/class-acf-field-tab.php');
			acf_include('includes/fields/class-acf-field-group.php');

			/**
			 * Fires after field types have been included.
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int ACF_FIELD_API_VERSION The field API version.
			 */
			do_action('acf/include_field_types', ACF_FIELD_API_VERSION);

			// Include locations.
			acf_include('includes/locations/class-acf-location-post-type.php');
			acf_include('includes/locations/class-acf-location-post-template.php');
			acf_include('includes/locations/class-acf-location-post-status.php');
			acf_include('includes/locations/class-acf-location-post-format.php');
			acf_include('includes/locations/class-acf-location-post-category.php');
			acf_include('includes/locations/class-acf-location-post-taxonomy.php');
			acf_include('includes/locations/class-acf-location-post.php');
			acf_include('includes/locations/class-acf-location-page-template.php');
			acf_include('includes/locations/class-acf-location-page-type.php');
			acf_include('includes/locations/class-acf-location-page-parent.php');
			acf_include('includes/locations/class-acf-location-page.php');
			acf_include('includes/locations/class-acf-location-current-user.php');
			acf_include('includes/locations/class-acf-location-current-user-role.php');
			acf_include('includes/locations/class-acf-location-user-form.php');
			acf_include('includes/locations/class-acf-location-user-role.php');
			acf_include('includes/locations/class-acf-location-taxonomy.php');
			acf_include('includes/locations/class-acf-location-attachment.php');
			acf_include('includes/locations/class-acf-location-comment.php');
			acf_include('includes/locations/class-acf-location-widget.php');
			acf_include('includes/locations/class-acf-location-nav-menu.php');
			acf_include('includes/locations/class-acf-location-nav-menu-item.php');

			/**
			 * Fires after location types have been included.
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int ACF_FIELD_API_VERSION The field API version.
			 */
			do_action('acf/include_location_rules', ACF_FIELD_API_VERSION);

			/**
			 * Fires during initialization. Used to add local fields.
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int ACF_FIELD_API_VERSION The field API version.
			 */
			do_action('acf/include_fields', ACF_FIELD_API_VERSION);

			/**
			 * Fires after ACF is completely "initialized".
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int ACF_MAJOR_VERSION The major version of ACF.
			 */
			do_action('acf/init', ACF_MAJOR_VERSION);
		}

		/**
		 * Registers the ACF post types.
		 *
		 * @date    22/10/2015
		 * @since   5.3.2
		 *
		 * @return  void
		 */
		public function register_post_types()
		{

			// Vars.
			$cap = acf_get_setting('capability');

			// Register the Field Group post type.
			register_post_type(
				'acf-field-group',
				array(
					'labels'          => array(
						'name'               => __('CÁC TRƯỜNG', 'acf'),
						'singular_name'      => __('Field Group', 'acf'),
						'add_new'            => __('Thêm mới', 'acf'),
						'add_new_item'       => __('Add New Field Group', 'acf'),
						'edit_item'          => __('Edit Field Group', 'acf'),
						'new_item'           => __('New Field Group', 'acf'),
						'view_item'          => __('View Field Group', 'acf'),
						'search_items'       => __('Tìm kiếm trường ', 'acf'),
						'not_found'          => __('No Field Groups found', 'acf'),
						'not_found_in_trash' => __('No Field Groups found in Trash', 'acf'),
					),
					'public'          => false,
					'hierarchical'    => true,
					'show_ui'         => true,
					'show_in_menu'    => false,
					'_builtin'        => false,
					'capability_type' => 'post',
					'capabilities'    => array(
						'edit_post'    => $cap,
						'delete_post'  => $cap,
						'edit_posts'   => $cap,
						'delete_posts' => $cap,
					),
					'supports'        => false,
					'rewrite'         => false,
					'query_var'       => false,
				)
			);

			// Register the Field post type.
			register_post_type(
				'acf-field',
				array(
					'labels'          => array(
						'name'               => __('Fields', 'acf'),
						'singular_name'      => __('Field', 'acf'),
						'add_new'            => __('Add New', 'acf'),
						'add_new_item'       => __('Add New Field', 'acf'),
						'edit_item'          => __('Edit Field', 'acf'),
						'new_item'           => __('New Field', 'acf'),
						'view_item'          => __('View Field', 'acf'),
						'search_items'       => __('Search Fields', 'acf'),
						'not_found'          => __('No Fields found', 'acf'),
						'not_found_in_trash' => __('No Fields found in Trash', 'acf'),
					),
					'public'          => false,
					'hierarchical'    => true,
					'show_ui'         => false,
					'show_in_menu'    => false,
					'_builtin'        => false,
					'capability_type' => 'post',
					'capabilities'    => array(
						'edit_post'    => $cap,
						'delete_post'  => $cap,
						'edit_posts'   => $cap,
						'delete_posts' => $cap,
					),
					'supports'        => array('title'),
					'rewrite'         => false,
					'query_var'       => false,
				)
			);
		}

		/**
		 * Registers the ACF post statuses.
		 *
		 * @date    22/10/2015
		 * @since   5.3.2
		 *
		 * @return  void
		 */
		public function register_post_status()
		{

			// Register the Inactive post status.
			register_post_status(
				'acf-disabled',
				array(
					'label'                     => _x('Inactive', 'post status', 'acf'),
					'public'                    => true,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					/* translators: counts for inactive field groups */
					'label_count'               => _n_noop('Inactive <span class="count">(%s)</span>', 'Inactive <span class="count">(%s)</span>', 'acf'),
				)
			);
		}

		/**
		 * Checks if another version of ACF/ACF PRO is active and deactivates it.
		 * Hooked on `activated_plugin` so other plugin is deactivated when current plugin is activated.
		 *
		 * @param string $plugin The plugin being activated.
		 */
		public function deactivate_other_instances($plugin)
		{
			if (!in_array($plugin, array('advanced-custom-fields/acf.php', 'advanced-custom-fields-pro/acf.php'), true)) {
				return;
			}

			$plugin_to_deactivate  = 'advanced-custom-fields/acf.php';
			$deactivated_notice_id = '1';

			// If we just activated the free version, deactivate the pro version.
			if ($plugin === $plugin_to_deactivate) {
				$plugin_to_deactivate  = 'advanced-custom-fields-pro/acf.php';
				$deactivated_notice_id = '2';
			}

			if (is_multisite() && is_network_admin()) {
				$active_plugins = (array) get_site_option('active_sitewide_plugins', array());
				$active_plugins = array_keys($active_plugins);
			} else {
				$active_plugins = (array) get_option('active_plugins', array());
			}

			foreach ($active_plugins as $plugin_basename) {
				if ($plugin_to_deactivate === $plugin_basename) {
					set_transient('acf_deactivated_notice_id', $deactivated_notice_id, 1 * HOUR_IN_SECONDS);
					deactivate_plugins($plugin_basename);
					return;
				}
			}
		}

		/**
		 * Displays a notice when either ACF or ACF PRO is automatically deactivated.
		 */
		public function plugin_deactivated_notice()
		{
			$deactivated_notice_id = (int) get_transient('acf_deactivated_notice_id');
			if (!in_array($deactivated_notice_id, array(1, 2), true)) {
				return;
			}

			$message = __("Advanced Custom Fields and Advanced Custom Fields should not be active at the same time. We've automatically deactivated Advanced Custom Fields.", 'acf');
			if (2 === $deactivated_notice_id) {
				$message = __("Advanced Custom Fields and Advanced Custom Fields should not be active at the same time. We've automatically deactivated Advanced Custom Fields PRO.", 'acf');
			}

?>
			<div class="updated" style="border-left: 4px solid #ffba00;">
				<p><?php echo esc_html($message); ?></p>
			</div>
<?php

			delete_transient('acf_deactivated_notice_id');
		}

		/**
		 * Filters the $where clause allowing for custom WP_Query args.
		 *
		 * @date    31/8/19
		 * @since   5.8.1
		 *
		 * @param   string   $where The WHERE clause.
		 * @param   WP_Query $wp_query The query object.
		 * @return  WP_Query $wp_query The query object.
		 */
		public function posts_where($where, $wp_query)
		{
			global $wpdb;

			$field_key  = $wp_query->get('acf_field_key');
			$field_name = $wp_query->get('acf_field_name');
			$group_key  = $wp_query->get('acf_group_key');

			// Add custom "acf_field_key" arg.
			if ($field_key) {
				$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_name = %s", $field_key);
			}

			// Add custom "acf_field_name" arg.
			if ($field_name) {
				$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_excerpt = %s", $field_name);
			}

			// Add custom "acf_group_key" arg.
			if ($group_key) {
				$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_name = %s", $group_key);
			}

			// Return.
			return $where;
		}

		/**
		 * Defines a constant if doesnt already exist.
		 *
		 * @date    3/5/17
		 * @since   5.5.13
		 *
		 * @param   string $name The constant name.
		 * @param   mixed  $value The constant value.
		 * @return  void
		 */
		public function define($name, $value = true)
		{
			if (!defined($name)) {
				define($name, $value);
			}
		}

		/**
		 * Returns true if a setting exists for this name.
		 *
		 * @date    2/2/18
		 * @since   5.6.5
		 *
		 * @param   string $name The setting name.
		 * @return  boolean
		 */
		public function has_setting($name)
		{
			return isset($this->settings[$name]);
		}

		/**
		 * Returns a setting or null if doesn't exist.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The setting name.
		 * @return  mixed
		 */
		public function get_setting($name)
		{
			return isset($this->settings[$name]) ? $this->settings[$name] : null;
		}

		/**
		 * Updates a setting for the given name and value.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The setting name.
		 * @param   mixed  $value The setting value.
		 * @return  true
		 */
		public function update_setting($name, $value)
		{
			$this->settings[$name] = $value;
			return true;
		}

		/**
		 * Returns data or null if doesn't exist.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The data name.
		 * @return  mixed
		 */
		public function get_data($name)
		{
			return isset($this->data[$name]) ? $this->data[$name] : null;
		}

		/**
		 * Sets data for the given name and value.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The data name.
		 * @param   mixed  $value The data value.
		 * @return  void
		 */
		public function set_data($name, $value)
		{
			$this->data[$name] = $value;
		}

		/**
		 * Returns an instance or null if doesn't exist.
		 *
		 * @date    13/2/18
		 * @since   5.6.9
		 *
		 * @param   string $class The instance class name.
		 * @return  object
		 */
		public function get_instance($class)
		{
			$name = strtolower($class);
			return isset($this->instances[$name]) ? $this->instances[$name] : null;
		}

		/**
		 * Creates and stores an instance of the given class.
		 *
		 * @date    13/2/18
		 * @since   5.6.9
		 *
		 * @param   string $class The instance class name.
		 * @return  object
		 */
		public function new_instance($class)
		{
			$instance                 = new $class();
			$name                     = strtolower($class);
			$this->instances[$name] = $instance;
			return $instance;
		}

		/**
		 * Magic __isset method for backwards compatibility.
		 *
		 * @date    24/4/20
		 * @since   5.9.0
		 *
		 * @param   string $key Key name.
		 * @return  bool
		 */
		public function __isset($key)
		{
			return in_array($key, array('locations', 'json'), true);
		}

		/**
		 * Magic __get method for backwards compatibility.
		 *
		 * @date    24/4/20
		 * @since   5.9.0
		 *
		 * @param   string $key Key name.
		 * @return  mixed
		 */
		public function __get($key)
		{
			switch ($key) {
				case 'locations':
					return acf_get_instance('ACF_Legacy_Locations');
				case 'json':
					return acf_get_instance('ACF_Local_JSON');
			}
			return null;
		}
	}

	/**
	 * The main function responsible for returning the one true acf Instance to functions everywhere.
	 * Use this function like you would a global variable, except without needing to declare the global.
	 *
	 * Example: <?php $acf = acf(); ?>
	 *
	 * @date    4/09/13
	 * @since   4.3.0
	 *
	 * @return  ACF
	 */
	function acf()
	{
		global $acf;

		// Instantiate only once.
		if (!isset($acf)) {
			$acf = new ACF();
			$acf->initialize();
		}
		return $acf;
	}

	// Instantiate.
	acf();
} // class_exists check


// Start CPT-UI
// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

define('CPT_VERSION', '1.13.4'); // Left for legacy purposes.
define('CPTUI_VERSION', '1.13.4');
define('CPTUI_WP_VERSION', get_bloginfo('version'));

/**
 * Load our Admin UI class that powers our form inputs.
 *
 * @since 1.0.0
 *
 * @internal
 */
function cptui_load_ui_class()
{
	require_once plugin_dir_path(__FILE__) . 'classes/class.cptui_admin_ui.php';
	require_once plugin_dir_path(__FILE__) . 'classes/class.cptui_debug_info.php';
}
add_action('init', 'cptui_load_ui_class');

/**
 * Set a transient used for redirection upon activation.
 *
 * @since 1.4.0
 */
function cptui_activation_redirect()
{
	// Bail if activating from network, or bulk.
	if (is_network_admin()) {
		return;
	}

	// Add the transient to redirect.
	set_transient('cptui_activation_redirect', true, 30);
}
add_action('activate_' . plugin_basename(__FILE__), 'cptui_activation_redirect');

/**
 * Redirect user to CPTUI about page upon plugin activation.
 *
 * @since 1.4.0
 */
function cptui_make_activation_redirect()
{

	if (!get_transient('cptui_activation_redirect')) {
		return;
	}

	delete_transient('cptui_activation_redirect');

	// Bail if activating from network, or bulk.
	if (is_network_admin()) {
		return;
	}

	if (!cptui_is_new_install()) {
		return;
	}

	// Redirect to CPTUI about page.
	wp_safe_redirect(
		add_query_arg(
			['page' => 'cptui_main_menu'],
			cptui_admin_url('admin.php?page=cptui_main_menu')
		)
	);
}
add_action('admin_init', 'cptui_make_activation_redirect', 1);

/**
 * Flush our rewrite rules on deactivation.
 *
 * @since 0.8.0
 *
 * @internal
 */
function cptui_deactivation()
{
	flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'cptui_deactivation');

/**
 * Register our text domain.
 *
 * @since 0.8.0
 *
 * @internal
 */
function cptui_load_textdomain()
{
	load_plugin_textdomain('custom-post-type-ui');
}
add_action('plugins_loaded', 'cptui_load_textdomain');

/**
 * Load our main menu.
 *
 * Submenu items added in version 1.1.0
 *
 * @since 0.1.0
 *
 * @internal
 */
function cptui_plugin_menu()
{

	/**
	 * Filters the required capability to manage CPTUI settings.
	 *
	 * @since 1.3.0
	 *
	 * @param string $value Capability required.
	 */
	$capability  = apply_filters('cptui_required_capabilities', 'manage_options');
	$parent_slug = 'cptui_main_menu';

	add_menu_page(__('Custom Post Types', 'custom-post-type-ui'), __('CPT UI', 'custom-post-type-ui'), $capability, $parent_slug, 'cptui_settings', cptui_menu_icon());
	add_submenu_page($parent_slug, __('Add/Edit Post Types', 'custom-post-type-ui'), __('Add/Edit Post Types', 'custom-post-type-ui'), $capability, 'cptui_manage_post_types', 'cptui_manage_post_types');
	add_submenu_page($parent_slug, __('Add/Edit Taxonomies', 'custom-post-type-ui'), __('Add/Edit Taxonomies', 'custom-post-type-ui'), $capability, 'cptui_manage_taxonomies', 'cptui_manage_taxonomies');
	add_submenu_page($parent_slug, __('Registered Types and Taxes', 'custom-post-type-ui'), __('Registered Types/Taxes', 'custom-post-type-ui'), $capability, 'cptui_listings', 'cptui_listings');
	add_submenu_page($parent_slug, __('Custom Post Type UI Tools', 'custom-post-type-ui'), __('Tools', 'custom-post-type-ui'), $capability, 'cptui_tools', 'cptui_tools');
	add_submenu_page($parent_slug, __('Help/Support', 'custom-post-type-ui'), __('Help/Support', 'custom-post-type-ui'), $capability, 'cptui_support', 'cptui_support');

	/**
	 * Fires after the default submenu pages.
	 *
	 * @since 1.3.0
	 *
	 * @param string $value      Parent slug for Custom Post Type UI menu.
	 * @param string $capability Capability required to manage CPTUI settings.
	 */
	do_action('cptui_extra_menu_items', $parent_slug, $capability);

	// Remove the default one so we can add our customized version.
	remove_submenu_page($parent_slug, 'cptui_main_menu');
	add_submenu_page($parent_slug, __('About CPT UI', 'custom-post-type-ui'), __('About CPT UI', 'custom-post-type-ui'), $capability, 'cptui_main_menu', 'cptui_settings');
}
add_action('admin_menu', 'cptui_plugin_menu');

/**
 * Fire our CPTUI Loaded hook.
 *
 * @since 1.3.0
 *
 * @internal Use `cptui_loaded` hook.
 */
function cptui_loaded()
{

	if (class_exists('WPGraphQL')) {
		require_once plugin_dir_path(__FILE__) . 'external/wpgraphql.php';
	}

	/**
	 * Fires upon plugins_loaded WordPress hook.
	 *
	 * CPTUI loads its required files on this hook.
	 *
	 * @since 1.3.0
	 */
	do_action('cptui_loaded');
}
add_action('plugins_loaded', 'cptui_loaded');

/**
 * Load our submenus.
 *
 * @since 1.0.0
 *
 * @internal
 */
function cptui_create_submenus()
{
	require_once plugin_dir_path(__FILE__) . 'inc/about.php';
	require_once plugin_dir_path(__FILE__) . 'inc/utility.php';
	require_once plugin_dir_path(__FILE__) . 'inc/post-types.php';
	require_once plugin_dir_path(__FILE__) . 'inc/taxonomies.php';
	require_once plugin_dir_path(__FILE__) . 'inc/listings.php';
	require_once plugin_dir_path(__FILE__) . 'inc/tools.php';
	require_once plugin_dir_path(__FILE__) . 'inc/tools-sections/tools-post-types.php';
	require_once plugin_dir_path(__FILE__) . 'inc/tools-sections/tools-taxonomies.php';
	require_once plugin_dir_path(__FILE__) . 'inc/tools-sections/tools-get-code.php';
	require_once plugin_dir_path(__FILE__) . 'inc/tools-sections/tools-debug.php';
	require_once plugin_dir_path(__FILE__) . 'inc/support.php';

	if (defined('WP_CLI') && WP_CLI) {
		require_once plugin_dir_path(__FILE__) . 'inc/wp-cli.php';
	}
}
add_action('cptui_loaded', 'cptui_create_submenus');

/**
 * Fire our CPTUI init hook.
 *
 * @since 1.3.0
 *
 * @internal Use `cptui_init` hook.
 */
function cptui_init()
{

	/**
	 * Fires upon init WordPress hook.
	 *
	 * @since 1.3.0
	 */
	do_action('cptui_init');
}
add_action('init', 'cptui_init');

/**
 * Enqueue CPTUI admin styles.
 *
 * @since 1.0.0
 *
 * @internal
 */
function cptui_add_styles()
{
	if (wp_doing_ajax()) {
		return;
	}
	$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script('cptui', plugins_url("build/cptui-scripts{$min}.js", __FILE__), ['jquery', 'jquery-ui-dialog', 'postbox'], CPTUI_VERSION, true);
	wp_register_script('dashicons-picker', plugins_url("build/dashicons-picker{$min}.js", __FILE__), ['jquery'], '1.0.0', true);
	wp_register_style('cptui-css', plugins_url("build/cptui-styles{$min}.css", __FILE__), ['wp-jquery-ui-dialog'], CPTUI_VERSION);
}
add_action('admin_enqueue_scripts', 'cptui_add_styles');

/**
 * Register our users' custom post types.
 *
 * @since 0.5.0
 *
 * @internal
 */
function cptui_create_custom_post_types()
{
	$cpts = get_option('cptui_post_types', []);
	/**
	 * Filters an override array of post type data to be registered instead of our saved option.
	 *
	 * @since 1.10.0
	 *
	 * @param array $value Default override value.
	 */
	$cpts_override = apply_filters('cptui_post_types_override', []);

	if (empty($cpts) && empty($cpts_override)) {
		return;
	}

	// Assume good intent, and we're also not wrecking the option so things are always reversable.
	if (is_array($cpts_override) && !empty($cpts_override)) {
		$cpts = $cpts_override;
	}

	/**
	 * Fires before the start of the post type registrations.
	 *
	 * @since 1.3.0
	 *
	 * @param array $cpts Array of post types to register.
	 */
	do_action('cptui_pre_register_post_types', $cpts);

	if (is_array($cpts)) {
		foreach ($cpts as $post_type) {

			/**
			 * Filters whether or not to skip registration of the current iterated post type.
			 *
			 * Dynamic part of the filter name is the chosen post type slug.
			 *
			 * @since 1.7.0
			 *
			 * @param bool  $value     Whether or not to skip the post type.
			 * @param array $post_type Current post type being registered.
			 */
			if ((bool) apply_filters("cptui_disable_{$post_type['name']}_cpt", false, $post_type)) {
				continue;
			}

			/**
			 * Filters whether or not to skip registration of the current iterated post type.
			 *
			 * @since 1.7.0
			 *
			 * @param bool  $value     Whether or not to skip the post type.
			 * @param array $post_type Current post type being registered.
			 */
			if ((bool) apply_filters('cptui_disable_cpt', false, $post_type)) {
				continue;
			}

			cptui_register_single_post_type($post_type);
		}
	}

	/**
	 * Fires after the completion of the post type registrations.
	 *
	 * @since 1.3.0
	 *
	 * @param array $cpts Array of post types registered.
	 */
	do_action('cptui_post_register_post_types', $cpts);
}
add_action('init', 'cptui_create_custom_post_types', 10); // Leave on standard init for legacy purposes.

/**
 * Helper function to register the actual post_type.
 *
 * @since 1.0.0
 *
 * @internal
 *
 * @param array $post_type Post type array to register. Optional.
 * @return null Result of register_post_type.
 */
function cptui_register_single_post_type($post_type = [])
{

	/**
	 * Filters the map_meta_cap value.
	 *
	 * @since 1.0.0
	 *
	 * @param bool   $value     True.
	 * @param string $name      Post type name being registered.
	 * @param array  $post_type All parameters for post type registration.
	 */
	$post_type['map_meta_cap'] = apply_filters('cptui_map_meta_cap', true, $post_type['name'], $post_type);

	if (empty($post_type['supports'])) {
		$post_type['supports'] = [];
	}

	/**
	 * Filters custom supports parameters for 3rd party plugins.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $value     Empty array to add supports keys to.
	 * @param string $name      Post type slug being registered.
	 * @param array  $post_type Array of post type arguments to be registered.
	 */
	$user_supports_params = apply_filters('cptui_user_supports_params', [], $post_type['name'], $post_type);

	if (is_array($user_supports_params) && !empty($user_supports_params)) {
		if (is_array($post_type['supports'])) {
			$post_type['supports'] = array_merge($post_type['supports'], $user_supports_params);
		} else {
			$post_type['supports'] = [$user_supports_params];
		}
	}

	$yarpp = false; // Prevent notices.
	if (!empty($post_type['custom_supports'])) {
		$custom = explode(',', $post_type['custom_supports']);
		foreach ($custom as $part) {
			// We'll handle YARPP separately.
			if (in_array($part, ['YARPP', 'yarpp'], true)) {
				$yarpp = true;
				continue;
			}
			$post_type['supports'][] = trim($part);
		}
	}

	if (isset($post_type['supports']) && is_array($post_type['supports']) && in_array('none', $post_type['supports'], true)) {
		$post_type['supports'] = false;
	}

	$labels = [
		'name'          => $post_type['label'],
		'singular_name' => $post_type['singular_label'],
	];

	$preserved        = cptui_get_preserved_keys('post_types');
	$preserved_labels = cptui_get_preserved_labels();
	foreach ($post_type['labels'] as $key => $label) {

		if (!empty($label)) {
			if ('parent' === $key) {
				$labels['parent_item_colon'] = $label;
			} else {
				$labels[$key] = $label;
			}
		} elseif (empty($label) && in_array($key, $preserved, true)) {
			$singular_or_plural = (in_array($key, array_keys($preserved_labels['post_types']['plural']))) ? 'plural' : 'singular'; // phpcs:ignore.
			$label_plurality    = ('plural' === $singular_or_plural) ? $post_type['label'] : $post_type['singular_label'];
			$labels[$key]     = sprintf($preserved_labels['post_types'][$singular_or_plural][$key], $label_plurality);
		}
	}

	$has_archive = isset($post_type['has_archive']) ? get_disp_boolean($post_type['has_archive']) : false;
	if ($has_archive && !empty($post_type['has_archive_string'])) {
		$has_archive = $post_type['has_archive_string'];
	}

	$show_in_menu = get_disp_boolean($post_type['show_in_menu']);
	if (!empty($post_type['show_in_menu_string'])) {
		$show_in_menu = $post_type['show_in_menu_string'];
	}

	$rewrite = get_disp_boolean($post_type['rewrite']);
	if (false !== $rewrite) {
		// Core converts to an empty array anyway, so safe to leave this instead of passing in boolean true.
		$rewrite         = [];
		$rewrite['slug'] = !empty($post_type['rewrite_slug']) ? $post_type['rewrite_slug'] : $post_type['name'];

		$rewrite['with_front'] = true; // Default value.
		if (isset($post_type['rewrite_withfront'])) {
			$rewrite['with_front'] = 'false' === disp_boolean($post_type['rewrite_withfront']) ? false : true;
		}
	}

	$menu_icon            = !empty($post_type['menu_icon']) ? $post_type['menu_icon'] : null;
	$register_meta_box_cb = !empty($post_type['register_meta_box_cb']) ? $post_type['register_meta_box_cb'] : null;

	if (in_array($post_type['query_var'], ['true', 'false', '0', '1'], true)) {
		$post_type['query_var'] = get_disp_boolean($post_type['query_var']);
	}
	if (!empty($post_type['query_var_slug'])) {
		$post_type['query_var'] = $post_type['query_var_slug'];
	}

	$menu_position = null;
	if (!empty($post_type['menu_position'])) {
		$menu_position = (int) $post_type['menu_position'];
	}

	$delete_with_user = null;
	if (!empty($post_type['delete_with_user'])) {
		$delete_with_user = get_disp_boolean($post_type['delete_with_user']);
	}

	$capability_type = 'post';
	if (!empty($post_type['capability_type'])) {
		$capability_type = $post_type['capability_type'];
		if (false !== strpos($post_type['capability_type'], ',')) {
			$caps = array_map('trim', explode(',', $post_type['capability_type']));
			if (count($caps) > 2) {
				$caps = array_slice($caps, 0, 2);
			}
			$capability_type = $caps;
		}
	}

	$public = get_disp_boolean($post_type['public']);
	if (!empty($post_type['exclude_from_search'])) {
		$exclude_from_search = get_disp_boolean($post_type['exclude_from_search']);
	} else {
		$exclude_from_search = false === $public;
	}

	$queryable = (!empty($post_type['publicly_queryable']) && isset($post_type['publicly_queryable'])) ? get_disp_boolean($post_type['publicly_queryable']) : $public;

	if (empty($post_type['show_in_nav_menus'])) {
		// Defaults to value of public.
		$post_type['show_in_nav_menus'] = $public;
	}

	if (empty($post_type['show_in_rest'])) {
		$post_type['show_in_rest'] = false;
	}

	$rest_base = null;
	if (!empty($post_type['rest_base'])) {
		$rest_base = $post_type['rest_base'];
	}

	$rest_controller_class = null;
	if (!empty($post_type['rest_controller_class'])) {
		$rest_controller_class = $post_type['rest_controller_class'];
	}

	$rest_namespace = null;
	if (!empty($post_type['rest_namespace'])) {
		$rest_namespace = $post_type['rest_namespace'];
	}

	$can_export = null;
	if (!empty($post_type['can_export'])) {
		$can_export = get_disp_boolean($post_type['can_export']);
	}

	$args = [
		'labels'                => $labels,
		'description'           => $post_type['description'],
		'public'                => get_disp_boolean($post_type['public']),
		'publicly_queryable'    => $queryable,
		'show_ui'               => get_disp_boolean($post_type['show_ui']),
		'show_in_nav_menus'     => get_disp_boolean($post_type['show_in_nav_menus']),
		'has_archive'           => $has_archive,
		'show_in_menu'          => $show_in_menu,
		'delete_with_user'      => $delete_with_user,
		'show_in_rest'          => get_disp_boolean($post_type['show_in_rest']),
		'rest_base'             => $rest_base,
		'rest_controller_class' => $rest_controller_class,
		'rest_namespace'        => $rest_namespace,
		'exclude_from_search'   => $exclude_from_search,
		'capability_type'       => $capability_type,
		'map_meta_cap'          => $post_type['map_meta_cap'],
		'hierarchical'          => get_disp_boolean($post_type['hierarchical']),
		'can_export'            => $can_export,
		'rewrite'               => $rewrite,
		'menu_position'         => $menu_position,
		'menu_icon'             => $menu_icon,
		'register_meta_box_cb'  => $register_meta_box_cb,
		'query_var'             => $post_type['query_var'],
		'supports'              => $post_type['supports'],
		'taxonomies'            => $post_type['taxonomies'],
	];

	if (true === $yarpp) {
		$args['yarpp_support'] = $yarpp;
	}

	/**
	 * Filters the arguments used for a post type right before registering.
	 *
	 * @since 1.0.0
	 * @since 1.3.0 Added original passed in values array
	 *
	 * @param array  $args      Array of arguments to use for registering post type.
	 * @param string $value     Post type slug to be registered.
	 * @param array  $post_type Original passed in values for post type.
	 */
	$args = apply_filters('cptui_pre_register_post_type', $args, $post_type['name'], $post_type);

	return register_post_type($post_type['name'], $args);
}

/**
 * Register our users' custom taxonomies.
 *
 * @since 0.5.0
 *
 * @internal
 */
function cptui_create_custom_taxonomies()
{
	$taxes = get_option('cptui_taxonomies', []);
	/**
	 * Filters an override array of taxonomy data to be registered instead of our saved option.
	 *
	 * @since 1.10.0
	 *
	 * @param array $value Default override value.
	 */
	$taxes_override = apply_filters('cptui_taxonomies_override', []);

	if (empty($taxes) && empty($taxes_override)) {
		return;
	}

	// Assume good intent, and we're also not wrecking the option so things are always reversable.
	if (is_array($taxes_override) && !empty($taxes_override)) {
		$taxes = $taxes_override;
	}

	/**
	 * Fires before the start of the taxonomy registrations.
	 *
	 * @since 1.3.0
	 *
	 * @param array $taxes Array of taxonomies to register.
	 */
	do_action('cptui_pre_register_taxonomies', $taxes);

	if (is_array($taxes)) {
		foreach ($taxes as $tax) {
			/**
			 * Filters whether or not to skip registration of the current iterated taxonomy.
			 *
			 * Dynamic part of the filter name is the chosen taxonomy slug.
			 *
			 * @since 1.7.0
			 *
			 * @param bool  $value Whether or not to skip the taxonomy.
			 * @param array $tax   Current taxonomy being registered.
			 */
			if ((bool) apply_filters("cptui_disable_{$tax['name']}_tax", false, $tax)) {
				continue;
			}

			/**
			 * Filters whether or not to skip registration of the current iterated taxonomy.
			 *
			 * @since 1.7.0
			 *
			 * @param bool  $value Whether or not to skip the taxonomy.
			 * @param array $tax   Current taxonomy being registered.
			 */
			if ((bool) apply_filters('cptui_disable_tax', false, $tax)) {
				continue;
			}

			cptui_register_single_taxonomy($tax);
		}
	}

	/**
	 * Fires after the completion of the taxonomy registrations.
	 *
	 * @since 1.3.0
	 *
	 * @param array $taxes Array of taxonomies registered.
	 */
	do_action('cptui_post_register_taxonomies', $taxes);
}
add_action('init', 'cptui_create_custom_taxonomies', 9);  // Leave on standard init for legacy purposes.

/**
 * Helper function to register the actual taxonomy.
 *
 * @since 1.0.0
 *
 * @internal
 *
 * @param array $taxonomy Taxonomy array to register. Optional.
 * @return null Result of register_taxonomy.
 */
function cptui_register_single_taxonomy($taxonomy = [])
{

	$labels = [
		'name'          => $taxonomy['label'],
		'singular_name' => $taxonomy['singular_label'],
	];

	$description = '';
	if (!empty($taxonomy['description'])) {
		$description = $taxonomy['description'];
	}

	$preserved        = cptui_get_preserved_keys('taxonomies');
	$preserved_labels = cptui_get_preserved_labels();
	foreach ($taxonomy['labels'] as $key => $label) {

		if (!empty($label)) {
			$labels[$key] = $label;
		} elseif (empty($label) && in_array($key, $preserved, true)) {
			$singular_or_plural = (in_array($key, array_keys($preserved_labels['taxonomies']['plural']))) ? 'plural' : 'singular'; // phpcs:ignore.
			$label_plurality    = ('plural' === $singular_or_plural) ? $taxonomy['label'] : $taxonomy['singular_label'];
			$labels[$key]     = sprintf($preserved_labels['taxonomies'][$singular_or_plural][$key], $label_plurality);
		}
	}

	$rewrite = get_disp_boolean($taxonomy['rewrite']);
	if (false !== get_disp_boolean($taxonomy['rewrite'])) {
		$rewrite               = [];
		$rewrite['slug']       = !empty($taxonomy['rewrite_slug']) ? $taxonomy['rewrite_slug'] : $taxonomy['name'];
		$rewrite['with_front'] = true;
		if (isset($taxonomy['rewrite_withfront'])) {
			$rewrite['with_front'] = ('false' === disp_boolean($taxonomy['rewrite_withfront'])) ? false : true;
		}
		$rewrite['hierarchical'] = false;
		if (isset($taxonomy['rewrite_hierarchical'])) {
			$rewrite['hierarchical'] = ('true' === disp_boolean($taxonomy['rewrite_hierarchical'])) ? true : false;
		}
	}

	if (in_array($taxonomy['query_var'], ['true', 'false', '0', '1'], true)) {
		$taxonomy['query_var'] = get_disp_boolean($taxonomy['query_var']);
	}
	if (true === $taxonomy['query_var'] && !empty($taxonomy['query_var_slug'])) {
		$taxonomy['query_var'] = $taxonomy['query_var_slug'];
	}

	$public             = (!empty($taxonomy['public']) && false === get_disp_boolean($taxonomy['public'])) ? false : true;
	$publicly_queryable = (!empty($taxonomy['publicly_queryable']) && false === get_disp_boolean($taxonomy['publicly_queryable'])) ? false : true;
	if (empty($taxonomy['publicly_queryable'])) {
		$publicly_queryable = $public;
	}

	$show_admin_column = (!empty($taxonomy['show_admin_column']) && false !== get_disp_boolean($taxonomy['show_admin_column'])) ? true : false;

	$show_in_menu = (!empty($taxonomy['show_in_menu']) && false !== get_disp_boolean($taxonomy['show_in_menu'])) ? true : false;

	if (empty($taxonomy['show_in_menu'])) {
		$show_in_menu = get_disp_boolean($taxonomy['show_ui']);
	}

	$show_in_nav_menus = (!empty($taxonomy['show_in_nav_menus']) && false !== get_disp_boolean($taxonomy['show_in_nav_menus'])) ? true : false;
	if (empty($taxonomy['show_in_nav_menus'])) {
		$show_in_nav_menus = $public;
	}

	$show_tagcloud = (!empty($taxonomy['show_tagcloud']) && false !== get_disp_boolean($taxonomy['show_tagcloud'])) ? true : false;
	if (empty($taxonomy['show_tagcloud'])) {
		$show_tagcloud = get_disp_boolean($taxonomy['show_ui']);
	}

	$show_in_rest = (!empty($taxonomy['show_in_rest']) && false !== get_disp_boolean($taxonomy['show_in_rest'])) ? true : false;

	$show_in_quick_edit = (!empty($taxonomy['show_in_quick_edit']) && false !== get_disp_boolean($taxonomy['show_in_quick_edit'])) ? true : false;

	$sort = (!empty($taxonomy['sort']) && false !== get_disp_boolean($taxonomy['sort'])) ? true : false;

	$rest_base = null;
	if (!empty($taxonomy['rest_base'])) {
		$rest_base = $taxonomy['rest_base'];
	}

	$rest_controller_class = null;
	if (!empty($taxonomy['rest_controller_class'])) {
		$rest_controller_class = $taxonomy['rest_controller_class'];
	}

	$rest_namespace = null;
	if (!empty($taxonomy['rest_namespace'])) {
		$rest_namespace = $taxonomy['rest_namespace'];
	}

	$meta_box_cb = null;
	if (!empty($taxonomy['meta_box_cb'])) {
		$meta_box_cb = (false !== get_disp_boolean($taxonomy['meta_box_cb'])) ? $taxonomy['meta_box_cb'] : false;
	}
	$default_term = null;
	if (!empty($taxonomy['default_term'])) {
		$term_parts = explode(',', $taxonomy['default_term']);
		if (!empty($term_parts[0])) {
			$default_term['name'] = trim($term_parts[0]);
		}
		if (!empty($term_parts[1])) {
			$default_term['slug'] = trim($term_parts[1]);
		}
		if (!empty($term_parts[2])) {
			$default_term['description'] = trim($term_parts[2]);
		}
	}

	$args = [
		'labels'                => $labels,
		'label'                 => $taxonomy['label'],
		'description'           => $description,
		'public'                => $public,
		'publicly_queryable'    => $publicly_queryable,
		'hierarchical'          => get_disp_boolean($taxonomy['hierarchical']),
		'show_ui'               => get_disp_boolean($taxonomy['show_ui']),
		'show_in_menu'          => $show_in_menu,
		'show_in_nav_menus'     => $show_in_nav_menus,
		'show_tagcloud'         => $show_tagcloud,
		'query_var'             => $taxonomy['query_var'],
		'rewrite'               => $rewrite,
		'show_admin_column'     => $show_admin_column,
		'show_in_rest'          => $show_in_rest,
		'rest_base'             => $rest_base,
		'rest_controller_class' => $rest_controller_class,
		'rest_namespace'        => $rest_namespace,
		'show_in_quick_edit'    => $show_in_quick_edit,
		'sort'                  => $sort,
		'meta_box_cb'           => $meta_box_cb,
		'default_term'          => $default_term,
	];

	$object_type = !empty($taxonomy['object_types']) ? $taxonomy['object_types'] : '';

	/**
	 * Filters the arguments used for a taxonomy right before registering.
	 *
	 * @since 1.0.0
	 * @since 1.3.0 Added original passed in values array
	 * @since 1.6.0 Added $obect_type variable to passed parameters.
	 *
	 * @param array  $args        Array of arguments to use for registering taxonomy.
	 * @param string $value       Taxonomy slug to be registered.
	 * @param array  $taxonomy    Original passed in values for taxonomy.
	 * @param array  $object_type Array of chosen post types for the taxonomy.
	 */
	$args = apply_filters('cptui_pre_register_taxonomy', $args, $taxonomy['name'], $taxonomy, $object_type);

	return register_taxonomy($taxonomy['name'], $object_type, $args);
}

/**
 * Construct and output tab navigation.
 *
 * @since 1.0.0
 *
 * @param string $page Whether it's the CPT or Taxonomy page. Optional. Default "post_types".
 * @return string
 */
function cptui_settings_tab_menu($page = 'post_types')
{

	/**
	 * Filters the tabs to render on a given page.
	 *
	 * @since 1.3.0
	 *
	 * @param array  $value Array of tabs to render.
	 * @param string $page  Current page being displayed.
	 */
	$tabs = (array) apply_filters('cptui_get_tabs', [], $page);

	if (empty($tabs['page_title'])) {
		return '';
	}

	$tmpl = '<h1>%s</h1><nav class="nav-tab-wrapper wp-clearfix" aria-label="Secondary menu">%s</nav>';

	$tab_output = '';
	foreach ($tabs['tabs'] as $tab) {
		$tab_output .= sprintf(
			'<a class="%s" href="%s" aria-selected="%s">%s</a>',
			implode(' ', $tab['classes']),
			$tab['url'],
			$tab['aria-selected'],
			$tab['text']
		);
	}

	printf(
		$tmpl, // phpcs:ignore.
		$tabs['page_title'], // phpcs:ignore.
		$tab_output // phpcs:ignore.
	);
}

/**
 * Convert our old settings to the new options keys.
 *
 * These are left with standard get_option/update_option function calls for legacy and pending update purposes.
 *
 * @since 1.0.0
 *
 * @internal
 *
 * @return bool Whether or not options were successfully updated.
 */
function cptui_convert_settings()
{

	if (wp_doing_ajax()) {
		return;
	}

	$retval = '';

	if (false === get_option('cptui_post_types') && ($post_types = get_option('cpt_custom_post_types'))) { // phpcs:ignore.

		$new_post_types = [];
		foreach ($post_types as $type) {
			$new_post_types[$type['name']]               = $type; // This one assigns the # indexes. Named arrays are our friend.
			$new_post_types[$type['name']]['supports']   = !empty($type[0]) ? $type[0] : []; // Especially for multidimensional arrays.
			$new_post_types[$type['name']]['taxonomies'] = !empty($type[1]) ? $type[1] : [];
			$new_post_types[$type['name']]['labels']     = !empty($type[2]) ? $type[2] : [];
			unset(
				$new_post_types[$type['name']][0],
				$new_post_types[$type['name']][1],
				$new_post_types[$type['name']][2]
			); // Remove our previous indexed versions.
		}

		$retval = update_option('cptui_post_types', $new_post_types);
	}

	if (false === get_option('cptui_taxonomies') && ($taxonomies = get_option('cpt_custom_tax_types'))) { // phpcs:ignore.

		$new_taxonomies = [];
		foreach ($taxonomies as $tax) {
			$new_taxonomies[$tax['name']]                 = $tax;    // Yep, still our friend.
			$new_taxonomies[$tax['name']]['labels']       = $tax[0]; // Taxonomies are the only thing with.
			$new_taxonomies[$tax['name']]['object_types'] = $tax[1]; // "tax" in the name that I like.
			unset(
				$new_taxonomies[$tax['name']][0],
				$new_taxonomies[$tax['name']][1]
			);
		}

		$retval = update_option('cptui_taxonomies', $new_taxonomies);
	}

	if (!empty($retval)) {
		flush_rewrite_rules();
	}

	return $retval;
}
add_action('admin_init', 'cptui_convert_settings');

/**
 * Return a notice based on conditions.
 *
 * @since 1.0.0
 *
 * @param string $action       The type of action that occurred. Optional. Default empty string.
 * @param string $object_type  Whether it's from a post type or taxonomy. Optional. Default empty string.
 * @param bool   $success      Whether the action succeeded or not. Optional. Default true.
 * @param string $custom       Custom message if necessary. Optional. Default empty string.
 * @return bool|string false on no message, else HTML div with our notice message.
 */
function cptui_admin_notices($action = '', $object_type = '', $success = true, $custom = '')
{

	$class       = [];
	$class[]     = $success ? 'updated' : 'error';
	$class[]     = 'notice is-dismissible';
	$object_type = esc_attr($object_type);

	$messagewrapstart = '<div id="message" class="' . implode(' ', $class) . '"><p>';
	$message          = '';

	$messagewrapend = '</p></div>';

	if ('add' === $action) {
		if ($success) {
			$message .= sprintf(__('%s has been successfully added', 'custom-post-type-ui'), $object_type);
		} else {
			$message .= sprintf(__('%s has failed to be added', 'custom-post-type-ui'), $object_type);
		}
	} elseif ('update' === $action) {
		if ($success) {
			$message .= sprintf(__('%s has been successfully updated', 'custom-post-type-ui'), $object_type);
		} else {
			$message .= sprintf(__('%s has failed to be updated', 'custom-post-type-ui'), $object_type);
		}
	} elseif ('delete' === $action) {
		if ($success) {
			$message .= sprintf(__('%s has been successfully deleted', 'custom-post-type-ui'), $object_type);
		} else {
			$message .= sprintf(__('%s has failed to be deleted', 'custom-post-type-ui'), $object_type);
		}
	} elseif ('import' === $action) {
		if ($success) {
			$message .= sprintf(__('%s has been successfully imported', 'custom-post-type-ui'), $object_type);
		} else {
			$message .= sprintf(__('%s has failed to be imported', 'custom-post-type-ui'), $object_type);
		}
	} elseif ('error' === $action) {
		if (!empty($custom)) {
			$message = $custom;
		}
	}

	if ($message) {

		/**
		 * Filters the custom admin notice for CPTUI.
		 *
		 * @since 1.0.0
		 *
		 * @param string $value            Complete HTML output for notice.
		 * @param string $action           Action whose message is being generated.
		 * @param string $message          The message to be displayed.
		 * @param string $messagewrapstart Beginning wrap HTML.
		 * @param string $messagewrapend   Ending wrap HTML.
		 */
		return apply_filters('cptui_admin_notice', $messagewrapstart . $message . $messagewrapend, $action, $message, $messagewrapstart, $messagewrapend);
	}

	return false;
}

/**
 * Return array of keys needing preserved.
 *
 * @since 1.0.5
 *
 * @param string $type Type to return. Either 'post_types' or 'taxonomies'. Optional. Default empty string.
 * @return array Array of keys needing preservered for the requested type.
 */
function cptui_get_preserved_keys($type = '')
{

	$preserved_labels = [
		'post_types' => [
			'add_new_item',
			'edit_item',
			'new_item',
			'view_item',
			'view_items',
			'all_items',
			'search_items',
			'not_found',
			'not_found_in_trash',
		],
		'taxonomies' => [
			'search_items',
			'popular_items',
			'all_items',
			'parent_item',
			'parent_item_colon',
			'edit_item',
			'update_item',
			'add_new_item',
			'new_item_name',
			'separate_items_with_commas',
			'add_or_remove_items',
			'choose_from_most_used',
		],
	];
	return !empty($type) ? $preserved_labels[$type] : [];
}

/**
 * Return label for the requested type and label key.
 *
 * @since 1.0.5
 *
 * @deprecated
 *
 * @param string $type Type to return. Either 'post_types' or 'taxonomies'. Optional. Default empty string.
 * @param string $key Requested label key. Optional. Default empty string.
 * @param string $plural Plural verbiage for the requested label and type. Optional. Default empty string.
 * @param string $singular Singular verbiage for the requested label and type. Optional. Default empty string.
 * @return string Internationalized default label.
 */
function cptui_get_preserved_label($type = '', $key = '', $plural = '', $singular = '')
{

	$preserved_labels = [
		'post_types' => [
			'add_new_item'       => sprintf(__('Add new %s', 'custom-post-type-ui'), $singular),
			'edit_item'          => sprintf(__('Edit %s', 'custom-post-type-ui'), $singular),
			'new_item'           => sprintf(__('New %s', 'custom-post-type-ui'), $singular),
			'view_item'          => sprintf(__('View %s', 'custom-post-type-ui'), $singular),
			'view_items'         => sprintf(__('View %s', 'custom-post-type-ui'), $plural),
			'all_items'          => sprintf(__('All %s', 'custom-post-type-ui'), $plural),
			'search_items'       => sprintf(__('Search %s', 'custom-post-type-ui'), $plural),
			'not_found'          => sprintf(__('No %s found.', 'custom-post-type-ui'), $plural),
			'not_found_in_trash' => sprintf(__('No %s found in trash.', 'custom-post-type-ui'), $plural),
		],
		'taxonomies' => [
			'search_items'               => sprintf(__('Search %s', 'custom-post-type-ui'), $plural),
			'popular_items'              => sprintf(__('Popular %s', 'custom-post-type-ui'), $plural),
			'all_items'                  => sprintf(__('All %s', 'custom-post-type-ui'), $plural),
			'parent_item'                => sprintf(__('Parent %s', 'custom-post-type-ui'), $singular),
			'parent_item_colon'          => sprintf(__('Parent %s:', 'custom-post-type-ui'), $singular),
			'edit_item'                  => sprintf(__('Edit %s', 'custom-post-type-ui'), $singular),
			'update_item'                => sprintf(__('Update %s', 'custom-post-type-ui'), $singular),
			'add_new_item'               => sprintf(__('Add new %s', 'custom-post-type-ui'), $singular),
			'new_item_name'              => sprintf(__('New %s name', 'custom-post-type-ui'), $singular),
			'separate_items_with_commas' => sprintf(__('Separate %s with commas', 'custom-post-type-ui'), $plural),
			'add_or_remove_items'        => sprintf(__('Add or remove %s', 'custom-post-type-ui'), $plural),
			'choose_from_most_used'      => sprintf(__('Choose from the most used %s', 'custom-post-type-ui'), $plural),
		],
	];

	return $preserved_labels[$type][$key];
}

/**
 * Returns an array of translated labels, ready for use with sprintf().
 *
 * Replacement for cptui_get_preserved_label for the sake of performance.
 *
 * @since 1.6.0
 *
 * @return array
 */
function cptui_get_preserved_labels()
{
	return [
		'post_types' => [
			'singular' => [
				'add_new_item' => __('Add new %s', 'custom-post-type-ui'),
				'edit_item'    => __('Edit %s', 'custom-post-type-ui'),
				'new_item'     => __('New %s', 'custom-post-type-ui'),
				'view_item'    => __('View %s', 'custom-post-type-ui'),
			],
			'plural'   => [
				'view_items'         => __('View %s', 'custom-post-type-ui'),
				'all_items'          => __('All %s', 'custom-post-type-ui'),
				'search_items'       => __('Search %s', 'custom-post-type-ui'),
				'not_found'          => __('No %s found.', 'custom-post-type-ui'),
				'not_found_in_trash' => __('No %s found in trash.', 'custom-post-type-ui'),
			],
		],
		'taxonomies' => [
			'singular' => [
				'parent_item'       => __('Parent %s', 'custom-post-type-ui'),
				'parent_item_colon' => __('Parent %s:', 'custom-post-type-ui'),
				'edit_item'         => __('Edit %s', 'custom-post-type-ui'),
				'update_item'       => __('Update %s', 'custom-post-type-ui'),
				'add_new_item'      => __('Add new %s', 'custom-post-type-ui'),
				'new_item_name'     => __('New %s name', 'custom-post-type-ui'),
			],
			'plural'   => [
				'search_items'               => __('Search %s', 'custom-post-type-ui'),
				'popular_items'              => __('Popular %s', 'custom-post-type-ui'),
				'all_items'                  => __('All %s', 'custom-post-type-ui'),
				'separate_items_with_commas' => __('Separate %s with commas', 'custom-post-type-ui'),
				'add_or_remove_items'        => __('Add or remove %s', 'custom-post-type-ui'),
				'choose_from_most_used'      => __('Choose from the most used %s', 'custom-post-type-ui'),
			],
		],
	];
}

// End CPT-IU
// code
if (!defined('ABSPATH')) {
	exit;
}

// Don't allow multiple versions to be active.
if (function_exists('WPCode')) {

	if (!function_exists('wpcode_pro_just_activated')) {
		/**
		 * When we activate a Pro version, we need to do additional operations:
		 * 1) deactivate a Lite version;
		 * 2) register option which help to run all activation process for Pro version (custom tables creation, etc.).
		 */
		function wpcode_pro_just_activated()
		{
			wpcode_deactivate();
			add_option('wpcode_install', 1);
		}
	}
	add_action('activate_wpcode-premium/wpcode.php', 'wpcode_pro_just_activated');

	if (!function_exists('wpcode_lite_just_activated')) {
		/**
		 * Store temporarily that the Lite version of the plugin was activated.
		 * This is needed because WP does a redirect after activation and
		 * we need to preserve this state to know whether user activated Lite or not.
		 */
		function wpcode_lite_just_activated()
		{

			set_transient('wpcode_lite_just_activated', true);
		}
	}
	add_action('activate_insert-headers-and-footers/ihaf.php', 'wpcode_lite_just_activated');

	if (!function_exists('wpcode_lite_just_deactivated')) {
		/**
		 * Store temporarily that Lite plugin was deactivated.
		 * Convert temporary "activated" value to a global variable,
		 * so it is available through the request. Remove from the storage.
		 */
		function wpcode_lite_just_deactivated()
		{

			global $wpcode_lite_just_activated, $wpcode_lite_just_deactivated;

			$wpcode_lite_just_activated   = (bool) get_transient('wpcode_lite_just_activated');
			$wpcode_lite_just_deactivated = true;

			delete_transient('wpcode_lite_just_activated');
		}
	}
	add_action('deactivate_insert-headers-and-footers/ihaf.php', 'wpcode_lite_just_deactivated');

	if (!function_exists('wpcode_deactivate')) {
		/**
		 * Deactivate Lite if WPCode already activated.
		 */
		function wpcode_deactivate()
		{

			$plugin = 'insert-headers-and-footers/ihaf.php';

			deactivate_plugins($plugin);

			do_action('wpcode_plugin_deactivated', $plugin);
		}
	}
	add_action('admin_init', 'wpcode_deactivate');

	if (!function_exists('wpcode_lite_notice')) {
		/**
		 * Display the notice after deactivation when Pro is still active
		 * and user wanted to activate the Lite version of the plugin.
		 */
		function wpcode_lite_notice()
		{

			global $wpcode_lite_just_activated, $wpcode_lite_just_deactivated;

			if (
				empty($wpcode_lite_just_activated) ||
				empty($wpcode_lite_just_deactivated)
			) {
				return;
			}

			// Currently tried to activate Lite with Pro still active, so display the message.
			printf(
				'<div class="notice notice-warning">
					<p>%1$s</p>
					<p>%2$s</p>
				</div>',
				esc_html__('Heads up!', 'insert-headers-and-footers'),
				esc_html__('Your site already has WPCode Pro activated. If you want to switch to WPCode Lite, please first go to Plugins → Installed Plugins and deactivate WPCode. Then, you can activate WPCode Lite.', 'insert-headers-and-footers')
			);

			if (isset($_GET['activate'])) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				unset($_GET['activate']); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			}

			unset($wpcode_lite_just_activated, $wpcode_lite_just_deactivated);
		}
	}
	add_action('admin_notices', 'wpcode_lite_notice');

	// Do not process the plugin code further.
	return;
}

/**
 * Main WPCode Class
 */
class WPCode
{

	/**
	 * Holds the instance of the plugin.
	 *
	 * @since 2.0.0
	 *
	 * @var WPCode The one true WPCode
	 */
	private static $instance;

	/**
	 * Plugin version.
	 *
	 * @since 2.0.0
	 *
	 * @var string
	 */
	public $version = '';

	/**
	 * The auto-insert instance.
	 *
	 * @var WPCode_Auto_Insert
	 */
	public $auto_insert;

	/**
	 * The snippet execution instance.
	 *
	 * @var WPCode_Snippet_Execute
	 */
	public $execute;

	/**
	 * The error handling instance.
	 *
	 * @var WPCode_Error
	 */
	public $error;

	/**
	 * The conditional logic instance.
	 *
	 * @var WPCode_Conditional_Logic
	 */
	public $conditional_logic;

	/**
	 * The conditional logic instance.
	 *
	 * @var WPCode_Snippet_Cache
	 */
	public $cache;

	/**
	 * The snippet library.
	 *
	 * @var WPCode_Library
	 */
	public $library;

	/**
	 * The Snippet Generator.
	 *
	 * @var WPCode_Generator
	 */
	public $generator;

	/**
	 * The plugin settings.
	 *
	 * @var WPCode_Settings
	 */
	public $settings;

	/**
	 * The plugin importers.
	 *
	 * @var WPCode_Importers
	 */
	public $importers;
	/**
	 * The file cache class.
	 *
	 * @var WPCode_File_Cache
	 */
	public $file_cache;

	/**
	 * The notifications instance (admin-only).
	 *
	 * @var WPCode_Notifications
	 */
	public $notifications;

	/**
	 * The admin page loader.
	 *
	 * @var WPCode_Admin_Page_Loader
	 */
	public $admin_page_loader;

	/**
	 * The library auth instance.
	 *
	 * @var WPCode_Library_Auth
	 */
	public $library_auth;

	/**
	 * The admin notices instance.
	 *
	 * @var WPCode_Notice
	 */
	public $notice;

	/**
	 * Main instance of WPCode.
	 *
	 * @return WPCode
	 * @since 2.0.0
	 */
	public static function instance()
	{
		if (!isset(self::$instance) && !(self::$instance instanceof WPCode)) {
			self::$instance = new WPCode();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct()
	{
		$this->setup_constants();
		$this->includes();
		$this->load_components();

		add_action('init', array($this, 'load_plugin_textdomain'), 15);
	}

	/**
	 * Set up global constants.
	 *
	 * @return void
	 */
	private function setup_constants()
	{

		define('WPCODE_FILE', __FILE__);

		$plugin_headers = get_file_data(WPCODE_FILE, array('version' => 'Version'));

		define('WPCODE_VERSION', $plugin_headers['version']);
		define('WPCODE_PLUGIN_BASENAME', plugin_basename(WPCODE_FILE));
		define('WPCODE_PLUGIN_URL', plugin_dir_url(WPCODE_FILE));
		define('WPCODE_PLUGIN_PATH', plugin_dir_path(WPCODE_FILE));

		$this->version = WPCODE_VERSION;
	}

	/**
	 * Require the files needed for the plugin.
	 *
	 * @return void
	 */
	private function includes()
	{
		// Load the safe mode logic first.
		require_once WPCODE_PLUGIN_PATH . 'includes/safe-mode.php';
		// Plugin helper functions.
		require_once WPCODE_PLUGIN_PATH . 'includes/helpers.php';
		// Functions for global headers & footers output.
		require_once WPCODE_PLUGIN_PATH . 'includes/global-output.php';
		// Use the old class name for backwards compatibility.
		require_once WPCODE_PLUGIN_PATH . 'includes/legacy.php';
		// Register code snippets post type.
		require_once WPCODE_PLUGIN_PATH . 'includes/post-type.php';
		// The snippet class.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-snippet.php';
		// Auto-insert options.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-auto-insert.php';
		// Execute snippets.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-snippet-execute.php';
		// Handle PHP errors.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-error.php';
		// [wpcode] shortcode.
		require_once WPCODE_PLUGIN_PATH . 'includes/shortcode.php';
		// Conditional logic.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-conditional-logic.php';
		// Snippet Cache.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-snippet-cache.php';
		// Settings class.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-settings.php';
		// Custom capabilities.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-capabilities.php';
		// Install routines.
		require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-install.php';

		if (is_admin() || (defined('DOING_CRON') && DOING_CRON)) {
			require_once WPCODE_PLUGIN_PATH . 'includes/icons.php'; // This is not needed in the frontend atm.
			// Code Editor class.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-code-editor.php';
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-admin-page-loader.php';
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/admin-scripts.php';
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/admin-ajax-handlers.php';
			// Always used just in the backend.
			require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-generator.php';
			// Snippet Library.
			require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-library.php';
			// Authentication for the library site.
			require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-library-auth.php';
			// Importers.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-importers.php';
			// File cache.
			require_once WPCODE_PLUGIN_PATH . 'includes/class-wpcode-file-cache.php';
			// The docs.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-docs.php';
			// Notifications class.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-notifications.php';
			// Upgrade page.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-upgrade-welcome.php';
			// Metabox class.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-metabox-snippets.php';
			// Metabox class.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-admin-notice.php';
			// Ask for some love.
			require_once WPCODE_PLUGIN_PATH . 'includes/admin/class-wpcode-review.php';
		}

		// Load lite-specific files.
		require_once WPCODE_PLUGIN_PATH . 'includes/lite/loader.php';
	}

	/**
	 * Load components in the main plugin instance.
	 *
	 * @return void
	 */
	public function load_components()
	{
		$this->auto_insert       = new WPCode_Auto_Insert();
		$this->execute           = new WPCode_Snippet_Execute();
		$this->error             = new WPCode_Error();
		$this->conditional_logic = new WPCode_Conditional_Logic();
		$this->cache             = new WPCode_Snippet_Cache();
		$this->settings          = new WPCode_Settings();

		if (is_admin() || (defined('DOING_CRON') && DOING_CRON)) {
			$this->file_cache        = new WPCode_File_Cache();
			$this->library           = new WPCode_Library();
			$this->library_auth      = new WPCode_Library_Auth();
			$this->generator         = new WPCode_Generator();
			$this->importers         = new WPCode_Importers();
			$this->notifications     = new WPCode_Notifications();
			$this->admin_page_loader = new WPCode_Admin_Page_Loader_Lite();
			$this->notice            = new WPCode_Notice();

			new WPCode_Metabox_Snippets_Lite();
		}
	}

	/**
	 * Load the plugin translations.
	 *
	 * @return void
	 */
	public function load_plugin_textdomain()
	{
		if (is_user_logged_in()) {
			unload_textdomain('insert-headers-and-footers');
		}

		load_plugin_textdomain('insert-headers-and-footers', false, dirname(plugin_basename(WPCODE_FILE)) . '/languages/');
	}
}

require_once dirname(__FILE__) . '/includes/ihaf.php';

WPCode();
