<?php require 'menu.php' ?>
<?php require './server/user/list_users.php' ?>

<div id="panel" class="container">
    <div class="border">
        <h2>Crear resultado</h2>
        <div>
            <form action="./server/result/create_result.php" method="POST">
                <div class="form-group">
                    <label for="userId">Username:</label>
                    <select name="userId" id="userId" class="form-control">
                        <?php foreach ($users as $user) { ?>
                            <option value="<?php echo $user->getId() ?>"><?php echo $user->getUsername() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="points">Puntos:</label>
                    <input type="number" class="form-control" id="points" name="points" value="">
                </div>
                <div class="form-group">
                    <label for="time">Fecha:</label>
                    <input type="date" class="form-control" id="time" name="time" value="">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php require 'footer.php' ?>
</body>
</html>
