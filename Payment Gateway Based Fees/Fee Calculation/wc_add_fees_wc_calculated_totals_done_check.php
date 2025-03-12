<?php
/**
 * Enabled "Automatic Tax Calculation" causes fees to be added twice. There is no hook to prevent this.
 * This filter is a hack and prevents a second execution of this.
 *
 * It is not tested yet how it reacts when orders are changed from backend or pay for order page.
 *
 * Currently only added to cart checkout ( = 'handler_wc_calculated_totals' )
 *
 * @since 4.1
 */

/**
 * @since 4.1
 * @param boolean $check
 * @param string $context				'handler_wc_calculated_totals'
 * @return boolean						anything except false
 */
function custom_wc_add_fees_wc_calculated_totals_done_check( $check = false, $context = '' )
{
	// currently only 1 $context - so we can set
	$check = true;

	return $check;
}

add_filter( 'wc_add_fees_wc_calculated_totals_done_check', 'custom_wc_add_fees_wc_calculated_totals_done_check', 10, 2 );
