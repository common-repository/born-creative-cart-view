<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

?>

<h1><?php esc_html_e('View Carts.', 'born-creative-wc-cart-view'); ?></h1>
<p><a href="https://www.born-creative.co.uk">born-creative.co.uk</a>

	<?php
	// TODO - output the table in here
	borncreative_wc_get_carts_information();
