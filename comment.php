<?php 


if (isset($_GET['id'])){

    $id_link = $_GET['id'];

    $database = file_get_contents("./api/database/data.txt");
    $json_obj = json_decode($database);
    if (isset($json_obj->$id_link)){
        $json_obj->$id_link->status = true;
        $data_pesan_fix = [];
        if ($json_obj->$id_link->pesan == null){
            $json_obj->$id_link->pesan = [];
        }
        foreach($json_obj->$id_link->pesan as $data_pesan){
            $data_pesan_fix[] = $data_pesan;
        }
        $json_obj->$id_link->pesan = $data_pesan_fix;
        $json_data = $json_obj->$id_link;
    }else{
        die("Not found");
    }

}else{
    die("Not found");
}

?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>



    <div class="container" style="max-width: 600px;">
        <br>
        <div class="card">
            <h2 class="card-header">Silahkan komentar untuk <?php echo $json_data->nama?></h2>
            <div class="card-body">
                <ul>
                    <li>Si <?php echo $json_data->nama?> tidak akan tau siapa pengirimnya</li>
                    <li>Kirim pesan mu ke <?php echo $json_data->nama?> dengan aman</li>
                    <li>Ayo bersenang senang dengan <?php echo $json_data->nama?></li>
                    </ul>
                <input id="pesan" class="form-control" placeholder="Masukkan apa yang kamu pikirkan tentang <?php echo $json_data->nama?>">
                <br>
                <button onclick="kirim_pesan()" class="btn btn-primary">Kirim pesan</button>
            </div>
        </div>
    </div>





        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function kirim_pesan(){

                const pesan = document.getElementById("pesan").value;
                $.post("api/komen.php",{id_link:"<?php echo $id_link?>",pesan:pesan},function(result,status){
                    if (result.status){
                        Swal.fire({text:"Berhasil kirim pesan",icon:"success"});
                    }else{
                        Swal.fire({text:"Gagal kirim pesan",icon:"error"});
                    }
                },"JSON");
            }
        </script>
    </body>
</html>