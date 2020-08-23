$('#addfile').change(function() {
    var input = this;
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#addImg').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
})
$('#editfile').change(function() {
    var input = this;
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#editImg').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
})
$(".addnew").click(function(){
    $(".add").toggle();
    $(".edit").hide();
})
$(".close").click(function(){
    $(".add").hide();
    $(".edit").hide();
});