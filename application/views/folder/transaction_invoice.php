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
<div class="container-fluid">
					<div class="header"> 
                        <h1 class="page-header">
                            Folder Creation
                        </h1>
					</div>
<div class="row">

    <div class="container-fluid">


        <input type="hidden" name="node" id="node" value="" />

        <div class="form-group">
            
            </div>
        </div>
    </div>
	
	<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="card">
						<div class="card-content">
						  <div class="row">
					<div class="col-md-8 col-sm-8 col-xs-8">
					<button type="button" id="command-add" class="btn btn-primary btn-sm" onclick="create_department();"><i class="glyphicon glyphicon-asterisk"></i>Create Root</button>
					<a data-toggle="modal" data-id="<?php //echo $id; ?>" title="Department Creation" class="open-AddBookDialog btn btn-info" href="#addBookDialog">Add Node</a>
					
					<a data="page_0" class="model_form btn btn-sm btn-danger" href="#"><span class="glyphicon glyphicon-plus"></span> Add new record</a>
					
						<button type="button" class="btn btn-success btn-sm" id="nodeCreate" onclick="demo_create()"><i class="glyphicon glyphicon-asterisk"></i> Create</button>
						<button type="button" class="btn btn-warning btn-sm" onclick="demo_rename();"><i class="glyphicon glyphicon-pencil"></i> Rename</button>
						<button type="button" class="btn btn-danger btn-sm" onclick="demo_delete();"><i class="glyphicon glyphicon-remove"></i> Delete</button>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-4" style="text-align:right;">
						<input type="text" value="" style="box-shadow:inset 0 0 4px #eee; width:120px; margin:0; padding:6px 12px; border-radius:4px; border:1px solid silver; font-size:1.1em;" id="demo_q" placeholder="Search" />
					</div>
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
				
		</div>		
		
		</div>
		
		</div>
		
		<!-- Form modal -->
  <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add</span> Users information</h4>
        </div>
        <!-- Form inside modal -->
        <form method="post" id="cat_form">
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Name :</label>
                   <input type="text" name="name" id="name"  class="form-control required">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Country :</label>
                   <input type="text" name="country" id="country" class="form-control required">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Email :</label>
                   <input type="email" name="email" id="email"  class="form-control required email">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Mobile :</label>
                   <input type="text" name="mobile" id="mobile" class="form-control required number">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>About You :</label>
                   <textarea name="about" id="about" class="form-control required"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Birthday :</label>
                   <input type="date" id="dob" class="form-control required" name="dob">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <p> Demo no database connection </p>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <button type="button" name="form_data" disabled="disabled" class="btn btn-primary add_update">Submit</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- /form modal -->

<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Book Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Book ISBN</label>
              <div class="col-md-9">
                <input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Book Title</label>
              <div class="col-md-9">
                <input name="book_title" placeholder="Book_title" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Book Author</label>
              <div class="col-md-9">
								<input name="book_author" placeholder="Book Author" class="form-control" type="text">
 
              </div>
            </div>
						<div class="form-group">
							<label class="control-label col-md-3">Book Category</label>
							<div class="col-md-9">
								<input name="book_category" placeholder="Book Category" class="form-control" type="text">
 
							</div>
						</div>
 
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
		
		<div class="modal fade" id="addBookDialog" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Department Creation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <div id="email_div">

	  </div>
	  
       <p>Department</p>
	   <form method="post" id="modelForm" action="<?php echo WEB_DIR;?>/FolderCreation/departmentCreate">
        <input type="hidden" name="file_id" id="file_id" value=""/>
		Department Name<input type="text" value="" name="dept_name" data-role="tagsinput" id="dept_name" class="form-control">
      
      <div class="modal-footer">
		<input type="submit" value="Share" name="share" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 
</div>

<script src="<?php echo WEB_DIR;?>assets/js/jquery-2.1.4.min.js"></script> 
<script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo WEB_DIR;?>assets/jstree/jstree.min.js"></script>   
<script>
                    function demo_create() {
                        var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();
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
                        var ref = $('#jstree_demo').jstree(true),
                            sel = ref.get_selected();
                        if (!sel.length) {
                            return false;
                        }
                        ref.delete_node(sel);
                    };
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
                                        "max_depth": 4,
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
                                        "icon": "glyphicon glyphicon-file",
                                        "valid_children": []
                                    }
                                },
                                "plugins": ["contextmenu", "dnd", "search", "state", "types", "wholerow","unique"]
                            }).bind('create_node.jstree', function (e, data) {
              
          $.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
            .done(function (d) {
				console.log(JSON.stringify(d));
              data.instance.set_id(data.node, d);
            })
            .fail(function () {
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
