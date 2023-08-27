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
            @foreach($calls as $call)
                <tr class="table-row is-hoverable">
                    <td class="td-cell col-fixed">
                        <a href="{{ route('calls.edit', ['id' => $call->id]) }}" class="btn-sm">編集</a>
                    </td>
                    <td class="td-cell">{{ $call->id }}</td>
                    <td class="td-cell">{{ $call->employee->user->name }}</td>
                    <td class="td-cell">{{ $call->formatted_called_at }}</td>
                    <td class="td-cell">{{ $call->result_label }}</td>
                    <td class="td-cell">{{ $call->company->name }}</td>
                    <td class="td-cell">{{ $call->receiver_info }}</td>
                    <td class="td-cell">{{ $call->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
