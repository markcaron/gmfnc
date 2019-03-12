<?php
/**
 * Custom Settings Functions
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

/**
 * Wrapper for WP get & update options, with namespacing
 * @param $name the option group key
 * @return the array from get_option()
 */
function custom_get_option( $name ) {
	return get_option("{$name}_settings");
}

/**
 * Wrapper for WP get & update options, with namespacing
 * @param $name the option group key
 * @return the result from add_option()
 */
function custom_add_option( $name ) {
	return add_option("{$name}_settings");
}

/**
 * Wrapper for WP get & update options, with namespacing
 * @param $name the option group key
 * @return the result from delete_option()
 */
function custom_delete_option( $name ) {
	return delete_option("{$name}_settings");
}

/**
 * Wrapper for WP get & update options, with namespacing
 * @param $name the option group key
 * @param $options the array of settings to update
 */
function custom_set_option( $name, $options ) {
	return update_option("{$name}_settings", $options );
}
