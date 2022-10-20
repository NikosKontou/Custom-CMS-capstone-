<?php
class dataValidation
{
//remove special characters
   public static function rmvSpclChars($string): array|string|null
   {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function removeSpecialCharacterPassword($string): array|string|null
    {
        //a more lenient algorithm used specifically for passwords
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/\[.*\]/U', '', $string);
    }
}
?>