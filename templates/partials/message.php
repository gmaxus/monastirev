<div class="row"<?= $is_for_preview ? ' id="preview_div"' : ''?>>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="title h4">
                    <b class="message_name"><?=$message['name']?></b>
                </div>
                <h6 class="message_email text-muted time"><?=$message['email']?></h6>
            </div>
            <div class="panel-body">
                <p class="message_message"><?=$message['message']?></p>
                <?php if($message['image']): ?>
                    <img src="images/<?=$message['id']?>.jpg">
                <?php endif; ?>
            </div>
            <div class="panel-footer">
                <div class="container-fluid">
                <?php if($is_admin): ?>
                    <a href="admin.php?edit&id=<?=$message['id']?>" class="btn-info btn-xs">edit</a>
                    <?php if($message['approved'] == 0): ?>
                        <a href="admin.php?approve&id=<?=$message['id']?>" class="bg-success btn-xs">approve</a>
                    <?php else: ?>
                        <a href="admin.php?disapprove&id=<?=$message['id']?>" class="bg-danger btn-xs ">disapprove</a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($message['modified']): ?>
                    <span class="btn-info btn-xs disabled">modified by administrator</span>
                <?php endif; ?>
                    <span class="message_created pull-right"><?=date('H:i:s Y-m-d' ,strtotime($message['created']))?></span>
                </div>
            </div>
        </div>
    </div>
</div>