<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

// helper functions

add_action('admin_menu', 'borncreative_wc_cart_view_admin_stuff', 99);

/**
 * Check if WooCommerce is activated
 */
if (!function_exists('borncreative_is_woocommerce_activated')) {
	function borncreative_is_woocommerce_activated()
	{
		if (class_exists('woocommerce')) {
			return true;
		} else {
			return false;
		}
	}
}

function borncreative_wc_cart_view_admin_stuff()
{

	// Create a top-level menu if it doesnt already exist
	if (!menu_page_url('born-creative', false)) {
		add_menu_page(
			'Born Creative',
			'Born Creative',
			'edit_others_posts',
			'born-creative',
			'borncreative_admin_view',
			'dashicons-admin-generic',
			2
		);

	}


	// Create a sub-menu under the top-level menu
	add_submenu_page(
		'born-creative',
		'View Carts',
		'View Carts',
		'edit_others_posts',
		'view-carts',
		'borncreative_wc_cart_admin_view'
	);
}

function borncreative_wc_cart_admin_view()
{
	// include admin view
	if (file_exists(plugin_dir_path(__FILE__) . '../views/born-creative-wc-cart-view-admin-view.php')) {
		require_once plugin_dir_path(__FILE__) . '../views/born-creative-wc-cart-view-admin-view.php';
	}
}

// create function if its not already defined (admin view function can appear from other plugins)
if (!function_exists('borncreative_admin_view')) {
	function borncreative_admin_view()
	{
		// include admin view
		if (file_exists(plugin_dir_path(__FILE__) . '../views/born-creative-view.php')) {
			require_once plugin_dir_path(__FILE__) . '../views/born-creative-view.php';
		}
	}
}

function borncreative_wc_get_carts_information()
{
	global $wpdb;

	// only run this if woocommerce is active
	if (borncreative_is_woocommerce_activated()) {
		// carts are in woocommerce_sessions table
		// first we need to get that whole table.

		echo '<h2>Carts</h2>';

		// use a prepared statement to prevent sqli
		$table_name = $wpdb->prefix . "woocommerce_sessions";
		$result = $wpdb->get_results(
			$wpdb->prepare("SELECT * FROM %i", $table_name)
		);

		echo "<table>";
		echo "<tr><td>Product ID</td><td>Product Name</td><td>Quantity</td><td>Total</td></tr>";
		foreach ($result as $session) {
			// do we have actual cart datas?
			$datas = unserialize($session->session_value);
			if (!empty($datas)) {
				$array = unserialize($datas['cart']);

				if (!empty($array)) {
					//     // we have a cart

					$temp = array_keys($array);
					$key = $temp[0];
					$cart = $array[$key];
					$product = wc_get_product($cart['product_id']);
					echo "<tr><td>";
					echo esc_html($cart['product_id']);
					echo "</td><td>";
					echo esc_html($product->get_name());
					echo "</td><td>";
					echo esc_html($cart['quantity']);
					echo "</td><td>";
					echo esc_html($cart['line_total']);
					echo "</td></tr>";


					// $product = wc_get_product( $cart[$key_name[0]]);

				}
			}
		}
		echo "</table>";
	}
}
