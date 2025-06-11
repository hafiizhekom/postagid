



$(document).ready(function () {

    $.ajax({

        url: base_url+'/api/profile',

        type: 'get',

        success: function( data, textStatus, jQxhr ){
            var dataProfil = data.result[0];
            var buttonUpdate = "<button class='btn btn-primary btn-sm' data-toggle='modal' href='#edit'>Perbarui Data Diri</button>";
            $("#nameProfile").html(dataProfil.nama);
            $("input[name='editName']").val(dataProfil.nama);
            $("#emailProfile").html(dataProfil.email);
            $("input[name='editEmail']").val(dataProfil.email);

            $("input[name='editIdUser']").val(dataProfil.id);

            if(dataProfil.jenis_kelamin){
                $("#genderProfile").html(dataProfil.jenis_kelamin);
                $("select[name='editJenisKelamin']").val(dataProfil.jenis_kelamin).change();
            }else{
                $("#genderProfile").html(buttonUpdate);
            }

            if(dataProfil.tanggal_lahir){
                $("#birthdayProfile").html(dataProfil.tanggal_lahir);
                $("input[name='editTanggalLahir']").val(dataProfil.tanggal_lahir);
            }else{
                $("#birthdayProfile").html(buttonUpdate);
            }

            if(dataProfil.no_telp){
                $("#phoneProfile").html(dataProfil.no_telp);
                $("input[name='editNoTelp']").val(dataProfil.no_telp);
            }else{
                $("#phoneProfile").html(buttonUpdate);
            }

            
            

        },

        error: function( jqXhr, textStatus, errorThrown ){

            console.log( errorThrown );

        }

    });

});
