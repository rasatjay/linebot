<?php
    $access_token = 'zEMCE0cpeSr8NEJcfequz2UcB7c4BiSFDTnWNLgqeruxaYTAD4c/hasboyKDaTzYY5S4j+wCBcaX3ZSdH7iXaJ/oRvUePz8TKqfNglFP7dgACZBlAxGr/HTK/4ZUiDBqGiiLOAdhxI7paJCyv7mCLwdB04t89/1O/w1cDnyilFU=';
    
    $url = 'https://api.line.me/v1/oauth/verify';
    
    $headers = array('Authorization: Bearer ' . $access_token);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    
    echo $result;
