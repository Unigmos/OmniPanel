@extends('layouts.public')
@section('content')
    <div class="hero-container">
        <div class="hero-img padding-middle">
            <div class="padding-middle height-100 hero-info gap-20">
                <div class="hero-logo">
                    <img src="{{ asset('HeaderLogo.png') }}" alt="Logo">
                </div>
                <div class="auth-box">
                    @auth
                        <div class="white-box">
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        </div>
                    @else
                        <div class="white-box hover-shadow">
                            <a href="{{ route('register') }}">初めての方はこちら</a>
                        </div>
                        <a href="{{ route('login') }}" class="white-font underline small-font">登録済みの方はこちら</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="margin-middle">
        <div class="tool-title title-decoration">
            <h2>OmniPanelとは？</h2>
        </div>
        <div class="margin-top-middle margin-bottom-middle">
            <p>自分向けに作成した一元管理ツールです。<br>APIによる情報取得や統計情報等を確認できます。</p>
        </div>
        <div class="white-box hover-shadow">
            <a href="{{ route('tools.index') }}"><i class="las la-caret-right"></i>その他ログイン不要で使用可能なWebツール集はこちら</a>
        </div>
    </div>
@endsection