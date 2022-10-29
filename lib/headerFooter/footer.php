<?php
if (!isset($_SESSION['footer_items'])){
    $_SESSION['footer_items'] = getDataFromDB::getFooterDetails();
}
echo $twig->render('footer.html.twig', ['footerItems'=> $_SESSION['footer_items'], 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);
