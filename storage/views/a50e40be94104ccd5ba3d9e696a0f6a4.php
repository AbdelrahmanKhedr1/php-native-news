<?php view('admin.layouts.header', ['title' => trans('admin.edit')]);
$category = db_find('categories', request('id'));
redirect_if(empty($category), aurl('categories'));
?>

    <h2><?php echo  trans('admin.categories') ;?> - <?php echo  trans('admin.edit') ;?></h2>
    <a class="btn btn-info mb-3" href="<?php echo  aurl('categories') ;?>"> <?php echo  trans('admin.categories') ;?> </a>

    <form method="post" action="<?php echo  aurl('categories/edit?id='.$category['id']) ;?>" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <div class="row">
            <div class="form-group col-md-6 mb-2">
                <label for="name"> <?php echo  trans('cat.name') ;?> </label>
                <input type="text" name="name" class="form-control <?php echo !empty(get_error('name')) ? 'is-invalid' : ''; ?>"
                    value="<?php echo  $category['name'] ;?>" placeholder="<?php echo  trans('cat.name') ;?>" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="icon"> <?php echo  trans('cat.icon') ;?> </label>
                <input type="file" name="icon" class="form-control <?php echo !empty(get_error('icon')) ? 'is-invalid' : ''; ?>"
                    placeholder="<?php echo  trans('cat.icon') ;?>" />
                    <?php echo  image(storage_url($category['icon'])) ;?>
            </div>
            <div class="form-group col-md-12 mb-2">
                <label for="description"> <?php echo  trans('cat.desc') ;?> </label>
                <textarea type="file" name="description"
                    class="form-control <?php echo !empty(get_error('description')) ? 'is-invalid' : ''; ?>"
                    placeholder="<?php echo  trans('cat.desc') ;?>"><?php echo  $category['description'] ;?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><?php echo  trans('admin.save') ;?></button>
    </form>

<?php view('admin.layouts.footer') ?>