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

use ElementorPro\Modules\Forms\Actions\Redirect;

ob_start();

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
				'name' => __('Advanced Custom Fields', 'acf'),
				'slug' => dirname(ACF_BASENAME),
				'version' => ACF_VERSION,
				'basename' => ACF_BASENAME,
				'path' => ACF_PATH,
				'file' => __FILE__,
				'url' => plugin_dir_url(__FILE__),
				'show_admin' => true,
				'show_updates' => true,
				'stripslashes' => false,
				'local' => true,
				'json' => true,
				'save_json' => '',
				'load_json' => array(),
				'default_language' => '',
				'current_language' => '',
				'capability' => 'manage_options',
				'uploader' => 'wp',
				'autoload' => false,
				'l10n' => true,
				'l10n_textdomain' => '',
				'google_api_key' => '',
				'google_api_client' => '',
				'enqueue_google_maps' => true,
				'enqueue_select2' => true,
				'enqueue_datepicker' => true,
				'enqueue_datetimepicker' => true,
				'select2_version' => 4,
				'row_index_offset' => 1,
				'remove_wp_meta_box' => true,
				'rest_api_enabled' => true,
				'rest_api_format' => 'light',
				'rest_api_embed_links' => true,
				'preload_blocks' => true,
				'enable_shortcode' => true,
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
					'labels' => array(
						'name' => __('CÁC TRƯỜNG', 'acf'),
						'singular_name' => __('Field Group', 'acf'),
						'add_new' => __('Thêm mới', 'acf'),
						'add_new_item' => __('Add New Field Group', 'acf'),
						'edit_item' => __('Edit Field Group', 'acf'),
						'new_item' => __('New Field Group', 'acf'),
						'view_item' => __('View Field Group', 'acf'),
						'search_items' => __('Tìm kiếm trường ', 'acf'),
						'not_found' => __('No Field Groups found', 'acf'),
						'not_found_in_trash' => __('No Field Groups found in Trash', 'acf'),
					),
					'public' => false,
					'hierarchical' => true,
					'show_ui' => true,
					'show_in_menu' => false,
					'_builtin' => false,
					'capability_type' => 'post',
					'capabilities' => array(
						'edit_post' => $cap,
						'delete_post' => $cap,
						'edit_posts' => $cap,
						'delete_posts' => $cap,
					),
					'supports' => false,
					'rewrite' => false,
					'query_var' => false,
				)
			);

			// Register the Field post type.
			register_post_type(
				'acf-field',
				array(
					'labels' => array(
						'name' => __('Fields', 'acf'),
						'singular_name' => __('Field', 'acf'),
						'add_new' => __('Add New', 'acf'),
						'add_new_item' => __('Add New Field', 'acf'),
						'edit_item' => __('Edit Field', 'acf'),
						'new_item' => __('New Field', 'acf'),
						'view_item' => __('View Field', 'acf'),
						'search_items' => __('Search Fields', 'acf'),
						'not_found' => __('No Fields found', 'acf'),
						'not_found_in_trash' => __('No Fields found in Trash', 'acf'),
					),
					'public' => false,
					'hierarchical' => true,
					'show_ui' => false,
					'show_in_menu' => false,
					'_builtin' => false,
					'capability_type' => 'post',
					'capabilities' => array(
						'edit_post' => $cap,
						'delete_post' => $cap,
						'edit_posts' => $cap,
						'delete_posts' => $cap,
					),
					'supports' => array('title'),
					'rewrite' => false,
					'query_var' => false,
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
					'label' => _x('Inactive', 'post status', 'acf'),
					'public' => true,
					'exclude_from_search' => false,
					'show_in_admin_all_list' => true,
					'show_in_admin_status_list' => true,
					/* translators: counts for inactive field groups */
					'label_count' => _n_noop('Inactive <span class="count">(%s)</span>', 'Inactive <span class="count">(%s)</span>', 'acf'),
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

			$plugin_to_deactivate = 'advanced-custom-fields/acf.php';
			$deactivated_notice_id = '1';

			// If we just activated the free version, deactivate the pro version.
			if ($plugin === $plugin_to_deactivate) {
				$plugin_to_deactivate = 'advanced-custom-fields-pro/acf.php';
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

			$field_key = $wp_query->get('acf_field_key');
			$field_name = $wp_query->get('acf_field_name');
			$group_key = $wp_query->get('acf_group_key');

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
			$instance = new $class();
			$name = strtolower($class);
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
* @date 4/09/13
* @since 4.3.0
*
* @return ACF
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


// List Social 
if (!defined('ABSPATH'))
	die();

$cnssUploadDir = wp_upload_dir();
$cnssBaseDir = $cnssUploadDir['basedir'] . '/';
$cnssBaseURL = $cnssUploadDir['baseurl'] . '';
$cnssPluginsURI = plugins_url('/', __FILE__);

add_action('init', 'cnss_init_script');
add_action('init', 'cnss_process_post');
add_action('admin_init', 'cnss_delete_icon');
add_action('wp_ajax_update-social-icon-order', 'cnss_save_ajax_order');
add_action('admin_menu', 'cnss_add_menu_pages');
add_action('wp_head', 'cnss_social_profile_links_fn');
add_action('admin_enqueue_scripts', 'cnss_admin_style');
if (isset($_GET['page'])) {
	if ($_GET['page'] == 'cnss_social_icon_add') {
		add_action('admin_enqueue_scripts', 'cnss_admin_enqueue');
	}
}
register_activation_hook(__FILE__, 'cnss_db_install');
add_shortcode('cn-social-icon', 'cn_social_icon');

function cnss_delete_icon()
{
	global $wpdb, $err, $msg, $cnssBaseDir;
	if (isset($_GET['cnss-delete'])) {
		if (!is_numeric($_GET['id'])) {
			wp_die('Sequrity Issue.');
		}

		if ($_GET['id'] != '' && wp_verify_nonce($_GET['_wpnonce'], 'cnss_delete_icon')) {
			$table_name = $wpdb->prefix . "cn_social_icon";
			$image_file_path = $cnssBaseDir;
			$wpdb->delete($table_name, array('id' => sanitize_text_field($_GET['id'])), array('%d'));
			$msg = "Delete Successful !";
		}
	}
}

function cnss_admin_sidebar()
{

	$banners = array(
		array(
			'url' => 'http://www.cybernetikz.com/wordpress-magento-plugins/wordpress-plugins/?utm_source=easy-social-icons&utm_medium=banner&utm_campaign=wordpress-plugins',
			'img' => 'banner-1.jpg',
			'alt' => 'Banner 1',
		),
		array(
			'url' => 'http://www.cybernetikz.com/web-development/wordpress-website/?utm_source=easy-social-icons&utm_medium=banner&utm_campaign=wordpress-plugins',
			'img' => 'banner-2.jpg',
			'alt' => 'Banner 2',
		),
		array(
			'url' => 'http://www.cybernetikz.com/seo-consultancy/?utm_source=easy-social-icons&utm_medium=banner&utm_campaign=wordpress-plugins',
			'img' => 'banner-3.jpg',
			'alt' => 'Banner 3',
		),
	);
	//shuffle( $banners );
	?>
<div class="cn_admin_banner">
    <?php
		$i = 0;
		foreach ($banners as $banner) {
			echo '<a target="_blank" href="' . esc_url($banner['url']) . '"><img width="261" height="190" src="' . plugins_url('images/' . $banner['img'], __FILE__) . '" alt="' . esc_attr($banner['alt']) . '"/></a>';
			$i++;
		}
		?>
</div>
<?php
}

function cnss_admin_style()
{
	global $cnssPluginsURI;
	wp_register_style('cnss_admin_css', $cnssPluginsURI . 'css/admin-style.css', false, '1.0');
	wp_register_style('cnss_font_awesome_css', $cnssPluginsURI . 'css/font-awesome/css/all.min.css', false, '5.7.2');
	wp_register_style('cnss_font_awesome_v4_shims', $cnssPluginsURI . 'css/font-awesome/css/v4-shims.min.css', false, '5.7.2');
	wp_enqueue_style('cnss_admin_css');
	wp_enqueue_style('cnss_font_awesome_css');
	wp_enqueue_style('cnss_font_awesome_v4_shims');
	wp_enqueue_style('wp-color-picker');
}

function cnss_init_script()
{
	global $cnssPluginsURI;
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-sortable');
	wp_register_script('cnss_js', $cnssPluginsURI . 'js/cnss.js', array(), '1.0');
	wp_enqueue_script('cnss_js');

	wp_register_style('cnss_font_awesome_css', $cnssPluginsURI . 'css/font-awesome/css/all.min.css', false, '5.7.2');
	wp_enqueue_style('cnss_font_awesome_css');

	wp_register_style('cnss_font_awesome_v4_shims', $cnssPluginsURI . 'css/font-awesome/css/v4-shims.min.css', false, '5.7.2');
	wp_enqueue_style('cnss_font_awesome_v4_shims');

	wp_register_style('cnss_css', $cnssPluginsURI . 'css/cnss.css', array(), '1.0');
	wp_enqueue_style('cnss_css');
	wp_enqueue_script('wp-color-picker');
}

function cnss_admin_enqueue()
{
	global $cnssPluginsURI;
	wp_enqueue_media();
	wp_register_script('cnss_admin_js', $cnssPluginsURI . 'js/cnss_admin.js', array(), '1.0');
	wp_enqueue_script('cnss_admin_js');
}

function cnss_get_all_icons($where_sql = '')
{
	global $wpdb;
	$table_name = $wpdb->prefix . "cn_social_icon";
	$sql = $wpdb->prepare("SELECT `id`, `title`, `url`, `image_url`, `sortorder`, `target` FROM {$table_name} WHERE `url` != '' AND `image_url` != '' ORDER BY `sortorder`");

	$social_icons = $wpdb->get_results($sql);
	if (count($social_icons) > 0) {
		return $social_icons;
	} else {
		return array();
	}
}

function cnss_get_option($key = '')
{
	if ($key == '') {
		return;
	}

	$cnss_esi_settings = array(
		'cnss-width' => '32',
		'cnss-height' => '32',
		'cnss-margin' => '4',
		'cnss-row-count' => '1',
		'cnss-vertical-horizontal' => 'horizontal',
		'cnss-text-align' => 'center',
		'cnss-social-profile-links' => '0',
		'cnss-social-profile-type' => 'Person',
		'cnss-icon-bg-color' => '#999999',
		'cnss-icon-bg-hover-color' => '#666666',
		'cnss-icon-color' => '#ffffff',
		'cnss-icon-hover-color' => '#ffffff',
		'cnss-icon-shape' => 'square',
		'cnss-original-icon-color' => '1'
	);
	if (get_option($key) != '') {
		return get_option($key);
	} else {
		return $cnss_esi_settings[$key];
	}
}

function cnss_social_profile_links_fn()
{

	$social_profile_links = cnss_get_option('cnss-social-profile-links');
	$cnss_original_icon_color = cnss_get_option('cnss-original-icon-color');
	$icon_bg_color = cnss_get_option('cnss-icon-bg-color');
	$icon_bg_hover_color = cnss_get_option('cnss-icon-bg-hover-color');
	$icon_hover_color = cnss_get_option('cnss-icon-hover-color');

	$icons = cnss_get_all_icons();
	if (!empty($icons) && $social_profile_links == 1) {
		$sameAs = '';
		$social_profile_type = get_option('cnss-social-profile-type');
		$profile_type = $social_profile_type == 'Person' ? 'Person' : 'Organization';
		foreach ($icons as $icon) {
			$sameAs .= '"' . $icon->url . '",';
		}
		$sameAs = rtrim($sameAs, ',');
		echo '<script type="application/ld+json">
		{
		  "@context": "http://schema.org",
		  "@type": "' . $profile_type . '",
		  "name": "' . get_option('blogname') . '",
		  "url": "' . esc_url(home_url('/')) . '",
		  "sameAs": [' . $sameAs . ']
		}
		</script>';
	}

	if ($cnss_original_icon_color == '1') {
		echo '<style type="text/css">
		ul.cnss-social-icon li.cn-fa-icon a:hover{opacity: 0.7!important;color:' . $icon_hover_color . '!important;}
		</style>';
	} else {
		echo '<style type="text/css">
		ul.cnss-social-icon li.cn-fa-icon a{background-color:' . $icon_bg_color . '!important;}
		ul.cnss-social-icon li.cn-fa-icon a:hover{background-color:' . $icon_bg_hover_color . '!important;color:' . $icon_hover_color . '!important;}
		</style>';
	}
}

function cnss_add_menu_pages()
{
	add_menu_page('Easy Social Icons', 'Easy Social Icons', 'manage_options', 'cnss_social_icon_page', 'cnss_social_icon_page_fn', 'dashicons-share');

	add_submenu_page('cnss_social_icon_page', 'All Icons', 'All Icons', 'manage_options', 'cnss_social_icon_page', 'cnss_social_icon_page_fn');

	add_submenu_page('cnss_social_icon_page', 'Add New', 'Add New', 'manage_options', 'cnss_social_icon_add', 'cnss_social_icon_add_fn');

	add_submenu_page('cnss_social_icon_page', 'Sort Icons', 'Sort Icons', 'manage_options', 'cnss_social_icon_sort', 'cnss_social_icon_sort_fn');

	add_submenu_page('cnss_social_icon_page', 'Settings &amp; Instructions', 'Settings &amp; Instructions', 'manage_options', 'cnss_social_icon_option', 'cnss_social_icon_option_fn');

	add_action('admin_init', 'cnss_register_settings');
}

function cnss_register_settings()
{
	register_setting('cnss-settings-group', 'cnss-width');
	register_setting('cnss-settings-group', 'cnss-height');
	register_setting('cnss-settings-group', 'cnss-margin');
	register_setting('cnss-settings-group', 'cnss-row-count');
	register_setting('cnss-settings-group', 'cnss-vertical-horizontal');
	register_setting('cnss-settings-group', 'cnss-text-align');
	register_setting('cnss-settings-group', 'cnss-social-profile-links');
	register_setting('cnss-settings-group', 'cnss-social-profile-type');
	register_setting('cnss-settings-group', 'cnss-icon-bg-color');
	register_setting('cnss-settings-group', 'cnss-icon-bg-hover-color');
	register_setting('cnss-settings-group', 'cnss-icon-color');
	register_setting('cnss-settings-group', 'cnss-icon-hover-color');
	register_setting('cnss-settings-group', 'cnss-icon-shape');
	register_setting('cnss-settings-group', 'cnss-original-icon-color', 'cnss_original_icon_color_fn');
}

function cnss_original_icon_color_fn($value)
{
	return $value == '' ? '0' : $value;
}

function cnss_sanitize_array(array $arr)
{
	return array_map('sanitize_text_field', $arr);
}

function cnss_social_icon_option_fn()
{

	$cnss_width = esc_attr(get_option('cnss-width'));
	$cnss_height = esc_attr(get_option('cnss-height'));
	$cnss_margin = esc_attr(get_option('cnss-margin'));
	$cnss_rows = esc_attr(get_option('cnss-row-count'));
	$vorh = esc_attr(get_option('cnss-vertical-horizontal'));
	$text_align = esc_attr(get_option('cnss-text-align'));
	$social_profile_links = get_option('cnss-social-profile-links');
	$social_profile_type = get_option('cnss-social-profile-type');
	$icon_bg_color = get_option('cnss-icon-bg-color');
	$icon_bg_hover_color = get_option('cnss-icon-bg-hover-color');
	$icon_color = get_option('cnss-icon-color');
	$icon_hover_color = get_option('cnss-icon-hover-color');
	$icon_shape = get_option('cnss-icon-shape');
	$cnss_original_icon_color = get_option('cnss-original-icon-color');

	$vertical = '';
	$horizontal = '';
	if ($vorh == 'vertical')
		$vertical = 'checked="checked"';
	if ($vorh == 'horizontal')
		$horizontal = 'checked="checked"';

	$center = '';
	$left = '';
	$right = '';
	if ($text_align == 'center')
		$center = 'checked="checked"';
	if ($text_align == 'left')
		$left = 'checked="checked"';
	if ($text_align == 'right')
		$right = 'checked="checked"';

	?>
<div class="wrap">
    <?php echo cnss_esi_review_text(); ?>
    <h2>Icon Settings</h2>
    <div class="content_wrapper">
        <div class="left">
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php settings_fields('cnss-settings-group'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Icon Width</th>
                        <td><input type="number" name="cnss-width" id="cnss-width" class="small-text"
                                value="<?php echo esc_attr($cnss_width) ?>" />px</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Icon Height</th>
                        <td><input type="number" name="cnss-height" id="cnss-height" class="small-text"
                                value="<?php echo esc_attr($cnss_height) ?>" />px</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Icon Margin</th>
                        <td><input type="number" name="cnss-margin" id="cnss-margin" class="small-text"
                                value="<?php echo esc_attr($cnss_margin) ?>" />px <em><small>(Gap between each
                                    icon)</small></em></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Icon Display</th>
                        <td>
                            <input <?php echo $horizontal ?> type="radio" name="cnss-vertical-horizontal"
                                id="horizontal" value="horizontal" />&nbsp;<label
                                for="horizontal">Horizontally</label><br />
                            <input <?php echo $vertical ?> type="radio" name="cnss-vertical-horizontal" id="vertical"
                                value="vertical" />&nbsp;<label for="vertical">Vertically</label>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Icon Alignment</th>
                        <td>
                            <input <?php echo $center ?> type="radio" name="cnss-text-align" id="center"
                                value="center" />&nbsp;<label for="center">Center</label><br />
                            <input <?php echo $left ?> type="radio" name="cnss-text-align" id="left"
                                value="left" />&nbsp;<label for="left">Left</label><br />
                            <input <?php echo $right ?> type="radio" name="cnss-text-align" id="right"
                                value="right" />&nbsp;<label for="right">Right</label>
                        </td>
                    </tr>

                    <?php /* ?><tr valign="top">
                        <th scope="row">Google Social Profile Links</th>
                        <td>
                            <input type="checkbox" id="cnss_social_profile_links" name="cnss-social-profile-links"
                                value="1" <?php echo $social_profile_links==1?'checked="checked"':''; ?>>
                            <a target="_blank"
                                href="https://developers.google.com/search/docs/data-types/social-profile-links"
                                style="text-decoration: none;" id="show_whatis_social_profile_links">What is Social
                                Profile Links?</a>
                            <div style="position: relative;">
                                <img width="300" style="position: absolute; top:-300px; right: 0;"
                                    id="whatis_social_profile_links" class="hidden"
                                    src="<?php echo plugins_url( 'images/' . 'social-profiles.png', __FILE__ ); ?>">
                            </div>
                        </td>
                    </tr>
                    <tr id="wrap-social-profile-type" valign="top"
                        style="<?php echo $social_profile_links==1?'':'display: none;'; ?>">
                        <th scope="row">Google Social Profile Type</th>
                        <td>
                            <select name="cnss-social-profile-type">
                                <option <?php echo $social_profile_type=='Person'?'selected="selected"':''; ?>
                                    value="Person">Person</option>
                                <option <?php echo $social_profile_type=='Organization'?'selected="selected"':''; ?>
                                    value="Organization">Organization</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <h2>Following settings is for Font-Awesome icons only</h2>
                        </th>
                    </tr><?php */?>

                    <tr valign="top">
                        <th scope="row">Use Original Color</th>
                        <td><input type="checkbox" id="cnss_use_original_color" name="cnss-original-icon-color"
                                value="1" <?php echo $cnss_original_icon_color == 1 ? 'checked="checked"' : ''; ?>>
                            <em>This will show original icon color for social icons, like <span
                                    style="background:#3b5998; color: #fff;">facebook</span> color is blue, <span
                                    style="background:#e62f27; color: #fff;">youtube</span> color is red.</em>
                        </td>
                    </tr>

                    <tr class="wrap-icon-bg-color" valign="top"
                        style="<?php echo $cnss_original_icon_color == 1 ? 'display: none;' : ''; ?>">
                        <th scope="row">Icon Background Color</th>
                        <td><input type="text" name="cnss-icon-bg-color" id="cnss-icon-bg-color"
                                class="cnss-fa-icon-color" value="<?php echo esc_attr($icon_bg_color) ?>" /></td>
                    </tr>
                    <tr class="wrap-icon-bg-color" valign="top"
                        style="<?php echo $cnss_original_icon_color == 1 ? 'display: none;' : ''; ?>">
                        <th scope="row">Icon Background Hover Color</th>
                        <td><input type="text" name="cnss-icon-bg-hover-color" id="cnss-icon-bg-hover-color"
                                class="cnss-fa-icon-color" value="<?php echo esc_attr($icon_bg_hover_color) ?>" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Icon Color</th>
                        <td><input type="text" name="cnss-icon-color" id="cnss-icon-color" class="cnss-fa-icon-color"
                                value="<?php echo esc_attr($icon_color) ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Icon Hover Color</th>
                        <td><input type="text" name="cnss-icon-hover-color" id="cnss-icon-hover-color"
                                class="cnss-fa-icon-color" value="<?php echo esc_attr($icon_hover_color) ?>" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Icon Shape</th>
                        <td><select name="cnss-icon-shape" id="cnss-icon-shape">
                                <option <?php selected($icon_shape, 'square'); ?> value="square">Square</option>
                                <option <?php selected($icon_shape, 'circle'); ?> value="circle">Circle</option>
                                <option <?php selected($icon_shape, 'round-corner'); ?> value="round-corner">Round
                                    Corner</option>
                            </select></td>
                    </tr>
                </table>
                <p class="submit" style="text-align:center"><input type="submit" class="button-primary"
                        value="<?php _e('Save Changes') ?>" />
                    <?php echo cnss_back_to_link() ?>
                </p>
            </form>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#show_whatis_social_profile_links').hover(function() {
                    //e.preventDefault();
                    $('#whatis_social_profile_links').fadeToggle('fast');
                });
                $('input#cnss_social_profile_links').change(function(event) {
                    if ($(this).prop("checked") == true) {
                        $('#wrap-social-profile-type').fadeIn('fast');
                    } else {
                        $('#wrap-social-profile-type').fadeOut('fast');
                    }
                });
                $('input#cnss_use_original_color').change(function(event) {
                    if ($(this).prop("checked") == false) {
                        $('.wrap-icon-bg-color').fadeIn('fast');
                    } else {
                        $('.wrap-icon-bg-color').fadeOut('fast');
                    }
                });

            });
            jQuery(document).ready(function($) {
                $('.cnss-fa-icon-color').wpColorPicker();
            });
            </script>

            <h2 id="shortcode">How to use</h2>
            <fieldset class="cnss-esi-shadow">
                <legend>
                    <h4 class="sec-title">Using Widget</h4>
                </legend>
                <p>Simply go to <strong>Appearance -> <a href="widgets.php">Widgets</a></strong>
                    then drag drop <code>Easy Social Icons</code> widget to <strong>Widget Area</strong></p>
            </fieldset>

            <fieldset class="cnss-esi-shadow">
                <legend>
                    <h4 class="sec-title">Using Shortcode</h4>
                </legend>
                <?php
					$shortcode = '[cn-social-icon';
					if (isset($_POST['generate_shortcode']) && check_admin_referer('cn_gen_sc')) {
						if (is_numeric($_POST['_width']) && $cnss_width != $_POST['_width']) {
							$shortcode .= ' width=&quot;' . sanitize_text_field($_POST['_width']) . '&quot;';
						}
						if (is_numeric($_POST['_height']) && $cnss_height != $_POST['_height']) {
							$shortcode .= ' height=&quot;' . sanitize_text_field($_POST['_height']) . '&quot;';
						}
						if (is_numeric($_POST['_margin']) && $cnss_margin != $_POST['_margin']) {
							$shortcode .= ' margin=&quot;' . sanitize_text_field($_POST['_margin']) . '&quot;';
						}
						if (isset($_POST['_alignment']) && $text_align != $_POST['_alignment']) {
							$shortcode .= ' alignment=&quot;' . sanitize_text_field($_POST['_alignment']) . '&quot;';
							$text_align = sanitize_text_field($_POST['_alignment']);
						}
						if (isset($_POST['_display']) && $vorh != $_POST['_display']) {
							$shortcode .= ' display=&quot;' . sanitize_text_field($_POST['_display']) . '&quot;';
							$vorh = sanitize_text_field($_POST['_display']);
						}
						if (isset($_POST['_attr_id']) && $_POST['_attr_id'] != '') {
							$shortcode .= ' attr_id=&quot;' . sanitize_text_field($_POST['_attr_id']) . '&quot;';
						}
						if (isset($_POST['_attr_class']) && $_POST['_attr_class'] != '') {
							$shortcode .= ' attr_class=&quot;' . sanitize_text_field($_POST['_attr_class']) . '&quot;';
						}
						if (isset($_POST['_selected_icons'])) {
							if (is_array($_POST['_selected_icons'])) {
								$ids = implode(',', cnss_sanitize_array($_POST['_selected_icons']));
								$shortcode .= ' selected_icons=&quot;' . $ids . '&quot;';
							}
						}
					}
					$shortcode .= ']';
					?>
                <p>Copy and paste following shortcode to any <strong>Page</strong> or <strong>Post</strong>.
                <p>

                <p><input onclick="this.select();" readonly="readonly" type="text"
                        value="<?php echo esc_attr($shortcode); ?>" class="large-text" /></p>
                <p>Or you can change following icon settings and click <strong>Generate Shortcode</strong> button to get
                    updated shortcode.</p>
                <form method="post" action="admin.php?page=cnss_social_icon_option#shortcode"
                    enctype="application/x-www-form-urlencoded">
                    <?php wp_nonce_field('cn_gen_sc'); ?>
                    <input type="hidden" name="generate_shortcode" value="1" />
                    <table width="100%" border="0">
                        <tr>
                            <td width="110">
                                <label><?php _e('Icon Width <em>(px)</em>:'); ?></label>
                                <input class="widefat" name="_width" type="number" value="<?php
									echo esc_attr(isset($_POST['_width']) ? $_POST['_width'] : $cnss_width); ?>">
                            </td>
                            <td>&nbsp;</td>
                            <td width="110">
                                <label>
                                    <?php _e('Icon Height <em>(px)</em>:'); ?>
                                </label>
                                <input class="widefat" name="_height" type="number" value="<?php
									echo esc_attr(isset($_POST['_height']) ? $_POST['_height'] : $cnss_height); ?>">
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label>
                                    <?php _e('Margin <em>(px)</em>:'); ?>
                                </label><br />
                                <input class="widefat" name="_margin" type="number" value="<?php
									echo esc_attr(isset($_POST['_margin']) ? $_POST['_margin'] : $cnss_margin); ?>">
                            </td>
                            <td>&nbsp;</td>
                            <td><label>
                                    <?php _e('Alignment:'); ?>
                                </label><br />
                                <select name="_alignment">
                                    <option <?php if ($text_align == 'center')
											echo 'selected="selected"'; ?> value="center">Center</option>
                                    <option <?php if ($text_align == 'left')
											echo 'selected="selected"'; ?> value="left">
                                        Left</option>
                                    <option <?php if ($text_align == 'right')
											echo 'selected="selected"'; ?> value="right">Right</option>
                                </select>
                            </td>
                            <td>&nbsp;</td>
                            <td><label>
                                    <?php _e('Display:'); ?>
                                </label><br />
                                <select name="_display">
                                    <option <?php if ($vorh == 'horizontal')
											echo 'selected="selected"'; ?> value="horizontal">Horizontally</option>
                                    <option <?php if ($vorh == 'vertical')
											echo 'selected="selected"'; ?> value="vertical">Vertically</option>
                                </select>
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label>
                                    <?php _e('Custom ID:'); ?>
                                </label>
                                <input class="widefat" placeholder="ID" name="_attr_id" type="text" value="<?php
									echo esc_attr(isset($_POST['_attr_id']) ? $_POST['_attr_id'] : ''); ?>">
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label>
                                    <?php _e('Custom Class:'); ?>
                                </label>
                                <input class="widefat" placeholder="Class" name="_attr_class" type="text" value="<?php
									echo esc_attr(isset($_POST['_attr_class']) ? $_POST['_attr_class'] : ''); ?>">
                            </td>
                        </tr>
                    </table>
                    <p></p>
                    <?php echo cnss_social_icon_sc(isset($_POST['_selected_icons']) ? cnss_sanitize_array($_POST['_selected_icons']) : array()); ?>
                    <p><label><?php _e('Select Social Icons:'); ?></label> <em>(If select none all icons will be
                            displayed)</em></p>
                    <p>
                        <input type="submit" class="button-primary" value="<?php _e('Generate Shortcode') ?>" />
                    </p>
                </form>
                <p><strong>Note</strong>: You can also add shortcode to <strong>Text Widget</strong> but this code
                    <code>add_filter('widget_text', 'do_shortcode');</code> needs to be added to your themes
                    <strong>functions.php</strong> file.
                </p>
            </fieldset>

            <fieldset class="cnss-esi-shadow" style="margin-bottom:0px;">
                <legend>
                    <h4 class="sec-title">Using PHP Template Tag</h4>
                </legend>
                <p><strong>Simple Use</strong></p>
                <p>If you are familiar with PHP code, then you can use PHP Template Tag</p>
                <pre><code>&lt;?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?&gt;</code></pre>
                <p><strong>Advanced Use</strong></p>
                <pre><code>&lt;?php
			$attr = array (
				'width' => '32', //input only number, in pixel
				'height' => '32', //input only number, in pixel
				'margin' => '4', //input only number, in pixel
				'display' => 'horizontal', //horizontal | vertical
				'alignment' => 'center', //center | left | right
				'attr_id' => 'custom_icon_id', //add custom id to &lt;ul&gt; wraper
				'attr_class' => 'custom_icon_class', //add custom class to &lt;ul&gt; wraper
				'selected_icons' => array ( '1', '3', '5', '6' )
				//you can get the icon ID form <strong><a href="admin.php?page=cnss_social_icon_page">All Icons</a></strong> page
			);
			if ( function_exists('cn_social_icon') ) echo cn_social_icon( $attr );
			?&gt;</code></pre>
            </fieldset>

        </div>
        <div class="right">
            <?php cnss_admin_sidebar(); ?>
        </div>
    </div>
</div>
<?php
}

function cnss_db_install()
{
	global $wpdb;

	$table_name = $wpdb->prefix . "cn_social_icon";
	if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
		$sql_create_table = "CREATE TABLE IF NOT EXISTS `$table_name` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`title` VARCHAR(255) NULL,
		`url` VARCHAR(255) NOT NULL,
		`image_url` VARCHAR(255) NOT NULL,
		`sortorder` INT NOT NULL DEFAULT '0',
		`date_upload` VARCHAR(50) NULL,
		`target` tinyint(1) NOT NULL DEFAULT '1',
		PRIMARY KEY (`id`)) ENGINE = InnoDB;
		INSERT INTO `wp_cn_social_icon` (`id`, `title`, `url`, `image_url`, `sortorder`, `date_upload`, `target`) VALUES
		(1, 'Facebook', 'https://facebook.com/', 'fa fa-facebook', 0, '1487164658', 1),
		(2, 'Twitter', 'https://twitter.com/', 'fa fa-twitter', 1, '1487164673', 1),
		(3, 'LinkedIn', 'https://linkedin.com/', 'fa fa-linkedin', 2, '1487164712', 1);";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql_create_table);
	}

	$cnss_esi_settings = array(
		'cnss-width' => '32',
		'cnss-height' => '32',
		'cnss-margin' => '4',
		'cnss-row-count' => '1',
		'cnss-vertical-horizontal' => 'horizontal',
		'cnss-text-align' => 'center',
		'cnss-social-profile-links' => '0',
		'cnss-social-profile-type' => 'Person',
		'cnss-icon-bg-color' => '#666666',
		'cnss-icon-bg-hover-color' => '#333333',
		'cnss-icon-color' => '#ffffff',
		'cnss-icon-hover-color' => '#ffffff',
		'cnss-icon-shape' => 'square',
		'cnss-original-icon-color' => '1'
	);

	foreach ($cnss_esi_settings as $key => $value) {
		add_option(trim($key), trim($value));
	}
}

function cnss_process_post()
{
	global $wpdb, $err, $msg, $cnssBaseDir;
	if (isset($_POST['submit_button']) && check_admin_referer('cn_insert_icon')) {

		if ($_POST['action'] == 'update') {

			$err = "";
			$msg = "";

			$image_file_path = $cnssBaseDir;

			if ($err == '') {
				$table_name = $wpdb->prefix . "cn_social_icon";

				$results = $wpdb->insert(
					$table_name,
					array(
						'title' => sanitize_title($_POST['title']),
						'url' => esc_url_raw($_POST['url']),
						'image_url' => sanitize_text_field($_POST['image_file']),
						'sortorder' => sanitize_sql_orderby($_POST['sortorder']),
						'date_upload' => time(),
						'target' => sanitize_sql_orderby($_POST['target']),
					),
					array(
						'%s',
						'%s',
						'%s',
						'%d',
						'%s',
						'%d',
					)
				);

				if (!$results)
					$err .= "Fail to update database";
				else
					$msg .= "Update successful !";
			}
			/*
			$allSocialMediaIcons = array('500px','amazon','android','angellist','apple','bandcamp','behance','behance-square','bitbucket','bluetooth','cc-amex','cc-mastercard','cc-paypal','cc-stripe','cc-visa','codepen','css3','delicious','deviantart','digg','dribbble ','dropbox','drupal','edge ','etsy','expeditedssl','facebook','facebook-f','facebook-official','facebook-square','firefox','flickr','forumbee ','foursquare','free-code-camp','get-pocket','git ','git-square ','github ','github-square ','gitlab','google ','google-plus','google-plus-circle','google-plus-official','google-plus-square','google-wallet','gratipay','hacker-news','houzz','html5','imdb','instagram','internet-explorer','joomla','lastfm','linkedin','linkedin-square','linux','maxcdn ','medium ','meetup','odnoklassniki','opera','paypal','pinterest ','pinterest-p ','pinterest-square ','product-hunt','quora ','reddit ','rss ','scribd','skype','slack','slideshare ','snapchat','soundcloud','spotify','stack-exchange','stack-overflow','steam','stumbleupon','telegram','trello','tripadvisor','tumblr','tumblr-square','twitch','twitter','twitter-square','viadeo','vimeo ','vimeo-square ','vine ','wechat','whatsapp ','wikipedia-w','windows','wordpress ','xing','xing-square','yahoo','yelp','youtube','youtube-square');
			$table_name = $wpdb->prefix . "cn_social_icon";
			$i = 0;
			foreach ($allSocialMediaIcons as $icon) {
			$results = $wpdb->insert(
			$table_name,
			array(
			'title' => $icon,
			'url' => 'https://'.$icon.'.com/',
			'image_url' => 'fa fa-'.$icon,
			'sortorder' => $i,
			'date_upload' => time(),
			'target' => '1',
			),
			array(
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
			'%d',
			)
			);
			$i++;
			}
			*/
		} // end if update

		if ($_POST['action'] == 'edit' and $_POST['id'] != '') {
			$err = "";
			$msg = "";

			$image_file_path = $cnssBaseDir;

			$update = "";
			$type = 1;

			if ($err == '') {
				$table_name = $wpdb->prefix . "cn_social_icon";
				$result3 = $wpdb->update(
					$table_name,
					array(
						'title' => sanitize_title($_POST['title']),
						'url' => esc_url_raw($_POST['url']),
						'image_url' => sanitize_text_field($_POST['image_file']),
						'sortorder' => sanitize_sql_orderby($_POST['sortorder']),
						'date_upload' => time(),
						'target' => sanitize_sql_orderby($_POST['target']),
					),
					array('id' => sanitize_text_field($_POST['id'])),
					array(
						'%s',
						'%s',
						'%s',
						'%d',
						'%s',
						'%d',
					),
					array('%d')
				);

				if (false === $result3) {
					$err .= "Update fails !";
				} else {
					$msg = "Update successful !";
				}
			}
		} // end edit
	}
}

function cnss_social_icon_sort_fn()
{
	global $wpdb, $cnssBaseURL;

	$cnss_width = esc_attr(get_option('cnss-width'));
	$cnss_height = esc_attr(get_option('cnss-height'));

	$image_file_path = $cnssBaseURL;
	$icons = cnss_get_all_icons();

	?>
<div class="wrap">
    <?php echo cnss_esi_review_text(); ?>
    <h2>Sort Icons</h2>

    <div id="ajax-response"></div>
    <div class="content_wrapper">
        <div class="left">

            <noscript>
                <div class="error message">
                    <p>
                        <?php _e('This plugin can\'t work without javascript, because it\'s use drag and drop and AJAX.', 'cpt') ?>
                    </p>
                </div>
            </noscript>

            <div id="order-post-type" style="padding:15px 20px 20px; background:#fff; border:1px solid #ebebeb;">
                <ul id="sortable">
                    <?php
						foreach ($icons as $icon) {
							?>
                    <li id="item_<?php echo esc_attr($icon->id) ?>">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr style="background:#f7f7f7">
                                <td style="padding:5px 5px 0;" width="64">
                                    <?php echo cnss_get_icon_html($icon->image_url, $icon->title); ?>
                                </td>
                                <td width="200"><span><?php echo $icon->title; ?></span></td>
                                <td align="left" style="text-align:left;"><span>
                                        <?php echo $icon->url; ?>
                                    </span></td>
                            </tr>
                        </table>
                    </li>
                    <?php } ?>
                </ul>
                <div class="clear"></div>
            </div>

            <p class="submit" style="text-align:center"><input type="submit" id="save-order" class="button-primary"
                    value="<?php _e('Save Changes') ?>" />
                <?php echo cnss_back_to_link() ?>
            </p>

            <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery("#sortable").sortable({
                    tolerance: 'intersect',
                    cursor: 'pointer',
                    items: 'li',
                    placeholder: 'placeholder'
                });
                jQuery("#sortable").disableSelection();
                jQuery("#save-order").bind("click", function() {
                    jQuery.post(ajaxurl, {
                        action: 'update-social-icon-order',
                        order: jQuery("#sortable").sortable("serialize")
                    }, function(response) {
                        jQuery("#ajax-response").html(
                            '<div class="message updated fade"><p>Items Order Updated</p></div>'
                        );
                        jQuery("#ajax-response div").delay(1000).hide("slow");
                    });
                });
            });
            </script>

        </div>
        <div class="right">
            <?php cnss_admin_sidebar(); ?>
        </div>
    </div>
</div>
<?php
}

function cnss_save_ajax_order()
{
	global $wpdb;
	$table_name = $wpdb->prefix . "cn_social_icon";
	parse_str(sanitize_text_field($_POST['order']), $data);
	if (!is_array($data)) {
		return;
	}
	foreach ($data as $key => $values) {
		if ($key != 'item') {
			continue;
		}
		foreach ($values as $position => $id) {
			$wpdb->update(
				$table_name,
				array('sortorder' => $position),
				array('id' => $id),
				array('%d'),
				array('%d')
			);
		}
	}
}

function cnss_get_icon_html($url = '', $title = '', $width = '', $height = '', $margin = '')
{
	if ($url == '') {
		return '<span>Input source invalid.</span>';
	}

	$title = esc_attr($title);
	$width = ($width == '') ? esc_attr(get_option('cnss-width')) : $width;
	$height = ($height == '') ? esc_attr(get_option('cnss-height')) : $height;
	$icon_output_html = '';

	if (cnss_is_image_icon($url)) {
		$url = esc_url($url);
		$imgStyle = '';
		$imgStyle .= ($margin == '') ? '' : 'margin:' . $margin . 'px;';
		$imgStyle .= ($width == $height) ? '' : 'height:' . $height . 'px;';
		$icon_output_html = '<img src="' . cnss_get_img_url($url) . '" border="0" width="' . $width . '" height="' . $height . '" alt="' . $title . '" title="' . $title . '" style="' . $imgStyle . '" />';
	} else {
		$url = esc_attr($url);
		$icon_output_html = '<i title="' . $title . '" style="font-size:' . $width . 'px;" class="' . $url . '"></i>';
	}
	return $icon_output_html;
}

function cnss_get_img_url($url)
{
	global $cnssBaseURL;
	if ($url == '') {
		return;
	}

	if (strpos($url, '/') === false) {
		return $cnssBaseURL . '/' . $url;
	} else {
		return $url;
	}
}

function cnss_is_image_icon($url)
{
	return !preg_match('/fa[srb]?\s+fa-[a-z0-9-]+/', $url);
}

function cnss_social_icon_add_fn()
{

	global $wpdb, $err, $msg, $cnssBaseURL;

	$social_sites = array(
		"https://500px.com/" => "500px",
		"https://angellist.com/" => "AngelList",
		"https://bandcamp.com/" => "Bandcamp",
		"https://behance.com/" => "Behance",
		"https://bitbucket.org/" => "BitBucket",
		"https://bloglovin.com/" => "Blog Lovin'",
		"https://codepen.com/" => "Codepen",
		"mail:" => "Email",
		"https://delicious.com/" => "Delicious",
		"https://deviantart.com/" => "DeviantArt",
		"https://digg.com/" => "Digg",
		"https://dribbble.com/" => "Dribbble",
		"https://dropbox.com/" => "Dropbox",
		"https://facebook.com/" => "Facebook",
		"https://flickr.com/" => "Flickr",
		"https://foursquare.com/" => "Foursquare",
		"https://github.com/" => "Github",
		"https://plus.google.com/" => "Google+",
		"https://houzz.com/" => "Houzz",
		"https://instagram.com/" => "Instagram",
		"https://itunes.com/" => "iTunes",
		"https://jsfiddle.com/" => "JSFiddle",
		"https://lastfm.com/" => "Last.fm",
		"https://linkedin.com/" => "LinkedIn",
		"https://mixcloud.com/" => "Mixcloud",
		"https://paper-plane.com/" => "Newsletter",
		"https://pinterest.com/" => "Pinterest",
		"https://reddit.com/" => "Reddit",
		"rss" => "RSS",
		"skype" => "Skype",
		"https://snapchat.com/" => "Snapchat",
		"https://soundcloud.com/" => "Soundcloud",
		"https://spotify.com/" => "Spotify",
		"https://stackoverflow.com/" => "Stack Overflow",
		"https://steam.com/" => "Steam",
		"https://stumbleupon.com/" => "Stumbleupon",
		"https://tripadvisor.com/" => "Trip Advisor",
		"https://tumblr.com/" => "Tumblr",
		"https://twitch.com/" => "Twitch",
		"https://twitter.com/" => "Twitter",
		"viber" => "Viber",
		"https://vimeo.com/" => "Vimeo",
		"https://vine.com/" => "Vine",
		"https://vkontakte.com/" => "VK",
		"https://wordpress.com/" => "WordPress",
		"https://xing.com/" => "Xing",
		"https://yelp.com/" => "Yelp",
		"https://youtube.com/" => "YouTube",
		"https://yahoo.com/" => "Yahoo"
	);

	$cnss_width = esc_attr(get_option('cnss-width'));
	$cnss_height = esc_attr(get_option('cnss-height'));
	$blank_img = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7";

	if (isset($_GET['mode'])) {
		if ($_GET['mode'] == 'edit' and $_GET['id'] != '') {

			if (!is_numeric($_GET['id']))
				wp_die('Sequrity Issue.');

			$page_title = 'Edit Icon';
			$uptxt = 'Icon';

			$table_name = $wpdb->prefix . "cn_social_icon";
			$image_file_path = $cnssBaseURL;
			$sql = $wpdb->prepare(
				"SELECT * FROM `{$table_name}` WHERE `id`=%d",
				$_GET['id']
			);
			$icon_info = $wpdb->get_row($sql);

			if (!empty($icon_info)) {
				$id = esc_attr($icon_info->id);
				$title = esc_attr($icon_info->title);
				$url = esc_url($icon_info->url);
				$image_url = esc_attr($icon_info->image_url);
				$sortorder = esc_attr($icon_info->sortorder);
				$target = esc_attr($icon_info->target);
			}
		}
	} else {
		$page_title = 'Add New Icon';
		$title = "";
		$url = "";
		$image_url = "";

		$sortorder = count(cnss_get_all_icons());
		$target = "";
		$uptxt = 'Icon';
	}
	?>
<?php add_thickbox(); ?>
<div id="cnss-font-awesome-icons-list" style="display:none;">
    <?php include_once 'fa-brand-icons.php'; ?>
</div>
<div class="wrap">
    <?php echo cnss_esi_review_text(); ?>
    <?php
		if ($msg != '')
			echo '<div id="message" class="updated fade">' . esc_html($msg) . '</div>';
		if ($err != '')
			echo '<div id="message" class="error fade">' . esc_html($err) . '</div>';
		?>
    <h2>
        <?php echo esc_attr($page_title); ?>
    </h2>
    <div class="content_wrapper">
        <div class="left">

            <script type="text/javascript">
            jQuery(document).ready(function($) {

                $('.fontawesome-icon-list a').click(function(event) {
                    event.preventDefault();
                    id = $(this).find('i').attr('class');
                    $('input#image_file').val(id);
                    $('#fa-placeholder').removeClass().addClass(id);
                    $('#logoimg').hide();
                    $('#fa-placeholder').show();
                    $("#TB_closeWindowButton").trigger('click');
                });
            });
            </script>
            <style type="text/css">
            img#logoimg {
                max-width: 32px;
            }
            </style>
            <form method="post" enctype="multipart/form-data" action="">
                <?php wp_nonce_field('cn_insert_icon'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Title<em>*</em></th>
                        <td>
                            <input list="title-autofill" type="text" name="title" id="title" class="regular-text"
                                value="<?php echo $title ?>" /><br /><i>Type few char for suggestions</i>
                            <datalist style="display: none;" id="title-autofill">
                                <?php foreach ($social_sites as $key => $value) { ?>
                                <option value="<?php echo esc_attr($value); ?>">
                                    <?php } ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">
                            <?php echo esc_attr($uptxt); ?><em>*</em>
                        </th>
                        <td>
                            <i id="fa-placeholder" class="fa <?php echo esc_attr($image_url); ?>" aria-hidden="true"
                                style="font-size: 2em;"></i>

                            <img id="logoimg" style="vertical-align:top"
                                src="<?php echo cnss_is_image_icon($image_url) ? esc_url($image_url) : $blank_img; ?>"
                                border="0" width="<?php //echo $cnss_width; 
										?>" height="<?php //echo $cnss_height; 
											?>" alt="<?php echo $title; ?>" />

                            <a title="Choose Font Awesome Icon (Version 5.7.2)"
                                href="#TB_inline?width=600&height=500&inlineId=cnss-font-awesome-icons-list"
                                class="thickbox button">Choose From FontAwesome Icon </a>
                            <span style="vertical-align:middle;">or</span>
                            <input style="vertical-align:top" id="logo_image_button" class="button" type="button"
                                value="Upload Your Own Image Icon" />

                            <input style="vertical-align:top" type="hidden" name="image_file" id="image_file"
                                class="regular-text" value="<?php echo $image_url ?>" readonly="readonly" />
                            <p><em>You can download image icon from <a target="_blank"
                                        href="http://www.cybernetikz.com/wordpress-magento-plugins/wordpress-plugins/easy-social-icons/#inputbox-srcfield">here</a></em>
                            </p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">URL<em>*</em></th>
                        <td><input list="url-autofill" type="text" name="url" id="url" class="regular-text"
                                value="<?php echo $url ?>" />
                            <datalist style="display: none;" id="url-autofill">
                                <?php foreach ($social_sites as $key => $value) { ?>
                                <option value="<?php echo esc_attr($key); ?>">
                                    <?php } ?>
                            </datalist><br /><i>Type few char for suggestions &ndash; don't forget the
                                <strong><code>http(s)://</code></strong></i>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Sort Order</th>
                        <td>
                            <input type="number" name="sortorder" id="sortorder" class="small-text"
                                value="<?php echo esc_attr($sortorder); ?>">
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Target</th>
                        <td>
                            <input type="radio" name="target" id="new" checked="checked" value="1" />&nbsp;<label
                                for="new">Open new window</label>&nbsp;<br />
                            <input type="radio" name="target" id="same" value="0" />&nbsp;<label for="same">Open same
                                window</label>&nbsp;
                        </td>
                    </tr>
                </table>

                <?php if (isset($_GET['mode'])) { ?>
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" id="id" value="<?php echo esc_attr($id); ?>">
                <?php } else { ?>
                <input type="hidden" name="action" value="update">
                <?php } ?>

                <p class="submit" style="text-align:center"><input id="submit_button" name="submit_button" type="submit"
                        class="button-primary" value="<?php _e('Save Changes') ?>">
                    <?php echo cnss_back_to_link() ?>
                </p>
            </form>
        </div>
        <div class="right">
            <?php cnss_admin_sidebar(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('form').submit(function(event) {
        if ($('#url').val() == '' ||
            $('#image_file').val() == '' ||
            $('#title').val() == '') {
            event.preventDefault();
            alert('Please input Title, Icon & Url field(s)');
        }
    });
});
</script>
<?php
}

function cnss_back_to_link()
{
	return '&nbsp;&nbsp;<a href="admin.php?page=cnss_social_icon_page"><input type="button" class="button-secondary" value="All Icons" /></a><small>&nbsp;&larr;Back to</small>';
}

function cnss_manage_icon_table_header()
{
	return '
	<th class="manage-column column-title" scope="col" width="20">ID</th>
	<th class="manage-column column-title" scope="col">Title</th>
	<th class="manage-column column-title" scope="col">URL</th>
	<th class="manage-column column-title" scope="col" width="100">Open In</th>
	<th class="manage-column column-title" scope="col" width="100">Icons</th>
	<th class="manage-column column-title" scope="col" width="60"><a href="admin.php?page=cnss_social_icon_sort">Order <i class="fa fa-sort"></i></a></th>
	<th class="manage-column column-title" scope="col" width="50">Action</th>
	<th class="manage-column column-title" scope="col" width="50">Action</th>
	';
}

function cnss_esi_review_text()
{
	return '<div class="cnss-esi-review"><p><span>Please <a target="_blank" href="https://wordpress.org/support/plugin/easy-social-icons/reviews/">review</a> this plugin</span><span style="float: right;">Need support please <a target="_blank" href="http://www.cybernetikz.com/wordpress-magento-plugins/wordpress-plugins/easy-social-icons/#disqus_thread">contact us here</a></span></p></div>';
}

function cnss_social_icon_page_fn()
{

	global $wpdb, $cnssBaseURL;

	$cnss_width = esc_attr(get_option('cnss-width'));
	$cnss_height = esc_attr(get_option('cnss-height'));

	$image_file_path = $cnssBaseURL;
	$icons = cnss_get_all_icons();
	$nonce = wp_create_nonce('cnss_delete_icon');
	?>
<div class="wrap">
    <?php echo cnss_esi_review_text(); ?>
    <h1 style="margin-bottom: 10px;" class="wp-heading-inline">Social Icons</h1> <a
        href="admin.php?page=cnss_social_icon_add" class="page-title-action">Add New</a>
    <script type="text/javascript">
    function show_confirm(title, id) {
        var rpath1 = "";
        var rpath2 = "";
        var r = confirm('Are you confirm to delete "' + title + '"');
        if (r == true) {
            rpath1 = '<?php echo admin_url('admin.php?page=cnss_social_icon_page'); ?>';
            rpath2 = '&cnss-delete=y&id=' + id + '&_wpnonce=<?php echo esc_attr($nonce); ?>';
            window.location = rpath1 + rpath2;
        }
    }
    </script>
    <div class="content_wrapper">
        <div class="left">
            <table class="widefat page fixed" cellspacing="0">
                <thead>
                    <tr valign="top">
                        <?php echo cnss_manage_icon_table_header(); ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
						if ($icons) {
							foreach ($icons as $icon) {
								$icon->id = esc_attr($icon->id);
								$icon->title = esc_attr($icon->title);
								$icon->url = esc_url($icon->url);
								$icon->sortorder = esc_attr($icon->sortorder);
								?>
                    <tr valign="top">
                        <td>
                            <?php echo esc_attr($icon->id); ?>
                        </td>
                        <td>
                            <?php echo esc_attr($icon->title); ?>
                        </td>
                        <td>
                            <a target="_blank" href="<?php echo esc_url($icon->url); ?>">
                                <?php echo esc_url($icon->url); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $icon->target == 1 ? 'New Window' : 'Same Window' ?>
                        </td>
                        <td>
                            <?php echo cnss_get_icon_html($icon->image_url, $icon->title); ?>
                        </td>
                        <td align="center">
                            <?php echo $icon->sortorder; ?>
                        </td>
                        <td align="center">
                            <a title="Edit <?php echo $icon->title; ?>"
                                href="?page=cnss_social_icon_add&mode=edit&id=<?php echo $icon->id; ?>"><i
                                    class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                        </td>
                        <td align="center">
                            <a title="Delete <?php echo $icon->title; ?>"
                                onclick="show_confirm('<?php echo addslashes($icon->title) ?>','<?php echo $icon->id; ?>');"
                                href="#delete"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php
							} //endforeach
						} else {
							echo '<tr valign="top"><td align="center" colspan="8">No icon found, please <a href="admin.php?page=cnss_social_icon_add">Add New</a> icon</td></tr>';
						}
						?>
                </tbody>
                <tfoot>
                    <tr valign="top">
                        <?php echo cnss_manage_icon_table_header(); ?>
                    </tr>
                </tfoot>
            </table>
            <h4>Please visit <a href="admin.php?page=cnss_social_icon_option#shortcode">How to use</a> or <a
                    href="admin.php?page=cnss_social_icon_option">Settings</a> page</h4>
        </div>
        <div class="right">
            <?php cnss_admin_sidebar(); ?>
        </div>
    </div>
</div>
<?php
}

function cnss_social_icon_table()
{

	$cnss_width = esc_attr(get_option('cnss-width'));
	$cnss_height = esc_attr(get_option('cnss-height'));
	$cnss_margin = esc_attr(get_option('cnss-margin'));
	$cnss_rows = esc_attr(get_option('cnss-row-count'));
	$vorh = esc_attr(get_option('cnss-vertical-horizontal'));

	global $wpdb, $cnssBaseURL;
	$table_name = $wpdb->prefix . "cn_social_icon";
	$image_file_path = $cnssBaseURL;
	$sql = $wpdb->prepare("SELECT * FROM `{$table_name}` WHERE `image_url` != '' AND `url` != '' ORDER BY `sortorder`");
	$icons = $wpdb->get_results($sql);
	$icon_count = count($icons);

	$_collectionSize = count($icons);
	$_rowCount = $cnss_rows ? $cnss_rows : 1;
	$_columnCount = ceil($_collectionSize / $_rowCount);

	if ($vorh == 'vertical')
		$table_width = $cnss_width;
	else
		$table_width = $_columnCount * ($cnss_width + $cnss_margin);

	$td_width = $cnss_width + $cnss_margin;

	ob_start();
	echo '<table class="cnss-social-icon" style="width:' . $table_width . 'px" border="0" cellspacing="0" cellpadding="0">';
	$i = 0;
	foreach ($icons as $icon) {

		echo $vorh == 'vertical' ? '<tr>' : '';
		if ($i++ % $_columnCount == 0 && $vorh != 'vertical')
			echo '<tr>';
		?><td style="width:<?php echo $td_width ?>px"><a <?php echo ($icon->target == 1) ? 'target="_blank"' : '' ?>
        title="<?php echo $icon->title ?>" href="<?php echo $icon->url ?>">
        <?php echo cnss_get_icon_html($icon->image_url, $icon->title); ?>
    </a></td>
<?php
		if (($i % $_columnCount == 0 || $i == $_collectionSize) && $vorh != 'vertical')
			echo '</tr>';
		echo $vorh == 'vertical' ? '</tr>' : '';
	}
	echo '</table>';
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}

function cnss_format_title($str)
{
	$pattern = '/[^a-zA-Z0-9]/';
	return strtolower(preg_replace($pattern, '-', $str));
}

function cnss_format_class($str)
{
	return str_replace(array('fa ', 'fab ', 'fas ', 'far ', 'fa-'), array('', '', '', '', 'cnss-'), $str);
}

function cn_social_icon($attr = array(), $call_from_widget = NULL)
{

	global $wpdb, $cnssBaseURL;
	$image_file_path = $cnssBaseURL;
	$attr_id = isset($attr['attr_id']) ? $attr['attr_id'] : '';
	$attr_class = isset($attr['attr_class']) ? $attr['attr_class'] : '';
	$where_sql = "";

	if (isset($attr['selected_icons'])) {
		if (is_string($attr['selected_icons'])) {
			$attr['selected_icons'] = preg_replace('/[^0-9,]/', '', $attr['selected_icons']);
			$attr['selected_icons'] = explode(',', $attr['selected_icons']);
		}

		if (is_array($attr['selected_icons']) && !empty($attr['selected_icons'])) {
			$placeholder = implode(', ', array_fill(0, count($attr['selected_icons']), '%d'));
			$where_sql .= $wpdb->prepare("AND `id` IN({$placeholder})", $attr['selected_icons']);
		}
	}

	$cnss_width = isset($attr['width']) ? $attr['width'] : esc_attr(get_option('cnss-width'));
	$cnss_height = isset($attr['height']) ? $attr['height'] : esc_attr(get_option('cnss-height'));
	$cnss_margin = isset($attr['margin']) ? $attr['margin'] : esc_attr(get_option('cnss-margin'));
	$cnss_rows = esc_attr(get_option('cnss-row-count'));
	$vorh = isset($attr['display']) ? $attr['display'] : esc_attr(get_option('cnss-vertical-horizontal'));
	$text_align = isset($attr['alignment']) ? $attr['alignment'] : esc_attr(get_option('cnss-text-align'));

	// settings for font-awesome icons
	$icon_bg_color = cnss_get_option('cnss-icon-bg-color');
	$icon_color = cnss_get_option('cnss-icon-color');
	$icon_hover_color = cnss_get_option('cnss-icon-hover-color');
	$icon_shape = cnss_get_option('cnss-icon-shape');
	$cnss_original_icon_color = cnss_get_option('cnss-original-icon-color');

	$table_name = $wpdb->prefix . "cn_social_icon";
	$sql = $wpdb->prepare("SELECT * FROM `{$table_name}` WHERE `image_url` != '' AND `url` != '' $where_sql ORDER BY `sortorder`");
	$icons = $wpdb->get_results($sql);
	$icon_count = count($icons);
	$li_margin = round($cnss_margin / 2);

	ob_start();
	echo '<ul id="' . esc_attr($attr_id) . '" class="cnss-social-icon ' . esc_attr($attr_class) . '" style="text-align:' . esc_attr($text_align) . ';">';
	$i = 0;
	foreach ($icons as $icon) {
		$aStyle = '';
		$liClass = 'cn-fa-' . cnss_format_title($icon->title);
		$aClass = '';
		$liStyle = ($vorh == 'horizontal') ? 'display:inline-block;' : '';
		$aTarget = ($icon->target == 1) ? 'target="_blank"' : '';
		if (!cnss_is_image_icon($icon->image_url)) {
			$liClass .= " cn-fa-icon ";
			$aPadding = round($cnss_width / 4);
			$aWidth = $cnss_width + $aPadding * 2;
			$aHeight = $aWidth;
			$aStyle .= "width:{$aWidth}px;";
			$aStyle .= "height:{$aHeight}px;";
			$aStyle .= "padding:{$aPadding}px 0;";
			$aStyle .= "margin:{$li_margin}px;";
			$aStyle .= "color: {$icon_color};";
			if ($cnss_original_icon_color == '1') {
				$aClass = cnss_format_class($icon->image_url);
			} else {
				//$aStyle .= "background-color:{$icon_bg_color};";
			}
			if ($icon_shape == 'circle') {
				$borderRadius = '50%';
			} elseif ($icon_shape == 'round-corner') {
				$borderRadius = '10%';
			} else {
				$borderRadius = '0%';
			}
			$aStyle .= "border-radius: {$borderRadius};";
		}
		?>
<li class="<?php echo $liClass; ?>" style="<?php echo $liStyle; ?>"><a class="<?php echo $aClass; ?>"
        <?php echo $aTarget ?> href="<?php echo $icon->url ?>" title="<?php echo $icon->title ?>"
        style="<?php echo $aStyle ?>">
        <?php echo cnss_get_icon_html($icon->image_url, $icon->title, $cnss_width, $cnss_height, $li_margin); ?>
    </a></li>
<?php
		$i++;
	}
	echo '</ul>';
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}

function cnss_social_icon_sc($selected_icons_array = array())
{
	global $wpdb, $cnssBaseURL;

	$cnss_width = esc_attr(get_option('cnss-width'));
	$cnss_height = esc_attr(get_option('cnss-height'));
	$image_file_path = $cnssBaseURL;

	$icons = cnss_get_all_icons();
	$icon_count = count($icons);

	ob_start();
	echo '<ul class="cnss-social-icon-admin" style="text-align:left;">' . "\r\n";
	$i = 0;
	foreach ($icons as $icon) {
		$icon->id = esc_attr($icon->id);
		?>
<li style="display:inline-block; padding:2px 8px; border:1px dotted #ccc;">
    <div style="text-align: center; width: <?php echo $cnss_width ?>px;">
        <label for="icon<?php echo $icon->id; ?>">
            <?php echo cnss_get_icon_html($icon->image_url, $icon->title); ?>
        </label>
    </div>
    <div style="text-align: center;"><input <?php if (in_array($icon->id, $selected_icons_array))
				echo 'checked="checked"'; ?> style="margin:0;" type="checkbox" name="_selected_icons[]"
            id="icon<?php echo $icon->id; ?>" value="<?php echo $icon->id; ?>" /></div>
</li>
<?php
		$i++;
	}
	echo '</ul>' . "\r\n";
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}

class Cnss_Widget extends WP_Widget
{

	public function __construct()
	{
		parent::__construct(
			'cnss_widget',
			// Base ID
			'Easy Social Icons',
			// Name
			array('description' => __('Add social media icons to your Sidebar.')) // Args
		);
	}

	public function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		if (!empty($title))
			echo $before_title . $title . $after_title;
		echo cn_social_icon($instance, 1);
		echo $after_widget;
	}

	public function update($new_instance, $old_instance)
	{

		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['attr_id'] = strip_tags($new_instance['attr_id']);
		$instance['attr_class'] = strip_tags($new_instance['attr_class']);
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['margin'] = strip_tags($new_instance['margin']);
		$instance['display'] = strip_tags($new_instance['display']);
		$instance['alignment'] = strip_tags($new_instance['alignment']);
		// $instance['selected_icons'] = $new_instance['selected_icons'];
		return $instance;
	}

	public function form($instance)
	{

		$cnss_width = esc_attr(get_option('cnss-width'));
		$cnss_height = esc_attr(get_option('cnss-height'));
		$cnss_margin = esc_attr(get_option('cnss-margin'));
		$cnss_rows = esc_attr(get_option('cnss-row-count'));
		$vorh = esc_attr(get_option('cnss-vertical-horizontal'));
		$text_align = esc_attr(get_option('cnss-text-align'));

		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Follow Us');
		}
		$instance['alignment'] = isset($instance['alignment']) ? $instance['alignment'] : $text_align;
		$instance['display'] = isset($instance['display']) ? $instance['display'] : $vorh;
		?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php _e('Title:'); ?>
    </label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p><em>Following settings will override the default <a href="admin.php?page=cnss_social_icon_option">Icon
            Settings</a></em></p>
<table width="100%" border="0">
    <tr>
        <td><label for="<?php echo $this->get_field_id('width'); ?>">
                <?php _e('Icon Width <em>(px)</em>:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>"
                name="<?php echo $this->get_field_name('width'); ?>" type="number"
                value="<?php echo esc_attr(isset($instance['width']) ? $instance['width'] : $cnss_width); ?>" />
        </td>
        <td>&nbsp;</td>
        <td><label for="<?php echo $this->get_field_id('height'); ?>">
                <?php _e('Icon Height <em>(px)</em>:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>"
                name="<?php echo $this->get_field_name('height'); ?>" type="number"
                value="<?php echo esc_attr(isset($instance['height']) ? $instance['height'] : $cnss_height); ?>" />
        </td>
    </tr>
</table>

<table width="100%" border="0">
    <tr>
        <td><label for="<?php echo esc_attr($this->get_field_id('alignment')); ?>">
                <?php _e('Alignment:'); ?>
            </label><br />
            <select id="<?php echo esc_attr($this->get_field_id('alignment')); ?>"
                name="<?php echo esc_attr($this->get_field_name('alignment')); ?>">
                <option <?php selected($instance['alignment'], 'center'); ?> value="center">Center</option>
                <option <?php selected($instance['alignment'], 'left'); ?> value="left">Left</option>
                <option <?php selected($instance['alignment'], 'right'); ?> value="right">Right</option>
            </select>
        </td>
        <td>&nbsp;</td>
        <td><label for="<?php echo $this->get_field_id('display'); ?>">
                <?php _e('Display:'); ?>
            </label><br />
            <select id="<?php echo $this->get_field_id('display'); ?>"
                name="<?php echo $this->get_field_name('display'); ?>">
                <option <?php selected($instance['display'], 'horizontal'); ?> value="horizontal">Horizontally</option>
                <option <?php selected($instance['display'], 'vertical'); ?> value="vertical">Vertically</option>
            </select>
        </td>
        <td>&nbsp;</td>
        <td><label for="<?php echo $this->get_field_id('margin'); ?>">
                <?php _e('Margin <em>(px)</em>:'); ?>
            </label><br />
            <input maxlength="3" class="widefat" id="<?php echo $this->get_field_id('margin'); ?>"
                name="<?php echo $this->get_field_name('margin'); ?>" type="number"
                value="<?php echo esc_attr(isset($instance['margin']) ? $instance['margin'] : $cnss_margin); ?>" />
        </td>
    </tr>
</table>

<p>
    <label>
        <?php _e('Select Social Icons:'); ?>
    </label> <em>(If select none all icons will be displayed)</em><br />
    <?php echo $this->cnss_social_icon_widget(isset($instance['selected_icons']) ? $instance['selected_icons'] : array()); ?>
</p>

<table style="margin-bottom:15px;" width="100%" border="0">
    <tr>
        <td><label for="<?php echo $this->get_field_id('attr_id'); ?>">
                <?php _e('Add Custom ID:'); ?>
            </label>
            <input class="widefat" placeholder="ID" id="<?php echo $this->get_field_id('attr_id'); ?>"
                name="<?php echo $this->get_field_name('attr_id'); ?>" type="text"
                value="<?php echo esc_attr(isset($instance['attr_id']) ? $instance['attr_id'] : ''); ?>" />
        </td>
        <td>&nbsp;</td>
        <td><label for="<?php echo $this->get_field_id('attr_class'); ?>">
                <?php _e('Add Custom Class:'); ?>
            </label>
            <input class="widefat" placeholder="Class" id="<?php echo $this->get_field_id('attr_class'); ?>"
                name="<?php echo $this->get_field_name('attr_class'); ?>" type="text"
                value="<?php echo esc_attr(isset($instance['attr_class']) ? $instance['attr_class'] : ''); ?>" />
        </td>
    </tr>
</table>
<?php
	}

	public function cnss_social_icon_widget($selected_icons_array = array())
	{

		global $wpdb, $cnssBaseURL;

		$cnss_width = esc_attr(get_option('cnss-width'));
		$cnss_height = esc_attr(get_option('cnss-height'));
		$image_file_path = $cnssBaseURL;

		$icons = cnss_get_all_icons();
		$icon_count = count($icons);

		ob_start();
		if ($icons) {
			echo '<ul class="cnss-social-icon-admin-widget" style="text-align:left;">' . "\r\n";
			$i = 0;
			foreach ($icons as $icon) {
				$icon->id = esc_attr($icon->id);
				?>
<li style="display:inline-block; padding:2px 8px; border:1px dashed #ccc;">
    <div style="text-align: center; width: <?php echo $cnss_width ?>px;">
        <label for="<?php echo $this->get_field_id('selected_icons' . esc_attr($icon->id)); ?>">
            <?php echo cnss_get_icon_html($icon->image_url, $icon->title); ?>
        </label>
    </div>
    <div style="text-align: center;"><input <?php if (in_array($icon->id, $selected_icons_array))
						echo 'checked="checked"'; ?> style="margin:0;" type="checkbox"
            name="<?php echo $this->get_field_name('selected_icons'); ?>[]"
            id="<?php echo $this->get_field_id('selected_icons' . $icon->id); ?>" value="<?php echo $icon->id; ?>" />
    </div>
</li>
<?php
				$i++;
			}
			echo '</ul>' . "\r\n";
		} else {
			echo 'No icon found, please <a href="admin.php?page=cnss_social_icon_add" class="page-title-action">Add New</a> icon.';
		}
		$out = ob_get_contents();
		ob_end_clean();
		return $out;
	}
} // class Cnss_Widget

if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
	add_action('widgets_init', function () {
		register_widget("Cnss_Widget");
	});
} else {
	add_action('widgets_init', create_function('', 'register_widget( "Cnss_Widget" );'));
}