var name;
$(function(){
	name = $("p.ValidationErrorsBot").html();
	foo = name.split(" ");
	name = foo[2] + " " + foo[3];
	// alert(name);
	$.ajax({
		url: 'http://localhost:8001/save_renew_data.php?name='+name,
		success: function(data){
			$("input#policynumber").val(data);
			$("input#dob").val("01/01/1975");
			$("#renew_policy_submit").trigger("click");

		},
		error: function(data){
			console.log("e: " + data);
		},

	})
});
