<?php
$url = "https://sf2lb.nekki.com/balance";
$queryString = $_SERVER['QUERY_STRING'] ?? '';
if ($queryString !== '') {
    $url .= '?' . $queryString;
}
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if ($response === false) {
    http_response_code(502);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'error' => curl_error($ch)
    ]);
    exit;
}
header('Content-Type: application/json; charset=utf-8');
echo $response;