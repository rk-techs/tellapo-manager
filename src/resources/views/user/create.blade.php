@extends('layouts.app')

@section('title')
    社員 登録 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    社員 登録
                </div>
            </div>

            @include('user.includes.create-input-form')

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
            <a href="{{ route('users.index') }}" class="btn btn-secondary">キャンセル</a>
        </div>
    </div>

@endsection
