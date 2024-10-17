<?php view('admin.layouts.header', ['title' => trans('admin.show')]);
//request('id')
$news = db_first('news',"
JOIN categories on news.category_id = categories.id
JOIN users on news.user_id = users.id
WHERE news.id=".request('id'), "
news.id,
news.title,
news.content,
news.image,
news.description,
news.category_id,
news.user_id,
news.created_at,
news.updated_at,
users.name as username,
categories.name as category_name");
//echo "<pre>";
//var_dump($news);
redirect_if(empty($news), aurl('news'));
?>

    <h2>{{ trans('admin.news') }} - {{ trans('admin.show') }} #{{ $news['title'] }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('news') }}"> {{ trans('admin.news') }} </a>
    <div class="row">
        <div class="form-group col-md-12 mb-2">
            <label for="title"> {{ trans('news.title') }}: </label>
            {{ $news['title'] }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="category_id"> {{ trans('news.category_id') }}: </label>
<!--            {{ $news['category_name'] }}-->
            <a href="{{ aurl('categories/show?id='.$news['category_id']) }}">{{ $news['category_name'] }}</a>

        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="user_id"> {{ trans('news.user_id') }}: </label>
<!--            {{ $news['username'] }}-->
            <a href="{{ aurl('users/show?id='.$news['user_id']) }}">{{ $news['username'] }}</a>

        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="icon"> {{ trans('news.image') }}: </label>

            {{ image(storage_url($news['image'])) }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="description"> {{ trans('news.description') }}: </label>
            {{ $news['description'] }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="content"> {{ trans('news.content') }}: </label>
            {{ $news['content'] }}
        </div>
    </div>

<?php view('admin.layouts.footer') ?>