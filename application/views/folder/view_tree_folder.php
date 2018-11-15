<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    -->
<link rel="stylesheet" href="<?php WEB_DIR; ?>assets/jstree/style.min.css" /> 
<!-- <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>  -->
<style>
	/*	 #tree-container {
	list-style: none;
	padding: 0 0 0 0;
	width: 170px;
	background: gray;
}


#tree-container li{
	display: block;
	background-color: #FF9927;
	font-weight: bold;
	margin: 1px;
	cursor: pointer;
	padding: 5 5 5 7px;
	list-style: circle;
	/*-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	//line-height: 30px;
	min-height: 40px !important;
}

#tree-container ul {
	list-style: none;
	padding: 0 0 0 0;
	display: none;
}


#tree-container ul li{
	font-weight: normal;
	cursor: auto;
	background-color: #fff;
	padding: 0 0 0 7px;
}

#tree-container a {
	text-decoration: none;
}
#tree-container a:hover {
	text-decoration: underline;
}
.jstree-default .jstree-node{
	min-height: 40px !important;
} */
</style>

<!-- <script src="<?php WEB_DIR; ?>assets/jstree/jstree.min.js"></script>  -->

<!-- <script src="http://static.jstree.com/3.0.2/assets/jquery-1.10.2.min.js"></script> -->
<!--	<script src="http://static.jstree.com/3.0.2/assets/jquery.address-1.6.js"></script>
	<script src="http://static.jstree.com/3.0.2/assets/dist/jstree.min.js"></script> -->


  

<div id="page-wrapper">

					<div class="header"> 
                        <h1 class="page-header">
                            Folder Creation
                        </h1>
						</div>
	<div id="page-inner">				
	<div class="row" id="securewrapper">

    <div class="container-fluid">


        <input type="hidden" name="node" id="node" value="" />

        <div class="form-group">
            
            </div>
        </div>
    
	
	<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="card">
						<div class="card-content">
						  <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<!--<button type="button" id="command-add" class="btn btn-primary btn-sm" onclick="create_department();"><i class="glyphicon glyphicon-asterisk"></i>Create Root</button> -->
					
					<a data-toggle="modal" data-id="<?php //echo $id; ?>" title="Department Creation" class="open-AddBookDialog btn btn-info" href="#addBookDialog">Create Department</a>
					
				<!--	<a data-toggle="modal" data-id="<?php //echo $id; ?>" title="Department Edit" class="open-AddBookDialog btn btn-default" href="#editBookDialog" onclick="root_edit();">Edit Department</a>
				<!-- <a data="page_0" class="model_form btn btn-sm btn-danger" href="#"><span class="glyphicon glyphicon-plus"></span> Add new record</a>  -->
					
						<button type="button" class="btn btn-success btn-sm" id="nodeCreate" onclick="demo_create()"><i class="glyphicon glyphicon-asterisk"></i> Create Service</button>
						<button type="button" class="btn btn-warning btn-sm" onclick="demo_rename();"><i class="glyphicon glyphicon-pencil"></i> Rename Service</button>
						
						<input type="button" class="btn btn-default btn-sm" value="Collapse All" onclick="$('#jstree_demo').jstree('close_all');">
<input type="button" class="btn btn-default btn-sm" value="Expand All" onclick="$('#jstree_demo').jstree('open_all');">
						<!--
						<button type="button" class="btn btn-danger btn-sm" onclick="demo_delete();"><i class="glyphicon glyphicon-remove"></i> Delete Service</button> -->
					</div>
				<!--	<div class="col-md-2 col-sm-4 col-xs-4" style="text-align:right;">
						<input type="text" value="" style="box-shadow:inset 0 0 4px #eee; width:120px; margin:0; padding:6px 12px; border-radius:4px; border:1px solid silver; font-size:1.1em;" id="demo_q" placeholder="Search" />
					</div> -->
				</div>
						<div class="row">	
							<div class="col-md-8 col-sm-8 col-xs-6" style="padding:21px 60px;">
									<div id="tree-container"></div>
									<div id="jstree_demo" class="demo"></div>									
									
									
							</div>
						<!--	<div class="col-md-8 col-sm-8 col-xs-6" id="jstree" style="padding:21px 60px;">
								<ul>
									<li>Item1
										<ul>
											<li>item1-1</li>
										</ul>
									</li>
									<li>item2</li>
								</ul>
							</div> -->
						</div>
							
						</div>
						
					  </div>
                </div>
				
				<!--<div class="getresult"><h1>Get Result</h1></div>-->
				
		
		</div>
		
	<div class="modal fade" id="addBookDialog" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Folder Creation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
	  <form method="post" id="folder_form" action="<?php echo WEB_DIR;?>FolderCreation/create_root_node">
        <input type="hidden" name="file_id" id="file_id" value=""/>
		Folder Name<input type="text" value="" required="required" minlength="4" maxlength="10" name="dept_name" pattern="[a-zA-Z0-9-]+" id="dept_name" autocomplete="off" class="form-control">
		<div id="error_fname" style="display:none">
      <p style="color:red"> Folder Name already exist </p>
	  </div>
      <p style="color:red"> Symbols are not allowed. Minimum 3 and Maximum 10 characters needed. </p>
      <div class="modal-footer">
		<input type="submit" value="Add Root" name="root_node" id="sub_fname" class="btn btn-primary">
        <button id="fname_close" onclick="fun_root_reset();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> </form>
    </div>
  </div>
 
</div>
		</div>
		
		
		
		<div class="modal fade" id="editBookDialog" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Department Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">	
			<div class='error_msg'>

			</div>
	   <form method="post" id="modelFormEdit" action="<?php echo WEB_DIR;?>FolderCreation/edit_root_node">
        <input type="hidden" name="file_id_edit" id="file_id_edit" value=""/>
		Department Name<input type="text" value="" name="dept_name_edit" data-role="tagsinput" id="dept_name_edit" class="form-control">
      
      <div class="modal-footer">
		<input type="submit" value="Save Root" name="save_root_node" class="btn btn-primary">
        <button id="root-form-reset-edit" onclick="fun_root_reset();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> </form>
    </div>
  </div>
 
</div>
		</div>
		</div>

<script src="<?php echo WEB_DIR;?>assets/js/jquery-2.1.4.min.js"></script> 
<script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo WEB_DIR;?>assets/jstree/jstree.min.js"></script>  
<script>
/*
$(document).ready(function() {
    $('#modelForm').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            dept_name: {
                validators: {
                    notEmpty: {
                        message: 'The Department is required'
                    }
                }
            }            
        }
    });
});*/
</script>

 
<script>

$('body').on('hidden', '.modal', function () {
        //$(this).removeData('bs.modal');
			console.log($('#modelForm').get(0));
			$('#modelForm')[0].reset();
      });
				function fun_root_reset(){
					//$("#modelForm").reset();
					//$('#modelForm').data('formValidation').resetForm(true);
				}


					function root_create(){
						console.log("root create event calls");
						/*var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();*/
						//console.log("Root Sel:"+sel+"Root Text"+sel.text);
						
						/*$.get('<?php echo WEB_DIR;?>FolderCreation/create_root_node', { 'addroot' : sel})
							.success(function(successData){
								console.log("Create Node: "+successData);
								$("#dept_name").val(successData);
							})
							.done(function (d) {
								console.log("Done Data:"+JSON.stringify(d));
							  //data.instance.set_id(data.node, d);
							})
							.fail(function () {
							  //data.instance.refresh();
							});*/
					};


					function root_edit(){
						console.log("root edit event calls");
						var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();
							$("#file_id_edit").val(sel);
						//console.log("Root Sel:"+sel+"Root Text"+sel.text);
						$.post('<?php echo WEB_DIR;?>FolderCreation/get_root_node_name', 
						{ 
							'addroot' : sel
						})
							.success(function(successData){
								//console.log("Edit Node: "+successData);
								
								$("#dept_name_edit").val(successData);
								console.log('File Val:'+( $("#file_id_edit").val() ));
							})
							.done(function (d) {
								//console.log("Done Data:"+JSON.stringify(d));
							  //data.instance.set_id(data.node, d);
							})
							.fail(function () {
							  //data.instance.refresh();
							});
					};

                    function demo_create() {
                        var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();
							console.log("Selected Sel"+sel);
                        if (!sel.length) {
                            return false;
                        }
                        sel = sel[0];
                        sel = ref.create_node(sel, {
                            "type": "file"
                        });
                        if (sel) {
                            ref.edit(sel);
							console.log("edit rename fails"+sel);
                        }else{
							console.log("rename fails"+sel);
						}
                    };
                    function demo_rename() {
                        var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();
                        if (!sel.length) {
                            return false;
                        }
                        sel = sel[0];
                        ref.edit(sel);
                    };
                    function demo_delete() {
						/*
                        var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();
                        if (!sel.length) {
                            return false;
                        }
                        ref.delete_node(sel);
						console.log("delete event calls");
						var ref = $('#tree-container').jstree(true),sel = ref.get_selected();
				
						if(!sel.length) { 
							  alert('Please select the node that you want to delete.');
							  return false;                
						}else{
			 
							if(confirm("Do you want to delete the data?")){
								if(sel == 1){
									
									alert('Root Node can not be deleted.');
									
									return false;
									
								}else{
									ref.delete_node(sel);
								}
							}
						}
						*/
						alert("Hi");
                    };
					function customMenu(node)
						{
							var items = {
								'item1' : {
									'label' : 'Create',
									'action' : function () { /* action */ 
									demo_create();
									
									
									}
								},
								'item2' : {
									'label' : 'Rename',
									'action' : function () { /* action */
									demo_rename();
									}
								}
							}

							if (node.type === 'level_1') {
								delete items.item2;
							} else if (node.type === 'level_2') {
								delete items.item1;
							}

							return items;
						}
					
                    $(function() {
                        var to = false;
                        $('#demo_q').keyup(function() {
                            if (to) {
                                clearTimeout(to);
                            }
                            to = setTimeout(function() {
                                var v = $('#demo_q').val();
                                $('#jstree_demo').jstree(true).search(v);
                            }, 250);
                        });
                        $('#jstree_demo')
                            .jstree({
								

                                "core": {
									"multiple" : false,
									
                                    "animation": 0,
                                    "check_callback": true,
                                    "themes": {
                                        "stripes": true
                                    },
                                    'data': {
										
										
			
                                        'url': function(node) {
                    //return node.id === '#' ? '/ajax_demo_roots.json' : '/ajax_demo_children.json';
					 
                    return node.id === '#' ? '<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=get_node' : '0';
					
                                        },
                                        'data': function(node) {
		
                                            return {
												 
                                                'id': node.id
                                             
         
                                            };
                                        }
                                    }
                                },
		
                                "types": {
                                    "#": {
                                        "max_children": 1,
                                        "max_depth": 2,
                                        "valid_children": ["root"]
                                    },
                                    "root": {
                                        "icon": "/tree_icon.png",
                                        "valid_children": ["default"]
                                    },
                                    "default": {
                                        "valid_children": ["default", "file"]
                                    },
                                    "file": {
                                        "icon": "glyphicon glyphicon-folder",
                                        "valid_children": []
                                    }
                                },
                                "plugins": ["contextmenu", "search",  "types", "wholerow","unique", "themes", "html_data"],
								"contextmenu" : {
									"items" : customMenu
								}
								
                            }).bind('create_node.jstree', function (e, data) {
								
              
			/*  $.get( "<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=create_node", function( data ) {
				  $( ".getresult" ).html( data );
				  alert( "Load was performed." );
				});*/
          $.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
		    .success(function(successData){
				console.log("Create Node: "+successData);
			})
            .done(function (d) {
				console.log("Done Data:"+JSON.stringify(d)+"D val:"+d);
              data.instance.set_id(data.node, d);
            })
            .fail(function () {
				console.log("Node Creation Fail...");
              data.instance.refresh();
            });
        }).on('rename_node.jstree', function (e, data) {
		
          $.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
            .fail(function () {
              data.instance.refresh();
            });
        }).on('delete_node.jstree', function (e, data) {
          $.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=delete_node', { 'id' : data.node.id })
            .fail(function () {
              data.instance.refresh();
            });
        });
                    });   ///Document Ready Default Function
                    </script>
					
					
