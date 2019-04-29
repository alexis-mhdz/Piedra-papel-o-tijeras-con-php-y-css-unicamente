<?php
    $message = '';
    $state = 'playing';

    if(isset($_POST['submit'])){
        if(!empty($_POST['option'])){
            $option = $_POST['option'];        

            $elements =  array("piedra", "papel", "tijeras");
            $option_bot = array_rand($elements, 1);


            switch ($option) {
                case 'piedra':
                    switch ($elements[$option_bot]) {
                        case 'piedra':
                            $message = 'Empate';
                            break;
                        case 'papel':
                            $message = 'Has perdido';
                            break;
                        case 'tijeras':
                            $message = 'Has ganado';
                            break;
                    }
                    break;               
                
                case 'papel':
                    switch ($elements[$option_bot]) {
                        case 'piedra':
                            $message = 'Has ganado';
                            break;
                        case 'papel':
                            $message = 'Empate';
                            break;
                        case 'tijeras':
                            $message = 'Has perdido';
                            break;
                    }                    
                    break;

                case 'tijeras':
                    switch ($elements[$option_bot]) {
                        case 'piedra':
                            $message = 'Has perdido';
                            break;
                        case 'papel':
                            $message = 'Has ganado';
                            break;
                        case 'tijeras':
                            $message = 'Empate';
                            break;
                    }                    
                    break;
            
            }

            switch ($option) {
                case 'piedra':
                    switch ($elements[$option_bot]) {
                        case 'piedra':
                            $message = 'Empate';
                            break;
                        
                        case 'papel':
                            $message = 'Has perdido';
                            break;
                        case 'tijeras':
                            $message = 'Has ganado';
                            break;
                    }
                    break;
        
                case 'papel':
                    switch ($elements[$option_bot]) {
                        case 'piedra':
                            $message = 'Has ganado';
                            break;
                        
                        case 'papel':
                            $message = 'Empate';
                            break;
                        case 'tijeras':
                            $message = 'Has perdido';
                            break;
                    }
                    break;

                case 'tijeras':
                    switch ($elements[$option_bot]) {
                        case 'piedra':
                            $message = 'Has perdido';
                            break;
                        
                        case 'papel':
                            $message = 'Has ganado';
                            break;
                        case 'tijeras':
                            $message = 'Empate';
                            break;
                    }
                    break;
            }
            
            $state = 'game_over';

        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Piedra, papel o tijeras</title>

    <!-- ESTILOS CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="game">
            <h1>Piedra, papel o tijeras</h1>
            <?php if($state == 'playing') {?>
            <div class="flex">
                <div class="player">
                    <h3>Tú</h3>
                    <form action="index.php" method="post">
                        <input type="radio" name="option" value="piedra">Piedra
                        <input type="radio" name="option" value="papel">Papel
                        <input type="radio" name="option" value="tijeras">Tijeras<br>  
                        <input type="submit" name="submit" value="Seleccionar">
                    </form>
                </div>
                <h3>VS</h3>
                <div>
                    <h3>Oponente</h3>
                    <p>Seleccionando...</p>
                </div>            
            </div>
            <?php } else if($state == 'game_over') { ?>
            <div class="flex">
                <div>
                    <h3>Tú</h3>
                    <p><?php echo $option; ?></p>
                </div>
                <h3>VS</h3>
                <div>
                    <h3>Oponente</h3>
                    <p><?php echo $elements[$option_bot]; ?></p>
                </div>    
            </div>
            <div class="flex">
                <h2><?php echo $message; ?></h2>
                <a href="index.php">Jugar de nuevo</a>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>