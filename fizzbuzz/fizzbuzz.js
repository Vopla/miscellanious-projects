/*var fizz = 3;

var buzz = 5;

var result = "";

for (var i = 0; i <= 100; i++){
	if (i % fizz == 0){
		result += "fizz";
		
	}	
	
	else if (i % buzz == 0){
		result += "buzz";
		
	}
	
	else {
		result += i + "\n";
	}
	console.log(result + "\n");
}

*/

for(i=0;i<1e2;)console.log((++i%3?"":"Fizz")+(i%5?"":"Buzz")||i)

