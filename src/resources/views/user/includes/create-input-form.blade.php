<form id="inputForm" action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="input-form-block">
        <div class="input-form-body">

            <div class="row">
                <div class="col">
                    <label for="userNameInput" class="form-label">
                        <span class="label-txt">名前</span>
                        <span class="required-label">必須</span>
                    </label>
                    <input id="userNameInput" type="text"
                        class="input-field @error('name'){{ 'is-invalid' }}@enderror" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="userEmailInput" class="form-label">
                        <span class="label-txt">E-mail</span>
                        <span class="required-label">必須</span>
                    </label>
                    <input id="userEmailInput" type="email"
                        class="input-field @error('email'){{ 'is-invalid' }}@enderror" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="userPasswordInput" class="form-label">
                        <span class="label-txt">Password</span>
                        <span class="required-label">必須</span>
                    </label>
                    <input id="userPasswordInput" type="password"
                        class="input-field @error('password'){{ 'is-invalid' }}@enderror" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="userPasswordConfirmationInput" class="form-label">
                        <span class="label-txt">Password 再確認</span>
                        <span class="required-label">必須</span>
                    </label>
                    <input id="userPasswordConfirmationInput" type="password" class="input-field"
                        name="password_confirmation" autocomplete="new-password" placeholder="確認">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="userPermissionIdInput" class="form-label">
                        <span class="label-txt">権限</span>
                        <span class="required-label">必須</span>
                    </label>
                    <select id="userPermissionIdInput"
                        class="form-select @error('permission_id'){{ 'is-invalid' }}@enderror" name="permission_id">
                        <option hidden value="">選択してください</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}" @selected(old('permission_id') == $permission->id)>
                                {{ $permission->display_name }}</option>
                        @endforeach
                    </select>
                    @error('permission_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="employeeMobileNumberInput" class="form-label">
                        <span class="label-txt">携帯番号</span>
                    </label>
                    <input id="employeeMobileNumberInput" type="text"
                        class="input-field @error('mobile_number'){{ 'is-invalid' }}@enderror" name="mobile_number"
                        value="{{ old('mobile_number') }}">
                    @error('mobile_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="employeeRemarkInput" class="form-label">
                        <span class="label-txt">備考</span>
                    </label>
                    <textarea id="employeeRemarkInput" rows="5" class="input-field @error('remark'){{ 'is-invalid' }}@enderror"
                        name="remark">{{ old('remark') }}</textarea>
                </div>
            </div>

        </div>
    </div>
</form>
