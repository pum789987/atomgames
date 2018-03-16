
    $("#show-validate-gender").hide();
    $("#show-validate-prename").hide();
    $("#show-validate-fullname").hide();
    $("#show-validate-IDcard").hide();
    $("#show-validate-Passport").hide();
    $("#show-validate-tell").hide();
    $("#show-validate-AT_Type").hide();
    $("#show-validate-University").hide();
    $("#show-validate-mail").hide();
    $("#show-validate-user").hide();
    $("#show-user-exists").hide();
    $("#show-validate-pass").hide();
    $("#show-validate-pass2").hide();
    /*----------------------------คำนำหน้า------------------------------------*/
    function prenameShowTrue() {
        $("#show-true-prename").empty();
        if (document.forms["AttendeesRegister"]["prename"].value === "disabled") {
            $("#show-true-prename").append('*');
            return false;
        } else {
            $("#show-validate-prename").hide();
            $("#show-true-prename").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }
    }

    /*----------------------------ชื่อ - นามสกุล------------------------------------*/
    function fullnameShowTrue() {
        var text = document.getElementById('inputfullname').value;
        var textRGEX = /\D+\s\D+/;
        var Result = textRGEX.test(text);
        $("#show-true-fullname").empty();
        if (Result === false) {
            $("#show-true-fullname").append('*');
            $("#show-validate-fullname:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-fullname").hide();
            $("#show-true-fullname").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }

    }

    /*----------------------------รหัสบัตร------------------------------------*/
    function IDcardShowTrue() {
        var text = document.getElementById('IDcard').value;
        var textRGEX = /[0-9]{13}/;
        var Result = textRGEX.test(text);
        $("#show-true-IDcard").empty();
        if (Result === false) {
            $("#show-true-IDcard").append('*');
            $("#show-validate-IDcard:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-IDcard").hide();
            $("#show-true-IDcard").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }

    }

    /*----------------------------เลขหนังสือเดินทาง------------------------------------*/
    function PassportShowTrue() {
        var text = document.getElementById('Passport').value;
        var textRGEX = /[A-Za-z]{1,2}[0-9]{6,11}/;
        var Result = textRGEX.test(text);
        $("#show-true-Passport").empty();
        if (Result === false) {
            $("#show-true-Passport").append('*');
            $("#show-validate-Passport:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-Passport").hide();
            $("#show-true-Passport").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }

    }

    /*----------------------------เบอร์โทรติดต่อ------------------------------------*/
    function tellShowTrue() {
        var text = document.getElementById('tell').value;
        var textRGEX = /[0-9]{3}[0-9-]{7,10}?/;
        var Result = textRGEX.test(text);
        $("#show-true-tell").empty();
        if (Result === false) {
            $("#show-true-tell").append('*');
            $("#show-validate-tell:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-tell").hide();
            $("#show-true-tell").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }

    }

    /*----------------------------ประเภทผู้เข้าร่วมงาน------------------------------------*/
    function AT_TypeShowTrue() {
        $("#show-true-AT_Type").empty();
        if (document.forms["AttendeesRegister"]["AT_Type"].value === "disabled") {
            $("#show-true-AT_Type").append('*');
            return false;
        } else {
            $("#show-validate-AT_Type").hide();
            $("#show-true-AT_Type").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }
    }

    /*----------------------------มหาวิทยาลัย------------------------------------*/
    function UniversityShowTrue() {
        $("#show-true-University").empty();
        if (document.forms["AttendeesRegister"]["University"].value === "disabled") {
            $("#show-true-University").append('*');
            return false;
        } else {
            $("#show-validate-University").hide();
            $("#show-true-University").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }
    }

    /*----------------------------mail------------------------------------*/
    function mailShowTrue() {
        var text = document.getElementById('E-mail').value;
        var textRGEX = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        var Result = textRGEX.test(text);
        $("#show-true-mail").empty();
        if (Result === false) {
            $("#show-true-mail").append('*');
            $("#show-validate-mail:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-mail").hide();
            $("#show-true-mail").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }

    }

    /*----------------------------Username------------------------------------*/
    function userShowTrue() {
        var text_user = document.getElementById('inputUsername').value;
        var textRGEX = /\w{4,14}/;
        var Result = textRGEX.test(text_user);
        $("#show-true-user").empty();
        if (Result === false) {
            $("#show-true-user").append('*');
            $("#show-user-exists").hide();
            $("#show-validate-user:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-user").hide();
            $("#show-user-exists").hide();
            $.ajax({
                url: "register/getExistsUser?user=" + text_user,
                type: "get",
                cash: false,
                dataType: "json",
                success: function (data) {
                    if ($.trim(data) == 'true') {
                        $("#show-true-user").empty();
                        $("#show-true-user").append('<i class="fa fa-check-circle text-success"></i>');
                        return true;
                    } else {
                        $("#show-true-user").empty();
                        $("#show-true-user").append('*');
                        $("#show-user-exists:hidden").show('slow');
                        return false;
                    }
                },
                error: function (xhr, status, error) {
                    alert("error");
                    $("#show-user-exists:hidden").show('slow');
                    $("#show-true-user").hide();
                    return false;
                }
            });
        }

    }

    /*----------------------------password------------------------------------*/
    function passShowTrue() {
        var text = document.getElementById('inputPassword').value;
        var textRGEX = /\w{4,14}/;
        var Result = textRGEX.test(text);
        $("#show-true-pass").empty();
        if (Result === false) {
            $("#show-true-pass").append('*');
            $("#show-validate-pass:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-pass").hide();
            $("#show-true-pass").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }

    }

    function pass2ShowTrue() {
        var pass1 = document.getElementById('inputPassword').value;
        var pass2 = document.getElementById('inputCPassword').value;
        $("#show-true-pass2").empty();
        if (pass1 === pass2) {
            $("#show-validate-pass2").hide();
            $("#show-true-pass2").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        } else {
            $("#show-true-pass2").append('*');
            $("#show-validate-pass2:hidden").show('slow');
            return false;
        }
    }

    /*--------------------------------------------------validate-------------------------------------------------------------------*/
    function validateForm() {
        /*----------------------------เพศ------------------------------------*/
        var v_gender = document.forms["AttendeesRegister"]["gender"].value;
        if (v_gender == "") {
            document.getElementById('gender-f').scrollIntoView();
            $("#show-validate-gender").show('slow');
            return false;
        }
        /*----------------------------คำนำหน้า------------------------------------*/
        var v_prename = document.forms["AttendeesRegister"]["prename"].value;
        if (v_prename == "disabled") {
            $("#show-true-prename").empty();
            $("#prename").focus();
            $("#show-true-prename").append('*');
            $("#show-validate-prename:hidden").show('slow');
            return false;
        }
        /*----------------------------รหัสบัตร------------------------------------*/
        var v_IDcardNPass = document.forms["AttendeesRegister"]["IDcardNPass"].value;
        if (v_IDcardNPass == "") {
            alert('v_IDcardNPass');
            $("#IDcard").focus();
            $("#show-validate-IDcardNPass:hidden").show('slow');
            return false;
        }
        if (v_IDcardNPass == "card") {
            alert('card');
            if (document.getElementById("IDcard").value == "") {
                $("#IDcard").focus();
                $("#show-validate-IDcard:hidden").show('slow');
                return false;
            }
        }
        if (v_IDcardNPass == "Passport") {
            if (document.getElementById("Passport").value == "") {
                $("#Passport").focus();
                $("#show-validate-Passport:hidden").show('slow');
                return false;
            }
        }
        /*----------------------------ประเภทผู้เข้าร่วมงาน------------------------------------*/
        var v_AT_Type = document.forms["AttendeesRegister"]["AT_Type"].value;
        if (v_AT_Type == "disabled") {
            $("#show-true-AT_Type").empty();
            $("#inputType").focus();
            $("#show-true-AT_Type").append('*');
            $("#show-validate-AT_Type:hidden").show('slow');
            return false;
        }
        /*----------------------------มหาวิทยาลัย------------------------------------*/
        var v_University = document.forms["AttendeesRegister"]["University"].value;
        if (v_University == "disabled") {
            $("#show-true-University").empty();
            $("#inputUNS").focus();
            $("#show-true-University").append('*');
            $("#show-validate-University:hidden").show('slow');
            return false;
        }
        /*----------------------------user------------------------------------*/
        if ($("#show-user-exists").is(':show')) {
            $("#inputUsername").focus();
            return false;
        }
        if ($("#show-validate-user").is(':show')) {
            $("#inputUsername").focus();
            return false;
        }
        /*----------------------------pass2------------------------------------*/
        var pass1submid = document.getElementById('inputPassword').value;
        var pass2submid = document.getElementById('inputCPassword').value;
        $("#show-true-pass2").empty();
        if (pass1submid != pass2submid) {
            $("#show-true-pass2").append('*');
            $("#show-validate-pass2:hidden").show('slow');
            return false;
        } else {
            $("#show-validate-pass2").hide();
            $("#show-true-pass2").append('<i class="fa fa-check-circle text-success"></i>');
            return true;
        }
    }
