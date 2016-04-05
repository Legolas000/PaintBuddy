<form action='paypalIndex' METHOD='POST'>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="text" name="amount">

    PayPal<input type="radio" name="option" value="PayPal">
    Visa<input type="radio" name="option" value="Visa">

    <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>


</form>
