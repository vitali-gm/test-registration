<?php


namespace App\ValueObjects;


class UserCreateProperties extends ValueObject
{
    /**
     * @var string
     */
    public $action;

    /**
     * @var array
     */
    public $errors;

    /**
     * @var array
     */
    public $info;
}
