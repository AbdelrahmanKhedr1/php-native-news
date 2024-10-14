<?php 
$category = db_find('categories',request('id'));
redirect_if(empty($category),url('/'));
$news = db_paginate('news','where category_id="'.$category['id'].'"');
view('front.layouts.header',['title'=>$category['name']]);  
?>

<div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
    <div class="col-lg-6 px-0">
        <h1 class="display-4 fst-italic"><?php echo $category['name'];?></h1>
        <p class="lead my-3"><?php echo $category['description'];?>.</p>
        <!-- <p class="lead mb-0"><a href="#" class="text-body-emphasis fw-bold">Continue reading...</a></p> -->
    </div>
</div>

<div class="row mb-2">
    <?php while($row = mysqli_fetch_assoc($news['query'])): ?>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                <h3 class="mb-0"><?php echo $row['title'];?></h3>
                <div class="mb-1 text-body-secondary"><?php echo $row['updated_at'];?></div>
                <p class="card-text mb-auto"><?php echo $row['description'];?>.</p>
                <a href="<?php echo url('news/'.$row['id']);?>" class="icon-link gap-1 icon-link-hover stretched-link">
                    <?php echo trans('main.readmore');?>
                    <svg class="bi">
                        <use xlink:href="#chevron-right" />
                    </svg>
                </a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <?php if (!empty($row['image'])) { 
                    $img = str_replace('public/', '',url('storage/files/'.$row['image']));
                }elseif(!empty($category['icon'])){
                    $img = str_replace('public/', '',url('storage/files/'.$category['icon']));
                }else{
                    $img = url('assets/images/news-websites.jpg');
                } ?>
                <img src="<?php echo $img;?>" class="bd-placeholder-img" width="auto" height="250">
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>


<?php view('front.layouts.footer'); ?>
