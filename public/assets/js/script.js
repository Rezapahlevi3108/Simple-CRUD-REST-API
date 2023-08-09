// index
function tampil_data() {
    $.ajax({
        method: 'GET',
        url: 'api/mahasiswa',
        dataType: 'json',
        success: function(result) {
            var data='';
            var no = 1    

            $.each(result.data, function(i, item){
                data+='<tr>';
                data+='<td>'+ no++ +'</td>';
                data+='<td>'+item.nim+'</td>';
                data+='<td>'+item.nama+'</td>';
                data+='<td>'+item.fakultas+'</td>';
                data+='<td>'+item.program_studi+'</td>';
                data+='<td>'+item.alamat+'</td>';
                data+='<td><button class="btn btn-info btn-edit" data="'+item.id+'" data-toggle="modal" data-target="#Modaledit">edit</button> <button class="btn btn-danger btn-hapus" data="'+item.id+'">hapus</button></td>';
                data+='</tr>';
            });

            $('#tempat_data').html(data);
        }
    });
}

tampil_data();

function bersih() {
    $('#nim').val('');
    $('#nama').val('');
    $('#fakultas').val('');
    $('#program_studi').val('');
    $('#alamat').val('');
}

// store
$('#save').click(function(){
    let nim=$('#nim').val();
    let nama=$('#nama').val();
    let fakultas=$('#fakultas').val();
    let program_studi=$('#program_studi').val();
    let alamat=$('#alamat').val();
    
    $.ajax({
        method: 'POST',
        url: 'api/mahasiswa/store',
        data: '&nim='+nim+'&nama='+nama+'&fakultas='+fakultas+'&program_studi='+program_studi+'&alamat='+alamat,
        success: function(result) {
            tampil_data();
            bersih();
        }
    });
});

// show
$(document).on('click', '.btn-edit', function() {
    let id=$(this).attr('data');
    $.ajax({
        method: 'GET',
        url: 'api/mahasiswa/show/' + id,
        success: function(result) {
            $('#idEdit').val(result.data[0].id);
            $('#nimEdit').val(result.data[0].nim);
            $('#namaEdit').val(result.data[0].nama);
            $('#fakultasEdit').val(result.data[0].fakultas);
            $('#programStudiEdit').val(result.data[0].program_studi);
            $('#alamatEdit').val(result.data[0].alamat);
        }
    });
});

// update
$('#update').click(function(){
    let id=$('#idEdit').val();
    let nim=$('#nimEdit').val();
    let nama=$('#namaEdit').val();
    let fakultas=$('#fakultasEdit').val();
    let program_studi=$('#programStudiEdit').val();
    let alamat=$('#alamatEdit').val();
    let json = {"id" : id, "nim" : nim, "nama" : nama, "fakultas" : fakultas, "program_studi" : program_studi, "alamat" : alamat};
    
    $.ajax({
        method: 'POST',
        url: 'api/mahasiswa/update/' + id,
        contentType: 'application/json',
        data: JSON.stringify(json),
        success: function(result) {
            tampil_data();
        }
    });
});

//destroy
$(document).on('click', '.btn-hapus', function(){
    let id=$(this).attr('data');
    $.ajax({
        method: 'GET',
        url: 'api/mahasiswa/destroy/' + id,
        success: function(result) {
            tampil_data();
        }
    });
});