<?php

/**
 * validName() checks to see that a string is all alphabetic (no numbers).
 * @return bool
 */
function validName($name): bool
{
    return ctype_alpha($name);
}

/**
 * validGithub() checks to see that a string is a valid url. (PHP’s filter_var()
 * function with the FILTER_VALIDATE_URL filter can be used to validate a URL)
 * @return void
 */
function validGithub()
{

}

/**
 * validExperience() checks to see that a string is a valid “value” property.
 * @return void
 */
function validExperience()
{

}

/**
 * validPhone() checks to see that a phone number is valid. You decide what
 * constitutes a valid phone number, just make sure to check that there are
 * numeric values entered. If you do require a specific phone number format,
 * be sure that the desired format is clear in the form. Don’t make the user
 * guess!
 * @return void
 */
function validPhone($phone)
{
    return false;
}

/**
 * validEmail() checks to see that an email address is valid.
 * @return void
 */
function validEmail($email)
{
    return false;
}