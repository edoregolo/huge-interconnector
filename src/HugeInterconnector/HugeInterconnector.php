<?php
namespace Huge;

class HugeInterconnector
{

    private $initialize;
    private $startProcess;
    public $response;
    public $usingAPI = false;

    private $authApi = array();

    private $currentInformation = array();

    public function __construct()
    {
        $this->init();
        if($this->usingAPI){
            $this->authApi();
        }
    }

    private function init(){
        $this->getCurrentInformation();
    }

    private function getCurrentInformation()
    {
        $url = $_SERVER['HTTP_HOST'];
        $ip  = $_SERVER['REMOTE_ADDR'];
        $this->currentInformation[] = ['url' => $url, 'ip' => $ip];
    }

    private function authApi()
    {
        if(!empty($this->authApi['usr']) && !empty($this->authApi['psw']))
        {
            $data = array("usr" => $this->authApi['usr'], "psw" => $this->authApi['psw']);

            $curlSES=curl_init();
            curl_setopt($curlSES,CURLOPT_URL,"https://www.hugeauth.it/api/auth");
            curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curlSES,CURLOPT_HEADER, false);
            curl_setopt($curlSES, CURLOPT_POST, true);
            curl_setopt($curlSES, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curlSES, CURLOPT_CONNECTTIMEOUT,10);
            curl_setopt($curlSES, CURLOPT_TIMEOUT,30);
            $result = curl_exec($curlSES);
            curl_close($curlSES);
        }
    }

    public function Auth()
    {

    }



}

