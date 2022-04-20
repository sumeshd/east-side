
function isEmail(customer_email) 
{
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(customer_email);
}

$("#submit").click(function(){
    
  var errormessage="";
  var fieldsmessing="";
  if($("#customer_first_name").val()=="")
  {
    fieldsmessing +="<br> First Name";
  }
  if($("#customer_last_name").val()=="")
  {
    fieldsmessing +="<br> Last Name";
  }
  if($("#customer_email").val()=="")
  {
    fieldsmessing +="<br> Email Address";
  }
  if($("#customer_phone").val()=="")
  {
    fieldsmessing +="<br> Phone No";
  }
  
  

  if(fieldsmessing != ""){
        errormessage += "your followoing field are empty"+fieldsmessing;
    }

    if(isEmail($("#customer_email").val())==false){
        errormessage +="<p> Your Email Address Not Valid</p>"
    }
    if($.isNumeric($("#customer_phone").val())==false){
        errormessage +="<p> Your Phone Number is Not Valid</p>"
    }

    if(errormessage != ""){
        $("#field1").html(errormessage);
    }else{
        $("#field1").hide();
    }

});


jQuery(document).ready(function(){
    var countryOption;
    jQuery.getJSON('countries.json',function(result){
        jQuery.each(result,function(i,country){
            countryOption +="<option value='"+country.code+"'>" +country.name +"</option>";
        }); 
        jQuery('#country').html(countryOption);
    });
});


