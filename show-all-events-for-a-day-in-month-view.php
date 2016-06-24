<?php
/**
 * Plugin Name: The Events Calendar — Show All Events for a Day in Month View
 * Description: Remove the limit on how many events can show in month view "day" grid items.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1x
 * License: GPLv2 or later
 */
 
defined( 'WPINC' ) or die;

add_filter( 'tribe_events_month_day_limit', 'tribe_remove_calendar_day_limit' );

function tribe_remove_calendar_day_limit() {
	return -1;
}
