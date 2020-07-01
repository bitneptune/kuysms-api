<?php

//Send SMS with GET Method
$api_key = 'Ql8bifTmetZtWhBa9SfXTf9vRsO6XoG1wDCfTd8kOTJAjVE0ak';
$id_user = '501';
$sms_type = 'REG';
$number = '62857123456789';
$sms = 'Just Testing';

$sms = urlencode($sms);
$url = "https://kuysms.me/api/index.php?token=$api_key&id_user=$id_user&menu=SEND_SMS&type=$sms_type&number=$number&text=$sms";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$output = curl_exec($ch);
curl_close($ch);

$output = json_decode($output, true);

$result = $output['result'];
$note = $output['note'];

if ($result==1) {
	$status_txt = 'Success';
}
else {
	$status_txt = 'Failed';
}

echo "$status_txt";
echo "<br>";
echo "$note";