var overlay = document.getElementById('loader');

window.addEventListener('load', function(){
  overlay.style.display = 'none';
  $('.sub-body').addClass('sub-body-show')
})

$(window).scroll(function(){
		var wscroll= $(this).scrollTop();

$('#history').css({
	'transform' : 'translate(0px,-'+wscroll/45+'px)'
})

$('#top').css({
'transform' : 'translate(0px,-'+wscroll/3.5+'%)'
});

$('#bottom').css({
'transform' : 'translate(0px,'+wscroll/1.5+'%)'
});



$(function(){
  if($('body').is('.pageType')){
    //add dynamic script tag  using createElement()
    	if (wscroll > $('#content').offset().top/5.5){
	   $('#content').each(function(){
	   $('.cont-body').addClass('showing')
});
}
  }
});





});


// $(document).ready(function(){

// 			var trigger= $('#data a');
// 			var container=$('#content');
// 			trigger.on('click',function(){
// 				 var $this= $(this);
// 				var target= $this.data('target');
// 				console.log(target);
// 				container.load(target+'.php');
// 				history.pushState({path:target},null,target+'.php')
// 				return false;
// 			});
// 		});

// $(window).bind('popstate', function() {
// $.ajax({url:location.pathname+'?rel=tab',success: function(data){
// $('#content').html(data);
// }});
// });


$('#data').click(function(e){
	e.preventDefault();
	$('#data').animate({
		opacity:0.5,
		marginLeft: "2000px",
	},500)
})


$('#data a').click(function(e){
	e.preventDefault();
	var target= $(this).data('target');
	console.log(target);

	    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = '/majia-techs/views/'+target+'.php';

    }, 1000);

	
})


// ***************************
$("#sub").click( function() {
 $.post( $("#myForm").attr("action"), 
         $("#myForm :input").serializeArray(), 
         function(info){ $("#result").html(info); 
  });
}); 

$("#myForm").submit( function() {
  return false;	
});
function clearInput() {
	$("#myForm :input").each( function() {
	   $(this).val('');
	});
}