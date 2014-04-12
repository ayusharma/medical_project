/*
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find eme at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

*/
 function readURL(input,img_prev_object) 
    {
        //alert(input.getFileName());

        img_prev=document.getElementById(img_prev_object);
        if(checkImagesFile(input)==true)
            {
            /*if (navigator.appName == 'Microsoft Internet Explorer') 
            {
            IEFlag=1;
            } 
            else 
            {
            IEFlag=2;
            }*/
			$('.notify').slideUp(1000);
			$('.help').animate({right:-200},500);//from the search.js
            if (input.files && input.files[0]) 
                {
                var reader = new FileReader();
                reader.onload  = function (e) 
                {
                    $(img_prev)
                    .attr('src', e.target.result)
                    ;

                    //.width(120)
                    //.height(160)
                };
                reader.readAsDataURL(input.files[0]);
            }


        }
        else
            {
            if(checkImagesFile(input)==false)
                {
				//$('.notify').slideDown(1000);
				//$('.cross').fadeIn('slow');
				//i am adding something later
				slidedown();
                $('.notify > .notifytext').html("Please select a JPEG/JPG image");
                $(img_prev)
                .attr('src', '') ;
                input.value="";
            }
        }
        // alert(input.size); 
    }

    function checkImagesFile(input)
    {
        //alert(input);
        if(input.value=="")
            { 
            return 0;                    
        }
        else
            { 
            var MyFilePhoto=input.value;
            var MyFilePhotoList=MyFilePhoto.split(".");
            if(MyFilePhotoList[1].toUpperCase()!="JPG" )
                {

                return false;
            }
            else
                {

                return true;
            }
        }
    }

function imageDown(){
$('#imgDisplayPhoto').slideDown('slow');
$('.file_upload').css('background-color','#32525D');
}// JavaScript Document
