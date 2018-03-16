/*-----------------------hidden------------------------*/
$("#show-validate-format").hide();
$("#show-validate-type").hide();
$("#show-premier").hide();
$("#show-grouping").hide();
$("#show-points").hide();
$("#show-validate-Round").hide();
$("#show-validate-Name").hide();
$("#show-validate-NoName").hide();
$("#show-validate-sportCompeting").hide();
$("#show-validate-sportNoteam").hide();
$("#show-validate-sportCompete").hide();
$("#show-validate-MT").hide();
$("#show-validate-Group").hide();
$("#show-validate2-Group").hide();
$("#show-validate3-Group").hide();
$("#show-validate-teams").hide();
$("#show-validate2-teams").hide();
$("#show-validate3-teams").hide();
$("#show-validate-teamsP").hide();
$("#show-validate2-teamsP").hide();
$("#show-validate3-teamsP").hide();
$("#show-validate-winning").hide();
$("#show-validate2-winning").hide();
$("#show-validate3-winning").hide();
$("#show-validate-DH").hide();
$("#show-validate2-DH").hide();
$("#show-validate3-DH").hide();
$("#show-validate-defeated").hide();
$("#show-validate2-defeated").hide();
$("#Suitable").hide();
$("#show-validate-days").hide();
$("#show-validate-TTime").hide();
$("#show-validate-matchs").hide();
$("#show-validate-times").hide();
$("#show-validate-races").hide();
$("#show-validate2-days").hide();
$("#show-validate2-TTime").hide();
$("#show-validate2-matchs").hide();
$("#show-validate2-times").hide();
$("#show-validate2-races").hide();
/*-----------------------รอบการแข่ง------------------------*/
function RoundShowTrue() {
    $("#show-true-Round").empty();
    if (document.forms["createSchedule"]["Round"].value === "disabled") {
        $("#show-true-Round").append('*');
        return false;
    } else {
        $("#show-validate-Round").hide();
        $("#show-true-Round").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }
}
/*-----------------------ชื่อกีฬษ------------------------*/
function NameShowTrue() {
    $("#show-true-Name").empty();
    if (document.forms["createSchedule"]["Name"].value === "disabled") {
        $("#show-true-Name").append('*');
        return false;
    } else {
        $("#show-validate-Name").hide();
        $("#show-true-Name").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }
}
/*-----------------------ประเภทการแข่งขัน------------------------*/
function MatchShowTrue() {
    $("#show-true-MT").empty();
    $("#show-validate-Group").hide();
    $("#show-validate2-Group").hide();
    $("#show-validate3-Group").hide();
    $("#show-validate-teams").hide();
    $("#show-validate2-teams").hide();
    $("#show-validate3-teams").hide();
    $("#show-validate-teamsP").hide();
    $("#show-validate2-teamsP").hide();
    $("#show-validate3-teamsP").hide();
    $("#show-validate-winning").hide();
    $("#show-validate2-winning").hide();
    $("#show-validate3-winning").hide();
    $("#show-validate-DH").hide();
    $("#show-validate2-DH").hide();
    $("#show-validate3-DH").hide();
    $("#show-validate-defeated").hide();
    $("#show-validate2-defeated").hide();
    if (document.forms["createSchedule"]["match_type"].value === "disabled") {
        $("#show-true-MT").append('*');
        return false;
    } else {
        if(document.forms["createSchedule"]["match_type"].value === "MT22"){
            $("#show-premier").hide('slow');
            $("#show-grouping").show('slow');
            $("#show-points").show('slow');
        }else if (document.forms["createSchedule"]["match_type"].value === "MT21"){
            $("#show-grouping").hide('slow');
            $("#show-premier").show('slow');
            $("#show-points").show('slow');
        }
        else {
            $("#show-premier").hide('slow');
            $("#show-grouping").hide('slow');
            $("#show-points").hide('slow');
        }
        document.getElementById("inputName").disabled = false;
        $("#show-validate-MT").hide();
        $("#show-true-MT").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }
}
/*-----------------------ประเภทการแข่งขัน-กลุ่ม------------------------*/
function GroupShowTrue() {
    var text = document.getElementById('inputGroup').value;
    var textRGEX = /^([^-])?[3-9]$|^[1-9][0-9]+$/;
    var Result = textRGEX.test(text);
    $("#show-true-Group").empty();
    $("#show-validate-Group").hide();
    $("#show-validate2-Group").hide();
    $("#show-validate3-Group").hide();
    $("#show-validate3-teams").hide();
    if (Result === false) {
        $("#show-true-Group").append('*');
        $("#show-validate2-Group:hidden").show('slow');
        return false;
    } else {
        $("#show-validate2-Group").hide();
        $("#show-true-Group").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}

/*-----------------------จำนวนทีมที่ผ่านเข้ารอบ------------------------*/
function TeamsPShowTrue() {
    var text = document.getElementById('inputTeamsP').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-true-teamsP").empty();
    $("#show-validate2-teamsP").hide();
    $("#show-validate3-teamsP").hide();
    if (Result === false) {
        $("#show-true-teamsP").append('*');
        $("#show-validate-teamsP:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-teamsP").hide();
        $("#show-true-teamsP").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------จำนวนทีมที่ผ่านเข้ารอบในแต่ละกลุ่ม------------------------*/
function TeamsShowTrue() {
    var text = document.getElementById('inputTeams').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-true-teams").empty();
    $("#show-validate2-teams").hide();
    $("#show-validate3-teams").hide();
    if (Result === false) {
        $("#show-true-teams").append('*');
        $("#show-validate-teams:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-teams").hide();
        $("#show-true-teams").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------จำนวนแต้มที่ได้เมื่อชนะในการแข่ง------------------------*/
function WinningShowTrue() {
    var text = document.getElementById('inputWinning').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-true-winning").empty();
    $("#show-validate2-winning").hide();
    $("#show-validate3-DH").hide();
    $("#show-validate3-winning").hide();
    if (Result === false) {
        $("#show-true-winning").append('*');
        $("#show-validate-winning:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-winning").hide();
        $("#show-true-winning").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------จำนวนแต้มที่ได้เมื่อเสมอในการแข่ง------------------------*/
function DHShowTrue() {
    var text = document.getElementById('inputDH').value;
    var textRGEX = /^[0-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-true-DH").empty();
    $("#show-validate2-DH").hide();
    $("#show-validate3-DH").hide();
    $("#show-validate3-winning").hide();
    if (Result === false) {
        $("#show-true-DH").append('*');
        $("#show-validate-DH:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-DH").hide();
        $("#show-true-DH").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------จำนวนแต้มที่ได้เมื่อแพ้การแข่ง------------------------*/
function DefeatedShowTrue() {
    var text = document.getElementById('inputDefeated').value;
    var textRGEX = /^[0-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-true-defeated").empty();
    $("#show-validate2-defeated").hide();
    $("#show-validate3-DH").hide();
    $("#show-validate3-winning").hide();
    if (Result === false) {
        $("#show-true-defeated").append('*');
        $("#show-validate-defeated:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-defeated").hide();
        $("#show-true-defeated").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------------------------check the suitability------------------------------------------------*/
$("#inputSuitable").change(function(event) {
    var checkbox = event.target;
    if (checkbox.checked) {
        $("#Suitable").show('slow');
    } else {
        $("#Suitable").hide('slow');
        document.getElementById('inputDays').value = '';
        document.getElementById('inputTTime').value = '';
        document.getElementById('inputMatches').value = '';
        document.getElementById('inputTimes').value = '';
        document.getElementById('inputRaces').value = '';
    }
});

/*-----------------------วันแข่ง------------------------*/
function DaysShowTrue() {
    var text = document.getElementById('inputDays').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-validate2-days").hide();
    $("#show-true-days").empty();
    if (Result === false) {
        $("#show-true-days").append('*');
        $("#show-validate-days:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-days").hide();
        $("#show-true-days").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------เวลารวม------------------------*/
function HTimeShowTrue() {
    var text = document.getElementById('inputHTime').value;
    var textRGEX = /^[0-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-validate2-TTime").hide();
    $("#show-true-HTime").empty();
    if (Result === false) {
        $("#show-true-HTime").append('*');
        $("#show-validate-TTime:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-TTime").hide();
        $("#show-true-HTime").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
function MTimeShowTrue() {
    var text = document.getElementById('inputMTime').value;
    var textRGEX = /^[0-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-validate2-TTime").hide();
    $("#show-true-MTime").empty();
    if (Result === false) {
        $("#show-true-MTime").append('*');
        $("#show-validate-TTime:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-TTime").hide();
        $("#show-true-MTime").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------แมทซ์------------------------*/
function MatchesShowTrue() {
    var text = document.getElementById('inputMatches').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-validate2-matchs").hide();
    $("#show-true-matchs").empty();
    if (Result === false) {
        $("#show-true-matchs").append('*');
        $("#show-validate-matchs:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-matchs").hide();
        $("#show-true-matchs").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------นาที------------------------*/
function TimesShowTrue(){
    var text = document.getElementById('inputTimes').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-validate2-times").hide();
    $("#show-true-times").empty();
    if (Result === false) {
        $("#show-true-times").append('*');
        $("#show-validate-times:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-times").hide();
        $("#show-true-times").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*-----------------------ครั้ง------------------------*/
function RacesShowTrue(){
    var text = document.getElementById('inputRaces').value;
    var textRGEX = /^[1-9][0-9]*$/;
    var Result = textRGEX.test(text);
    $("#show-validate2-races").hide();
    $("#show-true-races").empty();
    if (Result === false) {
        $("#show-true-races").append('*');
        $("#show-validate-races:hidden").show('slow');
        return false;
    } else {
        $("#show-validate-races").hide();
        $("#show-true-races").append('<i class="fa fa-check-circle text-success"></i>');
        return true;
    }

}
/*--------------------------------------------------validate-------------------------------------------------------------------*/
function validateForm() {
    /*-----------------------format------------------------*/
    var v_format = document.forms["createSchedule"]["format"].value;
    if (v_format == "") {
        window.location.hash = '#ShowFormat';
        $("#show-validate-format").show('slow');
        return false;
    }
    /*-----------------------gender------------------------*/
    var v_type = document.forms["createSchedule"]["type-name"].value;
    if (v_type == "") {
        window.location.hash = '#ShowType';
        $("#show-validate-type").show('slow');
        return false;
    }
    /*-----------------------ชื่อ------------------------*/
    var v_Name = document.forms["createSchedule"]["Name"].value;
    if (v_Name == "disabled") {
        $("#show-true-Name").empty();
        $("#inputName").focus();
        $("#show-true-Name").append('*');
        $("#show-validate-Name:hidden").show('slow');
        return false;
    }
    /*-------------------------------กำลังแข่งขัน+ไม่มีทีม+แข่งเสร็จ---------------------------------*/
    var v_competing = document.forms["createSchedule"]["Competing"].value;
    if(v_competing == "Competing" || v_competing == "NoName" || v_competing == "NoTeam" || v_competing == "Compete"){
        $("#inputName").focus();
        return false;
    }
    /*-----------------------รอบการแข่ง------------------------*/
    var v_Round = document.forms["createSchedule"]["Round"].value;
    if (v_Round == "disabled") {
        $("#show-true-Round").empty();
        $("#inputRound").focus();
        $("#show-true-Round").append('*');
        $("#show-validate-Round:hidden").show('slow');
        return false;
    }
    /*-----------------------ประเภทการแข่งขัน------------------------*/
    var v_match = document.forms["createSchedule"]["match_type"].value;
    if (v_match == "disabled") {
        $("#show-true-MT").empty();
        $("#inputMT").focus();
        $("#show-true-MT").append('*');
        $("#show-validate-MT:hidden").show('slow');
        return false;
    }else{
        if(document.forms["createSchedule"]["match_type"].value == "MT22"){
            /*-----ตรวจสอบจำนวนทีม-----*/
            var totalG = document.getElementById("total-number2").value;
            var teamsG = document.getElementById("inputGroup").value
            console.log(totalG,teamsG,document.getElementById("inputTeams").value);
            if(totalG < teamsG){
                $("#show-validate3-Group:hidden").show('slow');
                $("#inputGroup").focus();
                return false;
            }
            if(document.getElementById("inputTeams").value > document.getElementById("inputGroup").value){
                $("#show-validate3-teams:hidden").show('slow');
                $("#inputTeams").focus();
                return false;
            }
            /*-----ทีม/กลุ่ม-----*/
            if(document.getElementById("inputGroup").value == ""){
                $("#show-validate-Group:hidden").show('slow');
                $("#inputGroup").focus();
                return false;
            }else if(document.getElementById("inputGroup").value <= 2){
                $("#inputGroup").focus();
                return false;
            }
            /*-----ทีม/เข้ารอบ-----*/
            if(document.getElementById("inputTeams").value == ""){
                $("#show-validate2-teams:hidden").show('slow');
                $("#inputTeams").focus();
                return false;
            }else if(document.getElementById("inputTeams").value <= 0){
                $("#inputTeams").focus();
                return false;
            }
        }
        else if(document.forms["createSchedule"]["match_type"].value == "MT21"){
            /*-----ตรวจสอบจำนวนทีม-----*/
            var totalP = document.getElementById("total-number2").value;
            var teamsP = document.getElementById("inputTeamsP").value
            console.log(totalP,teamsP);
            if(totalP < teamsP){
                $("#show-validate2-teamsP:hidden").show('slow');
                $("#inputTeamsP").focus();
                return false;
            }
            /*-----รวม/เข้ารอบ-----*/
            if(document.getElementById("inputTeamsP").value == ""){
                $("#show-validate3-teamsP:hidden").show('slow');
                $("#inputTeamsP").focus();
                return false;
            }else if(document.getElementById("inputTeamsP").value <= 0){
                $("#inputTeamsP").focus();
                return false;
            }
        }
        /*-----ชนะ-----*/
        if(document.getElementById("inputWinning").value == ""){
            $("#show-validate2-winning:hidden").show('slow');
            $("#inputWinning").focus();
            return false;
        }else if(document.getElementById("inputWinning").value <= 0){
            $("#inputWinning").focus();
            return false;
        }
        /*-----เสมอ-----*/
        if(document.getElementById("inputDH").value == ""){
            $("#show-validate2-DH:hidden").show('slow');
            $("#inputDH").focus();
            return false;
        }else if(document.getElementById("inputDH").value < 0){
            $("#inputDH").focus();
            return false;
        }
        /*-----แพ้-----*/
        if(document.getElementById("inputDefeated").value == ""){
            $("#show-validate2-defeated:hidden").show('slow');
            $("#inputDefeated").focus();
            return false;
        }else if(document.getElementById("inputDefeated").value < 0){
            $("#inputDefeated").focus();
            return false;
        }
        /*-----ตรวจแต้ม-----*/
        if(document.getElementById("inputWinning").value < document.getElementById("inputDH").value){
            $("#show-validate3-winning:hidden").show('slow');
            $("#inputWinning").focus();
            return false;
        }
        else if(document.getElementById("inputDH").value < document.getElementById("inputDefeated").value){
            $("#show-validate3-DH:hidden").show('slow');
            $("#inputDH").focus();
            return false;
        }
    }
    /*-----------------------suitability------------------------*/
    if(document.getElementById("inputSuitable").checked == true){
        /*----days----*/
        var v_days = document.forms["createSchedule"]["days"].value;
        if (v_days == "") {
            $("#inputDays").focus();
            $("#show-validate2-days").show('slow');
            return false;
        }else if(v_days <= 0){
            $("#inputDays").focus();
            return false;
        }
        /*----TTime----*/
        var v_HTime = document.forms["createSchedule"]["HTime"].value;
        var v_MTime = document.forms["createSchedule"]["MTime"].value;
        if (v_HTime == "" && v_MTime == "") {
            $("#inputHTime").focus();
            $("#show-validate2-TTime").show('slow');
            return false;
        }
        if(v_HTime <= 0 || v_HTime == ""){
            if(v_HTime == 0 && (v_MTime <= 0 || v_MTime == "")){
                $("#show-true-MTime").empty();
                $("#show-true-MTime").append('*');
                $("#inputMTime").focus();
                $("#show-validate-TTime").show('slow');
                return false;
            }
            if(v_HTime < 0 && (v_MTime >= 0 || v_MTime == "")){
                $("#show-true-HTime").empty();
                $("#show-true-HTime").append('*');
                $("#inputHTime").focus();
                $("#show-validate-TTime").show('slow');
                return false;
            }
            if(v_HTime < 0 && v_MTime < 0 ){
                $("#show-true-MTime").empty();
                $("#show-true-MTime").append('*');
                $("#inputMTime").focus();
                $("#show-validate-TTime").show('slow');
                return false;
            }
        }else if(v_MTime < 0){
                $("#show-true-MTime").empty();
                $("#show-true-MTime").append('*');
                $("#inputMTime").focus();
                $("#show-validate-TTime").show('slow');
                return false;
        }
        /*----matchs----*/
        var v_matchs = document.forms["createSchedule"]["matchs"].value;
        if (v_matchs == "") {
            $("#inputMatches").focus();
            $("#show-validate2-matchs").show('slow');
            return false;
        } else if(v_matchs <= 0){
            $("#inputMatches").focus();
            return false;
        }
        /*----times----*/
        var v_times = document.forms["createSchedule"]["times"].value;
        if (v_times == "") {
            $("#inputTimes").focus();
            $("#show-validate2-times").show('slow');
            return false;
        }else if(v_times <= 0){
            $("#inputTimes").focus();
            return false;
        }
        /*----races----*/
        var v_races = document.forms["createSchedule"]["races"].value;
        if (v_races == "") {
            $("#inputRaces").focus();
            $("#show-validate2-races").show('slow');
            return false;
        }else if(v_races <= 0){
            $("#inputRaces").focus();
            return false;
        }
    }
}