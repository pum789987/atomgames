
    function returnPU(i) {
        var numData = document.getElementById("numData").value;
        var numUs = document.getElementById("numUs").value;
        var namesUs = [];
        var idsUs = [];
        var imgsUs = [];
        var names = [];
        for(var j = 0; j<numData ;j++){
            var name = [document.getElementsByName('PU[]')[j].value];
            if(name != "disabled")
               names = names.concat(name);
        }
        for(var c = 0; c<numUs ;c++){
            var nameUs = [document.getElementsByName('usNAME[]')[c].value];
            namesUs = namesUs.concat(nameUs);
            var idUs = [document.getElementsByName('usID[]')[c].value];
            idsUs = idsUs.concat(idUs);
            var imgUs = [document.getElementsByName('usIMG[]')[c].value];
            imgsUs = imgsUs.concat(imgUs);
        }
        for(var k = 0; k<numData ;k++){
            if(document.getElementsByName('PU[]')[k].value == "disabled" || document.getElementsByName('PU[]')[k].value == ""){
                $('#PU' + k + '').empty();
                $('#PU' + k + '').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>');
                for(var l = 0;l<numUs;l++){
                    var check = 0;
                    for(var m = 0;m<names.length;m++){
                        if(idsUs[l] == names[m])
                            check+=1;
                    }
                    if(check == 0)
                        $('#PU' + k + '').append('<option value="' + idsUs[l] + '">' + namesUs[l] + '</option>');
                }
            }
        }
        /*------------------ทำให้เลือกไม่ได้---------------------*/
        for(var j = 0;j<numUs;j++){
            if(document.getElementsByName('PU[]')[i].value == idsUs[j]){
                $('#PU' + i + '').empty();
                $('#PU' + i + '').append('<option value="' + idsUs[j] + '" selected="selected">' + namesUs[j] + '</option>');
                document.getElementsByName('PU_ID[]')[i].value = idsUs[j];
                $('#img' + i + '').empty();
                $('#img' + i + '').append('<img src="img/university/'+imgsUs[j]+'" alt="'+namesUs[j]+' logo" class="img-fluid">');
            }
        }
        document.getElementsByName('deleteName[]')[i].disabled = false;
    }

    function deleteName(i){
        $('#PU' + i + '').empty();
        $('#PU' + i + '').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>');
        var numData = document.getElementById("numData").value;
        var numUs = document.getElementById("numUs").value;
        var namesUs = [];
        var idsUs = [];
        var names = [];
        for(var j = 0; j<numData ;j++){
            var name = [document.getElementsByName('PU[]')[j].value];
            if(name != "disabled")
                names = names.concat(name);
        }
        for(var c = 0; c<numUs ;c++){
            var nameUs = [document.getElementsByName('usNAME[]')[c].value];
            namesUs = namesUs.concat(nameUs);
            var idUs = [document.getElementsByName('usID[]')[c].value];
            idsUs = idsUs.concat(idUs);
        }
        for(var k = 0; k<numData ;k++){
            if(document.getElementsByName('PU[]')[k].value == "disabled" || document.getElementsByName('PU[]')[k].value == ""){
                $('#PU' + k + '').empty();
                $('#PU' + k + '').append('<option disabled value="disabled" selected="selected"> -- กรุณาเลือกมหาวิทยาลัย -- </option>');
                for(var l = 0;l<numUs;l++){
                    var check = 0;
                    for(var m = 0;m<names.length;m++){
                        if(idsUs[l] == names[m])
                            check+=1;
                    }
                    if(check == 0)
                        $('#PU' + k + '').append('<option value="' + idsUs[l] + '">' + namesUs[l] + '</option>');
                }
            }
        }
        document.getElementsByName('PU_ID[]')[i].value = '';
        $('#img' + i + '').empty();
        $('#img' + i + '').append('<img src="img/university/questionMark.png" alt="question logo" class="img-fluid">');
        document.getElementsByName('deleteName[]')[i].disabled = true;
    }
    function returnSTT(i){
        var status = document.getElementsByName('Status[]')[i].value;
        document.getElementsByName('STT[]')[i].value = status;
    }
    function returnMD(i){
        var medal = document.getElementsByName('Medal[]')[i].value;
        document.getElementsByName('MD[]')[i].value = medal;
    }
