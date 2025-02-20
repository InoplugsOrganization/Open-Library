<?php
/**
 * Set default postmeta for an order
 * found in metabox "Additional Fees" in admin order page
 *
 * @param array $defaults
 * @param int $post_id
 * @return array
 */
function custom_wc_add_fees_post_meta_order_default( $defaults, $post_id )
{
	$defaults['recalc_fee'] = 'no';
	$defaults['recalc_fee_save_order'] = 'no';

	return $defaults;
}

add_filter( 'wc_add_fees_post_meta_order_default', 'custom_wc_add_fees_post_meta_order_default', 10, 2 );
