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
            <div class="menu-item">
                <a href="{{ route('user.index') }}" class="menu-link">社員</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('company.index') }}" class="menu-link">企業リスト</a>
            </div>
        </div>

    </div>
</main>

@include('components.footer')

@endsection
