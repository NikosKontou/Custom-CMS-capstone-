<?php
if (!isset($_SESSION['menu_items'])){
    $_SESSION['menu_items'] = getDataFromDB::getMenuCategories();
}
echo $twig->render('header.html.twig', ['menuItems'=> $_SESSION['menu_items'], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'username' => (isset($_SESSION['username'])) ? $_SESSION['username'] : null, 'userID' => (isset($_SESSION['id'])) ? $_SESSION['id'] : null] );
