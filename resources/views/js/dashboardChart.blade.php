{{-- Weekly Reports --}}
<script>
    let cardColor, headingColor, labelColor, shadeColor, grayColor;
  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    labelColor = config.colors_dark.textMuted;
    headingColor = config.colors_dark.headingColor;
    shadeColor = 'dark';
    grayColor = '#5E6692'; // gray color is for stacked bar chart
  } else {
    cardColor = config.colors.cardColor;
    labelColor = config.colors.textMuted;
    headingColor = config.colors.headingColor;
    shadeColor = '';
    grayColor = '#817D8D';
  }
const weeklyEarningReportsEl = document.querySelector('#weeklyEarningReports'),
weeklyEarningReportsConfig = {
  chart: {
    height: 202,
    parentHeightOffset: 0,
    type: 'bar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      barHeight: '60%',
      columnWidth: '38%',
      startingShape: 'rounded',
      endingShape: 'rounded',
      borderRadius: 4,
      distributed: true
    }
  },
  grid: {
    show: false,
    padding: {
      top: -30,
      bottom: 0,
      left: -10,
      right: -10
    }
  },
  colors: [
    config.colors_label.primary,
    config.colors_label.primary,
    config.colors_label.primary,
    config.colors_label.primary,
    config.colors.primary,
    config.colors_label.primary,
    config.colors_label.primary
  ],
  dataLabels: {
    enabled: false
  },
  series: [
    {
      data: [<?=$data['week_performance'][1]?>, <?=$data['week_performance'][2]?>, <?=$data['week_performance'][3]?>, <?=$data['week_performance'][4]?>, <?=$data['week_performance'][5]?>, <?=$data['week_performance'][6]?>, <?=$data['week_performance'][7]?>]
    }
  ],
  legend: {
    show: false
  },
  xaxis: {
    categories: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    labels: {
      style: {
        colors: labelColor,
        fontSize: '13px',
        fontFamily: 'Public Sans'
      }
    }
  },
  yaxis: {
    labels: {
      show: false
    }
  },
  tooltip: {
    enabled: false
  },
  responsive: [
    {
      breakpoint: 1025,
      options: {
        chart: {
          height: 199
        }
      }
    }
  ]
};
if (typeof weeklyEarningReportsEl !== undefined && weeklyEarningReportsEl !== null) {
const weeklyEarningReports = new ApexCharts(weeklyEarningReportsEl, weeklyEarningReportsConfig);
weeklyEarningReports.render();
}
</script>

{{-- LOAN BOON TRACKER --}}
<script>

const supportTrackerEl = document.querySelector('#supportTracker'),
supportTrackerOptions = {
  series: [<?=$data['loan_book_percent']?>],
  labels: ['Loan Boon Value'],
  chart: {
    height: 360,
    type: 'radialBar'
  },
  plotOptions: {
    radialBar: {
      offsetY: 10,
      startAngle: -140,
      endAngle: 130,
      hollow: {
        size: '65%'
      },
      track: {
        background: cardColor,
        strokeWidth: '100%'
      },
      dataLabels: {
        name: {
          offsetY: -20,
          color: labelColor,
          fontSize: '13px',
          fontWeight: '400',
          fontFamily: 'Public Sans'
        },
        value: {
          offsetY: 10,
          color: headingColor,
          fontSize: '38px',
          fontWeight: '600',
          fontFamily: 'Public Sans'
        }
      }
    }
  },
  colors: [config.colors.primary],
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      shadeIntensity: 0.5,
      gradientToColors: [config.colors.primary],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 0.6,
      stops: [30, 70, 100]
    }
  },
  stroke: {
    dashArray: 10
  },
  grid: {
    padding: {
      top: -20,
      bottom: 5
    }
  },
  states: {
    hover: {
      filter: {
        type: 'none'
      }
    },
    active: {
      filter: {
        type: 'none'
      }
    }
  },
  responsive: [
    {
      breakpoint: 1025,
      options: {
        chart: {
          height: 330
        }
      }
    },
    {
      breakpoint: 769,
      options: {
        chart: {
          height: 280
        }
      }
    }
  ]
};
if (typeof supportTrackerEl !== undefined && supportTrackerEl !== null) {
const supportTracker = new ApexCharts(supportTrackerEl, supportTrackerOptions);
supportTracker.render();
}
</script>

<script>
  let  borderColor, legendColor;

if (isDarkStyle) {

  legendColor = config.colors_dark.bodyColor;
  borderColor = config.colors_dark.borderColor;
} else {

  legendColor = config.colors.bodyColor;
  borderColor = config.colors.borderColor;
}

// Color constant
const chartColors = {
  column: {
    series1: '#826af9',
    series2: '#d2b0ff',
    bg: '#f8d3ff'
  },
  donut: {
    series1: '#fee802',
    series2: '#3fd0bd',
    series3: '#826bf8',
    series4: '#2b9bf4'
  },
  area: {
    series1: '#29dac7',
    series2: '#60f2ca',
    series3: '#a5f8cd'
  }
};
  const donutChartEl = document.querySelector('#donutChart'),
    donutChartConfig = {
      chart: {
        height: 390,
        type: 'donut'
      },
      labels: [<?=$data['branches']?>],
      series: [<?=$data['branch_loans']?>],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series4,
        chartColors.donut.series3,
        chartColors.donut.series2
      ],
      stroke: {
        show: false,
        curve: 'straight'
      },
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val, 10) + '';
        }
      },
      legend: {
        show: true,
        position: 'bottom',
        markers: { offsetX: -3 },
        itemMargin: {
          vertical: 3,
          horizontal: 10
        },
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              name: {
                fontSize: '2rem',
                fontFamily: 'Open Sans'
              },
              value: {
                fontSize: '1.2rem',
                color: legendColor,
                fontFamily: 'Open Sans',
                formatter: function (val) {
                  return parseInt(val, 10) + '';
                }
              },
              total: {
                show: true,
                fontSize: '1.5rem',
                color: headingColor,
                label: 'Branch',
                formatter: function (w) {
                  return 'Performance';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 992,
          options: {
            chart: {
              height: 380
            },
            legend: {
              position: 'bottom',
              labels: {
                colors: legendColor,
                useSeriesColors: false
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              height: 320
            },
            plotOptions: {
              pie: {
                donut: {
                  labels: {
                    show: true,
                    name: {
                      fontSize: '1.5rem'
                    },
                    value: {
                      fontSize: '1rem'
                    },
                    total: {
                      fontSize: '1.5rem'
                    }
                  }
                }
              }
            },
            legend: {
              position: 'bottom',
              labels: {
                colors: legendColor,
                useSeriesColors: false
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            chart: {
              height: 280
            },
            legend: {
              show: false
            }
          }
        },
        {
          breakpoint: 360,
          options: {
            chart: {
              height: 250
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof donutChartEl !== undefined && donutChartEl !== null) {
    const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
    donutChart.render();
  }
</script>

