<?php

/**
 * validation class for application app
 * author: daniel knoll
 * date: 3/3/2024
 */
class Validate
{
    /**
     * validName() checks to see that a string is all alphabetic (no numbers).
     * @return bool
     */
    static function validName($name): bool
    {
        return ctype_alpha($name);
    }

    /**
     * validGithub() checks to see that a string is a valid url. (PHP’s filter_var()
     * function with the FILTER_VALIDATE_URL filter can be used to validate a URL)
     * @return bool
     */
    static function validGithub($github): bool
    {
        return filter_var($github, FILTER_VALIDATE_URL);
    }

    /**
     * validExperience() checks to see that a string is a valid “value” property.
     * @return bool
     */
    static function validExperience($years): bool
    {
        return in_array($years, array('0-2', '2-4', '4+'));
    }

    /**
     * validPhone() checks to see that a phone number is valid. You decide what
     * constitutes a valid phone number, just make sure to check that there are
     * numeric values entered. If you do require a specific phone number format,
     * be sure that the desired format is clear in the form. Don’t make the user
     * guess!
     * @return bool
     */
    static function validPhone($phone): bool
    {
        return ctype_digit($phone);
    }

    /**
     * validEmail() checks to see that an email address is valid.
     * @return bool
     */
    static function validEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}