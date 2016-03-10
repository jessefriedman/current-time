<?php
/*
Plugin Name: Current Time
Description: A feature plugin created to solve a simple problem to improve a writers experience when scheduling posts
Author: Jesse Friedman
Version: 0.1
License: GPLv2 or later
*/

class current_Time {

	/**
	 * @var current_Time
	 **/
	private static $instance = null;

	static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new current_Time;
		}

		return self::$instance;
	}

	function __construct() {
		//global $post;
		//if( 'publish' !== $post->post_status ){
			add_action( 'post_submitbox_misc_actions', array( $this, 'currentTime_display_time' ) );
		//}
	}

	function currentTime_display_time() {
		$currentTime_i18n = date_i18n( 'M d, Y - G:i' );
		?>
		<span class="currentTime">Currently: <?php echo $currentTime_i18n ?></span>
		<?php
	}
}

current_Time::init();