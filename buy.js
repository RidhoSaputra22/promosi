console.log("buy.js called");

function buy() {
  console.log("buy");

  let id_produk = $("#id_produk").val()
  let anggaran = $("#anggaran").val()
  let deskripsi = $("#deskripsi").val()
  let hp_produk = $("#hp_produk").val()

  let aksi = "buy";

  if (id_produk == '' || anggaran == "" || deskripsi == "" || hp_produk == "") {
    {
      Swal.fire("", "Ada masalah dengan sistem", "error");
    }
  } else {
    // GET TOKEN

    let fd = new FormData();
    fd.append("id_produk", id_produk);
    fd.append("anggaran", anggaran);
    fd.append("deskripsi", deskripsi);
    fd.append("aksi", aksi);

    $.ajax({
      url: "admin/controller/buy.php",
      type: "POST",
      data: fd,
      contentType: false,
      processData: false,

      success: function (token) {
        console.log("TOKEN: " + token);

        if (token === "NOT-LOGIN") {
          swal
            .fire({
              title: "Anda Belum Login",
              text: "Anda harus login untuk melanjutkan reservasi",
              icon: "error",
              showConfirmButton: true,
            })
            .then(function (isConfirm) {
              if (isConfirm) {
                window.location.replace("login.php");
              }
            });
        }else if (token === "sukses") {
            swal
              .fire({
                title: "Berhasil",
                text: "Tekan OKE",
                icon: "success",
                showConfirmButton: true,
              })
              .then(function (isConfirm) {
                window.open(`https://wa.me/${hp_produk}?text=${deskripsi}`, '_blank');

              });
          }  else {
            
        }
      },
    });
    // console.log(fd);
  }
}
