<?php
/*
  Plugin name: Born Creative Cart View
  Plugin URI: https://github.com/borncreativeuk/born-creative-wc-cart-view
  Description: plugin to see cart items in woocommerce baskets
  Author: Born Creative
  Author URI: https://www.born-creative.co.uk/
  Version: 1.0
  License: GPL v3 or later
  License URI: https://www.gnu.org/licenses/gpl-3.0.html

  Born Creative Cart View is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  any later version.
 
  Born Creative Cart View is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with Born Creative Cart View. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
  */

if (!defined('ABSPATH')) exit; // Exit if accessed directly   

// helper functions
if (file_exists(plugin_dir_path(__FILE__) . '/includes/helper.php')) {
	require_once  plugin_dir_path(__FILE__) . '/includes/helper.php';
}
