<?php
// $category = db_find('categories', request('category_id'));
redirect_if(empty(request('year')), url('/'));
$news = db_paginate('news', 'where YEAR(created_at)='.request('year'));
view('front.layouts.header', ['title' => request('year')]);
?>



<div class="row mb-2">
    <?php while ($row = mysqli_fetch_assoc($news['query'])): ?>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <!-- <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong> -->
                    <h3 class="mb-0">{{$row['title']}}</h3>
                    <div class="mb-1 text-body-secondary">{{$row['updated_at']}}</div>
                    <p class="card-text mb-auto">{{$row['description']}}.</p>
                    <a href="{{url('news?category_id='.$row['category_id'].'&id='.$row['id'])}}" class="icon-link gap-1 icon-link-hover stretched-link">
                        {{trans('main.readmore')}}
                        <svg class="bi">
                            <use xlink:href="#chevron-right" />
                        </svg>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <?php if (!empty($row['image'])) {
                        $img = str_replace('public/', '', url('storage/files/' . $row['image']));
                    } else {
                        $img = url('assets/images/news-websites.jpg');
                    } ?>
                    <img src="{{$img}}" class="bd-placeholder-img" width="auto" height="250">
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>


<?php view('front.layouts.footer'); ?>