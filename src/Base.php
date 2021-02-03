<?php
namespace xjryanse\curl;

abstract class Base
{
    /**
     * 底层get调用
     * @param type $url
     * @param type $header
     * @return type
     */
    protected static function curlGet($url,$header = []){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    
    /**
     * 底层post调用
     * @param type $url
     * @param type $data
     * @param type $header
     * @return type
     */
    protected static function curlPost($url,$data,$header = []){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output; 
    }
}
