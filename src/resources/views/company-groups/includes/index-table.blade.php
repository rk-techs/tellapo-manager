<div class="table-block is-scrollable">
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="th-cell col-fixed">操作</th>
                <th class="th-cell">ID</th>
                <th class="th-cell">グループ名</th>
                <th class="th-cell">登録日</th>
                <th class="th-cell">更新日</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach ($companyGroups as $companyGroup)
                <tr class="table-row is-hoverable">
                    <td class="td-cell col-fixed">
                        {{-- <a href="{{ route('company-groups.edit', ['id' => $companyGroup->id]) }}" class="btn-sm">編集</a> --}}
                    </td>
                    <td class="td-cell">{{ $companyGroup->id }}</td>
                    <td class="td-cell">{{ $companyGroup->name }}</td>
                    <td class="td-cell u-min-w-160">{{ $companyGroup->created_at }}</td>
                    <td class="td-cell u-min-w-160">{{ $companyGroup->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
