function laske(){
	
	var paino = $("input[type=number][name=paino]").val();
	
	var intens = $("#intensiteetti").val();
	
	var sukupuoli = "";
	
	var sukupuoli= $('input[type=radio][name=gender]:checked').val();

	var energiantarve =""; 
	if(sukupuoli=="mies"){
		energiantarve = (879+10.2*paino)*intens;
	}
	
	else{
		energiantarve = (795+7.18*paino)*intens;
	}
		
	document.getElementById("energiantarve").innerHTML=energiantarve.toFixed(2);
	
}

function tyhjenna() {

	document.getElementById("paino").value="";
	
	document.getElementById("energiantarve").innerHTML="";	
	
}