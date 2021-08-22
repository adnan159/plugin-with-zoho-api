<?php

namespace ZFT\Front;

class Enqueue {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'input' ], 10, 1 );
		add_action( 'wp_enqueue_scripts', [ $this, 'output' ], 10, 1 );
	}

	public function input () {
		$fileurl = ZFT_DIR_URL . 'assets/front/js/input.js';
		wp_register_script( 'input_page_js', $fileurl, [], null, true );
		wp_localize_script( 'input_page_js', 'input_ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	public function output() {
		$fileurl = ZFT_DIR_URL . 'assets/front/js/output.js';
		wp_register_script( 'output_page_js', $fileurl, [], null, true );
		wp_localize_script( 'output_page_js', 'output_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

}