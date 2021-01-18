<?php

namespace App\Http\Controllers;

use App\Models\MemoryCard;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\LoadMemoryCardRequest;

class MemoryCardController extends Controller
{
    public function show(Request $request){
        if( $request->session()->has('code') ){
            $code = $request->session()->get('code');
            return view('memorycards.show')
                ->with('code', $code);
        } else {
            return view('memorycards.show');
        }
    }

    public function create(Request $request){
        $code = $this->generateRandomString(6);
        while(MemoryCard::exists($code)){
            $code = $this->generateRandomString(6);
        }
        MemoryCard::create(['code' => $code]);
        $request->session()->put('code', $code);
        return view('memorycards.show')
            ->with('code', $code);
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

    public function load(LoadMemoryCardRequest $request, MessageBag $message_bag){
        $code = $request->input('code');
        if(! MemoryCard::exists($code)){
            $message_bag->add('code', 'The save file does not exist');
            return redirect('/memorycards')->withErrors($message_bag);
        } else {
            $request->session()->put('code', $code);
            return redirect('/memorycards');
        }
    }
}
