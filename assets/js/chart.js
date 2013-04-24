var chart;
$(document).ready(function() {
	
      chart = new Highcharts.Chart({
         chart: {
            renderTo: 'chart',
            type: 'bar'
         },
         title: {
            text: 'Proyecciones'
         },
         xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
         },
         yAxis: {
            title: {
               text: 'Fruit eaten'
            }
         },
         series: [{
            name: 'Jane',
            data: [1, 0, 4]
         }, {
            name: 'John',
            data: [5, 7, 3]
         }]
      });
   });