@extends('layouts.app')

@section('title')
    企業リスト | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    企業リスト
                </div>
                <div>
                    <a href="{{ route('companies.create') }}" class="btn btn-create">企業登録</a>
                </div>
            </div>

            @include('company.includes.index-search')

            @include('components.alert', ['action' => session('action')])

            @include('company.includes.index-table')

            {{-- Pagination Result --}}
            {{ $companies->links('vendor.pagination.my-simple-default') }}

        </div>
    </main>
@endsection
