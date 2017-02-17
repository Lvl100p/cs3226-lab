function radarChart(mc, tc, hw, bs, ks, ac){
    var ctx = $("#radarChart");
    var data = {
        labels: ["MC", "TC", "HW", "Bs", "KS", "Ac"],
        datasets: [
        {
            label: "Student Scores",
            backgroundColor: "rgba(240, 173, 78, 0.49)",
            borderColor: "rgb(240, 173, 78)",
            pointBackgroundColor: "rgb(240, 173, 78)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "rgba(240, 173, 78, 0.49)",
            pointHoverBorderColor: "rgb(240, 173, 78)",
            data: [mc, tc, hw, bs, ks, ac]
        }]
    };
    var myChart =new Chart(ctx, {
        type: 'radar',
        data: data, 
        options: {
            scale: {
                ticks: {
                    beginAtZero: true
                }
            },
            responsive: true
        }
    });
}