// Just for practice!!

 $(document).ready(function(){
	$("#p1").mouseenter(function(){
		alert("fill this fields to move to next page!!")
	});
	$("#p2").mouseleave(function(){
		alert("Okay bye!!")
	});
	$("input").focus(function(){
		$(this).css("background-color","#f4eded");
	});
	$("input").blur(function(){
		$(this).css("background-color","#f7cdcd");
	});
	$("#click").click(function(){
		$("#name").val("jaini shah");
	});
	$("#click").click(function(){
		$("#p1").prepend("hey how are you");
	});
	$("#click").click(function(){
		$("#p2").append("hey how are you");
	});
	$("#click").click(function(){
		$(".l").before("hey how are you");
	});
	$("#click").click(function(){
		$(".l").after("hey how are you");
	});
	$("#empty").click(function(){
		$(".jumbotron").empty();
	});
	$("#remove").click(function(){
		$("#p1").remove();
	});
	$("#addstyle").click(function(){
		$("p").addclass("c");
	});
	$("p").parent().css("color","red");
	$("label").parents().css("color","green");
	$("li").parents("ul").css("color","blue");
	$("div").children("span").css("color","skyblue");
	$("div").find("button").css("color","gray");
	$("h3").siblings().css("color","pink");
	$("h4").nextAll().css("color","blue");
	$("div").last().css("background-color:","yellow")
	//same as there are other functions like next(),nextUntil(),prev(),prevAll(),prevUntil()
	// For all children..
	// $("div").find("*").css("color","gray"); 
 });