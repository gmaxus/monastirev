<div class="row"<?= $is_for_preview ? ' id="preview_div"' : ''?>>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
            <div class="row">
                <div class="col-sm-3">
                    <label class="message_name h4"><?=$message['name']?></label>
                </div>
                <div class="col-sm-offset-3">
                    <span class="message_message"><?=$message['message']?></span>
                </div>
            </div>
            <?php if($message['image']): ?>
                <img src="images/<?=$message['id']?>.jpg">
            <?php endif; ?>
        </div>
        <div class="row">
            <a href="mailto:<?=$message['email']?>" class="message_email"><?=$message['email']?></a>
            <span class="message_created pull-right"><?=$message['created']?></span>
            <?php if($message['modified']): ?>
                <span class="pull-right btn-info btn-xs disabled">modified by administrator</span>
            <?php endif; ?>
        </div>
        <?php if($is_admin): ?>
        <div class="row">
            <a href="admin.php?edit&id=<?=$message['id']?>" class="pull-right btn-info btn-xs">edit</a>
            <?php if($message['approved'] == 0): ?>
            <a href="admin.php?approve&id=<?=$message['id']?>" class="pull-right bg-success btn-xs">approve</a>
            <?php else: ?>
            <a href="admin.php?disapprove&id=<?=$message['id']?>" class="pull-right bg-danger btn-xs ">disapprove</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<hr>
