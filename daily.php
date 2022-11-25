<?php

    include 'function.php';

    //echo $month;echo "<br>";

    $query="SELECT devui,SUM(energi) FROM sensor WHERE date='$date_now' GROUP BY devui";
    $result = mysqli_query($koneksi,$query);
    while($row = mysqli_fetch_array($result))
    {
        $biaya=$row[1]*1444.70;
        //$sql = "INSERT INTO electricity values ('','$date_now','$row[0]','$row[1]','daily','$biaya')";
        //mysqli_query($koneksi, $sql);
    }
    
    if($date_now == $date_end){
        $query="SELECT devui,SUM(energi),SUM(biaya) FROM electricity WHERE date='$date_now' GROUP BY devui";
        $result = mysqli_query($koneksi,$query);
        while($row = mysqli_fetch_array($result))
        {
            //$sql = "INSERT INTO electricity values ('','$date_now','$row[0]','$row[1]','monthly','$row[2]')";
            //mysqli_query($koneksi, $sql);
        }
    } 
?>