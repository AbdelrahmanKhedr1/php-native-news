<?php
$comments = db_paginate('comments', 'where status="show" and news_id="' . request('id') . '"',10,'desc','*',['id'=>request('id')]);
?>
<div class="container mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-7">
            <div class="card">
                <div class="p-3">
                    <h6><?php echo trans('main.comments');?></h6>
                </div>
                <div class="alert alert-danger error_message d-none"></div>
                <form action="<?php echo url('add/comment?news_id='.request('id'));?>" method="post" id="comment_form">
                    <input type="hidden" name="_method" value="post">
                    <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                        <input type="text" class="form-control" name="name" placeholder="<?php echo  trans('main.name') ;?>">
                        <input type="email" class="form-control" name="email" placeholder="<?php echo  trans('main.email') ;?>">
                    </div>
                    <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                        <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle mr-2 ms-2">
                        <textarea class="form-control" placeholder="<?php echo  trans('main.write_comment') ;?>" name="comment"></textarea>
                    </div>
                    <button type="button" class="btn btn-success add_comment "> <?php echo trans('main.add');?> </button>
                </form>

                <hr>
                

                <script>
                    $(document).on('click', '.add_comment', function() {
                        var form_data = $("#comment_form").serialize();
                        $.ajax({
                            url: $('#comment_form').attr('action'),
                            dataType: 'json',
                            type: 'POST',
                            data: form_data,
                            beforeSend: function() {
                                $('.error_message').html('').addClass('d-none')
                            },
                            success: function(data) {
                                if (data.status == true) {
                                    location.reload();
                                    // $('#comment_form')[0].reset();
                                    $('.error_message').html('').addClass('d-none')
                                }
                            },
                            error: function(xhr) {
                                var errors = xhr.responseJSON;
                                if (errors != null) {
                                    var error_html = '<ul>';
                                    $.each(errors, function(key, val) {
                                        console.log(key, val);
                                        for (i = 0; i < val.length; i++) {
                                            error_html += '<li>' + val[i] + '</li>';
                                        }
                                    });
                                    error_html += '</ul>';
                                    $('.error_message').html(error_html).removeClass('d-none')
                                }
                            }
                        });
                        return false;
                    })
                </script>


                <div class="mt-2">
                    <?php
                        while ($comment = mysqli_fetch_assoc($comments['query'])): 
                        ?>
                        <hr>
                        <div class="d-flex flex-row p-3">
                            <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3 ms-3">
                            <div class="w-100">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="mr-2"><?php echo $comment['name'];?></span>
                                        <!-- <small class="c-badge">Top Comment</small> -->
                                    </div>
                                    <!-- <small><?php echo $comment['created_at'];?></small> -->
                                </div>
                                <p class="text-justify comment-text mb-0"><?php echo $comment['comment'];?></p>

                                <!-- <div class="d-flex flex-row user-feed">
                                <span class="wish"><i class="fa fa-heartbeat mr-2"></i>24</span>
                                <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
                            </div> -->
                            </div>
                        </div>
                    <?php endwhile; ?>
                
                </div>
            </div>
            <?php echo $comments['render'];?>
        </div>
    </div>
</div>