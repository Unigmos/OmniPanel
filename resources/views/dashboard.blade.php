@extends('layouts.app')
@section('content')
    <div class="title">
        <h1>Dashboard</h1>
    </div>

    <div class="flex-container">
        @if(!empty($hubStatus))
            <div class="versatility-box flex-hub">
                <div class="versatility-title">
                    <h2>{{ $hubStatus['deviceType'] ?? null }}</h2>
                </div>

                <div class="flex-box space-between">
                    {{-- 温度 --}}
                    <x-pie-chart
                        class="flex-item"
                        :value="$hubStatus['temperature']"
                        :max="100"
                        unit="℃"
                        title="温度"
                        color-class="purple"
                        stroke-class="stroke-purple"
                        fill-class="fill-purple"
                    />

                    {{-- 湿度 --}}
                    <x-pie-chart
                        class="flex-item"
                        :value="$hubStatus['humidity']"
                        :max="100"
                        unit="%"
                        title="湿度"
                        color-class="yellow"
                        stroke-class="stroke-yellow"
                        fill-class="fill-yellow"
                    />

                    {{-- 明るさ --}}
                    <x-pie-chart
                        class="flex-item"
                        :value="$hubStatus['lightLevel']"
                        :max="20"
                        unit=""
                        title="明るさ"
                        color-class="orange"
                        stroke-class="stroke-orange"
                        fill-class="fill-orange"
                    />
                </div>
            </div>
        @elseif ($registrationArray['switchbot_hub_id'] && empty($hubStatus))
            <div class="versatility-box">
                <p>SwitchBot(Hub)からデータを取得できませんでした。</p>
            </div>
        @endif

        @if (!empty($curtainStatus))
            <div class="versatility-box flex-curtain">
                <div class="versatility-title">
                    <h2>カーテン</h2>
                </div>
                <div class="flex-box space-between">
                    <div class="versatility-sub-box">
                        <div class="versatility-sub-title">
                            <h3>ステータス</h3>
                        </div>
                        <div class="versatility-sub-text text-center margin-left-middle">
                            <p>{{ $curtainStatus['slidePosition'] == 0 ? '全開' : '全閉' }}</p>
                        </div>
                    </div>
                    {{-- バッテリー --}}
                    <x-pie-chart
                        class="flex-item"
                        :value="$curtainStatus['battery']"
                        :max="100"
                        unit="%"
                        title="バッテリー"
                        color-class="yellow"
                        stroke-class="stroke-yellow"
                        fill-class="fill-yellow"
                    />
                </div>
            </div>
        @elseif ($registrationArray['switchbot_curtain_id'] && empty($curtainStatus))
            <div class="versatility-box">
                <p>SwitchBot(カーテン)からデータを取得できませんでした。</p>
            </div>
        @endif
    </div>
@endsection