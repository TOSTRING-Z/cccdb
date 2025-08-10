<?php include (__DIR__ . "/public/public.php") ?>
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
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-info a {
            color: #6e8efb;
        }

        .img-rounded {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php include (__DIR__ . "/public/header.php") ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="font-size: 350%;margin-top: 3%">Contact</div>
                <hr />
            </div>
        </div>
        <div class="row" style="height: 60vh;">
            <div class="col-lg-6">
                <p><strong>Principal Investigator:</strong> Chunquan Li, Ph.D.</p>
                <p>The First Affiliated Hospital, University of South China, Hengyang 421001, China</p>
                <p><strong>Email: </strong> lcqbio@163.com</p>
                <hr />
                <p>
                    <font size="3"><strong>We welcome researchers from all over the world to provide valuable advice for
                            CCCdb, and make CCCdb more and more perfect.</strong></font>
                </p>
            </div>
            <div class="col-lg-6">
                <img src="public/img/contact/contact.png" style="height:400px;width:600px;" />
            </div>
        </div>
    </div>
    <?php include "public/footer.php"; ?>
</body>

</html>