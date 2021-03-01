(function($) {
    "use strict";

    // Add active state to sidebar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });


    // login Ajax submit
    $('#login-form').on('submit', function(e){
        e.preventDefault();
        $('#form-error').addClass('d-none')
        $("button[type='submit']").addClass("disabled")

        // setTimeout(() => {
            var action = $(this).attr("action")
            var payload = $(this).serialize();
            
            axios.post(action, payload)
                 .then( response => {
                     // code for redirect
                     window.open(response.data.redirect_url, '_self');
                 })
                 .catch( error => {
                     $('input[type=password]').val("")
                     $('#form-error').removeClass('d-none').html(error.response.data.message)
                     $("button[type='submit']").removeClass("disabled")
                })
        // }, 1000)

    });

    $(document).on('change','[data-buttons="filter"]', function(e) {
        $('#filter-form').submit();
    });

    $(document).on('click','[data-buttons="delete"]', function(e) {
        e.preventDefault()
        if(confirm("Are you sure to delete?")){
            var uri = $(this).data('uri')
            var id = $(this).data('id')
            var div = $(this).data('div')

            axios.post(uri, {
                    id: id
                })
                .then(response => {
                    $(div).hide('slow')
                })
                .catch(error => {
                    alert(error.response.data.message)
                    console.log(error);
                })
        }
    });

})(jQuery);
