<?php
/**
 * Plugin Name: Multi Site REST API
 * Description: Wordpress Multi Site Rest API
 * Author: Lincoln Mahmud
 * Author URI: https://facebook.com/lincolndu
 * Version: 1.0.0
 * Plugin URI:
 * License: GPL2+
 * Text Domain: multisiteapi
 * Domain Path: /languages/
 * Network: true
 */

/**
 *
 */

class Mulit_Site_API{

	/**
     * Initialize the class
    */
	public function __construct(){
		add_action( 'rest_api_init', [ $this, 'sites_rest_api_init' ] );
	}
	/**
     * initiate plugin functionalities.
     *
     * @return void
     */
	public function sites_rest_api_init() {
		if ( class_exists( 'WP_REST_Controller' ) && ! class_exists( 'WP_REST_Sites_Controller' ) ) {
			require_once plugin_dir_path( __FILE__ ) . '/lib/class-wp-rest-site-meta-fields.php';
			require_once plugin_dir_path( __FILE__ ) . '/lib/class-wp-rest-sites-controller.php';
		}
		$plugins_controller = new WP_REST_Sites_Controller();
		$plugins_controller->register_routes();
	}

}
new Mulit_Site_API();


