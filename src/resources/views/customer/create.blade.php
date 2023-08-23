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

            <div class="input-form-block">
                <div class="input-form-body row">

                    {{-- First Columm --}}
                    <div class="col-6">
                        <div class="row">
                            <div class="col-11">
                                <label for="nameInput" class="form-label">
                                    <span class="label-txt">顧客名</span>
                                    <span class="required-label">必須</span>
                                </label>
                                <input id="nameInput" type="text" class="input-field" name="name" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="nameKanaInput" class="form-label">
                                    <span class="label-txt">ヨミガナ</span>
                                </label>
                                <input id="nameKanaInput" type="text" class="input-field" name="name_kana" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="longNameInput" class="form-label">
                                    <span class="label-txt">正式名称</span>
                                </label>
                                <input id="longNameInput" type="text" class="input-field" name="long_name" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="addressInput" class="form-label">
                                    <span class="label-txt">住所</span>
                                </label>
                                <input id="addressInput" type="text" class="input-field" name="address" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="telInput" class="form-label">
                                    <span class="label-txt">TEL</span>
                                </label>
                                <input id="telInput" type="text" class="input-field" name="tel" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="faxInput" class="form-label">
                                    <span class="label-txt">FAX</span>
                                </label>
                                <input id="faxInput" type="text" class="input-field" name="fax" placeholder="">
                            </div>
                        </div>
                    </div>

                    {{-- Second Column --}}
                    <div class="col-6">
                        <div class="row">
                            <div class="col-11">
                                <label for="contactNameInput" class="form-label">
                                    <span class="label-txt">担当者氏名</span>
                                </label>
                                <input id="contactNameInput" type="text" class="input-field" name="contact_name" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="mobileInput" class="form-label">
                                    <span class="label-txt">携帯番号</span>
                                </label>
                                <input id="mobileInput" type="text" class="input-field" name="mobile" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="emailInput" class="form-label">
                                    <span class="label-txt">E-mail</span>
                                </label>
                                <input id="emailInput" type="text" class="input-field" name="email" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-11">
                                <label for="remarkInput" class="form-label">
                                    <span class="label-txt">備考</span>
                                </label>
                                <textarea id="remarkInput" rows="5" class="input-field" name="remarks"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- 明細 --}}
            <div class="input-form-block">
                <div class="input-form-table table-block is-scrollable">
                    <table class="table">
                        <thead class="table-header">
                            <tr class="table-row">

                                <th class="th-cell"></th>
                                <th class="th-cell"></th>
                                <th class="th-cell">No</th>
                                <th class="th-cell">入力1</th>
                                <th class="th-cell">入力2</th>
                                <th class="th-cell">入力3</th>
                                <th class="th-cell">入力4</th>
                                <th class="th-cell">入力5</th>
                                <th class="th-cell">入力6</th>
                                <th class="th-cell">入力7</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @for ($i = 0; $i < 10; $i++)
                            <tr class="table-row">

                                <td class="td-cell">
                                    copy
                                </td>

                                <td class="td-cell">
                                    delete
                                </td>

                                <td class="td-cell u-txt-center">
                                    {{ $i + 1 }}
                                </td>

                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>

                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>
                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>
                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>
                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>
                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>
                                <td class="td-cell u-min-w-240">
                                    <input type="text" class="input-field">
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

            <button class="btn btn-primary">行追加</button>

        </div>
    </main>

    <div class="layout-operation">
        <div class="operation-container">
            <button class="btn btn-store u-mr-3">保存</button>
            <button class="btn btn-secondary">キャンセル</button>
        </div>
    </div>

@endsection
