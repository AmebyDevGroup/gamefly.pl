$(document).ready(function () {
    if ($('#chartdiv').length) {
        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
        chart.fontFamily = "Quantum";
        var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
        series.randomness = 0.1;
        series.rotationThreshold = 0.5;

        series.data = data;

        series.dataFields.word = "tag";
        series.dataFields.value = "count";
        series.dataFields.slug = "slug";

        series.heatRules.push({
            "target": series.labels.template,
            "property": "fill",
            "min": am4core.color("#333"),
            "max": am4core.color("#ba1b12"),
            "dataField": "value"
        });

        series.labels.template.url = "https://gamefly.pl/tag/{slug}";
        series.labels.template.urlTarget = "_self";
        series.labels.template.tooltipText = "Liczba gier:\n[bold]{value}[/]";
    }
});
