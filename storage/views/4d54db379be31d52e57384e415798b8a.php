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

    <h2><?php echo  trans('admin.news') ;?> - <?php echo  trans('admin.show') ;?> #<?php echo  $news['title'] ;?></h2>
    <a class="btn btn-info mb-3" href="<?php echo  aurl('news') ;?>"> <?php echo  trans('admin.news') ;?> </a>
    <div class="row">
        <div class="form-group col-md-12 mb-2">
            <label for="title"> <?php echo  trans('news.title') ;?>: </label>
            <?php echo  $news['title'] ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="category_id"> <?php echo  trans('news.category_id') ;?>: </label>
<!--            <?php echo  $news['category_name'] ;?>-->
            <a href="<?php echo  aurl('categories/show?id='.$news['category_id']) ;?>"><?php echo  $news['category_name'] ;?></a>

        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="user_id"> <?php echo  trans('news.user_id') ;?>: </label>
<!--            <?php echo  $news['username'] ;?>-->
            <a href="<?php echo  aurl('users/show?id='.$news['user_id']) ;?>"><?php echo  $news['username'] ;?></a>

        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="icon"> <?php echo  trans('news.image') ;?>: </label>

            <?php echo  image(storage_url($news['image'])) ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="description"> <?php echo  trans('news.description') ;?>: </label>
            <?php echo  $news['description'] ;?>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="content"> <?php echo  trans('news.content') ;?>: </label>
            <?php echo  $news['content'] ;?>
        </div>
    </div>

<?php view('admin.layouts.footer') ?>