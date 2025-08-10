<?php include ("public/public.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCCdb</title>
</head>

<body>
    <?php include ("public/header.php") ?>
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

        img[data-name] {
            display: inline-block;
            margin: auto;
            height: 5rem;
            object-fit: contain;
            cursor: pointer;
            width: 367px;
        }

        p {
            text-align: justify;
            text-justify: distribute-all-lines;
            text-align-last: left;
            -moz-text-align-last: left;
            word-break: break-word;
            -webkit-hyphens: manual;
            -ms-hyphens: manual;
            hyphens: manual;
            margin: 10px 0;
        }

        .p-1 {
            font-size: 16px;
            line-height: 1.7;
            color: var(--text-color);
        }

        .carousel {
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .carousel-inner>.item>a>img,
        .carousel-inner>.item>img,
        .img-responsive,
        .thumbnail a>img,
        .thumbnail>img {
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .carousel-inner>.item:hover>img {
            transform: scale(1.02);
        }

        .carousel-indicators {
            bottom: 20px;
        }

        .carousel-indicators li {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .carousel-indicators .active {
            background-color: white;
            width: 30px;
            border-radius: 6px;
        }

        .carousel-control {
            width: 8%;
            background: rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .carousel:hover .carousel-control {
            opacity: 1;
        }

        .carousel-control .glyphicon {
            color: white;
            font-size: 30px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .carousel-control.left,
        .carousel-control.right {
            background-image: none;
        }

        .box .info a {
            cursor: pointer;
        }

        a {
            display: block;
            transition: all 0.3s ease;
        }

        a {
            color: var(--primary-color);
        }

        a:focus,
        a:hover {
            color: var(--accent-color);
            text-decoration: none;
            transform: translateY(-2px);
        }

        .sister a {
            color: var(--primary-color);
            font-weight: bold;
            font-size: medium;
            display: inline-block;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(110, 142, 251, 0.1), rgba(167, 119, 227, 0.1));
        }

        .sister a:hover {
            background: linear-gradient(135deg, rgba(110, 142, 251, 0.2), rgba(167, 119, 227, 0.2));
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sister p {
            font-size: larger;
            margin: 15px 0;
        }

        .sister i {
            margin-right: 8px;
            color: var(--accent-color);
        }

        h1,
        h2,
        h3,
        h4 {
            color: var(--primary-color);
        }

        #gene_type_graph {
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        hr {
            border-top: 1px solid rgba(110, 142, 251, 0.2);
        }
    </style>
    <?php
    include "public/conn_php.php";
    $communication_type_sql = "select Communication_Type, count(*) as Communication_Type_num
from main
where Communication_Type != '/'	
group by Communication_Type
order by Communication_Type_num desc
limit 10;";

    $communication_type_query = mysqli_query($conn, $communication_type_sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($communication_type_query)) {
        $data[] = [intval($row["Communication_Type_num"]), $row["Communication_Type"]];
    }

    ?>
    <div class="container" id="body" style="padding-top: 20px;">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">CCCdb</b></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 style="text-align: center"><b style="color:#F5DE34;font-size: 40px;">CCCdb!</b>v1.0</h4>
                            <h4 style="text-align: center;font-size: 20px">
                                CCCdb(cell-cell communication database): A comprehensive manually curated database for
                                cell-cell communication in human and mouse.
                            </h4>
                            <form method="get" enctype="multipart/form-data" target="_blank"
                                action="analysis.php">
                                <div style="margin-top:2%">
                                    <div class="input-group">
                                        <textarea type="text" name="query" class="form-control" rows="1"
                                            placeholder="Conversational agent analysis based on cell-cell communication data." id="ipt"
                                            style="padding-right: 1.5rem;"></textarea><span
                                            class="typed-cursor typed-cursor--blink" aria-hidden="true">|</span>
                                        <input type="text" name="quickly" value="1" hidden="">
                                        <script>
                                            var ipt = new Typed('#ipt', {
                                                strings: ['Conversational AI-Agent analysis based on cell-cell communication data',
                                                    'Find communications between T cells and B cells',
                                                    'Search for communications involving IL-2',
                                                    'Explore cell-cell interactions in immune responses'
                                                ],
                                                typeSpeed: 20,
                                                backSpeed: 0,
                                                attr: 'placeholder',
                                                bindInputFocusEvents: true,
                                                loop: true
                                            });
                                        </script>
                                        <div class="input-group-btn">
                                            <button type="Submit" class="btn btn-default"
                                                style="background-color: #1D3D70;border-radius: 0 2rem 0 2rem;margin-left: -1.5rem;">
                                                <font color="#fff" size="2"><strong>Quick Analysis</strong></font>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button class="btn border-success btn-sm mt-2"
                                onclick="$('#ipt').val('Find communications between T cells and B cells')">T cell ↔ B cell</button>
                            <button class="btn border-info btn-sm mt-2"
                                onclick="$('#ipt').val('Search for communications involving IL-2')">IL-2 interactions</button>
                            <button class="btn border-danger btn-sm mt-2" onclick="$('#ipt').val('')">Reset</button>
                        </div>
                    </div>
                    <div id="myCarousel" style="margin-top:1em" class="carousel slide">
                        <?php
                        function get_file_list($path)
                        {
                            $file_list = [];
                            $file_path = $path;
                            if (is_dir($file_path)) {
                                $handler = opendir($file_path);
                                while (($filename = readdir($handler)) !== false) {
                                    if ($filename != "." && $filename != "..") {
                                        $file_list[] = $filename;
                                    }
                                }
                                closedir($handler);
                                return $file_list;
                            }
                        }

                        ?>
                        <!-- Carousel Items -->
                        <div class="carousel-inner">
                            <?php
                            $path = "public/img/home/Carousel/";
                            foreach (get_file_list($path) as $i => $val) { ?>
                                <div class="item <?php echo $i == 0 ? "active" : "" ?>">
                                    <img src="<?php echo "$path$val" ?>" style="width: 100%">
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Carousel Navigation -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <h3 style="text-align: center"><b>What is CCCdb?</b></h3>
                    <p class="p-1" style="font-size:19px;text-align: justify; ">
                        One of the most fundamental questions in biology is: which cells communicate with each other
                        during organismal growth, development, immune responses, and the pathogenesis of complex
                        diseases. There is an urgent need for an expert-curated reference database comprising
                        experimentally validated, gold-standard CCCs support the development of computational inference
                        tools.<br>
                        Here, we present CCCdb (https://bio.liclab.net/cccdb/index.php), a comprehensive and
                        expert-curated database of cell-cell communications that have been experimentally validated in
                        human, mouse. CCCdb integrates 1,646 publications and 8,553 curated entries, including 3,389
                        cell-cell pairs and 1,274 cell types. It spans the broadest temporal range (1973–2025) and
                        supports all four major communication modes: direct contact, autocrine, paracrine, and
                        endocrine.<br>
                        Notably, CCCdb incorporates an AI-assisted querying system based on the ReAct agent
                        architecture, enabling users to submit biological questions in natural language. The system
                        automatically translates these into structured SQL queries and retrieves relevant cell–cell
                        communication information.
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-lg-12">
                <div class="box box-color-3" id="right-1">
                    <img src="public/img/home/home_new.png" width="100%">

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8">
                <hr>
                <center>
                    <h1><b>Communication Type</b></h1>
                </center>
                <div id="gene_type_graph"
                    style="width:100%;height:400px;display: flex;justify-content: center;align-items:center;"><i
                        style="width: 26px;height: 38px;"
                        class="ri-refresh-fill animate__animated animate__rotateOut"></i></div>
            </div>
            <div class="col-lg-4">
                <hr>
                <center>
                    <h1><b>Visitors</b></h1>
                </center>
                <div style="width:100%;height:400px;padding:20px;">
                    <script type="text/javascript" id="clstr_globe"
                        src="//clustrmaps.com/globe.js?d=LzRF-3LBSeYGC98Lm4EeP64q4i6jYLTA9oqbRpt_FxA"></script>
                </div>
            </div>
        </div>

        <div class="row">
            <hr>
            <div class="sister-projects">
                <center>
                    <h1><b><i class="ri-heart-line"></i> Sister Projects</h1></b>
                </center>
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-database-2-line"></i>
                            <h4>ENdb</h4>
                            <p>Experimentally validated enhancer database for human and mouse</p>
                            <a href="http://www.licpathway.net/ENdb/index.php" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-bar-chart-line"></i>
                            <h4>SEanalysis</h4>
                            <p>Super-enhancer associated regulatory analysis tool</p>
                            <a href="http://www.licpathway.net/SEanalysis/?tdsourcetag=s_pctim_aiomsg"
                                class="project-link">Visit Project <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-git-repository-line"></i>
                            <h4>LncSEA</h4>
                            <p>Comprehensive human lncRNA sets resource and enrichment analysis platform</p>
                            <a href="http://bio.liclab.net/LncSEA/index.php" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-database-2-line"></i>
                            <h4>ATACdb</h4>
                            <p>Comprehensive human chromatin accessibility database</p>
                            <a href="http://www.licpathway.net/ATACdb" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-function-line"></i>
                            <h4>KnockTF</h4>
                            <p>Gene expression database with knockdown/knockout of transcription factors</p>
                            <a href="http://www.licpathway.net/KnockTF/" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-database-2-line"></i>
                            <h4>TRCirc</h4>
                            <p>Transcriptional regulation information resource for circRNAs</p>
                            <a href="http://www.licpathway.net/TRCirc/view/index" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-file-text-line"></i>
                            <h4>TRlnc</h4>
                            <p>Comprehensive database of human transcriptional regulation of lncRNAs</p>
                            <a href="http://www.licpathway.net/TRlnc/view/index" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="project-card">
                            <i class="ri-database-2-line"></i>
                            <h4>VARAdb</h4>
                            <p>Variation annotation database for human</p>
                            <a href="http://www.licpathway.net/VARAdb/" class="project-link">Visit Project <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .sister-projects {
                padding: 30px 0;
            }

            .project-card {
                background: white;
                border-radius: 12px;
                padding: 25px;
                height: 100%;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                border: 1px solid rgba(110, 142, 251, 0.1);
            }

            .project-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(110, 142, 251, 0.2);
                border-color: rgba(110, 142, 251, 0.3);
            }

            .project-card i {
                font-size: 40px;
                color: #6e8efb;
                margin-bottom: 15px;
            }

            .project-card h4 {
                color: #6e8efb;
                margin-bottom: 10px;
            }

            .project-card p {
                color: #666;
                font-size: 14px;
                margin-bottom: 20px;
            }

            .project-link {
                display: inline-flex;
                align-items: center;
                color: #6e8efb;
                font-weight: 500;
                transition: all 0.3s;
            }

            .project-link i {
                font-size: 16px;
                margin-left: 5px;
                transition: transform 0.3s;
            }

            .project-link:hover {
                color: #a777e3;
                text-decoration: none;
            }

            .project-link:hover i {
                transform: translateX(3px);
            }
        </style>
    </div>
    <?php include "public/footer.php"; ?>
</body>
<script>
    // 轮播图自动播放设置
    $(document).ready(function () {
        $('.carousel').carousel({
            interval: 5000,
            pause: "hover"
        });
    });

    // 通讯类型图表
    var data = <?php echo json_encode($data) ?>;
    var dom = document.getElementById("gene_type_graph");
    var gene_type_graph = echarts.init(dom);

    // 处理数据排序
    data.sort(function (a, b) {
        return a[0] - b[0];
    });

    option = {
        dataset: {
            source: data
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            },
            formatter: function (params) {
                return `<div style="padding: 10px; background: white; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <div style="font-weight: bold; color: #6e8efb; margin-bottom: 5px;">${params[0].value[1]}</div>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 12px; height: 12px; background: linear-gradient(90deg, #6e8efb, #a777e3); border-radius: 2px; margin-right: 8px;"></div>
                        <span>Count: ${params[0].value[0]}</span>
                    </div>
                </div>`;
            }
        },
        grid: {
            containLabel: true,
            left: '3%',
            right: '4%',
            bottom: '3%',
            top: '3%'
        },
        xAxis: {
            name: 'Count',
            nameLocation: 'center',
            nameGap: 30,
            axisLine: {
                lineStyle: {
                    color: '#eaeaea'
                }
            },
            axisTick: {
                show: false
            },
            splitLine: {
                lineStyle: {
                    color: '#f5f5f5'
                }
            }
        },
        yAxis: {
            type: 'category',
            axisLine: {
                show: false
            },
            axisTick: {
                show: false
            },
            axisLabel: {
                interval: 0,
                rotate: 30,
                color: '#666'
            }
        },
        series: [{
            type: 'bar',
            encode: {
                x: 'number',
                y: 'GeneType'
            },
            barWidth: '60%',
            itemStyle: {
                color: new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                    offset: 0,
                    color: '#6e8efb'
                },
                {
                    offset: 1,
                    color: '#a777e3'
                }
                ]),
                borderRadius: [0, 4, 4, 0]
            },
            emphasis: {
                itemStyle: {
                    color: new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                        offset: 0,
                        color: '#a777e3'
                    },
                    {
                        offset: 1,
                        color: '#ff7f00'
                    }
                    ]),
                    shadowColor: 'rgba(110,142,251,0.5)',
                    shadowBlur: 10,
                    shadowOffsetY: 3
                }
            },
            label: {
                show: true,
                position: 'right',
                formatter: '{c}',
                color: '#6e8efb'
            }
        }]
    };

    gene_type_graph.setOption(option);

    // 窗口大小变化时重新调整图表
    window.addEventListener('resize', function () {
        gene_type_graph.resize();
    });
</script>

</html>