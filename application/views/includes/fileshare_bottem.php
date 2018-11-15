



			<footer class="copy">
					<p><?php echo PAGE_FOOTER_TEXT; ?></p>
		   </footer>
           
		   </div>
            <!-- /. PAGE INNER  -->
        </div>
 </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <!-- <script src="<?php echo WEB_DIR;?>assets/js/jquery-1.10.2.js"></script>-->
	<script src="<?php echo WEB_DIR;?>/assets/js/jquery-2.1.4.min.js"></script>	
	
		
	<script>



	$(document).ready(function(){
    $('#modelForm').on('submit', function(e){
    e.preventDefault();
    email_val = $('#tags').val();
    file_id = $('#file_id').val();
	
    var email_count = email_val.split(",");
   
   var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

   
    for (var i = 0; i < email_count.length; i++) {
     if( email_count[i] == "" || ! regex.test(email_count[i])){
        alert('Please enter the valid email id');
		 return false;
     }
     }
   
   
	if(email_count != '')
	{

     	url = "<?php echo WEB_DIR; ?>/Fileupload/email_valid_check";
		
		
		$.ajax({
					type: 'POST',
					url: url,
					data: {email : email_val, file_id : file_id},
					dataType: "json",
					success: function(data) 
					{	
               
			 
			        if(data.status==1)
					{
						var str1 = "Entered email is already in share with this file </br> <p style='color:red';>";
                        var str2 = data.email;
						var res = str1.concat(str2);
						var str3 = "</p>";
                         var res = res.concat(str3);
                    
						 
					$('#email_div').html(res);
					}
					else if(data.status==3)
					{
						var res = "<p style='color:red';>You are not supposed to share a file to your own email.</p>";
						$('#email_div').html(res);
						 
                       
					}
					else
					{
					//$('#modelForm').submit();
					 $("#share_submit").attr("disabled", true);
				 $("#share_submit").val('Sharing..');
				 $("#share_close").hide();
					$('#modelForm').unbind('submit').submit();
					}
					}
					});



	}
	else
	{
		alert("Please enter the email to share");
	}
	
    });
    });
	

$(document).ready(function(){
		
$("#department").change(function(){

    	var department_upload= $("#department").val();

	$('#divdate').show();
	$('#divdate2').show();
	$('#divservice').show();
	$('#divfrequency').show();
		
		if(department_upload!='')
		{
	if(department_upload!=0)
	{
	url = "<?php echo WEB_DIR; ?>/Fileupload_bussiness/load_service_type_move";
		$.ajax({
					type: 'POST',
					url: url,
					data:'department_id='+ department_upload,
					success: function(data) 
					{	
                    $('#service_type').html(data);
					
					$('#department_hidden').val(department_upload);
					//$('#service_type_hidden').val('');
					}
					});
	}
	else
	{
		$('#service_type')
    .find('option')
    .remove()
    .end()
    .append('<option value="0">Received</option>');
	
	$('#divdate').hide();
	$('#divdate2').hide();
	$('#divservice').hide();
	$('#divfrequency').hide();
	
	
	}

		}	
	
	});
});	


 $(document).ready(function() {
    $('.modal').on('hidden.bs.modal', function(){
      $("#service_type").val($("#service_type option:first").val());
     });
});


	</script>
	
	
	
	
	
	
	<!-- Bootstrap Js -->
    <script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"></script>
	
    <script src="<?php echo WEB_DIR;?>assets/materialize/js/materialize.min.js"></script>	
    <!-- Metis Menu Js -->
    <script src="<?php echo WEB_DIR;?>assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
  <script src="<?php echo WEB_DIR;?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo WEB_DIR;?>/assets/js/morris/morris.js"></script>
	
	
	  <!--<link rel="stylesheet" href="<?php echo WEB_DIR;?>/assets/css/bootstrap-tagsinput.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> -->
	
	<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="<?php echo WEB_DIR;?>/assets/css/jquery.tag-editor.css">
 <script src="<?php echo WEB_DIR;?>/assets/js/jquery.caret.min.js"></script>
   <script src="<?php echo WEB_DIR;?>/assets/js/jquery.tag-editor.js"></script>

      
<script>
(function($){var proto=$.ui.autocomplete.prototype,initSource=proto._initSource;function filter(array,term){var matcher=new RegExp($.ui.autocomplete.escapeRegex(term),"i");return $.grep(array,function(value){return matcher.test($("<div>").html(value.label||value.value||value).text());});}$.extend(proto,{_initSource:function(){if(this.options.html&&$.isArray(this.options.source)){this.source=function(request,response){response(filter(this.options.source,request.term));};}else{initSource.call(this);}},_renderItem:function(ul,item){return $("<li></li>").data("item.autocomplete",item).append($("<a></a>")[this.options.html?"html":"text"](item.label)).appendTo(ul);}});})(jQuery);

       var cache = {};
       function googleSuggest(request, response) {
           var term = request.term;
           if (term in cache) { response(cache[term]); return; }
           $.ajax({
               url: 'https://query.yahooapis.com/v1/public/yql',
               dataType: 'JSONP',
               data: { format: 'json', q: 'select * from xml where url="http://google.com/complete/search?output=toolbar&q='+term+'"' },
               success: function(data) {
                   var suggestions = [];
                   try { var results = data.query.results.toplevel.CompleteSuggestion; } catch(e) { var results = []; }
                   $.each(results, function() {
                       try {
                           var s = this.suggestion.data.toLowerCase();
                           suggestions.push({label: s.replace(term, '<b>'+term+'</b>'), value: s});
                       } catch(e){}
                   });
                   cache[term] = suggestions;
                   response(suggestions);
               }
           });
       }

       $(function() {
           $('#tags').tagEditor({
               placeholder: 'Enter the valid mail ID',
               autocomplete: { source: googleSuggest, minLength: 3, delay: 250, html: true, position: { collision: 'flip' } }
           });

          
 });	
</script>
       
	
	  

<script>
$(document).ready(function() {
    $('#example').DataTable();
	
});


	$(document).on("click", ".open-AddBookDialog", function () 
	{

     var myBookId = $(this).data('id');
     $(".modal-body #file_id").val( myBookId );
	 $('#email_div').html('');	
     $("#tags").tagsinput('removeAll');
    });

	
	$(document).on("click", ".open-filemove", function () 
	{

     var myBookId = $(this).data('id');
     var file_name = $(this).data('name');
	 
	 $(".modal-body #move_id").val( myBookId );
     $(".modal-body #file_name").html( file_name );
	
	 url = "<?php echo WEB_DIR; ?>/Fileupload_bussiness/file_move_service";
		$.ajax({
					type: 'POST',
					url: url,
					data:'file_id='+ myBookId,
					success: function(data) 
					{	
					
                    $('#department_move').html(data);
					//alert(data);
					//$('#department_hidden').val(department_upload);
					//$('#service_type_hidden').val('');
					}
					});
	 
    });

	
	
	$(document).on("click", ".open-filedelete", function () 
	{

     var myBookId = $(this).data('id');
     var file_name = $(this).data('name');
	 
	 $(".modal-body #delete_id").val( myBookId );
     $(".modal-body #delete_name").html( file_name );

	 
    });
	
	
	
	
 $(document).ready(function() {
	 $("#department_move").change(function(){
		 var department_id= $("#department_move").val();
	url = "<?php echo WEB_DIR; ?>/Fileupload_bussiness/load_service_type_move";
		
		$.ajax({
					type: 'POST',
					url: url,
					data:'department_id='+ department_id,
					success: function(data) 
					{	
                    $('#service_type').html(data);
					//$('#service_type_hidden').val('');
					}
					});
});


    $("#form_move").on('submit', function(event) 
		{
              $("#move_submit").attr("disabled", true);
				 $("#move_submit").val('Moving..');
				
				$('#form_move').submit();
        
  
});

    $("#form_delete").on('submit', function(event) 
		{
              $("#delete_submit").attr("disabled", true);
			$("#delete_submit").val('Deleting..');
				 $("#delete_close").hide();
				$('#form_delete').submit();
        
  
     });

});



	
  $(document).ajaxStart(function () 
  { 
   $("#wait").show();
}).ajaxStop(function () {
    $("#wait").hide();
	
});

 
	</script>
	
   <!-- <script src="<?php echo WEB_DIR;?>assets/js/dropzone.js"></script>     
	<script src="<?php echo WEB_DIR;?>assets/js/mydropzone.js"></script>  -->
 
<!-- Custom Js -->
   
    <script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script> 

<script src="<?php echo WEB_DIR;?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/dataTables/dataTables.bootstrap.js"></script>
   <script src="<?php echo WEB_DIR;?>assets/js/custom-scripts.js"></script>  

</body>

</html>