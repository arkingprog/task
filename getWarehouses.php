<?php
$city = $_GET['city'];
$body = '{
"modelName": "AddressGeneral",
"calledMethod": "getWarehouses",
"methodProperties": {
    "CityName": "'.$city.'"
    },
"apiKey": "1031b96114bd332255817adec661bbf7"
}';
if ($curl = curl_init()) {
    curl_setopt($curl, CURLOPT_URL, 'http://api.novaposhta.ua/v2.0/json/AddressGeneral/getWarehouses');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    curl_setopt($curl, CURLOPT_ENCODING, "UTF-8");
    $out = curl_exec($curl);
    curl_close($curl);
    echo json_encode($out);

}
