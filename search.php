<?php include (__DIR__."/public/public.php");
ini_set("error_reporting", "E_ALL & ~E_NOTICE");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
    <link rel="stylesheet" href="public/css/unified_styles.css">
    <style>
        
        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 0.8rem;
            transition: all var(--transition-speed);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(110,142,251,0.25);
        }
        
        .img-rounded {
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            transition: transform var(--transition-speed);
        }
        
        .img-rounded:hover {
            transform: scale(1.02);
        }
        
        @media (max-width: 768px) {
            .col-lg-6 {
                padding: 0 15px;
            }
        }
    </style>
</head>
<style type="text/css">
    .tab-pane{
        min-height: 400px;
    }
    .ri-question-line {
        position: relative;
        top: 4px;
    }
    /* style.css | http://www.licpathway.net/$main/public/css/style.css */

    select.form-control {
        /* width: auto; */
        width: 100%;
        height: 35px;
    }
    input.form-control {
        /* width: auto; */
        width: 100%;
        height: 35px;
    }
    #accordion .panel-heading {
        padding: 0;
        background-color: #40C9E3;
    }
    #accordion .panel-title a {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        color: white;
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        width: 100%;
    }

    #accordion .panel-title a:not(.collapsed) {
        background-color: #3ab7d0;
    }

    #accordion .panel-title a::after {
        content: "\f078";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    #accordion .panel-title a.collapsed::after {
        content: "\f054";
    }

    #accordion .panel-body {
        padding: 20px;
        background: #f8f9fa;
        border-left: 4px solid #40C9E3;
    }

    #accordion .panel-body .box {
        background: white;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .modal-dialog {
        /* width: 600px; */
        width: 80%;
    }


</style>

<body>
<?php include (__DIR__."/public/header.php") ?>
<div class="container" id="body" style="padding-top: 20px;">
    <div class="row">
        <div class="col-xs-12 col-lg-12">
            <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Search</b></div>
        </div>
    </div>
    <hr>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching by Cell to Cell Type
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form action="search/search_by_cell.php" method="get" target="_blank" id="form_search_by_cell">
                                    <div class="form-group">
                                        <label>Species</label>
                                        <div id="Species1"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cell type 1</label>
                                        <div id="Cell_Name1"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cell type 2</label>
                                        <div id="Cell_Name2"></div>
                                    </div>
                                    <br>
                                    <div>
                                        <button type="button" onclick="search_detail('search_by_cell.php')" class="btn btn-primary">Start search</button>
                                        <button  type="Reset" onclick="window.Cell_Name1.reset(search_cell);
                                        window.Cell_Name1.reset(search_ct);" class="btn btn-primary">Reset</button>
                                        <a onclick="search_2()" class="btn btn-primary">For example</a><br>
                                        <script>
                                            function search_2() {
                                                window.Species1.val("Human",search_ct);

                                                window.Cell_Name1.val("Adipocyte",search_ct);

                                                window.Cell_Name2.val("Hepatocyte",search_ct);
                                            }
                                        </script>
                                    </div>
                                </form>
                                <br>
                                <script>
                                    window.Species1 = new reinput({
                                        name: "Species1",
                                        target: "#Species1",
                                        ajax: {
                                            url: "/<?php echo $web_title?>/search/search_cell_server.php?input_sel=Species",
                                            //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                        },
                                        api: {
                                            change: function () {
                                                window.Species1.change(search_cell)
                                            }
                                        }
                                    });
                                </script>
                                <script>
                                    window.Cell_Name1 = new reinput({
                                        name: "Cell_Name1",
                                        target: "#Cell_Name1",
                                        ajax: {
                                            url: "/<?php echo $web_title?>/search/search_cell_server.php?input_sel=Cell_Name1",
                                        },
                                        api: {
                                            change: function () {
                                                window.Cell_Name1.change(search_cell)
                                            }
                                        }
                                    });
                                </script>
                                <script>
                                    window.Cell_Name2 = new reinput({
                                        name: "Cell_Name2",
                                        target: "#Cell_Name2",
                                        ajax: {
                                            url: "/<?php echo $web_title?>/search/search_cell_server.php?input_sel=Cell_Name2",
                                        },
                                        api: {
                                            change: function () {
                                                window.Cell_Name2.change(search_cell)
                                            }
                                        }
                                    });
                                    var search_cell = [window.Species1,window.Cell_Name1,window.Cell_Name2]
                                </script>
                            </div>
                        </div>
                        <div  class="col-lg-6">
                            <div class="box box-color-2">
                                <div style="font-size: 120%;">
                                    <font color="#418679" size="5"><strong>Option explanation:</strong></font>
                                    <br/><font color="#418679"><strong>1) Species:  </strong></font>Select <font color="#418679">Human or Mouse</font>.
                                    <br/><font color="#418679"><strong>2) Cell type1: </strong></font>Select or input the <font color="#418679">Cell name</font>.
                                    <br/><font color="#418679"><strong>3) Cell type2: </strong></font>Select or input the <font color="#418679">Cell name</font>.

                                </div>
                                <img src="public/img/search/search2.svg" class="img-responsive img-rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne" style="background-color: #40C9E3;">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: white;">
                        <span class="glyphicon glyphicon-search"></span>
                        Search by four major communication modes
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form action="search/search_by_ct.php" target="_blank" method="get" enctype="multipart/form-data" id="form_search_by_ct">

                                    <div class="form-group">
                                        <label>Species</label>
                                        <div id="Species"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Communication_Type</label>
                                        <div id="Communication_Type"></div>
                                    </div>
                                    <br>
                                    <div>
                                        <button type="button" onclick="search_detail('search_by_ct.php')" class="btn btn-primary">Start search</button>
                                        <button  type="Reset" onclick="window.search_ct.reset(search_ct);
                                        window.cel_type.reset(search_ct);" class="btn btn-primary">Reset</button>
                                        <a onclick="search_1()" class="btn btn-primary">For example</a><br>
                                    </div>
                                    <script>
                                        function search_1() {
                                            window.Species.val("Human",search_ct);

                                            window.Communication_Type.val("Autocrine",search_ct);
                                        }
                                    </script>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box box-color-2">
                                <div style="font-size: 120%;">
                                    <font color="#418679" size="5"><strong>Option explanation:</strong></font>
                                    <br/><font color="#418679"><strong>1) Species: </strong></font>Select <font color="#418679">Human or Mouse</font>.
                                    <br/><font color="#418679"><strong>3) Communication_Type: </strong></font>Select or input the <font color="#418679">Communication_Type name</font>.
                                </div>
                                <img src="public/img/search/search1lL-R.svg" class="img-responsive img-rounded">
                            </div>
                        </div>
                        <script>
                            window.Species = new reinput({
                                name: "Species",
                                target: "#Species",
                                ajax: {
                                    url: "/<?php echo $web_title?>/search/search_ct_server.php?input_sel=Species",
                                    //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                },
                                api: {
                                    change: function () {
                                        window.Species.change(search_ct)
                                    }
                                }
                            });
                        </script>
                        <script>
                            window.Communication_Type = new reinput({
                                name: "Communication_Type",
                                target: "#Communication_Type",
                                ajax: {
                                    url: "/<?php echo $web_title?>/search/search_ct_server.php?input_sel=Communication_Type",
                                },
                                api: {
                                    change: function () {
                                        window.Communication_Type.change(search_ct)
                                    }
                                }
                            });
                            window.search_ct = [window.Species,window.Communication_Type]
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"  aria-controls="collapseThree">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching by Tissue Type
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form method="get"  target="_blank" action="search/search_by_tissue.php" id="form_tissue" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Species</label>
                                        <div id="Species2"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tissue Type</label>
                                        <div id="Tissue_Name"></div>
                                    </div>
                                    <script>
                                        window.Species2 = new reinput({
                                            name: "Species2",
                                            target: "#Species2",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_tissue_server.php?input_sel=Species",
                                                //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                            },
                                            api: {
                                                change: function () {
                                                    window.Species2.change(search_tissue)
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        window.Tissue_Name = new reinput({
                                            name: "Tissue_Name",
                                            target: "#Tissue_Name",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_tissue_server.php?input_sel=Tissue_Name",
                                                //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                            },
                                            api: {
                                                change: function () {
                                                    window.Tissue_Name.change(search_tissue)
                                                }
                                            }
                                        });
                                        var search_tissue = [window.Species2,window.Tissue_Name]

                                    </script>


                                    <br>
                                    <div>
                                        <button type="button" onclick="search_detail('search_by_tissue.php')" class="btn btn-primary">Start search</button>
                                        <button type="button" onclick="
                                                window.Species2.reset(search_tissue);
                                                window.Tissue_Name.reset(search_tissue);" class="btn btn-primary">Reset
                                        </button>
                                        <a ONCLICK="search_tissue_select()" class="btn btn-primary">For example</a><br/>
                                    </div>
                                    <script>
                                        function search_tissue_select() {
                                            window.Species2.val("Human",search_tissue);

                                            window.Tissue_Name.val("Lung",search_tissue);

                                        }
                                    </script>
                                </form>
                            </div>
                        </div>

                        <div  class="col-lg-6">
                            <div class="box box-color-2">
                                <div style="font-size: 120%;">
                                    <font color="#418679" size="5"><strong>Option explanation:</strong></font>
                                    <br/><font color="#418679"><strong>1) Species: </strong></font>Select <font color="#418679">Human or Mouse</font>.
                                    <br/><font color="#418679"><strong>2) Tissue Type: </strong></font>Select or input <font color="#418679">Tissue Type</font>.
                                </div>
                                <img src="public/img/search/search3.svg" class="img-responsive img-rounded">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"  aria-controls="collapseFour">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching by Disease Type
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form method="get"  target="_blank" action="search/search_by_disease.php" id="form_disease" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Species</label>
                                        <div id="Species3"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Disease</label>
                                        <div id="Phenotype"></div>
                                    </div>
                                    <script>
                                        window.Species3 = new reinput({
                                            name: "Species3",
                                            target: "#Species3",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_disease_server.php?input_sel=Species",
                                                //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                            },
                                            api: {
                                                change: function () {
                                                    window.Species3.change(search_disease)
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        window.Phenotype = new reinput({
                                            name: "Phenotype",
                                            target: "#Phenotype",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_phenotype_server.php?input_sel=Phenotype",
                                                //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                            },
                                            api: {
                                                change: function () {
                                                    window.Phenotype.change(search_disease)
                                                }
                                            }
                                        });
                                        var search_disease = [window.Species3,window.Phenotype]

                                    </script>


                                    <br>
                                    <div>
                                        <button type="button" onclick="search_detail('search_by_disease.php')" class="btn btn-primary">Start search</button>
                                        <button type="button" onclick="
                                                window.Species3.reset(search_disease);
                                                window.Phenotype.reset(search_disease);" class="btn btn-primary">Reset
                                        </button>
                                        <a ONCLICK="search_disease_select()" class="btn btn-primary">For example</a><br/>
                                        <script>
                                            function search_disease_select() {
                                                window.Species3.val("Human",search_tissue);

                                                window.Phenotype.val("Breast Carcinoma",search_tissue);

                                            }
                                        </script>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div  class="col-lg-6">
                            <div class="box box-color-2">
                                <div style="font-size: 120%;">
                                    <font color="#418679" size="5"><strong>Option explanation:</strong></font>
                                    <br/><font color="#418679"><strong>1) Species: </strong></font>Select <font color="#418679">Human or Mouse</font>.
                                    <br/><font color="#418679"><strong>2) Disease Type: </strong></font>Select or input <font color="#418679">Disease Type</font>.
                                </div>
                                <img src="public/img/search/search4.svg" class="img-responsive img-rounded">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php include "public/footer.php"; ?>
<div class="modal fade" id="search_detail_modal" tabindex="-1" role="dialog" aria-labelledby="search_detail_modal_label">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%;">
        <div class="modal-content" style="border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div class="modal-header" style="background-color: #6e8efb; color: white; border-radius: 10px 10px 0 0;">
                <h3 class="modal-title" id="search_detail_modal_label" style="font-weight: bold;">Search detail</h3>
            </div>
            <div class="modal-body" id="search_detail_modal_body" style="overflow-x: auto; padding: 20px;">
            </div>
        </div>
    </div>
</div>
</body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 为每个折叠面板单独初始化
            document.querySelectorAll('#accordion .panel-collapse').forEach(function(panel) {
                new bootstrap.Collapse(panel, {
                    toggle: false
                });
            });
            
            // 默认展开第一个面板
            var firstPanel = document.querySelector('#accordion .panel-collapse');
            if(firstPanel) {
                new bootstrap.Collapse(firstPanel, {show: true});
            }
            
            // 为每个面板标题添加点击事件
            document.querySelectorAll('#accordion .panel-title a').forEach(function(header) {
                header.addEventListener('click', function(e) {
                    e.preventDefault();
                    var target = this.getAttribute('href');
                    var panel = document.querySelector(target);
                    if(panel) {
                        new bootstrap.Collapse(panel, {toggle: true});
                    }
                });
            });
        });
    </script>
<script>
    /*搜索提交*/
    function search_detail(php_file) {
        let data = {
            "search_by_cell.php":$("#form_search_by_cell").serialize(),
            "search_by_ct.php":$("#form_search_by_ct").serialize(),
            "search_by_tissue.php":$("#form_tissue").serialize(),
            "search_by_disease.php":$("#form_disease").serialize(),
        }
        let label = {
            "search_by_cell.php":"Result of searching by Cell to Cell Type",
            "search_by_ct.php":"Result of Searching by Communication Type",
            "search_by_tissue.php":"Result of Searching by Tissue Type",
            "search_by_disease.php":"Result of Searching by Disease Type",
        }
        $('#search_detail_modal').modal('show');
        $("#search_detail_modal_label").html(label[php_file]);
        $("#search_detail_modal_body").html("<h2>Loading...</h2>");
        $.ajax({
            url: "search/"+php_file+"?"+data[php_file].replace(/\+/g," "),
            dataType: "HTML",
            success: function (html) {
                $("#search_detail_modal_body").html(html);
            }
        })
    }
</script>
</html>
