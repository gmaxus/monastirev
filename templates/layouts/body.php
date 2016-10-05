<body>
<div class="container">
    <div class="row h5">
        <div class="col-sm-8 col-sm-offset-2 text-right">
            sort by:
            <a href="?sort=date&order=<?= ($sort == 'created' & $order == 'desc') ? 'asc' : 'desc' ?>">date</a> |
            <a href="?sort=name&order=<?= ($sort == 'name' && $order == 'desc') ? 'asc' : 'desc' ?>">name</a> |
            <a href="?sort=email&order=<?= ($sort == 'email' && $order == 'desc') ? 'asc' : 'desc' ?>">email</a>
        </div>
    </div>
<?= $template['body'] ?>

<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
