// JavaScript Document
jQuery(document).ready(function() {
		<!-- Js for Menu -->	
	
		jQuery(".toggle_menu a").click(function () {
			jQuery("#topMenu").slideToggle("fast");
			});	
			
		jQuery(".drop-button a").click(function () {
			jQuery(".show_dropdown").slideToggle("fast");
			});	


		/*<!-- Js for BXSLIDER -->
		$('.bxslider').bxSlider({
			captions: true,
			auto:true,
			controls:false,				
			pager: false,			
		});		
		
		<!-- Grid Section -->
		$('.grid-scetion img').css('opacity', 0.7);
		// when hover over the selected image change the opacity to 1  
		$('.grid-scetion li').hover(  
			function(){  
			  $(this).find('img').stop().fadeTo('slow', 1.0);  
			},  
			function(){  
			  $(this).find('img').stop().fadeTo('fast', 0.7);  
		});  */
		
		$('.bxslider1').bxSlider({
			captions: true,
			auto:true,
			controls:false,				
			pager: false	
		});


	/* Fixed Header */
	var lastScroll = 0;
    $(window).scroll(function(event) {
        //Sets the current scroll position
        var st = $(this).scrollTop();
        //Determines up-or-down scrolling
        if (st > lastScroll) {
            $("header").addClass("header_fixed");
    //$("header").css("transition", "background .3s");
        } else {
            //Replace this with your function call for upward-scrolling
            if ($(this).scrollTop() == 0) {

    $("header").removeClass("header_fixed");

            }
        }
        //Updates scroll position
        lastScroll = st;

    	});
	/* Fixed Header */

	/* Fixed Contact Number */   
	$(window).scroll(function(event){
		if($(window).scrollTop() == $(document).height() - $(window).height()){
			$(".fixed_contact_number").css("display","none");
		}else{
			$(".fixed_contact_number").css("display","block");
		}
	});		
	/* Fixed Header */
});	

// Just for practice!!
 // $(document).ready(function(){
// 	$("#ex").mouseenter(function(){
// 		alert("fill this fields to move to next page!!")
// 	});
// 	$("#ex").mouseleave(function(){
// 		alert("Okay bye!!")
// 	});
// 	$(".ex").mousedown(function(){
// 		alert("hey i am ul element!!")
// 	});
// 	$("input").focus(function(){
// 		$(this).css("background-color","#f4eded");
// 	});
// 	$("input").blur(function(){
// 		$(this).css("background-color","#f7cdcd");
// 	});
	// $("button").click(function(){
	// 	$("#fname").val("jainiiiiii");
	// });
 // });

// Function part
function validate()
{
	var firstname = document.getElementById("fname").value;
	var lastname = document.getElementById("lname").value;
	var nameExpression = /^(?=.{1,20}$)[a-z]+(?:['_.\s][a-z]+)*$/i;
	var phoneno = document.getElementById("phn").value;
	var phone = /^\d{10}$/;
	var offno = document.getElementById("off").value;
	var password = document.getElementById("pass").value;
	var confirm_password = document.getElementById("confirmpass").value;
	var passExpression = /^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z\d]{8,}$/;
	var email = document.getElementById("email").value;
	var emailExpression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var about = document.getElementById("about").value;
	var radio1 = document.getElementById("residence1").checked;
	var radio2 = document.getElementById("residence2").checked;
	var check1 = document.getElementById("checkbox_sample18").checked;
	var check2 = document.getElementById("checkbox_sample19").checked;
	var check3 = document.getElementById("checkbox_sample20").checked;
	var month = document.getElementById("month").value;
	var Day = document.getElementById("day").value;
	var year = document.getElementById("year").value;
	var DOB = month+" "+Day+", "+year;
	var msBtwDOBand1970 = Date.parse(DOB);
	var msBtwNowand1970 = Date.now();
	var ageInMs = msBtwNowand1970 - msBtwDOBand1970;
	var ms = ageInMs;
	var second = 1000;
	var minute = second*60;
	var hour = minute*60;
	var day = hour*24;
	var year = day*365;
	var years = Math.round(ms/year);
	var validated = true;

	// Age
	document.getElementById("age").value = years;

	if (!firstname.match(nameExpression)) 
	{
		document.getElementById("fname_err").innerHTML = "Please Enter Valid Firstname.";
		validated = false;
	}
	else
	{
		document.getElementById("fname_err").innerHTML = "";
	}

	if(firstname == "")
	{
		document.getElementById("fname_err").innerHTML = "Firstname is Required.";
		validated = false;
	}

	if (!lastname.match(nameExpression)) 
	{
		document.getElementById("lname_err").innerHTML = "Please Enter Valid Lastname.";
		validated = false;
	}
	else
	{
		document.getElementById("lname_err").innerHTML = "";
	}

	if(lastname == "")
	{
		document.getElementById("lname_err").innerHTML = "Lastname is Required.";
		validated = false;
	}

	if (!phoneno.match(phone)) 
	{
		document.getElementById("phn_err").innerHTML = "Please Enter Valid Phone no.";
		validated = false;
	}
	else
	{
		document.getElementById("phn_err").innerHTML = "";
	}

	if(phoneno == "")
	{
		document.getElementById("phn_err").innerHTML = "Phone no. field is Required.";
		validated = false;
	}

	if(isNaN(offno))
	{
		document.getElementById("off_err").innerHTML = "Only numbers are allowed!";
		validated = false;
	}
	else
	{
		document.getElementById("off_err").innerHTML = "";
	}

	if(offno == "")
	{
		document.getElementById("off_err").innerHTML = "Office no. field is Required.";
		validated = false;
	}

	if (!passExpression.test(password))
	{
		document.getElementById("pass_err").innerHTML = "Please Enter Valid Password.";
		validated = false;
	}
	else
	{
		document.getElementById("pass_err").innerHTML = ""; 
	}

	if(password == "")
	{
		document.getElementById("pass_err").innerHTML = "Password field is Required.";
		validated = false;
	}
	
	if(password != confirm_password)
	{
		document.getElementById("confirmpass_err").innerHTML = "Passwords are not matching.";
		validated = false;
	}
	else
	{
		document.getElementById("confirmpass_err").innerHTML = ""; 
	}

	if(confirm_password == "")
	{
		document.getElementById("confirmpass_err").innerHTML = "Please fill the confirm password field.";
		validated = false;
	}

	if (!emailExpression.test(email))
	{
		document.getElementById("email_err").innerHTML = "Please Enter Valid Email ID.";
		validated = false;
	}
	else
	{
		document.getElementById("email_err").innerHTML = ""; 
	}

	if(email == "")
	{
		document.getElementById("email_err").innerHTML = "Email field is Required.";
		validated = false;
	}

	if((radio1 == "") && (radio2 == "")) 
	{
		document.getElementById("radio_err").innerHTML = "Please select atleast one.";
		validated = false;
	}
	else
	{
		document.getElementById("radio_err").innerHTML = "";
	}

	if((check1 == "") && (check2 == "") && (check3 == "")) 
	{
		document.getElementById("check_err").innerHTML = "Please select atleast one.";
		validated = false;
	}
	else
	{
		document.getElementById("check_err").innerHTML = "";
	}

	if(about == "")
	{
		document.getElementById("about_err").innerHTML = "This field is Required.";
		validated = false;
	}
	else
	{
		document.getElementById("about_err").innerHTML = "";
	}

	return validated;
}