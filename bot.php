<?php
    include 'currencyconverter.php'; $access_token='yucixks88GKG6RmFHC3qwK8EuEY1CLq3oXAkJCUTyLIMxN7bq17SIMDHTibPiKMF4vBXgOgU2f9rZMFTjWBc1JcFcC/RJXVdXERvkmPo0GTOBfUBESQ8o7KLHiRdvY83uVCVDuGEmbSaUEt/vBOdNAdB04t89/1O/w1cDnyilFU=';
    
    // Get POST body content
    $content = file_get_contents('php://input');
    // Parse JSON
    $events = json_decode($content, true);
    // Validate parsed JSON data
    if (!is_null($events['events'])) {
        // Loop through each event
        foreach ($events['events'] as $event) {
            // Reply only when message sent is in 'text' format
            if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
                
                
                
                // Get text sent
                $text = $event['message']['text'];
                
                // Get replyToken
                $replyToken = $event['replyToken'];
                
                // Reply hello
                if (strtolower($text) == 'hello'){
                    $userid = $event['source']['userId'];
                    $urluserreq = 'https://api.line.me/v2/bot/profile/'.$userid;
                    
                    $headers = array('Authorization: Bearer ' . $access_token);
                    
                    $userreq = curl_init($urluserreq);
                    curl_setopt($userreq, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($userreq, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($userreq, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($userreq, CURLOPT_FOLLOWLOCATION, 1);
                    $userjson = curl_exec($userreq);
                    curl_close($userreq);
                    
                    $user = json_decode($userjson, true);
                    $displayname = $user['displayName'];

                    // Build message to reply back
                    $messages = [
                        [
                            'type' => 'text',
                            'text' => $text." ".$displayname
                        ],
                        [
                            'type' => 'text',
                            'text' => "พิมพ์ 'exrate' เพื่อดูอัตราแลกเปลี่ยน"
                        ],
                        [
                            'type' => 'text',
                            'text' => "พิมพ์จำนวนเงินเยนตามด้วย 'jpyxy' เพื่อแปลงเป็นเงินบาท"
                        ]
                     //   ,[
                      //      'type' => 'text',
                     //       'text' => "พิมพ์ จำนวนเงินบาทตามด้วย'thb' เพื่อแปลงเป็นเงินเยน"
                     //   ]
                    
                    
                        ,[
                            'type'=> 'location',
                            'title'=> 'my location',
                            'address'=> '〒150-0002 東京都渋谷区渋谷２丁目２１−１',
                            'latitude'=> 35.65910807942215,
                            'longitude'=> 139.70372892916203
                        ]
                    ,array (
                            'type' => 'flex',
                            'altText' => 'Flex Message',
                            'contents' =>
                            array (
                                   'type' => 'carousel',
                                   'contents' =>
                                   array (
                                          0 =>
                                          array (
                                                 'type' => 'bubble',
                                                 'hero' =>
                                                 array (
                                                        'type' => 'image',
                                                        'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png',
                                                        'size' => 'full',
                                                        'aspectRatio' => '20:13',
                                                        'aspectMode' => 'cover',
                                                        ),
                                                 'body' =>
                                                 array (
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'spacing' => 'sm',
                                                        'contents' =>
                                                        array (
                                                               0 =>
                                                               array (
                                                                      'type' => 'text',
                                                                      'text' => 'Arm Chair, White',
                                                                      'size' => 'xl',
                                                                      'weight' => 'bold',
                                                                      'wrap' => true,
                                                                      ),
                                                               1 =>
                                                               array (
                                                                      'type' => 'box',
                                                                      'layout' => 'baseline',
                                                                      'contents' =>
                                                                      array (
                                                                             0 =>
                                                                             array (
                                                                                    'type' => 'text',
                                                                                    'text' => '$49',
                                                                                    'flex' => 0,
                                                                                    'size' => 'xl',
                                                                                    'weight' => 'bold',
                                                                                    'wrap' => true,
                                                                                    ),
                                                                             1 =>
                                                                             array (
                                                                                    'type' => 'text',
                                                                                    'text' => '.99',
                                                                                    'flex' => 0,
                                                                                    'size' => 'sm',
                                                                                    'weight' => 'bold',
                                                                                    'wrap' => true,
                                                                                    ),
                                                                             ),
                                                                      ),
                                                               ),
                                                        ),
                                                 'footer' =>
                                                 array (
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'spacing' => 'sm',
                                                        'contents' =>
                                                        array (
                                                               0 =>
                                                               array (
                                                                      'type' => 'button',
                                                                      'action' =>
                                                                      array (
                                                                             'type' => 'uri',
                                                                             'label' => 'Add to Cart',
                                                                             'uri' => 'https://linecorp.com',
                                                                             ),
                                                                      'style' => 'primary',
                                                                      ),
                                                               1 =>
                                                               array (
                                                                      'type' => 'button',
                                                                      'action' =>
                                                                      array (
                                                                             'type' => 'uri',
                                                                             'label' => 'Add to whishlist',
                                                                             'uri' => 'https://linecorp.com',
                                                                             ),
                                                                      ),
                                                               ),
                                                        ),
                                                 ),
                                          1 =>
                                          array (
                                                 'type' => 'bubble',
                                                 'hero' =>
                                                 array (
                                                        'type' => 'image',
                                                        'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png',
                                                        'size' => 'full',
                                                        'aspectRatio' => '20:13',
                                                        'aspectMode' => 'cover',
                                                        ),
                                                 'body' =>
                                                 array (
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'spacing' => 'sm',
                                                        'contents' =>
                                                        array (
                                                               0 =>
                                                               array (
                                                                      'type' => 'text',
                                                                      'text' => 'Metal Desk Lamp',
                                                                      'size' => 'xl',
                                                                      'weight' => 'bold',
                                                                      'wrap' => true,
                                                                      ),
                                                               1 =>
                                                               array (
                                                                      'type' => 'box',
                                                                      'layout' => 'baseline',
                                                                      'flex' => 1,
                                                                      'contents' =>
                                                                      array (
                                                                             0 =>
                                                                             array (
                                                                                    'type' => 'text',
                                                                                    'text' => '$11',
                                                                                    'flex' => 0,
                                                                                    'size' => 'xl',
                                                                                    'weight' => 'bold',
                                                                                    'wrap' => true,
                                                                                    ),
                                                                             1 =>
                                                                             array (
                                                                                    'type' => 'text',
                                                                                    'text' => '.99',
                                                                                    'flex' => 0,
                                                                                    'size' => 'sm',
                                                                                    'weight' => 'bold',
                                                                                    'wrap' => true,
                                                                                    ),
                                                                             ),
                                                                      ),
                                                               2 =>
                                                               array (
                                                                      'type' => 'text',
                                                                      'text' => 'Temporarily out of stock',
                                                                      'flex' => 0,
                                                                      'margin' => 'md',
                                                                      'size' => 'xxs',
                                                                      'color' => '#FF5551',
                                                                      'wrap' => true,
                                                                      ),
                                                               ),
                                                        ),
                                                 'footer' =>
                                                 array (
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'spacing' => 'sm',
                                                        'contents' =>
                                                        array (
                                                               0 =>
                                                               array (
                                                                      'type' => 'button',
                                                                      'action' =>
                                                                      array (
                                                                             'type' => 'uri',
                                                                             'label' => 'Add to Cart',
                                                                             'uri' => 'https://linecorp.com',
                                                                             ),
                                                                      'flex' => 2,
                                                                      'color' => '#AAAAAA',
                                                                      'style' => 'primary',
                                                                      ),
                                                               1 =>
                                                               array (
                                                                      'type' => 'button',
                                                                      'action' =>
                                                                      array (
                                                                             'type' => 'uri',
                                                                             'label' => 'Add to wish list',
                                                                             'uri' => 'https://linecorp.com',
                                                                             ),
                                                                      ),
                                                               ),
                                                        ),
                                                 ),
                                          2 =>
                                          array (
                                                 'type' => 'bubble',
                                                 'body' =>
                                                 array (
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'spacing' => 'sm',
                                                        'contents' =>
                                                        array (
                                                               0 =>
                                                               array (
                                                                      'type' => 'button',
                                                                      'action' =>
                                                                      array (
                                                                             'type' => 'uri',
                                                                             'label' => 'See more',
                                                                             'uri' => 'https://linecorp.com',
                                                                             ),
                                                                      'flex' => 1,
                                                                      'gravity' => 'center',
                                                                      ),
                                                               ),
                                                        ),
                                                 ),
                                          ),
                                   ),
                            )
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
   //                     ,[
   //                         'type'=> 'template',
   //                        'altText'=> 'this is a confirm template',
   //                         'template'=> [
   //                             'type'=> 'confirm',
   //                             'text'=> 'Are you sure?',
   //                             'actions'=> [
   //                                 [
   //                                     'type'=> 'message',
   //                                     'labe'=> 'Yes',
   //                                     'text'=> 'yes'
   //                                 ],
   //                                 [
   //                                     'type'=> 'message',
   //                                     'label'=> 'No',
   //                                     'text'=> 'no'
   //                                 ]
   //                             ]
   //                         ]
   //                     ]
                    
                    ];
                }
                elseif (strtolower($text) == 'lift'){
                    $messages = [[
                    'type' => 'text',
                    'text' => 'line://app/1561062941-EAZ9lbmZ'
                    ]];
                    
                }
				
				elseif (strtolower($text) == 'You'){
                    $messages = [[
                    'type' => 'text',
                    'text' => 'start search'
                    ]];
                    
                }
                // exchange JPY currency return
                elseif(preg_match('/(?P<digit>\d+(\.\d{1,})?)(\s?)(jpy)/', strtolower($text), $matches)){
                    $returncurrency = convertCurrency($matches['digit'], "JPY", "THB");
                    $messages = [[
                    'type' => 'text',
                    'text' => $matches[0]." = ".$returncurrency." THB"
                    ]];
                }
                
                // exchange THB currency return
                elseif(preg_match('/(?P<digit>\d+(\.\d{1,})?)(\s?)(thb)/', strtolower($text), $matches)){
                    $returncurrency = convertCurrency($matches['digit'], "THB", "JPY");
                    $messages = [[
                    'type' => 'text',
                    'text' => $matches[0]." = ".$returncurrency." JPY"
                    ]];
                }
                
                // exchangerate
                if (strtolower($text) == 'exrate'){
                    $messages = [[
                    'type' => 'text',
                    'text' => convertCurrency(1, "JPY", "THB")
                    ]];
                }
                
                
                
                
                
                // Make a POST Request to Messaging API to reply to sender
                $url = 'https://api.line.me/v2/bot/message/reply';
                $data = [
                'replyToken' => $replyToken,
                'messages' => $messages,
                ];
                $post = json_encode($data);
                $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
                
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);
                
                echo $result . "\r\n";
            }
        }
    }
    echo "OK";
