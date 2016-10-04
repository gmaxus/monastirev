<?= $template['footer'] ?>

<footer class="footer">
    <div class="pull-right">
<?php if($is_admin): ?>
        <a href="admin.php?logout">logout</a>
<?php else:?>
        <a href="admin.php">admin login</a>
<?php endif;?>
    </div>
</footer>
</div>
</body>
</html>
