<?php
/**
 * based on https://www.businessbloomer.com/woocommerce-allow-to-pay-for-order-without-login/
 * Requested by WooCommerce Support ticket
 *
 * since 4.0
 */

/**
 *
 * @param array $allcaps
 * @param array $caps
 * @param array $args
 * @return array
 */
function wc_add_fees_order_pay_without_login( $allcaps, $caps, $args )
{
	if( ! is_array( $caps) )
	{
		$caps = (array) $caps;
	}

	if( isset( $caps[0] ) )
	{
		if( $caps[0] == 'pay_for_order' )
		{
			$order = null;

			if( isset( $_REQUEST['add_fee_order'] ) && isset( $_REQUEST[ 'add_fee_pay' ] ) )
			{
				$order_id = isset( $args[0] ) ? $args[0] : null;

				if( $order_id )
				{
					$order = wc_get_order( $order_id );
				}
			}
			else if( isset( $_GET['key'] ) )
			{
				$order_id = isset( $args[2] ) ? $args[2] : null;
				$order = wc_get_order( $order_id );
			}

			if( $order )
			{
				$allcaps['pay_for_order'] = true;
			}
		}
	}

	return $allcaps;
}

add_filter( 'user_has_cap', 'wc_add_fees_order_pay_without_login', 9999, 3 );
