@extends('layouts.app')

@section('title')
    TEL履歴 | {{ config('app.name') }}
@endsection

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="content-header-block">
                <div class="title title-h2">
                    TEL履歴
                </div>
            </div>

            @include('call.includes.index-search')

            @include('components.alert', ['action' => session('action')])

            @include('call.includes.index-table')

        </div>
    </main>
@endsection
