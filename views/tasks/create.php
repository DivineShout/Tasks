<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="py-5 text-center">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 py-4">
            <h1 class="text-primary mb-3 mt-4">Создание задачи</h1>

                <?php if ($result): ?>

                     <h3 class="m-5">Задача создана!</h3>
                    <a class="btn btn-primary d-block mx-auto" href="/" role="button">Главная страница</a>

                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

            <div class="login-form">
                <form  action="#" method="post" enctype="multipart/form-data">

                    <p>Имя пользователя</p>
                    <input class="form-control mb-2" type="text" name="name_user" placeholder="" value="" required>

                    <label>E-mail</label>
                    <input class="form-control mb-2" type="email" name="email" placeholder="" value="" required>

                    <p>Текст задачи</p>
                    <input class="form-control mb-2 " type="text" name="content" placeholder="" value="" required>

                    <input type="submit" name="submit" class="btn btn-primary d-block mx-auto mt-4" value="Сохранить">
                </form>
            </div>
                <?php endif; ?>
        </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
