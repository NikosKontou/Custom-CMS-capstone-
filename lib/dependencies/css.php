<?php
echo('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">');

echo('<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">');


    //get the hash of the file and put it in the "?v=" so that every change is detected and invalidate browser cache
    $versionHash = md5_file("https://u2123125.eu/lib/dependencies/css/custom.css");
//add the user.css last to overwrite anything else
    echo('<link href="https://u2123125.eu/lib/dependencies/css/custom.css?v='.$versionHash.'" rel="stylesheet">');




?>

