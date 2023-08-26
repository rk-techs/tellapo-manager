<div class="table-block is-scrollable">
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="th-cell col-fixed">操作</th>
                <th class="th-cell">TEL</th>
                <th class="th-cell">会社名</th>
                <th class="th-cell">事業所</th>
                <th class="th-cell">郵便番号</th>
                <th class="th-cell">住所</th>
                <th class="th-cell">電話番号</th>
                <th class="th-cell">FAX</th>
                <th class="th-cell">Email</th>
                <th class="th-cell">会社URL</th>
                <th class="th-cell">業種</th>
                <th class="th-cell">資本金</th>
                <th class="th-cell">従業員数</th>
                <th class="th-cell">年商</th>
                <th class="th-cell">上場</th>
                <th class="th-cell">設立日</th>
                <th class="th-cell">法人番号</th>
                <th class="th-cell">見込み度</th>
                <th class="th-cell">テレアポ担当</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach($companies as $company)
                <tr class="table-row is-hoverable">
                    <td class="td-cell col-fixed">
                        <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn-sm">編集</a>
                    </td>
                    <td class="td-cell">
                        <a href="{{ route('call-history.create', ['company' => $company]) }}" class="btn-sm">TEL</a>
                    </td>
                    <td class="td-cell u-min-w-160">{{ $company->name }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->branch_name }}</td>
                    <td class="td-cell u-min-w-120">{{ $company->postal_code }}</td>
                    <td class="td-cell is-ellipsis">{{ $company->address }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->tel }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->fax }}</td>
                    <td class="td-cell">{{ $company->email }}</td>
                    <td class="td-cell is-ellipsis">{{ $company->website }}</td>
                    <td class="td-cell">{{ $company->industry }}</td>
                    <td class="td-cell">{{ $company->capital }}</td>
                    <td class="td-cell u-min-w-80">{{ $company->number_of_employees }}</td>
                    <td class="td-cell">{{ $company->annual_sales }}</td>
                    <td class="td-cell">{{ $company->listed }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->established_at }}</td>
                    <td class="td-cell">{{ $company->corporate_number }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->prospect_rating }}</td>
                    <td class="td-cell u-min-w-160">{{ $company->employee?->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
