<?php

use Illuminate\Support\Facades\DB;
use App\Configuration;
use App\EmailTemplate;

use Illuminate\Http\Request;

	if (! function_exists('get_config')) 
	{
	    function get_config($type,$default=null) 
	    { 
	     	return Configuration::where('type', $type )->first()->toArray()['value'];  
	    }
	}

	if (! function_exists('update')) 
	{
	    function update($id,$value) 
	    { 
	    	$updateData = Configuration::find($id);
	    	$updateData->update(array('value'=>$value));
        	return redirect()->back();  
	    }
	}

	if (! function_exists('emailTemplate')) 
	{
	    function emailTemplate($slug)
		{
		  return $email = EmailTemplate::where('slug',$slug)->first();
		}
	}
	
?>