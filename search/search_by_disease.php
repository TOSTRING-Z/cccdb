<?php include "../public/public.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
    <style>
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
    </style>
</head>
<body>
<?php
$Species = $_GET['Species3'];
$Phenotype= $_GET['Phenotype'];
function rm_null($item){
    return (!empty($item));
}
$select_type = array_filter([
    empty($Species)?null:"Species='$Species'",
    empty($Phenotype)?null:"Phenotype='$Phenotype'",

],"rm_null");
if (count($select_type)>0)
    $select_type = "where ".join(" and ",$select_type);
else
    $select_type = "";

?>
<div class="container-fluid" id="body">

    <div class="row">
        <div class="col-lg-12">
            <h4>Currently,
                the Species selected by the user is <b><font color="red"><?php echo empty($Species)?"all":$Species?></font></b>,
                the Disease type is <b><font color="red"><?php echo empty($Phenotype)?"all":$Phenotype ?></font></b>,
            </h4>
        </div>
        <div class="col-lg-12">
            <div class="box box-color-1">
                <br>
                <table id="table">
                    <thead>
                    <tr>
                        <th>Cell name1</th>
                        <th>Cell name2</th>
                        <th>Disease</th>

                        <th>Tissue</th>
                        <th>Species</th>
                        <th>PMID</th>
                        <th>Details</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    ini_set("error_reporting", "E_ALL & ~E_NOTICE");
                    include '../public/conn_php.php';
                    $sql = "select * from $main $select_type order by id";
                    $result = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$rows["Cell_Name1"]}</td>";
                        echo "<td>{$rows["Cell_Name2"]}</td>";
                        echo "<td>{$rows["Phenotype"]}</td>";

                        echo "<td>{$rows["Tissue_Name"]}</td>";

                        echo "<td>{$rows["Species"]}</td>";

                        echo "<td><a href=\"https://pubmed.ncbi.nlm.nih.gov/{$rows["PMID"]}\">{$rows["PMID"]}</a></td>";
                        echo "<td><a target='_blank' href='search/detail_cell.php?id={$rows["id"]}'>more details</a></td>";

                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
      

    </div>
</div>

<script>
    $('#table').DataTable({
        dom: '<"row"<"col-sm-6"iB><"col-sm-6"f>>rt<"row"<"col-sm-5"<"dataTables_info"l>><"col-sm-7"<"dataTables_paginate paging_full_numbers"p>>>',
        buttons: [{
            extend: 'csvHtml5',
            text: '<i class="ri-folder-download-line"></i>'
        }],
        order: [[7, "desc"]],

        createdRow: function (row, data, dataIndex) {
            $(row).children('td').each((i, e) => {
                switch (i) {
                    case 3:
                        return;
                    default:
                        break
                }
                if (e.innerText === '')
                    $(e).html('\\');
                $(e).attr('title', e.innerText);
            });
        }
    });
    $(`<i style="font-size: 20px" class="ri-question-line" title="CCCdb display all the entries about the input based on the filter."></i>`).insertBefore('#table_filter > label')

</script>
</body>
</html>


