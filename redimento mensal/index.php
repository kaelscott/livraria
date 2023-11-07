<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    /*
        echo "oi <br>";
        $nome = "kael";
        echo "oi $nome <br>";

        if(isset($nome2)) {
            echo "oi $nome2 <br>";
        } else {
            echo "variavel nao definida <br>";
        }

        define ("MY_CONST", 10);
        if(defined("MY_CONST")) {
            echo "const = " . MY_CONST . "<br>";
        } else {
            echo "constante nao existe <br>";
        }
    */

        function calcularBaseCalculo ($rendimentoMensal, $numDependentes, $pensaoAlimenticia, $outrasDeducoes, $deducaoPorDependente) {
            $baseCalculo = $rendimentoMensal - (($deducaoPorDependente * $numDependentes) + $pensaoAlimenticia + $outrasDeducoes);
            return $baseCalculo;
        }

        function calcularImposto ($baseCalculo) {
            $faixas = [1000, 2000, 3000, 4000];

            for($i = 0; $i < count($faixas); $i++){
                if ($baseCalculo <= $faixas[$i]) {

                }
            }
        }

        $baseCalculo = calcularBaseCalculo(5000, 2, 1000, 500, 300);
        echo $baseCalculo;




    ?>

</body>
</html>