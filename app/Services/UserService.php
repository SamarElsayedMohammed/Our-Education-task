<?php

namespace App\Services;

use App\Models\User;

use App\Traits\UserTrait;
use Illuminate\Support\Str;


class UserService
{
    use UserTrait;

    public function createNewUser($data)
    {

        $user = new User;

        if (isset($data['id'])) {
            $user->uuid = $data['id'];
        } else {
            $user->uuid = Str::uuid();
        }

        if (isset($data['created_at'])) {
            $user->created_at = $this->convertTime($data['created_at']);
        } else {
            $user->created_at = now();
        }

        $user->balance = $data['balance'];
        $user->currency = $data['currency'];
        $user->email = $data['email'];
        $user->save();

    }

    public function UpdateUser($userData, $id)
    {
        $user = User::where('uuid', $id)->update($userData);
        return $user;
    }
}