$(function (){
    
    
$('#datepicker').datepicker({
      autoclose: true
    });
$('#dp').change(function(){
	var dept=$('#dp').val();
	$.ajax({
        url : 'programlist.php',
        data:{"dp":dept},
        type: 'GET',

        success: function(data){
            $('#prg').html(data);
        }
    });
});
$("#sid").blur(function(){
	$("#eid").html("");
	if($("#sid").val().length<6)
	{
		$("#eid").html("length of student id must be 6");
	}
});
$("#sname").blur(function(){
	$("#ename").html("");
	if($("#sname").val().length<6)
	{
		$("#ename").html("length of student name must be 6 or more");
	}
});
		$("#spass").blur(function(){
					$("#epass").html("");
	if($("#spass").val().length<6)
	{
		$("#epass").html("length of password must be 6 or more");
	}
	

		});
		$("#cspass").blur(function(){
			$("#cepass").html("");
		if($("#cspass").val()!=$("#spass").val())
		{
			$("#cepass").html("Password doesn't match");
		}

		});
	
$("#datepicker").change(function(){
$("#edob").html("");
});	
$("#datepicker").blur(function(){
	$("#edob").html("");
	if($("#datepicker").val().length<1)
	{
		$("#edob").html("Please choose a date");
	}	

});

});
function validate()
{
	
    idok=false;
	nok=false;
	psok=false;
	cpok=false;
	dobok=false;
	dok=false;
	pok=false;
	if($("#sid").val().length<6)
	{
		$("#eid").html("length of student name must be 6.");
	}
	else
	{
		idok=true;
	}
	$("#ename").html("");
	if($("#sname").val().length<6)
	{
		$("#ename").html("length of student name must be 6 or more");
	}
	else
	{
		nok=true;
	}
	$("#epass").html("");
	if($("#spass").val().length<6)
	{
		$("#epass").html("length of password must be 6 or more");
	}
	else
	{
		psok=true;
	}
	$("#cepass").html("");
	if($("#cspass").val().length<6)
	{
		$("#cepass").html("length of confirm pass must be 6 or more");
	}
	else
	{
		cpok=true;
	}
	$("#edob").html("");
	if($("#datepicker").val().length<1)
	{
		$("#edob").html("Please choose a date");
	}
	else
	{
		dobok=true;	
	}
	$("#edp").html("");
	if($("#dp").val().length==0)
	{
		$("#edp").html("Please choose the department");
	}
	else
		dok=true;
	$("#epr").html("");
	if($("#prg").val().length==0)
	{
		$("#epr").html("Please choose the department");
	}
	else
		pok=true;

	if(idok&&nok&&psok&&cpok&&dobok&&dok&&pok)
	{
		return true;
	}
	else
		return false;
}
