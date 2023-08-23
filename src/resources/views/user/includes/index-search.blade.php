<div class="search-block">
<form id="searchForm" method="GET" action="{{ route('user.index') }}">
    @push('script')
    <script src="{{ asset('js/search.js') }}"></script>
    @endpush
    <div class="search-header">
        <span>検索</span>
        <span id="toggleExpandSymbol" class="material-symbols-outlined">unfold_less</span>
    </div>
    <div id="collapseSearchBody" class="search-body">
        {{-- Validation feedback --}}
        @if ($errors->any())
        <div class="alert alert-error">
            検索できない値が含まれています。
        </div>
        @endif

        <div class="row">
            <div class="col-1">
                <input type="number" class="input-field" placeholder="ID" value="{{ request('id') }}" name="id">
            </div>
            <div class="col">
                <input type="text" class="input-field" placeholder="キーワード（名前 or E-mail）" value="{{ request('keyword') }}" name="keyword">
            </div>
        </div>
    </div>
    <div id="collapseSearchFooter" class="search-footer">
        <div class="btn-group u-mr-3">
            <button class="btn btn-primary u-mr-3">検索開始</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">リセット</a>
        </div>
        {{-- Search Result --}}
        @if (!empty(request()->query()))
        <div class="search-info u-fade-in">検索結果 : {{ $count }} 件</div>
        @endif
        {{-- Sort --}}
        <div class="sort-field">
            <label class="form-label u-mr-2">並び順:</label>
            <select id="sortFieldSelect" name="sortField" class="form-select u-w-80">
                <option value="id" @selected(request('sortField') == 'id')>ID</option>
                <option value="name" @selected(request('sortField') == 'name')>名前</option>
                <option value="created_at" @selected(request('sortField') == 'created_at')>登録日</option>
            </select>
            <select id="sortTypeSelect" name="sortType" class="form-select u-w-80">
                <option value="asc" @selected(request('sortType') == 'asc')>昇順</option>
                <option value="desc" @selected(request('sortType') == 'desc')>降順</option>
            </select>
        </div>
    </div>
</form>
</div>
