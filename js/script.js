$(document).ready(
    () => {
        if ($(window).width() < 768) {
            $('#collapseWidthExample').removeClass('show')
        } else {
            $('#collapseWidthExample').addClass('show')
        }
    },

    $(window).resize(() => {
        if ($(window).width() < 768) {
            $(".Article").removeClass("mx-md-5")
            $(".Article").addClass("container")
            $('#profileimg').addClass('d-none')
            $('#collapseWidthExample').removeClass('show')
        } else {
            $(".Article").removeClass("container")
            $(".Article").addClass("mx-md-5")
            $('#profileimg').removeClass('d-none')
            $('#collapseWidthExample').addClass('show')
        }
    }),

    $('#del-img').click(() => {
        let tmp__html = '<input type="hidden" name="del_img" value="1"></input>'
        $('form').append(tmp__html)
        $('#img-preview').attr('src', '')
    })
)