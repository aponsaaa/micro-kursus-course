<?php

use Illuminate\Support\Facades\Http;

// use Carbon\Carbon;

// Mendapatkan ID user dengan ID Tertentu
function getUser($userId)
{
    $url = env('SERVICE_USER_URL') . 'users/' . $userId;

    try {
        $response = Http::timeout(200)->get($url);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();
        return $data;
    } catch (\Throwable $th) {
        return [
            'status' => 'error',
            'http_code' => '500',
            'message' => 'Service user unavailable',
        ];
    }
}

// Mendapatkan ID ID tertentu [5,6,7]
function getUserByIds($userIds = [])
{
    $url = env('SERVICE_USER_URL') . 'users/';

    try {
        if (count($userIds) === 0) {
            return [
                'status' => 'error',
                'http_code' => '200',
                'data' => [],
            ];
        }

        $response = Http::timeout(10)->get($url, ['user_id' => $userIds]);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();
        return $data;
    } catch (\Throwable $th) {
        return [
            'status' => 'error',
            'http_code' => '500',
            'message' => 'Service user unavailable',
        ];
    }
}

// Order Premium Kelas
function postOrder($params)
{
    $url = env('SERVICE_ORDER_PAYMENT_URL') . 'api/orders/';

    try {
        $response = Http::post($url, $params);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();
        return $data;
    } catch (\Throwable $th) {
        return [
            'status' => 'error',
            'http_code' => '500',
            'message' => 'Service order payment unavailable',
        ];
    }
}
