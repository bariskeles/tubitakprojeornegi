<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"  crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justifty-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4> Kazanım Girişi</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button   button type="submit" class="btn btn-primary"> Bul </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php 
                                        $baglan= mysqli_connect("localhost", "root", "", "kazanimlar");

                                        if(isset($_GET['id']))
                                        {
                                            $id= $_GET['id'];

                                            $sorgu= "SELECT * FROM kazanim WHERE id='$id' ";
                                            $sorgu_calistir = mysqli_query($baglan, $sorgu);

                                            if(mysqli_num_rows($sorgu_calistir)> 0)
                                            {
                                                foreach ($sorgu_calistir as $row)
                                                {
                                                    //echo $row['dersadi'];
                                                    ?>
                                                                
                                                                <div class="form-group mb-3">
                                                                    <label for="">Ders Adı</label>
                                                                    <input type="text" value=" <?= $row['dersadi']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="">Ünite Adı</label>
                                                                    <input type="text" value=" <?= $row['uniteadi']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="">Kazanım İçeriği</label>
                                                                    <input type="text" value=" <?= $row['kazanimno']; ?>" class="form-control">
                                                                </div>

                                                    <?php
                                                }
                                            }
                                                else
                                                {
                                                    echo "Kayıtlı ders yok";
                                                }

                                        }
                                        
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
