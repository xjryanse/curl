<?php
namespace xjryanse\curl;

class Fsock
{
    public static function post($url,$param=[]){
        $urlinfo = parse_url($url); 

        $host = $urlinfo['host']; 
        $path = $urlinfo['path']; 
        $query = isset($param)? http_build_query($param) : ''; 

        $port = 80; 
        $errno = 0; 
        $errstr = ''; 
        $timeout = 10; 

        $fp = fsockopen($host, $port, $errno, $errstr, $timeout); 

        $out = "POST ".$path." HTTP/1.1\r\n"; 
        $out .= "host:".$host."\r\n"; 
        $out .= "content-length:".strlen($query)."\r\n"; 
        $out .= "content-type:application/x-www-form-urlencoded\r\n"; 
        $out .= "connection:close\r\n\r\n"; 
        $out .= $query; 

        fputs($fp, $out); 
        fclose($fp); 
    }
}
