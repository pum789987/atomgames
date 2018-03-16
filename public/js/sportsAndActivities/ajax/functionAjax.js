$(document).ready(function ()
{
    /*----------------------------กีฬา+กิจกรรม+เพศ------------------------------------*/
    $('#sport').click(function () {
        document.getElementById("inputMT").disabled = true;
        document.getElementById("inputName").disabled = true;
        document.getElementById("inputRound").disabled = true;
        $("#show-validate-format").hide();
        $("#show-premier").hide();
        $("#show-grouping").hide();
        $("#show-points").hide();
        $("#show-validate-type").hide();
        $("#show-validate-Name").hide();
        $("#show-validate-NoName").hide();
        $("#show-validate-sportCompeting").hide();
        $("#show-validate-sportNoteam").hide();
        $("#show-validate-sportCompete").hide();
        $("#show-true-MT").empty();
        $("#show-true-MT").append('*');
        $("#show-true-Name").empty();
        $("#show-true-Name").append('*');
        $("#show-true-Round").empty();
        $("#show-true-Round").append('*');
        SnA = document.getElementById("sport").value;
        document.getElementById("total-number").value = "";
        document.getElementById("total-number2").value = "";
        $('#inputMT').empty();
        $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
        $('#inputName').empty();
        $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
        $('#inputRound').empty();
        $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
        document.getElementById("type-f").checked = false;
        document.getElementById("type-m").checked = false;
        document.getElementById("type-a").checked = false;
        if (SnA == 'S') {
            var F = document.getElementById("type-f");
            F.addEventListener("click", get_SF);
            var M = document.getElementById("type-m");
            M.addEventListener("click", get_SA);
            var AL = document.getElementById("type-a");
            AL.addEventListener("click", get_SAL);


            function get_SF() {
                document.getElementById("inputName").disabled = false;
                document.getElementById("inputRound").disabled = true;
                document.getElementById("inputMT").disabled = true;
                $('#inputMT').empty();
                $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
                $('#inputRound').empty();
                $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                $("#show-premier").hide();
                $("#show-grouping").hide();
                $("#show-points").hide();
                $("#show-validate-type").hide();
                $("#show-validate-NoName").hide();
                $("#show-validate-Name").hide();
                $("#show-validate-sportCompeting").hide();
                $("#show-validate-sportNoteam").hide();
                $("#show-validate-sportCompete").hide();
                $("#show-true-MT").empty();
                $("#show-true-MT").append('*');
                $("#show-true-Name").empty();
                $("#show-true-Name").append('*');
                $("#show-true-Round").empty();
                $("#show-true-Round").append('*');
                document.getElementById('sportCompeting').value = '';
                document.getElementById("total-number").value = "";
                F = document.getElementById("type-f").value;
                if (F) {
                    $.ajax({
                        url: "createSchedule/getNameOfSnA?SnA=" + SnA + "&type=" + F,
                        type: "get",
                        cash: false,
                        dataType: "json",
                        success: function (data) {
                            $('#inputName').empty();
                            $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
                            if (!$.trim(data)) {
                                $("#show-validate-NoName:hidden").show('Slow');
                                document.getElementById('sportCompeting').value = 'NoName';
                            } else {
                                $.each(data, function (key, value) {
                                    $('#inputName').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('ไม่ถูกต้อง' + S + F)
                        }
                    });
                } else {
                    $('#inputName').empty();
                }
            }

            function get_SA() {
                document.getElementById("inputName").disabled = false;
                document.getElementById("inputRound").disabled = true;
                document.getElementById("inputMT").disabled = true;
                $('#inputMT').empty();
                $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
                $('#inputRound').empty();
                $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                $("#show-premier").hide();
                $("#show-grouping").hide();
                $("#show-points").hide();
                $("#show-validate-type").hide();
                $("#show-validate-NoName").hide();
                $("#show-validate-Name").hide();
                $("#show-validate-sportCompeting").hide();
                $("#show-validate-sportNoteam").hide();
                $("#show-validate-sportCompete").hide();
                $("#show-true-MT").empty();
                $("#show-true-MT").append('*');
                $("#show-true-Name").empty();
                $("#show-true-Name").append('*');
                $("#show-true-Round").empty();
                $("#show-true-Round").append('*');
                document.getElementById('sportCompeting').value = '';
                document.getElementById("total-number").value = "";
                M = document.getElementById("type-m").value;
                if (M) {
                    $.ajax({
                        url: "createSchedule/getNameOfSnA?SnA=" + SnA + "&type=" + M,
                        type: "get",
                        cash: false,
                        dataType: "json",
                        success: function (data) {
                            $('#inputName').empty();
                            $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
                            if (!$.trim(data)) {
                                $("#show-validate-NoName:hidden").show('Slow');
                                document.getElementById('sportCompeting').value = 'NoName';
                            } else {
                                $.each(data, function (key, value) {
                                    $('#inputName').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('ไม่ถูกต้อง' + S + M)
                        }
                    });
                } else {
                    $('#inputName').empty();
                }
            }

            function get_SAL() {
                document.getElementById("inputName").disabled = false;
                document.getElementById("inputRound").disabled = true;
                document.getElementById("inputMT").disabled = true;
                $('#inputMT').empty();
                $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
                $('#inputRound').empty();
                $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                $("#show-premier").hide();
                $("#show-grouping").hide();
                $("#show-points").hide();
                $("#show-validate-type").hide();
                $("#show-validate-NoName").hide();
                $("#show-validate-Name").hide();
                $("#show-validate-sportCompeting").hide();
                $("#show-validate-sportNoteam").hide();
                $("#show-validate-sportCompete").hide();
                $("#show-true-MT").empty();
                $("#show-true-MT").append('*');
                $("#show-true-Name").empty();
                $("#show-true-Name").append('*');
                $("#show-true-Round").empty();
                $("#show-true-Round").append('*');
                document.getElementById('sportCompeting').value = '';
                document.getElementById("total-number").value = "";
                AL = document.getElementById("type-a").value;
                if (AL) {
                    $.ajax({
                        url: "createSchedule/getNameOfSnA?SnA=" + SnA + "&type=" + AL,
                        type: "get",
                        cash: false,
                        dataType: "json",
                        success: function (data) {
                            $('#inputName').empty();
                            $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
                            if (!$.trim(data)) {
                                $("#show-validate-NoName:hidden").show('Slow');
                                document.getElementById('sportCompeting').value = 'NoName';
                            } else {
                                $.each(data, function (key, value) {
                                    $('#inputName').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('ไม่ถูกต้อง' + S + AL)
                        }
                    });
                } else {
                    $('#inputName').empty();
                }
            }
        }
    });
    $('#activities').click(function () {
        document.getElementById("inputMT").disabled = true;
        document.getElementById("inputName").disabled = true;
        document.getElementById("inputRound").disabled = true;
        $("#show-validate-format").hide();
        $("#show-premier").hide();
        $("#show-grouping").hide();
        $("#show-points").hide();
        $("#show-validate-type").hide();
        $("#show-validate-NoName").hide();
        $("#show-validate-Name").hide();
        $("#show-validate-sportCompeting").hide();
        $("#show-validate-sportNoteam").hide();
        $("#show-validate-sportCompete").hide();
        $("#show-true-MT").empty();
        $("#show-true-MT").append('*');
        $("#show-true-Name").empty();
        $("#show-true-Name").append('*');
        $("#show-true-Round").empty();
        $("#show-true-Round").append('*');
        SnA = document.getElementById("activities").value;
        document.getElementById("total-number").value = "";
        document.getElementById("total-number2").value = "";
        $('#inputMT').empty();
        $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
        $('#inputName').empty();
        $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
        $('#inputRound').empty();
        $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
        document.getElementById("type-f").checked = false;
        document.getElementById("type-m").checked = false;
        document.getElementById("type-a").checked = false;
        if (SnA == 'A') {
            var F = document.getElementById("type-f");
            F.addEventListener("click", get_AF);
            var M = document.getElementById("type-m");
            M.addEventListener("click", get_AA);
            var AL = document.getElementById("type-a");
            AL.addEventListener("click", get_AAL);

            function get_AF() {
                document.getElementById("inputName").disabled = false;
                document.getElementById("inputRound").disabled = true;
                document.getElementById("inputMT").disabled = true;
                $('#inputMT').empty();
                $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
                $('#inputRound').empty();
                $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                $("#show-premier").hide();
                $("#show-grouping").hide();
                $("#show-points").hide();
                $("#show-validate-type").hide();
                $("#show-validate-NoName").hide();
                $("#show-validate-Name").hide();
                $("#show-validate-sportCompeting").hide();
                $("#show-validate-sportNoteam").hide();
                $("#show-validate-sportCompete").hide();
                $("#show-true-MT").empty();
                $("#show-true-MT").append('*');
                $("#show-true-Name").empty();
                $("#show-true-Name").append('*');
                $("#show-true-Round").empty();
                $("#show-true-Round").append('*');
                document.getElementById('sportCompeting').value = '';
                document.getElementById("total-number").value = "";
                F = document.getElementById("type-f").value;
                if (F) {
                    $.ajax({
                        url: "createSchedule/getNameOfSnA?SnA=" + SnA + "&type=" + F,
                        type: "get",
                        cash: false,
                        dataType: "json",
                        success: function (data) {
                            $('#inputName').empty();
                            $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
                            if (!$.trim(data)) {
                                $("#show-validate-NoName:hidden").show('Slow');
                                document.getElementById('sportCompeting').value = 'NoName';
                            } else {
                                $.each(data, function (key, value) {
                                    $('#inputName').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('ไม่ถูกต้อง' + A + F)
                        }
                    });
                } else {
                    $('#inputName').empty();
                }
            }

            function get_AA() {
                document.getElementById("inputName").disabled = false;
                document.getElementById("inputRound").disabled = true;
                document.getElementById("inputMT").disabled = true;
                $('#inputMT').empty();
                $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
                $('#inputRound').empty();
                $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                $("#show-premier").hide();
                $("#show-grouping").hide();
                $("#show-points").hide();
                $("#show-validate-type").hide();
                $("#show-validate-NoName").hide();
                $("#show-validate-Name").hide();
                $("#show-validate-sportCompeting").hide();
                $("#show-validate-sportNoteam").hide();
                $("#show-validate-sportCompete").hide();
                $("#show-true-MT").empty();
                $("#show-true-MT").append('*');
                $("#show-true-Name").empty();
                $("#show-true-Name").append('*');
                $("#show-true-Round").empty();
                $("#show-true-Round").append('*');
                document.getElementById('sportCompeting').value = '';
                document.getElementById("total-number").value = "";
                M = document.getElementById("type-m").value;
                if (M) {
                    $.ajax({
                        url: "createSchedule/getNameOfSnA?SnA=" + SnA + "&type=" + M,
                        type: "get",
                        cash: false,
                        dataType: "json",
                        success: function (data) {
                            $('#inputName').empty();
                            $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
                            if (!$.trim(data)) {
                                $("#show-validate-NoName:hidden").show('Slow');
                                document.getElementById('sportCompeting').value = 'NoName';
                            } else {
                                $.each(data, function (key, value) {
                                    $('#inputName').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('ไม่ถูกต้อง' + A + M)
                        }
                    });
                } else {
                    $('#inputName').empty();
                }
            }

            function get_AAL() {
                document.getElementById("inputName").disabled = false;
                document.getElementById("inputRound").disabled = true;
                document.getElementById("inputMT").disabled = true;
                $('#inputMT').empty();
                $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>');
                $('#inputRound').empty();
                $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                $("#show-premier").hide();
                $("#show-grouping").hide();
                $("#show-points").hide();
                $("#show-validate-type").hide();
                $("#show-validate-NoName").hide();
                $("#show-validate-Name").hide();
                $("#show-validate-sportCompeting").hide();
                $("#show-validate-sportNoteam").hide();
                $("#show-validate-sportCompete").hide();
                $("#show-true-MT").empty();
                $("#show-true-MT").append('*');
                $("#show-true-Name").empty();
                $("#show-true-Name").append('*');
                $("#show-true-Round").empty();
                $("#show-true-Round").append('*');
                document.getElementById('sportCompeting').value = '';
                document.getElementById("total-number").value = "";
                AL = document.getElementById("type-a").value;
                if (AL) {
                    $.ajax({
                        url: "createSchedule/getNameOfSnA?SnA=" + SnA + "&type=" + AL,
                        type: "get",
                        cash: false,
                        dataType: "json",
                        success: function (data) {
                            $('#inputName').empty();
                            $('#inputName').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกชื่อกีฬาและกิจกรรมสัมพันธ์ -- </option>');
                            if (!$.trim(data)) {
                                $("#show-validate-NoName:hidden").show('Slow');
                                document.getElementById('sportCompeting').value = 'NoName';
                            } else {
                                $.each(data, function (key, value) {
                                    $('#inputName').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('ไม่ถูกต้อง' + A + AL)
                        }
                    });
                } else {
                    $('#inputName').empty();
                }
            }
        }

    });

    /*----------------------------ชื่อ->จำนวนทีม+รอบ------------------------------------*/
    $('#inputName').change(function () {
        $("#show-validate-NoName").hide();
        $("#show-validate-Name").hide();
        $("#show-validate-sportCompeting").hide();
        $("#show-validate-sportNoteam").hide();
        $("#show-validate-sportCompete").hide();
        document.getElementById('sportCompeting').value = '';
        S_ID = document.getElementById("inputName").value;
        document.getElementById("inputRound").disabled = false;
        document.getElementById("inputMT").disabled = false;
        $('#inputMT').empty();
        $('#inputMT').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกประเภทการแข่งขัน -- </option>'
            ,'<optgroup label="การแข่งขันแบบแพ้ครั้งเดียวคัดออก (single-elimination tournament)">'
            ,'<option value="MT11">การแข่งขันแบบแพ้คัดออกปกติ (divisible elimination)</option>'
            ,'<option value="MT12">การแข่งขันแบบแพ้คัดออกแบบลงตัวเป็นกำลังสองของสอง (indivisible elimination)</option>'
            ,'</optgroup>'
            ,'<optgroup label="การแข่งขันแบบพบกันหมด (round-robin tournament)">'
            ,'<option value="MT21">การแข่งขันแบบพบกันหมดทุกทีมหรือพรีเมียร์ลีก (premier league)</option>'
            ,'<option value="MT22">การแข่งขันแบบแบ่งกลุ่มพบกันหมด (grouping)</option>'
            ,'</optgroup>'
            ,'<optgroup label="การแข่งขันแบบเก็บคะแนน (scoring tournament)">'
            ,'<option value="MT31">การแข่งขันแบบเก็บคะแนน (scoring)</option>'
            ,'</optgroup>');
        if (S_ID) {
            $.ajax({
                url: "createSchedule/get_teamTotal?S_ID=" + S_ID,
                type: "get",
                cash: false,
                dataType: "json",
                success: function (data) {
                    $('#total-number').empty();
                    $.each(data, function () {
                        console.log(data);
                        document.getElementById("total-number").value = this.Total;
                        document.getElementById("total-number2").value = this.Total;
                        n = this.Total;
                        if (S_ID) {
                            $.ajax({
                                url: "createSchedule/get_round?S_ID=" + S_ID,
                                type: "get",
                                cash: false,
                                dataType: "json",
                                success: function (data2) {
                                    $('#inputRound').empty();
                                    $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                                    if(!$.trim(data2)){
                                        if (n > 4) {
                                            $('#inputRound').append('<optgroup label="รอบคัดเลือก (qualifying round)">'
                                                , '<option value="QL">รอบแรก (first match)</option>'
                                                , '</optgroup>');
                                        } else if (n == 4 || n == 3) {
                                            $('#inputRound').append('<optgroup label="รอบรองชนะเลิศ (semi-final round)">'
                                                , '<option value="SF">รอบรองชนะเลิศ 4 ทีมสุดท้าย (4 teams match)</option>'
                                                , '</optgroup>');

                                        } else if (n == 2){
                                            $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                , '<option value="FG">รอบชิงชนะเลิศเหรียญทอง (gold medal match)</option>'
                                                , '</optgroup>');
                                        }else {
                                            $("#show-validate-sportNoteam").show('Slow');
                                            document.getElementById('sportCompeting').value = 'NoTeam';
                                        }

                                    }else{
                                        $.each(data2, function () {
                                            $('#inputRound').empty();
                                            $('#inputRound').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกรอบการแข่งขัน -- </option>');
                                            if($.trim(data2)){
                                                ROUND_NAME = this.CP_ROUND_NAME;
                                                ROUND_NUM = this.CP_ROUND_NUM;
                                                console.log(ROUND_NAME,ROUND_NUM);
                                                $.ajax({
                                                    url: "createSchedule/get_Competing?CP_ROUND_NAME=" + ROUND_NAME+"&CP_ROUND_NUM="+ROUND_NUM+"&S_ID="+S_ID,
                                                    type: "get",
                                                    cash: false,
                                                    dataType: "json",
                                                    success: function (data3) {
                                                        if($.trim(data3) > 0) {
                                                            $("#show-validate-sportCompeting").show('Slow');
                                                            document.getElementById('sportCompeting').value = 'Competing';
                                                        }else {
                                                            if(ROUND_NAME == 'QL'){
                                                                if (n > 4) {
                                                                    $('#inputRound').append('<optgroup label="รอบก่อนรองชนะเลิศ (quarterfinals round)">'
                                                                        , '<option value="QT">รอบที่ 2,3,4, ... (match at 2,3,4,...)</option>'
                                                                        , '</optgroup>');
                                                                } else if (n == 4 || n == 3) {
                                                                    $('#inputRound').append('<optgroup label="รอบรองชนะเลิศ (semi-final round)">'
                                                                        , '<option value="SF">รอบรองชนะเลิศ 4 ทีมสุดท้าย (4 teams match)</option>'
                                                                        , '</optgroup>');

                                                                } else if (n == 2){
                                                                    $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                        , '<option value="FG">รอบชิงชนะเลิศเหรียญทอง (gold medal match)</option>'
                                                                        , '</optgroup>');
                                                                }else if (n == 1){
                                                                    $.ajax({
                                                                        url: "createSchedule/get_NType?CP_ROUND_NAME=" + ROUND_NAME,
                                                                        type: "get",
                                                                        cash: false,
                                                                        dataType: "json",
                                                                        success: function (data4) {
                                                                            if($.trim(data4) == 'true') {
                                                                                document.getElementById("total-number").value = 2;
                                                                                document.getElementById("total-number2").value = 2;
                                                                                $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                                    , '<option value="FS">รอบชิงชนะเลิศเหรียญทองแดง (silver medal match)</option>'
                                                                                    , '</optgroup>');
                                                                            }else {
                                                                                $("#show-validate-sportCompete").show('Slow');
                                                                                document.getElementById('sportCompeting').value = 'Compete';
                                                                            }
                                                                        },
                                                                        error: function (xhr, status, error) {
                                                                            alert('ไม่ถูกต้อง' + S_ID+'get_NType')
                                                                        }
                                                                    });
                                                                }else {
                                                                    $("#show-validate-sportCompeting").show('Slow');
                                                                    document.getElementById('sportCompeting').value = 'Competing';
                                                                }
                                                            }else if(ROUND_NAME == 'QT'){
                                                                if (n > 4) {
                                                                    $('#inputRound').append('<optgroup label="รอบก่อนรองชนะเลิศ (quarterfinals round)">'
                                                                        , '<option value="QT">รอบที่ 2,3,4, ... (match at 2,3,4,...)</option>'
                                                                        , '</optgroup>');
                                                                } else if (n == 4 || n == 3) {
                                                                    $('#inputRound').append('<optgroup label="รอบรองชนะเลิศ (semi-final round)">'
                                                                        , '<option value="SF">รอบรองชนะเลิศ 4 ทีมสุดท้าย (4 teams match)</option>'
                                                                        , '</optgroup>');

                                                                } else if (n == 2){
                                                                    $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                        , '<option value="FG">รอบชิงชนะเลิศเหรียญทอง (gold medal match)</option>'
                                                                        , '</optgroup>');
                                                                }else if (n == 1){
                                                                    $.ajax({
                                                                        url: "createSchedule/get_NType?CP_ROUND_NAME=" + ROUND_NAME,
                                                                        type: "get",
                                                                        cash: false,
                                                                        dataType: "json",
                                                                        success: function (data4) {
                                                                            if($.trim(data4) == 'true') {
                                                                                document.getElementById("total-number").value = 2;
                                                                                document.getElementById("total-number2").value = 2;
                                                                                $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                                    , '<option value="FS">รอบชิงชนะเลิศเหรียญทองแดง (silver medal match)</option>'
                                                                                    , '</optgroup>');
                                                                            }else {
                                                                                $("#show-validate-sportCompete").show('Slow');
                                                                                document.getElementById('sportCompeting').value = 'Compete';
                                                                            }
                                                                        },
                                                                        error: function (xhr, status, error) {
                                                                            alert('ไม่ถูกต้อง' + S_ID+'get_NType')
                                                                        }
                                                                    });
                                                                }else {
                                                                    $("#show-validate-sportCompeting").show('Slow');
                                                                    document.getElementById('sportCompeting').value = 'Competing';
                                                                }
                                                            }else if(ROUND_NAME == 'SF'){
                                                                if (n == 2){
                                                                    $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                        , '<option value="FG">รอบชิงชนะเลิศเหรียญทอง (gold medal match)</option>'
                                                                        , '</optgroup>');
                                                                }else if (n == 1){
                                                                    $.ajax({
                                                                        url: "createSchedule/get_NType?CP_ROUND_NAME=" + ROUND_NAME,
                                                                        type: "get",
                                                                        cash: false,
                                                                        dataType: "json",
                                                                        success: function (data4) {
                                                                            if($.trim(data4) == 'true') {
                                                                                document.getElementById("total-number").value = 2;
                                                                                document.getElementById("total-number2").value = 2;
                                                                                $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                                    , '<option value="FS">รอบชิงชนะเลิศเหรียญทองแดง (silver medal match)</option>'
                                                                                    , '</optgroup>');
                                                                            }else {
                                                                                $("#show-validate-sportCompete").show('Slow');
                                                                                document.getElementById('sportCompeting').value = 'Compete';
                                                                            }
                                                                        },
                                                                        error: function (xhr, status, error) {
                                                                            alert('ไม่ถูกต้อง' + S_ID+'get_NType')
                                                                        }
                                                                    });
                                                                }else {
                                                                    $("#show-validate-sportCompeting").show('Slow');
                                                                    document.getElementById('sportCompeting').value = 'Competing';
                                                                }
                                                            }else if(ROUND_NAME == 'FG'){
                                                                if (n == 1){
                                                                    $.ajax({
                                                                        url: "createSchedule/get_NType?CP_ROUND_NAME=" + ROUND_NAME+"&S_ID="+S_ID,
                                                                        type: "get",
                                                                        cash: false,
                                                                        dataType: "json",
                                                                        success: function (data4) {
                                                                            if($.trim(data4) == 'true') {
                                                                                document.getElementById("total-number").value = 2;
                                                                                document.getElementById("total-number2").value = 2;
                                                                                $('#inputRound').append('<optgroup label="รอบชิงชนะเลิศ (final round)">'
                                                                                    , '<option value="FS">รอบชิงชนะเลิศเหรียญทองแดง (silver medal match)</option>'
                                                                                    , '</optgroup>');
                                                                            }else {
                                                                                $("#show-validate-sportCompete").show('Slow');
                                                                                document.getElementById('sportCompeting').value = 'Compete';
                                                                            }
                                                                        },
                                                                        error: function (xhr, status, error) {
                                                                            alert('ไม่ถูกต้อง' + S_ID+'get_NType')
                                                                        }
                                                                    });
                                                                }else {
                                                                    $("#show-validate-sportCompeting").show('Slow');
                                                                    document.getElementById('sportCompeting').value = 'Competing';
                                                                }
                                                            }else {
                                                                $("#show-validate-sportCompete").show('Slow');
                                                                document.getElementById('sportCompeting').value = 'Compete';
                                                            }
                                                        }
                                                    },
                                                    error: function (xhr, status, error) {
                                                        alert('ไม่ถูกต้อง' + S_ID+'get_NType')
                                                    }
                                                });
                                            }else{
                                                alert('ไม่มี CP_ROUND_NAME และ CP_ROUND_NUM')
                                            }
                                        });
                                    }
                                },
                                error: function (xhr, status, error) {
                                    alert('ไม่ถูกต้อง' + S_ID+'get_round')
                                }
                            });
                        } else {
                            $('#inputRound').empty();
                        }
                    });
                },
                error: function (xhr, status, error) {
                    alert('ไม่ถูกต้อง' + S_ID+'get_teamTotal')
                }
            });
        } else {
            $('#total-number').empty();
        }
    });

});
