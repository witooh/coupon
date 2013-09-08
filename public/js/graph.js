google.load("visualization", "1", {packages: ["corechart"]});
google.setOnLoadCallback(loadData);

var options = {
    title: 'Coupon Usage',
    animation:{
        duration: 1000,
        easing: 'out'   
    }
};

var data = [];
var current = 0;
var chart = null;

$('.filter').on('click', function(){
    current = $(this).data('chart');
    drawChart();
});

function loadData(){
    $.when(
        $.ajax({url: "coupon/stat/weekly", dataType:"json"}),
        $.ajax({url: "coupon/stat/monthly", dataType:"json"})
    ).done(function(weeklyData, monthlyData){

        data[0] = new google.visualization.DataTable();
        data[1] = new google.visualization.DataTable();

        data[0].addColumn('string', 'Month');
        data[0].addColumn('number', 'Collected');
        data[0].addColumn('number', 'Redeemed');     
        for(i in monthlyData[0]){
            data[0].addRow([monthlyData[0][i].month, parseInt(monthlyData[0][i].total_collected), parseInt(monthlyData[0][i].total_redeemed)]);
        }

        data[1].addColumn('string', 'Week');
        data[1].addColumn('number', 'Collected');
        data[1].addColumn('number', 'Redeemed');     
        for(i in weeklyData[0]){
            data[1].addRow([weeklyData[0][i].week, parseInt(weeklyData[0][i].total_collected), parseInt(weeklyData[0][i].total_redeemed)]);
        }

        chart = new google.visualization.LineChart(document.getElementById('graph'));
        drawChart();
    });
}

function drawChart() {
    chart.draw(data[current], options);    
}