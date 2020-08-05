$(function() 
{
 	$('select[name="attribute"]').change( function () {
 		var selectedValue = parseInt(jQuery(this).val());
 	 
	    //Depend on Value i.e. 1 or 2 respective division gets showed. 
	    $(this).find("option:selected").each(function(){
            if(selectedValue){
                document.getElementById("attribute_id").value = selectedValue;
                $("#attributevalue").show();
                $(".box").not("#" + selectedValue).hide(); 
                // $(".test").not("#" + selectedValue).prop('disabled', true); 
	   			$("#" +selectedValue).show();
                $("#sku").show();
	   			$("#price").show();
	   			$("#quantity").show();
	            $("#addbtn").show();
            } else{
                $("#attributevalue").hide();
                $(".box").hide();
                // $(".test").prop('disabled', false);
                $("#sku").hide();
                $("#price").hide();
                $("#quantity").hide();
	            $("#addbtn").hide();
            }
        });
    }).change();
});


 