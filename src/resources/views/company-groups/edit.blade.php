@extends('layouts.app')

@section('title')
    企業グループ 編集 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    企業グループ 編集
                </div>
            </div>

            @include('components.alert', ['action' => session('action')])

            <form id="inputForm" action="{{ route('company-groups.update', ['id' => $companyGroup->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="input-form-block">
                    <div class="input-form-body">

                        @include('company.components.form-input', [
                            'id' => 'nameInput',
                            'label' => 'グループ名',
                            'name' => 'name',
                            'model' => $companyGroup,
                            'required' => true,
                        ])

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
            <a href="{{ route('company-groups.index') }}" class="btn btn-secondary">キャンセル</a>
            <div class="delete-form-wrapper">
                <form id="deleteForm" action="{{ route('company-groups.destroy', ['id' => $companyGroup->id]) }}" method="POST">
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
