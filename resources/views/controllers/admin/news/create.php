<?php
$data = validation([
    'title' => 'required|string',
    'category_id' => 'required',
    'image' => 'image',
    'description' => '',
    'content' => 'required',
], [
    'title' => trans('news.title'),
    'category_id' => trans('news.category_id'),
    'image' => trans('news.image'),
    'description' => trans('news.description'),
    'content' => trans('news.content'),
]);

if (!empty($data['image']['tmp_name'])) {
    $data['image'] = store_file($data['image'], 'news/' . file_ext($data['image'])['hash_name']);
}else{
    unset($data['image']);
}
$data['user_id'] = auth()['id'];
$data['created_at'] = date('Y-m-d h:i:s');
$data['updated_at'] = date('Y-m-d h:i:s');
//var_dump($data);
db_create('news', $data);
session_flash('old');
session('success',trans('admin.added'));
redirect(aurl('news'));