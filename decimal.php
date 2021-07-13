<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
              

/* Initialization.
    * Run most recently to make sure WooCommerce has already been initialized. 
----------------------------------------------------------------- */    
function WooDecimalProduct_remove_filters(){
    if (class_exists ('WooCommerce')){
        remove_filter ('woocommerce_stock_amount', 'intval');
        add_filter ('woocommerce_stock_amount', 'floatval');
    } 
}
add_action ('init', 'WooDecimalProduct_remove_filters', 999999);


// * $WooDecimalProduct_Min_Quantity_Default
//----------------------------------------------------------------- */  
add_filter( "woocommerce_quantity_input_min", 'min_decimal', 10, 3 );      
function min_decimal($val) {
    $options = get_option( 'stp_api_settings' );
    $Min_Quantity = $options['stp_api_text_field_min'];  
    return $Min_Quantity;
}


/* WooCommerce Setup Page. |Goods -> Stocks. | Validation: Step change Quantity.
    * $WooDecimalProduct_Step_Quantity_Default
----------------------------------------------------------------- */    
add_filter( "woocommerce_quantity_input_step", 'woo_allow_decimal', 10, 3 );          
function woo_allow_decimal ($val) {
    $options = get_option( 'stp_api_settings');
    $Step_Quantity= $options['stp_api_text_field_step'];   
    return $Step_Quantity;
}
   	

/* The minimum number of items to be selected on the Cart page.
----------------------------------------------------------------- */    
function WooDecimalProduct_quantity_input_args($args, $product) {
    global $WooDecimalProduct_Min_Quantity_Default;

    $Product_ID = $product->get_id();

    $min_Qnt = get_post_meta ($Product_ID, 'woodecimalproduct_min_qnt_default', $WooDecimalProduct_Min_Quantity_Default);

    if (!$min_Qnt) {
        $min_Qnt = $WooDecimalProduct_Min_Quantity_Default;
    }        

    $args['min_value'] = $min_Qnt;

    return $args;
}   
add_filter( 'woocommerce_quantity_input_args', 'WooDecimalProduct_quantity_input_args', 10, 2 );

// Add unit price fix when showing the unit price on processed orders
add_filter('woocommerce_order_amount_item_total', 'unit_price_fix', 10, 5);
function unit_price_fix($price, $order, $item, $inc_tax = false, $round = true) {
    $qty = (!empty($item['qty']) && $item['qty'] != 0) ? $item['qty'] : 1;
    if($inc_tax) {
        $price = ($item['line_total'] + $item['line_tax']) / $qty;
    } else {
        $price = $item['line_total'] / $qty;
    }
    $price = $round ? round( $price, 2 ) : $price;
    return $price;
}