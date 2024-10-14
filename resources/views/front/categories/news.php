<?php
$news = db_first(
    "news",
    "JOIN categories on news.category_id = categories.id
JOIN users on news.user_id = users.id where news.id='" . request('id') . "'",
    'news.id,
news.title,
news.content,
news.image,
news.description,
news.category_id,
news.user_id,
news.created_at,
news.updated_at,
users.name as username,
categories.name as category_name'
);
redirect_if(empty($news), url('/'));
view('front.layouts.header', ['title' => $news['title']]);
?>
<div class="row mb-2">
    <div class="col-md-12">

        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1">{{ $news['title'] }}</h2>
            <p class="blog-post-meta">{{$news['created_at']}} -- <span>{{$news['username']}}</span></p>
            <p>{{$news['description']}}.</p>
            <hr>
            <?php if (!empty($news['image'])) {
                $img = str_replace('public/', '', url('storage/files/' . $news['image']));
            } else {
                $img = url('assets/images/news-websites.jpg');
            } ?>
            <img src="{{$img}}" class="bd-placeholder-img" width="100%">
            <p>{{$news['content']}}.</p>
            <hr>
            <div class="col-md-12">
                {{ view('front.categories.comments') }}
            </div>
        </article>


    </div>
</div>


<?php view('front.layouts.footer'); ?>