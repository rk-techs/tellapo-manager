@extends('layouts.app')

@section('title')
    TEL履歴 登録 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    TEL履歴 登録
                </div>
            </div>

            <form id="inputForm" action="{{ route('calls.store', ['company' => $company]) }}" method="POST">
                @csrf
                <div class="input-form-block">
                    <div class="input-form-body">

                    <div class="row">
                        <div class="col">
                            <label for="resultInput" class="form-label">
                                <span class="label-txt">結果</span>
                                <span class="required-label">必須</span>
                            </label>

                            <select id="resultInput"
                                    class="form-select @error('result'){{ 'is-invalid' }}@enderror" name="result">
                                <option hidden value="">選択してください</option>
                                @foreach ($resultLabels as $key => $label)
                                    <option value="{{ $key }}"
                                            @if(old('result') == $key) selected @endif>
                                            {{ $label }}
                                    </option>
                                @endforeach
                            </select>

                            @error('result')
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
            <a href="{{ route('company.index') }}" class="btn btn-secondary">キャンセル</a>
        </div>
    </div>
@endsection
