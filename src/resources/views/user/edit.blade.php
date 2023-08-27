@extends('layouts.app')

@section('title')
    社員 編集 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    社員 編集
                </div>
            </div>

            @include('user.includes.edit-input-form')

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
            <a href="{{ route('users.index') }}" class="btn btn-secondary">キャンセル</a>
            <div class="delete-form-wrapper">
                <form id="deleteForm" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
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
