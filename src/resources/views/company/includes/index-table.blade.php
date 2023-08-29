<div class="table-block is-scrollable">
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="th-cell col-fixed">TEL</th>
                <th class="th-cell">TEL担当</th>
                <th class="th-cell">TEL履歴</th>
                <th class="th-cell">最終TEL結果</th>
                <th class="th-cell">最終TEL日時</th>
                <th class="th-cell">ID</th>
                <th class="th-cell">会社名</th>
                <th class="th-cell">事業所</th>
                <th class="th-cell">電話番号</th>
                <th class="th-cell">郵便番号</th>
                <th class="th-cell">住所</th>
                <th class="th-cell">Email</th>
                <th class="th-cell">会社URL</th>
                <th class="th-cell">業種</th>
                <th class="th-cell">資本金</th>
                <th class="th-cell">従業員数</th>
                <th class="th-cell">年商</th>
                <th class="th-cell">上場</th>
                <th class="th-cell">設立日</th>
                <th class="th-cell">法人番号</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach ($companies as $company)
                <tr class="table-row is-hoverable">
                    <td class="td-cell col-fixed">
                        <a href="{{ route('calls.create', ['company' => $company]) }}" class="btn-sm">TEL</a>
                    </td>
                    <td class="td-cell u-min-w-104">{{ $company->employee?->user->name }}</td>
                    <td class="td-cell u-min-w-120">
                        @if ($company->calls_count === 0)
                            <span class="status-label-untouched">未対応</span>
                        @else
                        <a href="{{ route('calls.showByCompany', ['company' => $company]) }}" class="link">
                            {{ $company->calls_count }} 回
                        </a>
                        @endif
                    </td>
                    <td class="td-cell u-min-w-160">
                        <span class="status-label-{{ $company->latestCall ? $company->latestCall->result_class_name : '' }}">
                            {{ $company->latestCall ? $company->latestCall->result_label : '-' }}
                        </span>
                    </td>
                    <td class="td-cell u-min-w-160">{{ $company->latestCall ? $company->latestCall->formatted_called_at : '-' }}</td>
                    <td class="td-cell">{{ $company->id }}</td>
                    <td class="td-cell u-min-w-160">
                        <a href="{{ route('companies.show', ['id' => $company->id]) }}" class="link">{{ $company->name }}</a>
                    </td>
                    <td class="td-cell u-min-w-120">{{ $company->branch_name }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->tel }}</td>
                    <td class="td-cell u-min-w-104">{{ $company->postal_code }}</td>
                    <td class="td-cell is-ellipsis">{{ $company->address }}</td>
                    <td class="td-cell">{{ $company->email }}</td>
                    <td class="td-cell is-ellipsis">
                        <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer" class="link">{{ $company->website }}</a>
                    </td>
                    <td class="td-cell">{{ $company->industry }}</td>
                    <td class="td-cell">{{ $company->capital }}</td>
                    <td class="td-cell u-min-w-80">{{ $company->number_of_employees }}</td>
                    <td class="td-cell">{{ $company->annual_sales }}</td>
                    <td class="td-cell">{{ $company->listed }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->established_at }}</td>
                    <td class="td-cell">{{ $company->corporate_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
