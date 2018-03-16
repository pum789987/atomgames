$(document).ready(function ()
{
    /*----------------------------รหัสประจำตัวประชาชน-เลขหนังสือเดินทาง------------------------------------*/
    if($("#watch-me").prop('checked')===false && $("#see-me").prop('checked')===false){
        document.getElementById("IDcard").value = "";
        document.getElementById("Passport").value = "";
        $("#show-me").hide();
        $("#show-me-two").hide();
        $("#show-validate-Passport").hide();
        $("#show-validate-IDcard").hide();

    }
    $("#watch-me").click(function()
    {
        document.getElementById("Passport").value = "";
        $("#show-me:hidden").show('slow');
        $("#show-true-IDcard").empty();
        $("#show-true-IDcard").append('*')
        $("#show-me-two").hide();
        $("#show-validate-Passport").hide();

    });
    $("#watch-me").click(function()
    {
        if($('watch-me').prop('checked')===false)
        {
            document.getElementById("IDcard").value = "";
            $('#show-me').hide();
            $("#show-validate-IDcard").hide();
        }
    });


    $("#see-me").click(function()
    {
        document.getElementById("IDcard").value = "";
        $("#show-me-two:hidden").show('slow');
        $("#show-true-Passport").empty();
        $("#show-true-Passport").append('*')
        $("#show-me").hide();
        $("#show-validate-IDcard").hide();
    });
    $("#see-me").click(function()
    {
        if($('see-me-two').prop('checked')===false)
        {
            document.getElementById("Passport").value = "";
            $('#show-me-two').hide();
            $("#show-validate-Passport").hide();
        }
    });


});
