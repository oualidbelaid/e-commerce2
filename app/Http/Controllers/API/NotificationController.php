<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function index()
    {
        $notificatons = Auth::user()->notifications;
        if (count($notificatons) == 0) {
            $response = [
                'success' => true,
                'data' => null,
                'message' => "there are no notification",
            ];
        } else {
            $response = [
                'success' => true,
                'data' => $notificatons,
                'message' => "notification",
            ];
        }
        return $response;
    }

    public function destroy($id)
    {
        $notificaton = Auth::user()->notifications->find($id);
        $notificaton->delete();
    }
}
