<?php include (__DIR__ . "/public/public.php");
ini_set("error_reporting", "E_ALL & ~E_NOTICE"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCCdb</title>
</head>

<body>
    <?php include (__DIR__ . "/public/header.php") ?>
    <link rel="stylesheet" href="public/css/unified_styles.css">
    <style>
        :root {
            --primary-color: #6e8efb;
            --secondary-color: #a777e3;
            --accent-color: #ff7f00;
            --text-color: #333;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
        }

        * {
            box-sizing: border-box;
            transition: all var(--transition-speed) ease;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .box {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: var(--card-shadow);
            transition: all var(--transition-speed) ease;
        }

        .box:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .box-color-3 {
            border-top: 4px solid var(--primary-color);
        }

        h1,
        h2,
        h3,
        h4 {
            color: var(--primary-color);
        }



        hr {
            border-top: 1px solid rgba(110, 142, 251, 0.2);
        }

        /* 图表容器样式 */
        .chart-container {
            width: 100%;
            height: 400px;
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: var(--card-shadow);
        }
    </style>
    <?php
    include "public/conn_php.php";
    $info_sql = "select Cell_Name1 as col1,
	   Cell_Name2 as col2,
	   count(*) as total_amount
from main
group by Cell_Name1, Cell_Name2
order by total_amount desc
limit 10;";

    $tissue_query = mysqli_query($conn, $info_sql);
    while ($row = mysqli_fetch_assoc($tissue_query)) {

        $col1 = $row["col1"];
        $col2 = $row["col2"];
        $total_amount = $row["total_amount"];
        $cell_tmp .= $col1 . ":" . $col2 . "','";
        $cell_num_tmp .= "{value:" . $total_amount . ", name:'" . $col1 . ":" . $col2 . "'},";
    }

    $cell_res = substr($cell_tmp, 0, strlen($cell_tmp) - 3);
    $cell_num_res = substr($cell_num_tmp, 0, strlen($cell_num_tmp) - 1);

    $lr_sql = "-- ct_table
select Communication_Type, count(*) as ct_num
from main
where Communication_Type != '/'
group by Communication_Type
order by ct_num desc
limit 10;";

    $lr_query = mysqli_query($conn, $lr_sql);
    while ($row = mysqli_fetch_assoc($lr_query)) {

        $Communication_Type = $row["Communication_Type"];
        $Receptor = $row["ProteinB"];
        $ct_num = $row["ct_num"];
        $lr_tmp .= $Communication_Type . "','";
        $ct_num_tmp .= "{value:" . $ct_num . ", name:'" . $Communication_Type . "'},";
    }

    $ct_res = substr($lr_tmp, 0, strlen($lr_tmp) - 3);
    $ct_num_res = substr($ct_num_tmp, 0, strlen($ct_num_tmp) - 1);

    $l_sql = "select ProteinA as Ligand,count(*) as l_num
from main
where ProteinA != '/'
group by ProteinA
order by l_num desc
limit 10;";

    $l_query = mysqli_query($conn, $l_sql);
    while ($row = mysqli_fetch_assoc($l_query)) {

        $Ligand = $row["Ligand"];
        $l_num = $row["l_num"];
        $l_tmp .= $Ligand . "','";
        $l_num_tmp .= "{value:" . $l_num . ", name:'" . $Ligand . "'},";
    }

    $l_res = substr($l_tmp, 0, strlen($l_tmp) - 3);
    $l_num_res = substr($l_num_tmp, 0, strlen($l_num_tmp) - 1);

    $r_sql = "select ProteinB as Receptor,count(*) as r_num
from main
where ProteinB != '/'
group by ProteinB
order by r_num desc
limit 10;";

    $r_query = mysqli_query($conn, $r_sql);
    while ($row = mysqli_fetch_assoc($r_query)) {

        $Receptor = $row["Receptor"];
        $r_num = $row["r_num"];
        $r_tmp .= $Receptor . "','";
        $r_num_tmp .= "{value:" . $r_num . ", name:'" . $Receptor . "'},";
    }

    $r_res = substr($r_tmp, 0, strlen($r_tmp) - 3);
    $r_num_res = substr($r_num_tmp, 0, strlen($r_num_tmp) - 1);

    $Phenotype_sql = "select Phenotype, count(*) as Phenotype_num
from main
where Phenotype != '/'
group by Phenotype
order by Phenotype_num desc
limit 10;";

    $Phenotype_query = mysqli_query($conn, $Phenotype_sql);
    while ($row = mysqli_fetch_assoc($Phenotype_query)) {

        $Phenotype = $row["Phenotype"];
        $Phenotype_num = $row["Phenotype_num"];
        $Phenotype_tmp .= $Phenotype . "','";
        $Phenotype_num_tmp .= "{value:" . $Phenotype_num . ", name:'" . $Phenotype . "'},";
    }

    $Phenotype_res = substr($Phenotype_tmp, 0, strlen($Phenotype_tmp) - 3);
    $Phenotype_num_res = substr($Phenotype_num_tmp, 0, strlen($Phenotype_num_tmp) - 1);


    $Tissue_sql = "select Tissue_Name, count(*) as Tissue_num
from main
where Tissue_Name != '/'
group by Tissue_Name
order by Tissue_num desc
limit 10;";

    $Tissue_query = mysqli_query($conn, $Tissue_sql);
    while ($row = mysqli_fetch_assoc($Tissue_query)) {

        $Tissue_Name = $row["Tissue_Name"];
        $Tissue_num = $row["Tissue_num"];
        $Tissue_tmp .= $Tissue_Name . "','";
        $Tissue_num_tmp .= "{value:" . $Tissue_num . ", name:'" . $Tissue_Name . "'},";
    }

    $Tissue_res = substr($Tissue_tmp, 0, strlen($Tissue_tmp) - 3);
    $Tissue_num_res = substr($Tissue_num_tmp, 0, strlen($Tissue_num_tmp) - 1);

    ?>
    <div class="container" id="body" style="padding-top: 20px;">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Statistics</b></div>
            </div>
        </div>
        <hr style="margin: 15px 0 30px 0;">
        <div class="row">


            <div class="col-lg-12">
                <div class="box box-color-3">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="chart-container" id="tissue_bar">
                                <i class="ri-refresh-fill animate__animated animate__rotateOut"
                                    style="width: 26px;height: 38px;"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chart-container" id="ct_bar">
                                <i class="ri-refresh-fill animate__animated animate__rotateOut"
                                    style="width: 26px;height: 38px;"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">


            <div class="col-lg-12">
                <div class="box box-color-3">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="chart-container" style="width: 100%;height: 400px;display: flex;justify-content: center;align-items:center;"
                                id="phenotype_bar"><i style="width: 26px;height: 38px;"
                                    class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chart-container" style="width: 100%;height: 400px;display: flex;justify-content: center;align-items:center;"
                                id="tissue_pie"><i style="width: 26px;height: 38px;"
                                    class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">


            <div class="col-lg-12">
                <div class="box box-color-3">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="chart-container" style="width: 100%;height: 400px;display: flex;justify-content: center;align-items:center;"
                                id="l_bar"><i style="width: 26px;height: 38px;"
                                    class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chart-container" style="width: 100%;height: 400px;display: flex;justify-content: center;align-items:center;"
                                id="r_bar"><i style="width: 26px;height: 38px;"
                                    class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr>
    </div>
    <?php include "public/footer.php"; ?>
</body>
<script>
    window.onload = function () {

        var color = [
            "#6e8efb", "#a777e3", "#ff7f00", "#75bb36", "#fcf545", "#fcc83a", "#fb9f42", "#fa7b45", "#a2c5e9", "#6e8efb"
        ];

        echart01();
        echart02();
        echart03();
        echart04();
        echart05();
        echart06();

        function echart01() {
            var dom = document.getElementById('tissue_bar');
            var myChart = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });
            var app = {};

            var option;


            option = {
                title: {
                    text: 'TOP 10 Cell1 to Cell2',

                    left: 'center',
                    top: 'top',
                    padding: 10
                },
                tooltip: {},
                yAxis: {
                    type: 'category',
                    data: ['<?php echo $cell_res ?>'],

                },
                xAxis: {
                    position: 'top',
                    type: 'value'
                },
                grid: {
                    left: 200,
                    right: "20",
                    bottom: "20",
                    top: 50,
                    containLabel: false
                },
                series: [{
                    data: [<?php echo $cell_num_res ?>],
                    type: 'bar',
                    showBackground: true,
                    backgroundStyle: {
                        color: 'rgba(180, 180, 180, 0.2)'
                    },
                    itemStyle: {
                        color: function (params) {
                            return color[params.dataIndex % color.length];
                        }
                    },
                    label: {
                        show: true,
                        position: 'right',
                        formatter: '{b}: {c}'
                    },
                },

                ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }

            window.addEventListener('resize', myChart.resize);
        }

        function echart02() {
            var dom = document.getElementById('ct_bar');
            var myChart = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });
            var app = {};

            var option;

            option = {
                title: {
                    text: 'Communication Type',

                    left: 'center',
                    top: 'top',
                    padding: 10
                },
                tooltip: {},
                grid: {
                    left: 80,
                    right: "20",
                    bottom: "20",
                    top: 50,
                    containLabel: false
                },
                legend: {
                    type: 'scroll',  // Make legend scrollable
                    orient: 'horizontal',  // Changed to horizontal
                    bottom: 10,  // Position at bottom
                },
                series: [{
                    type: 'pie',
                    radius: '50%',
                    data: [<?php echo $ct_num_res ?>],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                },
                ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }

            window.addEventListener('resize', myChart.resize);
        }

        function echart03() {
            var dom = document.getElementById('l_bar');
            var myChart = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });
            var app = {};

            var option;


            option = {
                title: {
                    text: 'TOP 10 ProteinA',

                    left: 'center',
                    top: 'top',
                    padding: 10
                },
                tooltip: {},
                grid: {
                    left: 80,
                    right: "20",
                    bottom: "20",
                    top: 50,
                    containLabel: false
                },
                legend: {
                    type: 'scroll',  // Make legend scrollable
                    orient: 'horizontal',  // Changed to horizontal
                    bottom: 10,  // Position at bottom
                },
                series: [{
                    type: 'pie',
                    radius: '50%',
                    data: [<?php echo $l_num_res ?>],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                },
                ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }

            window.addEventListener('resize', myChart.resize);
        }

        function echart04() {
            var dom = document.getElementById('r_bar');
            var myChart = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });
            var app = {};

            var option;


            option = {
                title: {
                    text: 'TOP 10 ProteinB',

                    left: 'center',
                    top: 'top',
                    padding: 10
                },
                tooltip: {},
                grid: {
                    left: 80,
                    right: "20",
                    bottom: "20",
                    top: 50,
                    containLabel: false
                },
                legend: {
                    type: 'scroll',  // Make legend scrollable
                    orient: 'horizontal',  // Changed to horizontal
                    bottom: 10,  // Position at bottom
                },
                series: [{
                    type: 'pie',
                    radius: '50%',
                    data: [<?php echo $r_num_res ?>],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                },
                ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }

            window.addEventListener('resize', myChart.resize);
        }

        function echart05() {
            var dom = document.getElementById('phenotype_bar');
            var myChart = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });
            var app = {};

            var option;


            option = {
                title: {
                    text: 'TOP 10 phenotypes',

                    left: 'center',
                    top: 'top',
                    padding: 10
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataZoom: {
                            yAxisIndex: 'none'
                        },
                        dataView: {
                            readOnly: false
                        },
                        restore: {},
                        saveAsImage: {}
                    }
                },
                tooltip: {},
                legend: {
                    type: 'scroll',  // Make legend scrollable
                    orient: 'horizontal',  // Changed to horizontal
                    bottom: 10,  // Position at bottom
                },
                series: [{
                    type: 'pie',
                    radius: '50%',
                    data: [<?php echo $Phenotype_num_res ?>],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                },

                ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }

            window.addEventListener('resize', myChart.resize);
        }

        function echart06() {
            var dom = document.getElementById('tissue_pie');
            var myChart1 = echarts.init(dom, null, {
                renderer: 'canvas',
                useDirtyRect: false
            });
            var app = {};

            var option;

            option = {
                title: {
                    text: 'Top 10 tissues',
                    left: 'center'
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataZoom: {
                            yAxisIndex: 'none'
                        },
                        dataView: {
                            readOnly: false
                        },
                        restore: {},
                        saveAsImage: {}
                    }
                },
                tooltip: {},
                legend: {
                    type: 'scroll',  // Make legend scrollable
                    orient: 'horizontal',  // Changed to horizontal
                    bottom: 10,  // Position at bottom
                },
                series: [{
                    type: 'pie',
                    radius: '50%',
                    data: [<?php echo $Tissue_num_res; ?>],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };

            if (option && typeof option === 'object') {
                myChart1.setOption(option);
            }

            window.addEventListener('resize', myChart1.resize);
        }
    }
</script>

</html>