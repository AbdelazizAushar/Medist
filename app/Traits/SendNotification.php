<?php

namespace App\Traits;

use Exception;

trait SendNotification
{

    public function sendNotification($title, $body, $receiver)
    {
        $deviceToken = $receiver->device_token;
        try {
            $SERVER_API_KEY = env("FIREBASE_SERVER_KEY");
            $data = [
                "to" => $deviceToken,
                "notification" => [
                    "title" => $title,
                    "body" => $body,
                    "sound" => "default"
                ]
            ];

            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json'
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            // Close connection
            curl_close($ch);
        } catch (Exception) {
        }
    }
}
