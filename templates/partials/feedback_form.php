<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <?php if(!$is_admin): ?>
        <h3>Send me a message</h3>
        <?php endif; ?>
        <form action="?add" role="form" id="feedback_form" method="post" enctype="multipart/form-data">
            <?php if(!$is_admin): ?>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name"class="h4">Name</label>
                    <input name="name" type="text" class="form-control" id="name"  placeholder="Enter name" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="email" class="h4">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="message"class="h4 ">Message</label>
                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Enter your message" required><?php
                    if($is_admin)
                        echo $template['data']['message']['message'];
                    ?></textarea>
            </div>
            <input type="file" name="upload">
            <?php if(!$is_admin): ?>
            <button type="button" id="preview_button" class="btn btn-primary pull-right ">Preview</button>
            <?php else: ?>
            <input type="hidden" name="id" value="<?=$template['data']['message']['id']?>">
            <?php endif; ?>
            <button type="submit" id="submit_button" class="btn btn-lg btn-success pull-right">Submit</button>
        </form>
    </div>
</div>
