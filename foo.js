$("body").append('<script>$("#vote_btn").trigger("click");</script>');
var bodyArr = $("body").html().split(" ")
var minutes = 0
var seconds = 0
for (var i = 0; i < bodyArr.length; i++) {
    if (bodyArr[i].toLowerCase() == "minutes"){
    	j = i
    	while(isNaN(bodyArr[j])){
    		j--
    	}
    	minutes = bodyArr[j]
    }
    if (bodyArr[i].toLowerCase() == "seconds"){
    	j = i
    	while(isNaN(bodyArr[j])){
    		j--
    	}
    	seconds = bodyArr[j]
    }
}
var totalMilliSeconds = ((minutes * 60) + seconds) * 1000
console.log("Will refresh page after " + minutes + " minutes and " + seconds + " seconds")
setTimeout(function(){
	location.reload();
},totalMilliSeconds)