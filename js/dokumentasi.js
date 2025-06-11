

$(document).ready(function () {
        $.ajax({
            url: 'api/postag',
            type: 'get',
            success: function( data, textStatus, jQxhr ){
                $("#table-pos").bootstrapTable();
                $('#table-pos').bootstrapTable('load', data['result']);
                $('#table-pos').bootstrapTable('refresh');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });

        $.ajax({
            url: 'api/nertag',
            type: 'get',
            success: function( data, textStatus, jQxhr ){
                $("#table-ner").bootstrapTable();
                $('#table-ner').bootstrapTable('load', data['result']);
                $('#table-ner').bootstrapTable('refresh');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
});

function autoNumberRow(value, row, index) {
    return index+1;
}

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