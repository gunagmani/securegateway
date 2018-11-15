<?php
//include("response.php");
?>  

<!--<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" href="dist/style.min.css" /> -->

<title>Folder Creation</title>
</head>
<body>
<div id="page-wrapper">
<div class="container-fluid">
					<div class="header"> 
                        <h1 class="page-header">
                            Folder Creation
                        </h1>
					</div>
<div id="page-inner"> 
                                 
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="card">
						<div class="card-content white-text">
						  <div class="row">
					<div class="col-md-8 col-sm-8 col-xs-8">
					<button type="button" id="command-add" class="btn btn-success btn-sm" onclick=""><i class="glyphicon glyphicon-asterisk"></i>Create Root</button>
						<button type="button" class="btn btn-success btn-sm" onclick="demo_create();"><i class="glyphicon glyphicon-asterisk"></i> Create</button>
						<button type="button" class="btn btn-warning btn-sm" onclick="demo_rename();"><i class="glyphicon glyphicon-pencil"></i> Rename</button>
						<button type="button" class="btn btn-danger btn-sm" onclick="demo_delete();"><i class="glyphicon glyphicon-remove"></i> Delete</button>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-4" style="text-align:right;">
						<input type="text" value="" style="box-shadow:inset 0 0 4px #eee; width:120px; margin:0; padding:6px 12px; border-radius:4px; border:1px solid silver; font-size:1.1em;" id="demo_q" placeholder="Search" />
					</div>
				</div>
						</div>
						<div class="card-action">
							<div class="col-md-8 col-sm-8 col-xs-6" id="tree-container" style="padding:21px 60px;"></div>
						</div>
					  </div>
                </div>
				
		</div>				
	<div class="row">

	</div>

				
</div>

</div>
</body>
</html>
<script type="text/javascript">
//$(document).ready(function(){ 
    //fill data to tree  with AJAX call
	
						
    $('#tree-container').jstree({
        'core' : {
			'data' : {
							/*'url' : 'response.php?operation=get_node',*/
							type:'get',
							'url' : '<?php echo base_url("index.php/FolderCreation/folder_get_response"); ?>response.php?operation=get_node',
							'data' : function (node) {
								return { 'id' : node.id };
							},
							"dataType" : "json"
						}
            ,'check_callback' : true,
						'themes' : {
							'responsive' : false
						}
			},
			'plugins' : ['state','contextmenu','wholerow','unique','dnd']
		}).on('create_node.jstree', function (e, data) {
		          
					$.get('response.php?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
						.done(function (d) {
							data.instance.set_id(data.node, d.id);
						})
						.fail(function () {
							data.instance.refresh();
						});
				}).on('rename_node.jstree', function (e, data) {
					$.get('response.php?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
						.fail(function () {
							data.instance.refresh();
						});
				}).on('delete_node.jstree', function (e, data) {
					$.get('response.php?operation=delete_node', { 'id' : data.node.id })
						.fail(function () {
							data.instance.refresh();
						});
				});
				
				
//});


</script>

<script>
						function demo_create() {
							var ref = $('#tree-container').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							sel = sel[0];
							sel = ref.create_node(sel, {"type":"file"});
							if(sel) {
								ref.edit(sel);
							}
						};
						function demo_rename() {
							var ref = $('#tree-container').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							sel = sel[0];
							ref.edit(sel);
						};
						function demo_delete() {
							var ref = $('#tree-container').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							ref.delete_node(sel);
						};
						/*$(function () {
							var to = false;
							$('#demo_q').keyup(function () {
								if(to) { clearTimeout(to); }
								to = setTimeout(function () {
									var v = $('#demo_q').val();
									$('#tree-container').jstree(true).search(v);
								}, 250);
							});*/
</script>