<header class="layout-header">
    <div class="header-container">
        <div class="header-logo">
            <a class="header-logo-link" href="/">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="header-logo-img">
            </a>
        </div>
        <div class="header-title">
            <a href="{{ route('home') }}" class="title-link">{{ config('app.name') }} </a>
        </div>
        <div class="header-nav">
            <div class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">HOME</a>
            </div>
            @can('admin')
            <div class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">社員</a>
            </div>
            @endcan
            <div class="nav-item {{ Request::is('company-groups*') ? 'active' : '' }}">
                <a href="{{ route('company-groups.index') }}" class="nav-link">企業グループ</a>
            </div>
            <div class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
                <a href="{{ route('companies.index') }}" class="nav-link">企業一覧</a>
            </div>
            <div class="nav-item {{ Request::is('calls*') ? 'active' : '' }}">
                <a href="{{ route('calls.index') }}" class="nav-link">TEL履歴</a>
            </div>
        </div>
        <div id="userInfoModalTrigger" class="user-info">
            <div class="icon-block">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
                <span class="icon-label">
                    {{ auth()->user()->name }}
                </span>
            </div>
            <div id="userInfoModal" class="user-info-modal">
                <div class="user-info-modal-header">
                    <p>{{ auth()->user()->name }}</p>
                    <p><small>{{ auth()->user()->email }}</small></p>
                </div>
                <div class="user-info-modal-body">
                    {{-- <div class="profile-menu">マイページ</div> --}}
                </div>
                <div class="user-info-modal-footer">
                    <div id="logoutFormTrigger" class="logout-form-wrapper">
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                            ログアウト
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="headerMobileMenuTrigger" class="header-mobile-menu">
            <span id="headerMobileMenuSymbol" class="material-symbols-outlined">menu</span>
        </div>
    </div>
    @include('components.mask', ['maskId' => 'headerMask'])
</header>

{{-- Collapse Menu on Mobile --}}
<div class="layout-collapse-header">
    <div id="headerCollapseNav" class="header-collapse-container">
        <div class="header-nav">
            <div class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">HOME</a>
            </div>
            @can('admin')
            <div class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">社員</a></div>
            @endcan
            <div class="nav-item"><a href="{{ route('company-groups.index') }}" class="nav-link">企業グループ</a></div>
            <div class="nav-item"><a href="{{ route('companies.index') }}" class="nav-link">企業一覧</a></div>
            <div class="nav-item"><a href="{{ route('calls.index') }}" class="nav-link">TEL履歴</a></div>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ asset('js/header.js') }}"></script>
@endpush
