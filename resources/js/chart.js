function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

var amount_orders = [];
var to_date = new Date().getDate();
var days_in_month = new Date(
    new Date().getYear(),
    new Date().getMonth(),
    0
).getDate();
var days_label = [];

for (var i = 0; i < days_in_month; i++) {
    if (i < to_date) {
        amount_orders[i] = getRandomInt(10);
    } else {
        amount_orders[i] = 0;
    }
}

for (var j = 1; j <= days_in_month; j++) {
    days_label.push(j);
}

var myChartElement = document.getElementById("myChart");

if (myChartElement !== null) {
    var ctx = myChartElement.getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: days_label,
            datasets: [
                {
                    label: "Penjualan tanggal ke #",
                    data: amount_orders,
                    borderWidth: 1,
                    backgroundColor: "#71c7ec"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            }
        }
    });

}
