@extends('layouts.public')
@section('content')
    <div class="margin-middle">
        <div class="tool-title bold-font">
            <h2>トイレットペーパーコスパ計算比較ツール</h2>
        </div>
        <div class="white-box">
            <div class="input-box">
                <label for="price">価格</label>
                <input type="number" name="price" id="price" placeholder="例: 500" />
            </div>
            <div class="input-box">
                <label for="rolls">ロール数</label>
                <input type="number" name="rolls" id="rolls" placeholder="例: 12" />
            </div>
            <div class="input-box">
                <label for="length">長さ(m)</label>
                <input type="number" name="length" id="length" placeholder="例: 50" />
            </div>
            <div class="input-box">
                <label for="label">ラベル(任意)</label>
                <input type="text" name="label" id="label" placeholder="例: ○○ロール" />
            </div>
            <button id="add-button">追加</button>
        </div>

        <table class="result-table margin-top-middle margin-bottom-middle text-center" id="result">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ラベル</th>
                    <th>価格</th>
                    <th>ロール数</th>
                    <th>長さ</th>
                    <th>結果</th>
                    <th>　</th>
                </tr>
            </thead>
            <tbody id="result-content">
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/tools/toilet_paper.js')
@endpush