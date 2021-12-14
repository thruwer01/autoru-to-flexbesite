<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header("Content-Type: application/json; charset=utf-8");

$URL = "http://storage.yandexcloud.net/site-feeds/46480.xml";


function make_request($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $xml = new SimpleXMLElement($response);

    return $xml;
}

function create_json($xml)
{
    $cars = [];
    foreach ($xml->cars->car as $car) {
        $car_model = [
            "car_name" => (string) $car->mark_id . ' ' . (string) $car->folder_id,
            "car_year" => (int) $car->year,
            "car_run" => (int) $car->run,
            "car_main_img" => (string) $car->images->image[0],
            "car_price" => number_format((int)$car->price, 0, "", " "),
            "car_url" => (string)$car->url
        ];
        array_push($cars, $car_model);
    }
    return json_encode($cars);
}

$xml = make_request($URL);


echo create_json($xml);
