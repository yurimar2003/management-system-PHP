<?php

class utils
{
    public function validarFormatoFecha($fecha)
    {

        $valores = explode('-', $fecha);

        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0]) && $valores[0] > 1900 && $valores[0] < 2023) {
            return true;
        }
        return false;
    }

    public function validarFormatoFechaHora($fecha)
    {

        $valores = explode('-', $fecha);

        $year = $valores[0];
        $month = $valores[1];
        $dayAndTime = $valores[2];
        $dayAndTime = explode('T', $dayAndTime);
        $day = $dayAndTime[0];
      
        if (count($valores) == 3 && checkdate($month, $day, $year) && $valores[0] > 1900 && $valores[0] < 2023) {
            return true;
        }
        return false;
    }

    public function validarString($string)
    {
        return preg_match("/^[\pL\s]*$/u", $string);
    }

    /*     public function validarFormatoFechaHora($date)
    {
        //Given m/d/Y and returns date if valid, else NULL.
        $d = explode('-', $date);
        if ((isset($d[0]) && isset($d[1]) && isset($d[2])) ? (checkdate($d[1], $d[2], $d[0]) ? $date : NULL) : NULL) {
            return true;
        }
        return false;
    } */
}
