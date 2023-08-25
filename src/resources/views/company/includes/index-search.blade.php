<div class="search-block">
    <form id="searchForm" method="GET" action="{{ route('company.index') }}">
        @push('script')
            <script src="{{ asset('js/search.js') }}"></script>
        @endpush
        <div class="search-header">
            <span>検索</span>
            <span id="toggleExpandSymbol" class="material-symbols-outlined">unfold_less</span>
        </div>
        <div id="collapseSearchBody" class="search-body">
            <div class="row">
                <div class="col">
                    <div class="date-select">
                        <input type="date" class="input-field u-w-136">
                        <span class="u-mx-1">~</span>
                        <input type="date" class="input-field u-mr-2 u-w-136">
                        <select name="" id="" class="form-select u-w-96">
                            <option value="">今日</option>
                            <option selected value="">今月</option>
                            <option value="">今年</option>
                            <option value="">全期間</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <input type="number" class="input-field" placeholder="ID" value="{{ request('id') }}" name="id">
                </div>
                <div class="col-11">
                    <input type="text" class="input-field" placeholder="キーワード" value="{{ request('keyword') }}" name="keyword">
                </div>
            </div>
        </div>
        <div id="collapseSearchFooter" class="search-footer">
            <div class="btn-group u-mr-3">
                <button class="btn btn-primary u-mr-3">検索開始</button>
                <a href="{{ route('company.index') }}" class="btn btn-secondary">リセット</a>
            </div>
            <div class="search-info">検索結果 : XX 件</div>
        </div>
    </form>
</div>
