<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSwitchbotCredential extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $casts = [
        'switchbot_token' => 'encrypted',
        'switchbot_secret' => 'encrypted',
        'switchbot_hub_id' => 'encrypted',
        'switchbot_curtain_id' => 'encrypted',
    ];

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ユーザに紐づくSwitchBotのToken,Secretを取得
    public function getCredentialsByUserId($id) {
        return $this->where('user_id', $id)->first();
    }

    // 認証情報の保存
    public function saveCredentials($id, $request) {
        $switchbotSettings = $this->firstOrNew(['user_id' => $id]);
        $switchbotSettings->switchbot_token = $request->switchbot_token;
        $switchbotSettings->switchbot_secret = $request->switchbot_secret;
        $switchbotSettings->switchbot_hub_id = $request->switchbot_hub_id;
        $switchbotSettings->switchbot_curtain_id = $request->switchbot_curtain_id;
        $switchbotSettings->save();
    }
}
