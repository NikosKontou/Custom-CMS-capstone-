<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Page properties</title>


</head>
<body>
<?php
require_once("../lib/headerFooter/adminMenu.php");
?>
<div class="container">
    <?php

    $db = DBConnect::setConnection();
    if (isset($_POST['editProperties'])) {
        //use php built-in function to sanitize urls
        $facebook= (filter_var($_POST['facebook'], FILTER_SANITIZE_URL)!='')?(filter_var($_POST['facebook'], FILTER_SANITIZE_URL)):'';
        $instagram= (filter_var($_POST['instagram'], FILTER_SANITIZE_URL)!='')?(filter_var($_POST['instagram'], FILTER_SANITIZE_URL)):'';
        //use php built-in function to sanitize mails
        $email= (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)!='')?(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)):'';
        $siteName= (htmlspecialchars($_POST['siteName'])!='')?(htmlspecialchars($_POST['siteName'])):'';
        $siteColor= ($_POST['siteColor'])!=''?($_POST['siteColor']):'';
        $accentColor= ($_POST['accentColor'])!=''?($_POST['accentColor']):'';
        $site_slogan= (htmlspecialchars($_POST['siteSlogan'])!='')?(htmlspecialchars($_POST['siteSlogan'])):'';
        $siteInfo= (htmlspecialchars($_POST['siteInfo'])!='')?(htmlspecialchars($_POST['siteInfo'])):'';
        $address= (htmlspecialchars($_POST['address'])!='')?(htmlspecialchars($_POST['address'])):'';
        $phone= (htmlspecialchars($_POST['phone'])!='')?(htmlspecialchars($_POST['phone'])):'';
        $twitter= (filter_var($_POST['twitter'], FILTER_SANITIZE_URL)!='')?(filter_var($_POST['twitter'], FILTER_SANITIZE_URL)):'';
        //boxes do not require sanitization because their value is not read
        $facebookBox= (isset($_POST['facebookCheckBox']))?'1':'0';
        $instagramBox= (isset($_POST['instagramCheckBox']))?'1':'0';
        $twitterBox= (isset($_POST['twitterCheckBox']))?'1':'0';
        $phoneBox= (isset($_POST['phoneCheckBox']))?'1':'0';


        if(($_FILES['logoToUpload']['size']> 1)){
                    if (dataValidation::imageCheck($_FILES['logoToUpload'])) {
                        echo"<script>console.log('valid')</script>";
                        $siteLogo = htmlspecialchars($_FILES['logoToUpload']['name']);
                        updateDataDromDb::setPageProperties($facebook,
                            $instagram, $email, $siteName, $siteColor, $siteLogo, $site_slogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox, $phone, $phoneBox, $siteInfo, $accentColor);
                    }
                }
            else{
                updateDataDromDb::setPagePropertiesWithoutImage($facebook,
                    $instagram, $email, $siteName, $siteColor, $site_slogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox, $phone, $phoneBox, $siteInfo, $accentColor);

            }

    }
    $properties = getDataFromDB::getSiteProperties();

        echo $twig->render('admin/page-properties.html.twig',['properties'=>$properties, 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


    ?>
</div>
</body>

</html>

