<?php view('admin.layouts.header', ['title' => trans('admin.show')]);
$comment = db_first("comments", "JOIN news on comments.news_id = news.id
where comments.id=".request('id'),
'comments.name,
comments.email,
comments.comment,
comments.status,
comments.news_id,
news.title as title
');

redirect_if(empty($comment), aurl('comments'));
?>

    <h2>{{ trans('admin.comments') }} - {{ trans('admin.show') }} #{{ $comment['name'] }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('comments') }}"> {{ trans('admin.comments') }} </a>
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="name"> {{ trans('admin.name') }}: </label>
            {{ $comment['name'] }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="comment"> {{ trans('admin.comment') }}: </label>
            {{ $comment['comment'] }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="status"> {{ trans('admin.status') }}: </label>
            {{ $comment['status'] }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="email"> {{ trans('admin.email') }}: </label>
            {{ $comment['email'] }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="news"> {{ trans('admin.news') }}: </label>
            {{ $comment['title'] }}
        </div>
    </div>

<?php view('admin.layouts.footer') ?>