<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<canvas id="bar-chart" width="800" height="450"></canvas>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
  function GetQueryString(name)
  {
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null)return  unescape(r[2]); return null;
  }
	new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["jan", "feb", "mar", "apr", "may","june","july","aug","sep","oct","nov","dec"],
      datasets: [
        {
          label: "orders (by month)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2"],
          data: [GetQueryString("jan"),GetQueryString("feb"),GetQueryString("mar"),GetQueryString("apr"),GetQueryString("may"),GetQueryString("june"),GetQueryString("july"),GetQueryString("aug"),GetQueryString("sep"),GetQueryString("oct"),GetQueryString("nov"),GetQueryString("dec")]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'orders of each month in 2018'
      }
    }
});
</script>
</html>>

