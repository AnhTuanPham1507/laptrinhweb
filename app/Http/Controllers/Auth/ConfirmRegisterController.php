<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\ConfirmRegister;
use App\Models\User;
use Illuminate\Http\Request;


class ConfirmRegisterController extends Controller
{
    public function SetActiveForUser(Request $request)
    {
        $foundConfirm = ConfirmRegister::where(['token' => $request->query('token'), 'user_id' =>$request->query('user_id')])->first();
        if($foundConfirm)
        {
            User::where("id", $request->query('user_id'))->update([
                'status' => UserStatus::getValue("ACTIVE"),
            ]);
            echo "status: Confirmed successfully";
            return;
        }
        echo "Status: confirmed fail";
    }

    public function DenyUser(Request $request)
    {
        $foundConfirm = ConfirmRegister::where(['token' => $request->query('token'), 'user_id' =>$request->query('user_id')])->first();
        if($foundConfirm)
        {
            $foundUser = User::where("id", $request->query('user_id'));
            if($foundUser->status != UserStatus::getValue("ACTIVE"))
            {
                $foundConfirm->delete();
                $foundUser->delete();
                echo "status: delete successfully";
            }
            else
            {
                echo "User is active, you can't delete them";
            }
            return;
        }
        echo "Status: delete fail";
    }
}
