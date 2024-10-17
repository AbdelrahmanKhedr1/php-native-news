<?php if (!empty($image)):
    $rand = md5(rand(000,999));
?>
    <!-- Button trigger modal -->
    <img src="<?php echo  $image ;?>" data-bs-toggle="modal" data-bs-target="#showImage<?php echo $rand;?>" style="width: 100px;cursor: pointer">

    <!-- Modal -->
    <div class="modal fade" id="showImage<?php echo $rand;?>" tabindex="-1" aria-labelledby="showImage<?php echo $rand;?>Label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo  $image ;?>" style="width: 100%">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>