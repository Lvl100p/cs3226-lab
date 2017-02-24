/**
 * (c) 2010-2016 Torstein Honsi
 *
 * License: www.highcharts.com/license
 *
 * Dark theme for Highcharts JS
 * @author Torstein Honsi
 */

'use strict';

Highcharts.theme = {
    "colors": ["#F92672", "#66D9EF", "#A6E22E", "#E97f02", '#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
    "chart": {
        "backgroundColor": "#272B30",
        "style": {
            "fontFamily": "Droid Sans Mono",
            "color": "#A2A39C"
        }
    },
    "title": {
        "style": {
            "color": "#A2A39C"
        },
        "align": "left"
    },
    "subtitle": {
        "style": {
            "color": "#A2A39C"
        },
        "align": "left"
    },
    "legend": {
        "align": "right",
        "verticalAlign": "bottom",
        "itemStyle": {
            "fontWeight": "normal",
            "color": "#A2A39C"
        }
    },
    "xAxis": {
        "gridLineDashStyle": "Dot",
        "gridLineWidth": 1,
        "gridLineColor": "#A2A39C",
        "lineColor": "#A2A39C",
        "minorGridLineColor": "#A2A39C",
        "tickColor": "#A2A39C",
        "tickWidth": 1
    },
    "yAxis": {
        "gridLineDashStyle": "Dot",
        "gridLineColor": "#A2A39C",
        "lineColor": "#A2A39C",
        "minorGridLineColor": "#A2A39C",
        "tickColor": "#A2A39C",
        "tickWidth": 1
    }
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);