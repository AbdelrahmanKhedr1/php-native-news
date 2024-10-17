<?php view('admin.layouts.header', ['title' => trans('admin.users')]); ?>
    <h2>{{ trans('admin.users') }} - {{ trans('admin.create') }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('users') }}"> {{ trans('admin.users') }} </a>

    <form method="post" action="{{ aurl('users/create') }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <div class="row">
            <div class="form-group col-md-6 mb-2">
                <label for="name"> {{ trans('users.name') }} </label>
                <input type="text" name="name"
                       class="form-control <?php echo !empty(get_error('name')) ? 'is-invalid' : ''; ?>"
                       value="{{ old('name') }}" placeholder="{{ trans('users.name') }}"/>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="email"> {{ trans('users.email') }} </label>
                <input type="text" name="email"
                       class="form-control <?php echo !empty(get_error('email')) ? 'is-invalid' : ''; ?>"
                       value="{{ old('email') }}" placeholder="{{ trans('users.email') }}"/>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="password"> {{ trans('users.password') }} </label>
                <input type="password" name="password"
                       class="form-control <?php echo !empty(get_error('password')) ? 'is-invalid' : ''; ?>"
                       placeholder="{{ trans('users.password') }}"/>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="mobile"> {{ trans('users.mobile') }} </label>
                <input type="text" name="mobile"
                       class="form-control <?php echo !empty(get_error('mobile')) ? 'is-invalid' : ''; ?>"
                       value="{{ old('mobile') }}" placeholder="{{ trans('users.mobile') }}"/>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="user_type"> {{ trans('users.user_type') }} </label>
                <select class="form-select <?php echo !empty(get_error('user_type')) ? 'is-invalid' : ''; ?>"
                        name="user_type">
                    <option disabled selected>{{ trans('admin.choose') }}</option>
                    <option value="user" {{ old(
                    'user_type') == 'user'?'selected':'' }} >{{ trans('users.user') }}</option>
                    <option value="admin" {{ old(
                    'user_type') == 'admin'?'selected':'' }} >{{ trans('users.admin') }}</option>
                </select>
            </div>

        </div>
        <button type="submit" class="btn btn-success">{{ trans('admin.create') }}</button>
    </form>
<?php view('admin.layouts.footer') ?>