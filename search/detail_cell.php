<?php include ("../public/public.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $web_title ?>
    </title>
    <style>
        .box {
            overflow: auto;
        }

        .adaptive-image {
            max-width: 100%;
            height: auto;
            width: 200px;
        }

        .table {
            font-size: 14px;
        }

        #container,
        #crc_model_figure,
        #Receptor_network {
            min-height: 400px;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .col-lg-6 {
                padding: 0 15px;
            }

            .panel-body {
                padding: 15px;
            }
        }

        .panel>.panel-heading {
            padding: 15px 20px !important;
            height: auto;
            color: #ffffff;
            background-color: #40C9E3;
            border-radius: 4px 4px 0 0;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#myScrollspy">
    <?php include ("../public/header.php") ?>
    <a id="up" href="#up_up" style="
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #40C9E3;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    text-decoration: none;
    z-index: 999;">
        <i class="ri-arrow-up-line" style="font-size: 24px;"></i>
    </a>
    <div class="container">
        <div class="row" id="up_up">
            <div class="col-xs-12 col-lg-12">
                <div class="pull-right"><i class="ri-map-pin-line"></i> Search / <b class="navigator">Detail</b></div>
            </div>
        </div>
        <hr>
        <?php
        ini_set("error_reporting", "E_ALL & ~E_NOTICE");
        include '../public/conn_php.php';
        $id = urldecode($_GET['id']);
        $select = urldecode($_POST['select']);
        if (!empty ($select))
            $select_ = "$select and";
        else
            $select_ = "where";
        $query = mysqli_query($conn, "SELECT * from $main where id='$id'");
        while ($row = mysqli_fetch_assoc($query)) {
            $PMID = $row["PMID"];
            $Paper_Type = $row["Paper_Type"];
            $Ligand = $row["ProteinA"];
            $ProteinA_UniProt_ID = $row["ProteinA_UniProt_ID"];
            $Receptor = $row["ProteinB"];
            $ProteinB_UniProt_ID = $row["ProteinB_UniProt_ID"];
            $Species = $row["Species"];
            $Tissue_Name = $row["Tissue_Name"];
            $Cell_Name1 = $row["Cell_Name1"];
            $Cell_Name2 = $row["Cell_Name2"];
            $CL_ID1 = preg_replace('/CL:/', '', $row["CL_ID1"]);
            $CL_ID2 = preg_replace('/CL:/', '', $row["CL_ID2"]);
            $Phenotype = $row["Phenotype"];
            $Communication_Type = $row["Communication_Type"];
            $Pathway_Name = $row["Pathway_Name"];
            $pathway_ID = $row["pathway_ID"];
            $Experiment = $row["Experiment"];
            $Experiment_Type = $row["Experiment_Type"];
            $Year = $row["Year"];
            $Title = $row["Title"];
            $Descriotion_of_communication = $row["Descriotion_of_communication"];
            $Important_Gene_involved_in_the_Paper = $row["Important_Gene_involved_in_the_Paper"];
            $Signaling_of_communication = $row["Signaling_of_communication"];
        }
        $ccc_sql = "SELECT
    LEAST(Cell_Name1, Cell_Name2) AS cell1,
    GREATEST(Cell_Name1, Cell_Name2) AS cell2,
    count(*) AS num from (SELECT * from $main where Species='" . $Species . "' and Tissue_Name='" . $Tissue_Name . "' and (Cell_Name1='" . $Cell_Name1 . "' or Cell_Name2='" . $Cell_Name1 . "' or Cell_Name1='" . $Cell_Name2 . "' or Cell_Name2='" . $Cell_Name2 . "')) as tmp group BY cell1, cell2";
        $ccc_res = mysqli_query($conn, $ccc_sql);
        $node_tmp = [];
        $link = [];
        $node = [];
        while ($row = mysqli_fetch_assoc($ccc_res)) {
            $cell1 = $row["cell1"];

            $cell2 = $row["cell2"];
            $num = $row["num"];


            array_push($node_tmp, $cell1);
            array_push($node_tmp, $cell2);
            array_push($link, array("source" => $cell1, "target" => $cell2, "lineStyle" => array("width" => $num)));
        }
        foreach (array_unique($node_tmp) as $cell) {
            array_push($node, array("name" => $cell));
        }
        $node = json_encode($node);
        $link = json_encode($link);

        $tissue_sql = "select Tissue_Name,count(*) as num from $main where `ProteinA` = '$Ligand' and `ProteinB` = '$Receptor' and Tissue_Name!='/'  GROUP BY Tissue_Name ORDER BY num desc";
        $tissue_query = mysqli_query($conn, $tissue_sql);
        while ($row = mysqli_fetch_assoc($tissue_query)) {

            $Tissue = $row["Tissue_Name"];

            $num = $row["num"];
            $Tissue_tmp .= $Tissue . "','";
            $Tissue_num_tmp .= "{value:" . $num . ", name:'" . $Tissue . "'},";
        }

        $Tissue_res = substr($Tissue_tmp, 0, strlen($Tissue_tmp) - 3);
        $Tissue_num_res = substr($Tissue_num_tmp, 0, strlen($Tissue_num_tmp) - 1);
        ?>
        <?php
        $convert_sql = "select symbol,
        group_concat(DISTINCT ensembl_id SEPARATOR ', ') ensembl_id,  
        group_concat(DISTINCT gene_id SEPARATOR ', ') gene_id,  
        group_concat(DISTINCT accession SEPARATOR ', ') accession
        from $idConvert
            where symbol='$Ligand'
            or alias_symbol='$Ligand'
            group by symbol";
        $query = mysqli_query($conn, $convert_sql);
        $row = mysqli_fetch_assoc($query);
        $symbol = $row["symbol"];
        $ensembl_id = $row["ensembl_id"];
        $gene_id = $row["gene_id"];
        $accession = $row["accession"];
        $convert_sql = "select symbol,
        group_concat(DISTINCT ensembl_id SEPARATOR ', ') ensembl_id,  
        group_concat(DISTINCT gene_id SEPARATOR ', ') gene_id,  
        group_concat(DISTINCT accession SEPARATOR ', ') accession
        from $idConvert
            where symbol='$Receptor'
            or alias_symbol=' $Receptor'
            group by symbol";
        $query = mysqli_query($conn, $convert_sql);
        $row = mysqli_fetch_assoc($query);
        $symbol_r = $row["symbol"];
        $ensembl_id_r = $row["ensembl_id"];
        $gene_id_r = $row["gene_id"];
        $accession = $row["accession"];
        ?>
        <div class="panel panel-default">
            <div class="panel-heading" style="display: flex; align-items: center;">
                <h3 id="SNP_Overview" style="display: flex; align-items: center; gap: 8px; margin: 0;">
                    <i class="ri-folder-info-line"></i> <span>Overview</span>
                </h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="box box-color-1" height-to="right">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Cell type 1</td>
                                    <td>
                                        <?php echo $Cell_Name1 ?> (Cell Ontology:<a style="display: inline;"
                                            href="https://www.ebi.ac.uk/ols4/search?q=<?php echo $CL_ID1; ?>">
                                            <?php echo $CL_ID1; ?>
                                        </a>)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cell type 2</td>
                                    <td>
                                        <?php echo $Cell_Name2 ?> (Cell Ontology:<a style="display: inline;"
                                            href="https://www.ebi.ac.uk/ols4/search?q=<?php echo $CL_ID2; ?>">
                                            <?php echo $CL_ID2; ?>
                                        </a>)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Species</td>
                                    <td>
                                        <?php echo $Species ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tissue_Name</td>
                                    <td>
                                        <?php echo $Tissue_Name ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Disease Name</td>
                                    <td>
                                        <?php echo $Phenotype ?>
                                    </td>
                                </tr>
                                <?php if ($Ligand != "/" && $Receptor != "/") { ?>
                                    <tr>
                                        <td>Ligand-Receptor</td>
                                        <td>
                                            <?php echo $Ligand ?><img src="../public/img/browse/LR.svg" width="20px">
                                            <?php echo $Receptor ?>
                                        </td>
                                    </tr>
                                    <?php if ($ProteinA_UniProt_ID != "/" && $ProteinB_UniProt_ID != "/") { ?>
                                        <tr>
                                            <td>Ligand-Receptor (UniProt_ID)</td>
                                            <td>
                                                <?php echo $ProteinA_UniProt_ID ?><img src="../public/img/browse/LR.svg"
                                                    width="20px">
                                                <?php echo $ProteinB_UniProt_ID ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                <tr>
                                    <td>Communication Type</td>
                                    <td>
                                        <?php echo $Communication_Type ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PMID</td>
                                    <td>
                                        <a href="https://pubmed.ncbi.nlm.nih.gov/<?php echo $PMID ?>">
                                            <?php echo $PMID ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>
                                        <?php echo $Title ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>
                                        <?php echo $Year ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paper Type</td>
                                    <td>
                                        <?php echo $Paper_Type ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box box-color-2" id="right">
                            <div class="panel-heading">
                                <h3 style="display: flex; align-items: center; gap: 8px; margin: 0;">
                                    <i class="ri-bar-chart-horizontal-line"></i> <span>Cell-Cell Communication
                                        Network</span>
                                </h3>
                            </div>
                            <div id="ccc_network"
                                style="height: 600px;width: 100%;display: flex;justify-content: center;align-items:center;">
                                <i style="width: 26px;height: 38px;"
                                    class="ri-refresh-fill animate__animated animate__rotateOut"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box box-color-4">
                            <table id="gene_distribution_table">
                                <thead>
                                    <tr>
                                        <th>Cell Name1</th>
                                        <th>Cell Name2</th>
                                        <th>Tissue Name</th>
                                        <th>Disease Name</th>
                                        <th>PMID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "select * from $main
                               where Species='" . $Species . "' and Cell_Name1='" . $Cell_Name1 . "' and Cell_Name2='" . $Cell_Name2 . "' order by id";

                                    $result = mysqli_query($conn, $sql);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$rows["Cell_Name1"]}</td>";
                                        echo "<td>{$rows["Cell_Name2"]}</td>";
                                        echo "<td>{$rows["Tissue_Name"]}</td>";
                                        echo "<td>{$rows["Phenotype"]}</td>";
                                        echo "<td><a href='https://pubmed.ncbi.nlm.nih.gov/{$rows["PMID"]}'>{$rows["PMID"]}</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box box-color-3">
                            <div class="panel-heading" style="margin-bottom: 15px;">
                                <h3 style="display: flex; align-items: center; gap: 8px; margin: 0;">
                                    <i class="ri-bar-chart-horizontal-line"></i> <span>Organization distribution statistics</span>
                                </h3>
                            </div>
                            <div id="tissue_bar" style="height: 450px;"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <?php include '../public/footer.php' ?>
    <script type="text/javascript">
        $('#gene_distribution_table').DataTable({
            dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
            language: {
                paginate: {
                    first: '<i class="ri-skip-back-line">',
                    previous: '<i class="ri-arrow-left-line">',
                    next: '<i class="ri-arrow-right-line">',
                    last: '<i class="ri-skip-forward-line">'
                },
                search: 'Search:',
                lengthMenu: 'Show _MENU_ entries',
                info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                infoEmpty: 'No entries found',
                infoFiltered: '(filtered from _MAX_ total entries)',
                zeroRecords: 'No matching records found'
            },
            "initComplete": function (settings, json) {
                $('.dataTables_wrapper').css('width', '100%');
                $('.dataTables_filter').css({
                    'margin-left': '15px',
                    'min-width': '220px'
                });
                $('.dataTables_length').css({
                    'min-width': '120px'
                });
                $('.dataTables_filter input').addClass('form-control form-control-sm').css('width', '200px').attr('placeholder', 'Search...');
                $('.dataTables_length select').addClass('form-control form-control-sm').css('width', '80px');
                $('.dataTables_filter label').addClass('d-flex align-items-center');
                $('.dataTables_length label').addClass('d-flex align-items-center');
                $('<i class="ri-search-line ms-2"></i>').insertAfter('.dataTables_filter input').attr('title', 'Search');
                $('.dataTables_paginate').css('margin-top', '10px');
                $('.dt-buttons').css({
                    'display': 'flex',
                    'align-items': 'center',
                    'gap': '8px'
                });
            },
            "drawCallback": function (settings) {
                $('.paginate_button').addClass('btn btn-sm');
            },
            buttons: [{
                extend: 'csvHtml5',
                text: '<i class="ri-folder-download-line"></i>'
            }],
            lengthMenu: [5, 10, 50, 100],
            createdRow: function (row, data, dataIndex) {
                $(row).children('td').each(function (i, e) {
                    switch (i) {
                        case 3:
                            return
                        default:
                            break
                    }
                    if (e.innerText === '')
                        $(e).html('\\');
                    $(e).attr('title', e.innerText);
                });
            }
        });
        window.onload = function () {
            document.getElementById('ccc_network').className = 'network-container';

            echart01();
            echart02();


            function echart01() {
                var myChart = echarts.init(document.querySelector('#ccc_network'), null, {
                    renderer: 'svg'
                });

                // 对线条宽度进行log处理
                var links = JSON.parse('<?php echo $link ?>');
                links.forEach(function (link) {
                    link.lineStyle.width = Math.log(link.lineStyle.width + 1);
                });
                var nodes = <?php echo $node; ?>;

                var width = [
                    8, 22, 27, 22, 50, 63, 44, 4, 0, 9, 29, 15, 57, 50, 21
                ];

                option = {
                    animation: true,
                    title: {
                        text: 'Cell-Cell Communication Network',
                        top: 20,
                        left: 'center',
                        textStyle: {
                            fontSize: 16,
                            fontWeight: 'bold'
                        }
                    },
                    toolbox: {
                        show: true,

                        left: 'right',

                        feature: {
                            mark: {
                                show: true
                            },
                            dataView: {
                                show: true,
                                readOnly: false
                            },

                            restore: {
                                show: true
                            },
                            saveAsImage: {
                                show: true
                            }
                        }
                    },
                    tooltip: {},

                    animationDurationUpdate: 1500,
                    animationEasingUpdate: 'quinticInOut',
                    series: [{
                        type: 'graph',
                        layout: 'force',
                        roam: true,
                        circular: {
                            rotateLabel: false
                        },
                        itemStyle: {
                            normal: {
                                color: function (params) {
                                    var colorList = ['#c23531', '#2f4554', '#61a0a8', '#d48265', '#91c7ae', '#749f83', '#ca8622', '#bda29a', '#6e7074', '#4A235A', '#C39BD3', '#B88480', '#12A971', '#BD9DB0', '#778974', '#7A477A', '#AE487A', '#C87D9B', '#728E69', '#DE3A9C', '#9F4A67', '#9F4621', '#9F5768', '#9F7A7D', '#9F3D65', '#5D4314', '#9F6A51', '#869F89', '#59789F', '#0F9D82', '#290DF1', '#DDCCFE', '#DDB11C', '#051E76', '#8BBDE7', '#571DD2', '#12CDCB', '#19CF79', '#DFA9A6', '#BAB48B', '#E8A0D4', '#0FC1D2', '#179A92', '#075650', '#F21EF2', '#9F5947', '#6E579F', '#9F8C79', '#88B798', '#9F2195', '#190983', '#9F629C', '#681127'];
                                    return colorList[params.dataIndex]
                                }
                            }
                        },


                        data: nodes,
                        links: links,

                        focusNodeAdjacency: true,

                        label: {
                            normal: {
                                show: true
                            }
                        },
                        force: {
                            edgeLength: 100,
                            repulsion: 200,
                            gravity: 0.1
                        },
                        lineStyle: {
                            normal: {
                                color: 'source',
                                curveness: 0.3
                            }
                        }
                    }]
                };

                setTimeout(() => {
                    myChart.setOption(option);
                }, 100)
            }

            function echart02() {
                var dom = document.getElementById('tissue_bar');
                var myChart = echarts.init(dom, null, {
                    renderer: 'canvas',
                    useDirtyRect: false
                });
                var app = {};

                var option;

                var color = [
                    "#75bb36", "#fcf545", "#fcc83a", "#fb9f42", "#fa7b45", "#75bb36", "#fcf545", "#fcc83a", "#fb9f42", "#fa7b45", "#75bb36", "#fcf545", "#fcc83a", "#fb9f42", "#fa7b45", "#75bb36", "#75bb36", "#fcf545", "#fcc83a", "#fb9f42", "#fa7b45", "#75bb36", "#75bb36", "#fcf545", "#fcc83a", "#fb9f42", "#fa7b45", "#75bb36",
                ];
                option = {
                    title: {
                        text: 'Organization distribution statistics',
                        left: 'center',
                        textStyle: {
                            fontSize: 16,
                            fontWeight: 'bold'
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: ['<?php echo $Tissue_res ?>'],
                        axisLabel: {
                            rotate: 40
                        }

                    },
                    yAxis: {
                        type: 'value'
                    },
                    tooltip: {},
                    series: [{
                        data: [<?php echo $Tissue_num_res ?>],
                        type: 'bar',

                        itemStyle: {
                            normal: {
                                //每根柱子颜色设置
                                color: function (params) {
                                    return color[params.dataIndex];
                                }
                            }
                        },
                    },

                    ]
                };

                if (option && typeof option === 'object') {
                    myChart.setOption(option);
                }

                window.addEventListener('resize', myChart.resize);
            }
        }
    </script>
    <script>
        $('#Detail').DataTable({
            dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
            buttons: [{
                extend: 'csvHtml5',
                text: '<i class="ri-folder-download-line"></i>'
            }],
            createdRow: function (row, data, dataIndex) {
                $(row).children('td').each((i, e) => {
                    switch (i) {
                        case 3:
                            return
                        default:
                            break
                    }
                    if (e.innerHTML === '')
                        $(e).html('\\');
                    $(e).attr('title', e.innerText);
                });
            }
        });
    </script>
</body>

</html>