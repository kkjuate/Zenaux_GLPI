<?php
       if($_SESSION['user'][2] != 'BOGATIT') {
        
        $location = "BOG";
       $impact = 1;
      
        if($_SESSION['user'][2] == 'BP9ATBB'){
            $LOB='BBY';
        } else if ($_SESSION['user'][2] == 'BP9ATCH'){
            $LOB='CHS';
        } else if (strtoupper(substr($_SESSION['user'][2],0,5)) == 'BOGAT'){
            $LOB='ADM';}
        
    } else if($_SESSION['user'][2] == 'BOGATIT'){
        header('Location:dash.php');
        die();
    }
?>