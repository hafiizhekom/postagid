function tagTableFormatter(value, row, index) {
    return [
      "<span class='badge' style='background-color:",
      row['warna'],
      ";color:",
      row['font']+"'>",
      value,
      "</span>" 
    ].join('')
  }

var dataTag = [];
var jsonObj = [];

$(document).ready(function () {
        $("input[type=checkbox]:checked").each(function () {
                var idElement = $(this).attr("id");
                $("#" + idElement).addClass("checked");
                $("label[data-id='" + idElement + "']").addClass("checked");
        });

        $.ajax({
            url: 'api/nertag',
            type: 'get',
            success: function( data, textStatus, jQxhr ){
                $.each( data['result'], function( key, value ) {
                    dataJsonTag = {
                        kode: value.kode,
                        kelas: value.kelas,
                        font: value.font,
                        warna: value.warna,
                        deskripsi: value.deskripsi,
                        contoh: value.contoh
                    };

                    dataTag[value.kode] = (dataJsonTag);
                  });
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
});

function taggingWord(tag, idElement) {

    $.ajax({
        url: 'api/nertag',
        type: 'get',
        data: {'kode':tag},
        success: function( data, textStatus, jQxhr ){
            data=data['result'];
            $("label[data-id='" + idElement + "']").css("background-color", data['warna']);
            $("label[data-id='" + idElement + "']").css("border-color", data['warna']);
            $("label[data-id='" + idElement + "']").css("color", data['font']);
            $("label[data-id='" + idElement + "']").append("<b>: "+tag+"</b>");
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });

}

$("button.btn-tagger")
    .click(function () {
        var buttonTagger = $(this).attr("id");
        $("input[type=checkbox]").each(function () {
            var idElement = $(this).attr("id");
            if (!$(this).hasClass("tagged") && $(this).is(":checked")) {
                $(this).removeClass("checked");
                $(this).addClass("tagged");
                $(this).attr("val-tag", $("#" + buttonTagger).attr("id"));
                taggingWord($("#" + buttonTagger).attr("id"), idElement);
            } else if (!$(this).hasClass("tagged") && !$(this).is(":checked")) {
                $(this).prop("checked", false);
                $(this).removeClass("tagged");
                $(this).removeClass("checked");
                $(this).attr("val-tag", "");
                $("label[data-id='" + idElement + "']").css("color", "#adadad");
                $("label[data-id='" + idElement + "']").css("background-color", "#fff");
                $("label[data-id='" + idElement + "']").css("border-color", "rgba(139, 139, 139, .3)");
                $("label[data-id='" + idElement + "']").html($(this).val());
                $("label[data-id='" + idElement + "']").removeClass("checked");
            }
        });
    });

$("label.label-tagger").click(function (e) {
    e.preventDefault();
    var idElement = $(this).data("id");

    if ($("#" + idElement).hasClass("tagged")) {
        $("#" + idElement).prop("checked", false);
        $("#" + idElement).removeClass("tagged");
        $("#" + idElement).removeClass("checked");
        $("#" + idElement).attr("val-tag", "");
        $("label[data-id='" + idElement + "']").css("background-color", "#fff");
        $("label[data-id='" + idElement + "']").css("border-color", "rgba(139, 139, 139, .3)");
        $("label[data-id='" + idElement + "']").css("color", "#adadad");
        $("label[data-id='" + idElement + "']").html($("#" + idElement).val());
        $("label[data-id='" + idElement + "']").removeClass("checked");
    } else if ($("#" + idElement).hasClass("checked")) {
        $("#" + idElement).prop("checked", false);
        $("#" + idElement).removeClass("checked");
        $("label[data-id='" + idElement + "']").css("background-color", "#fff");
        $("label[data-id='" + idElement + "']").css("border-color", "rgba(139, 139, 139, .3)");
        $("label[data-id='" + idElement + "']").css("color", "#adadad");
        $("label[data-id='" + idElement + "']").html($("#" + idElement).val());
        $("label[data-id='" + idElement + "']").removeClass("checked");
    } else {
        $("#" + idElement).prop("checked", true);
        $("#" + idElement).addClass("checked");
        $("label[data-id='" + idElement + "']").css("background-color", "#12bbd4");
        $("label[data-id='" + idElement + "']").css("border-color", "#1bdbf8");
        $("label[data-id='" + idElement + "']").css("color", "#fff");
        $("label[data-id='" + idElement + "']").html($("#" + idElement).val());
        $("label[data-id='" + idElement + "']").addClass("checked");
    }
});

$("button.form-control-submit-button").click(function () {
    
    var valtag = {};
    jsonObj = [];
    var activate = true;

    $("input[type=checkbox]").each(function (index, value) {
        if ($(this).hasClass("tagged")){
            var wordtag = {};
            var tag = $(this).attr("val-tag");
            wordtag["kata"] = $(this).val();
            wordtag["tag"] = tag;
            wordtag["warna"] = dataTag[tag].warna;
            wordtag["font"] = dataTag[tag].font;
            jsonObj.push(wordtag);

            var jsonString = JSON.stringify(jsonObj);
            $(".section-verifying").show();
            $(".section-tagging").hide();   
        } else {
            alert("Cek semua kata yang belum di tag");
            activate = false;
            return false;
        }
    });

    if(activate == true){
        var jsonString = JSON.stringify(jsonObj);
        $(".section-verifying").show();
        $(".section-tagging").hide();
                
        $(function() {
            $("#table").bootstrapTable();
            $('#table').bootstrapTable('load', jsonObj);
            $('#table').bootstrapTable('refresh');
        });
    }
    
});

$("button#back").on( "click", function() {
    $(".section-verifying").hide();
    $(".section-tagging").show();
});

$("button#next").on( "click", function() {
    $.ajax({
        url: 'api/nersave',
        type: 'post',
        data: {
            "pos":$("#posText").val(),
            [csrf_token_name]: csrf_token_hash,
            data:jsonObj
        },
        success: function( data, textStatus, jQxhr ){             
            $('#login').modal('show');
            // window.location.replace("http://postagid.com/");
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });

});

function autoNumberRow(value, row, index) {
    return index+1;
}