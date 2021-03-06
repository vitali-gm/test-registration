<?php


namespace App\ValueObjects;


class UserActivateProperties extends ValueObject
{
    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $status;

    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'status' => $this->status
        ];
    }
}
