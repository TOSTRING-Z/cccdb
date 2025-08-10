<?php
$Species = isset($_POST['Species2']) ? $_POST['Species2'] : '';
$Tissue_Name = isset($_POST['Tissue_Name']) ? $_POST['Tissue_Name'] : '';
$input_sel = isset($_GET['input_sel']) ? $_GET['input_sel'] : '';
$selects = array();
$data = array();
if(!empty($Species))
    $selects[] = "Species='$Species'";
if(!empty($Tissue_Name))
    $selects[] = "Tissue_Name='$Tissue_Name'";

if(count($selects)>0)
    $select = " where ".join(" and ",$selects);
else
    $select = "";
include '../public/conn_php.php';
$search="SELECT distinct $input_sel
                from cccdb.main
                 $select
                 order by $input_sel";
$search_result=mysqli_query($conn,$search);
while($row = mysqli_fetch_assoc($search_result)){
    $data[] = array(
        "label" => $row[$input_sel]
    );
}
//echo $search;
echo json_encode($data);
?>