<?php
/**
 * Filter allows to adjust "fixed value to add" depending on gateway and/or total cart value
 *
 * @since 4.0.1
 * @param float $fixed_value
 * @param array $gateway				selected payment gateway
 * @param float $total_cart				total cart value including tax before adding our fees !!!
 * @return float
 */
function custom_wc_add_fees_gateway_fee_fixed( $fixed_value, $gateway, $total_cart )
{
	/**
	 * Example: Charge extra 0.15 if total cart less than 40
	 *
	 * In options "Fixed Value to add:" set the value and select "Order to add fixed value:"
	 */
	if( $total_cart >= 40.0 )
	{
		$fixed_value = 0;
	}

	return $fixed_value;
}

add_filter( 'wc_add_fees_gateway_fee_fixed', 'custom_wc_add_fees_gateway_fee_fixed', 10, 3 );




