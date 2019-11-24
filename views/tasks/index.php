<?php include ROOT . '/views/layouts/header.php'; ?>



<div class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center pt-5" id="start" ">
                <h1 class="mb-4 text-primary">Задачи</h1></div>
            <table class="table-bordered table-striped table tablesorter" id="myTable">
                <thead>
                <tr>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Текс задачи</th>
                    <th scope="col">Статус</th>
                    <?php if (Admin::isGuest()): ?>
                    <?php else: ?>
                    <th></th>
                    <th></th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($tasksPlaginator as $tasks): ?>

                <tr>
                    <td><?php echo $tasks['name_user']; ?></td>
                    <td><?php echo $tasks['email']; ?></td>
                    <td><?php echo $tasks['content']; ?></td>
                    <td><?php echo $tasks['status']; ?></td>
                    <?php if (Admin::isGuest()): ?>
                    <?php else: ?>
                    <td><a href="/update-task/<?php echo $tasks['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="/delete-task/<?php echo $tasks['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    <?php endif; ?>
                </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

            <?php echo $pagination->get(); ?>

        </div>
</div>
<script type="text/javascript" src="/template/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="/template/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/template/js/jquery.tablesorter.pager.js"></script>
<script src="/template/js/table_sort.js"></script>
<?php include ROOT . '/views/layouts/footer.php'; ?>
