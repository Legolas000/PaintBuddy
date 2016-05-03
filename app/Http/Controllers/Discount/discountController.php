<?php 
namespace App\Http\Controllers\Discount;

use DB;
//use Illuminate\Http\Request;
//use auth; 
use App;
use App\User;
use Illuminate\Foundation\Validattion\ValidateRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\HttpResponse;
use Illuminate\Http\Request\CreateRegisterRequest;
use Illuminate\Routing\Route;
use Mail;
use Illuminate\Routing\Redirector;
use Storage;
use File;
use Illuminate\Support\Facades\Request;
use App\Discount;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Output;


class discountController extends Controller{
	/**
	 *	@author: Arham
	 *	@param: none
	 *	desc: display the assign discount page
	 *	created : 04/02/2016
	 */
	public function discount(){
		$item = DB::table('items')->select('itName')->get();
		$tday1 = date('Y-m-d');	
		$add = 0;
		$id = 1;
		$values ='1';
		$oldDiscount = DB::table('discount')->where('edate', '<', $tday1)->delete();
		return view('pages/Discount/discountpage', ['item' => $item, 'td' =>$add,
		'id' => $id,'oldDiscount' =>$oldDiscount, 'values'=> $values]);
	}

	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: get request
	 *	desc: validate the assign discount details,
	 *  if validate success then insert discount details to database
	 *	created : 04/02/2016
	 */
	public function addDiscount(Request $request){
		$table1 = null;
		$add = 0;
		$id =1;
		$values ='1';
		$item = DB::table('items')->select('itName')->get();
		$oldDiscount = 0;
		$validate = validator::make(input::all(),array(
			'Percentage' => 'required|numeric|min:5|max:75',
			'start_date' => 'required|date|after:yesterday',
			'end_date' => 'required|date|after:start_date' ));
		if ($validate->fails()) {
			return view('pages\Discount\discountpage',
				['table2' => $table1, 'item' => $item,
				'td'=> $add, 'id'=>$id,'oldDiscount' =>$oldDiscount,
				'values'=> $values])->withErrors($validate)->withInput(Input::get('Percentage'));
		}
		else {
			$itemcategory= Input::get('itmcat');
			$discountype=Input::get('disctyp');
			$Percentage= Input::get('Percentage');
			$sdate= Input::get('start_date');
			$edate= Input::get('end_date');
			$imag = DB::table('items')->where('itName', '=', $itemcategory)->value('imName');
			$itid = DB::table('items')->where('itName', '=', $itemcategory)->value('itID');
			$price = DB::table('items')->where('itName', '=', $itemcategory)->value('price');
			$disc = ($Percentage/100.0)*$price;
			$iprice2= $price-$disc;
			$iprice = round($iprice2, 2); 
			$itemid = DB::table('discount')->select('itid')->get();
			foreach($itemid as $itemid1) {
				if($itid== $itemid1->itid) {
					$dtype = DB::table('discount')->where('itid', '=', $itid)->value('dtype');
					if ($dtype==$discountype) {
						$id = 0;

						return view('pages\Discount\discountpage',
							['table2' => $table1, 'item' => $item, 'td'=> $add,
							'id' => $id,'oldDiscount' =>$oldDiscount,
							'values'=> $values])->withErrors($validate);
					}
				}
			}
			$id = 1;
			$discount = new Discount();
			$add = $discount->insert(array(
				'iname'=>$itemcategory, 
				'dtype'=>$discountype,
				'ipersentage'=>$Percentage, 
				'iprice'=>$iprice, 
				'imgpath'=>$imag, 
				'sdate'=>$sdate,
				'edate'=>$edate, 
				'itid' => $itid));
			return view('pages\Discount\discountpage',
				['table2' => $table1, 'item' => $item, 'td'=> $add, 'id' => $id,
				'oldDiscount' =>$oldDiscount, 'values'=> $values])->withErrors($validate);
		}
	}
	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: get request
	 *	desc: get the discount details from database and return the values
	 * 	to view in a table. get first discount ID from table to check
	 *  whether there are discounts available or not
	 *	created : 10/02/2016
     */
	public function viewDiscount(Request $request) {
		$table1 = DB::table('discount')->get();
		$item = DB::table('items')->select('itName')->get();
		$add = 0;
		$id = 1;
		$oldDiscount = 0;
		$values = DB::table('discount')->select('did')->first();
		$validate = validator::make(input::all(), array());
        return view('pages\Discount\discountpage',
			['table2' => $table1, 'item' => $item, 'oldDiscount' =>$oldDiscount,'td' => $add,
			'id' => $id, 'values'=> $values])->withErrors($validate);
	}
	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: none
	 *	desc: display the discounts for the user view
	 *	created : 14/02/2016
     */
	public function displaydiscount(){
		if (Auth::check()){
			$tday1 = date('Y-m-d');	
			DB::table('discount')->where('edate', '<', $tday1)->delete();
			$end = DB::table('discount')->select('edate')->first();
			$tday = date('Y-m-d');
			$diplaydisc = DB::table('items')
				->join('discount', 'discount.itid', '=', 'items.itID')
				->select('items.price', 'discount.iprice', 'discount.imgpath',
					'discount.ipersentage', 'discount.edate', 'discount.dtype')->get();
			return View('pages/Discount/displaydiscount', ['diplaydisc' => $diplaydisc]);
		}
		else{
			return redirect('home')->with('msg','You are not login');
		}
	}

	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: none
	 *	desc: go to assign promotion page
	 *	created : 14/02/2016
     */
	public function assignpromotion(){
		$validate = null;
		$pr = 3;
		$tday1 = date('Y-m-d');	
		$oldpromotion = DB::table('addpromotion')->where('edate', '<', $tday1)->delete();  //->get();  //delete();
		return View('pages/Discount/assignPromotion',['pr' =>$pr, 'oldpromotion'=>$oldpromotion])->withErrors($validate);
	}
	/**
	 *	@author: Arham
	 *	@return Request $request
	 *  @param: none
	 *	desc: assign promotion for user view, add details to database,
	 *  check the validations
	 *	created : 23/02/2016
     */
	public function setpromotion(Request $request){
		$table1 = null;
		//$titl1 = DB::table('addpromotion')->select('title')->first();
		$pr=0;
		$oldpromotion=0;
		$validate = validator::make(input::all(), array(
			'image' => 'mimes:png',  //jpeg,jpg,
			'title' => 'required|min:5',
			'body' => 'required|min:10',  
			'Percentage'=>'required|numeric|min:5|max:50',
			'start_date' => 'required|date|after:yesterday',
			'end_date' => 'required|date|after:start_date' ));
		if ($validate->fails()) {
			return view('pages\Discount\assignPromotion', ['pr' => $pr, 'oldpromotion'=>$oldpromotion])
				->withErrors($validate);
		}
		
		else {
			$title = Input::get('title');
			$body = Input::get('body');
			$perc= Input::get('Percentage');
			$sdate= Input::get('start_date');
			$edate= Input::get('end_date');
			if((Request::file('image'))){
			$destinationPath = 'images\promotion'; // upload path
			$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(1,1).'.'.$extension;//.Carbon::now()->format('Y-m-d');	//set a file name for image
			Request::file('image')->move($destinationPath, $fileName); // uploading file to given path
			}
			$pr=DB::table('addpromotion')->insert(array('title'=>$title, 'body'=>$body,
			 	'ppercentage'=>$perc, 'sdate'=>$sdate, 'edate'=>$edate));
			return View('pages/Discount/assignPromotion', ['pr' => $pr, 'oldpromotion'=>$oldpromotion])->withErrors($validate);
		}
	}
	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: none
	 *	desc: display the all assigned new promotiona for customers
	 *	created : 26/02/2016
	 */
	public function viewpromotion(){
		if (Auth::check()){
			$promotiontable =  DB::table('addpromotion')->get();
			return View('pages/Discount/viewPromotion', ['promotiontable' => $promotiontable]);
		}
		else{
			return redirect('home')->with('msg','You are not login');
		}
	}
	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: none
	 *	desc: go to the register page of the promotion
	 *	created : 26/02/2016
	 */
	public function enterpromotion(){
		$validate2 = validator::make(input::all(), array());
		$rp = 0;
		$rid=0;
		if (Auth::check()){
		$nm =Auth::user()->name;
		$lnm =Auth::user()->lname;
		$ad = Auth::user()->address;
		$mail = Auth::user()->email;
		$phone = Auth::user()->PhoneNo;
		}
		else{
			$nm = null;
			$lnm = null;
			$ad = null;
			$mail = null;
			$phone = null;
		}
		return view('pages\Discount\registerpromotion', ['rp'=>$rp, 'nm'=>$nm, 'lnm'=>$lnm,'ad'=>$ad, 'mail'=>$mail,'phone'=>$phone,'rid'=>$rid])
			->withErrors($validate2);
	}
	/**
	 *	@author: Arham
	 *  @param Request $request
	 *  @param: none
	 *	desc: validate the form, store customer details to database and generate a
	 *  unique id and if the registration success then send an e-mail to customer 
	 *	created : 24/03/2016
	 */
	public function regpromotion(Request $request){
		$nm = null;
		$lnm = null;
		$ad = null;
		$mail = null;
		$phone = null;
		$rid=0;
		$validate2 = validator::make(input::all(),array(
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha|different:first_name',
			'email'=>'required|email|unique:regpromotion',
			'contact_number'=>'required|unique:regpromotion|digits:10',
			'address' => 'required' ));
		$rp = 0;
		if ($validate2->fails()) {
			return view('pages\Discount\registerpromotion', ['rp'=>$rp, 'nm'=>$nm, 'lnm'=>$lnm,'ad'=>$ad, 'mail'=>$mail,'phone'=>$phone, 'rid'=>$rid])->withErrors($validate2);
		}
		$fname= Input::get('first_name');
		$lname= Input::get('last_name');
		$email= Input::get('email');
		$cno= Input::get('contact_number');
		$address= Input::get('address');
		$cid1 =Auth::user()->id;
		$id = DB::table('regpromotion')->select('cid')->get();
		foreach($id as $id1) {
			if($cid1 == $id1->cid) {
				$rid=1;
				return view('pages\Discount\registerpromotion', ['rp'=>$rp, 'nm'=>$nm, 'lnm'=>$lnm,'ad'=>$ad, 'mail'=>$mail,'phone'=>$phone, 'rid'=>$rid])
				->withErrors($validate2);
			}
		}
        function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    	$charactersLength = strlen($characters);
	    	$randomString = '';
	    	for ($i = 0; $i < $length; $i++) {
	     		$randomString .= $characters[rand(0, $charactersLength - 1)];
	    	}
	    	return $randomString;
		}
		$prokey = generateRandomString();
		Mail::send('pages/discount/promotionmail', array("prokey" => $prokey, 'fname'=> $fname, 'lname'=>$lname), function($message){
			$message->from('paintbuddyProj@gmail.com');
			$message->to(Input::get('email'))
			->subject('Paint Buddy Promotion');
		});
		$rp = DB::table('regpromotion')->insert(array('fname'=>$fname, 'lname'=>$lname,
			'email'=>$email, 'contact_number'=>$cno, 'address'=>$address, 'promotionID'=> $prokey,'cid'=>$cid1 ));
		return view('pages\Discount\registerpromotion', ['rp'=>$rp, 'nm'=>$nm, 'lnm'=>$lnm,'ad'=>$ad, 'mail'=>$mail,'phone'=>$phone, 'rid'=>$rid])
			->withErrors($validate2);
	}

	public function testmesage(){
		$abcd= Input::get('abcd');
		dd($abcd);	

	}
	/**
	 *	@author: Arham
	 *  @param: none
	 *	desc: generate a report for all the promotions and snd it to the all
	 *  registered customers
	 *	created : 2/04/2016
	 */
	public function mailaboutpromotion(){
		$table = DB::table('addpromotion')->get();
		$emails =  DB::table('users')->select('email')->get();
		$data = ['heading' => 'Welcome to PaintBuddy!!'];
		foreach ($emails as $mails) {
			Mail::send('pages/discount/promotionpdf', array("table" => $table),$mails, function($message) {
				$message->from('paintbuddyProj@gmail.com');
				$message->to($mails)	
				->subject('Paint Buddy Promotion');		//'arhamshan625@gmail.com'
			});
		}
		return view('pages\Discount\promotionpdf', ['table'=>$table ] );
	}
}


#DB::table('name')->groupBy('column')->get()
/*A great opportunity to win a big price...!!!! You have to just register for promotion only... Winner will be selected in random selection.. */
