// JavaScript Document
/*
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

*/
$('document').ready(function(e) {
  	$('.menu > div').mouseenter(function(e){
		$(this).find('.roll').slideDown('fast');
		
		});
	$('.menu > div').mouseleave(function(e){
		$(this).find('.roll').slideUp('fast');
		
		});
		
});


$(window).load(function(e) {
    $('.menu,.status').fadeIn(1500);
});


$('document').ready(function() {
    $('.bar ul li:nth-child(1)').click(function(){
		$('.move').animate({top:0},500);
	});
	$('.bar ul li:nth-child(2)').click(function(){
		$('.move').animate({top:-600},500);
			
	});
	$('.bar ul li:nth-child(3)').click(function(){
		$('.move').animate({top:-1200},500);
	});
	$('.bar ul li:nth-child(4)').click(function(){
		$('.move').animate({top:-1800},500);
	});
	$('.bar ul li:nth-child(5)').click(function(){
		$('.move').animate({top:-2400},500);
	});
	$('.bar ul li:nth-child(6)').click(function(){
		$('.move').animate({top:-3000},500);
	});
	
	

});
function slidedown(){
$('document').ready(function(e) {
	$(".notify").slideDown(1000);
    $('.cross').click(function(e) {
    $('.notify').slideUp(1000);
	});
});
}
//for ask division doctor delete
$('document').ready(function(e) {
    $('#ask_permission').click(function(e) {
        $('.ask,.full').fadeIn(500);
		if( $('#ask_permission_value').val() == ''){
			$('.ask_notify').html('Please select a doctor to delete');
			$('.yes,.no').css('display','none');
			$('.close').css('display','block').click(function(){
					 $('.ask,.full').fadeOut(500);	
				});
			
		}
		else {
		$('.ask_notify').html('Are you sure, You want to delete the doctor with id '+$('#ask_permission_value').val()+'?');
		$('.yes,.no').css('display','block');
		$('.close').css('display','none');
		$('.yes').click(function(){
			$('#delete_doc').submit();
			
			});
		$('.no').click(function(){
			 $('.ask,.full').fadeOut(500);	
		});
		}
    });
	
});

//for ask division with user delete
$('document').ready(function(e) {
    $('#ask_permission1').click(function(e) {
        $('.ask,.full').fadeIn(500);
		if( $('#ask_permission_value1').val() == ''){
			$('.ask_notify').html('Please select a user to delete');
			$('.yes,.no').css('display','none');
			$('.close').css('display','block').click(function(){
					 $('.ask,.full').fadeOut(500);	
				});
			
		}
		else {
		$('.ask_notify').html('Are you sure, You want to delete the user with id '+$('#ask_permission_value1').val()+'?');
		$('.yes,.no').css('display','block');
		$('.close').css('display','none');
		$('.yes').click(function(){
			$('#delete_doc1').submit();
			
			});
		$('.no').click(function(){
			 $('.ask,.full').fadeOut(500);	
		});
		}
    });
	
});