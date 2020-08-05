<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use App\Helper;
use App\Banner;
use App\Category;
use App\Country;
use App\Product;
use App\User;
use App\CmsPage;
use App\ContactUs;
use Auth;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Sharing categories object to all views
        $categories = Category::all();
        View::share('categories', $categories);

        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::where('status','1')->get();
        $product = Product::all();
        $Feature_product = Product::where('featured','on')->get();
        $recommended_product = Product::where('recommended','on')->get();
        return view('site.home',compact('banners','product','Feature_product','recommended_product'));
    }
    public function welcome()
    {
        $banners = Banner::where('status','1')->get();
        $product = Product::all();
        $Feature_product = Product::where('featured','on')->get();
        $recommended_product = Product::where('recommended','on')->get();
        return view('site.welcome',compact('banners','product','Feature_product','recommended_product'));
    }
    public function account(Request $request)
    {
        $user_id = Auth::user()->id;
        $userDetails = User::findOrFail($user_id);
        $countries = Country::all();

        if($request->isMethod('post')) {
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'city' => 'required|alpha',
                'state' => 'required|alpha',
                'country' => 'required',
                'pincode' => 'required|numeric',
                'mobile' => 'required|regex:/(01)[0-9]{9}/'
            ]);
            $data = $request->all();
            $userDetails->firstname = $data['firstname'];
            $userDetails->lastname = $data['lastname'];
            $userDetails->address = $data['address'];
            $userDetails->city = $data['city'];
            $userDetails->state = $data['state'];
            $userDetails->country = $data['country'];
            $userDetails->pincode = $data['pincode'];
            $userDetails->mobile = $data['mobile'];
            $userDetails->save();
            return redirect()->back()->with('flash_message_success','Your account details has been successfully updated!');
        }
        return view('site.account',compact('countries','userDetails'));
    }

    public function checkPassword(Request $request)
    {
        $data = $request->current_pwd;
        // echo "<pre>"; print_r($data);die;
        $current_password = $data;
        $user_id = Auth::user()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password))
        {
            echo "true";die;
        }
        else
        {
            echo "false";die;
        }
    }

    public function updatePassword(Request $request)
    {
        if($request->isMethod('post')) {
            $this->validate($request, [
                'current_password' => 'required|min:8',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:new_password',
            ],
            $messages = [
                'confirm_password.same' => 'Password Confirmation should match the Password'
            ]
            );
        
            $old_pwd = User::findOrFail(Auth::user()->id);
            if(Hash::check($request->current_password,$old_pwd->password))
            {
                //Update password
                $new_pwd = bcrypt($request->new_password);
                User::where('id',Auth::user()->id)->update(['password' => $new_pwd]);
                return redirect()->back()->with('flash_message_success','Password updated successfully!'); 
            }
            else
            {
                return redirect()->back()->with('flash_message_error','Current password is incorrect');
            }
        }
    }

    public function cmsPage($url = null)
    {
        //Redirect to 404 if CMS page is disabled or does not exits
        $cmsPageCount = CmsPage::where(['url' => $url,'status' => 1])->count();
        if ($cmsPageCount > 0) {
            $cmsPageDetails = CmsPage::where('url',$url)->first();       
        }
        else
        {
            abort(404);
        }

        return view('site.cmsPage',compact('cmsPageDetails'));
    }

    public function contactUs(Request $request)
    {
        if($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]);
            $contactDetails = new ContactUs();
            $contactDetails->name = $request->name;
            $contactDetails->email = $request->email;
            $contactDetails->subject = $request->subject;
            $contactDetails->message = $request->message;
            $contactDetails->save();

            //Send contact email to Admin
            $email = emailTemplate('contact_us');
            $email->message =   str_replace("{RECIPIENT}","Admin",$email->message);
            $email->message =   str_replace("{SENDER}",$request->name,$email->message);
            $email->message =   str_replace("{NAME}",$request->name,$email->message);
            $email->message =   str_replace("{EMAIL}",$request->email,$email->message);
            $email->message =   str_replace("{SUBJECT}",$request->subject,$email->message);
            $email->message =   str_replace("{COMMENT}",$request->name,$email->message);
            $email->message =   str_replace("{SITE_NAME}","ShoppingCart",$email->message);

            $emailData = [
                'email' => $request->email,
                'subject' => $email->subject,
                'mess' => $email->message
            ];

            $mailctrl = new MailController();
            $mailctrl->basic_email($emailData);

            return redirect()->back()->with('flash_message_success','Thanks for contacting us!');
        } 

        return view('site.contact-us');
    }
}
