<?php
/**
      ╔════════════════════╗
      ║ Coded by Soltanmsb ║
      ╚════════════════════╝
 
 * [+] Github : Github.com/Soltanmsb
 * [+] Telegram : T.me/Source_killer
 * [+] Date Update : 11/05/2023
 * [+] Version : [1.0]
 * [+] Size : 1.42 KB (1,458 bytes)
 */

header('Content-type: application/json;');

$text   = $_GET['text'];
if (isset($_GET['text']) && $_GET['text'] !== '')
{
    defane('API_KEY',""); //API_KEY
	$post_fields = array(
        "model" => "gpt-3.5-turbo",
        "messages" => array(
            array(
                "role" => "user",
                "content" => $text
            )
        ),
        "max_tokens" => 1000,
        "temperature" => 0
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer '.API_KEY
    ));
    
    $result = curl_exec($ch);
    curl_close($ch);
    
    $response = json_decode($result, true);
    $answer = $response['choices'][0]['message']['content'];
    echo json_encode(['result'=> true, 'results'=>['answer'=>"$answer"]], 448);
}

#---[ ⌜ Coded with love ☕❤ ⌟ ]---#
#---[  ⌜ Coded by Soltanmsb ⌟  ]---#

?>
