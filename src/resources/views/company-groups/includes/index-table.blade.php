<div class="table-block is-scrollable">
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="th-cell col-fixed">操作</th>
                <th class="th-cell">ID</th>
                <th class="th-cell">グループ名</th>
                <th class="th-cell">企業数</th>
                <th class="th-cell">登録日</th>
                <th class="th-cell">更新日</th>
            </tr>
        </thead>
        <tbody class="table-body">
            {{-- 未分類 --}}
            <tr class="table-row is-hoverable">
                <td class="td-cell col-fixed">-</td>
                <td class="td-cell">-</td>
                <td class="td-cell u-min-w-160">未分類</td>
                <td class="td-cell">{{ $unassignedCompaniesCount }}件</td>
                <td class="td-cell u-min-w-160">-</td>
                <td class="td-cell u-min-w-160">-</td>
            </tr>

            {{-- companyGroups --}}
            @foreach ($companyGroups as $companyGroup)
                <tr class="table-row is-hoverable">
                    <td class="td-cell col-fixed">
                        {{-- <a href="{{ route('company-groups.edit', ['id' => $companyGroup->id]) }}" class="btn-sm">編集</a> --}}
                    </td>
                    <td class="td-cell">{{ $companyGroup->id }}</td>
                    <td class="td-cell u-min-w-160">{{ $companyGroup->name }}</td>
                    <td class="td-cell">{{ $companyGroup->companies_count }}件</td>
                    <td class="td-cell u-min-w-160">{{ $companyGroup->created_at }}</td>
                    <td class="td-cell u-min-w-160">{{ $companyGroup->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
