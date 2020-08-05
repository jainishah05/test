<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function basic_email($data) 
    {  
      	// dd($data);
	    Mail::send('email', $data, function($message) use($data){
	        $message->to('jainishah.0506@gmail.com', 'Admin')->subject
	            ($data['subject']);
	    });
    }

    public function success_email($data) 
    {  
	   	// dd($data); 
	    Mail::send('email', $data, function($message)use($data) {
	         $message->to($data['email'])->subject
	            ($data['subject']);
	   	});
   }
}
