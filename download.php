<?php include(__DIR__ . "/public/public.php");
ini_set("error_reporting", "E_ALL & ~E_NOTICE"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCCdb</title>
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

        .container {
            padding-top: 20px;
        }

        .panel {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            border: none;
        }

        .panel-heading {
            background: linear-gradient(135deg, rgba(110, 142, 251, 0.1), rgba(167, 119, 227, 0.1));
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
            border-bottom: none;
        }

        .panel-heading h3 {
            color: var(--primary-color);
            margin: 0;
        }

        .panel-body {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(110, 142, 251, 0.1);
        }

        .table th {
            color: var(--primary-color);
            font-weight: 600;
            text-align: left;
        }

        .table tr:hover td {
            background-color: rgba(110, 142, 251, 0.05);
        }

        a {
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--accent-color);
            text-decoration: none;
        }

        .ri-download-2-line {
            font-size: 20px;
        }

        hr {
            border-top: 1px solid rgba(110, 142, 251, 0.2);
        }

        .panel-heading h3 {
            color: white;
            margin: 0;
        }

        .h-flex {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php include(__DIR__ . "/public/header.php") ?>
    <div class="container" id="body">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Download</b></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="h-flex">
                            <i class="ri-file-download-line"></i>
                            <span>Download Cell-Cell Communication Information Organized into Four Modes</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table id="downloadTable" class="table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Direct Contact</td>
                                    <td><a href="public/download/Cell to cell communications by Autocrine.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Autocrine</td>
                                    <td><a href="public/download/Cell to cell communications by Autocrine.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Paracrine</td>
                                    <td><a href="public/download/Cell to cell communications by Paracrine.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Endocrine</td>
                                    <td><a href="public/download/Cell to cell communications by Endocrine.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="h-flex">
                            <i class="ri-file-download-line"></i>
                            <span>Download All Cell-Cell Communication Information</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table id="downloadTable" class="table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>All</td>
                                    <td><a href="public/download/All cell to cell communication in Human and Mouse.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Human</td>
                                    <td><a href="public/download/All cell to cell communications in Human.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Mouse</td>
                                    <td><a href="public/download/All cell to cell communication in Mouse.xlsx" target="_blank"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "public/footer.php"; ?>
</body>

</html>