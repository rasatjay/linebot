<?php
    $access_token = 'DpICdM98ehR6iyWyqU5TU7d221hOj9crj+PbilJw5WWkURzdd9Tx5ioDMxnxij9n4vBXgOgU2f9rZMFTjWBc1JcFcC/RJXVdXERvkmPo0GRIRHhYPVQbdNc+U3UwCJuWU0rcePyVyyCNP/r2vTKzMwdB04t89/1O/w1cDnyilFU=';
    
    $url = 'https://api.line.me/v1/oauth/verify';
    
    $headers = array('Authorization: Bearer ' . $access_token);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    
    echo $result;
