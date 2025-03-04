<?php 
if (isset($_GET['id'])){
    $id_link = $_GET['id'];
}else{
    die("error not found");
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
            <h2 class="card-header">Pesan masuk kamu</h2>
            <div class="card-body">
                <label>SIlahkan bagikan link dibawah ini</label>
                <input class='form-control' value='<?php echo "https://localhost/comment.php?id=$id_link"?>' disabled>
                <br>
                <div id='pesan_masuk' style="overflow-y: scroll; height:400px;"></div>
                <!--<div class="alert alert-primary" role="alert">
                    This is example
                  </div>

-->

            </div>
        </div>
    </div>



        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script>
            $.post("api/get_info.php",{id_link:"<?php echo $id_link?>"},function(result,status){
                const div_pesan = document.getElementById("pesan_masuk");
                if (result.status){
                    div_pesan.innerHTML = "<h2>Data ada</h2>";

                    var proses_update = "";
                    const pesan =result.pesan;


                    pesan.forEach((data_for) => {

                        proses_update = `${proses_update} <div class="alert alert-primary" role="alert">
                        ${data_for.pesan}</div>`;
                });

                    div_pesan.innerHTML = proses_update;
                }else{
                    div_pesan.innerHTML = "<h2>Error Account tidak di ditemukan</h2>";
                }
            },"JSON");

        </script>
    </body>
</html> 