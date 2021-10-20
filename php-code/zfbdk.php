<?php

//获得ip
//ip是否来自共享互联网
$ip_address = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
} //ip是否来自代理
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} //ip是否来自远程地址
else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}


function baidu($ip_address)
{    //qmsg酱发送
    $url = "https://api.map.baidu.com/location/ip?ak=tbO6Qv61uwHlNmV5FqHeMlzvWnL6Ce00&ip=$ip_address"; //HTTPS协议
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // 对认证证书来源的检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // 获取的信息以文件流的形式返回
    curl_exec($ch);
    return $ch;
}

?>
<h1>
    <?php
    //发送
    $str = baidu($ip_address);
    // echo json_encode($str);
    echo $str;
    ?>
</h1>

