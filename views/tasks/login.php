<?php include ROOT . '/views/layouts/header.php'; ?>

<body class="bg-light">


<div class="py-5 text-center">
<div class="container">
<div class="row justify-content-md-center">

        <div class="col-md-4 py-4">

    <form class="form-signin  " role="form" method="post">
        <h2 class="">Авторизуйтесь</h2>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <input type="text" class="form-control" placeholder="Логін" name="login" value="<?php echo $login; ?>" required autofocus><br>
        <input type="password" class="form-control" placeholder="Пароль" name="password" value="<?php echo $password; ?>" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Підтвердити</button>

    </form>
        </div>
</div>
</div>
</div>

</body>
<?php include ROOT . '/views/layouts/footer.php'; ?>
