<?php view('admin.layouts.header', ['title' => trans('admin.edit')]);
$news = db_find('news', request('id'));
redirect_if(empty($news), aurl('news'));
$categories = db_get('categories', '');
?>

        <h2>{{ trans('admin.news') }} - {{ trans('admin.edit') }}</h2>
        <a class="btn btn-info mb-3" href="{{ aurl('news') }}"> {{ trans('admin.news') }} </a>
        @if(any_errors())
        <div class="alert alert-danger">
            <ol>
                @foreach(all_errors() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ol>
        </div>
        @endif
        @php
        $title = get_error('title');
        $image = get_error('image');
        $description = get_error('description');
        $category_id = get_error('category_id');
        $content = get_error('content');
        end_errors();
        @endphp
        <form method="post" action="{{ aurl('news/edit?id='.$news['id']) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="post">
            <div class="row">
                <div class="form-group col-md-12 mb-2">
                    <label for="title"> {{ trans('news.title') }} </label>
                    <input type="text" name="title"
                           class="form-control <?php echo !empty(get_error('title')) ? 'is-invalid' : ''; ?>"
                           value="{{ $news['title'] }}" placeholder="{{ trans('news.title') }}" />
                </div>
                <div class="form-group col-md-6 mb-2">
                    <label for="category_id"> {{ trans('news.category_id') }} </label>
                    <select class="form-select <?php echo !empty(get_error('category_id')) ? 'is-invalid' : ''; ?>"
                            name="category_id">
                        <option disabled selected> {{ trans('admin.choose') }}</option>
                        <?php while ($category = mysqli_fetch_assoc($categories['query'])) : ?>
                            <option {{ $news['category_id'] == $category['id'] ? 'selected':'' }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        <?php endwhile; ?>
                    </select>

                </div>
                <div class="form-group col-md-6 mb-2">
                    <label for="image"> {{ trans('news.image') }} </label>
                    <input type="file" name="image"
                           class="form-control <?php echo !empty(get_error('image')) ? 'is-invalid' : ''; ?>"
                           placeholder="{{ trans('news.image') }}" />
                    {{ image(storage_url($news['image'])) }}
                </div>
                <div class="form-group col-md-12 mb-2">
                    <label for="description"> {{ trans('news.description') }} </label>
                    <textarea type="file" name="description"
                              class="form-control <?php echo !empty(get_error('description')) ? 'is-invalid' : ''; ?>"
                              placeholder="{{ trans('news.description') }}">{{  $news['description'] }}</textarea>
                </div>
                <div class="form-group col-md-12 mb-2">
                    <label for="content"> {{ trans('news.content') }} </label>
                    <textarea id="content" type="file" name="content"
                              class="form-control <?php echo !empty(get_error('content')) ? 'is-invalid' : ''; ?>"
                              placeholder="{{ trans('news.content') }}">{{  $news['content'] }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">{{ trans('admin.save') }}</button>
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