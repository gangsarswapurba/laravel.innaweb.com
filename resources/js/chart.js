const Axios = require("axios");

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

var amount_orders = new Array();
var to_date = new Date().getDate();
var days_in_month = new Date(
    new Date().getYear(),
    new Date().getMonth(),
    0
).getDate();
var days_label = new Array();
for (var j = 0; j <= days_in_month; j++) {
    days_label.push(j);
}

var myChartElement = document.getElementById("myChart");
var myChart;

if (myChartElement !== null) {

    var sales = []; 

    var ctx = myChartElement.getContext("2d");
    myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: days_label,
            datasets: [
                {
                    label: "total item terjual",
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

    Axios.get('/api/sales/lastMonth')
        .then(function (response) {
            var sales = response.data;
            for (var i = 1; i <= days_in_month; i++) {
                if (sales[i]) {
                    amount_orders[i] = sales[i];
                } else {
                    amount_orders[i] = 0;
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
            myChart.update();
        })

}
