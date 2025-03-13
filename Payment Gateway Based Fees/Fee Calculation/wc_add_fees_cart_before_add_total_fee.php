<?php
/**
 *
 * @since 5.0
 * @param boolean $calculate
 * @param WC_Cart $obj_wc_cart
 * @param boolean						false to skip calculation
 */
function custom_wc_add_fees_cart_before_add_total_fee( $calculate, $obj_wc_cart )
{
	//Example: to skip double calculation of fees when plugin Wallee is activated (results in double calculation of fees)
	if( isset( $GLOBALS['wallee_calculating'] ) && $GLOBALS['wallee_calculating'] === true )
	{
		return false;
	}

	return $calculate;
}

add_filter( 'wc_add_fees_cart_before_add_total_fee', 'custom_wc_add_fees_cart_before_add_total_fee', 2000, 2 );

