<?php
        require_once __DIR__ . './functions.php';

        if(isset($_GET['passLang'])){
            $lunghezzaPassword = $_GET['passLang'];
        }

        $letter='abcdefghijklmnopqrstuvwxyz';
        $capitalLetter='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $number='0123456789';
        $symbol='._/?!£$&';

        if(!isset($_GET['Lettere'])){
            $letter = '';
            $capitalLetter = '';
        }

        if(!isset($_GET['Numeri'])){
            $number = '';
        }

        if(!isset($_GET['Simboli'])){
            $symbol = '';
        }

        $allCharacter= $letter . $number . $symbol . $capitalLetter;
        $arrayAllCharacter=str_split($allCharacter);


        session_start();
        if (isset($lunghezzaPassword) && $lunghezzaPassword>5) {
            $_SESSION['newPassword'] = $newPassword = createPassword($arrayAllCharacter,$lunghezzaPassword);
        }
        if(isset($newPassword)){
            header('Location: ./success.php');
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Password Generator</title>
    
</head>
<body>
    <main>
        <h3 id="title">Strong password generator</h3>
        <div id="control">
            <?php
                $lunghezzaPassword="";
                if($lunghezzaPassword<=8 && $lunghezzaPassword>0){
                    ?><h3 id="alert">La password deve essere maggiore di 8!</h3><?php
                }
            ?>
        </div>
        <form action="index.php" method="GET">
            <div class="box">
                <label for="passLang">Lunghezza Password:</label>
                <input type="number" id="passLang" name="passLang">
            </div>
            <div class="box">
                <p>Consenti ripetizioni di uno o più caratteri:</p>
                    <input type="radio" id="Si" name="Repeate" value="Si" checked>
                    <label for="Si" >Si</label><br>
                    <input type="radio" id="No" name="Repeate" value="No">
                    <label for="No">No</label><br>  
            </div>
            <div class="box">
                <p>Caratteri che puoi includere:</p>
                    <input type="checkbox" id="Lettere" name="Lettere" value="Lettere" checked>
                    <label for="Lettere"> Lettere</label><br>
                    <input type="checkbox" id="Numeri" name="Numeri" value="Numeri" checked>
                    <label for="Numeri"> Numeri</label><br>
                    <input type="checkbox" id="Simboli" name="Simboli" value="Simboli" checked>
                    <label for="Simboli"> Simboli</label><br>
            </div>
            <button>Crea Password</button>
        </form>
    </main>
</body>
</html>