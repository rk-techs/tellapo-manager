@extends('layouts.app')

@section('title')
    取引先一覧 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    取引先一覧
                </div>
                <div>
                    <a href="{{ route('customer.create') }}" class="btn btn-create">取引先登録</a>
                </div>
            </div>

            <div class="search-block">
                @push('script')
                <script src="{{ asset('js/search.js') }}"></script>
                @endpush
                <div class="search-header">
                    <span>検索</span>
                    <span id="toggleExpandSymbol" class="material-symbols-outlined">unfold_less</span>
                </div>
                <div id="collapseSearchBody" class="search-body">
                    <div class="row">
                        <div class="col">
                            <div class="date-select">
                                <input type="date" class="input-field u-w-136">
                                <span class="u-mx-1">~</span>
                                <input type="date" class="input-field u-mr-2 u-w-136">
                                <select name="" id="" class="form-select u-w-96">
                                    <option value="">今日</option>
                                    <option selected value="">今月</option>
                                    <option value="">今年</option>
                                    <option value="">全期間</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <input type="text" class="input-field" placeholder="ID">
                        </div>
                        <div class="col-3">
                            <input type="text" class="input-field" placeholder="名前">
                        </div>
                        <div class="col-4">
                            <input type="text" class="input-field" placeholder="E-mail">
                        </div>
                        <div class="col">
                            <input type="text" class="input-field" placeholder="Tel">
                        </div>
                    </div>
                </div>
                <div id="collapseSearchFooter" class="search-footer">
                    <div class="btn-group u-mr-3">
                        <button class="btn btn-primary u-mr-3">検索開始</button>
                        <button class="btn btn-secondary">リセット</button>
                    </div>
                    <div class="search-info">検索結果 : XX 件</div>
                </div>
            </div>

            <div class="table-block is-scrollable">
                <table class="table">
                    <thead class="table-header">
                        <tr class="table-row">
                            <th class="th-cell">{{-- 操作 --}}</th>
                            <th class="th-cell">name</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">

                        <tr class="table-row">
                            <td class="td-cell u-max-w-16">
                                edit
                            </td>
                            <td class="td-cell">
                                名前
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
