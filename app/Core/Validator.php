<?php

class Validator{

    public static function validateEmail($email){
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}