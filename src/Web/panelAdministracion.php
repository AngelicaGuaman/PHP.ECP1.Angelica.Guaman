<?php $panel = 'panelAdministracion'; ?>
<?php require 'menu.php' ?>

<?php require './server/user/list_users.php' ?>

<div id="panel" class="container">
    <div class="border text-center">
        <h2>Listado de usuarios</h2>
        <div class="row">
            <div class="col-md-8 offset-2">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Enabled</th>
                        <th>Admin</th>
                        <th></th>
                        <th><a href="create_one_user.php"><span
                                        class="icons-table fa fa-plus"></span></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <th> <?php echo $user->getId() ?></th>
                            <th> <?php echo $user->getUsername() ?></th>
                            <th> <?php echo $user->getEmail() ?></th>
                            <th> <?php echo($user->isEnabled() ? 'YES' : 'NO') ?></th>
                            <th> <?php echo($user->isAdmin() ? 'YES' : 'NO') ?></th>
                            <th><a href="update_one_user.php?userId=<?php echo $user->getId(); ?> "><span
                                            class="icons-table fa fa-edit"></span></a></th>
                            <th>
                                <a href="./server/user/delete_one_user.php?userId=<?php echo $user->getId() ?>"
                                   onclick="return confirm('¿Deseas eliminar el usuario?');">
                                    <span class="icons-table fa fa-trash"></span>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="border text-center">
        <h2>Listado de resultados</h2>
        <div class="row">
            <div class="col-md-8 offset-2">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Points</th>
                        <th>Date</th>
                        <th></th>
                        <th><a href="create_one_result.php"><span
                                        class="icons-table fa fa-plus"></span></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($results as $result) { ?>
                        <tr>
                            <th> <?php echo $result->getId() ?></th>
                            <th> <?php echo $result->getUser()->getUsername() ?></th>
                            <th> <?php echo $result->getResult() ?></th>
                            <th> <?php echo $result->getTime()->format('Y-m-d H:i:s'); ?></th>
                            <th><a href="update_one_result.php?resultId=<?php echo $result->getId() ?>"><span
                                            class="icons-table fa fa-edit"></span></a></th>
                            <th>
                                <a href="./server/result/delete_one_result.php?resultId=<?php echo $result->getId() ?>"
                                   onclick="return confirm('¿Deseas eliminar el resultado?');">
                                    <span class="icons-table fa fa-trash"></span>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php require 'footer.php' ?>
</body>
</html>
