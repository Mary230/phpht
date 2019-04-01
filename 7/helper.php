<?php
function checkPing($ip){
    $ll = exec( "ping -c 4 ".$ip, $output, $retVar);
    if($retVar == 0):
        $percent = 100-(int)preg_match( '/[0-9.]+%/m',array_pop($output));
        echo "<b>$ip</b><br>Процент успешных запросов: $percent %";
        return true;
    else :
        echo "The IP address, $ip, is dead";
        return false;
    endif;
}
function checkTraceroute($ip){
    $ll = exec( "traceroute ".$ip, $output, $retVar);
    if($retVar == 0):
        echo "Список адресов на пути: <br> ";
        foreach ($output as $item):
            $item = explode(" ", trim($item));
            if (isset($item[2]) && $item[2] != "*")
            echo $item[2]."<br>";
        endforeach;
        return true;
    else :
        echo "The IP address, $ip, is dead";
        return false;
    endif;
}
function getIP($url){
    if(strpos($url, 'http') !== FALSE):
        $url_array = parse_url($url);
        $url = $url_array['host'];
    endif;
    $ip = gethostbyname($url);
    if($ip == $url) $ip = FALSE;
    return $ip;
}

