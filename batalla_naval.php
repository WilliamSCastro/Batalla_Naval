<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla_Naval</title>
</head>
<body>

    <table style='border: 1px solid black; border-collapse: collapse;'>
        <?php

            // generador matriz
            $n = 9; // columnas
            $gameTable = [];
            for($i=0;$i<$n;$i++) {
                for($j=0;$j<$n;$j++) {
                    $gameTable[$i][$j] = "^^^";
                }
            }

            /*
            ob_start();
            var_dump($gameTable);
            $output = ob_get_clean();
            echo '<p>' . htmlspecialchars($output) . '</p>';
            */

            $battleshipsToGenerate = [4, 3, 3, 2, 2, 2, 1, 1, 1, 1];
            foreach ($battleshipsToGenerate as $battleshipSpaces) {
                
                //
                echo "<p>Tamaño del barco = $battleshipSpaces</p>";
                // 

                $isPlaced = false;
                while (!$isPlaced) {
                    
                    echo "<h1>INICIO DE CREACION DE NUEVO BARCO</h1>";

                    $isValidPosition = true;
                    
                    $positionX = rand(0, $n-1);
                    $positionY = rand(0, $n-1);

                    $isHorizontal = rand(0,1);

                    //
                    if ($isHorizontal == 1) {
                        //
                        echo "<p>Es horizontal = $isHorizontal</p>";
                        echo "<br>";
                        //
                    } else {
                        //
                        echo "<p>Es vertical = $isHorizontal</p>";
                        echo "<br>";
                        //
                    }
                    //

                    for($i = 0; $i < $battleshipSpaces; $i++) {
                        echo "<p>ITERATION = ".$i."</p>";
                        
                        echo "<br>";
                        echo "<p>Position X = ".$positionX."</p>";
                        echo "<p>Position Y = ".$positionY."</p>";

                        // COMPRUEBO SI ESTA FUERA DE LOS LIMITES
                        if ($isValidPosition){
                            if ($positionX < 0 || $positionX > $n-1 || $positionY < 0 || $positionY > $n-1 ){
                                $isValidPosition = false;
                                echo "<br>";
                                echo "<p>SOBREPASA LOS LÍMITES</p>";
                            }
                        }
                        
                        // COMPROBACIÓN DE ALREDEDORES
                        if($isValidPosition){
                            // se puede hacer array aqui y comprobar uno a uno después fuera del if de posiciones
                            $surroindings = [];

                            if ($positionX == 0 && $positionY == 0){

                                $surroindings[] = $gameTable[$positionX][$positionY+1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY];
                                $surroindings[] = $gameTable[$positionX+1][$positionY+1];

                                echo "<p>CHECKED</p>";
                                echo "<p>DERECHA = ". $gameTable[$positionX][$positionY+1]."</p>";
                                echo "<p>ABAJO = ". $gameTable[$positionX+1][$positionY]."</p>";
                                echo "<p>ABAJO DERECHA = ". $gameTable[$positionX+1][$positionY+1]."</p>";
                                
                                /*
                                $gameTable[$positionX][$positionY+1] = "C";
                                $gameTable[$positionX+1][$positionY] = "C";
                                $gameTable[$positionX+1][$positionY+1] = "C";
                                */
                            } elseif ($positionX == 0 && $positionY == $n-1) {

                                $surroindings[] = $gameTable[$positionX+1][$positionY];
                                $surroindings[] = $gameTable[$positionX][$positionY-1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY-1];

                                echo "<p>CHECKED</p>";
                                echo "<p>ABAJO = ". $gameTable[$positionX+1][$positionY]."</p>";
                                echo "<p>IZQUIERDA = ". $gameTable[$positionX][$positionY-1]."</p>";
                                echo "<p>ABAJO IZQUIERDA = ". $gameTable[$positionX+1][$positionY-1]."</p>";
                                /*
                                $gameTable[$positionX][$positionY-1] = "C";
                                $gameTable[$positionX+1][$positionY-1] = "C";
                                $gameTable[$positionX+1][$positionY] = "C";
                                */
                                
                            } elseif ($positionX == $n-1 && $positionY == 0) {

                                $surroindings[] = $gameTable[$positionX-1][$positionY];
                                $surroindings[] = $gameTable[$positionX-1][$positionY+1];
                                $surroindings[] = $gameTable[$positionX][$positionY+1];

                                echo "<p>CHECKED</p>";
                                echo "<p>ARRIBA = ". $gameTable[$positionX-1][$positionY]."</p>";
                                echo "<p>ARRIBA DERECHA = ". $gameTable[$positionX-1][$positionY+1]."</p>";
                                echo "<p>DERECHA = ". $gameTable[$positionX][$positionY+1]."</p>";
                                /*
                                $gameTable[$positionX-1][$positionY] = "C";
                                $gameTable[$positionX-1][$positionY+1] = "C";
                                $gameTable[$positionX][$positionY+1] = "C";
                                */

                            } elseif ($positionX == $n-1 && $positionY == $n-1) {

                                $surroindings[] = $gameTable[$positionX-1][$positionY];
                                $surroindings[] = $gameTable[$positionX-1][$positionY-1];
                                $surroindings[] = $gameTable[$positionX][$positionY-1];

                                echo "<p>CHECKED</p>";
                                echo "<p>ARRIBA = ". $gameTable[$positionX-1][$positionY]."</p>";
                                echo "<p>ARRIBA IZQUIERDA = ". $gameTable[$positionX-1][$positionY-1]."</p>";
                                echo "<p>IZQUIERDA = ". $gameTable[$positionX][$positionY-1]."</p>";
                                /*
                                $gameTable[$positionX-1][$positionY] = "C";
                                $gameTable[$positionX-1][$positionY-1] = "C";
                                $gameTable[$positionX][$positionY-1] = "C";
                                */
                            } elseif ($positionX == 0) {

                                $surroindings[] = $gameTable[$positionX][$positionY+1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY];
                                $surroindings[] = $gameTable[$positionX+1][$positionY+1];
                                $surroindings[] = $gameTable[$positionX][$positionY-1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY-1];

                                echo "<p>CHECKED</p>";
                                echo "<p>DERECHA = ". $gameTable[$positionX][$positionY+1]."</p>";
                                echo "<p>ABAJO = ". $gameTable[$positionX+1][$positionY]."</p>";
                                echo "<p>ABAJO DERECHA = ". $gameTable[$positionX+1][$positionY+1]."</p>";
                                echo "<p>IZQUIERDA = ". $gameTable[$positionX][$positionY-1]."</p>";
                                echo "<p>ABAJO IZQUIERDA = ". $gameTable[$positionX+1][$positionY-1]."</p>";
                                /*
                                $gameTable[$positionX][$positionY+1] = "C";
                                $gameTable[$positionX+1][$positionY] = "C";
                                $gameTable[$positionX+1][$positionY+1] = "C";
                                $gameTable[$positionX][$positionY-1] = "C";
                                $gameTable[$positionX+1][$positionY-1] = "C";
                                */
                            } elseif ($positionX == $n-1) {

                                $surroindings[] = $gameTable[$positionX-1][$positionY];
                                $surroindings[] = $gameTable[$positionX-1][$positionY-1];
                                $surroindings[] = $gameTable[$positionX][$positionY-1];
                                $surroindings[] = $gameTable[$positionX-1][$positionY+1];
                                $surroindings[] = $gameTable[$positionX][$positionY+1];

                                echo "<p>CHECKED</p>";
                                echo "<p>ARRIBA = ". $gameTable[$positionX-1][$positionY]."</p>";
                                echo "<p>ARRIBA IZQUIERDA = ". $gameTable[$positionX-1][$positionY-1]."</p>";
                                echo "<p>IZQUIERDA = ". $gameTable[$positionX][$positionY-1]."</p>";
                                echo "<p>ARRIBA DERECHA = ". $gameTable[$positionX-1][$positionY+1]."</p>";
                                echo "<p>DERECHA = ". $gameTable[$positionX][$positionY+1]."</p>";
                                /*
                                $gameTable[$positionX-1][$positionY] = "C";
                                $gameTable[$positionX-1][$positionY-1] = "C";
                                $gameTable[$positionX-1][$positionY+1] = "C";
                                $gameTable[$positionX][$positionY-1] = "C";
                                $gameTable[$positionX][$positionY+1] = "C";
                                */

                            } elseif ($positionY == 0) {

                                $surroindings[] = $gameTable[$positionX-1][$positionY];
                                $surroindings[] = $gameTable[$positionX-1][$positionY+1];
                                $surroindings[] = $gameTable[$positionX][$positionY+1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY];
                                $surroindings[] = $gameTable[$positionX+1][$positionY+1];

                                echo "<p>CHECKED</p>";
                                echo "<p>ARRIBA = ". $gameTable[$positionX-1][$positionY]."</p>";
                                echo "<p>ARRIBA DERECHA = ". $gameTable[$positionX-1][$positionY+1]."</p>";
                                echo "<p>DERECHA = ". $gameTable[$positionX][$positionY+1]."</p>";
                                echo "<p>ABAJO = ". $gameTable[$positionX+1][$positionY]."</p>";
                                echo "<p>ABAJO DERECHA = ". $gameTable[$positionX+1][$positionY+1]."</p>";
                                /*
                                $gameTable[$positionX-1][$positionY] = "C";
                                $gameTable[$positionX-1][$positionY+1] = "C";
                                $gameTable[$positionX][$positionY+1] = "C";
                                $gameTable[$positionX+1][$positionY] = "C";
                                $gameTable[$positionX+1][$positionY+1] = "C";
                                */      
                            } elseif ($positionY == $n-1) {

                                $surroindings[] = $gameTable[$positionX-1][$positionY];
                                $surroindings[] = $gameTable[$positionX-1][$positionY-1];
                                $surroindings[] = $gameTable[$positionX][$positionY-1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY-1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY];

                                echo "<p>CHECKED</p>";
                                echo "<p>ARRIBA = ". $gameTable[$positionX-1][$positionY]."</p>";
                                echo "<p>ARRIBA IZQUIERDA = ". $gameTable[$positionX-1][$positionY-1]."</p>";
                                echo "<p>IZQUIERDA = ". $gameTable[$positionX][$positionY-1]."</p>";
                                echo "<p>ABAJO IZQUIERDA = ". $gameTable[$positionX+1][$positionY-1]."</p>";
                                echo "<p>ABAJO = ". $gameTable[$positionX+1][$positionY]."</p>";
                                /*
                                $gameTable[$positionX-1][$positionY] = "C";
                                $gameTable[$positionX-1][$positionY-1] = "C";
                                $gameTable[$positionX][$positionY-1] = "C";
                                $gameTable[$positionX+1][$positionY-1] = "C";
                                $gameTable[$positionX+1][$positionY] = "C";
                                */
                            } else {

                                $surroindings[] = $gameTable[$positionX-1][$positionY];
                                $surroindings[] = $gameTable[$positionX+1][$positionY];
                                $surroindings[] = $gameTable[$positionX][$positionY-1];
                                $surroindings[] = $gameTable[$positionX][$positionY+1];
                                $surroindings[] = $gameTable[$positionX-1][$positionY-1];
                                $surroindings[] = $gameTable[$positionX-1][$positionY+1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY-1];
                                $surroindings[] = $gameTable[$positionX+1][$positionY+1];


                                echo "<p>CENTERED POSITION</p>";
                                echo "<p>CHECKED</p>";
                                echo "<p>ARRIBA = ". $gameTable[$positionX-1][$positionY]."</p>";
                                echo "<p>ABAJO = ". $gameTable[$positionX+1][$positionY]."</p>";
                                echo "<p>IZQUIERDA = ". $gameTable[$positionX][$positionY-1]."</p>";
                                echo "<p>DERECHA = ". $gameTable[$positionX][$positionY+1]."</p>";
                                echo "<p>ARRIBA IZQUIERDA = ". $gameTable[$positionX-1][$positionY-1]."</p>";
                                echo "<p>ARRIBA DERECHA = ". $gameTable[$positionX-1][$positionY+1]."</p>";
                                echo "<p>ABAJO IZQUIERDA = ". $gameTable[$positionX+1][$positionY-1]."</p>";
                                echo "<p>ABAJO DERECHA = ". $gameTable[$positionX+1][$positionY+1]."</p>";
                                /*
                                $gameTable[$positionX-1][$positionY] = "C";
                                $gameTable[$positionX+1][$positionY] = "C";
                                $gameTable[$positionX][$positionY-1] = "C";
                                $gameTable[$positionX][$positionY+1] = "C";
                                $gameTable[$positionX-1][$positionY-1] = "C";
                                $gameTable[$positionX-1][$positionY+1] = "C";
                                $gameTable[$positionX+1][$positionY-1] = "C";
                                $gameTable[$positionX+1][$positionY+1] = "C"; 
                                */
                            }

                            for ($j = 0; $j < count($surroindings); $j++) {
                                echo $surroindings[$j]." "; 
                                if ($surroindings[$j] != "^^^"){
                                    echo "<h3>HAY DIFERENCIAS</h3>";
                                    $isValidPosition = false;
                                }
                            }
                        }

                        if ($isValidPosition){
                            echo "<br>";
                            echo "SE ESTÁ SUMANDO UNA POSICIÓN";
                            if ($isHorizontal == 1) {
                                $positionY += 1;
                            } else {
                                $positionX += 1;
                            }
                        }

                        echo "<br>";
                        echo "posicion válida = ".$isValidPosition;

                        if (!$isValidPosition){
                            echo "<p>SE TERMINA LA EJECUCIÓN POR POSICIÓN INVÁLIDA</p>";
                            break;
                        }
      
                    }
                    
                    if ($isValidPosition){
                        
                        if ($isHorizontal == 1){
                            $positionY -= 1;

                            // aqui se puede crear array de barcos creados con sus posiciones y tocado/hundido para llevar control

                            for($i = 0; $i < $battleshipSpaces; $i++){
                                echo "<p>POSITION X = ".$positionX." / Position Y = ".$positionY-$i."</p>";
                                $gameTable[$positionX][$positionY - $i] = "O";
                            }
                            echo "<h2>BARCO COLOCADO DE MANERA HORIZONTAL</h2>";
                        } else {
                            $positionX -= 1;
                            for($i = 0; $i < $battleshipSpaces; $i++){
                                echo "<p>POSITION X = ".$positionX-$i." / Position Y = ".$positionY."</p>";
                                $gameTable[$positionX - $i][$positionY] = "O";
                            }
                            echo "<h2>BARCO COLOCADO DE MANERA VERTICAL</h2>";
                        }
                        $isPlaced = true;

                    }
                }
               
        
            }

            for($i=0;$i<$n;$i++) {
                echo "<tr>";
                for($j=0;$j<$n;$j++) {
                    echo "<td style='border: 1px solid black; border-collapse: collapse; padding: 15px;'>".$gameTable[$i][$j]."</td>";
                }
                echo "</tr>";
            }

            /*
            for($i=0;$i<=$n;$i++) {
                echo "<tr>";
                    for($j=0;$j<=$n;$j++) {
                        if ($i === 0 && $j > 0) {
                            echo "<td style='border: 1px solid black; border-collapse: collapse; padding: 15px;'> $j </td>";
                        } elseif ($j == 0 && $i > 0) {
                            echo "<td style='border: 1px solid black; border-collapse: collapse; padding: 15px;'>".chr($i+64)."</td>";
                        } else {
                            echo "<td style='border: 1px solid black; border-collapse: collapse; padding: 15px;'></td>";
                        }
                    } 
                    
                    // Si i = 0 and j < 0 ---> números
                    // Si j = 0 and i < 0 ---> letras

                echo "</tr>";
            }
            */

        ?>
    </table>

</body>
</html>