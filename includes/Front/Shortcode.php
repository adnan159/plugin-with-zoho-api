<?php

namespace ZFT\Front;

class Shortcode {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_shortcode( 'input-form', array( $this, 'input_from_function' ) );
		add_shortcode( 'output-table', array( $this, 'output_table_function' ) );
	}

	public function input_from_function() {
		wp_enqueue_script( 'input_page_js' );
		ob_start(); ?>

		<div id="ztf-input-page"></div>

		<?php

		return ob_get_clean();
	}

	public function output_table_function() {
		wp_enqueue_script( 'output_page_js' );
		ob_start(); ?>

		<div id="ztf-output-page"></div>

		<?php

		return ob_get_clean();
	}

}
