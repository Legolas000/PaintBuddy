<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

?>
    <?php
//  if($_POST["amount"]){
    session_start();
    $_SESSION['Payment_Amount'] = Input::get('amount');


header('Location:billing');
//  }
?>



<form action='billing' METHOD='POST'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="amount"/>
    <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
</form>
