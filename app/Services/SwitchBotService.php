<?php

namespace App\Services;

use App\Const\ApiEndpoint;
use App\Models\UserSwitchbotCredential;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class SwitchBotService
{
    protected $userSwitchbotCredential;

    public function __construct(
        UserSwitchbotCredential $userSwitchbotCredential
    ) {
        $this->userSwitchbotCredential = $userSwitchbotCredential;
    }

    public function checkRegistration($credentials) {
        return array(
            'switchbot_hub_id' => !is_null($credentials['switchbot_hub_id']),
            'switchbot_curtain_id' => !is_null($credentials['switchbot_curtain_id']),
        );
    }

    // デバイスのステータスを取得する
    public function getStatus($deviceId) {
        $user = Auth::user();

        $credentials = $this->userSwitchbotCredential->getCredentialsByUserId($user->id);
        if (isset($credentials)) {
            $token = $credentials['switchbot_token'];
            $secret = $credentials['switchbot_secret'];

            $t = (string) round(microtime(true) * 1000);
            $nonce = uniqid();
            $stringToSign = $token . $t . $nonce;
            $sign = base64_encode(hash_hmac('sha256', $stringToSign, $secret, true));

            $headers = [
                'Authorization' => $token,
                'Content-Type'  => 'application/json',
                'charset'       => 'utf8',
                't'             => $t,
                'sign'          => $sign,
                'nonce'         => $nonce,
            ];

            $response = Http::withHeaders($headers)
                ->get(sprintf(ApiEndpoint::SWITCHBOT_STATUS, $deviceId));

            $body = $response->json('body');

            return $body;
        } else {
            return null;
        }      
    }
}