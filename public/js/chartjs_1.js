// 右の折れせグラフ
//ここじゃないchartjs.jsの方
window.onload = function(){
    const ctx = document.getElementById("myChart1").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "line",  // グラフの種類を折れ線グラフに変更
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: "rgba(255, 99, 132, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
  };