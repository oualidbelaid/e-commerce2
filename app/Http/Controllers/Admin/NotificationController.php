<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function index()
    {
        $notificatons = Auth::user()->notifications;
        return view('admin/notifications.index')->with("notifications", $notificatons);
    }
    public function show($id)
    {
        $notificaton = Auth::user()->notifications->find($id);
        if ($notificaton) {
            $notificaton->markAsRead();
            return view('admin/notifications.show')->with("notification", $notificaton);
        } else {
            return redirect()->route('home');
        }
    }

    public function destroy($id)
    {
        $notificaton = Auth::user()->notifications->find($id);
        $notificaton->delete();
        return redirect()->route('notification');
    }
}
