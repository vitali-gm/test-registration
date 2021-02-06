<?php


namespace App\Process;


use App\Models\User;
use App\ValueObjects\UserActivateProperties;
use Carbon\Carbon;

class UserActivate
{
    /**
     * @var UserActivateProperties
     */
    private $properties;

    public function __construct(UserActivateProperties $properties)
    {
        $this->properties = $properties;
    }

    public function handle(string $token): UserActivateProperties
    {
        /** @var User $user */
        $user = User::query()
            ->where('activate_token', $token)
            ->first();
        if ($user) {
            if ($user->is_active) {
                $this->properties->message = "$user->name, your user was previously activated";
                $this->properties->status = 'warning';
            } else {
                $user->is_active = true;
                $user->activated_at = Carbon::now();
                $user->save();
                $this->properties->message = "$user->name successfully activated";
                $this->properties->status = 'success';
            }
        } else {
            $this->properties->message = 'User not found';
            $this->properties->status = 'danger';
        }

        return $this->properties;
    }
}
