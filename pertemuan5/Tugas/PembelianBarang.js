function hitungTotalBarang() {
  // Mendapatkan nilai inputan jumlah barang
  var jumlahA = parseInt(document.getElementById("jumlahA").value);
  var jumlahB = parseInt(document.getElementById("jumlahB").value);
  var jumlahC = parseInt(document.getElementById("jumlahC").value);

  // Mendefinisikan harga barang
  var hargaA = 10000;
  var hargaB = 15000;
  var hargaC = 20000;

  // Menghitung total harga pembelian
  var totalHarga = hargaA * jumlahA + hargaB * jumlahB + hargaC * jumlahC;

  // Menampilkan hasil pada elemen dengan id "hasil"
  document.getElementById("hasil").innerHTML = "Total harga pembelian adalah: Rp " + totalHarga;
}
