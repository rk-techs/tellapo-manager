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
                <th class="th-cell">事業所</th>
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
                    <td class="td-cell u-min-w-120">{{ $call->formatted_called_at }}</td>
                    <td class="td-cell u-min-w-120">
                        <span class="status-label-{{ $call->result_class_name }}">
                            {{ $call->result_label }}
                        </span>
                    </td>
                    <td class="td-cell u-min-w-160">{{ $call->company->name }}</td>
                    <td class="td-cell u-min-w-120">{{ $call->company->branch_name }}</td>
                    <td class="td-cell">{{ $call->receiver_info }}</td>
                    <td class="td-cell">{{ $call->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
