<?php
namespace app\helpme;

class MyDate {
    /**
     * to return string date from a format to other given format
     * @param <type> $from = dmy / mdy /ymd
     * @param <type> $to = dmy / mdy /ymd
     * @param <type> $val
     * @param <string> $marker either - or /
     * @return <type>
     */

    public static function dateFormat($from='dmy', $to='ymd', $val='', $marker='-') {
        if ($from == '' || $to == '' || $val == '' || $val == '0000-00-00')
            return '';

        if ($from == 'dmy') {
            $day   = substr($val,0,2);
            $month = substr($val,3,2);
            $year  = substr($val,6,4);
        } else if ($from == 'mdy') {
            $month = substr($val,0,2);
            $day   = substr($val,3,2);
            $year  = substr($val,6,4);
        } else if ($from == 'ymd') {
            $year  = substr($val,0,4);
            $month = substr($val,5,2);
            $day   = substr($val,8,2);
        }

        if ($to == 'dmy')
            return $day.$marker.$month.$marker.$year;
        else if ($to == 'ymd')
            return $year.$marker.$month.$marker.$day;
        else if ($to == 'mdy')
            return $month.$marker.$day.$marker.$year;
    }
    
    public static function monthList() {
        $month = array(
            '0'  => '--Pilih Bulan--',
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'Mei',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec',
        );
        return $month;
    }
    
    public static function monthRange($from, $to) {
        $month = array('0'  => '--Sila Pilih--');
        for ($i = $from; $i <= $to; $i++) {
            $month[$i] = $i; 
        }
        return $month;
    }
    
    public static function yearList($yr_show, $from_offset=0) {
        $year = array('0'  => '--Pilih Tahun--');
        $yr_from = date('Y') + $from_offset;
        $yr_to = $yr_from - $yr_show;
        for ($i = $yr_to; $i <= $yr_from; $i++) {
            $year[$i] = $i; 
        }
        return $year;
    }
    
    /**
     * return perbezaan masa antara dua tarikh samada second, minit, hari, minggu, bulan, tahun
     * @param string $dt_from tarikh dari i.e 01/01/2011
     * @param string $dt_to tarikh hingga 30/01/2011
     * @param char $time_part s=second, m=minit, h=hour, d=day, w=week, mt=month, y=year
     * @return int 
     */
    public static function date_diff($dt_from, $dt_to, $time_part) {
        $dt_from2 = strtotime($dt_from); // date dlm second
        $dt_to2   = strtotime($dt_to); // date dlm second
        $sec = $dt_to2 - $dt_from2;
        
        switch($time_part) {
            case 's' :
                  return $sec;
                  break;
            case 'm' :
                 $min = $sec / 60;
                 return $min;
                 break;
             case 'h' :
                 $hour = $sec / (60 * 60);
                 return $hour;
                 break;
             case 'd' :
                 $day = $sec / (60 * 60 * 24);
                 return $day;
                 break;
             case 'y' :
                 $year = $sec / (60 * 60 * 24 * 365.25);
                 return (int)$year;
                 break;
             case 'mt' :
                 $month = $sec / (60 * 60 * 24 * 30);
                 return ceil($month); // anggaran terhampir
                 break;
            default :
                return 0;
        }
    } 
    
    public static function monthName($no) {
        $month = array(
            '1' => 'Jan',
            '2' => 'Feb',
            '3' => 'Mar',
            '4' => 'Apr',
            '5' => 'Mei',
            '6' => 'Jun',
            '7' => 'Jul',
            '8' => 'Aug',
            '9' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec',
        );
        return $month[$no];
    }
}