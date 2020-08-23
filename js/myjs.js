$(".header-cat").click(function(){
    $(".body-cat").slideToggle();
})
$(".minus-none").click(function(){
    input = $(this).parent(".qty-block").find(".qty-input");
    if (input.val()==1){
        return;
    }
    result= parseInt(input.val())-1;
    input.val(result);
})
$(".plus-none").click(function(){
    father = $(this).parent(".qty-block")
    input = father.find(".qty-input");
    i = $(this).parent(".qty-block").find(".index-pro").val();
    qty = father.find(".pro-qty").text().replace(/\./g,"");
    if (input.val()==qty){
        return;
    }
    result= parseInt(input.val())+1;
    input.val(result);
})
$(".minus-have").click(function(){
    input = $(this).parent(".qty-block").find(".qty-input");
    if (input.val()==1){
        return;
    }
    result= parseInt(input.val())-1;
    input.val(result);
    calculateOrder();
    calculateCheckout();
    i = $(this).parent(".qty-block").find(".index-pro").val();
    if (!$(".let-checkout").hasClass("un-selected")){
        $(".let-checkout").addClass("un-selected");
    }
    setTimeout(function(){
        updateCart(i, result);
    }, 2000);
})
$(".plus-have").click(function(){
    father = $(this).parent(".qty-block")
    input = father.find(".qty-input");
    i = $(this).parent(".qty-block").find(".index-pro").val();
    qty = father.find(".pro-qty").text().replace(/\./g,"");
    if (input.val()==qty){
        return;
    }
    result= parseInt(input.val())+1;
    input.val(result);
    calculateOrder();
    calculateCheckout();
    if (!$(".let-checkout").hasClass("un-selected")){
        $(".let-checkout").addClass("un-selected");
    }
    setTimeout(function(){
        updateCart(i, result);
    }, 2000);
})
$('input').on('focusin', function(){
    $(this).data('val', $(this).val());
});
$(".qty-input").change(function(){
    qty = $(this).parent(".qty-block").find(".pro-qty").text().replace(/\./g,"");
    i = $(this).parent(".qty-block").find(".index-pro").val();
    prev = $(this).data("val");
    if (parseInt($(this).val())<1 || parseInt($(this).val())>parseInt(qty)){
        $(this).val(prev);
    }
})
$(".qty-input-have").change(function(){
    i = $(this).parent(".qty-block").find(".index-pro").val();
    updateCart(i, $(this).val());
})
$("#check-all").click(function(){
    if (document.getElementById("check-all").checked==true){
        window.location.href="/as2/model/changeCartStatus.php?index=tAll";
    }
    else{
        window.location.href="/as2/model/changeCartStatus.php?index=fAll";
    }
})
function updateCart(i, qty){
    window.location.href="/as2/model/updateCart.php?index="+i+"&qty="+qty;
}
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
function calculateOrder(){
    var num = 0;
    var total = 0;
    $('.check-item:checked').each(function() {
        father = $(this).parents().parent(".cart-item");
        total = total + parseInt(father.find(".quantity").find(".qty-block").find(".qty-input").val())*parseInt(father.find(".price").text().replace(/\./g,""));
        num = num + parseInt(father.find(".quantity").find(".qty-block").find(".qty-input").val());
    });
    $(".total-qty").text(formatNumber(num));
    $(".order-total").text(formatNumber(total));
}
function calculateCheckout(){
    var total =0;
    var proList = $(".cart-item");
    for (var i = 0 ;i< proList.length; i++){
        var price = parseInt($(proList[i]).find(".price").text().replace(/\./g,""));
        var qty =  parseInt($(proList[i]).find(".quantity").find(".qty-block").find(".qty-input").val());
        var subtotal = price * qty;
        $(proList[i]).find(".total-price").text(formatNumber(subtotal)+"đ");
        total += subtotal;
    }
    $(".total-all-pro").text(formatNumber(total)+"đ");
    total +=parseInt($(".shipping").text().replace(/\./g,""));
    $(".total-order").text(formatNumber(total)+"đ");
}
$(document).ready(function(){
    if ($(".check-order").val()==0){
        $(".let-checkout").addClass("un-selected");
        calculateCheckout();
    }
    else{
        calculateOrder();
        calculateCheckout();
    }
})
$(".check-item").change(function(){
    window.location.href="/as2/model/changeCartStatus.php?index="+$(this).val();
})
$(".let-checkout").click(function(){
    window.location.href = "/as2/checkout.php";
})
$(".user-header").click(function(){
    $(".user-box").slideToggle();
})
$(".profile-change").change(function(){
    $(".edit-profile").removeClass("un-selected");
})