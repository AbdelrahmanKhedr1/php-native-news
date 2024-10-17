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

    <h2><?php echo  trans('admin.comments') ;?> - <?php echo  trans('admin.show') ;?> #<?php echo  $comment['name'] ;?></h2>
    <a class="btn btn-info mb-3" href="<?php echo  aurl('comments') ;?>"> <?php echo  trans('admin.comments') ;?> </a>
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="name"> <?php echo  trans('admin.name') ;?>: </label>
            <?php echo  $comment['name'] ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="comment"> <?php echo  trans('admin.comment') ;?>: </label>
            <?php echo  $comment['comment'] ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="status"> <?php echo  trans('admin.status') ;?>: </label>
            <?php echo  $comment['status'] ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="email"> <?php echo  trans('admin.email') ;?>: </label>
            <?php echo  $comment['email'] ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="news"> <?php echo  trans('admin.news') ;?>: </label>
            <?php echo  $comment['title'] ;?>
        </div>
    </div>

<?php view('admin.layouts.footer') ?>