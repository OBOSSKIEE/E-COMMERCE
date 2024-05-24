$("#btnaddmess").click(function(){
    var fname = $("#fname").val();
    var rate = $("#rate").val();
    var mess = $("#message").val();
    var allVal = fname+"^"+rate+"^"+mess;

    if(fname=="" || rate=="" || mess==""){
        alert("Please provide inputs for required fields");
    }else{
        $.ajax({
            url:"addmail.php",
            method:"POST",
            data:{funcID:"Add",data:allVal}
        }).done(function(msg){
            alert("Successfully Saved");
            
        });
    }
});