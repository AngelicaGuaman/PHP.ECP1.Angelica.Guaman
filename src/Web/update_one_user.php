<?php require 'menu.php' ?>

<?php

use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$userRepository = $entityManager->getRepository(User::Class);

$userId = $_GET['userId'];

$user = $userRepository->findOneBy(['id' => $userId]);

?>

<div id="panel" class="container">
    <div class="border">
        <h2>Editar Usuario</h2>
        <div>
            <form action="./server/user/update_one_user.php?userId=<?php echo $user->getId() ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->getUsername() ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->getEmail() ?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="psw" name="psw" value="">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="enabled" value="" <?php if($user->IsEnabled()) echo 'checked' ?>>
                        Enabled
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>