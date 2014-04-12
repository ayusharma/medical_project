// JavaScript Document

/*
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

*/


		function send(search){
			$.post('scripts/search.php',{search:search},function(data){
				$('.search_result').html(data);
			});
			
		}
		$('document').ready(function(e) {
            $('#search').focusin(function(){
				if($('#search').val()===''){
					$('.search_result').text('Please type the keywords. we are using AJAX request');
				}else {
					send($('#search').val());
				}
			}).keyup(function(e) {
                    send($('#search').val());
                });
        });
	//for admin
	function send99(search_doc){
			$.post('scripts/search_doc.php',{search_doc:search_doc},function(data){
				$('.search_result_admin').html(data);
			});
			
		}
		$('document').ready(function(e) {
            $('#search_doc').focusin(function(){
				if($('#search_doc').val()===''){
					$('.search_result_admin').text('Please type the keywords. we are using AJAX request');
				}else {
					send99($('#search_doc').val());
				}
			}).keyup(function(e) {
                    send99($('#search_doc').val());
                });
        });
	//for username
	
	function send2(username){
			$.post('scripts/searchusername.php',{username:username},function(data){
				$('.help').html(data);
			});
			
		}
		$('document').ready(function(e) {
            $('#searchusername').focusin(function(){
				$('.help').animate({right:0},500);
				
					send2($('#searchusername').val());
				
			}).blur(function(){
				$('.help').animate({right:-200},500)
				}).keyup(function(e) {
                    send2($('#searchusername').val());
                });
        });
		
	//for email
	function send3(email){
			$.post('scripts/email.php',{email:email},function(data){
				$('.help').html(data);
			});
			
		}
		$('document').ready(function(e) {
            $('#email').focusin(function(){
				$('.help').animate({right:0},500);
				
					$('.help').text('Please Type Your Email Address');
				
					send3($('#email').val());
				
			}).blur(function(){
				$('.help').animate({right:-200},500)
				}).keyup(function(e) {
                    send3($('#email').val());
                });
        });
		//for name 
		$(window).load(function(e) {
            $('#name').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Please Type Your Name');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
		//for photo
			
            $('#photo').click(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Select JPEG/JPG image for profile picture');
				});//next section is included in photo.js
       
		//for age
		
            $('#age').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Enter Your Age in Digits');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
		//for sex
		
            $('#sex').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Select Your Sex');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
		//for city
		
            $('#city').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Select Your City');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
		//for password
		    $('#password').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Enter a Password');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
            $('#confirmpassword').focusin(function(){
				$('.help').animate({right:0},500);
				if($('#password').val().length==0){
						$('.help').text('You have not entered any password');
					}
					else {
						$('.help').text('Enter password again');
					}
				}).keyup(function(e) {
					if($('#password').val().length==0){
						$('.help').text('You have not entered any password');
					}
					else {
                  if($('#password').val()==$('#confirmpassword').val())
				  {
					  $('.help').text('Password Matches');
				  }
				  else {
					  $('.help').text('Entered Password & Confirm Password does not Match');
				  }
					}
                }).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
		/// for security questions
		
            $('#sec_que').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Select Your Security Question. You\'ll need it when you forgot your password');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
       
            $('#sec_ans').focusin(function(){
				$('.help').animate({right:0},500);
				$('.help').text('Enter your answer according to your security question.');
				}).blur(function(){
				$('.help').animate({right:-200},500);
				});
        });