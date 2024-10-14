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

    <h2><?php echo  trans('admin.comments') ;?> - <?php echo  trans('admin.edit') ;?></h2>
    <a class="btn btn-info mb-3" href="<?php echo  aurl('comments') ;?>"> <?php echo  trans('admin.comments') ;?> </a>

    <form method="post" action="<?php echo  aurl('comments/edit?id='.$comment['id']) ;?>" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="news_id" value="<?php echo  $comment['news_id'] ;?>">
        <div class="row">
            <div class="form-group col-md-6 mb-2">
                <label for="name"> <?php echo  trans('admin.name') ;?> </label>
                <input type="text" name="name" class="form-control <?php echo !empty(get_error('name')) ? 'is-invalid' : ''; ?>"
                    value="<?php echo  $comment['name'] ;?>" placeholder="<?php echo  trans('admin.name') ;?>" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="email"> <?php echo  trans('admin.email') ;?> </label>
                <input type="text" name="email" class="form-control <?php echo !empty(get_error('email')) ? 'is-invalid' : ''; ?>"
                    value="<?php echo  $comment['email'] ;?>" placeholder="<?php echo  trans('admin.email') ;?>" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="status"> <?php echo  trans('admin.status') ;?> </label>
                <select name="status" class="form-select <?php echo !empty(get_error('status')) ? 'is-invalid' : ''; ?>" >
                    <option value="show" <?php echo  $comment['status'] == 'show'?'selected':'' ;?>><?php echo  trans('admin.show') ;?></option>
                    <option value="hide" <?php echo  $comment['status'] == 'hide'?'selected':'' ;?>><?php echo  trans('admin.hide') ;?></option>
                </select>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="news"> <?php echo  trans('admin.news') ;?> </label>
                <a href="<?php echo aurl('news/show?id='.$comment['news_id']);?>" target="_blank"><?php echo  $comment['title'] ;?></a>
            </div>
            
            <div class="form-group col-md-12 mb-2">
                <label for="comment"> <?php echo  trans('admin.comment') ;?> </label>
                <textarea type="file" name="comment"
                    class="form-control <?php echo !empty(get_error('comment')) ? 'is-invalid' : ''; ?>"
                    placeholder="<?php echo  trans('admin.comment') ;?>"><?php echo  $comment['comment'] ;?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><?php echo  trans('admin.save') ;?></button>
    </form>

<?php view('admin.layouts.footer') ?>