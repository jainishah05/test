/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

//price varies by size
$(document).ready(function(){
	$('#selSize').change( function () {
 		var idSize = $(this).val();
 		var price = $("#getPrice").text();
 	 	$.ajax({
 	 		type: 'get',
 	 		url: '/get-product-price',
 	 		data: {idSize:idSize},
 	 		success:function(data){
 	 			// alert(data);
 	 			$('#hiddenprice').val(parseInt(data) + parseInt(price));
 	 			$('#price').html(parseInt(data) + parseInt(price));
 	 		}
 	 	});
    }).change();
});

//check current user password
$(document).ready(function(){
	$('#current_password').keyup( function () {
 		var current_pwd = $(this).val();
 	 	$.ajax({
 	 		type: 'get',
 	 		url: 'account/check-user-pwd',
 	 		data: {current_pwd:current_pwd},
 	 		success:function(pwd){
 	 			// alert(pwd);
 	 			if(pwd == "false")
 	 			{
 	 				$('#chk_pwd').html("<font color='red'>Current Password is incorrect</font>");
 	 			}
 	 			else if(pwd == "true"){
 	 				$('#chk_pwd').html("<font color='green'>Current Password is correct</font>");
 	 			}
 	 		},error:function(){
 	 			alert('Error');
 	 		}
 	 	});
    });
});

//Copy billing address to shipping address
$(document).ready(function(){
	$('#billtoship').on('click',function () {
 		if(this.checked){
 			// alert('success');
 			$('#shipping_firstname').val($('#billing_firstname').val());
 			$('#shipping_lastname').val($('#billing_lastname').val());
 			$('#shipping_address').val($('#billing_address').val());
 			$('#shipping_city').val($('#billing_city').val());
 			$('#shipping_state').val($('#billing_state').val());
 			$('#shipping_country').val($('#billing_country').val());
 			$('#shipping_pincode').val($('#billing_pincode').val());
 			$('#shipping_mobile').val($('#billing_mobile').val());
 		}
 		else{
 			$('#shipping_firstname').val('');
 			$('#shipping_lastname').val('');
 			$('#shipping_address').val('');
 			$('#shipping_city').val('');
 			$('#shipping_state').val('');
 			$('#shipping_country').val('');
 			$('#shipping_pincode').val('');
 			$('#shipping_mobile').val('');
 		}
    });
});

//Select Payment method
function selectPaymentMethod(){
    //alert('success');
    if($('#Paypal').is(':checked') || $('#COD').is(':checked'))
    {
    	// alert('test');
    }
    else
    {
    	// alert('Please select payment method!');
    }
}

function enableSubscriber()
{
	$('#subscriber_status').hide();
 	$('#btnsubmit').show();
}

//check and add Subscriber to newsletter table
function addSubscriber(){
	var subscriber_email = $('#subscriber_email').val();
    $.ajax({
 	 	type: 'post',
 	 	url: '/add-subscriber-email',
 	 	data: {subscriber_email:subscriber_email},
 	 	success:function(resp){
 	 		if(resp == "exits")
 	 		{
 	 			$('#subscriber_status').show();
 	 			$('#btnsubmit').hide();
 	 			$('#subscriber_status').html("<font color='red'>Error:Subscriber email already exits!</font>");
 	 		}
 	 		else if(resp == "saved"){
 	 			$('#subscriber_status').show();
 	 			$('#subscriber_status').html("<font color='green'>Success:Thanks for subscribing!</font>");
 	 			$('#subscriber_email').val('');
 	 		}
 	 	}
 	}); 	 
}
