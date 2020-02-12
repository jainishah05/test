<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="assignment.css">
<style type="text/css">
ul.navbar {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
/**{
	font-family: sans-serif !important; 
}*/
li.baritem {
  float: left;
}

li.baritem a {
  display: block;
  color: rgb(100,100,100);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li.baritem a:hover {
  color: rgb(160,208,65);
}
.container{
  width: 100%;
  position: absolute;
  z-index: 1;
}
.progressbar li{
  float: left;
  width: 12%;
  position: relative;
  text-align: center;
  font-size: 20px;
  color: white;
}
.progressbar{
  counter-reset: step;
  margin-left: 230px;
}
.progressbar li:before{
  content:counter(step);
  counter-increment: step;
  width: 30px;
  height: 30px;
  padding: 10px;
  border: 4px solid #c9e24d;
  display: block;
  margin: 0 auto 10px auto;
  border-radius: 50%;
  line-height: 27px;
  background: white;
  color: #91A823;
  text-align: center;
  font-weight: bold;
}
.progressbar li:after{
  content: '';
  position: absolute;
  width:100%;
  height: 3px;
  background: white;
  top: 15px;
  left: -50%;
  z-index: -1;
}
.progressbar li:first-child:after{
content: none;
}
.progressbar li.active + li:before{
border-color: white;
background:rgb(88, 114, 9);
color: white;
}
.progressbar li:first-child:before{
border-color: white;
background: rgb(88, 114, 9);
color: white;
}
.progressbar li.active + li:after{
 background: rgb(88, 114, 9);
}
</style>

	<title>Vital partners</title>
</head>
<body>
<header>
<div class="head">
		<div class="logo">
		<img src="images/logo.png" alt="Vital Partners" id="logo">
		</div>

		<div class="help">
		<form action="">
    		<label style="margin-left: 120px; margin-right: 10px; color: rgb(60,60,60); font-style: oblique;">Contact us Today! (02)90178413</label>
    		<input type="text" name="sengine" placeholder="search">
			<ul class="navbar">
  				<li class="baritem"><a class="active" href="#home">Home</a></li>
				<li class="baritem"><a href="#about">About-us</a></li>
				<li class="baritem"><a href="#how">How Vital Works</a></li>
				<li class="baritem"><a href="#client">Client</a></li>
				<li class="baritem"><a href="#blog">Dating Blog</a></li>
				<li class="baritem"><a href="#vital">Why Vital</a></li>
			</ul>
		</div>
	</div>
</header>
<div class="div2">
	<div style="width: 100%;height: 80px;background-color: rgba(60,60,60,0.6);">
		<table width="100%">
		<tr>
			<td style="height: 76px;width: 29%"><img src="images/icon5.png"; height="70px"; width="56px"; align="right"></td>
			<td style="height: 76px;width: 42%"><p style="color: white; text-align: center; font-size: 25px">FREE:27 Checklist to The Relationship You Want</p></td>
			<td style="height: 76px;width: 29%"><button class="btn"> Download Now </button></td>	
		</tr>
		</table>
	</div>
	<div class="flex2">
		<div><a href="#"><img src="images/video-play-btn.png"  style="background-color: rgba(140, 178, 3,0.7);padding-left: 53px; padding-right: 53px; padding-top: 24px; padding-bottom: 24px;margin-top: 170px"></a>
		</div>
		<div>
			<h1 style="font-family: sans-serif; font-weight: 200;padding-top: 70px;padding-left: 80px;padding-right: 50px;color: rgb(0,0,0);opacity: 0.8; line-height: 40px">Lorem Ipsum as their default model text & a search for 'lorem ipsum' will uncover many web sites.</h1>
			<button class="cbtn">Contact Us Now!<img src="images/icon1.png" style="margin: -3.5px 2px;"></button>
		</div> 
	</div>
</div>
<div class="div3" id="about">
	<div style=" width: 50%; height: 100%; float: left; ">
		<h2 style="color: rgb(0,0,0); font-family: Times New Roman;font-size:
		50px;font-weight: 200; margin-left: 100px;"> <blockquote>About Us</blockquote></h2>
		<h1 style="color: gray; font-family: Times New Roman; font-weight: 250;margin-left: 100px;"> <blockquote>It's a istablished fact that a reader will be distracted.</blockquote></h1>
		<h4 style="color: rgba(60,60,60,0.9); font-family: Times New Roman; font-weight: 250;margin-left: 100px;"><blockquote><strong>The point of using lorem lpsum is</strong> that it has more-or-less normal bution of letters,as opposed to using 'Content here,content here',making look like redable English.</blockquote></h4>
		<h4 style="color: rgba(60,60,60,0.9); font-family: Times New Roman; font-weight: 250;margin-left: 100px;"><blockquote><strong>There are many variations of passages of</strong> lorem lpsum available,but the majority have suffer alteration in some form.</blockquote></h4>
		<ul style="color: rgba(60,60,60,1);font-family: Times New Roman; font-weight: 250;margin-left: 100px;list-style-image:url('images/arrow1.png')"><blockquote>
  				<li><strong>2000 years old Rechard McClint</strong></li>
				<li><strong>1914 translation by H. Rackham</strong></li>
				<li><strong>de Finibus Bonorum et Malorum</strong></li>
				</blockquote>
				<button class="cbtn">Contact Us Now!<img src="images/icon1.png" style="margin: -3.5px 2px;"></button>
		</ul>
	</div>
	<div style=" width: 50%; height: 100%; float: right;">
		<img src="images/about.png" height="300px" width="270px" style="margin-top: 150px; margin-left: 100px; opacity: 0.9">
	</div>
</div>
<div class="div4" id="how">	
	<p style="color: white; text-align: center; font-family: Verdana; margin-top: 0px; padding-top: 100px; font-size: 50px; color: rgb(255,255,255); margin-bottom: 0px">How Vital Works</p>
		<p style="color: white; text-align: center; font-family: Verdana; margin-top: 0px; padding-top: 20px; font-size: 30px; color: rgba(255,255,255,0.9); margin-bottom: 0px">Step,Hop Or Skip Your Way To Happiness.</p>
		<div class="container" style="margin-top: 50px;">
          <ul class="progressbar" style="list-style-type:none;">
            <li class="active">Step 1</li>
            <li class="active">Step 2</li>
            <li>Step 3</li>
            <li>Step 4</li>
            <li>Step 5</li>
            <li>Step 6</li>
          </ul>
      </div>
</div>
<div class="div5">
	<pre style="text-align: center; font-size: 20px;font-family:sans-serif;margin-top: 50px; padding-top: 20px;color: rgba(0,0,0,0.7)">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has
	been the industry's standard dummy text ever since the 1500s, when an unknown printer took a 
galley of type and scrambled it to make a type specimen book.</pre>
	<div class="flex5">
	  <div>
	  	<img src="images/icon2.png" style="margin-top: 40px;">
	  	<h1 style="color: rgba(0,0,0,0.9);font-family: sans-serif; margin-top: 0px; font-weight: 150;">Why do we use it?<h1>
	  	<p style="color: rgba(0,0,0,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;margin-left: 20px;margin-right: 20px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,as opposed to using 'Content here, content here'.</p>
	  	<p style="color: rgba(0,0,0,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;margin-left: 20px;margin-right: 20px;">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
	  	<button class="cbtn">Get Started<img src="images/icon4.png" style="margin: -3.5px 2px;"></button>
	  </div>
	  <div>
	  	<img src="images/icon3.png" style="margin-top: 40px;">
	  	<h1 style="color: rgba(0,0,0,0.9);font-family: sans-serif; margin-top: 0px; font-weight: 150;">What is Lorem Ipsum?<h1>
	  	<p style="color: rgba(0,0,0,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;margin-left: 20px;margin-right: 20px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	  	<p style="color: rgba(0,0,0,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;margin-left: 20px;margin-right: 20px;">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	  	<button class="cbtn">Get Started<img src="images/icon4.png" style="margin: -3.5px 2px;"></button>
	  </div>  
	</div>
</div>
<div class="div6" id="client">
	<div class="flex6">
		<div style="height: 25%"><h1 style="font-family: sans-serif;color: white;font-weight: 200;margin-top: 50px;font-size: 50px">What Our clients Say</h1></div>
		<div style="height: 35%">
			<div style="height: 100%; width: 35%; float: left;">
				<a href=""><img src="images/prev_btn.png" style="margin-top: 70px;"></a>
			</div>
			<div style="height: 100%; width: 30%; float: left;">
				<img src="images/our_team_zoe.jpg" height="150" width="150" style="border-radius: 50%;border:5px solid #A5C733; padding: 8px">
			</div>
			<div style="height: 100%; width: 35%; float: left;">
				<a href=""><img src="images/next_btn.png" style="margin-top: 70px;"></a>
			</div>
		</div>
		<div style="height: 40%">
			<blockquote style="margin-left: 230px; margin-right: 230px;color: white;font-size: 20px;font-family: sans-serif;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</blockquote>
			<h4 style="color: white;font-size: 20px;font-family: sans-serif;"> -MT Chatswood
		</div>
	</div>
</div>
<div class="div7" id="blog">
	<p style="text-align: center;font-family: sans-serif;color: rgb(0,0,0,0.8); padding-top: 20px;font-size: 50px"> Our Latest Blog Posts!</p>
	<div class="flex7">
		<div>
			<img src="images/user1.png" width="100%">
			<h3 style="color: rgba(20,19,19,0.9);font-family: sans-serif;">Search for 'lorem ipsum' will uncover many web sites.<h3>
			<p style="color: rgba(53,51,51,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
			<button class="rbtn">Read More</button>
		</div>
		<div>
			<img src="images/user2.png" width="100%">
			<h3 style="color: rgba(20,19,19,0.9);font-family: sans-serif;">Search for 'lorem ipsum' will uncover many web sites.<h3>
			<p style="color: rgba(53,51,51,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
			<button class="rbtn">Read More</button>
		</div>
		<div>
			<img src="images/user3.png" width="100%">
			<h3 style="color: rgba(20,19,19,0.9);font-family: sans-serif;">Search for 'lorem ipsum' will uncover many web sites.<h3>
			<p style="color: rgba(53,51,51,0.9);font-family: sans-serif;font-weight: 150;font-size: 17px;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
			<button class="rbtn">Read More</button>
		</div>  
	</div>
</div>
<div class="div8">
	<table width="100%">
		<tr>
			<td style="height: 76px;width: 35%"><img src="images/icon5.png"; height="70px"; width="56px"; align="right"></td>
			<td style="height: 76px;width: 30%"><p style="color: white; text-align: center; font-size: 25px">Simply Dummy Text Of The File!</p></td>
			<td style="height: 76px;width: 35%"><button class="btn"> Download Now </button></td>	
		</tr>
	</table>
</div>
<div class="footer" id="vital">
	<div class="footer1">
		<div style="width: 37%">
			<div style="width: 100%; height: 60%">
				<img src="images/foot_logo.png" alt="Vital Partners" style="margin-top: 60px" width="290px" height="60px">
			</div>
			<div style="width: 100%; height: 25%">
				<h1 style="text-align: right; font-family: DauphinPlain; font-weight: 150; color: #F9F9F9; font-style: oblique; margin-top: 0px;">Call us Today! (02)90178413</h2>
			</div>
		</div>
		<div style="width: 50%">
			<div style="width: 100%; height: 35%">
				<p style="color:#C2C2C2 ;font-family: sans-serif;font-weight: 150;font-size: 22px; margin-top: 70px; margin-left: 8px;">
					<span>Shortcut to your search happiness right now.</span><br>
					<span>Live a life without regrets and take action today!</span>
				</p>
			</div>
			<div style="width: 100%; height: 25%">
				<button class="fbtn" style="margin-left: 15px;">Book an Appoinment<img src="images/icon7.png" style="margin: -3px 6px;"></button>
				<button class="fbtn" style="margin-left: 20px;">Contact a Consultant<img src="images/icon6.png" style="margin: -3px 6px;"></button>
			</div>		
		</div>
	</div>
	<div class="footer2">
		<div>
			<h3 style="font-family: verdana; color: #F9F9F9;font-weight: 60;text-align: left;"> CONTACT INFO </h1>
			<p style="text-align: left; line-height: 25px;">
				<span style="color: #b7b7b7;">4/220 George St,Sydney NSW 2000</span><br>
				<span style="color: #848383;">Phone:(02)90178413</span><br>
				<span style="color: #848383;">Email:info@vitalpartners.com</span>
			</p>
			<p style="text-align: left;line-height: 25px;">
				<span style="color: #b7b7b7;">Camberra City ACT 2600</span><br>
				<span style="color: #848383;">Phone:(02)90178426</span><br>
				<span style="color: #848383;">Email:can@vitalpartners.com</span>
			</p>
		</div>
		<div>
			<h3 style="font-family: verdana; color: #F9F9F9;font-weight: 60;text-align: left;"> RECENT POSTS </h1>
			<ul style="color: #848383;font-family: verdana;list-style-image:url('images/icon8.png'); text-align: left; margin: 13px; padding: 0px;">
	  			<li>How to Recover after a Bad date</li><br>
				<li>Review|Vital Partners Review</li><br>
				<li>Review|Vital Partners Review</li><br>
				<li>Review|Vital Partners Derek & Julie</li><br>
				<li>7 Rules for a Happr Relationship</li>
			</ul>
		</div>
		<div>
			<h3 style="font-family: verdana; color: #F9F9F9;font-weight: 60;text-align: left;"> RECENT TWEETS </h1>
			<ul style="color: #848383;font-family: verdana;list-style-image:url('images/icon9.png'); text-align: left; margin: 18px; padding: 0px;">
	  			<li>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital partners</li><br>
				<li>Ending a Relationship? Read why you shouldn't break up by text. offline dating agency Vital Partners Sydney Canberra</li>
			</ul>
		</div>
	</div>
	<div class="footer3">
		<div style="width: 23%;">
			<p style="color: #999595;margin-left: 98px">@VitalPartners.com.au</p>
		</div>
		<div style="width: 40%;">
			<p style="color: #999595;font-size: 15px;">Contact | Terms of Use | Privacy Policy | Disclaimer</p>
		</div>
		<div style="width: 25%;">
			<p style="color: #999595;font-size: 15px;text-align: left">
				FOLLOW US:
				<img src="images/icon10.png" style="margin: -5px 0px;" height="20px" width="20px">
				<img src="images/icon11.png" style="margin: -5px 0px;" height="20px" width="20px">
				<img src="images/icon12.png" style="margin: -5px 0px;" height="20px" width="20px">
				<img src="images/icon13.png" style="margin: -5px 0px;" height="20px" width="20px">
				<img src="images/icon14.png" style="margin: -5px 0px;" height="20px" width="20px">
			</p>
		</div>
	</div>
</div>
</body>
</html>