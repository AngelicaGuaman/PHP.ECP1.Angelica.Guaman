<?php require 'menu.php' ?>
<?php require './server/user/list_users.php' ?>
<?php require './server/result/list_results.php' ?>

<div>
    <h2>Crear Resultados</h2>
    <div>
        <form action="./server/result/update_one_result.php" method="POST">
            <div class="form-group">
                <label for="resultId">ResultId:</label>
                <select name="resultId" id="resultId" class="form-control">
                    <?php foreach ($results as $result) { ?>
                        <option value="<?php echo $result->getId() ?>"></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <select name="userId" id="userId" class="form-control">
                    <?php foreach ($users as $user) { ?>
                        <option <?php if ($user->getId() === $result->getUser()->getId()) echo 'selected' ?>
                                value="<?php echo $user->getId() ?>"><?php echo $user->getUsername() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" class="form-control" id="points" name="points" value="<?php echo $result->getResults(); ?>">
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>

</div>

<?php require 'footer.php' ?>
</body>
</html>