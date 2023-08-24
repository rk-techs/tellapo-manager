@extends('layouts.app')

@section('title')
    取引先 登録 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    取引先 登録
                </div>
            </div>

            <form id="inputForm" action="{{ route('company.store') }}" method="POST">
            @csrf
            <div class="input-form-block">
                <div class="input-form-body">

                    @include('company.components.input', ['id' => 'nameInput', 'label' => '会社名', 'name' => 'name', 'required' => true])
                    @include('company.components.input', ['id' => 'postalCodeInput', 'label' => '郵便番号', 'name' => 'postal_code'])
                    @include('company.components.input', ['id' => 'addressInput', 'label' => '住所', 'name' => 'address'])
                    @include('company.components.input', ['id' => 'telInput', 'label' => '電話番号', 'name' => 'tel'])
                    @include('company.components.input', ['id' => 'faxInput', 'label' => 'FAX', 'name' => 'fax'])
                    @include('company.components.input', ['id' => 'emailInput', 'label' => 'Email', 'name' => 'email', 'type' => 'email'])
                    @include('company.components.input', ['id' => 'websiteInput', 'label' => '会社URL', 'name' => 'website'])
                    @include('company.components.input', ['id' => 'industryInput', 'label' => '業種', 'name' => 'industry'])
                    @include('company.components.input', ['id' => 'capitalInput', 'label' => '資本金', 'name' => 'capital'])
                    @include('company.components.input', ['id' => 'numberOfEmployeesInput', 'label' => '従業員数', 'name' => 'number_of_employees'])
                    @include('company.components.input', ['id' => 'annualSalesInput', 'label' => '年商', 'name' => 'annual_sales'])
                    @include('company.components.input', ['id' => 'listedInput', 'label' => '上場しているかどうか', 'name' => 'listed'])
                    @include('company.components.input', ['id' => 'establishedAtInput', 'label' => '設立日', 'name' => 'established_at'])
                    @include('company.components.input', ['id' => 'corporateNumberInput', 'label' => '法人番号', 'name' => 'corporate_number'])
                    @include('company.components.input', ['id' => 'prospectRatingInput', 'label' => '見込み度', 'name' => 'prospect_rating'])
                    @include('company.components.input', ['id' => 'employeeIdInput', 'label' => 'テレアポ担当者ID', 'name' => 'employee_id'])

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
