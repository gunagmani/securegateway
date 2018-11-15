<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront();?></div>
		  <div class="header"> 
                        <h1 class="page-header">
                            Adhoc Edit
                        </h1>
						
						<!--
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
					-->
									
		</div>
		
		
		
            <div id="page-inner">
       <div class="row" id="securewrapper">
			<div class="dashboard-cards"> 
         
				
				
				<div class="row">
			 <div class="col-lg-8">
			 <div class="card">
                        <div class="card-action">
                           Adhoc Edit Form
                        </div>
                        <div class="card-content">
						
						<?php if(validation_errors()!='') { ?>
						<div class="alert alert-danger">
  <strong><?php echo validation_errors(); ?></strong>
</div>
						<?php } ?>	
   <form method="post" id="department_post" action="<?php echo WEB_DIR;?>/department/edit_department">
      <div class="row">
        <div class="input-field col s6">
          <input id="department" name="department" type="text" class="validate" value="<?php 
		  if(set_value('department')!='')
		  {
			  echo set_value('department'); 
			  }else { echo $department_data->department_name; }  ?>">
          
        </div> 
		</div>
		<input type="hidden" name="id" value="<?php echo $department_data->id; ?>">
		<div class="row">
        <div class="input-field col s6">
          
		  <a  href="<?php echo WEB_DIR;?>/department" class="waves-effect waves-light btn btn-info"> cancel </a>
		  <input class="waves-effect waves-light btn" type="submit" value="Update" name="Adhoc" id="department_submit">
        </div>
    </div>
    
    </form>
	<div class="clearBoth"></div>
  </div>
  
 
                    </div>
  
  

  
  
  
    </div>
 </div>	
	
					

                </div>
			   </div>
		

				
				