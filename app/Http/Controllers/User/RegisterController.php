<?php

namespace App\Http\Controllers\User;

use App\deactive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    protected $redirectTo = '/home';

    /**
     * @auther mayura
     * It views the registration page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(){
        return view('pages/User/login/registration');
    }

    /**
     * @auther mayura
     * getting login page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getLogin(){
        return view('pages/User/login/login');
    }

    /**
     * @auther mayura
     *getting user account page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAccount(){
        return view('pages/User/login/myAccount');
    }

    public function getHome(){
        return view('pages/User/home');
    }

    /**
     * @auther mayura
     * getting main-home page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    

    /**
     * @auther mayura
     * storing the reason for deactive
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deactive(){
        $reason=Input::get('reason',true);
        $freason=Input::get('freason');

        $deactive=new deactive();
        $deactive->email=Auth::user()->email;
        $deactive->reason=$reason;
        $deactive->freason=$freason;

        $count = DB::table('deactive')
            ->where('email', Auth::user()->email)
            ->count();

        if($count==0){
            $deactive->save();
        }
        else{
            DB::table('deactive')
                ->where('email', Auth::user()->email)
                ->update(['reason' =>  $reason]);

            DB::table('deactive')
                ->where('email', Auth::user()->email)
                ->update(['freason' =>  $freason]);
            return view('pages/User/login/DeeactiveAccount');
        }
    }

    /**
     * @auther mayura
     * This function validates the register details and gives proper error messages
     * store register details
     * send email to the user stating you have successfully registered
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(){
        $data=array(
            'FirstName' => Input::get('FirstName'),
            'LastName' => Input::get('LastName'),
            'email' => Input::get('email'),
            'Address' => Input::get('Address'),
            'city' => Input::get('city'),
            'state' => Input::get('state'),
            'Password' => Input::get('Password'),
            'ConfirmPassword' => Input::get('ConfirmPassword')
        );

        $rules=array(
            'FirstName' => 'required|alpha',
            'LastName' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'Address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'Password' => 'required|min:8',
            'ConfirmPassword' => 'required|min:8|same:Password'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return view('pages/User/login/registration', ['errors' => $validator->errors()])->with('data', $data);
        } else {
            $user = new User();
            $user->name = Input::get('FirstName');
            $user->address = Input::get('Address');
            $user->city = Input::get('city');
            $user->state = Input::get('state');
            $user->email = Input::get('email');
            $user->lname = Input::get('LastName');
            $user->password = Hash::make(Input::get('Password'));
            $user->profile='man.png';
            $user->status=1;
            $user->role='customer';

            $user->save();
            if ($user->save()) {
                $data = ['title' => 'Welcome to PaintBuddy!!'];
                Mail::send('\pages\User\email\email', $data, function ($m) {
                    $m->from('paintbuddyProj@gmail.com');
                    $m->to(Input::get('email'));
                    $m->subject('welcome to paintbuddy!');
                });

                $name = Input::get('FirstName');
                //return view('pages/User/home', ['message' => $name . ' You have successfully registered .' . 'login to continue']);
                return redirect('/')->with('message',$name . ' You have successfully registered .' . 'login to continue');
            }
        }
    }

    /**
     * @mayura
     * gives proper error message if password validation fails
     * changes password and give success message
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newpwd()
    {
        $data=array( 'Password' => Input::get('Password'),'ResetPassword' => Input::get('ResetPassword'));
        $validator = Validator::make($data, ['Password' => 'required|min:8','ResetPassword' => 'required|min:8|same:Password',]);

        if ($validator->fails()) {
            $login_id=Input::get('login_id');
            if(Auth::loginUsingId($login_id))
            {
               // return view('pages/User/login/myAccount', ['errors' => $validator->errors()])->with('data', $data);
                return redirect('myaccount')->with('errors',$validator->errors());
            }
        } else{
            $login_id=Input::get('login_id');
            if(Auth::loginUsingId($login_id)) {
                $email = Auth::user()->email;
                $pwd=Hash::make(Input::get('Password')) ;

                DB::table('users')
                    ->where('email', $email)
                    ->update(['password' => $pwd]);
               // return view('pages/User/login/myAccount', [ 'alert2' =>  ' Your password has been changed']);
                return redirect('myaccount')->with('alert4','Your password has been changed');
            }
        }
    }

    /**
     * @auther mayura
     * gives proper error message if validation fails
     * updates user's personal details
     * gives success messages
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chprofile(Request $request){

        $validator = Validator::make(
            [
                'firstname' => Input::get('firstname'),
                'lastname'=> Input::get('lastname'),
                'phone'=> Input::get('phone'),
                'address'=> Input::get('address'),
                'city'=> Input::get('city'),
                'state'=> Input::get('state'),
            ],
            [
                'firstname'=>'required|alpha',
                'lastname'=>'required|alpha',
                'phone' => 'numeric|min:9',
                'address'=> 'required',
                'city'=> 'required',
                'state'=> 'required',
            ],
            [
                'required' => 'The :attribute field is required.',
            ]
        );

        if ($validator->fails()) {
            $login_id=Input::get('login_id');
            if (Auth::loginUsingId($login_id)){
                return view('pages/User/login/myaccount', ['errors' => $validator->errors()]);
            }
        } else {
            $login_id=Input::get('login_id');
            if (Auth::loginUsingId($login_id))
            {
                $email = Auth::user()->email;
                $address = Input::get('address');
                $city = Input::get('city');
                $state = Input::get('state');
                $name = Input::get('firstname');
                $lname = Input::get('lastname');
                $PhoneNo = Input::get('phone');

                $status=DB::table('users')
                    ->where('email', $email)
                    ->update(['address' => $address,'city' => $city, 'state' => $state,'name' => $name, 'lname' => $lname, 'PhoneNo' => $PhoneNo]);

                if($status==0){
                   // return view('pages/User/login/myaccount', ['alert1' => 'Your personal details not updated.Please change your data']);
                return redirect('myaccount')->with('alert3','Your personal details not updated.Please change your data');
                }
                else
                   // return view('pages/User/login/myaccount', ['alert2' => ' Your details has been changed']);
                    return redirect('myaccount')->with('alert4','Your details has been changed');
            }
        }
    }

    /**
     * @auther mayura
     * login in to the system
     * if user is in inactive stage it asks to active
     * if user credentials are wrong, it give proper error message
     * @return \Illuminate\Contracts\View\Factory|Redirect|\Illuminate\View\View
     */
    public function postLogin(){

        $validator = Validator::make(
            [
                'UserName' => Input::get('UserName'),
                'PassWord' => Input::get('PassWord'),
            ],
            [
                'UserName' => 'required|email',
                'PassWord' => 'required|min:8',
            ],
            [
                'required' => 'The :attribute field is required.',
                'email' => 'We need to know your e-mail address!'
            ]
        );
        if ($validator->fails()) {
            return view('pages/User/login/login', ['errors' => $validator->errors()])->with('data', array( 'UserName' => Input::get('UserName'),'PassWord' => Input::get('PassWord')));
        } else {
            $email = Input::get('UserName');
            $password = Input::get('PassWord');

            if (Auth::attempt(array('email' => $email, 'password' => $password,'status'=>1))) {

                if(Auth::user()->role=='customer')return redirect('/');
                if(Auth::user()->role=='admin')return redirect('admin');   //Check this
            }
            elseif (Auth::attempt(array('email' => $email, 'password' => $password,'status'=>0))) {

                Auth::logout();
                return view('pages/User/login/reactive',['status' => 'Your account is inactive! Activate now!!!']);

            } else {

               // return view('pages/User/login/login', ['status' => 'Password you have entered is incorrect!']);
                return redirect()->back()->with('status' , 'Password you have entered is incorrect!');
            }
        }
    }

    

    /**
     * @auther mayura
     * let the user to log out from the application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getlogout()
    {
        Auth::logout();
        //return view('pages/User/home',['message' => 'You are logged out now']);
        return redirect('/')->with('msg','You are logged out now');
    }

    
}
