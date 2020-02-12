// Just for practice!!

 $(document).ready(function(){
	$("#p1").mouseenter(function(){
		alert("fill this fields to move to next page!!")
	});
	$("#p2").mouseleave(function(){
		alert("Okay bye!!")
	});
	$(".row").mousedown(function(){
		alert("hey i am row!!")
	});
	$("input").focus(function(){
		$(this).css("background-color","#f4eded");
	});
	$("input").blur(function(){
		$(this).css("background-color","#f7cdcd");
	});
	$("button").click(function(){
		$("#fname").val("jainiiiiii");
	});
	$("button").click(function(){
		$("#ex").prepend("hey how are you");
	});
	$("button").click(function(){
		$("#l").append("hey how are you");
	});
	$("button").click(function(){
		$("#l").before("hey how are you");
	});
	$("button").click(function(){
		$("#ex").after("hey how are you");
	});

 });