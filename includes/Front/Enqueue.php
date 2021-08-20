<?php

namespace ZFT\Front;

class Enqueue {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ], 10, 1 );
		add_action( 'wp_enqueue_scripts', [ $this, 'output' ], 10, 1 );
	}

	public function scripts () {
		$fileurl = ZFT_DIR_URL . 'assets/front/js/input.js';
		wp_register_script( 'input_page_js', $fileurl, [], null, true );
	}

	public function output() {
		$fileurl = ZFT_DIR_URL . 'assets/front/js/output.js';
		wp_register_script( 'output_page_js', $fileurl, [], null, true );
	}

}