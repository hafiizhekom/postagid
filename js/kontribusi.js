



$(document).ready(function () {

    $.ajax({

        url: base_url+'/api/contribution',

        type: 'get',

        success: function( data, textStatus, jQxhr ){

            $("#table-contribution").bootstrapTable();

            $('#table-contribution').bootstrapTable('load', data['result']);

            $('#table-contribution').bootstrapTable('refresh');

        },

        error: function( jqXhr, textStatus, errorThrown ){

            console.log( errorThrown );

        }

    });

});



function autoNumberRow(value, row, index) {

return index+1;

}


