// verify the page name 
function verifyPageName(){
	
	console.log("verifying");
	
	var filename = document.getElementById("page_name").value;
	
	console.log(filename);
	
	filename = filename + ".php";
	
	console.log(filename);
	
	for(x in o){
		if ( o[x] === filename ){
			alert("the page name already exists, try using a different name");
			return false;
		}
	}
	
}