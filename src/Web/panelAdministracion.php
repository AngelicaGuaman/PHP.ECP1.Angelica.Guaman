<?php $panel = 'panelAdministracion'; ?>
<?php require 'menu.php' ?>

<?php require './server/user/list_users.php' ?>

<div id="panel" class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="row">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Enabled</th>
                    <th scope="col">Admin</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                        <th><a href="./server/user/update_one_user.php<?php echo '?id=' . $user->getId() ?>"><span
                                        class="icons-table fa fa-edit"></span></a></th>
                        <th>
                            <a href="./server/user/delete_one_user.php<?php echo '?id=' . $user->getId() ?>"
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

<?php require 'footer.php' ?>
</body>
</html>
