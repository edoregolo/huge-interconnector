<?php

namespace Huge;

class HugeIntermediary
{

    public int $authCode;

    public $service_url = 'https://hugeauth.it/api/extauth/checktoken';
    public $callback_url = '';

    public function __construct()
    {

    }

    public function checkAuthCode($authCode)
    {
        if(!empty($authCode)){
            $ch = curl_init();
            $headers = array(
                'Accept: application/json',
                'Content-Type: application/json',
            );
            curl_setopt($ch, CURLOPT_URL, $this->service_url . '?token=' . $authCode);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $body = '{}';

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Timeout in seconds
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            $authToken = curl_exec($ch);

            return $authToken;
        } else {
            return false;
        }
    }
}


?>
