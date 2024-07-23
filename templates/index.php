<?php

require_once('config.php');

require_once('src/GestionSQL.php');
require_once('src/Controller.php');

require_once('src/Controller/AccueilController.php');
require_once('src/Controller/PageController.php');
require_once('src/Repository/UserRepository.php');

try {

    session_start();
    $gestionSQL = new GestionSQL();
    $gestionSQL->connexion();

} catch (Exception $exception) {
    die('Merci de revenir plus tard !');
}


if (!empty($_GET['security'])) {

    $pageController = new PageController();


    switch ($_GET['security']) {
        case 'inscription':
            $pageController->register($gestionSQL, $_POST);
            break;

        case 'connexion':
            $pageController->login($gestionSQL, $_POST);
            break;

        case 'deconnexion':
            $pageController->logout($gestionSQL);
    }

} elseif (!empty($_GET['immo'])) {
    $addImmoController = new ImmoController();

    switch ($_GET['immo']) {
        case 'ajouterBien':
            $addImmoController->ajouterBien($gestionSQL, $_POST);
            break;
    }

} else {
    $accueilController = new AccueilController();
    $accueilController->accueil($gestionSQL);
}