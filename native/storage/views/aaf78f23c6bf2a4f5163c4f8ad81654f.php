<?php view('admin.layouts.header', ['title' => trans('admin.news')]);
$categories = db_get('categories', '');
?>

    <h2><?php echo  trans('admin.news') ;?> - <?php echo  trans('admin.create') ;?></h2>
    <a class="btn btn-info mb-3" href="<?php echo  aurl('news') ;?>"> <?php echo  trans('admin.news') ;?> </a>

    <form method="post" action="<?php echo  aurl('news/create') ;?>" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <div class="row">
            <div class="form-group col-md-12 mb-2">
                <label for="title"> <?php echo  trans('news.title') ;?> </label>
                <input type="text" name="title"
                    class="form-control <?php echo !empty(get_error('title')) ? 'is-invalid' : ''; ?>"
                    value="<?php echo  old('title') ;?>" placeholder="<?php echo  trans('news.title') ;?>" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="category_id"> <?php echo  trans('news.category_id') ;?> </label>
                <select class="form-select <?php echo !empty(get_error('category_id')) ? 'is-invalid' : ''; ?>"
                    name="category_id">
                    <option disabled selected> <?php echo  trans('admin.choose') ;?></option>
                    <?php while ($category = mysqli_fetch_assoc($categories['query'])) : ?>
                        <option value="<?php echo  $category['id'] ;?>"><?php echo  $category['name'] ;?></option>
                    <?php endwhile; ?>
                </select>

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="image"> <?php echo  trans('news.image') ;?> </label>
                <input type="file" name="image"
                    class="form-control <?php echo !empty(get_error('image')) ? 'is-invalid' : ''; ?>"
                    placeholder="<?php echo  trans('news.image') ;?>" />
            </div>
            <div class="form-group col-md-12 mb-2">
                <label for="description"> <?php echo  trans('news.description') ;?> </label>
                <textarea type="file" name="description"
                    class="form-control <?php echo !empty(get_error('description')) ? 'is-invalid' : ''; ?>"
                    placeholder="<?php echo  trans('news.description') ;?>"><?php echo  old('description') ;?></textarea>
            </div>
            <div class="form-group col-md-12 mb-2">
                <label for="content"> <?php echo  trans('news.content') ;?> </label>
                <textarea id="content" type="file" name="content"
                    class="form-control <?php echo !empty(get_error('content')) ? 'is-invalid' : ''; ?>"
                    placeholder="<?php echo  trans('news.content') ;?>"><?php echo  old('content') ;?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><?php echo  trans('admin.create') ;?></button>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ),{
                language: '<?php echo  session_has("locale")?session("locale"):"en" ;?>',
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

<?php view('admin.layouts.footer') ?>