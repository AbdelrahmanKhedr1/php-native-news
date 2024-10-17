<?php
$data =  validation([
    'email' => 'required|email',
    'password' => 'required',
    'remember_me' => '',
], [
    'email' => trans('admin.email'),
    'password' => trans('admin.password'),
]);
// echo "<pre>";
// var_dump($data);
// var_dump(bcrypt($data['password']));
$login = db_first('users', "where email LIKE '%" . $data['email'] . "%'");
// var_dump($login);
if (empty($login) || !empty($login) && (!hash_check($data['password'], $login['password']) || $login['user_type'] != 'admin' )) {
    session('error_login', trans('admin.login_failed'));
    redirect(ADMIN . '/login');
} else {
    session('admin', json_encode($login));
    redirect(ADMIN);
}
