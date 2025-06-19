<?php

namespace App\Http\Controllers;

use App\Models\UserSwitchbotCredential;
use App\Services\SwitchBotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    protected $switchBotService;
    protected $userSwitchbotCredential;

    public function __construct(
        SwitchBotService $switchBotService,
        UserSwitchbotCredential $userSwitchbotCredential,
    ) {
        $this->switchBotService = $switchBotService;
        $this->userSwitchbotCredential = $userSwitchbotCredential;
    }

    public function index()
    {
        $user = Auth::user();
        // SwitchBot系の取得処理
        $credentials = $this->userSwitchbotCredential->getCredentialsByUserId($user->id);
        // 登録チェック
        $registrationArray = $this->switchBotService->checkRegistration($credentials);

        // DeviceIdが登録されている場合のみHubのステータス取得
        if ($registrationArray['switchbot_hub_id']) {
            $hubStatus = $this->switchBotService->getStatus($credentials['switchbot_hub_id']);
        } else {
            $hubStatus = [];
        }
        // DeviceIdが登録されている場合のみカーテンのステータス取得
        if ($registrationArray['switchbot_curtain_id']) {
            $curtainStatus = $this->switchBotService->getStatus($credentials['switchbot_curtain_id']);
        } else {
            $curtainStatus = [];
        }

        return view('dashboard', compact(
            'registrationArray',
            'hubStatus',
            'curtainStatus',
            )
        );
    }
}
