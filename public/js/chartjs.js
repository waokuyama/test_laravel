console.log(weekDay);
console.log(weekTotal);



//   2つの折れ線グラフの取得やってみる
window.onload = function() {
  const ctx1 = document.getElementById("myChart1").getContext("2d");
  // const ctx2 = document.getElementById("myChart2").getContext("2d");

  const data1 = {
    labels: weekDay,
    // labels: [1],
    datasets: [
      {
        label: "今週のメール受信状況",
        data: weekTotal,
        // data: [5],
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1
      }
    ]
  };

  const data2 = {
    labels: ["日", "月", "火", "水", "木", "土"],
    datasets: [
      {
        label: "メール受信数",
        data: [5, 10, 8, 12, 6, 9,],
        backgroundColor: "rgba(54, 162, 235, 0.2)",
        borderColor: "rgba(54, 162, 235, 1)",
        borderWidth: 1
      }
    ]
  };

  const options = {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  };

  new Chart(ctx1, {
    type: "line",
    data: data1,
    options: options
  });

  new Chart(ctx2, {
    type: "line",
    data: data2,
    options: options
  });
};