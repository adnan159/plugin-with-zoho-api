<?php

namespace ZFT\Admin;

class Ajax {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'wp_ajax_zoho_from_action', [ $this, 'zoho_input_from' ] );
        add_action( 'wp_ajax_zoho_output_action', [ $this, 'zoho_output_field' ] );
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
            'Authorization: Zoho-oauthtoken 1000.b354ca2cfd5200f2722085b97e917ff2.5eb52722758f3522418904a8f122a0a6',
            'Content-Type: application/x-www-form-urlencoded'
        ) );

        $response = curl_exec( $ch );
        $response = (json_decode( $response ));
        var_dump($response);
    }

    public function zoho_output_field() {

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/Leads" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Zoho-oauthtoken 1000.b354ca2cfd5200f2722085b97e917ff2.5eb52722758f3522418904a8f122a0a6',
            'Content-Type: application/x-www-form-urlencoded'
        ) );

        $response = curl_exec( $ch );
        $response = (json_decode( $response ));

        // var_dump($response);

        wp_send_json_success($response);

    }

}