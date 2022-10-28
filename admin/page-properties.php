<html lang = "en">

<head>
    <?php
    require_once("../config.php");
    require_once ("../lib/userControl.php");

    ?>
    <title>Page properties</title>


</head>
<body>
<div class="container">
    <?php

    $db = DBConnect::setConnection();

    if (isset($_POST['editProperties'])) {
        $facebook= dataValidation::rmvSpclChars($_POST['facebook']);
        $instagram= dataValidation::rmvSpclChars($_POST['instagram']);
        $email= dataValidation::rmvSpclChars($_POST['email']);
        $siteName= dataValidation::rmvSpclChars($_POST['siteName']);
        $siteColor= dataValidation::rmvSpclChars($_POST['siteColor']);
        $site_slogan= dataValidation::rmvSpclChars($_POST['siteName']);
        $address= dataValidation::rmvSpclChars($_POST['address']);
        $twitter= dataValidation::rmvSpclChars($_POST['twitter']);
        $facebookBox= dataValidation::rmvSpclChars($_POST['facebookCheckBox']);
        $instagramBox= dataValidation::rmvSpclChars($_POST['instagramCheckBox']);
        $twitterBox= dataValidation::rmvSpclChars($_POST['twitterCheckbox']);

            if($_FILES['logoToUpdate']>1){
                $siteLogo= dataValidation::rmvSpclChars($_FILES['logoToUpdate']);
                updateDataDromDb::setPageProperties($facebook,
                    $instagram, $email, $siteName, $siteColor, $siteLogo, $site_slogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox);
            }else{
                updateDataDromDb::setPagePropertiesWithoutImage($facebook,
                    $instagram, $email, $siteName, $siteColor, $site_slogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox);

            }

    }
    $properties = getDataFromDB::getSiteProperties();

        echo $twig->render('admin/page-properties.html.twig',['properties'=>$properties, 'phpSelf'=>htmlspecialchars($_SERVER['PHP_SELF'])]);


    ?>
</div>
</body>

</html>

