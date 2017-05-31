<?php

/**
 * Create and output the html for the side floating share buttons
 *
 * @package   SocialWarfare\Functions
 * @copyright Copyright (c) 2017, Warfare Plugins, LLC
 * @license   GPL-3.0+
 * @since     1.0.0
 * @since 	  2.3.0 | 30 MAY 2017 | Converted to class-based OOP system
 */

defined( 'WPINC' ) || die;

/**
 * social_warfare_side_buttons() - A class to extend social_warfare_buttons and adapt them for the side floating version
 *
 * @since 2.3.0 | 30 MAY 2017 | Created
 * @access protected
 * @param Array $array An array of parameters to manipulate the output of the buttons
 *
 */
class social_warfare_side_buttons extends social_warfare_buttons {

	/**
	 * __construct() - A function to construct our object.
	 *
	 * @param array $array [description]
	 * @since 2.3.0 | 30 MAY 2017 | Created
	 * @access public
	 *
	 */
 	public function __construct($array) {
		wp_reset_query();
		parent::__construct($array);
	}

	/**
	 * is_html_needed() - A function to see if the buttons need output on this post or page
	 *
	 * @since 2.3.0 | 30 MAY 2017 | Created
	 * @access protected
	 * @return boolean | True if buttons need generated; False if we don't needs buttons here.
	 *
	 */
	protected function is_html_needed(){
		if ( !is_singular() || get_post_status( $this->postID ) != 'publish' || get_post_meta( $this->postID , 'nc_floatLocation' , true ) == 'off' || is_home() ) :
			return false;
		else:
			if ( isset( $this->options[ 'float_location_' . $this->post_type ] ) ) :
				return $this->options[ 'float_location_' . $this->post_type ];
			else :
				return false;
			endif;
		endif;
	}

}
