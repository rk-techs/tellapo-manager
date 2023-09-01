@extends('layouts.app')

@section('title')
    TEL履歴 編集 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container has-bottom">

            <div class="content-header-block">
                <div class="title title-h2">
                    TEL履歴 編集
                </div>
            </div>

            <div class="table-block u-mb-3">
                <table class="table">
                    <tbody class="table-body">
                        <tr class="table-row">
                            <th class="th-cell u-w-160">ID</th>
                            <td class="td-cell">{{ $call->company->id }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">企業名 / 事業所</th>
                            <td class="td-cell">{{ $call->company->name }} / {{ $call->company->branch_name }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">TEL</th>
                            <td class="td-cell">{{ $call->company->tel }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">住所</th>
                            <td class="td-cell">{{ $call->company->address }}</td>
                        </tr>
                        <tr class="table-row">
                            <th class="th-cell">ホームページ</th>
                            <td class="td-cell u-ellipsis">
                                <a href="{{ $call->company->website }}" target="_blank" rel="noopener noreferrer" class="link">{{ $call->company->website }}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <form id="inputForm" action="{{ route('calls.update', ['id' => $call->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="input-form-block">
                    <div class="input-form-body">

                    <div class="row">
                        <div class="col">
                            <label class="form-label u-mb-1">
                                <span class="label-text">結果</span>
                                <span class="required-label">必須</span>
                            </label>

                            @foreach ($resultLabels as $key => $label)
                                <div class="form-check">
                                    <input class="form-check-input @error('result'){{ 'is-invalid' }}@enderror"
                                           type="radio"
                                           name="result"
                                           id="result-{{ $key }}"
                                           value="{{ $key }}"
                                           @if(old('result', $call->result) == $key) checked @endif>
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
                                <span class="label-text">TEL相手情報</span>
                            </label>
                            <input type="text" id="receiverInfoInput" class="input-field @error('receiver_info'){{ 'is-invalid' }}@enderror"
                                name="receiver_info" value="{{ old('receiver_info', $call->receiver_info) }}" placeholder="例) 名前, (男性/女性), 営業担当...など">

                            @error('receiver_info')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="notesInput" class="form-label">
                                <span class="label-text">備考</span>
                            </label>
                            <textarea id="notesInput" rows="5" class="input-field @error('notes'){{ 'is-invalid' }}@enderror"
                                name="notes">{{ old('notes', $call->notes) }}</textarea>
                        </div>
                    </div>

                    </div>
                </div>
            </form>

        </div>
    </main>

    <div class="layout-operation">
        <div class="operation-container">
            <button id="inputFormTrigger" class="btn btn-update u-mr-3">
                @push('script')
                    <script src="{{ asset('js/input-form.js') }}"></script>
                @endpush
                更新
            </button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">キャンセル</a>
            <div class="delete-form-wrapper">
                <form id="deleteForm" action="{{ route('calls.destroy', ['id' => $call->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="deleteFormTrigger" class="icon-block">
                        @push('script')
                            <script src="{{ asset('js/delete-form.js') }}"></script>
                        @endpush
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
