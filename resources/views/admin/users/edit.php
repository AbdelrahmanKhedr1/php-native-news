<?php view('admin.layouts.header', ['title' => trans('admin.edit')]);
$user = db_find('users', request('id'));
redirect_if(empty($user), aurl('users'));
?>

    <h2>{{ trans('admin.users') }} - {{ trans('admin.edit') }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('users') }}"> {{ trans('admin.users') }} </a>

    <form method="post" action="{{ aurl('users/edit?id='.$user['id']) }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <div class="row">
            <div class="form-group col-md-6 mb-2">
                <label for="name"> {{ trans('users.name') }} </label>
                <input type="text" name="name" class="form-control <?php echo !empty(get_error('name')) ? 'is-invalid' : ''; ?>"
                    value="{{ $user['name'] }}" placeholder="{{ trans('users.name') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="email"> {{ trans('users.email') }} </label>
                <input type="text" name="email" class="form-control <?php echo !empty(get_error('email')) ? 'is-invalid' : ''; ?>"
                    value="{{ $user['email'] }}" placeholder="{{ trans('users.email') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="password"> {{ trans('users.password') }} </label>
                <input type="password" name="password" class="form-control <?php echo !empty(get_error('password')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('users.password') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="mobile"> {{ trans('users.mobile') }} </label>
                <input type="text" name="mobile" class="form-control <?php echo !empty(get_error('mobile')) ? 'is-invalid' : ''; ?>"
                    value="{{ $user['mobile'] }}" placeholder="{{ trans('users.mobile') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="user_type"> {{ trans('users.user_type') }} </label>
                <select class="form-select <?php echo !empty(get_error('user_type')) ? 'is-invalid' : ''; ?>" name="user_type">
                    <option value="user" {{ $user['user_type'] == 'user'?'selected':'' }} >{{ trans('users.user') }}</option>
                    <option value="admin" {{ $user['user_type'] == 'admin'?'selected':'' }} >{{ trans('users.admin') }}</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ trans('admin.save') }}</button>
    </form>

<?php view('admin.layouts.footer') ?>