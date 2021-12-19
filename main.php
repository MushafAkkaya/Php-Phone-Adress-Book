<?php

include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class = "container">
        <div class = "col-md-12 d-flex justify-content-center">
            <div class = "col-md-6 my-3 d-flex justify-content-center">
                <h3 class = "">Telefon Rehberi</h3>
            </div>
        </div>
        <div class = "col-md-12 d-flex justify-content-center">
            <div class = "col-md-6">
                <form method = "post" action = "">
                    <table class = "table">
                        <tr>
                            <td>Ad Soyad</td>
                            <td><input placeholder = "Zorunlu Alan" type = "text" name = "ad_soyad" class = "form-control"></td>
                        </tr>
                        <tr>
                            <td>Ev Telefonu</td>
                            <td><input type = "text" name = "ev_telefon" class = "form-control"></td>
                        </tr>
                        <tr>
                            <td>Cep Telefon</td>
                            <td><input placeholder = "Zorunlu Alan" type = "text" name = "cep_telefon" class = "form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input type = "text" name = "e_mail" class = "form-control"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type = "submit" value = "Ekle" class = "btn btn-success"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php

                if($_POST) {
                    $ad_soyad = $_POST['ad_soyad'];
                    $ev_telefon = $_POST['ev_telefon'];
                    $cep_telefon = $_POST['cep_telefon'];
                    $e_mail = $_POST['e_mail'];

                    if($ad_soyad <> "" && $cep_telefon <> "") {
                        $add = "INSERT INTO defter (ad_soyad, ev_telefon, cep_telefon, e_mail) VALUES ('$ad_soyad','$ev_telefon','$cep_telefon','$e_mail')";
                        $added = mysqli_query($connect,$add);
                    
                        if($added) {
                            echo "Veritabanına eklendi";
                        }
                        else {
                            echo "Ekleme yapılamadı";
                        }
                    }
                }

            ?>

        <div class = "col-md-12 opacity-100">
            <table class = "table table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Ad Soyad</th>
                    <th>Ev Telefonu</th>
                    <th>Cep Telefonu</th>
                    <th>E-mail</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php

                    $select = "SELECT * FROM defter";
                    $selected = mysqli_query($connect,$select);

                    while($result = $selected -> fetch_assoc()) {
                        $id = $result['id'];
                        $ad_soyad = $result['ad_soyad'];
                        $ev_telefon = $result['ev_telefon'];
                        $cep_telefon = $result['cep_telefon'];
                        $e_mail = $result['e_mail'];
                    

                ?>

                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $ad_soyad; ?></td>
                    <td><?php echo $ev_telefon; ?></td>
                    <td><?php echo $cep_telefon; ?></td>
                    <td><?php echo $e_mail; ?></td>
                    <td><a href = "edit.php?id=<?php echo $id; ?>"><i class = "fas fa-edit"></i></a></td>
                    <td><a href = "delete.php?id=<?php echo $id; ?>"><i class = "fas fa-times"></i></a></td>

                </tr>

                <?php 
                    }
                ?>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>