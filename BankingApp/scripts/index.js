$(function() {
    var snackbar = () =>{
        var x = $("#snackbar");
      
        $.ajax({
            dataType: 'json',
            async: true,
            url: "./modules/getMessages.php", 
            success: function(result){
                if(result.length > 0){
                    result.forEach(element => {
                        x.append(`<div>${element.Message}</div>`)
                    });
                    setTimeout(function(){ x.addClass('show') }, 500);
                }
            },
            error: function(res){
                $(x).html("Error");
            }
        });

        
    }
    snackbar()
});