@extends('layouts.app')

@section('title')
    社員一覧 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    社員一覧
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-create">社員登録</a>
                </div>
            </div>

            @include('user.includes.index-search')

            @include('components.alert', ['action' => session('action')])

            @include('user.includes.index-table')

            {{-- Pagination Result --}}
            {{ $users->links('vendor.pagination.my-simple-default') }}

        </div>
    </main>
@endsection
