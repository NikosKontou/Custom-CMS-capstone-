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
        $facebook= (dataValidation::rmvSpclChars($_POST['facebook'])!='')?(dataValidation::rmvSpclChars($_POST['facebook'])):'';
        $instagram= (dataValidation::rmvSpclChars($_POST['instagram'])!='')?(dataValidation::rmvSpclChars($_POST['instagram'])):'';
        //use php built-in function to sanitize mails
        $email= (dataValidation::filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)!='')?(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)):'';
        $siteName= (dataValidation::removeSpecialCharsRelaxed($_POST['siteName'])!='')?(dataValidation::rmvSpclChars($_POST['siteName'])):'';
        $siteColor= (dataValidation::rmvSpclChars($_POST['siteColor'])!='')?(dataValidation::rmvSpclChars($_POST['siteColor'])):'';
        $site_slogan= (dataValidation::removeSpecialCharsRelaxed($_POST['siteSlogan'])!='')?(dataValidation::rmvSpclChars($_POST['siteSlogan'])):'';
        $address= (dataValidation::removeSpecialCharsRelaxed($_POST['address'])!='')?(dataValidation::rmvSpclChars($_POST['address'])):'';
        $twitter= (dataValidation::rmvSpclChars($_POST['twitter'])!='')?(dataValidation::rmvSpclChars($_POST['twitter'])):'';
        $facebookBox= (isset($_POST['facebookCheckBox']))?'1':'0';
        $instagramBox= (isset($_POST['instagramCheckBox']))?'1':'0';
        $twitterBox= (isset($_POST['twitterCheckbox']))?'1':'0';

            if(isset($_FILES['logoToUpload'])){
                if($_FILES['logoToUpdate']>1){
                    $siteLogo= dataValidation::rmvSpclChars($_FILES['logoToUpload']);
                    updateDataDromDb::setPageProperties($facebook,
                        $instagram, $email, $siteName, $siteColor, $siteLogo, $site_slogan, $address, $twitter, $facebookBox, $instagramBox, $twitterBox);
                }
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

