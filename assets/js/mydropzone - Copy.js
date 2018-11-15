Dropzone.autoDiscover = false;
jQuery(document).ready(function() {
  var myDropzone = new Dropzone("#my-dropzone", { 
    //url: 'someurl',
    autoProcessQueue:false
  });

  $('#submit-all').on('click',function(e){
    e.preventDefault();
   // myDropzone.processQueue();    
	//console.log($("#email").val());
	if($("#email").val()==""){
	//if(1){
		//$("#my-dropzone").prop("disabled",true);
		//myDropzone.prop("disabled",true);
		$("#email").attr("required","required");
		$("#email").focus();		
		alert("Notification Email Mandatory,Please enter the Notification Email...");
	}
	else{
		//myDropzone.prop("disabled",false);
		$("#email").removeAttr("required");
		//alert("Notification available");
		myDropzone.processQueue();    
	}
  });  

myDropzone.on('success', function(){
//console.log("fsdfdsfsdfsdfds sfsdf dsfd");
			if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {					
			//window.alert('Succesfully Updated')
        
        alert('Files uploaded Successfully');
		window.location.reload();		
		
			  //window.location.reload();
			}
	    });
  
});


function email_notify()
{

	notification_email = $('#email').val();
	path = $('#path').val();	
	
	//alert(notification_email);
	//alert(path);
	$.ajax({ 
	url: path, 
	data: {mail_val: notification_email},
    type: 'post',
    success: function(output)
    {
    if(output==1 || output==2)
	{
		alert('Files uploaded Successfully');
		window.location.reload();
	}
    }
});
}


$('#email').on('blur', function() {
	notification_email = $('#email').val();
	if(notification_email!='')
	{
   final_value = validateEmail(notification_email);
     if(final_value==false)
   {
	   $("#submit-all").attr("disabled", true);
	   alert("Email is Not Valid");
	 
   }
   else
   {
    $("#submit-all").attr("disabled", false);
   }
   
	}
	else
   {
   $("#submit-all").attr("disabled", false);
   }
});

function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}




/* <script type="text/javascript">
                jQuery(document).ready(function() 
                {
                    var myDropzone = new Dropzone("form#my-dropzone", { url: "file-upload"});
                });
            </script>
            <script type="text/javascript">
            Dropzone.options.my-dropzone = {

              // Prevents Dropzone from uploading dropped files immediately
              autoProcessQueue: false,

              init: function() {
                var submitButton = document.querySelector("#submit-all")
                    myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
                  myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                });

                // You might want to show the submit button only when 
                // files are dropped here:
                this.on("addedfile", function() {
                  // Show submit button here and/or inform user to click it.
                });         
              }
            };
            </script> */



/* 
$(document).ready(function() {
	console.log("Comingjnjjkjnjjnjkjnnjnjkjjk");
	
Dropzone.options.myDropzone = {
	
  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,

  init: function() {
  
    var submitButton = document.querySelector("#submit-all");
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
		console.log("attr disabled...");
	 $("#submit-all").attr("disabled", true);
	$(".dz-hidden-input").prop("disabled",true);

    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
	
	
	
	//location.reload();  
    });

    // You might want to show the submit button only when 
    // files are dropped here:
	
	
this.on('success', function(){
console.log("fsdfdsfsdfsdfds sfsdf dsfd");
			if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
					 window.alert('Succesfully Updated')
              window.location.reload();
			}
	    });
	
    this.on("addedfile", function() {
    
    });

	
	
	
  }
};





Dropzone.options.filedrop = {
  init: function () {
      this.on("queuecomplete", function (file) {
          alert("All files have uploaded ");
      });
  }
};




 
});
 */