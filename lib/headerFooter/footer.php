<?php
//if (!isset($_SESSION['site_items'])){
//    $_SESSION['site_items'] = getDataFromDB::getVisibleSiteDetails();
//}
echo $twig->render('footer.html.twig', ['footerItems'=> $_SESSION['site_items'], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);
