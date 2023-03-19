<?php

namespace App\Http\Controllers\forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\frontend\RegisterAuthModel;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\Redirect ;
use Monolog\SignalHandler;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.home');
    }
    public function user_form(){
        return view('frontend.home.payment');
    }

    public function buy_course(Request $request)
    {
        $name=$request->name;
        $phone=$request->number;
        $username=$request->email;
        $amount = $request->amount;
        $api = new Api('rzp_test_S81SwbJh97Bc4w', 'ZAman9dhy8wuWBIItzqvHqE0');
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100 , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 

         $User_model= new RegisterAuthModel;     
         $User_model->name=$name;        
         $User_model->number=$phone;        
         $User_model->amount=$amount;        
         $User_model->email=$username;
         $User_model->payment_id = $orderId;
         $User_model->save();        
         $data = array(
            'order_id' => $orderId,
            'amount' => $amount
        );
        return redirect::to('buy-course')->with('data', $data);
    }

    public function pay_check(Request $request){
        $data = $request->all();
        $success = true;

        $error = "Payment Failed";
        $user = RegisterAuthModel::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->razorpay_id = $data['razorpay_payment_id'];

        $api = new Api('rzp_test_S81SwbJh97Bc4w', 'ZpayAman9dhy8wuWBIItzqvHqE0');
        
        try{
        $attributes = array(
             'razorpay_signature' => $data['razorpay_signature'],
             'razorpay_payment_id' => $data['razorpay_payment_id'],
             'razorpay_order_id' => $data['razorpay_order_id']
        );
        $order = $api->utility->verifyPaymentSignature($attributes);
        }catch(SignatureVerificationError $e){

            $succes = false;
        }
        if($success === true){
            $user->save();
            return redirect::to('success')->send();
        }else{

            return redirect::to('error')->send();
        }
    }
    public function success(){
        return view('frontend.home.success');
    }
    public function error(){
        return view('frontend.home.error');
    }


}
