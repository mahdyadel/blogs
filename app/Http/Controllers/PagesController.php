<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Mail;

class PagesController extends Controller
{
    public function welcom(){

        $posts = Post::orderBy('created_at' , 'desc')->limit(4)->get();
        return view('pages.welcome ' , compact('posts'));
    }

    public function about(){

        return view('pages.about');
    }
    
    public function contact(){

        return view('pages.contact');
    }

    public function postContact(Request $request){

        $request->validate([

            'email'     =>      'required|email',
            'subject'   =>      'min:3',
            'message'   =>      'min:5',
        ]);
        $data = array(

            'email'   =>  $request->email,
            'subject' =>  $request->subject,
            'bodyMessage' =>  $request->message,
            // 'survey'        => ['Q1' => "hello" , 'Q2' => 'Yes']
        );

        Mail::send('emails.contact' , $data , function(){

            $message->from( $data['email']);
            $message->to('hello@mahdyadel.io');
            $message->subject($data['subject']);

        });


    }
}
