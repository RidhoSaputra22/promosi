console.log("Produk.js Called");

const url = "controller/produk.php";
const page = "index.php?page=produk";
let img = "../assets/img/produk/";


function tambah() {
    let nama = $('#tnama').val()
    let deskripsi = $('#tdeskripsi').val()
    let aksi = "tambah"
    
    if (nama == "" || deskripsi == "" ) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');
        }
    } else {
        let fd = new FormData();
        fd.append('nama', nama)
        fd.append('deskripsi', deskripsi)
        
        fd.append('aksi', aksi)

        $.ajax({
            url: url,
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res);
                $('#tambah-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace(page);
                        }
                    });
                } else if (res === "gagal") {
                    Swal.fire('', 'merek telah terdaftar', 'error');
                } else {
                    alert("Gagal input !");
                }
            }
        })
    }
}

// Edit
$(document).on("click", "#edit-btn", function() {
    let nama = $(this).attr("data-nama");
    let deskripsi = $(this).attr("data-deskripsi");
   

    let id = $(this).attr("data-id");
    let foto = $(this).attr("data-foto");
  
    $('#unama').val(nama)
    $('#udeskripsi').val(deskripsi)
    $('#uid').val(id)

})


function edit() {
    let nama = $('#unama').val()
    let deskripsi = $('#udeskripsi').val()
    let id = $('#uid').val()
    // console.log(foto);
    let aksi = "edit"

    if (nama == "" || deskripsi == "" ) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('nama', nama)
        fd.append('id', id)
        fd.append('deskripsi', deskripsi)

        fd.append('aksi', aksi)

        $.ajax({
            url: url,
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res);
                $('#tambah-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace(page);
                        }
                    });
                } else if (res === "gagal") {
                    Swal.fire('', 'merek telah terdaftar', 'error');
                } else {
                    alert("Gagal input !");
                }
            }
        })
    }
}


$(document).on('click', '#delete-btn', function() {
    let id = $(this).attr("data-id");
    console.log(id);
    
    $('#did').val(id)
})

function hapus() {
    console.log($('#did').val())
    let id = $('#did').val();
    let aksi = 'hapus'

    let fd = new FormData();
        fd.append('id', id)
        fd.append('aksi', aksi)

    $.ajax({
        url:url,
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,

        success: function(res){
            console.log(res);
                $('#delete-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace(page);
                        }
                    });
                } else if (res === "gagal") {
                    Swal.fire('', 'merek telah terdaftar', 'error');
                } else {
                    alert("Gagal input !");
                }
        }
    })
}