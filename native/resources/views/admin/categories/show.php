<?php view('admin.layouts.header', ['title' => trans('admin.show')]);
$category = db_find('categories', request('id'));
redirect_if(empty($category), aurl('categories'));
?>

    <h2>{{ trans('admin.categories') }} - {{ trans('admin.show') }} #{{ $category['name'] }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('categories') }}"> {{ trans('admin.categories') }} </a>
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="name"> {{ trans('cat.name') }}: </label>
            {{ $category['name'] }}
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="icon"> {{ trans('cat.icon') }}: </label>

            {{ image(storage_url($category['icon'])) }}
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="description"> {{ trans('cat.desc') }}: </label>
            {{ $category['description'] }}
        </div>
    </div>

<?php view('admin.layouts.footer') ?>