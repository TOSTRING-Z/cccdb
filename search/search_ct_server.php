<?php
$Species = isset($_POST['Species']) ? $_POST['Species'] : '';
$Communication_Type = isset($_POST['Communication_Type']) ? $_POST['Communication_Type'] : '';
$input_sel = isset($_GET['input_sel']) ? $_GET['input_sel'] : '';
$selects = array();
if(!empty($Species))
    $selects[] = "Species='$Species'";
if(!empty($Communication_Type))
    $selects[] = "Communication_Type='$Communication_Type'";
if(!empty($Receptor))
    $selects[] = "ProteinB='$Receptor'";

if(count($selects)>0)
    $select = " where ".join(" and ",$selects);
else
    $select = "";
include '../public/conn_php.php';
$search="SELECT * from (SELECT distinct $input_sel
                from cccdb.main
                 $select limit 100) t
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