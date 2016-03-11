<?php

namespace App\Http\Controllers\Discount;

use DB;
//use Illuminate\Http\Request;
use auth; 
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
use Session;
use Storage;
use File;
use Illuminate\Support\Facades\Request;



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
		$oldDiscount = DB::table('discount')
		->where('edate', '<', $tday1)->delete();
		return view('pages/Discount/discountpage28', ['item' => $item, 'td' =>$add,
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
		$validate = validator::make(input::all(),
			array('Percentage' => 'required|numeric|min:5|max:75',
				'start_date' => 'required|date|after:yesterday',
				'end_date' => 'required|date|after:start_date' ));
		if ($validate->fails()) {
			return view('pages\Discount\discountpage28',
				['table2' => $table1, 'item' => $item,
				'td'=> $add, 'id'=>$id,'oldDiscount' =>$oldDiscount,
				'values'=> $values])->withErrors($validate)->withInput(Input::get());
		}
		else {
			$itemcategory= Input::get('itmcat');
			$discountype=Input::get('disctyp');
			$Percentage= Input::get('Percentage');
			$sdate= Input::get('start_date');
			$edate= Input::get('end_date');
			$imag = DB::table('items')->where('itName', '=', $itemcategory)->value('imPath');
			$itid = DB::table('items')->where('itName', '=', $itemcategory)->value('itID');
			$price = DB::table('items')->where('itName', '=', $itemcategory)->value('price');
			$disc = ($Percentage/100.0)*$price;
			$iprice= $price-$disc;
			$itemid = DB::table('discount')->select('itid')->get();
			foreach($itemid as $itemid1) {
				if($itid== $itemid1->itid) {
					$id = 0;
					return view('pages\Discount\discountpage28',
						['table2' => $table1, 'item' => $item, 'td'=> $add,
						'id' => $id,'oldDiscount' =>$oldDiscount,
						'values'=> $values])->withErrors($validate);
				}
			}
			$id = 1;
			$add = DB::table('discount')->insert(array('iname'=>$itemcategory, 'dtype'=>$discountype,
				'ipersentage'=>$Percentage, 'iprice'=>$iprice, 'imgpath'=>$imag, 'sdate'=>$sdate,
				'edate'=>$edate, 'itid' => $itid));
			return view('pages\Discount\discountpage28',
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
	public function viewDiscount(Request $request){
		$table1 = DB::table('discount')->get();
		$item = DB::table('items')->select('itName')->get();
		$add = 0;
		$id = 1;
		$oldDiscount = 0;
		$values = DB::table('discount')->select('did')->first();
		$validate = validator::make(input::all(), array());
        return view('pages\Discount\discountpage28',
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
		$tday1 = date('Y-m-d');	
		DB::table('discount')->where('edate', '<', $tday1)->delete();
		$end = DB::table('discount')->select('edate')->first();
		$tday = date('Y-m-d');
		$diplaydisc = DB::table('items')
			->join('discount', 'discount.itid', '=', 'items.itID')
			->select('items.price', 'discount.iprice', 'discount.imgpath',
				'discount.ipersentage', 'discount.edate' )->get();
		return View('pages/Discount/displaydiscount10', ['diplaydisc' => $diplaydisc]);
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
		return View('pages/Discount/assignPromotion16',['pr' =>$pr])->withErrors($validate);
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
		$pr =3;
		$titl1 = DB::table('addpromotion')->select('title')->first();
		$validate = validator::make(input::all(), array('image' => 'required|mimes:jpeg,jpg,png', 'title' => 'required|min:5',
			'body' => 'required|min:10',  'start_date' => 'required|date|after:yesterday',
			'end_date' => 'required|date|after:start_date' ));
		if ($validate->fails()) {
			return view('pages\Discount\assignPromotion16', ['pr' => $pr])
				->withErrors($validate);
		}
		elseif ($titl1) {
			$pr = 1;
			return View('pages/Discount/assignPromotion16', ['pr' => $pr])
				->withErrors($validate);
		}
		else {
			$pr = 0;
			$title = Input::get('title');
			$body = Input::get('body');
			$sdate= Input::get('start_date');
			$edate= Input::get('end_date');
			$destinationPath = 'images\promotion'; // upload path
			$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(1,1).'.'.$extension;//.Carbon::now()->format('Y-m-d');	//set a file name for image
			Request::file('image')->move($destinationPath, $fileName); // uploading file to given path

			DB::table('addpromotion')->insert(array('title'=>$title, 'body'=>$body, 
				'sdate'=>$sdate, 'edate'=>$edate));
			return View('pages/Discount/assignPromotion16', ['pr' => $pr])->withErrors($validate);
		}
	}
	/**
	 *	@author: Arham
	 *	@return $this
	 *  @param: none
	 *	desc: display the assigned new promotion for customers
	 *	created : 26/02/2016
	 */
	public function viewpromotion(){
		$titl = DB::table('addpromotion')->select('title')->first();
		$boddy = DB::table('addpromotion')->select('body')->first();
		$sdat =  DB::table('addpromotion')->select('sdate')->first();
		$edat =  DB::table('addpromotion')->select('edate')->first();
		return View('pages/Discount/viewPromotion8', ['titl'=>$titl, 'boddy'=>$boddy,
			'sdat'=>$sdat, 'edat'=>$edat]);
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
		return view('pages\Discount\registerpromotion20', ['rp'=>$rp])
			->withErrors($validate2);
	}
	/**
	 *	@author: Arham
	 *  @param Request $request
	 *  @param: none
	 *	desc: validate the form, store customer details to database and if the
	 *  registration success then send an e-mail to customer
	 *	created : 2/03/2016
	 */
	public function regpromotion(Request $request){
		$validate2 = validator::make(input::all(),
			array('first_name' => 'required|alpha_num', 'last_name' => 'required|alpha_num',
				'email'=>'required|email|unique:regpromotion', 'contact_number'=>'required',
				'address' => 'required' ));
		$rp = 0;
		if ($validate2->fails()) {
			return view('pages\Discount\registerpromotion20', ['rp'=>$rp])->withErrors($validate2);
		}
		$fname= Input::get('first_name');
		$lname= Input::get('last_name');
		$email= Input::get('email');
		$cno= Input::get('contact_number');
		$address= Input::get('address');
		$data = ['heading' => 'Welcome to PaintBuddy!!'];
		Mail::send('pages/discount/promotionmail', $data, function($message){
			$message->to('arhamshan625@gmail.com')
				->subject('Paint Buddy Promotion');
		});
		$rp = DB::table('regpromotion')->insert(array('fname'=>$fname, 'lname'=>$lname,
			'email'=>$email, 'phone'=>$cno, 'address'=>$address ));
		return view('pages\Discount\registerpromotion20', ['rp'=>$rp])
			->withErrors($validate2);
	}


	public function testmesage(){
		$abcd= Input::get('abcd');
		dd($abcd);	
		//echo "test One!!!";
	}

/*There is a new promotion available, all the users can apply to this promotion... 10 winners will be select by a random selection.... hurry up to get this chance
*/



}






#DB::table('name')->groupBy('column')->get()
/*A great opportunity to win a big price...!!!! You have to just register for promotion only... Winner will be selected in random selection.. */
