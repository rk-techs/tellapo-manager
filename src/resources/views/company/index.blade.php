@extends('layouts.app')

@section('title')
    企業リスト | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    企業リスト
                </div>
                <div>
                    <a href="{{ route('company.create') }}" class="btn btn-create">企業登録</a>
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

            @include('components.alert', ['action' => session('action')])

            <div class="table-block is-scrollable">
                <table class="table">
                    <thead class="table-header">
                        <tr class="table-row">
                            <th class="th-cell">操作</th>
                            <th class="th-cell">会社名</th>
                            <th class="th-cell">郵便番号</th>
                            <th class="th-cell">住所</th>
                            <th class="th-cell">電話番号</th>
                            <th class="th-cell">FAX</th>
                            <th class="th-cell">Email</th>
                            <th class="th-cell">会社URL</th>
                            <th class="th-cell">業種</th>
                            <th class="th-cell">資本金</th>
                            <th class="th-cell">従業員数</th>
                            <th class="th-cell">年商</th>
                            <th class="th-cell">上場しているか</th>
                            <th class="th-cell">設立日</th>
                            <th class="th-cell">法人番号</th>
                            <th class="th-cell">見込み度</th>
                            <th class="th-cell">テレアポ担当者ID</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach($companies as $company)
                            <tr class="table-row">
                                <td class="td-cell u-max-w-16">edit</td>
                                <td class="td-cell">{{ $company->name }}</td>
                                <td class="td-cell">{{ $company->postal_code }}</td>
                                <td class="td-cell">{{ $company->address }}</td>
                                <td class="td-cell">{{ $company->tel }}</td>
                                <td class="td-cell">{{ $company->fax }}</td>
                                <td class="td-cell">{{ $company->email }}</td>
                                <td class="td-cell">{{ $company->website }}</td>
                                <td class="td-cell">{{ $company->industry }}</td>
                                <td class="td-cell">{{ $company->capital }}</td>
                                <td class="td-cell">{{ $company->number_of_employees }}</td>
                                <td class="td-cell">{{ $company->annual_sales }}</td>
                                <td class="td-cell">{{ $company->listed }}</td>
                                <td class="td-cell">{{ $company->established_at }}</td>
                                <td class="td-cell">{{ $company->corporate_number }}</td>
                                <td class="td-cell">{{ $company->prospect_rating }}</td>
                                <td class="td-cell">{{ $company->employee_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </main>
@endsection
