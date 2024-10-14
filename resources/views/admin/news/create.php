<?php view('admin.layouts.header', ['title' => trans('admin.news')]);
$categories = db_get('categories', '');
?>

    <h2>{{ trans('admin.news') }} - {{ trans('admin.create') }}</h2>
    <a class="btn btn-info mb-3" href="{{ aurl('news') }}"> {{ trans('admin.news') }} </a>

    <form method="post" action="{{ aurl('news/create') }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post">
        <div class="row">
            <div class="form-group col-md-12 mb-2">
                <label for="title"> {{ trans('news.title') }} </label>
                <input type="text" name="title"
                    class="form-control <?php echo !empty(get_error('title')) ? 'is-invalid' : ''; ?>"
                    value="{{ old('title') }}" placeholder="{{ trans('news.title') }}" />
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="category_id"> {{ trans('news.category_id') }} </label>
                <select class="form-select <?php echo !empty(get_error('category_id')) ? 'is-invalid' : ''; ?>"
                    name="category_id">
                    <option disabled selected> {{ trans('admin.choose') }}</option>
                    <?php while ($category = mysqli_fetch_assoc($categories['query'])) : ?>
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    <?php endwhile; ?>
                </select>

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="image"> {{ trans('news.image') }} </label>
                <input type="file" name="image"
                    class="form-control <?php echo !empty(get_error('image')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('news.image') }}" />
            </div>
            <div class="form-group col-md-12 mb-2">
                <label for="description"> {{ trans('news.description') }} </label>
                <textarea type="file" name="description"
                    class="form-control <?php echo !empty(get_error('description')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('news.description') }}">{{ old('description') }}</textarea>
            </div>
            <div class="form-group col-md-12 mb-2">
                <label for="content"> {{ trans('news.content') }} </label>
                <textarea id="content" type="file" name="content"
                    class="form-control <?php echo !empty(get_error('content')) ? 'is-invalid' : ''; ?>"
                    placeholder="{{ trans('news.content') }}">{{ old('content') }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ trans('admin.create') }}</button>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ),{
                language: '{{ session_has("locale")?session("locale"):"en" }}',
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

<?php view('admin.layouts.footer') ?>