<?php
namespace xjryanse\curl;

class Query
{
    public static function geturl($url,$header = []){
        $headerArray = array_merge($header, array("Content-type:application/json;","Accept:application/json"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output,true);
    }

    public static function posturl($url,$data,$header = []){
        $dataJson       = json_encode($data);
        $headerArray    = array_merge($header, array("Content-type:application/json;charset='utf-8'","Accept:application/json"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output,true);
    }

    public static function puturl($url,$data,$header = []){
        $dataJson       = json_encode($data);
        $headerArray    = array_merge($header, array("Content-type:application/json"));
        $ch = curl_init(); //初始化CURL句柄 
        curl_setopt($ch, CURLOPT_URL, $url); //设置请求的URL
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设为TRUE把curl_exec()结果转化为字串，而不是直接输出 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PUT"); //设置请求方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);//设置提交的字符串
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output,true);
    }

    public static function delurl($url,$data,$header = []){
        $dataJson       = json_encode($data);
        $headerArray    = array_merge($header, array("Content-type:application/json"));
        $ch = curl_init();
        curl_setopt ($ch,CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headerArray );
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");   
        curl_setopt($ch, CURLOPT_POSTFIELDS,$dataJson);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output,true);
    }

    public static function patchurl($url,$data,$header = []){
        $dataJson       = json_encode($data);
        $headerArray    = array_merge($header, array("Content-type:application/json"));
        $ch = curl_init();
        curl_setopt ($ch,CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PATCH");  
        curl_setopt($ch, CURLOPT_POSTFIELDS,$dataJson);     //20170611修改接口，用/id的方式传递，直接写在url中了
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }
    /**
     * POST请求，兼容swoole websocket
     */
    public static function post( $url,$data,$header=[])
    {
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
        return json_decode($output,true);        
    }	
}
