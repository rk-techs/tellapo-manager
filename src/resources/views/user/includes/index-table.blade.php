<div class="table-block is-scrollable">
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="th-cell col-fixed">{{-- 操作 --}}操作</th>
                <th class="th-cell u-txt-center">ID</th>
                <th class="th-cell">名前</th>
                <th class="th-cell">E-mail</th>
                <th class="th-cell">携帯番号</th>
                <th class="th-cell">入社日</th>
                <th class="th-cell">備考</th>
                <th class="th-cell">権限</th>
                <th class="th-cell">created_at</th>
                <th class="th-cell">updated_at</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach ($users as $user)
            <tr class="table-row is-hoverable">
                <td class="td-cell col-fixed">
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn-sm">編集</a>
                </td>
                <td class="td-cell u-max-w-80 u-txt-center">
                    {{ $user->id }}
                </td>
                <td class="td-cell u-min-w-160">
                    {{ $user->name }}
                </td>
                <td class="td-cell">
                    {{ $user->email }}
                </td>
                <td class="td-cell u-min-w-160">
                    {{ $user->employee->mobile_number }}
                </td>
                <td class="td-cell u-min-w-120">
                    {{ $user->employee->join_date }}
                </td>
                <td class="td-cell u-ellipsis">
                    {{ $user->employee->remark }}
                </td>
                <td class="td-cell u-min-w-96">
                    {{ $user->permission->display_name }}
                </td>
                <td class="td-cell u-min-w-200">
                    {{ $user->created_at }}
                </td>
                <td class="td-cell u-min-w-200">
                    {{ $user->updated_at }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
