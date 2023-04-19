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
    <?php
        require_once __DIR__ . './functions.php';

        if(isset($_GET['password'])){
            $lunghezzaPassword = $_GET['password'];
        }

        $letter='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $number='0123456789';
        $symbol='._/?!£$&';

        $allCharacter= $letter . $number . $symbol;
        $arrayAllCharacter=str_split($allCharacter);

        session_start();
        if (isset($lunghezzaPassword)) {
            $_SESSION['newPassword'] = $newPassword = createPassword($arrayAllCharacter,$lunghezzaPassword);
            
        }
    
    ?>
    <div>
        <?php
            if(isset($newPassword)){
                header('Location: ./success.php');
            }
        ?>
    </div>
    <div class="mx-auto my-5 w-50 text-center">
        <h1>Strong Password Generator</h1>
        <h2>Genera una password sicura</h2>
    </div>

    <form action="index.php" method="GET"  class="mx-auto my-3 w-50 text-center">
        <label for="password">Lunghezza Password:</label>
        <input type="number" id="password" name="password">
        <div><button class="btn btn-primary my-5">Genera Password</button></div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</body>
</html>