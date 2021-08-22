<?php

namespace ZFT\Admin;

class Ajax {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'wp_ajax_zoho_from_action', [ $this, 'zoho_input_from' ] );
        add_action( 'wp_ajax_zoho_output_action', [ $this, 'zoho_output_action' ] );
    }

    public function zoho_input_from() {
        $from_data = $_POST['bio'];        

        $post_data = [
            'data' =>[
                $from_data
            ],
            "trigger" => [
                "approval",
                "workflow",
                "blueprint"
            ]
        ];

        var_dump(json_encode($post_data));


        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/Leads" );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post_data) );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Zoho-oauthtoken 1000.bde370415cc5557e2dac954870fe3b0b.7a589740e3e1423a50222de27ac19a83',
            'Content-Type: application/x-www-form-urlencoded'
        ) );

        $response = curl_exec( $ch );
        $response = (json_decode( $response ));
        var_dump($response);
    }

    public function zoho_output_action() {

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/Leads" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Zoho-oauthtoken 1000.bde370415cc5557e2dac954870fe3b0b.7a589740e3e1423a50222de27ac19a83',
            'Content-Type: application/x-www-form-urlencoded'
        ) );

        $response = curl_exec( $ch );
        $response = (json_decode( $response ));

        // var_dump($response);

        wp_send_json_success($response);

    }

}