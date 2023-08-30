@extends('layouts.app')

@section('title')
    企業 情報 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            {{-- 企業情報 --}}
            <div class="content-header-block">
                <div class="title title-h2">
                    企業 情報
                </div>
                <div>
                    <a href="{{ route('companies.edit', ['id' => $company->id]) }}" class="link">編集する</a>
                </div>
            </div>
            <div class="table-block u-mb-3">
                <table class="table">
                    <tbody class="table-body">
                        <tr class="table-row">
                            <th class="th-cell u-w-160">ID</th>
                            <td class="td-cell">{{ $company->id }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">企業名 / 事業所</th>
                            <td class="td-cell">{{ $company->name }} / {{ $company->branch_name }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">TEL</th>
                            <td class="td-cell">{{ $company->tel }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">住所</th>
                            <td class="td-cell">{{ $company->address }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">ホームページ</th>
                            <td class="td-cell">
                                <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer" class="link">{{ $company->website }}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- TEL履歴 --}}
            <div class="content-header-block">
                <div class="title title-h2">
                   TEL履歴
                </div>
            </div>
            <div class="table-block is-scrollable">
                <table class="table">
                    <thead class="table-header">
                        <tr class="table-row">
                            <th class="th-cell">ID</th>
                            <th class="th-cell">担当者</th>
                            <th class="th-cell">TEL日時</th>
                            <th class="th-cell">結果</th>
                            <th class="th-cell">受付情報</th>
                            <th class="th-cell">メモ</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach($calls as $call)
                            <tr class="table-row is-hoverable">
                                <td class="td-cell">{{ $call->id }}</td>
                                <td class="td-cell">{{ $call->employee->user->name }}</td>
                                <td class="td-cell">{{ $call->formatted_called_at }}</td>
                                <td class="td-cell">{{ $call->result_label }}</td>
                                <td class="td-cell">{{ $call->receiver_info }}</td>
                                <td class="td-cell">{{ $call->notes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
