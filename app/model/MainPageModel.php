<?php
function Get_Time($String) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $a = time();
        $b = strtotime($String);
        $c = $a - $b;
        if (floor($c/31536000)) {
            $c = floor($c/31536000);
            return $c. ' năm trước';
        }
        else if (floor($c/2628000)) {
            $c = floor($c/2628000);
            return $c. ' tháng trước';
        }
        else if (floor($c/604800)) {
            $c = floor($c/604800);
            return $c. ' tuần trước';
        }
        else if (floor($c/86400)) {
            $c = floor($c/86400);
            return $c. ' ngày trước';
        }
        else if (floor($c/3600)) {
            $c = floor($c/3600);
            return $c. ' giờ trước';
        }
        else if (floor($c/60)) {
            $c = floor($c/60);
            return $c. ' phút trước';
        }
        else if ($c < 60){
            return 'Vừa xong';
        }
        return '';
    }