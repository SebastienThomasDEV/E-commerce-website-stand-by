<?php   
function printclean($x,$y)
{
    foreach($_POST as $x => $y)
    {
        printf("\r\n" . $x ."=>".$y. "\r\n");
    } 

}
    
    
?>