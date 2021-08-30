<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://cdn.amcharts.com/lib/4/lang/ru_RU.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.language.locale = am4lang_ru_RU;
chart.paddingRight = 20;

var data = [];

chart.data = <?=$json;?>;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.grid.template.location = 0;
dateAxis.renderer.axisFills.template.disabled = true;
dateAxis.renderer.ticks.template.disabled = true;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.minWidth = 35;
valueAxis.renderer.axisFills.template.disabled = true;
valueAxis.renderer.ticks.template.disabled = true;

var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.dateX = "date";
series.dataFields.valueY = "value";
series.strokeWidth = 2;
series.tooltipText = "value: {valueY}, day change: {valueY.previousChange}";

// set stroke property field
series.propertyFields.stroke = "color";

chart.cursor = new am4charts.XYCursor();

var scrollbarX = new am4core.Scrollbar();
chart.scrollbarX = scrollbarX;

dateAxis.start = 0.7;
dateAxis.keepSelection = true;


}); // end am4core.ready()
</script>

<!-- HTML -->
<h1>Динамика <?=$NameOfCurrency?> с 01.01.2021</h1>
<div id="chartdiv"></div>
<table border="1">
	<tr>
		<th>Дата</th>
		<th>Курс, BYN</th>
	</tr>
	<? foreach ($ResultRate as $res) {?>
		<tr>
			<td><?=$res['date']?></td>
			<td><?=$res['value']?></td>
		</tr>
	<?}?>
</table>