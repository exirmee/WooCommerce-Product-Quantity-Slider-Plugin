<?php
/**
 * Plugin Name: add-slider
 * Plugin URI: aramweb.ir
 * Description: add a slider for metric products
 * Author: morteza hatami
 * Author URI: aramweb.ir
 * Version: 1.0
 * Text Domain: add-slider
 *
 * Copyright: (c) 2021 ,Morteza hatami (m.hatami@live.com)
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @author    Morteza Hatami
 * @copyright Copyright (c) 2021, Morteza Hatami
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//include Setting pages
include("setting.php");
include("decimal.php");


add_action('woocommerce_before_add_to_cart_button','Select_Needed_Value_function');
function Select_Needed_Value_function()
{
	$options = get_option( 'stp_api_settings' );
	if (is_product()&& has_term( $options['stp_api_text_field_cat'], 'product_cat' ))
	{

		include("template.php");
		include("js.php");
		//wp_deregister_style( 'sliderCss' );
		//wp_register_style( 'sliderCss', plugins_url( '/style.css', __FILE__ ) );
		//wp_enqueue_style( 'sliderCss' );
	}
}






