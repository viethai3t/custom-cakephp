function UpdatePresent(){

    var baseUrl = $('meta[name="base_url"]').attr('content');

    var init = function(){
        disableInputOnUpdatingPresent();
        deletePresentImage();
    };

    var disableInputOnUpdatingPresent = function(){
        $("#content :input").not(".available").prop("disabled", true);
    };

    var deletePresentImage = function(){
        $(".delete-present-image").click(function(){
            var imageId = $(this).children(".present-image-id").val();
            $(".dialog-title").html("商品画像を削除しますか？");
            $(".dialog-action").attr("action", baseUrl + "/present_image/" + imageId + "/delete");

        });
    };

    init();
}

$(document).ready(function() {
    var $updatePresent = new UpdatePresent();
});