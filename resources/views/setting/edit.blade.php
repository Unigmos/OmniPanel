@extends('layouts.app')
@section('content')
    <div class="title">
        <h1>Setting</h1>
    </div>
    <form action="{{ route('setting.update') }}" method="POST">
        @csrf
        <div class="versatility-box">
            <div class="versatility-title">
                <h2>SwitchBot</h2>
            </div>
            <div class="versatility-sub-box">
                <div class="versatility-sub-title">
                    <h3>Token</h3>
                </div>
                <input class="versatility-sub-input" name="switchbot_token" type="text" value="{{ $credentials['switchbot_token'] ?? '' }}">
            </div>
            <div class="versatility-sub-box">
                <div class="versatility-sub-title">
                    <h3>Secret</h3>
                </div>
                <input class="versatility-sub-input" name="switchbot_secret" type="text" value="{{ $credentials['switchbot_secret'] ?? '' }}">
            </div>
            <div class="versatility-title">
                <h2>DeviceId</h2>
            </div>
            <div class="versatility-sub-box">
                <div class="versatility-sub-title">
                    <h3>Hub</h3>
                </div>
                <input class="versatility-sub-input" name="switchbot_hub_id" type="text" value="{{ $credentials['switchbot_hub_id'] ?? '' }}">
            </div>
            <div class="versatility-sub-box">
                <div class="versatility-sub-title">
                    <h3>Curtain</h3>
                </div>
                <input class="versatility-sub-input" name="switchbot_curtain_id" type="text" value="{{ $credentials['switchbot_curtain_id'] ?? '' }}">
            </div>
        </div>
        <button type="submit">submit</button>
    </form>
@endsection