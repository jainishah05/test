// JavaScript Document
jQuery(document).ready(function() {


	// Form validation

	$("#fname_check").hide();
	$("#lname_check").hide();
	$("#phno_check").hide();
	$("#offno_check").hide();
	$("#pass_check").hide();
	$("#confirmpass_check").hide();
	$("#gender_check").hide();
	$("#hobby_check").hide();
	$("#about_check").hide();

	var fname_err = true;
	var lname_err = true;
	var phno_err = true;
	var offno_err = true;
	var pass_err = true;
	var confirmpass_err = true;
	var gender_err = true;
	var hobby_err = true;
	var about_err = true;
	var nameExp = /^([a-zA-Z]{3,10})$/;
	var phnExp = /^\d{10}$/;
	var offExp = /^\d{3,}$/;
	var emailExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var passExp = /^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z\d]{8,}$/;
	var age = "";

// function-calling part
	$("#fname").on('keypress keydown keyup',function(){
		fnamecheck();
	});

	$("#lname").on('keypress keydown keyup',function(){
		lnamecheck();
	});

	$("#phno").on('keypress keydown keyup',function(){
		phnocheck();
	});

	$("#offno").on('keypress keydown keyup',function(){
		offnocheck();
	});

	$("#email").on('keypress keydown keyup',function(){
		emailcheck();
	});

	$("#pass").on('keypress keydown keyup',function(){
		passcheck();
	});

	$("#confirmpass").on('keypress keydown keyup',function(){
		confirmpasscheck();
	});

	$("#about").on('keypress keydown keyup',function(){
		aboutcheck();
	});
// ----------------------------------------------------------------------------------

// function-definition part

	// firstname
	function fnamecheck()
	{
		var fname = $("#fname").val();

		if (!fname.match(nameExp))
		{
            $("#fname_check").show();
			$("#fname_check").html("Please Enter valid Name");
			fname_err = false; 
		}
		else
		{
			$("#fname_check").hide();
		}

		if(fname.length == '')
		{
			$("#fname_check").show();
			$("#fname_check").html("Firstname is Required.");
			fname_err = false;
		}
	}

	// lastname
	function lnamecheck()
	{
		var lname = $("#lname").val();

		if (!lname.match(nameExp))
		{
            $("#lname_check").show();
			$("#lname_check").html("Please Enter valid Name");
			lname_err = false; 
		}
		else
		{
			$("#lname_check").hide();
		}

		if(lname.length == '')
		{
			$("#lname_check").show();
			$("#lname_check").html("Lastname is Required.");
			lname_err = false;
		}
	}

	// phoneNo.
	function phnocheck()
	{
		var phno = $("#phno").val();

		if (!phno.match(phnExp))
		{
            $("#phno_check").show();
			$("#phno_check").html("Please Enter valid Phone No.");
			phno_err = false; 
		}
		else
		{
			$("#phno_check").hide();
		}

		if(phno.length == '')
		{
			$("#phno_check").show();
			$("#phno_check").html("Phone No. Field is Required.");
			phno_err = false;
		}
	}

	// OfficeNo
	function offnocheck()
	{
		var offno = $("#offno").val();

		if(!offno.match(offExp))
		{
            $("#offno_check").show();
			$("#offno_check").html("Please Enter valid Office No.");
			offno_err = false; 
		}
		else
		{
			$("#offno_check").hide();
		}

		if(offno.length == '')
		{
			$("#offno_check").show();
			$("#offno_check").html("Office No. Field is Required.");
			offno_err = false;
		}
	}

	// Email
	function emailcheck()
	{
		var email = $("#email").val();

		if(!email.match(emailExp))
		{
            $("#email_check").show();
			$("#email_check").html("Please Enter valid Email ID.");
			email_err = false; 
		}
		else
		{
			$("#email_check").hide();
		}

		if(email.length == '')
		{
			$("#email_check").show();
			$("#email_check").html("Email Field is Required.");
			email_err = false;
		}
	}

	// password
	function passcheck()
	{
		var pass = $("#pass").val();

		if(!pass.match(passExp))
		{
            $("#pass_check").show();
			$("#pass_check").html("Please Enter Password of length 8 which must contain alphanumeric characters.");
			pass_err = false; 
		}
		else
		{
			$("#pass_check").hide();
		}

		if(pass.length == '')
		{
			$("#pass_check").show();
			$("#pass_check").html("Password Field is Required.");
			pass_err = false;
		}
	}

	// Confirm password
	function confirmpasscheck()
	{
		var confirmpass = $("#confirmpass").val();
		var pass = $("#pass").val();

		if(confirmpass != pass)
		{
            $("#confirmpass_check").show();
			$("#confirmpass_check").html("Passwords are not matching.");
			confirmpass_err = false; 
		}
		else
		{
			$("#confirmpass_check").hide();
		}

		if(confirmpass.length == '')
		{
			$("#confirmpass_check").show();
			$("#confirmpass_check").html("Confirm Password Field is Required.");
			confirmpass_err = false;
		}
	}

	// gender
	function gendercheck()
	{
		var result = $('input[type = "radio"]:checked');

		if(result.length < 1)
		{
			$("#gender_check").show();
			$("#gender_check").html("Please select atleast one.");
			gender_err = false;
			
		}
		else
		{
			$("#gender_check").hide();
		}
	}

	// Hobby
	function hobbycheck()
	{
		var checkresult = $('input[type = "checkbox"]:checked');

		if(checkresult.length < 1)
		{
			$("#hobby_check").show();
			$("#hobby_check").html("Please select atleast one Hobby");
			hobby_err = false;
			
		}
		else
		{
			$("#hobby_check").hide();
		}
	}

	// Date
	$("#dob").datepicker({
		onSelect: function(value,ui){
			var today = new Date();
			age = today.getFullYear() - ui.selectedYear;
			// alert(age);
			$("#age").val(age);
		},
		numberOfMonths: 1,
		changeYear: true,
		changeMonth: true,
		showOtherMonths: true,
	});

	// about
	function aboutcheck()
	{
		var about = $("#about").val();

		if(about == "")
		{
            $("#about_check").show();
			$("#about_check").html("This field is Required.");
			about_err = false; 
		}
		else
		{
			$("#about_check").hide();
		}
	}
// -----------------------------------------------------------------------------------------

// button click
	$("#submit").click(function(){
		fname_err = true;
		lname_err = true;
		phno_err = true;
		offno_err = true;
		pass_err = true;
		confirmpass_err = true;
		about_err = true;
		gender_err = true;
		hobby_err = true;

		fnamecheck();
		lnamecheck();
		phnocheck();
		offnocheck();
		emailcheck();
		passcheck();
		confirmpasscheck();
		aboutcheck();
		gendercheck();
		hobbycheck();
	});

// ------------------------------------------------------------------------------------------
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


