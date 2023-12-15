<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\BirthdayWish;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
// sending birthdaywsh to id 1;
        // $user=User::find(1);
        $users = User::wheredate('birthdate', '2023-12-02')->get();
        foreach ($users as $user) {
            $messages['hi'] = "Hey, Happy Birthday {$user->name}";
            $messages['wish'] = "On behalf of our entire comapny I wish you my best wishes";

            $user->notify(new BirthdayWish($messages));
        }
        dd('Done');
    }
}
