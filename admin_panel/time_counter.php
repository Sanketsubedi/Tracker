<?php 
    $posted_time = $row['Time'];
    $post_time = strtotime("$posted_time");
    $current_time = date("Y-m-d H:i:s"); // Format: Year-Month-Day Hour:Minute:Second
    $current= strtotime("$current_time");
     $diff = $current - $post_time;

     // added
     $ta_seconds = $diff;
    
    
    /**
     * Timestamp Difference (s) Convertions
     */

        /**Getting the difference by minute(s) 
         * timestamp difference / 60
         */
        $minutes = round($ta_seconds / 60); 
        /**Getting the difference by hour(s) 
         * timestamp difference / ( 60 * 60)
         */
        $hours   = round($ta_seconds / 3600);
        /**Getting the difference by day(s) 
         * timestamp difference / ( 24 * 60 * 60)
         */
        $days    = round($ta_seconds / 86400);
        /**Getting the difference by week(s) 
        * timestamp difference / ( 7 * 24 * 60 * 60)
        */
        $weeks   = round($ta_seconds / 604800);
        /**Getting the difference by month(s) 
        * timestamp difference / ( ( ( 365 + 365 + 365 + 365 + 366 ) / 5 / 12 ) * 24 * 60 *60 )
        */
        $months  = round($ta_seconds / 2629440);
        /**Getting the difference by year(s) 
        * timestamp difference / ( ( ( 365 + 365 + 365 + 365 + 366 ) / 5 ) * 24 * 60 *60 )
        */
        $years   = round($ta_seconds / 31553280); 

        
        /**
         * echo Timeago
         */
        if( $ta_seconds < 60 ){
            if( $ta_seconds == 1)
                echo "Just Now";
            else
                echo "{$ta_seconds} sec. ago";
        }elseif($minutes < 60){
            if( $minutes == 1 )
                echo "A minute ago";
            else
                echo "{$minutes} min. ago";
        }elseif( $hours < 24 ){
            if( $hours == 1 )
                echo "An Hour ago";
            else
                echo "{$hours} hr. ago";
        }elseif( $days < 7 ){
            if( $days == 1 )
                echo "A day ago";
            else
                echo "{$days} days ago";
        }elseif( $weeks < 4 ){
            if( $weeks == 1 )
                echo "A week ago";
            else
                echo "{$weeks} weeks ago";
        }elseif( $months < 12 ){
            if( $months == 1 )
                echo "A month ago";
            else
                echo "{$months} months ago";
        }elseif( $years > 0 ){
            if( $years == 1 )
                echo "A year ago";
            else
                echo "{$years} years ago";
        }elseif($ta_seconds <= -1){
            echo "Future/Scheduled";
        }else{
                echo "{$weeks} weeks ago";
        }?>