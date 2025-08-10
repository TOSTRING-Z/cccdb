<?php include("public.php") ?>
<?php include("link.php") ?>

<script>
    $(function () { $("[data-bs-toggle='tooltip']").tooltip(); });
    /**
     * archimedeanSpiral - Gives a set of cordinates for an Archimedian Spiral.
     *
     * @param {number} t How far along the spiral we have traversed.
     * @return {object} Resulting coordinates, x and y.
     */
    var archimedeanSpiral = function archimedeanSpiral(t) {
        t *= 0.1;
        return {
            x: t * Math.cos(t),
            y: t * Math.sin(t)
        };
    };
    Highcharts.seriesTypes.wordcloud.prototype.spirals.archimedean = archimedeanSpiral;
</script>
<style>
    /* 扁平化导航栏样式 */
    .navbar {
        background: #ffffff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .nav-link {
        position: relative;
    }
    
    .nav-link:hover::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 15%;
        width: 70%;
        height: 2px;
        background: #6e8efb;
        transition: all 0.3s;
    }
    
    .navbar-brand {
        font-weight: bold;
        color: #6e8efb !important;
        font-size: 22px;
    }
    @keyframes gradient {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
    </style>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" role="navigation">
        <div class="container">
            <div class="d-flex">
                <a class="navbar-brand me-auto" href="/cccdb/index.php" style="display: flex; align-items: center; gap: 8px; font-size: 28px;">
                    <i class="ri-database-2-fill" style="background: linear-gradient(90deg, #6c5ce7, #00cec9, #a29bfe, #6c5ce7, #00cec9, #a29bfe); -webkit-background-clip: text; -webkit-text-fill-color: transparent; animation: gradient 6s linear infinite; background-size: 300% 100%; font-size: 1.2em; animation-iteration-count: infinite;"></i>
                    <span style="color: #F5DE34">CCCdb</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#example-navbar-collapse" aria-controls="example-navbar-collapse"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div>
                <ul id="example-navbar-collapse" class="navbar-nav me-auto mb-2 mb-lg-0 navbar-collapse justify-content-end collapse">
                    <li class="nav-item"><a class="nav-link" href="/cccdb/index.php"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/browse.php"><i class="fas fa-list me-1"></i>Browse</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/search.php"><i class="fas fa-search me-1"></i>Search</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/analysis.php"><i class="fas fa-robot me-1"></i>Analysis</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/statistics.php"><i class="fas fa-chart-bar me-1"></i>Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/submit.php"><i class="fas fa-upload me-1"></i>Submit</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/download.php"><i class="fas fa-download me-1"></i>Download</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cccdb/contact.php"><i class="fas fa-envelope me-1"></i>Contact</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="/cccdb/help.php"><i class="fas fa-question-circle me-1"></i>Help</a></li> -->
                </ul>
            </div>
        </div>

    </nav>
</header>
