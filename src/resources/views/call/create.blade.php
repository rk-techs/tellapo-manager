@extends('layouts.app')

@section('title')
    TEL履歴 登録 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container has-bottom">

            <div class="content-header-block">
                <div class="title title-h2">
                    TEL履歴 登録
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
                            <td class="td-cell is-ellipsis">
                                <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer" class="link">{{ $company->website }}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <form id="inputForm" action="{{ route('calls.store', ['company' => $company]) }}" method="POST">
                @csrf
                <div class="input-form-block">
                    <div class="input-form-body">

                    <div class="row">
                        <div class="col">
                            <label class="form-label u-mb-1">
                                <span class="label-txt">結果</span>
                                <span class="required-label">必須</span>
                            </label>

                            @foreach ($resultLabels as $key => $label)
                                <div class="form-check">
                                    <input class="form-check-input @error('result'){{ 'is-invalid' }}@enderror"
                                           type="radio"
                                           name="result"
                                           id="result-{{ $key }}"
                                           value="{{ $key }}"
                                           @if(old('result') == $key) checked @endif>
                                    <label class="form-check-label" for="result-{{ $key }}">
                                        {{ $label }}
                                    </label>
                                </div>
                            @endforeach

                            @error('result')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="receiverInfoInput" class="form-label">
                                <span class="label-txt">TEL相手情報</span>
                            </label>
                            <input type="text" id="receiverInfoInput" class="input-field @error('receiver_info'){{ 'is-invalid' }}@enderror"
                                name="receiver_info" value="{{ old('receiver_info') }}" placeholder="例) 名前, (男性/女性), 営業担当...など">

                            @error('receiver_info')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="notesInput" class="form-label">
                                <span class="label-txt">備考</span>
                            </label>
                            <textarea id="notesInput" rows="5" class="input-field @error('notes'){{ 'is-invalid' }}@enderror"
                                name="notes">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    </div>
                </div>
            </form>

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
                        @foreach($company->calls as $call)
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

    <div class="layout-operation">
        <div class="operation-container">
            <button id="inputFormTrigger" class="btn btn-store u-mr-3">
                @push('script')
                    <script src="{{ asset('js/input-form.js') }}"></script>
                @endpush
                保存
            </button>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">キャンセル</a>
        </div>
    </div>
@endsection
