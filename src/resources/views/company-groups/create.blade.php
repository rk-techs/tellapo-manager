@extends('layouts.app')

@section('title')
    企業グループ 登録 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container has-bottom">

            <div class="content-header-block">
                <div class="title title-h2">
                    企業グループ 登録
                </div>
            </div>

            <form id="inputForm" action="{{ route('company-groups.store') }}" method="POST">
                @csrf
                <div class="input-form-block">
                    <div class="input-form-body">

                        @include('company.components.form-input', [
                            'id' => 'nameInput',
                            'label' => 'グループ名',
                            'name' => 'name',
                            'required' => true,
                        ])

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
            <a href="{{ route('company-groups.index') }}" class="btn btn-secondary">キャンセル</a>
        </div>
    </div>
@endsection
