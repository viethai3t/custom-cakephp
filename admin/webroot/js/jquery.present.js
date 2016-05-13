function Project(){

    var DELIVERY_TYPE_OTHER = 7;

    var init = function(){
        executeExpansion();
        handleDisplaying();
    };

    var executeExpansion = function(){

        $(".expand-element").click(function(){
            var adjustment = $(".expansible-block .present-block").length;
            var cloned = $(".clone-block:first").clone()
                .find("input:radio").attr("name", "present_type_" + (adjustment+1)).end()
                .find("input:radio").removeAttr("checked").end()
                .find(":input:not(:radio)").val("").end()
                .find("h4").html("商品 " + (adjustment+1)).end()
                .removeClass("hidden")
                .appendTo(".expansible-block");

        });

    };

    var handleDisplaying = function () {

        $("body").on("change", ".present-block input[type=radio]", function (){
            var $presentBlock = $(this).closest('.present-block');
            var checkedValue = $(this).val();
            var $customDeliveryType = $presentBlock.find('.custom-delivery-type');
            if(checkedValue == DELIVERY_TYPE_OTHER){
                $customDeliveryType.val('');
                $customDeliveryType.removeClass('hidden');
            }else{
                $customDeliveryType.addClass('hidden');
            }
        });

        $(".expansible-block .present-block:first .require").each(function(){
            $(this).append(' <span class="label-default label label-danger">必須</span> ');
        });
    };

    init();
}

$(document).ready(function() {
    var $project = new Project();
});