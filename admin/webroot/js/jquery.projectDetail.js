function ProjectDetail(){

    var SOUKO_ROLE = 3;

    var init = function(){
        handleDisplaying();
    };
    
    var handleDisplaying = function () {

        //disable some input fields if logged in account is souko
        var role = $('meta[name="logged-in-account"]').attr('content');
        if (role == SOUKO_ROLE){
            $("#content :input").not(".available").prop("disabled", true);
            $("#content :input").each(function(){
                if ($(this).is(":hidden") && !$(this).hasClass('available')){
                    $(this).addClass('available');
                }
            });
        }

    };

    init();
}

$(document).ready(function() {
    var $projectDetail = new ProjectDetail();
});