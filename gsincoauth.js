$(function(){
	var alertDiv = $(".OAlert");
	alertDiv.hide();
	
	$(".GetAuth").submit(function(){
		var uname = $("#uname").val();
		var pword = $("#pword").val();
		
		// Check if empty
		if(!uname || !pword){
			alertDiv.fadeIn("slow").delay(2000).fadeOut("slow");
			return false
		}
		
		// Check if valid
		if( validUsername(uname) || validPassword(pword) ){
			alertDiv.fadeIn("slow").delay(2000).fadeOut("slow");
			return false
		}
		debugger
		return true;
	});
});

function validUsername(username){
	//Check if username has ONLY letters.
	// [^a-z\n]
	var pattern = /[^a-z\n]/;
	var result = pattern.test(username);
	// Returns result
	return result;
}

function validPassword(password){
	//Check if password has ONLY alphanumeric values.
	// [^a-zA-Z0-9\n]
	var pattern = /[^a-zA-Z0-9\n]/;
	var result = pattern.test(password);
	// Returns result
	return result;
}
