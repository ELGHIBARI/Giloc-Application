// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = 'orange';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: _ydata,
    datasets: [{
      label: "annonces",
      lineTension: 0.3,
      backgroundColor: "#FBB669",
      borderColor: "#F9890A",
      pointRadius: 5,
      pointBackgroundColor: "#F9CE9D",
      pointBorderColor: "#FBB669",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "#FBB669",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: _xdata,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 50,
          maxTicksLimit:5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
