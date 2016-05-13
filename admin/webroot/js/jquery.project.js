function Project(){

    var baseUrl = $('meta[name="base_url"]').attr('content');
    var SPECIFY_RETURN_ADDRESS = 3;
    var DELIVERY_TYPE_OTHER = 7;

    var init = function(){
        executeExpansion();
        createProjectResult();
        importPresentError();
        deletePresent();
        confirmation();
        deleteProject();
        handleDisplaying();
        deleteInclusion();
        autoFillOutFileName();
    };

    var executeExpansion = function(){

        $(".expand-element").click(function(){
            var $expansibleElement = $($(".expansible-block").find(">:first-child")[0]).clone();
            $expansibleElement = $expansibleElement.removeClass("hidden");
            $expansibleElement.find("input:text").val("");
            $expansibleElement.appendTo(".expansible-block");
        });

    };

    var createProjectResult = function(){
        var status = $(".create-project-status").val();
        var projectName = $(".created-project-name").val();
        var projectId = $(".created-project-id").val();

        if(status === "create_successfully"){ //has just created project successfully
            if(confirm("案件「" + projectName + "」の登録が完了しました。続けて、「商品登録」を行いますか？")){
                window.location.replace(projectId + "/present/create");
            }
        }
    };

    var importPresentError = function(){
        $(".present-quantity").each(function() {
            var request = $(this).find(".request-quantity").val();
            var actual  = $(this).find(".actual-quantity").val();
            if(request != actual && actual !== ""){
                $(this).addClass("has-error");
            }
        });

        $(".present-import-date").each(function() {
            var request = $(this).find(".request-import-date").val();
            var actual  = $(this).find(".actual-import-date").val();
            if(request < actual && request !== '' && actual !== ''){
                $(this).addClass("has-error");
            }
        });


    };

    var deletePresent = function(){
        $(".delete-present").click(function(){
            var presentId = $(this).children(".present-id").val();
            $(".dialog-title").html("削除しますか？");
            $(".dialog-action").attr("action", baseUrl + "/present/" + presentId + "/delete");

        });
    };

    var confirmation = function(){
        var projectId = $(".project-id").val();
        $(".confirmation-ok").click(function(){
            var confirmationValue = $(".confirmation-ok-value").val();
            $(".dialog-title").html("受領します。よろしいですか？");
            $(".dialog-action").attr("action", baseUrl + "/project/" + projectId + "/confirmation?response=" + confirmationValue);
        });

        $(".confirmation-rejected").click(function(){
            var confirmationValue = $(".confirmation-rejected-value").val();
            if($(".modal-body").hasClass("hidden")){
                $(".modal-body").removeClass("hidden");
                $(".dialog-textarea").attr("placeholder", "申し送り事項");
            }
            $(".dialog-title").html("内容確認を行います");
            $(".dialog-action").attr("action", baseUrl + "/project/" + projectId + "/confirmation?response=" + confirmationValue);

        });

        $(".close-dialog").click(function(){
            if( !$(".modal-body").hasClass("hidden")){
                $(".modal-body").addClass("hidden");
            }
        });
    };

    var deleteProject = function(){
        $(".delete-project").click(function(){
            var projectId = $(this).children(".del-project-id").val();
            $(".dialog-title").html("削除しますか？");
            $(".dialog-action").attr("action", baseUrl + "/project/delete/" + projectId);
        });
    };

    //同梱状名を削除
    var deleteInclusion = function() {
        $(".jsDeleteInclusion").click(function(){
            var inclusionId = $(this).children(".del-inclusion-id").val();
            $(".dialog-title").html("同梱状名を削除しますか？");
            $(".dialog-action").attr("action", baseUrl + "/inclusion/delete/" + inclusionId);
        });
    };
    
    var handleDisplaying = function () {
        var goodsExisting = $("input[name=goods_existing]:checked").val();
        if(goodsExisting == SPECIFY_RETURN_ADDRESS && $(".specify-return-address").hasClass("hidden")){
            $(".specify-return-address").removeClass("hidden");
            $(".jsReturningAddressLabel").css('top', '19px');
        }

        //商品在庫の返送先指定
        $("input:radio[name=goods_existing]").click(function() {
            var value = $(this).val();
            if(value == SPECIFY_RETURN_ADDRESS){
                if ($(".specify-return-address").hasClass("hidden")) {
                    $(".specify-return-address").removeClass("hidden");
                    $(".specify-return-address :input").val("");
                    $(".jsReturningAddressLabel").css('top', '19px');
                }
            }else{
                $(".specify-return-address").addClass("hidden");
                $(".jsReturningAddressLabel").attr('style', '');
            }
        });

        //配送種別
        $("body").on("click", ".present-block input[type=radio]", function (){
            $presentBlock = $(this).closest('.present-block');
            var checkedValue = $(this).val();
            var $customDeliveryType = $presentBlock.find('.custom-delivery-type');
            if(checkedValue == DELIVERY_TYPE_OTHER){
                $customDeliveryType.removeClass('hidden');
            }else{
                if (!$customDeliveryType.hasClass('hidden')) {
                    $customDeliveryType.addClass('hidden');
                }
            }
        });

    };

    var autoFillOutFileName = function (){
        $('body').on('change', 'input[type=file]', function (){
            var fileNameWithExtension = $(this).val().replace('C:\\fakepath\\', '');
            var fileNameArray = fileNameWithExtension.split('.').slice(0, -1);
            var fileName = fileNameArray.join('.');
            $(this).closest(".form-group").find("input[type=text]").val(fileName);
        });
    };

    init();
}

$(document).ready(function() {
    var $project = new Project();
});