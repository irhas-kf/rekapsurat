<!-- Content Header (Page header) -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- MENAMPILKAN DIAGRAM BATANG 3D -->
<!--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script> -->

<!--(ALAMAT PEMANGGILAN DIAGRAM CYLINDERS)
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
-->

<!--
(JS UNTUK MENAMPILKAN DIAGRAM BATANG VIEW DARI SAMPING)
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="/js/highcharts.js"></script>
<script src="/js/highstock.js"></script>
<script src="/js/highmaps.js"></script>
<script src="/js/highcharts.js"></script>
<script src="/js/modules/stock.js"></script>
<script src="/js/modules/map.js"></script>
-->

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url("dashboard") ?>">Dashboard</a></li>
          <!-- <li class="breadcrumb-item active">Calendar</li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>



    <section class="box-body">
      <div class="box box-info">
            <div class="box-header with-border">
                <!-- <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Grafik Rekap Surat per Bulan
                    </h3>
                </div> -->
            <div class="card-body">

                    <figure class="highcharts-figure">
                      <div id="container"></div>
                      <p class="highcharts-description">
                        Data Berdasarkan Admin Sebagai Penginput Surat
                      </p>
                    </figure>

                       <!--MENAMPILKAN DIAGRAM CYLINDER
                            <figure class="highcharts-figure">
                              <div id="container"></div>
                                <p class="highcharts-description">
                                    Data Berdasarkan Jumlah Surat yang Diinput Setiap Bulan
                                </p>
                            </figure>
                            -->
               <!-- <div id="container" style="width:100%; height:400px;"></div> (MENAMPILKAN GRAFIK DIAGRAM DARI SAMPING) -->
                <!--<div id="bar-chart" style="height: 400px;"></div> (MENAMPILKAN DIAGRAM BAWAAN MILIK IRHAS)  -->

              </div>
              </div>
            </div>
    </section>

    <?php
      /* Mengambil query report*/
      // foreach($report as $result){
      //     $value[] = (float) $result->hasil; //ambil nilai
      //     echo console($data);
      // }
      /* end mengambil query*/
    ?>

<script>
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Grafik Surat Masuk & Keluar'
  },
  subtitle: {
    text: 'Sumber: Database per Tahun'
  },
  xAxis: {
    categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Tahun <?= date('Y'); ?>'
    },
    allowDecimals: false,
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [
    <?php
    // load data grafik
    foreach($load_grafik as $key=>$value):
    ?>
    {
      name: '<?= $value['name'] ?>',
      data: [<?= implode(',', $value['data']) ?>]

    },
    <?php
    endforeach;
    ?>
    ]
});

</script>




<!-- (MENAMPILKAN CYLINDER)
<script>
Highcharts.chart('container', {
    chart: {
        type: 'cylinder',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 10,
            depth: 40,
            viewDistance: 50
        }
    },
    title: {
        text: 'Grafik Pencatatan Surat'
    },
    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
        }
    },
    series: [{
        data: [100, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
        name: 'cylinder',
        showInLegend: true
    }]
});
</script>
-->

<!-- MENAMPILKAN DIAGRAM BATANG 3D
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column',
        styledMode: true,
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50
        }
    },
    title: {
        text: 'Highcharts 3d column in styled mode'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    series: [{
        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6,
            148.5, 216.4, 194.1, 95.6, 54.4],
        colorByPoint: true
    }]
});
</script> -->

<!-- <script>
Highcharts.getJSON('https://demo-live-data.highcharts.com/aapl-c.json', function (data) { (MENAMPILKAN DIAGRAM GRAFIK DARI SAMPING)
    // Create the chart
    Highcharts.stockChart('container', {


        rangeSelector: {
            selected: 1
        },

        title: {
            text: 'AAPL Stock Price'
        },

        series: [{
            name: 'AAPL',
            data: data,
            tooltip: {
                valueDecimals: 2
            }
        }]
    });
});
</script> -->



 <!-- <script>
  $(function () {                                     (MENAMPILKAN DIAGRAM BAWAAN MILIK IRHAS)

    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9], [7,19], [8,91], [9,90], [10,29], [11,39], [12,79]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June'], [7,'July'], [8,'August'], [9,'September'], [10,'October'], [11,'November'], [12,'December']]
      }
    })
    /* END BAR CHART */

  })
</script>  -->
