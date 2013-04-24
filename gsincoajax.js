$(function(){
	//$('#logoff').tooltip('toggle');
	$(".OgetData").on("submit", function(){
		var desdeM = $("#desdeM").val()
		var desdeA = $("#desdeA").val()
		var hastaM = $("#hastaM").val()
		var hastaA = $("#hastaA").val()
		var desde = desdeA + "-" + desdeM + "-" + "01"
		var hasta = hastaA + "-" + hastaM + "-" + "01"
		var producto = $("#producto").val()
/*
		var urlforjson = "https://gsinco.no-ip.org/vps/getData.php?&desde="+desde+"&hasta="+hasta+"&producto="+producto
		var jData = ""
		var jqxhr = $.getJSON(urlforjson,function(data){jData = data});
		jqxhr.done(function(){
			$(".dateChooser").remove()
			makeTable(jData)
			makeGraph(jData)
		});
		jqxhr.fail(function(){
			alert("Error");
		});
*/
		$.ajax({
			url: "https://gsinco.no-ip.org/vps/getData.php",
			dataType: 'jsonp',
			type: 'GET',
			data: {
				desde: desde,
				hasta: hasta,
				producto: producto
			},
			success: function(jsonp){
				$(".dateChooser").remove()
				makeTable(jsonp)
				makeGraph(jsonp)
			},
			error: function(){
				alert("Error")
			}
		})
		return false
	})
})

function makeTable(jsonp){
	var htmlTable = "<div class='row Orow'><div class='span6'><table class='table table-striped table-condensed Otabla'> </table></div></div>"
	$(".contents").html(htmlTable)
	var monthTitle = "<th>Mes</th>"
	var yearTitle = "<th>A&ntilde;o</th>"
	switch(jsonp.name){
		case "autos":
			var q = "<th>Q Autos</th>"
			break;
		case "mys":
			var q = "<th>Q Minivan's y SUV's</th>"
			break;
		case "pl":
			var q = "<th>Q Pickups Lights</th>"
			break;
		case "all":
			var q = "<th>Q Todos</th>"
			break;
	}
	var th = "<tr>" + monthTitle + yearTitle + q + "</tr>"
	$(".Otabla").append(th)
	jQuery.each(jsonp,function(i,e){
		if(i != "name"){
			var month = "<td class='OMonth'>" + e.mes + "</td>"
			var year = "<td class='OYear " + e.anio +"'>" + e.anio + "</td>"
			var q = "<td class='OQs'>" + e.qs + "</td>"
			var htmlRow = "<tr>" + month + year + q + "</tr>"
			$(".Otabla").append(htmlRow)
		}
	})
	
	htmlTable = "<div class='span6'><table class='table table-striped table-condensed OtablaTotal'>"+
				"<caption>Suma total</caption></table></div>"
	$(".Orow").append(htmlTable)
	th = "<tr>" + yearTitle + "<th>Total</th>" + "</tr>"
	$(".OtablaTotal").append(th)
	
	var years = {}
	$(".OYear").each(function(i){
		var text = $(this).html()
		var value = parseInt(text)
		years[text] = value
	})
	var intYears = 0
	for(var k in years){
		intYears++
		var year = "<td class='OYearSum'>" + k + "</td>"
		var total = "<td class='OTotal" + k +"'></td>"
		var htmlRow = "<tr>" + year + total + "</tr>"
		$(".OtablaTotal").append(htmlRow)
	}
	for(var k in years){
		years[k] = 0
	}
	for(var k in years){
		$("."+k).each(function(){
			years[k] += parseInt($(this).next().html())
		})
	}
	for(var k in years){
		$(".OTotal"+k).html(years[k])
	}
}

function makeGraph(jsonp){
	var monthArray = new Array();
	var dataArray = new Array();
	jQuery.each(jsonp,function(i,e){
		if(i != "name"){
			monthArray.push(e.mes + " " + e.anio  )
			dataArray.push(parseInt(e.qs))
		}
	});
    var chart;
	chart = new Highcharts.Chart({
       chart: {
          renderTo: 'chart',
          type: 'column',
       },
       title: {
          text: 'Proyecciones'
       },
       xAxis: {
		   title:{
			   text: 'Cantidad'
		   },
           categories: monthArray
       },
       yAxis: {
          title: {
             text: 'Meses'
          }
       },
       series: [{
          name: 'Cantidad',
          data: dataArray
       }]
    });
}
