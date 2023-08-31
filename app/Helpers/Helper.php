<?php

function sendSms($sms){
    $curl = curl_init();
    $data_string = json_encode($sms);
    $ch = curl_init('https://www.bulksmsplans.com/api/send_sms');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($ch);
    $res = json_decode($result, true);
    //return ($res['code'] == 200) ? 200 : $res['code'];
    return $res;
}

?>