<?php

use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$userRepository = $entityManager->getRepository(User::Class);

$username = $_POST['username'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$enabled = $_POST['enabled'];

$isEnabled = $enabled === 'true' ? true : false;

echo $enabled;

$user = new User();

$user->setUsername($username);
$user->setEmail($email);
$user->setPassword($psw);
$user->setEnabled($isEnabled);

$entityManager = Utils::getEntityManager();

try {
    $entityManager->persist($user);
    $entityManager->flush();
    echo 'Se ha actualizado el usuario ' . $user->getUsername() . ' con ID ' . $user->getId() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

