<?php
    declare(strict_types=1);

    namespace Classes;

    class Misc{
        public function importFile(string $csv): Array{
            //Array vacío que será rellenado con arrays con el id, el nombre y el estado de cada agente del csv
            include($csv);
            $list = [];
            $file = fopen($csv, "r");
            //De cada línea hago un array con los campos separados
            while($line = fgets($file)){
                //Con str_getcsv obtengo un array con los campos separados por la coma, sin tener en cuenta las comas que están dentro de las comillas
                $list[] = str_getcsv($line);
            }

            fclose($file);
            
            return $list;
        }
    }

?>
