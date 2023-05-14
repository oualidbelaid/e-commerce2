<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProductNotification extends Notification
{
    use Queueable;

    // Product Notification
    private $product;
    private $action;
    private $user;
    public function __construct($user, Product $product, $action)
    {
        $this->product = $product;
        $this->action = $action;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $messag2 = "";
        foreach (explode("&&", $this->product->photo) as $photo) {
            if ($photo != "") {
                $messag2 .= "<div class='col-xl-2 col-6'>";
                $messag2 .= "<div class='card'>";
                $messag2 .= "<img class='card-img-top img-fluid' src='/" . $photo . "' alt='" . $this->product->name . "'>";
                $messag2 .= "</div>";
                $messag2 .= "</div>";
            }

        }

        return [
            "user" => $this->user,
            "action" => $this->action,
            "product" => $this->product,
            "message" => "<p>" . $this->product->name . ":</p>" . "<p>" . $this->user->name . " " . $this->action . " " . $this->product->name . " in " . $this->product->created_at->format(' d M ,Y , H:i:s') . "</p>" . "<p>You can check out here " . "<a href='/admin/ecommerce/products/edit/" . $this->product->id . "'>view product</a> " . "</p>",
            "message2" => $messag2,
            "time" => $this->product->created_at->format(' d M , H:i'),
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
