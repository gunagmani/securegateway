<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script> 
<link rel="stylesheet" href="<?php WEB_DIR; ?>assets/jstree/style.min.css" />
<style>
		/* #tree-container {
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

<script src="<?php WEB_DIR; ?>assets/jstree/jstree.min.js"></script>

    <script type="text/javascript">
            $(document).ready(function(){
					//alert("Ajax Call happening....");
                //setting to hidden field
                //fill data to tree  with AJAX call
				//$("#tree-container").jstree(true).open_all();
				$("#tree-container").on('click.jstree',function (e) {
					alert("rererere...");
						var node = $(this).jstree('get_selected').text();
						alert(node);
				}).jstree({
                            'plugins': ["wholerow","unique"],
                            'core' : {
                                "multiple" : true,
                                'data' : {
                                    "url" : "<?php echo WEB_DIR;?>FolderCreation/getTreeNodes",
                                    "dataType" : "json" // needed only if you do not supply JSON headers
                                }
                            },							
                            'checkbox': {
                                three_state: false,
                                cascade: 'up'
                            },
                            'plugins': ["wholerow","unique","contextmenu"]
                });
								
                $('#tree-container').on('ready.jstree', function() {
					$('#tree-container').jstree('open_all');
				}).on('changed.jstree', function (e, data) {
                    var i, j, r = [];
                    // var state = false;
                    for(i = 0, j = data.selected.length; i < j; i++) {
                        r.push(data.instance.get_node(data.selected[i]).id);
                    }
                    $('#txttuser').val(r.join(','));
						//alert($('#txttuser).val);
                }).jstree({
                            'plugins': ["wholerow","unique"],
                            'core' : {
                                "multiple" : true,
                                'data' : {
                                    "url" : "<?php echo WEB_DIR;?>FolderCreation/getTreeNodes",
                                    "dataType" : "json" // needed only if you do not supply JSON headers
                                }
                            },							
                            'checkbox': {
                                three_state: false,
                                cascade: 'up'
                            },
                            'plugins': ["wholerow","unique","contextmenu"]
                }).on('create_node.jstree', function (e, data) {
					console.log("data:"+data); //"url" : "/admin/ajaxtree/tree"
					$.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
						.done(function (d) {
							alert("Done:"+d);
							//data.instance.set_id(data.node, d.id);
							data.instance.set_id(data.node, data.node.id);
						})
						.fail(function () {
							alert("Fails:");
							data.instance.refresh();alert("Json Fails...");
						});
				}).on('rename_node.jstree', function (e, data) {
						console.log("Rename Data:"+data);
					$.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
						.done(function () {
							//data.instance.refresh();
						})
						.fail(function () {
							data.instance.refresh();
						});
				}).on('delete_node.jstree', function (e, data) {
					$.get('http://localhost/dynamic-jstree/dynaResponse.php?operation=delete_node', { 'id' : data.node.id })
						.done(function () {
							alert("Node Deleted: "+data.node.id);
							data.instance.refresh();
							$('#tree-container').jstree().refresh();
						})
						.fail(function () {
							data.instance.refresh();
						});
				});
				
				
				
            });
			
			/*  Tree Structure Creation/Updation/Deletion       */
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
								//alert("Rename Cliked...");
							var ref = $('#tree-container').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) {
								return false; 
								}								
							sel = sel[0];
							ref.edit(sel);
							console.log(sel);
						};
						function demo_delete() {
							var ref = $('#tree-container').jstree(true),
								sel = ref.get_selected();
							if(!sel.length) { return false; }
							ref.delete_node(sel);
							$('#tree-container').jstree(true);
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
            <div id="tree-container1"></div>
            </div>
        </div>
    </div>
	
	<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="card">
						<div class="card-content">
						  <div class="row">
					<div class="col-md-8 col-sm-8 col-xs-8">
					<button type="button" id="command-add" class="btn btn-primary btn-sm" onclick=""><i class="glyphicon glyphicon-asterisk"></i>Create Root</button>
						<button type="button" class="btn btn-success btn-sm" onclick="demo_create();"><i class="glyphicon glyphicon-asterisk"></i> Create</button>
						<button type="button" class="btn btn-warning btn-sm" onclick="demo_rename();"><i class="glyphicon glyphicon-pencil"></i> Rename</button>
						<button type="button" class="btn btn-danger btn-sm" onclick="demo_delete();"><i class="glyphicon glyphicon-remove"></i> Delete</button>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-4" style="text-align:right;">
						<input type="text" value="" style="box-shadow:inset 0 0 4px #eee; width:120px; margin:0; padding:6px 12px; border-radius:4px; border:1px solid silver; font-size:1.1em;" id="demo_q" placeholder="Search" />
					</div>
				</div>
						<div class="row">	
							<div class="col-md-8 col-sm-8 col-xs-6" id="tree-container" style="padding:21px 60px;"></div>
						</div>
							
						</div>
						
					  </div>
                </div>
				
		</div>		
		
		</div>
		
		</div>
		</div>