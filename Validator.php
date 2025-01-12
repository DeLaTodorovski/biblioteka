<?php

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return mb_strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function emptyPost($value)
    {
            return !empty($_POST[$value]);
    }

    public static function emptyFiles($value)
    {
        return !empty($_FILES[$value]);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
