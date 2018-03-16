$(document).ready(function ()
{
    /*----------------------------เพศ-คำนำหน้า------------------------------------*/
    var f = document.getElementById("gender-f");
    f.addEventListener("click", get_prenameF);
    var m = document.getElementById("gender-m");
    m.addEventListener("click", get_prenameM);

    function get_prenameF()
    {
        $("#show-validate-gender").hide();
        $("#show-true-prename").empty();
        $("#show-true-prename").append('*');
        f = document.getElementById("gender-f").value;
        if(f) {
            $.ajax({
                url: "register/getPrename?gender="+f,
                type: "get",
                cash : false,
                dataType : "json",
                success : function (data) {
                    $('#prename').empty();
                    $('#prename').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกคำนำหน้าชื่อ -- </option>');
                    $.each(data, function(key, value) {
                        $('#prename').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    alert('ไม่ถูกต้อง'+f)
                }
            });
        }else{
            $('#prename').empty();
        }
    }
    function get_prenameM()
    {
        $("#show-validate-gender").hide();
        $("#show-true-prename").empty();
        $("#show-true-prename").append('*');
        m = document.getElementById("gender-m").value;
        if(m) {
            $.ajax({
                url: "register/getPrename?gender="+m,
                type: "get",
                cash : false,
                dataType : "json",
                success : function (data) {
                    $('#prename').empty();
                    $('#prename').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกคำนำหน้าชื่อ -- </option>');
                    $.each(data, function(key, value) {
                        $('#prename').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    alert('ไม่ถูกต้อง'+m)
                }
            });
        }else{
        $('#prename').empty();
        }
    }

});
