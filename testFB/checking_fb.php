<?php 

$access_token = 'EAAC3S0IoN28BAMz80LJzOO9rZACYbLFR4KUBOLZAbFEZCZBVy38oGZCVeZADLBZBTRAQpVRu88mtDhHvGidcdeo1joFhAlrjDO4maZCu1hy9ni1896glH9PKkYVGYggoT5XY0xgqqH768x2ouzOrKYv1ZA3mfGvpLjy6RiQeQicIZCJwZDZD';
//API Url
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;

/*
//Initiate cURL.
$ch = curl_init($url);
$sender = '1467171803337049';
$sender1 = '1278064302246604'; //ashok
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender1.'", "id":"'.$sender.'"
    },
    "message":{
        "text":"hiiiiPal3"
    }
}';

//Encode the array into JSON.
echo $jsonDataEncoded = $jsonData;
*/

$text1 = 'AA';
$text = 'RR';
  $ch = curl_init('https://graph.facebook.com/v2.6');

 $jsonDatsssa = '{  
   "access_token":"EAABrHZCjLKy8BAJFTbVy1vQ5ZAn8v3KNjTk68fJZC8u96RYVf37PCZCpNYcRIIjpVw45P8QaPDjnYCnY72O85WhiODF8OtMa6i1fnP3QHRBOIXJeIkbQZBJJ4ixy1vpr441GvuSJ4iVdWs1TDJJvW8R61iB5wXNyl3PW7pupSzwZDZD",
   "Facebook-API-Version":"v2.6",
   "batch":[  
      [  
         {  
            "method":"POST",
            "headers":[{ 
                  "name":"Content-Type",
                  "value":"application/json"
               }],
               "relative_url":"me/messages?access_token=EAABrHZCjLKy8BAJFTbVy1vQ5ZAn8v3KNjTk68fJZC8u96RYVf37PCZCpNYcRIIjpVw45P8QaPDjnYCnY72O85WhiODF8OtMa6i1fnP3QHRBOIXJeIkbQZBJJ4ixy1vpr441GvuSJ4iVdWs1TDJJvW8R61iB5wXNyl3PW7pupSzwZDZD",
               "body":"recipient[id]=1467171803337049&
               message[text]":[  
                  {  
                     "message":{  
                        "attachment":{  
                           "type":"template",
                           "payload":{  
                              "template_type":"generic",
                              "elements":[  
                                 {  
                                    "title":"checkbatch",
                                    "item_url":"https:\/\/www.facebook.com\/",
                                    "image_url":"https:\/\/dev-chatbot.tapright.com\/uploads\/card_ynovivQyic71f07SB7mXmxqv3m-sFwRaXLhJbyOjtps_E3R8WBuuggn0PW2gZOv0dFr-ou2oihjiizFJ3U-3Z0s_B9Uvs4pkL1w3fofxCNvbbrJAhxkOhH52fPgf2T9opjs_kDcek1mvINRvIiXHbhENdO5pVx9LKAgRYsoLIQqkDFQ.jpg",
                                    "subtitle":"subbatch",
                                    "buttons":[  
                                       {  
                                          "type":"postback",
                                          "payload":"{\"block_id\":\"9ec9cff47f430ca8c49ac2daf70561b4\"}",
                                          "title":"test"
                                       }
                                    ]
                                 }
                              ]
                           }
                        }
                     }
                  }
               ]
            }
         }
      ]
   ]
}';


 $jsonData1 = '{  
   "access_token":"EAABrHZCjLKy8BAJFTbVy1vQ5ZAn8v3KNjTk68fJZC8u96RYVf37PCZCpNYcRIIjpVw45P8QaPDjnYCnY72O85WhiODF8OtMa6i1fnP3QHRBOIXJeIkbQZBJJ4ixy1vpr441GvuSJ4iVdWs1TDJJvW8R61iB5wXNyl3PW7pupSzwZDZD",
   "Facebook-API-Version":"v2.6",
   "batch":[  
      {  
         "method":"POST",
         "headers":{  
            "name":"Content-Type",
            "value":"application/json"
         },
         "relative_url":"me/messages?access_token=EAABrHZCjLKy8BAJFTbVy1vQ5ZAn8v3KNjTk68fJZC8u96RYVf37PCZCpNYcRIIjpVw45P8QaPDjnYCnY72O85WhiODF8OtMa6i1fnP3QHRBOIXJeIkbQZBJJ4ixy1vpr441GvuSJ4iVdWs1TDJJvW8R61iB5wXNyl3PW7pupSzwZDZD",
         "body":"recipient[id]=1467171803337049",
         "message[text]"={  
            "message":{  
               "attachment":{  
                  "type":"template",
                  "payload":{  
                     "template_type":"generic",
                     "elements":[  
                        {  
                           "title":"checkbatch",
                           "item_url":"https:\/\/www.facebook.com\/",
                           "image_url":"https:\/\/dev-chatbot.tapright.com\/uploads\/card_ynovivQyic71f07SB7mXmxqv3m-sFwRaXLhJbyOjtps_E3R8WBuuggn0PW2gZOv0dFr-ou2oihjiizFJ3U-3Z0s_B9Uvs4pkL1w3fofxCNvbbrJAhxkOhH52fPgf2T9opjs_kDcek1mvINRvIiXHbhENdO5pVx9LKAgRYsoLIQqkDFQ.jpg",
                           "subtitle":"subbatch",
                           "buttons":[  
                              {  
                                 "type":"postback",
                                 "payload":"{\"block_id\":\"9ec9cff47f430ca8c49ac2daf70561b4\"}",
                                 "title":"test"
                              }
                           ]
                        }
                     ]
                  }
               }
            }
         }
      }
   ]
}';

$textgg='{  
            "message":{  
               "attachment":{  
                  "type":"template",
                  "payload":{  
                     "template_type":"generic",
                     "elements":[  
                        {  
                           "title":"checkbatch",
                           "item_url":"https:\/\/www.facebook.com\/",
                           "image_url":"https:\/\/dev-chatbot.tapright.com\/uploads\/card_ynovivQyic71f07SB7mXmxqv3m-sFwRaXLhJbyOjtps_E3R8WBuuggn0PW2gZOv0dFr-ou2oihjiizFJ3U-3Z0s_B9Uvs4pkL1w3fofxCNvbbrJAhxkOhH52fPgf2T9opjs_kDcek1mvINRvIiXHbhENdO5pVx9LKAgRYsoLIQqkDFQ.jpg",
                           "subtitle":"subbatch",
                           "buttons":[  
                              {  
                                 "type":"postback",
                                 "payload":"{\"block_id\":\"9ec9cff47f430ca8c49ac2daf70561b4\"}",
                                 "title":"test"
                              }
                           ]
                        }
                     ]
                  }
               }
            }
         }';
$jsonData = '{
   "access_token":"EAABrHZCjLKy8BAJFTbVy1vQ5ZAn8v3KNjTk68fJZC8u96RYVf37PCZCpNYcRIIjpVw45P8QaPDjnYCnY72O85WhiODF8OtMa6i1fnP3QHRBOIXJeIkbQZBJJ4ixy1vpr441GvuSJ4iVdWs1TDJJvW8R61iB5wXNyl3PW7pupSzwZDZD",
   "Facebook-API-Version":"v2.6",
   "batch":[  
      
         {  
            "method":"POST",
            "headers":[{  
               "name":"Content-Type",
               "value":"application\/json"
            }],
            "relative_url":"me/messages?access_token=EAABrHZCjLKy8BAJFTbVy1vQ5ZAn8v3KNjTk68fJZC8u96RYVf37PCZCpNYcRIIjpVw45P8QaPDjnYCnY72O85WhiODF8OtMa6i1fnP3QHRBOIXJeIkbQZBJJ4ixy1vpr441GvuSJ4iVdWs1TDJJvW8R61iB5wXNyl3PW7pupSzwZDZD",
            "body":["recipient"=>[id=>1467171803337049],"message"=>[text=>'.$textgg.']]
         }
      
   ]
}';
echo $jsonData;
$jsonDatassss = '{
"access_token": "' .$access_token .'",
"Facebook-API-Version":"v2.6",
"batch" :[
  {
    "method":"POST",
    "headers":[{"name": "Content-Type","value": "application/json"}],
    "relative_url":"me/messages?access_token='.$access_token.'",
    "body":  "recipient[id]=1467171803337049&message[text]='.$text.'"
  }
]
}';
 //   echo urlencode($JSONData1);
  //  echo $jsonData;exit;
    /*curl setting to send a json post data*/ 
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  
        $result = curl_exec($ch); // user will get the message

   if(curl_error($ch))
{
    echo 'error:' . curl_error($ch);
}

 print_r($result);exit;
?>