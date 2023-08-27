<div class="search-block">
    <form id="searchForm" method="GET" action="{{ route('companies.index') }}">
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
                        <label class="form-label u-mr-2">期間 :</label>
                        <select name="keyDate" class="input-field u-w-96 u-mr-2 ">
                            <option value="created_at" @selected(request('keyDate') == 'created_at')>登録日</option>
                            <option value="updated_at" @selected(request('keyDate') == 'updated_at')>更新日</option>
                        </select>
                        <input type="date" class="input-field u-w-136" name="startDate" value="{{ request('startDate') }}">
                        <span class="u-mx-1">~</span>
                        <input type="date" class="input-field u-w-136" name="endDate" value="{{ request('endDate') }}">
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
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">リセット</a>
            </div>
            {{-- Search Result --}}
            @if (!empty(request()->query()))
            <div class="search-info">検索結果 : {{ $count }} 件</div>
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
