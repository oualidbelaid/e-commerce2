<?php
namespace App\Object;

use App\Models\Order;
use App\Models\User;

class ObjCustomer
{
    public $name;
    public $phone;
    public $email;
    public $created_at;
    public $total = 0;
    public function __construct($id, $phone)
    {
        if ($id != null) {
            $user = User::find($id);
            $this->name = $user->name;
            $this->phone = $user->phone;
            $this->email = $user->email;
            foreach ($user->orders as $or) {
                $this->total += $or->total;
            }
        } else {
            $ord_vst = Order::where(["visitor" => 1, "phone" => $phone])->get();
            $this->name = $ord_vst->name;
            $this->phone = $ord_vst->phone;
            $this->email = "";
            foreach ($ord_vst as $or) {
                $this->total += $or->total;
            }
        }
    }

}