am4core.useTheme(am4themes_animated);


var chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
chart.fontFamily = "Courier New";
var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
series.randomness = 0.1;
series.rotationThreshold = 0.5;

series.data = data;

series.dataFields.word = "tag";
series.dataFields.value = "count";

series.heatRules.push({
    "target": series.labels.template,
    "property": "fill",
    "min": am4core.color("#333"),
    "max": am4core.color("#ba1b12"),
    "dataField": "value"
});

series.labels.template.url = "http://gamefly.localhost/{word}";
series.labels.template.urlTarget = "_blank";

series.labels.template.tooltipText = "{word}:\n[bold]{value}[/]";
