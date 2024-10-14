<?php view('admin.layouts.header', ['title' => trans('admin.edit')]);
$category = db_find('categories', request('id'));
redirect_if(empty($category), aurl('categories'));
?>

    <h2>{{ trans('admin.categories') }} - {{ trans('admin.edit') }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('categories') }}"> {{ trans('admin.categories') }} </a>

    <form method="post" action="{{ aurl('categories/edit?id='.$category['id']) }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <div class="row">
            <div class="form-group col-md-6 mb-2">
                <label for="name"> {{ trans('cat.name') }} </label>
                <input type="text" name="name" class="form-control <?php echo !empty(get_error('name')) ? 'is-invalid' : ''; ?>"
                    value="{{ $category['name'] }}" placeholder="{{ trans('cat.name') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="icon"> {{ trans('cat.icon') }} </label>
                <input type="file" name="icon" class="form-control <?php echo !empty(get_error('icon')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('cat.icon') }}" />
                    {{ image(storage_url($category['icon'])) }}
            </div>
            <div class="form-group col-md-12 mb-2">
                <label for="description"> {{ trans('cat.desc') }} </label>
                <textarea type="file" name="description"
                    class="form-control <?php echo !empty(get_error('description')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('cat.desc') }}">{{ $category['description'] }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ trans('admin.save') }}</button>
    </form>

<?php view('admin.layouts.footer') ?>