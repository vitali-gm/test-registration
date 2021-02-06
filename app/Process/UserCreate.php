<?php


namespace App\Process;


use App\Models\User;
use App\ValueObjects\UserCreateProperties;

class UserCreate
{

    /**
     * @var UserCreateProperties
     */
    private $properties;

    public function __construct(UserCreateProperties $properties)
    {
        $this->properties = $properties;
    }

    public function handle(array $request): UserCreateProperties
    {
        $user = User::query()
            ->firstOrNew([
                'email' => $request['email']
            ]);
        if ($user->exists) {
            $this->properties->action = 'user-registration';
            $this->properties->errors = ['exist_email' => 'User exists'];
        } else {
            $user->fill($request);
            $user->save();

            $this->properties->action = 'user-list';
            $this->properties->errors = [];
        }

        return $this->properties;
    }
}
