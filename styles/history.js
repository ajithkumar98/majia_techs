$(window).scroll(function(){
		var wscroll= $(this).scrollTop();



if(wscroll > $('.history-1').offset().top/15){
	$('.history-1').each(function(){
		$('.history-1').addClass('history-show')
	})
}

if(wscroll > $('.history-2').offset().top/2.5){
	$('.history-2').each(function(){
		$('.history-2').addClass('history-show')
	})
}


if(wscroll > $('.history-3').offset().top/1.5){
	$('.history-3').each(function(){
		$('.history-3').addClass('history-show')
	})
}


if(wscroll > $('.history-4').offset().top/1.5){
	$('.history-4').each(function(){
		$('.history-4').addClass('history-show')
	})
}


if(wscroll > $('.history-5').offset().top/1.3){
	$('.history-5').each(function(){
		$('.history-5').addClass('history-show')
	})
}


if(wscroll > $('.history-6').offset().top/1.2){
	$('.history-6').each(function(){
		$('.history-6').addClass('history-show')
	})
}


if(wscroll > $('.history-7').offset().top/1.2){
	$('.history-7').each(function(){
		$('.history-7').addClass('history-show')
	})
}


});