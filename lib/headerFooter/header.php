<?php
if (!isset($_SESSION['menu_items'])){
    $_SESSION['menu_items'] = getDataFromDB::getMenuCategories();
}
if (!isset($_SESSION['site_items'])){
    $_SESSION['site_items'] = getDataFromDB::getVisibleSiteDetails();
}
echo $twig->render('header.html.twig', ['menuItems'=> $_SESSION['menu_items'], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF']), 'properties'=>$_SESSION['site_items'], 'username' => (isset($_SESSION['username'])) ? $_SESSION['username'] : null, 'userID' => (isset($_SESSION['id'])) ? $_SESSION['id'] : null] );
