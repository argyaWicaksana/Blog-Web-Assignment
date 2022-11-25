$(window).resize(()=>{
    if($(window).width() < 768){
        $(".Article").removeClass("mx-md-5")
        $(".Article").addClass("container")
        $('#profileimg').addClass('d-none')
    } else{
        $(".Article").removeClass("container")
        $(".Article").addClass("mx-md-5")
        $('#profileimg').removeClass('d-none')
    }
})