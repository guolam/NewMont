<?php

namespace App\Services;

use GuzzleHttp\Client;

class LineNotify
{
    private $client;
    private $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = 'YOUR_LINE_NOTIFY_ACCESS_TOKEN';
    }

    public function send($message)
    {
        $response = $this->client->post('https://notify-api.line.me/api/notify', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'message' => $message,
            ],
        ]);

        return $response->getStatusCode() === 200;
    }
}
