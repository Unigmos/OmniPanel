<?php

namespace App\Http\Controllers;

use App\Models\UserSwitchbotCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    protected $userSwitchbotCredential;

    public function __construct(
        UserSwitchbotCredential $userSwitchbotCredential
    ) {
        $this->userSwitchbotCredential = $userSwitchbotCredential;
    }

    public function index()
    {
        $user = Auth::user();
        $credentials = $this->userSwitchbotCredential->getCredentialsByUserId($user->id);

        return view('setting.index', compact('credentials'));
    }

    public function edit()
    {
        $user = Auth::user();
        $credentials = $this->userSwitchbotCredential->getCredentialsByUserId($user->id);

        return view('setting.edit', compact('credentials'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $result = $this->userSwitchbotCredential->saveCredentials($user->id, $request);

        return redirect()->route('setting.index')->with('success', '送信しました！');
    }
}
