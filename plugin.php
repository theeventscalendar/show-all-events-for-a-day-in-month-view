<?php
/**
 * Plugin Name: The Events Calendar Extension: Show All Events for a Day in Month View
 * Description: Remove the limit on how many events can show in month view "day" grid items.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */
 
defined( 'WPINC' ) or die;

class Tribe__Extension__Show_All_Events_for_Days_in_Month_View {

    /**
     * The semantic version number of this extension; should always match the plugin header.
     */
    const VERSION = '1.0.0';

    /**
     * Each plugin required by this extension
     *
     * @var array Plugins are listed in 'main class' => 'minimum version #' format
     */
    public $plugins_required = array(
        'Tribe__Events__Main' => '4.2'
    );

    /**
     * The constructor; delays initializing the extension until all other plugins are loaded.
     */
    public function __construct() {
        add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
    }

    /**
     * Extension hooks and initialization; exits if the extension is not authorized by Tribe Common to run.
     */
    public function init() {

        // Exit early if our framework is saying this extension should not run.
        if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
            return;
        }

        add_filter( 'tribe_events_month_day_limit', array( $this, 'tribe_remove_calendar_day_limit' ) );
    }

    /**
     * Remove the limit on how many events can show in month view "day" grid items.
     */
    public function tribe_remove_calendar_day_limit() {
        return -1;
    }
}

new Tribe__Extension__Show_All_Events_for_Days_in_Month_View();
