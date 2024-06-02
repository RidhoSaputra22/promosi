console.log("range.js Called");

const url = "controller/range.php";
const page = "index.php?page=range";
let img = "../assets/img/produk/";


function tambah() {
    let id = $('#tid').val()
    let from = $('#tfrom').val()
    let to = $('#tto').val()
    
    // let files = $('#tfoto')[0].files[0]


    let aksi = "tambah"
    
    if (id == "" || from == "" || to == "" ) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');
        }
    } else {
        let fd = new FormData();
        fd.append('id', id)
        fd.append('from', from)
        fd.append('to', to)

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
                            window.location.replace(page+"&id="+id);
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
   

    let id = $(this).attr("data-id");
    let from = $(this).attr("data-range1");
    let to = $(this).attr("data-range2");

  
    $('#uid').val(id)
    $('#ufrom').val(from)
    $('#uto').val(to)

    // $('#ufoto').val(foto)
})


function edit() {
    let id_produk = $('#tid').val()

    let id = $('#uid').val()
    let from = $('#ufrom').val()
    let to = $('#uto').val()


    // console.log(foto);
    let aksi = "edit"

    if (from == '' || to == '' || id == '' ) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('id', id)
        fd.append('from', from)
        fd.append('to', to)



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
                            window.location.replace(page+"&id="+id_produk);
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
    let id_produk = $('#tid').val()

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
                            window.location.replace(page+"&id="+id_produk);
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