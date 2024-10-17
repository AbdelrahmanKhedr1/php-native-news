<?php view('admin.layouts.header', ['title' => trans('admin.users')]);
$users = db_paginate("users", "", 10);
?>

    <h2>{{ trans('admin.users') }}</h2>
    <a class="btn btn-bd-primary" href="{{ aurl('users/create') }}"><i class="fa-solid fa-plus"></i> {{ trans('admin.create') }} </a>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('users.name') }}</th>
                    <th scope="col">{{ trans('users.email') }}</th>
                    <th scope="col">{{ trans('users.mobile') }}</th>
                    <th scope="col">{{ trans('users.user_type') }}</th>
                    <th scope="col">{{ trans('admin.action') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($users['query'])): ?>
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['mobile'] }}</td>
                        <td>{{ trans('users.'.$user['user_type']) }}</td>

                        <td>
                            <a href="{{ aurl('users/show?id='.$user['id']) }}"> <i class="fa-regular fa-eye"></i> </a>
                            <a href="{{ aurl('users/edit?id='.$user['id']) }}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            {{ delete_record(aurl('users/delete?id='.$user['id'])) }}
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    {{ $users['render'] }}

<?php view('admin.layouts.footer') ?>