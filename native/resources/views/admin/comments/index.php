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

    <h2>{{ trans('admin.comments') }}</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('admin.name') }}</th>
                    <th scope="col">{{ trans('admin.title') }}</th>
                    <th scope="col">{{ trans('admin.email') }}</th>
                    <!-- <th scope="col">{{ trans('admin.news') }}</th> -->
                    <th scope="col">{{ trans('admin.status') }}</th>
                    <th scope="col">{{ trans('admin.comment') }}</th>
                    <th scope="col">{{ trans('admin.action') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($comment = mysqli_fetch_assoc($comments['query'])): ?>
                    <tr>
                        <td>{{ $comment['id'] }}</td>
                        <td>{{ $comment['name'] }}</td>
                        <td>{{ $comment['title'] }}</td>
                        <td>{{ $comment['email'] }}</td>
                        <!-- <td>{{ $comment['news_id'] }}</td> -->
                        <td>{{ trans('admin.'.$comment['status']) }}</td>
                        <td>{{ $comment['comment'] }}</td>
                        <td>
                            <a href="{{ aurl('comments/show?id='.$comment['id']) }}"> <i class="fa-regular fa-eye"></i> </a>
                            <a href="{{ aurl('comments/edit?id='.$comment['id']) }}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            {{ delete_record(aurl('comments/delete?id='.$comment['id'])) }}
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    {{ $comments['render'] }}

<?php view('admin.layouts.footer') ?>