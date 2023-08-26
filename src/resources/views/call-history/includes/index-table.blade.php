<div class="table-block is-scrollable">
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="th-cell col-fixed">操作</th>
                <th class="th-cell">ID</th>
                <th class="th-cell">担当者</th>
                <th class="th-cell">TEL日時</th>
                <th class="th-cell">結果</th>
                <th class="th-cell">企業</th>
                <th class="th-cell">受付情報</th>
                <th class="th-cell">メモ</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach($callHistories as $callHistory)
                <tr class="table-row is-hoverable">
                    <td class="td-cell col-fixed">
                        <a href="" class="btn-sm">編集</a>
                    </td>
                    <td class="td-cell">{{ $callHistory->id }}</td>
                    <td class="td-cell">{{ $callHistory->employee->user->name }}</td>
                    <td class="td-cell">{{ $callHistory->called_at }}</td>
                    <td class="td-cell">{{ $callHistory->result }}</td>
                    <td class="td-cell">{{ $callHistory->company->name }}</td>
                    <td class="td-cell">{{ $callHistory->receiver_info }}</td>
                    <td class="td-cell">{{ $callHistory->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
