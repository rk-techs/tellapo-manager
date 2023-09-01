@extends('layouts.app')

@section('title')
    企業グループ | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    企業グループ
                </div>
                <div>
                    <a href="{{ route('company-groups.create') }}" class="btn btn-create">グループ登録</a>
                </div>
            </div>

            @include('components.alert', ['action' => session('action')])

            @include('company-groups.includes.table')

        </div>
    </main>
@endsection
