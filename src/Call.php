<?php
namespace xjryanse\curl;

/**
 * 只调用请求，忽略返回值
 */
class Call
{
    public static function get( $url ,$header = [])
    {
        $opts = [];
        if (!empty($header)) {
            foreach ($header as $key => $value) {
                $header[$key] = $key . ':' . $value;
            }
            $opts[CURLOPT_HTTPHEADER] = array_values($header);
        }
        #
        $opts[CURLOPT_POST]           = 0;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        //关键，超时时间
        $opts[CURLOPT_TIMEOUT]        = 1;
        $opts[CURLOPT_FOLLOWLOCATION] = 1;
        $opts[CURLOPT_SSL_VERIFYPEER] = 0;
        $opts[CURLOPT_URL]            = $url;
        $ch                           = curl_init();
        curl_setopt_array($ch, $opts);
        curl_exec($ch);
        curl_close($ch);
    }
}
