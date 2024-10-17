<?php view('admin.layouts.header', ['title' => trans('admin.show')]);
$user = db_find('users', request('id'));
redirect_if(empty($user), aurl('users'));
?>

    <h2>{{ trans('admin.users') }} - {{ trans('admin.show') }} #{{ $user['name'] }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('users') }}"> {{ trans('admin.users') }} </a>
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="name"> {{ trans('users.name') }}: </label>
            {{ $user['name'] }}
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="email"> {{ trans('users.email') }}: </label>
            {{ $user['email'] }}
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="mobile"> {{ trans('users.mobile') }}: </label>
            {{ $user['mobile'] }}
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="user_type"> {{ trans('users.user_type') }}: </label>
            {{ trans('users.'.$user['user_type']) }}
        </div>
    </div>

<?php view('admin.layouts.footer') ?>