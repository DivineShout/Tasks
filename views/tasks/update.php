<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="py-5 text-center">

        <div class="container">
            <div class="row justify-content-md-center">

                <div class="col-md-4 py-4">
                    <h1 class="text-primary mb-3 mt-4">Редактирование задачи</h1>




                    <div class="login-form">
                        <form  action="#" method="post" enctype="multipart/form-data">

                            <p>Имя пользователя</p>
                            <input class="form-control mb-2" type="text" name="name_user" placeholder="" value="<?php echo $taskList['name_user']; ?>">

                            <label>E-mail</label>
                            <input class="form-control mb-2" type="email" name="email" placeholder="" value="<?php echo $taskList['email']; ?>">

                            <p>Задача</p>
                            <input class="form-control mb-2 " type="text" name="content" placeholder="" value="<?php echo $taskList['content']; ?>">

                            <p>Статус</p>
                            <select class="form-control mb-2 " type="text" name="status">
                                <option value="<?php echo $taskList['status']; ?>"><?php echo $taskList['status']; ?></option>
                                <option value="Выполнено">Выполнено</option>
                                <option value="В обработке">В обработке</option>
                            </select>

                            <input type="submit" name="submit" class="btn btn-primary d-block mx-auto mt-4" value="Сохранить">
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>



<?php include ROOT . '/views/layouts/footer.php'; ?>