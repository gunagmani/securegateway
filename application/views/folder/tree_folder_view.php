<html > 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>jsTree</title>
	
	<link rel="stylesheet" href="http://static.jstree.com/3.0.2/assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://static.jstree.com/3.0.2/assets/dist/themes/default/style.min.css" />
	

	<script>window.$q=[];window.$=window.jQuery=function(a){window.$q.push(a);};</script>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed.xml" /><script>WR = "/";</script>
</head>
<body>
<div id="page-wrapper">
<div class="container-fluid">
					<div class="header"> 
                        <h1 class="page-header">
                            Folder Creation
                        </h1>
					</div>
					<div class="container"> 
				<h3>Basic AJAX demo</h3>
				<div class="row">
					<div class="col-md-4 col-sm-8 col-xs-8">
						<button type="button"  onclick="demo_create();">Create</button>
						<button type="button"  onclick="demo_rename();">Rename</button>
						<button type="button"  onclick="demo_delete();">Delete</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-8 col-xs-8">
					<div id="jstree_demo" class="demo" style="margin-top:1em; min-height:200px;"></div>
						<script>
						function demo_create() {
							var ref = $('#jstree_demo').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							sel = sel[0];
							sel = ref.create_node(sel, {"type":"file"});
							if(sel) {
								ref.edit(sel);
							}
						};
						function demo_rename() {
							var ref = $('#jstree_demo').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							sel = sel[0];
							ref.edit(sel);
						};
						function demo_delete() {
							var ref = $('#jstree_demo').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							ref.delete_node(sel);
						};
						$(function () {
							var to = false;
							$('#demo_q').keyup(function () {
								if(to) { clearTimeout(to); }
								to = setTimeout(function () {
									var v = $('#demo_q').val();
									$('#jstree_demo').jstree(true).search(v);
								}, 250);
							});
testData = ["Child 1", { "id" : "demo_child_1", "text" : "Child 2", "children" : [ { "id" : "demo_child_2", "text" : "One more", "type" : "file" }] }];
							$('#jstree_demo')
								.jstree({
									"core" : {
										"animation" : 0,
										"check_callback" : true,
										"themes" : { "stripes" : true },
										//'data' : testData 
										'data' :{
												'url' : function (node) {
													return '<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=get_node';
												},
												'data' : function (node) {
													return { 'id' : node.id };
												}
												
										}
										
									},
									"types" : {
										"#" : { "max_children" : 1, "max_depth" : 4, "valid_children" : ["root"] },
										"root" : { "icon" : "/static/3.0.2/assets/images/tree_icon.png", "valid_children" : ["default"] },
										"default" : { "valid_children" : ["default","file"] },
										"file" : { "icon" : "glyphicon glyphicon-file", "valid_children" : [] }
									},
									"plugins" : [ "contextmenu", "dnd", "search", "state", "types", "wholerow" ]
								});
								
								
								
						}).on('create_node.jstree', function (e, data) {
					/*console.log("ServiceType:"+data.node.parent+"data Position:"+data.position+"Parent Node:"+data.node.text); //"url" : "/admin/ajaxtree/tree"*/
					console.log(JSON.stringify(data));
					
					$.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
						/*.success(function(successData){
							alert("Success Alert"+JSON.stringify(successData) );
						})*/
						.done(function (d) {						
							data.instance.set_id(data.node, data.id);
							
						})
						.fail(function (error) {
							//alert("Insert Fails:");
							console.log("Error Data"+JSON.stringify(error)); // Has keys 'code' and 'message');
							//data.instance.refresh();//alert("Json Fails...");
							
						});
				});
						</script>
						</div>
				</div>
				</div>
</div>
</div>
	<script src="http://static.jstree.com/3.0.2/assets/jquery-1.10.2.min.js"></script>
	<script src="http://static.jstree.com/3.0.2/assets/jquery.address-1.6.js"></script>
	<script src="http://static.jstree.com/3.0.2/assets/dist/jstree.min.js"></script>
	<script>$.each($q,function(i,f){$(f)});$q=null;</script>
</body>
</html>
