$(document).ready(function () {

    var image1 = $('#tupian1').val();
    var image2 = $('#tupian2').val();
    var image3 = $('#tupian3').val();
    if(image1){
        $(".tupian1-preview").attr('src', image1);
    };
    if(image2){
        $(".tupian2-preview").attr('src', image2);
    };
    if(image3){
        $(".tupian3-preview").attr('src', image3);
    };
    $("#browse_server1").colorbox({
        iframe:true,
        innerWidth:"70%",
        innerHeight:"70%",
        onClosed: function() { // called when the colorbox closes
            var image1 = $('#tupian1').val();
            $(".tupian1-preview").attr('src', image1);
        }
    });
    $("#browse_server2").colorbox({
        iframe:true,
        innerWidth:"70%",
        innerHeight:"70%",
        onClosed: function() { // called when the colorbox closes
            var image2 = $('#tupian2').val();
            $(".tupian2-preview").attr('src', image2);
        }
    });
    $("#browse_server3").colorbox({
        iframe:true,
        innerWidth:"70%",
        innerHeight:"70%",
        onClosed: function() { // called when the colorbox closes
            var image3 = $('#tupian3').val();
            $(".tupian3-preview").attr('src', image3);
        }
    });

});