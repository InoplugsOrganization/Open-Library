<?php
/**
 * Hide our options tab on edit single product page in metabox product settings
 *
 * @since 4.1
 * @param boolean $hide
 * @return boolean						anything except false to hide
 */
function custom_wc_add_fees_hide_product_panel_options( $hide )
{
	return true;
}

add_filter( 'wc_add_fees_hide_product_panel_options', 'custom_wc_add_fees_hide_product_panel_options', 10, 1 );

