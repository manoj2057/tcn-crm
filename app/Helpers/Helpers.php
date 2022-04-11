<?php
namespace App\Helpers;
class Helper{
    public static function IDGenerator($model, $trow, $length, $prefix ){
        $kh_data = $model->orderBy('id', 'DESC')->first();
        if(!$kh_data){
            $kh_length = $length;
            $last_number_length = '';
        } else {
            $code_kh = substr($kh_data->$trow, strlen($prefix) + 1);
            $kh_last_number = ($code_kh/1)*1;
            $increment_last_number = $kh_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $kh_length = $length - $last_number_length;
            $last_number_length = $increment_last_number;
        }
        $khmer = "";
        for ($i=0; $i < $kh_length; $i++){
            $khmer .= "0";
        }
        return $prefix.'-'.$khmer.$last_number_length;
    }
}
