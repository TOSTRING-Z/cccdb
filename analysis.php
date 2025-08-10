<?php
// 头部保持一致
include('public/public.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cell Communication Analysis</title>
    <!-- 添加DataTables CSS和JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <style>
        :root {
            --primary-color: #4285F4;
            --secondary-color: #3367D6;
            --accent-color: #34A853;
            --error-color: #EA4335;
            --light-gray: #F5F5F5;
            --dark-gray: #757575;
            --white: #FFFFFF;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Roboto', 'Segoe UI', sans-serif;
            line-height: 1.5;
            color: #212121;
            background-color: var(--light-gray);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 40px;
            font-weight: 400;
            font-size: 2.4em;
            letter-spacing: -0.5px;
        }

        .card {
            background: var(--white);
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        #queryForm {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        textarea {
            width: 100%;
            padding: 16px;
            border: 2px solid #E0E0E0;
            border-radius: 8px;
            min-height: 120px;
            font-size: 16px;
            transition: border 0.3s;
            resize: vertical;
        }

        textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.2);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 500;
            color: var(--dark-gray);
        }

        select {
            padding: 12px 16px;
            border: 2px solid #E0E0E0;
            border-radius: 8px;
            font-size: 16px;
            background-color: var(--white);
            transition: all 0.3s;
        }

        select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.2);
        }

        button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 14px 28px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            align-self: flex-start;
        }

        button:hover {
            background: var(--secondary-color);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        button:active {
            transform: translateY(0);
        }

        #results {
            min-height: 300px;
        }

        .loader {
            display: none;
            border: 4px solid rgba(66, 133, 244, 0.1);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 40px auto;
        }

        .progress-container {
            width: 100%;
            background-color: #EDEDED;
            border-radius: 8px;
            margin: 20px 0;
            display: none;
            overflow: hidden;
        }

        .progress-bar {
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            width: 0%;
            transition: width 0.3s ease;
        }

        .example-queries {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .query-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .example-btn {
            padding: 10px 16px;
            background: var(--white);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .example-btn:hover {
            background: rgba(66, 133, 244, 0.08);
            transform: translateY(-1px);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* 响应式设计 */
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            h2 {
                font-size: 1.8em;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <?php include('public/header.php'); ?>

    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Analysis</b></div>
            </div>
        </div>
        <hr>
        <h2>Cell Communication Analyzer</h2>

        <form id="queryForm">
            <textarea name="query" id="query" placeholder="e.g. Find communications between T cells and B cells in breast cancer..."></textarea>

            <div style="margin: 15px 0;">
                <label for="rowLimit">Max Rows: </label>
                <select name="rowLimit" id="rowLimit">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <button type="submit" id="submit">Analyze</button>
        </form>

        <div class="example-queries">
            <h3>Example Queries:</h3>
            <div class="query-buttons">
                <button class="example-btn" data-query="Find communications between T cells and B cells">T cell ↔ B cell</button>
                <button class="example-btn" data-query="Search for communications involving IL-2">IL-2 interactions</button>
                <button class="example-btn" data-query="Get communications in lung tissue">Lung tissue</button>
                <button class="example-btn" data-query="Show papers from year 2020">2020 papers</button>
            </div>
        </div>

        <div>
            <div id="loader" class="loader"></div>
            <div id="progress-container" class="progress-container">
                <div id="progress-bar" class="progress-bar"></div>
            </div>
            <div id="results"></div>
        </div>

        <style>
            .example-queries {
                margin: 20px 0;
                padding: 15px;
                background: #f5f5f5;
                border-radius: 5px;
            }

            .query-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 10px;
            }

            .example-btn {
                padding: 8px 12px;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .example-btn:hover {
                background: #45a049;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const queryForm = document.getElementById('queryForm');
                const loader = document.getElementById('loader');
                const progressContainer = document.getElementById('progress-container');
                const progressBar = document.getElementById('progress-bar');
                const results = document.getElementById('results');

                function query_content(e) {
                    e.preventDefault();
                    const formData = new FormData(e.target);

                    // 显示加载动画和进度条
                    loader.style.display = 'block';
                    progressContainer.style.display = 'block';
                    results.innerHTML = '';

                    // 模拟进度条动画
                    let progress = 0;
                    const progressInterval = setInterval(() => {
                        progress += Math.random() * 10;
                        if (progress > 90) clearInterval(progressInterval);
                        progressBar.style.width = progress + '%';
                    }, 300);

                    fetch('react_agent.php', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Row-Limit': document.getElementById('rowLimit').value
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            clearInterval(progressInterval);
                            loader.style.display = 'none';
                            progressContainer.style.display = 'none';
                            progressBar.style.width = '0%';

                            // 清空结果区域并初始化DataTable
                            results.innerHTML = '<table id="resultsTable" class="display" style="width:100%"></table>';
                            $('#resultsTable').DataTable({
                                data: data.data,
                                columns: Object.keys(data.data[0]).map((key) => {
                                    if (key === 'Tissue_Name') {
                                        return {
                                            title: 'Detail',
                                            data: 'Tissue_Name',
                                        };
                                    }
                                    return {
                                        title: key,
                                        data: key
                                    };
                                }),
                                searching: true,
                                paging: true,
                                pageLength: 10,
                                lengthMenu: [10, 25, 50, 100],
                                scrollX: true,
                                dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
                                language: {
                                    paginate: {
                                        first: '<i class="ri-skip-back-line">',
                                        previous: '<i class="ri-arrow-left-line">',
                                        next: '<i class="ri-arrow-right-line">',
                                        last: '<i class="ri-skip-forward-line">'
                                    }
                                },
                                columnDefs: [{
                                    "targets": -1,
                                    "data": null,
                                    "render": function(data, type, row) {
                                        var html = '<a target="_blank" href="search/detail_all.php?id=' + row.id + '">more details</a>';
                                        return html;
                                    }
                                }],
                                createdRow: function(row, data, dataIndex) {
                                    $(row).children('td').each((i, e) => {
                                        if (e.innerText === '')
                                            $(e).html('\\');
                                        $(e).attr('title', e.innerText);
                                    });
                                }
                            });
                        })
                        .catch(error => {
                            clearInterval(progressInterval);
                            loader.style.display = 'none';
                            progressContainer.style.display = 'none';
                            progressBar.style.width = '0%';
                            console.log(error);
                        });
                }

                queryForm.addEventListener('submit', query_content);

                document.querySelectorAll('.example-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        document.querySelector('textarea[name="query"]').value = e.target.dataset.query;
                    });
                });

                <?php if (isset($_GET['query'])) { ?>
                    $("#query").val("<?php echo htmlspecialchars($_GET['query'], ENT_QUOTES); ?>");
                    $("#submit").click();
                <?php } ?>
            });
        </script>
    </div>

    <?php include('public/footer.php'); ?>
</body>

</html>