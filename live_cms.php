<?php $editFlag = (isset($_GET['edit']) && $_GET['edit']=="true") ? true : false; ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">
	div {
		/*border: 1px dotted red;*/
	}
</style>
<div class="container-fluid" id="main">
	<div class="row">
		<div class="col-sm-6" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="editable" data-parent-element="h4" draggable="true" ondragstart="drag(event)" >
				<?php if($editFlag) { ?><a class="" href="javascript:void(0)" onclick="convertToEdit($(this))"><i class="fa fa-pencil"></i></a><?php } ?>
				<h4>heading</h4>
			</div>
			<div class="editable" data-parent-element="h5" draggable="true" ondragstart="drag(event)" >
				<?php if($editFlag) { ?><a class="" href="javascript:void(0)" onclick="convertToEdit($(this))"><i class="fa fa-pencil"></i></a><?php } ?>
				<h5>sub-heading</h5>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="editable" data-parent-element="img">
				<?php if($editFlag) { ?><a class="" href="javascript:void(0)" onclick="uploadImageTrigger($(this))"><i class="fa fa-pencil"></i></a><?php } ?>
				<form style="display: none;" action="upload.php" method="POST" enctype="multipart/form-data"><input type="file" onchange="uploadImage($(this));" name="image" accept="image/gif, image/jpeg, image/png" ></form>
				<img class="img-responsive" src="uploaded_files/mustang.png">
			</div>
		</div>
	</div>
</div>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script  src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">

	function convertToEdit(thisObj){
		var controlType = thisObj.parent().data("parent-element");
		var string = thisObj.parent().find(controlType).html();
		thisObj.parent().find(controlType).remove();
		var HTML = '';
		HTML += '<input type="text" value="'+string+'" onblur="convertToStatic($(this))" />';
		thisObj.parent().append(HTML);
		thisObj.parent().find("input").focus();
		// return HTML;
	}

	function convertToStatic(thisObj){
		var controlType = thisObj.parent().data("parent-element");
		var string = thisObj.parent().find("input").val();
		var HTML = '';
		HTML += '<'+controlType+'>'+string+'</'+controlType+'>';
		thisObj.parent().append(HTML);
		thisObj.parent().find("input").remove();
	}

	function uploadImageTrigger(thisObj){ ///console.log(23);
		thisObj.parent().find("input[type=file]").trigger("click");
	}

	function uploadImage(thisObj){
		if(thisObj.val()!= ""){
		 	var data  = new FormData();
			data.append('file', thisObj[0].files[0]);
			$.ajax({
				url: "upload.php",
				method: "POST",
				enctype: 'multipart/form-data',
	      		processData: false,  // tell jQuery not to process the data
	      		contentType: false,   // tell jQuery not to set contentType
				data: data,
				dataType: "text",
				success: function(response){ console.log("success");
					thisObj.parent().parent().find("img").attr("src","uploaded_files/"+response)
				},
				error: function(response){console.log("error");

				}
			})
			// thisObj.parent().find("form").submit();	
		}
		
	}

	function saveData(){
		console.log($("div#main").html());
	}

	function allowDrop(ev) {
	    ev.preventDefault();
	}

	function drag(ev) {
	    ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
	    ev.preventDefault();
	    var data = ev.dataTransfer.getData("text");console.log(ev);
	    ev.target.appendChild(document.getElementById(data));
	}
</script>