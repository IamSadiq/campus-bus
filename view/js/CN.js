$(document).ready(function(){
	var clicked;

		$('#topDiv').show();
		$('#eduDiv').show();
		$('#enterDiv').show();

		$('#newsID').css('background-color', 'orange');
		$('#topDiv').css( 'background-color','orange');
		$('#eduDiv').css( 'background-color','transparent');
		$('#enterDiv').css( 'background-color','transparent');

		$('.top').show();
		$('.edu').hide();
		$('.enter').hide();
		
		$('#searchDiv').show();
		$('#btnDiv').show();
		//clicked = "top";
		//console.log(clicked);

	$('#topDiv').on('click', function(){
		$(this).css('background-color', 'orange');
		$('#eduDiv').css( 'background-color','transparent');
		$('#enterDiv').css( 'background-color','transparent');
		$('.top').show();
		$('.edu').hide();
		$('.enter').hide();
		

		//clicked = "top";
		//console.log(clicked);

	});

	$('#eduDiv').on('click', function(){
		$('#eduDiv').css( 'background-color','orange');
		$('#topDiv').css( 'background-color','transparent');
		$('#enterDiv').css( 'background-color','transparent');
		$('.edu').show();
		$('.top').hide();
		$('.enter').hide();
		clicked = "edu";
		console.log(clicked);
	});
	$('#enterDiv').on('click', function(){
		$('#enterDiv').css( 'background-color','orange');
		$('#topDiv').css( 'background-color','transparent');
		$('#eduDiv').css( 'background-color','transparent');
		$('.enter').show();
		$('.top').hide();
		$('.edu').hide();
		clicked = "enter";
		console.log(clicked);
	});


console.log('completed');
});