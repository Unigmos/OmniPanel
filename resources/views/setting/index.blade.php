@extends('layouts.app')
@section('content')
    <div class="title">
        <h1>Setting</h1>
    </div>
    <div class="versatility-box">
        <div class="versatility-title">
            <h2>SwitchBot</h2>
        </div>
        <div class="versatility-sub-box">
            <div class="versatility-sub-title">
                <h3>Token</h3>
            </div>
            <div class="versatility-sub-text">
                <p>{{ $credentials['switchbot_token'] ?? '' }}</p>
            </div>
        </div>
        <div class="versatility-sub-box">
            <div class="versatility-sub-title">
                <h3>Secret</h3>
            </div>
            <div class="versatility-sub-text">
                <p>{{ $credentials['switchbot_secret'] ?? '' }}</p>
            </div>
        </div>
        <div class="versatility-title">
            <h2>DeviceId</h2>
        </div>
        <div class="versatility-sub-box">
            <div class="versatility-sub-title">
                <h3>Hub</h3>
            </div>
            <div class="versatility-sub-text">
                <p>{{ $credentials['switchbot_hub_id'] ?? '' }}</p>
            </div>
        </div>
        <div class="versatility-sub-box">
            <div class="versatility-sub-title">
                <h3>Curtain</h3>
            </div>
            <div class="versatility-sub-text">
                <p>{{ $credentials['switchbot_curtain_id'] ?? '' }}</p>
            </div>
        </div>
    </div>
    <a class="nav-link" href="{{ route('setting.edit') }}">Edit</a>
@endsection