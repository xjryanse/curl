<?php
namespace xjryanse\curl;

/**
 * 流输出
 */
class Buffer extends Base
{
    /**
     * get流
     * @param type $url
     * @param type $header
     * @return type
     */
    public static function get( $url,$header=[] ) 
    {
        return self::curlGet($url, $header);
    }
    /**
     * post流
     * @param type $url
     * @param type $data
     * @param type $header
     * @return type
     */
    public static function post( $url,$data,$header=[])
    {
        return self::curlPost($url, $data, $header);
    }
}
