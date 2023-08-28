@extends('layouts.app')

@section('title')
    HOME | {{ config('app.name') }}
@endsection

@section('content')
<main class="layout-home">
    <div class="home-container">

        <div class="content-header-block">
            <div class="title title-h1">
                Menu
            </div>
        </div>

        <div class="menu-list">
            @can('admin')
            <div class="menu-item">
                <a href="{{ route('users.index') }}" class="menu-link">社員</a>
            </div>
            @endcan
            <div class="menu-item">
                <a href="{{ route('company-groups.index') }}" class="menu-link">企業グループ一覧</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('companies.index') }}" class="menu-link">企業一覧</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('calls.index') }}" class="menu-link">TEL履歴</a>
            </div>
        </div>

    </div>
</main>

@include('components.footer')

@endsection
