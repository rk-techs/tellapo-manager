<div class="search-block">
    <form id="searchForm" method="GET" action="{{ route('calls.index') }}">
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
                <div class="col-2">
                    <select name="employee_id" class="form-select">
                        <option value="">テレアポ担当を選択</option>
                        @foreach($employeeSelectors as $employee)
                            <option value="{{ $employee->id }}"
                                @if(request()->get('employee_id') == $employee->id) selected @endif>
                                {{ $employee->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <select class="form-select" name="result">
                        <option value="">TEL結果を選択</option>
                        @foreach ($resultLabels as $key => $label)
                        <option value="{{ $key }}" @if(request()->get('result') == $key) selected @endif>
                            {{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="input-field" placeholder="キーワード（メモ）" value="{{ request('keyword') }}" name="keyword">
                </div>
            </div>
        </div>
        <div id="collapseSearchFooter" class="search-footer">
            <div class="btn-group u-mr-3">
                <button class="btn btn-primary u-mr-3">検索開始</button>
                <a href="{{ route('calls.index') }}" class="btn btn-secondary">リセット</a>
            </div>
            {{-- Search Result --}}
            @if (!empty(request()->query()))
            <div class="search-info">検索結果 : {{ $count }} 件</div>
            @endif
            {{-- Sort --}}
            <div class="sort-field">
                <label class="form-label u-mr-2">並び順:</label>
                <select id="sortFieldSelect" name="sortField" class="form-select u-w-80">
                    <option value="called_at" @selected(request('sortField') == 'called_at')>TEL日時</option>
                </select>
                <select id="sortTypeSelect" name="sortType" class="form-select u-w-80">
                    <option value="desc" @selected(request('sortType') == 'desc')>降順</option>
                    <option value="asc" @selected(request('sortType') == 'asc')>昇順</option>
                </select>
            </div>
        </div>
    </form>
</div>
