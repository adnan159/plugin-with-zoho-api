<?php

namespace ZFT\Admin;

class Menu {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Admin menu items
     */
    public function admin_menu() {

        add_menu_page(
            'Zoho From Test',
            'ZFT',
            'manage_options',
            'zoho_deshboard',
            [ $this, 'ztf_input_page' ]
        );
    }

    /**
     * Output of dashboard page
     */
    public function ztf_input_page() {
        echo '<div>
            <h1>Use  [input-form] for Input</h1>
            <h1>Use  [output-table] for Output</h1>
        </div>';
    }

}
