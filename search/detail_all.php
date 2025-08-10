<?php include (__DIR__ . "/../public/public.php") ?>
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
    </style>
</head>

<body data-spy="scroll" data-target="#myScrollspy">
    <?php include (__DIR__ . "/../public/header.php") ?>
    <style>
        /* 统一主站样式 */
        .adaptive-image {
            max-width: 100%;
            height: auto;
            width: 200px;
        }

        /* 优化表格样式 */
        .table {
            font-size: 14px;
        }

        /* 增强图表容器 */
        #container,
        #crc_model_figure,
        #Receptor_network {
            min-height: 400px;
            margin: 20px 0;
        }

        /* 响应式调整 */
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

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        @-webkit-keyframes changeBgColor {
            0% {
                background: lightgreen;
            }

            100% {
                background: lightblue;
            }
        }

        @keyframes changeBgColor {
            0% {
                background: lightgreen;
            }

            100% {
                background: lightblue;
            }
        }

        @-webkit-keyframes changePosition {
            0% {
                background: lightgreen;
            }

            100% {
                margin-left: 142px;
                background: lightblue;
            }
        }

        @keyframes changePosition {
            0% {
                background: lightgreen;
            }

            100% {
                margin-left: 142px;
                background: lightblue;
            }
        }

        .a-text1 {
            font-size: 20px;
            color: #b30000;
            cursor: pointer;
        }

        .a-text1:hover {
            color: red;
        }

        .a-text2 {
            font-size: 20px;
            color: #b30000;
            cursor: pointer;
        }

        .a-text2:hover {
            color: red;
        }

        .a-text {
            font-size: 20px;
            color: #b30000;
            cursor: pointer;
        }

        .a-text:hover {
            color: red;
        }

        .p1 {
            font-size: 16px;
            color: #0a001f;
            width: 220px;
        }

        .p4 {
            font-size: 16px;
            color: #0a001f;
            width: 220px;
            display: none;
        }

        .p2 {
            font-size: 16px;
            color: #0a001f;
            width: 220px;
        }

        .p5 {
            font-size: 16px;
            color: #0a001f;
            width: 220px;
            display: none;
        }

        .p3 {
            font-size: 16px;
            color: #0a001f;
            width: 220px;
        }

        .p6 {
            font-size: 16px;
            color: #0a001f;
            width: 220px;
            display: none;
        }


        a {
            color: 18bc9c
        }

        .dataTable {
            text-align: center;
        }

        .dataTable th {
            text-align: center;
        }



        .navbar-default .navbar-nav>li>a active {
            background-color: #fff;
            color: #111;
        }

        .side>a:hover {
            background-color: #fff;
            color: #111;
        }

        .side>a {
            color: #fff;
            font-size: 15px;
            width: 230px;
            border-radius: 5px;
            margin: 5px;

            border: 1px solid white;
            text-align: center;
            background-color: #0077b6;

        }

        .topbtn>a:hover {
            background-color: #fff;
            color: #111;
        }

        .topbtn>a {
            color: #fff;
            font-size: 15px;
            width: 150px;
            border-radius: 5px;
            margin: 4px;

            border: 1px solid white;
            text-align: center;
            background-color: #0077b6;

        }

        .Gb>ul>li {
            list-style: none;

        }

        .Gb>ul>li>a {
            border: 1px solid #60bda0;
            border-radius: 5px;
            padding: 6px 12px;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            color: #60bda0;
            text-decoration: none;

            float: left;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;


        }

        .Gb>ul>li.active>a:hover {
            color: #111;
            background-color: #60bda0;
        }

        .Gb>ul>li>a:hover {
            color: white;
            background-color: #60bda0;
        }

        nav-tabs>li.active>a {
            background-color: #60bda0;
        }

        .breadcrumb {
            float: right;
        }


        .breadcrumb {
            /* background-color: #f5f5f5; */
            background-color: #fff;
        }


        .side>a {
            background-color: #666;
        }


        .topbtn>a {
            background-color: #09c;
        }


        .Gb>ul>li>a:hover {

            background-color: #54606c;
        }

        .Gb>ul>li>a {

            border: 1px solid #54606c;
            color: #54606c;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="pull-right"><i class="ri-map-pin-line"></i> Search / <b class="navigator">Detail</b></div>
            </div>
        </div>
        <hr>
        <?php
        include (__DIR__ . "/../public/conn_php.php");
        $id = $_GET['id'];
        $sql = "select *
        from $main
            where id='$id'";

        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
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
        if ($Cell_Name1 != "/" && $Cell_Name2 != "/")
            $tissue_sql = "select Tissue_Name,count(*) as num from $main where Cell_Name1 = '$Cell_Name1' and Cell_Name2='$Cell_Name2' and Tissue_Name!='/' GROUP BY Tissue_Name ORDER BY num desc";
        else
            $tissue_sql = "select Tissue_Name,count(*) as num from $main where Cell_Name1 = '$Cell_Name1' and Cell_Name2='$Cell_Name2' and Tissue_Name!='/' GROUP BY Tissue_Name ORDER BY num desc limit 10";

        $tissue_query = mysqli_query($conn, $tissue_sql);
        while ($row = mysqli_fetch_assoc($tissue_query)) {

            $Tissue = $row["Tissue_Name"];

            $num = $row["num"];
            $Tissue_tmp .= $Tissue . "','";
            $Tissue_num_tmp .= "{value:" . $num . ", name:'" . $Tissue . "'},";
        }

        $Tissue_res = substr($Tissue_tmp, 0, strlen($Tissue_tmp) - 3);
        $Tissue_num_res = substr($Tissue_num_tmp, 0, strlen($Tissue_num_tmp) - 1);
        if ($Ligand != "/")
            $Ligand_sql = "select ProteinB,count(*) as pubmed_num from (select ProteinB,PMID,count(*) as num from `cccdb`.main where ProteinA='$Ligand' GROUP BY ProteinB,PMID) as tmp GROUP BY ProteinB";
        else
            $Ligand_sql = "select ProteinB,count(*) as pubmed_num from (select ProteinB,PMID,count(*) as num from `cccdb`.main where ProteinA='$Ligand' GROUP BY ProteinB,PMID) as tmp GROUP BY ProteinB limit 10";
        $Ligand_query = mysqli_query($conn, $Ligand_sql);
        while ($row = mysqli_fetch_assoc($Ligand_query)) {
            $Receptor_n = $row["ProteinB"];
            $pubmed = $row["pubmed"];

            $pubmed_num = $row["pubmed_num"];
            $Receptor_tmp .= "{name:'" . $Receptor_n . "'},";

            $link_tmp .= "{source:'" . $Receptor_n . "', target:'" . $Ligand . "'},";
        }

        $link_res = substr($link_tmp, 0, strlen($link_tmp) - 1);
        $Receptor_res = "{name:'" . $Ligand . "'}," . $Receptor_tmp;

        if ($Receptor != "/")
            $Receptor_sql = "select ProteinA,count(*) as pubmed_num from (select ProteinA,PMID,count(*) as num from `cccdb`.main where ProteinB='$Receptor' GROUP BY ProteinA,PMID) as tmp GROUP BY ProteinA";
        else
            $Receptor_sql = "select ProteinA,count(*) as pubmed_num from (select ProteinA,PMID,count(*) as num from `cccdb`.main where ProteinB='$Receptor' GROUP BY ProteinA,PMID) as tmp GROUP BY ProteinA limit 10";
        $Receptor_query = mysqli_query($conn, $Receptor_sql);
        while ($row = mysqli_fetch_assoc($Receptor_query)) {
            $Ligand_n = $row["ProteinA"];
            $pubmed = $row["pubmed"];

            $pubmed_num = $row["pubmed_num"];
            $Ligand_tmp .= "{name:'" . $Ligand_n . "'},";

            $link_Ligand_tmp .= "{source:'" . $Receptor . "', target:'" . $Ligand_n . "'},";
        }

        $link_Ligand_res = substr($link_Ligand_tmp, 0, strlen($link_Ligand_tmp) - 1);
        $Ligand_res = "{name:'" . $Receptor . "'}," . $Ligand_tmp;

        ?>
        <div class="panel panel-default">
            <div class="panel-heading" id="Ligand-Receptor">
                <h3 style="display: flex; align-items: center; gap: 8px;">
                    <i class="ri-folder-info-line"></i>
                    <span>Cell-Cell overview</span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box box-color-1">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>Cell name 1</td>
                                        <td>
                                            <font color="red">
                                                <?php echo $Cell_Name1; ?>
                                            </font> (Cell Ontology:<a style="display: inline;"
                                                href="https://www.ebi.ac.uk/ols4/search?q=<?php echo $CL_ID1; ?>">
                                                <?php echo $CL_ID1; ?>
                                            </a>)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cell name 2</td>
                                        <td>
                                            <font color="red">
                                                <?php echo $Cell_Name2; ?>
                                            </font> (Cell Ontology:<a style="display: inline;"
                                                href="https://www.ebi.ac.uk/ols4/search?q=<?php echo $CL_ID2; ?>">
                                                <?php echo $CL_ID2; ?>
                                            </a>)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Species
                                        </td>
                                        <td>
                                            <?php echo $Species; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Communication Type</td>
                                        <td>
                                            <?php echo $Communication_Type ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tissue name</td>
                                        <td>
                                            <?php echo $Tissue_Name; ?>
                                        </td>
                                    </tr>
                                    <?php if ($Ligand != "/" && $Receptor != "/") { ?>
                                        <tr>
                                            <td>
                                                Ligand-Receptor
                                            </td>
                                            <td>
                                                <?php echo $Ligand; ?><img src="../public/img/browse/LR.svg" width="25px">
                                                <?php echo $Receptor; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>Disease name</td>
                                        <td>
                                            <?php echo $Phenotype ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Experiment</td>
                                        <td>
                                            <?php echo $Experiment ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Experiment Type</td>
                                        <td>
                                            <?php echo $Experiment_Type ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap">Important Gene involved in the Paper</td>
                                        <td>
                                            <?php echo $Important_Gene_involved_in_the_Paper ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap">Title</td>
                                        <td>
                                            <?php echo $Title ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap">Year</td>
                                        <td>
                                            <?php echo $Year ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PMID</td>
                                        <td>
                                            <a style="display: inline"
                                                href="https://pubmed.ncbi.nlm.nih.gov/<?php echo $PMID ?>">
                                                <?php echo $PMID ?>
                                            </a>
                                            (Paper Type:
                                            <?php echo $Paper_Type ?>)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box box-color-2">
                            <div id="container" style="height: 300px"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <table id="gene_distribution_table">
                            <thead>
                                <tr>
                                    <th>Cell Name1</th>
                                    <th>Cell Name2</th>
                                    <th>Tissue_Name</th>
                                    <th>Phenotype</th>
                                    <th>PMID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($Cell_Name1 != "/" && $Cell_Name2 != "/")
                                    $sql = "select * from $main
                                    where Cell_Name1='$Cell_Name1' and Cell_Name2='$Cell_Name2' order by id";
                                else
                                    $sql = "select * from $main
                                    where Cell_Name1='$Cell_Name1' and Cell_Name2='$Cell_Name2' order by id limit 10";

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
            </div>
        </div>
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
        ?>

        <?php
        $sql = 'select * from `cccdb`.`url` where ProteinA = "' . $Ligand . '"';
        // $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($result);
        // $url = $row['Entry'];
        $url = "https://www.uniprot.org/uniprotkb?query=" . $Ligand;
        ?>
        <?php if ($Ligand != "/" && $Receptor != "/") { ?>
            <div class="panel panel-default">
                <div class="panel-heading" id="Ligand">
                    <h3 style="display: flex; align-items: center; gap: 8px;">
                        <i class="ri-folder-info-line"></i>
                        <span>Protein A details</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>


                                        <tr>
                                            <td>Ligand Symbol</td>
                                            <td>
                                                <?php echo $Ligand ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Protein information in uniprot</td>
                                            <td><a href="<?php echo $url ?>"><img src="uniprot.png" alt="UniProt"
                                                        class="adaptive-image"></a></td>

                                            </a>
                                            </td>
                                            </a></td>
                                        </tr>

                                        <?php
                                        if ($Species == "Human") {
                                            echo "
    <tr>
        <td>Protein information in HPA</td>
        <td><a href=\"https://www.proteinatlas.org/search/$Ligand\">
                <img src=\"logo.png\" width=\"300px\" height=\"50px）\" />
            </a></td>
    </tr>";
                                        }
                                        ?>





                                        <tr>
                                            <td>Cell Name</td>
                                            <td>
                                                <?php echo $Cell_Name1 ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Tissue Type</td>
                                            <td>
                                                <?php echo $Tissue_Name ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Experimental name</td>
                                            <td>
                                                <?php echo $Experiment ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>
                                                <?php echo $Title ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box box-color-2">

                                <div id="crc_model_figure" style="height: 400px;"></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $convert_sql = "select symbol,
        group_concat(DISTINCT ensembl_id SEPARATOR ', ') ensembl_id,  
        group_concat(DISTINCT gene_id SEPARATOR ', ') gene_id,  
        group_concat(DISTINCT accession SEPARATOR ', ') accession
        from $idConvert
            where symbol='$Receptor'
            or alias_symbol='$Receptor'
            group by symbol";
            $query = mysqli_query($conn, $convert_sql);
            $row = mysqli_fetch_assoc($query);
            $symbol = $row["symbol"];
            $ensembl_id = $row["ensembl_id"];
            $gene_id = $row["gene_id"];
            $accession = $row["accession"];
            ?>
            <div class="panel panel-default">
                <div class="panel-heading" id="Receptor">
                    <h3>
                        <i class="ri-folder-info-line"></i>
                        <span>Protein B details</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>


                                        <tr>
                                            <td>Receptor Symbol</td>
                                            <td>
                                                <?php echo $Receptor ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Protein information in uniprot</td>
                                            <td><a href="https://www.uniprot.org/uniprotkb?query=<?php echo $Receptor ?>"><img
                                                        src="uniprot.png" alt="UniProt" class="adaptive-image"></a></td>

                                            </a>
                                            </td>
                                            </a></td>
                                        </tr>

                                        <?php
                                        if ($Species == "Human") {
                                            echo "
    <tr>
        <td>Protein information in HPA</td>
        <td><a href=\"https://www.proteinatlas.org/search/$Receptor\">
                <img src=\"logo.png\" width=\"300px\" height=\"50px）\" />
            </a></td>
    </tr>";
                                        }
                                        ?>
                                        <tr>
                                            <td>Cell Name</td>
                                            <td>
                                                <?php echo $Cell_Name1 ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Tissue Type</td>
                                            <td>
                                                <?php echo $Tissue_Name ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Experimental name</td>
                                            <td>
                                                <?php echo $Experiment ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>
                                                <?php echo $Title ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box box-color-2">

                                <div id="Receptor_network" style="height: 400px;"></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="modal fade" id="search_detail_modal" tabindex="-1" role="dialog"
        aria-labelledby="search_detail_modal_label">
        <div class="modal-dialog" style="width: 80%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="search_detail_modal_label">Search detail</h4>
                </div>
                <div class="modal-body" id="search_detail_modal_body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function search_detail(url) {
            $('#search_detail_modal').modal('show');
            $("#search_detail_modal_body").html("");
            $.ajax({
                url: url,
                dataType: "HTML",
                success: function (html) {
                    $("#search_detail_modal_body").html(html);
                }
            })
        }
    </script>
    <?php include '../public/footer.php' ?>
    <script>
        var chart = echarts.init(document.querySelector('#crc_model_figure'), null, {
            renderer: 'svg'
        });

        var links = [<?php echo $link_res; ?>];
        var nodes = [
            <?php echo $Receptor_res; ?>
        ];
        option = {
            title: {
                top: 'bottom',
                left: 'right'
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
                layout: 'circular',
                roam: false,
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
                edgeSymbol: ['arrow'],
                symbolSize: 40,
                focusNodeAdjacency: true,

                label: {
                    normal: {
                        show: true
                    }
                },
                lineStyle: {
                    normal: {
                        color: 'source',
                        curveness: 0.3
                    }
                }
            }]
        };

        chart.setOption(option);

        chart.on('click', function (params) {
            //实现点击跳转
            //window.open('https://www.baidu.com/s?wd=' + encodeURIComponent(params.name));
            var dow = document.getElementById("show");
            var str = encodeURIComponent(params.name);
            dow.innerHTML = str;

            console.log(encodeURIComponent(params.name));
        });
    </script>
    <script>
        var chart1 = echarts.init(document.querySelector('#Receptor_network'), null, {
            renderer: 'svg'
        });

        var links = [<?php echo $link_Ligand_res; ?>];
        var nodes = [
            <?php echo $Ligand_res; ?>
        ];
        option = {
            title: {
                top: 'bottom',
                left: 'right'
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
                layout: 'circular',
                roam: false,
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
                edgeSymbol: ['arrow'],
                symbolSize: 40,
                focusNodeAdjacency: true,

                label: {
                    normal: {
                        show: true
                    }
                },
                lineStyle: {
                    normal: {
                        color: 'source',
                        curveness: 0.3
                    }
                }
            }]
        };

        chart1.setOption(option);

        chart1.on('click', function (params) {
            //实现点击跳转
            //window.open('https://www.baidu.com/s?wd=' + encodeURIComponent(params.name));
            var dow = document.getElementById("show");
            var str = encodeURIComponent(params.name);
            dow.innerHTML = str;

            console.log(encodeURIComponent(params.name));
        });
    </script>
    <script type="text/javascript">
        $('#gene_distribution_table').DataTable({
            dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
            buttons: [{
                extend: 'csvHtml5',
                text: '<i class="ri-folder-download-line"></i> Export CSV'
            }, {
                extend: 'excelHtml5',
                text: '<i class="ri-file-excel-line"></i> Export Excel'
            }],
            lengthMenu: [10, 25, 50, 100],
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

        var dom = document.getElementById('container');
        var myChart = echarts.init(dom, null, {
            renderer: 'canvas',
            useDirtyRect: false
        });
        var app = {};

        var option;

        // 使用主站配色方案
        var color = [
            "#40C9E3", "#418679", "#54606c", "#0077b6", "#09c",
            "#60bda0", "#18bc9c", "#0a001f", "#b30000", "#4A235A"
        ];

        // 添加图表工具提示
        var tooltip = {
            trigger: 'item',
            formatter: function (params) {
                return params.name + ': ' + params.value;
            }
        };
        option = {
            title: {
                text: 'Cell-Cell Communication Distribution by Tissue',

                left: 'center',
                top: 'top',
                padding: 10
            },
            tooltip: {},
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
    </script>

</body>

</html>