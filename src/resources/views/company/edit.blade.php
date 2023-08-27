@extends('layouts.app')

@section('title')
    企業 編集 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    企業 編集
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-error">
                入力エラーが{{ $errors->count() }}件あります。
            </div>
            @endif

            <form id="inputForm" action="{{ route('companies.update', ['id' => $company->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="input-form-block">
                    <div class="input-form-body">

                        @include('company.components.form-input', [
                            'id' => 'nameInput',
                            'label' => '会社名',
                            'name' => 'name',
                            'model' => $company,
                            'required' => true,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'branchNameInput',
                            'label' => '事業所',
                            'name' => 'branch_name',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'postalCodeInput',
                            'label' => '郵便番号',
                            'name' => 'postal_code',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'addressInput',
                            'label' => '住所',
                            'name' => 'address',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'telInput',
                            'label' => '電話番号',
                            'name' => 'tel',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'faxInput',
                            'label' => 'FAX',
                            'name' => 'fax',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'emailInput',
                            'label' => 'Email',
                            'name' => 'email',
                            'model' => $company,
                            'type' => 'email',
                        ])
                        @include('company.components.form-input', [
                            'id' => 'websiteInput',
                            'label' => '会社URL',
                            'name' => 'website',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'industryInput',
                            'label' => '業種',
                            'name' => 'industry',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'capitalInput',
                            'label' => '資本金',
                            'name' => 'capital',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'numberOfEmployeesInput',
                            'label' => '従業員数',
                            'name' => 'number_of_employees',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'annualSalesInput',
                            'label' => '年商',
                            'name' => 'annual_sales',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'listedInput',
                            'label' => '上場しているかどうか',
                            'name' => 'listed',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'establishedAtInput',
                            'label' => '設立日',
                            'name' => 'established_at',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'corporateNumberInput',
                            'label' => '法人番号',
                            'name' => 'corporate_number',
                            'model' => $company,
                        ])
                        @include('company.components.form-input', [
                            'id' => 'prospectRatingInput',
                            'label' => '見込み度',
                            'name' => 'prospect_rating',
                            'model' => $company,
                        ])
                        @include('company.components.form-select', [
                            'label' => 'テレアポ担当者ID',
                            'name' => 'employee_id',
                            'id' => 'employeeIdInput',
                            'options' => $employees,
                            'displayAttribute' => 'user.name',
                            'model' => $company,
                            'isRequired' => false,
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
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">キャンセル</a>
            <div class="delete-form-wrapper">
                <form id="deleteForm" action="{{ route('companies.destroy', ['id' => $company->id]) }}" method="POST">
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
