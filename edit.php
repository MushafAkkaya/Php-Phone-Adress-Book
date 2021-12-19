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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

        $selectOne = "SELECT * FROM defter WHERE id =".(int)$_GET['id'];
        $selectedOne = mysqli_query($connect,$selectOne);

        $resultOne = $selectedOne -> fetch_assoc();

    ?>

    <div class = "container">
        <div class = "col-md-12 d-flex justify-content-center">
            <div class = "col-md-6 my-3 d-flex justify-content-center">
                <h3 class = "">Düzenle</h3>
            </div>
        </div>
        <div class = "col-md-12 d-flex justify-content-center">
            <form method = "post" action = "">
                <table class = "table">
                    <tr>
                        <td>Ad Soyad</td>
                        <td><input type = "text" name = "ad_soyad" class = "form-control"
                                value = "<?php echo $resultOne['ad_soyad']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Ev Telefonu</td>
                        <td><input type = "text" name = "ev_telefon" class = "form-control"
                                value = "<?php echo $resultOne['ev_telefon']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Cep Telefon</td>
                        <td><input type = "text" name = "cep_telefon" class = "form-control"
                                value = "<?php echo $resultOne['cep_telefon']; ?>"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type = "text" name = "e_mail" class = "form-control"
                                value = "<?php echo $resultOne['e_mail']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type = "submit" value = "Düzenle" class = "btn btn-warning"></td>
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
                $update = "UPDATE defter SET ad_soyad = '$ad_soyad', ev_telefon = '$ev_telefon', cep_telefon = '$cep_telefon', e_mail = '$e_mail' WHERE id =".$_GET['id'];
                $updated = mysqli_query($connect,$update);

                if($updated) {
                    header("location:main.php");
                }
                else {
                    echo "Beklenmedik bir hata meydana geldi!";
                }
            }
        }

    ?>

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