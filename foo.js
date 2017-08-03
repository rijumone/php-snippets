$("body").append('<script>$("#vote_btn").trigger("click");</script>');
var bodyArr = $("body").html().split(" ")
var minutes = 0
var seconds = 0
for (var i = 0; i < bodyArr.length; i++) {
    if (bodyArr[i].toLowerCase() == "minutes"){
    	j = i
        // console.log(bodyArr[j])
        // console.log(bodyArr[j-1])
        // console.log(bodyArr[j-2])
        console.log(bodyArr[j-3])
        console.log(j-3)
        // console.log(bodyArr[j-4])
    	while(isNaN(bodyArr[j])){
    		j--
    	}
        console.log(j)
    	minutes = bodyArr[j]
        console.log(minutes)
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
console.log("minutes")
console.log(minutes)
console.log("seconds")
console.log(seconds)
if(minutes && seconds){
    console.log("Will refresh page after " + minutes + " minutes and " + seconds + " seconds")
    setTimeout(function(){
        location.reload();
    },totalMilliSeconds)    
}
