/**
* Created by Yusuf on 2/7/2016.
*/

$(document).ready(function() {

    var url = '/chartdata';

    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            init.initPieChart(data.output.state);
            init.initBarChart(data.output.city);
        },
        error: function (data) {

        }
    });

    var init = {
        initPieChart: function(state)
        {

            var labels = [];
            var series = [];
            var count = 0;

            $.each(state, function(key, value) {
                count += value;
            });

            $.each(state, function(key, value) {
                var percent = count != 0? ((value/count)*100).toFixed(0): 0;
                labels.push(key+ '- ' +percent+'%');
                series.push(value);
                $('#stateStats').append(key + ' ')
            });

            var optionsPreferences = {
                donut: true,
                donutWidth: 40,
                startAngle: 0,
                total: 100,
                showLabel: false,
                axisX: {
                    showGrid: false
                }
            };

            var data = {
                // labels: states
                labels: labels,
                // Our series array that contains series objects or in this case series data arrays
                series: series
            };

            // Create a new pie chart object where as first parameter we pass in a selector
            // that is resolving to our chart container element. The Second parameter
            // is the actual data object.
            Chartist.Pie('#chartPreferences', optionsPreferences);
            Chartist.Pie('#chartPreferences', data);

        },

        initBarChart: function(city)
        {
            var lab = [];
            var ser = [];
            $.each(city, function(key, value) {
                if(value != 0){
                    lab.push(key);
                    ser.push(value);
                }
            });

            var data = {
                labels: lab,
                series: [ser]
            };

            var options = {
                seriesBarDistance: 10,
                height: "245px"
            };

            var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];

            Chartist.Bar('#chartActivity', data, options, responsiveOptions);
        }
    }

});