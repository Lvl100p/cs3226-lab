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
    "colors": ["#F92672", "#66D9EF", "#A6E22E", "#A6E22E"],
    "chart": {
        "backgroundColor": "transparent",
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