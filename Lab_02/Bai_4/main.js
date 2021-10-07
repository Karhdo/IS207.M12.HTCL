var showDate, movieName, showTime, price, room, roomValue;
var seatNumber = [];

$("#show-date").change(function () {
    showDate = $("#show-date").val();
    var temp = showDate.split("-");
    showDate = temp[2] + "/" + temp[1] + "/" + temp[0];
});

$("#movie-name").change(function () {
    movieName = $("#movie-name :selected").text();
});

$("#showtime").change(function () {
    showTime = $("#showtime :selected").text();
    price = $("#showtime").val();
});

$("#room").change(function () {
    room = $("#room :selected").text();
    roomValue = $("#room").val();
});

$("#seat-number").change(function () {
    $("#seat-number option:selected").each(function () {
        var temp = $(this).text();
        if (!seatNumber.includes(temp)) {
            seatNumber.push($(this).text());
        }
    });
});

$(".buy-tickets__table-btn").click(function () {
    $(".receipt").show();
    $(".receipt__show-date").html(showDate);
    $(".receipt__movie-name").html(movieName);
    $(".receipt__showtime").html(showTime);
    $(".receipt__room").html(room);
    var money = Number(price) * Number(roomValue),
        totalMoney = money * seatNumber.length;
    for (var seat of seatNumber) {
        htmlSeat = "<td>" + seat + "</td>";
        htmlMoney = "<td>" + money + " đ" + "</td>";
        $(".receipt__table tr:last").before("<tr>" + htmlSeat + htmlMoney + "</tr>");
    }
    $(".receipt__total").html(totalMoney + " đ");
});
