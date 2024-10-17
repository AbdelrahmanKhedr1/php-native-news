<?php view('admin.layouts.header', ['title' => trans('admin.edit')]);
$comment = db_first("comments", "JOIN news on comments.news_id = news.id
where comments.id=".request('id'),
'comments.name,
comments.id,
comments.email,
comments.comment,
comments.status,
comments.news_id,
news.title as title
');
redirect_if(empty($comment), aurl('comments'));
?>

    <h2>{{ trans('admin.comments') }} - {{ trans('admin.edit') }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('comments') }}"> {{ trans('admin.comments') }} </a>

    <form method="post" action="{{ aurl('comments/edit?id='.$comment['id']) }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="news_id" value="{{ $comment['news_id'] }}">
        <div class="row">
            <div class="form-group col-md-6 mb-2">
                <label for="name"> {{ trans('admin.name') }} </label>
                <input type="text" name="name" class="form-control <?php echo !empty(get_error('name')) ? 'is-invalid' : ''; ?>"
                    value="{{ $comment['name'] }}" placeholder="{{ trans('admin.name') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="email"> {{ trans('admin.email') }} </label>
                <input type="text" name="email" class="form-control <?php echo !empty(get_error('email')) ? 'is-invalid' : ''; ?>"
                    value="{{ $comment['email'] }}" placeholder="{{ trans('admin.email') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="status"> {{ trans('admin.status') }} </label>
                <select name="status" class="form-select <?php echo !empty(get_error('status')) ? 'is-invalid' : ''; ?>" >
                    <option value="show" {{ $comment['status'] == 'show'?'selected':'' }}>{{ trans('admin.show') }}</option>
                    <option value="hide" {{ $comment['status'] == 'hide'?'selected':'' }}>{{ trans('admin.hide') }}</option>
                </select>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="news"> {{ trans('admin.news') }} </label>
                <a href="{{aurl('news/show?id='.$comment['news_id'])}}" target="_blank">{{ $comment['title'] }}</a>
            </div>
            
            <div class="form-group col-md-12 mb-2">
                <label for="comment"> {{ trans('admin.comment') }} </label>
                <textarea type="file" name="comment"
                    class="form-control <?php echo !empty(get_error('comment')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('admin.comment') }}">{{ $comment['comment'] }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ trans('admin.save') }}</button>
    </form>

<?php view('admin.layouts.footer') ?>