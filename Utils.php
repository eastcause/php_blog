<?php

class Utils
{
    public static function htmlEscape($text)
    {
        return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
    }

    public static function generateRandomString($length = 100) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}