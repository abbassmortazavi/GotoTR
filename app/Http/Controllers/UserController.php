<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use App\Models\ActivationCode;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DemeterChain\A;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Exception;


class UserController extends Controller
{
    const LoginExpirationInterval = 24;

    public function login(Request $request)
    {

        //$token = uniqid(base64_encode(Str::random(10)));

        $validator = Validator::make($request->all() , [
            'tell' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11'
             ]);

        if ($validator->fails())
        {
            return back()->withErrors(['message'=>'شماره موبایل باید 11 رقم باشد']);
        }
        $checkMobile = $request->tell;

        $checkMobileInTable = User::whereTell($checkMobile)->first();
        if ($checkMobileInTable)
        {
            $checkCodes = ActivationCode::where('tell',$request->tell)->get();
            if ($checkCodes)
            {
                foreach ($checkCodes as $checkCode)
                {
                    $checkCode->delete();
                }
            }

            $code = ActivationCode::createCode($checkMobileInTable)->code;

            //send sms
            $this->sms($code , $checkMobile);

            $data['success'] = 0;
            $data['msg'] = "پیام با موفقیت ارسال شده است.";
            $data['status'] = 200;
            $data['code'] = $code;
            //$data['token'] = $token;
            return view('auth.verifyCode' , compact('checkMobile'));
        }


        if ($checkMobile)
        {
            $checkCodes = ActivationCode::where('tell',$request->tell)->get();
            if ($checkCodes)
            {
                foreach ($checkCodes as $checkCode)
                {
                    $checkCode->delete();
                }
            }


            $user = User::create([
                'tell'=>$request->tell
            ]);

            $code = ActivationCode::createCode($user)->code;

            //send sms
            $this->sms($code , $checkMobile);

            $data['success'] = 0;
            $data['msg'] = "پیام با موفقیت ارسال شده است.";
            $data['status'] = 200;
            $data['code'] = $code;
            //$data['token'] = $token;
//            return response()->json($data);
            return view('auth.verifyCode' , 'checkMobile');
        }else{
            return response()->json(403)->header('status' , 403);
        }

    }

    public function resendCode(Request $request)
    {
        $checkMobile = $request->tell;
        $code = ActivationCode::whereTell($checkMobile)->first();
        $user = User::whereTell($checkMobile)->first();
        $created_at = $code->created_at;
        $now = Carbon::now();
        $startTime = $created_at;
        $endTime = $now;
        $totalDuration = $endTime->diffInMinutes($startTime);

       if ($totalDuration >= 1){

           $checkCodes = ActivationCode::where('tell',$request->tell)->get();
           if ($checkCodes)
           {
               foreach ($checkCodes as $checkCode)
               {
                   $checkCode->delete();
               }
           }

           $code = ActivationCode::createCode($user)->code;



           //send sms
           $this->sms($code , $checkMobile);

           $data['success'] = 0;
           $data['msg'] = "پیام با موفقیت ارسال شده است.";
           $data['status'] = 200;
           $data['code'] = $code;
           //$data['token'] = $token;
           return view('auth.verifyCode' , compact('checkMobile'));
       }
        return back()->withErrors(['message'=>'After 10 minute You can send yor request!!!']);
    }

    public function sms($code , $mobile)
    {
        $code = rand(1111,9999);
        return $code;
        /*try{

            $username = '';
            $password = '';
            $api = new MelipayamakApi($username,$password);
            $sms = $api->sms();
            $to = $mobile;
            //$from = '500010607920';
            $from = '20001100';
            $text = 'کد تایید شما:'.$code;
            $response = $sms->send($to,$from,$text);
            $json = json_decode($response);
            //echo $json->Value; //RecId or Error Number
        }catch(Exception $e){
            echo $e->getMessage();
        }*/
    }

    public function checkCode(Request $request)
    {
        $user = User::whereTell($request->tell)->first();
        $checkMobile = $request->tell;

        if ($user) {
            $checkCode = ActivationCode::where('tell', $checkMobile)->where('code', $request->code)->first();
            if ($checkCode)
            {
                $codeError = $this->activation($checkCode->code);
                //dd($codeError);
                if ($codeError)
                {
                    return $codeError;
                }
            }


            if ($checkCode) {
                $data['success'] = 0;
                $data['msg'] = "کد اوکی";
                $data['status'] = 200;
                $data['statusCode'] = 4;
                Auth::login($user);
                return view('home');
            } else
            {
                $data['success'] = 1;
                $data['msg'] = "code wrong";
                $data['statusCode'] = 1;
                $data['status'] = 400;
//                return response()->json($data);
                return back()->withErrors(['message'=>'code wrong']);
            }

        }else{
            return response()->json(403)->header('status' , 403);
        }
    }

    public function activation($code)
    {
        $activationCode = ActivationCode::whereCode($code)->first();

        if (! $activationCode)
        {
            $data['success'] = 1;
            $data['msg'] = "code not exist";
            $data['statusCode'] = 1;
            $data['status'] = 400;
//            return response()->json($data);
            return back()->withErrors(['message'=>'code not exist']);
        }

        if ($activationCode->expire < Carbon::now())
        {
            $data['success'] = 1;
            $data['msg'] = "code is expire";
            $data['statusCode'] = 2;
            $data['status'] = 400;
//            return response()->json($data);
            return back()->withErrors(['message'=>'code is expire']);
        }

        if ($activationCode->used == true)
        {
            $data['success'] = 1;
            $data['msg'] = "code is used";
            $data['statusCode'] = 3;
            $data['status'] = 400;
//            return response()->json($data);
            return back()->withErrors(['message'=>'code is used']);
        }


        $activationCode->update([
            'used' => true
        ]);

    }

    public function register(Request $request)
    {
        $this->validate($request , [
            'name' => ['required', 'string', 'max:255'],
            'tell' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:4'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'tell' => $request['tell'],
            'email_verification_token' => Str::random(32)
        ]);

        Mail::to($user->email)->send(new VerificationEmail($user));
        return back()->withErrors(['message'=>'register SuccessFully']);
    }

}
