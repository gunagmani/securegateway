/*
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
		
      <!-- jQuery library -->
<!-- Latest compiled JavaScript -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	<!--	  <script type="text/javascript">  -->  */
		  alert("Welcome....");
   $(document).ready(function(){	
		alert("Inside document ready....");
	$('#tree-container').jstree({
					'core' : {
					'data' : {
							'url' : function(node){
							return '<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=get_node';
								},
							"success" : function(data){
								console.log("Loading success data: "+JSON.stringify(data));
							},
							"error" : function(data){
								console.log("Loading error data: "+JSON.stringify(data));
							},
							'data' : function (node) {
								console.log('inside data:'+node.id);
								return { 'id' : node.id };								
							},
							'dataType' : "json"
						},
						//'error':"check",
						'check_callback' : true,
						'expand_selected_onload' : true,
						'themes' : {
							'responsive' : false
						}
					},
					"types" : {
						"#" : { "max_children" : 1, "max_depth" : 2, "valid_children" : ["root"] },
						"root" : { "icon" : "assets/jstree/32px.png", "valid_children" : ["default"] },
						"default" : { "valid_children" : ["default","file"] },
						"file" : { "icon" : "glyphicon glyphicon-file", "valid_children" : [] }
					},
			'plugins' : ["contextmenu", "dnd", "search", "state", "types", "wholerow","unique"]
		}).on('create_node.jstree', function (e, data) {
					/*console.log("ServiceType:"+data.node.parent+"data Position:"+data.position+"Parent Node:"+data.node.text); //"url" : "/admin/ajaxtree/tree"*/
					console.log(JSON.stringify(data));
					
					$.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
						.success(function(data){
							alert("Success Alert"+JSON.stringify(data) );
						})
						.done(function (d) {
							//alert(JSON.stringify(d)+"---"+data.node.text+"Position:"+data.position);
							//alert("Create Done:"+d+":"+d.node+"::"+d.node.parent);
							//data.instance.set_id(data.node, d.id);
							//data.instance.set_id(data.node, data.node.id);
							console.log("Insert Response Data d:"+JSON.stringify(d)+"-=-="+JSON.stringify(data) );	
							console.log("Data Node Type"+data.node+"Id Type"+id);							
							data.instance.set_id(data.node,id);
							//data.instance.edit(d.id);
							
						})
						.fail(function (error) {
							//alert("Insert Fails:");
							console.log("Error Data"+JSON.stringify(error)); // Has keys 'code' and 'message');
							data.instance.refresh();//alert("Json Fails...");
							
						});
				}).on('rename_node.jstree', function (e, data) {
					$.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
						.done(function () {
							data.instance.refresh();
						})
						.fail(function () {
							data.instance.refresh();
						});
					}).on('delete_node.jstree', function (e, data) {
					$.get('<?php echo WEB_DIR;?>FolderCreation/folder_get_response?operation=delete_node', { 'id' : data.node.id }).done(function () {
							alert("Node Deleted: "+data.node.id);
							
							data.instance.refresh();
							/* $('#tree-container').jstree().refresh();
							$('#tree-container').jstree('open_all'); */							
							data.instance.open_all();
						})
						.fail(function () {
							data.instance.refresh();alert("Errot in Node Delete: "+data.node.id);
						});
				}).on('keydown.jstree', '.jstree1', function (e) {
			console.log("E Target:"+JSON.stringify(e)+"Key Val"+e.which);
        if (e.target.tagName === "INPUT") {
            return true;
        }
		console.log("jstree reference:"+$.jstree.reference('#tree-container'));
        //var inst = $.jstree.reference(this);  			//$.jstree.reference(this);
        var inst = $.jstree.reference(document.getElementByID('#tree-container'));  			//$.jstree.reference(this);
        var node = inst.get_node(this);

        if (e.which === 38 && e.ctrlKey && !e.altKey && !e.shiftKey) createNode(inst, node, 'before'); // ctrl up
        if (e.which === 40 && e.ctrlKey && !e.altKey && !e.shiftKey) createNode(inst, node, 'after'); // ctrl down
        if (e.which === 37 && e.ctrlKey && !e.altKey && !e.shiftKey) createNode(inst, node, 'first'); // ctrl left
        if (e.which === 39 && e.ctrlKey && !e.altKey && !e.shiftKey) createNode(inst, node, 'last'); // ctrl right
		});
				
				
				
            });     //ready funs end