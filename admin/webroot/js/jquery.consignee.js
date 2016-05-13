function Consignee(){

    var baseUrl = $('meta[name="base_url"]').attr('content');

    var init = function(){
        deleteConsignee();
        sendNotification();
        deleteAllOfConsignee();
    };

    var deleteConsignee = function(){
        $(".delete-consignee").click(function(){
            var consigneeId = $(this).children(".consignee-id").val();
            $(".dialog-title").html("削除しますか？");
            $(".dialog-action").attr("action", baseUrl + "/consignee/" + consigneeId + "/delete");
        });
    };

    var deleteAllOfConsignee = function(){
        $(".delete-all").click(function(){
            var projectId = $("input[name=project_id]").val();
            $(".dialog-title").html("配送先一括削除します。よろしいですか？");
            $(".dialog-action").attr("action", baseUrl + "/project/" + projectId + "/consignee/delete_all");
        });
    };

    var sendNotification = function(){
        $(".send-notification").click(function(){
            var projectId = $(".notification-project-id").val();
            $(".dialog-title").html("更新通知を行いますか？");
            $(".dialog-action").attr("action", baseUrl + "/project/" + projectId + "/send_notification");
        });
    };

    init();
}

$(document).ready(function() {
    var $consignee = new Consignee();
});