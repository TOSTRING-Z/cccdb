<?php include "public/public.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCCdb</title>
    <style>
        .list-group-item {
            transition: all var(--transition-speed);
        }
        
        .list-group-item:hover {
            background-color: rgba(110,142,251,0.1);
        }
        
        .badge {
            background-color: var(--secondary-color) !important;
            color: white !important;
        }
        
        .label-primary {
            background-color: var(--primary-color) !important;
        }
        
        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<?php include ("public/header.php") ?>
<style>
    *[class*="list-group"] {
        max-width: 280px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .label {
        cursor: pointer;
        padding: 0 5px 0 0;
        line-height: 18px;
        height: 20px;
        display: inline-block;
    }
    .label > div {
        background: #fff;
        display: inline-block;
        height: 100%;
        border: 1px solid #337ab7;
        color: #999;
        cursor: pointer;
        line-height: 18px;
        width: 20px;
        left: 0;
        position: relative;
    }
    .label:hover div {
        color: black;
    }
    .user_select {
        display: inline-block;
        margin: 0 2px 0 0;
        border: 1px solid #f0f0f0;
        padding: 0 5px;
        background: #ff7f00;
        color: white;
        position: relative;
        top: 2px;
        font-weight: bold;
    }
    .list-group-item {
        padding: 12px 15px;
        margin-bottom: 5px;
        border-radius: 4px !important;
        transition: all 0.3s ease;
    }
    
    .list-group-item span {
        margin-right: 8px;
        pointer-events: none;
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
        transform: translateX(3px);
        cursor: pointer;
        color: inherit !important;
    }
    
    .list-group-item:last-child, 
    .list-group-item:first-child {
        border-radius: 4px !important;
    }
    table {
        min-width: 280px;
    }
    .badge {
        background-color: #BCCBE8;
        border-radius: 3px;
    }

    .list-group-item i {
        float: right;
    }

    th > .list-group-item {
        background: #F3C698;
        color: #fff;
        height: 51px;
        border-color: #F3C698;

    }

    th > .list-group-item > h4 {
        font-weight: bold;
        line-height: 0.6;
    }



    th > .list-group-item i {
        position: relative;
    }
    .sm_container {
        z-index: 2;
    }
    .ri-question-line {
        position: relative;
        top: 4px;
    }
    th {
        white-space: nowrap;
    }
    .info-more {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 100px;
        position: relative;
        padding-right: 31px;
    }
    .info-more > i {
        position: absolute;
        right: 2px;
        top: -4px;
        font-size: 22px;
    }
    @media (max-width: 768px) {
        [class*="list-group"] {
            max-width: 100%;
        }
    }
    .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
        z-index: 2;
        color: #fff;
        background-color: #40C9E3;
        border-color: #F3B963;
    }
    .list-group-item.active > .badge, .nav-pills > .active > a > .badge {
        color: #384072;
        background-color: #fff;
    }
    a.list-group-item, button.list-group-item {
        color: black ;
        font-weight: bold;
        border-color: #40C9E3;
    }
    th > .list-group-item {
        background: #40C9E3;
        color: #fff;
        height: 51px;
        border-color: #40C9E3;
    }
    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 4px;
        margin: 10px 0;
    }
    
    .fenye {
        border: 1px solid #dee2e6;
        border-radius: 4px;
        margin-bottom: 15px;
    }
    
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        display: block;
        padding: 8px 15px;
        margin-left: -1px;
        line-height: 1.25;
        color: #40C9E3;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }
    
    .pagination > li > a:hover {
        z-index: 2;
        color: #fff;
        background-color: #40C9E3;
        border-color: #40C9E3;
    }
    
    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover,
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #40C9E3;
        border-color: #40C9E3;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    .panel > .panel-heading {
        padding: 15px 20px !important;
        color: #ffffff;
        background-color: #40C9E3;
        border-radius: 4px 4px 0 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .panel > .panel-heading:hover {
        background-color: #3ab7d0;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .panel > .panel-heading h3 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .panel > .panel-heading i {
        margin-right: 10px;
        font-size: 1.3rem;
    }
</style>
<div class="container" id="body">
    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div>

    <div class="row">
        <!--get筛选开始-->
        <div class="col-lg-3 col-md-3 col-xs-12">
            <?php
            include 'public/conn_php.php';
            //处理筛选字符
            $select = !empty($_GET['select']) ? "where {$_GET['select']}" : "";
            //echo $select;
            if ($select != "") {
                $select = preg_replace("/(:'.*?[\w\s])(')([\w].*?'(?:\||))/i", '${1}\'\'$3', $select);
                $select = str_replace(":", "=", $select);
                $select = str_replace("|", " and ", $select);
            }
            foreach (["Species", "Experiment_Type","Tissue_Name","Phenotype"] as $value){
                $sample_sql = "SELECT $value,count($value) as count from cccdb.main $select group by $value;";
                $sample_result = mysqli_query($conn, $sample_sql);
                while ($rows = mysqli_fetch_assoc($sample_result)) {
                    if ($rows[$value] == NULL) continue;
                    elseif ($rows[$value] == "Highthroughput") continue;
                    $keysRepeat[$value][$rows[$value]] = $rows['count'];
                }
            }

            ?>
            <?php
            $title = ["Species","Experiment Type","Tissue Type","Phenotype"];
            $j = 0;
            foreach ($keysRepeat as $type => $values) {
                $i = 0;
                if ($type == "Species") ksort($values);
                elseif ($type == "Experiment_Type") ksort($values);
                else arsort($values);
                foreach ($values as $name => $val) {
                    $name = trim($name);
                    $val = trim($val);
                    if (preg_match("/[^0-9A-Za-z\.;+\-\(\)\s_']/", $name)) continue;
                    $name_id = preg_replace('/[^0-9A-Za-z]/', "_", $name);
                    $data_select[$type][$i]["id"] = $i;
                    $data_select[$type][$i]["name"] = "<a onclick='select_data(this)' id='$name_id' data-name=\"$name\" data-type='$type'>$name</a>";
                    $data[$type][][0] = "<a title='$name' class='list-group-item' id='$name_id' data-name=\"$name\" data-type='$type'><span class='badge'>$val</span><span>$name</span></a>";
                    $i++;
                }
                $j++;
            }
            //print_r($keysRepeat["GeneType"]);
            ?>

            <?php
            $i = 0;
            foreach ($data as $key => $value) {
                $type = $key;
                $key = preg_replace('/[\s,\/]/', "_", $key) . "_";
                echo "<table class='fenye' id=\"$key\">
                            <thead>
                            <tr>
                                <th>
                                    <div class='list-group-item d-flex justify-content-between align-items-center'>
                                        <h4 class='mb-0'>" . $title[$i] . "</h4>
                                        <button class='btn btn-sm btn-outline-primary' id='select_$key'>
                                            <i class='ri-menu-add-line'></i>
                                        </button>
                                        <script>
                                        $(document).ready(function() {
                                            $('#select_$key').click(function(){
                                            $(this).selectMenu({
                                                showField : 'name',//指定显示文本的字段
                                                keyField : 'id',//指定id的字段
                                                data : " . json_encode($data_select[$type]) . "
                                                });
                                            });
                                        });
                                        </script>
                                    </div>
                                </th>
                            </tr> 
                            </thead>
                            <tbody></tbody>
                        </table>
                        <ul class=\"pagination\" id=\"" . $key . "_ul\"></ul>";
                $i++;

                echo "<script type='text/javascript'>";
                echo "var data_$key = " . json_encode($value) . ";";
                if ($type == "GeneType") {
                    echo "var $key = new table('$key',data_$key,10);";
                } else
                    echo "var $key = new table('$key',data_$key,5);";
                echo $key . ";";
                echo "</script>";
            } ?>
        </div>

        <div class="col-lg-9 col-md-9 col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Data Browser</b></div>
                </div>
            </div>
            <?php
            $matches = preg_split("/[|]/",$_GET['select']);
            foreach ($matches as $value){
                $sel = preg_split("/[:]/",$value);
                $name = substr($sel[1],1,-1);
                $name_id = preg_replace('/[^0-9A-Za-z]/', "_", $name);
                if (empty($name_id)) continue;
                $type = $sel[0];
                if(!isset($sel1)){
                    $sel1 = "<div class='user_select'>SELECT</div><div onclick='select_data(this)' data-name='$name' data-type='$type' class=\"label label-primary\"><div>X</div> $name</div>";
                    echo $sel1;
                }
                else{
                    echo "+<div onclick='select_data(this)' data-name='$name' data-type='$type' class=\"label label-primary\"><div>X</div> $name</div>";
                }
            };
            if($sel){
                echo "<hr>";
            }
            ?>
            <!--cell markers start-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 id="SNP_Overview">
                        <i class="ri-folder-info-line"></i><span>Cell-to-Cell Interactions</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="table_cell_name" width="100%">
                        <thead>
                        <tr>
                            <th>Cell name 1</th>
                            <th>Cell name 2</th>

                            <th>Species</th>


                            <th>Tissue</th>
                            <th>Phenotype</th>
                            <th>PMID</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--cell markers end-->
            <!--表格开始-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 id="SNP_Overview">
                        <i class="ri-folder-info-line"></i>  Browse through Communication Type
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="table_all" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Communication_Type</th>

                            <th>Species</th>

                            <th>Cell name1</th>
                            <th>Cell name2</th>
                            <th>Tissue</th>
                            <th>Phenotype</th>
                            <th>PMID</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--表格结束-->

        </div>


    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div id="container" style="height: 100%;width: 100%"></div>
                <script>
                    window.chart = Highcharts.chart('container', {
                        series: [{
                            type: 'wordcloud',
                            data: []
                        }],
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: null
                        }
                    });
                    function wordcloud(name,url,data) {
                        $.ajax({
                            url: url,
                            data: data,
                            type: "post",
                            dataType: "json"
                        }).then(function (data) {
                            $("#myModalLabel").html(name);
                            $('#myModal').modal('show')
                            window.chart.update({
                                series: [{
                                    type: 'wordcloud',
                                    data: data,
                                    spiral: 'archimedean',
                                    rotation: {
                                        from: 0,
                                        orientations: 1,
                                        to: 0
                                    }
                                }],
                            });
                        })
                    }
                </script>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<?php include 'public/footer.php'?>
</body>

<script>
    var dTable = $('#table_cell_name').DataTable({
        dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
        language: {
            sInfo: "From _START_ to _END_ results",
            paginate: {
                first: '<i class="ri-skip-back-line">',
                previous: '<i class="ri-arrow-left-line">',
                next: '<i class="ri-arrow-right-line">',
                last: '<i class="ri-skip-forward-line">'
            }
        },
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="ri-folder-download-line"></i>',
            action: function (e, dt, node, config) {
                dt.draw().page();
                var this_ = this;
                var formData = dt.ajax.params();
                formData.start =  formData.length;
                formData.length = parseInt(dt.ajax.json().recordsTotal)-1;
                $.ajax({
                    url: 'browse_cellname_server.php',
                    method: 'post',
                    dataType:"json",
                    data: formData
                }).then(function (ajaxReturnedData) {
                    dt.rows.add(ajaxReturnedData.data).draw();

                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this_,e, dt, node, config);

                });
            }
        }],
        "scrollX": true,
        "paging": true,
        "pagingType": "full_numbers",
        "lengthMenu": [10, 25, 50, 100],
        "processing": true,
        "searching": true, //是否开启搜索
        "serverSide": true,//开启服务器获取数据
        "order": [[6, "asc"]], //默认排序
        "ajax": { // 获取数据
            "url": "browse_cellname_server.php",
            "dataType": "json", //返回来的数据形式
            "method": "post",
            "data": {
                "select": "<?php echo $_GET['select'] ?>"
            }
        },
        "bPaginage": true,
        "columns": [
            {"data": "Cell_Name1"},
            {"data": "Cell_Name2"},
            {"data": "Species"},
            {"data": "Tissue_Name"},
            {"data": "Phenotype"},
            {"data": "PMID"},
            {"data": "id"},
        ],
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "render": function (data, type, row) {
                var html = '<a target="_blank" href="search/detail_all.php?id=' + row.id + '">more details</a>';
                return html;
            }
        }],
        "createdRow": function (row, data, dataIndex) {
            $(row).children('td').each((i, e) => {
                if (e.innerText === '')
                    $(e).html('\\');
                $(e).attr('title', e.innerText);
            });
        }
    });
    $('<i style="font-size: 20px" class="ri-question-line ms-2" title="TF-Marker displays all entries related to the input based on the filter."></i>').insertBefore('#table_all_filter > label')
</script>

<script>
    var dTable = $('#table_all').DataTable({
        dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="ri-folder-download-line"></i>',
            action: function (e, dt, node, config) {
                dt.draw().page();
                var this_ = this;
                var formData = dt.ajax.params();
                formData.start =  formData.length;
                formData.length = parseInt(dt.ajax.json().recordsTotal)-1;
                $.ajax({
                    url: 'browse_server.php',
                    method: 'post',
                    dataType:"json",
                    data: formData
                }).then(function (ajaxReturnedData) {
                    dt.rows.add(ajaxReturnedData.data).draw();

                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this_,e, dt, node, config);

                });
            }
        }],
        "scrollX": true,
        "paging": true,
        "pagingType": "full_numbers",
        "lengthMenu": [10, 25, 50, 100],
        "processing": true,
        "searching": true, //是否开启搜索
        "serverSide": true,//开启服务器获取数据
        "order": [[7, "asc"]], //默认排序
        "ajax": { // 获取数据
            "url": "browse_server.php",
            "dataType": "json", //返回来的数据形式
            "method": "post",
            "data": {
                "select": "<?php echo $_GET['select'] ?>"
            }
        },
        "bPaginage": true,
        "columns": [
            {"data": "Communication_Type"},

            {"data": "Species"},

            {"data": "Cell_Name1"},
            {"data": "Cell_Name2"},
            {"data": "Tissue_Name"},
            {"data": "Phenotype"},
            {"data": "PMID"},
            {"data": "id"},
        ],
        language: {
            sInfo: "From _START_ to _END_ results",
            paginate: {
                first: '<i class="ri-skip-back-line">',
                previous: '<i class="ri-arrow-left-line">',
                next: '<i class="ri-arrow-right-line">',
                last: '<i class="ri-skip-forward-line">'
            }
        },
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "render": function (data, type, row) {
                var html = '<a target="_blank" href="search/detail_all.php?id=' + row.id + '">more details</a>';
                return html;
            }
        }],
        "createdRow": function (row, data, dataIndex) {
            $(row).children('td').each((i, e) => {
                if (e.innerText === '')
                    $(e).html('\\');
                $(e).attr('title', e.innerText);
            });
        }
    });
    $('<i style="font-size: 20px" class="ri-question-line" title="CCCdb displays all entries related to the input based on the filter."></i>').insertBefore('#table_all_filter > label')
</script>
<script>
    // $(document).ready(function () {
    //     var e = $('.ri-menu-add-line')[1];
    //     e.className = 'ri-question-line';
    //     e.title = 'We calculated score of the variation that means how many categories the variation associated with. Each variation is scored based on its annotated records on nine annotation categories: risk SNP, eQTL, motif change, conservation, enhancer and super enhancer, promoter, TF binding, ATAC accessible region and Hi-C.';
    // })
</script>
</html>


