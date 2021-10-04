function calcLuong() {
    var luong = document.getElementById("input-luong").value;
    var heSoLuong = document.getElementById("input-hesoluong").value;
    var totalLuong = Number(luong) * Number(heSoLuong);
    document.getElementById("total-luong").innerHTML = totalLuong;
}
