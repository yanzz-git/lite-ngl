<?php 
header("Content-Type: application/json");

if (isset($_POST['nama'])){

    $nama_orang = $_POST['nama'];

    $database = file_get_contents("database/data.txt");
    $json_obj = json_decode($database);

    $uniq_id = uniqid();

    $json_obj->$uniq_id = ["nama" => "$nama_orang", "pesan" => null];

    file_put_contents("database/data.txt", json_encode($json_obj, JSON_PRETTY_PRINT));

    echo json_encode(["status"=>true,"nama"=>"$nama_orang","id_link"=>"$uniq_id"]);


}else{
    echo json_encode(["status"=>false]);
}

?>