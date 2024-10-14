<?php view('admin.layouts.header', ['title' => trans('admin.comments')]);
$comments = db_paginate("comments", "JOIN news on comments.news_id = news.id", 10,'desc',
'comments.id,
comments.name,
comments.email,
comments.comment,
comments.status,
news.title as title
');
?>

    <h2><?php echo  trans('admin.comments') ;?></h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><?php echo  trans('admin.name') ;?></th>
                    <th scope="col"><?php echo  trans('admin.title') ;?></th>
                    <th scope="col"><?php echo  trans('admin.email') ;?></th>
                    <!-- <th scope="col"><?php echo  trans('admin.news') ;?></th> -->
                    <th scope="col"><?php echo  trans('admin.status') ;?></th>
                    <th scope="col"><?php echo  trans('admin.comment') ;?></th>
                    <th scope="col"><?php echo  trans('admin.action') ;?></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($comment = mysqli_fetch_assoc($comments['query'])): ?>
                    <tr>
                        <td><?php echo  $comment['id'] ;?></td>
                        <td><?php echo  $comment['name'] ;?></td>
                        <td><?php echo  $comment['title'] ;?></td>
                        <td><?php echo  $comment['email'] ;?></td>
                        <!-- <td><?php echo  $comment['news_id'] ;?></td> -->
                        <td><?php echo  trans('admin.'.$comment['status']) ;?></td>
                        <td><?php echo  $comment['comment'] ;?></td>
                        <td>
                            <a href="<?php echo  aurl('comments/show?id='.$comment['id']) ;?>"> <i class="fa-regular fa-eye"></i> </a>
                            <a href="<?php echo  aurl('comments/edit?id='.$comment['id']) ;?>"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            <?php echo  delete_record(aurl('comments/delete?id='.$comment['id'])) ;?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php echo  $comments['render'] ;?>

<?php view('admin.layouts.footer') ?>