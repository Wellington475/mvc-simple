<?php
    namespace App\Helpers;

    class Date
    {
        public function difference($from, $to, $type = null){
            $d1 = new \DateTime($from);
            $d2 = new \DateTime($to);
            $diff = $d2->diff($d1);
            
            if($type == null)
                return $diff;
            else
                return $diff->$type;
        }
    }
?>