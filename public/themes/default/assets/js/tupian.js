$(document).ready(function(){
    var image = $('#tupian').val();
    if(image){
        $(".tupian-preview").attr('src', image);
    }
    $("#browse_server").colorbox({
        iframe:true,
        innerWidth:"70%",
        innerHeight:"70%",
        onClosed: function() { // called when the colorbox closes
            var image = $('#tupian').val();
            $(".tupian-preview").attr('src', image);
        }
    });
});