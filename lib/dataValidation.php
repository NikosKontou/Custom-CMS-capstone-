<?php

class dataValidation
{
//remove special characters
    public static function rmvSpclChars($string): array|string|null
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public static function removeSpecialCharsRelaxed($string): array|string|null
    {
        //a more lenient algorithm used specifically for passwords, mails and when you have to allow some special characters
        return preg_replace('/\[.*\]/U', '', $string);
    }


    public static function imageCheck($image): bool
    {
        $res = false;
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>console.log('exists')</script>";
            $uploadOk = 0;
        }

// Check file size
        if ($image["size"] > 700000) {
            echo "<script>console.log('size')</script>";
            $uploadOk = 0;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "svg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "<script>console.log('mime')</script>";
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                echo "<script>console.log('ok')</script>";
                $res = true;
            }
        }

        return $res;
    }
}

?>