<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsletterSubscriber;
use Newsletter;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
          'subscriber_email' => 'required|email'
        ]);

        if (! Newsletter::isSubscribed($request->subscriber_email)) 
        {
            Newsletter::subscribe($request->subscriber_email);
            return redirect()->back()->with('flash_message_success', 'Thanks For Subscribe!');
        }
        else
        {
            return redirect()->back()->with('flash_message_error', 'Sorry! You have already subscribed!');
        }
            
    }


    // public function addSubscriber(Request $request)
    // {
    // 	if($request->ajax()) {
    // 		$subscriber_email = $request->subscriber_email;
    // 		$subscriberCount = NewsletterSubscriber::where('email',$subscriber_email)->count();
    		
    // 		if ($subscriberCount > 0) {
    // 			echo "exits";
    // 		}
    // 		else {
    // 			$newsletter = new NewsletterSubscriber;
    // 			$newsletter->email = $subscriber_email;
    // 			$newsletter->status = 1;
    // 			$newsletter->save();
    // 			echo "saved";
    // 		}
    // 	}
    // }
}
