<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        if (winner('x', $square)) {
            echo 'You win.';
        } else if (winner('o', $square)) {
            echo 'I win.';
        } else {
            echo 'No winner yet';
        }
        ?>
    </body>
</html>
<?php
        // put your code here
       $position = $_GET['board'];
       $square = str_split($postion);
       
       //WINNING PATTERNS FUNCTION
       function winner ($tocken, $position){
       $won = false;
       if (($position[0] == $tocken) && ($position[1]== $tocken) && ($position[2] == $tocken)){
           $won = true;
       } else if (($position[3] == $tocken) && ($position[4]== $tocken) && ($position[5] == $tocken)){
            $won = true;
       } else if (($position[6] == $tocken) && ($position[7]== $tocken) && ($position[8] == $tocken)){
            $won = true;
       } else if (($position[0] == $tocken) && ($position[4]== $tocken) && ($position[8] == $tocken)){
            $won = true;
       } else if (($position[2] == $tocken) && ($position[4]== $tocken) && ($position[6] == $tocken)){
            $won = true;
       } else if (($position[1] == $tocken) && ($position[4]== $tocken) && ($position[7] == $tocken)){
            $won = true;
       } else if (($position[0] == $tocken) && ($position[3]== $tocken) && ($position[6] == $tocken)){
            $won = true;
       } else if (($position[2] == $tocken) && ($position[5]== $tocken) && ($position[8] == $tocken)){
            $won = true;
       }
       }
       
       
        ?>