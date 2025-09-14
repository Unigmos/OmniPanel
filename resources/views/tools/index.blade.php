@extends('layouts.public')
@section('content')
    <div class="margin-middle">
        <div class="tool-title bold-font">
            <h2>Webツール集</h2>
        </div>
        <div class="tool-grid">
            <div class="tool-card">
                <a href="{{ route('tools.toilet_paper.index') }}" class="card-items">
                    <div class="card-icon">
                        <i class="las la-toilet-paper"></i>
                    </div>
                    <div class="card-info">
                        <h3>トイレットペーパー計算</h3>
                        <p>コスパを比較できる便利ツール</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection