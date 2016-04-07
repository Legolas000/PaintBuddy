<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateRegisterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use App\deactive;


class MailController extends Controller
{
    /**
     * @auther mayura
     * getting reset password form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPassword()
    {
        return view('pages/User/passwod/setpassword');
    }

    /**
     * @auther mayura
     * getting deactive reason form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deactive()
    {
        return view('pages/User/login/deactiveReason');
    }

    /**
     * @auther mayura
     * sending email to change password incase of user forgot password
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postResetPassword( )
    {
        $validator = Validator::make(
            [
                'email' => Input::get('email'),
            ],
            [
                'email' => 'required|email',
            ],
            [
                'required' => 'The :attribute field is required.',
            ]
        );

        if ($validator->fails()) {
            return view('pages/User/passwod/setpassword', ['errors' => $validator->errors()]);
        }
        else{
            $email= Input::get('email');
            $pwd=Hash::make('5344904qwe45') ;
            $status= DB::table('users')
                ->where('email', $email)
                ->update(['password' => $pwd]);


            if($status==0)
                //return view('pages/User/passwod/setpassword',['status' =>' Please use registered email address']);
                return redirect('email_reset_password')->with('status',' Please use registered email address');
            else{
                $data = ['title' => 'Welcome to PaintBuddy!!'];

                Mail::send('pages/User/email/password', $data, function ($m)  {
                    $m->to(Input::get('email'));
                    $m->subject('PaintBuddy account password reset');
                });

                // return view('pages/User/home',['message' =>' Your password has been changed . Chech your email']);
                return redirect('/')->with('message' ,' Your password has been changed . Chech your email');
            }

        }
    }

    /**
     * @auther mayura
     * deactivates user's account and send email
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postDeactive()
    {
        $validator = Validator::make(
            [
                'password' => Input::get('password'),
            ],
            [
                'password' => 'required',
            ],
            [
                'required' => 'The :attribute field is required.',
            ]
        );

        $login_id = Input::get('login_id');
        if (Auth::loginUsingId($login_id)) {
            if ($validator->fails()) {
                return view('pages/User/login/DeeactiveAccount', ['errors' => $validator->errors()]);
            } else {
                if(Hash::check(Input::get('password'), Auth::user()->password)){
                    DB::table('users')
                        ->where('email','=', Auth::user()->email)
                        ->update(['status' => 0]);

                    $data = ['title' => 'Welcome to PaintBuddy!!'];
                    Mail::send('pages/User/email/deactive', $data, function ($m) {
                        $m->to(Auth::user()->email);
                        $m->subject('PaintBuddy account has been deactivated');
                    });

                    return redirect('logout');
                }else
                    return view('pages/User/login/DeeactiveAccount', ['status' => 'incorrect password!']);






            }
        }
    }

    /**
     * @auther mayura
     * activates user and send notification through email
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postActive()
    {
        $validator = Validator::make(
            [
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            ],
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'required' => 'The :attribute field is required.',
                'email' => 'We need to know your e-mail address!'
            ]
        );
        if ($validator->fails()) {
            return view('pages/User/login/reactive', ['errors' => $validator->errors()]);
        }

        $password=Input::get('password');
        $email=Input::get('email');
        $user = User::where('email', '=', $email)->first();
        if(Hash::check($password, $user->password)){
            DB::table('users')
                ->where('email', '=', $email)
                ->update(['status' => 1]);

            $data = ['title' => 'Welcome to PaintBuddy!!'];

           Mail::send('pages/User/email/reactive', $data, function ($m) {
                $m->to(Input::get('email'));
                $m->subject('PaintBuddy account has been reactivated');
            });

           // return view('pages/User/home', ['message' => '  Your PaintBuddy account has been reactivated. ']);
            return redirect('/')->with('message','  Your PaintBuddy account has been activated. Login to continue !!!!');
        }
        else

            return view('pages/User/login/reactive', ['status' => 'incorrect password!']);
    }


    /**
     * @auther mayura
     * validates image validation
     * get only images
     * updates photo
     * @return \Illuminate\Contracts\View\Factory|Redirect|\Illuminate\View\View
     */
    public function image()
    {
        $login_id=Input::get('login_id');
        if(Auth::loginUsingId($login_id)) {

            $data=array(
                'filefield'=>Request::file('filefield'));

            $rules=array(
                'filefield'=>'required|mimes:jpeg,bmp,png'
            );

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
               // return view('pages/User/login/myAccount', ['img_error' => $validator->errors()]);
                return redirect('myaccount')->with('errors',$validator->errors());
            }
            else{
                $email=Auth::user()->email;
                $file = Request::file('filefield');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
                $destinationPath = 'img\profile';
                $filename = $file->getClientOriginalName();
                Input::file('filefield')->move($destinationPath, $filename);

                $user = new User();
                DB::table('users')
                    ->where('email', $email)
                    ->update(['profile' => $filename]);

               // return redirect('myaccount');
                return redirect('myaccount')->with('alert4','Your image has been changed');
            }
        }
    }
}
