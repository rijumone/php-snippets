<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">
	div {
		/*border: 1px dotted red;*/
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6">
			<div class="editable" data-parent-element="h4">
				<a class="" href="javascript:void(0)" onclick="convertToEdit($(this))"><i class="fa fa-pencil"></i></a>
				<h4>heading</h4>
			</div>
			<div class="editable" data-parent-element="h5">
				<a class="" href="javascript:void(0)" onclick="convertToEdit($(this))"><i class="fa fa-pencil"></i></a>
				<h5>sub-heading</h5>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="editable" data-parent-element="img">
				<a class="" href="javascript:void(0)" onclick="uploadImage($(this))"><i class="fa fa-pencil"></i></a>
				<img src="mustang.png">
			</div>
		</div>
	</div>
</div>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script  src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
	// $("h4.editable").click(function(){
	// 	// console.log($(this).html());
	// 	$(this).html(convertToEdit(($(this).html())));
	// });

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
</script>