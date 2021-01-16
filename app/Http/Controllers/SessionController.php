<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\SessionLoadRequest;

class SessionController extends Controller
{
    public function show(Request $request){
        if( $request->session()->has('code') ){
            $code = $request->session()->get('code');
            return view('sessions.show')
                ->with('code', $code);
        } else {
            return view('sessions.show');
        }
    }

    public function create(Request $request){
        $code = $this->generateRandomString(6);
        while(Session::exists($code)){
            $code = $this->generateRandomString(6);
        }
        Session::create(['code' => $code]);
        $request->session()->put('code', $code);
        return view('sessions.show')
            ->with('code', $code);
    }

    public function load(SessionLoadRequest $request, MessageBag $message_bag){
        $code = $request->input('code');
        if(! Session::exists($code)){
            $message_bag->add('code', 'The session code does not exist');
            return redirect('/session')->withErrors($message_bag);
        } else {
            $request->session()->put('code', $code);
            return redirect('/session');
        }
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
