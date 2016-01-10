<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        //takes the string from URL
        $squares = $_GET['board'];
        
        //creating a new game
        $game =new Game($squares);
        
        //calling on the pick_move method
        $game->pick_move();

        //calling on the display method
        $game->display();
        
        //if the winner method returns x then player wins
        if ($game->winner('x')){
            echo 'Beginners luck, you won this round.';
        }
        //if winner method returns o then bot wins
        else if ($game->winner('o')){
            echo 'I win. Better luck next time loser!';
        } 
        //if other conditions are met then no winner
        else {
            echo 'No winner yet, but I\'m pretty much winning.';
        }
        
        ?>
        
    </body>
</html>
<?php   
      
class Game {
    
    var $position;              //current position in the array 
    
    //constructor which takes in the $squares 
    function __construct($squares) {
        //assigning $squares to the variable
        $this->position = str_split($squares);
    }
       //WINNING PATTERNS FUNCTION
       function winner ($token){
       //return false if none of the conditions are met
       $won = false;
       
       //top row
       if (($this->position[0] == $token) && ($this->position[1]== $token) && ($this->position[2] == $token)){
           $won = true;
       }
       //middle row
       else if (($this->position[3] == $token) && ($this->position[4]== $token) && ($this->position[5] == $token)){
            $won = true;
       } 
       //bottom row
       else if (($this->position[6] == $token) && ($this->position[7]== $token) && ($this->position[8] == $token)){
            $won = true;
       } 
       //left column
       else if (($this->position[0] == $token) && ($this->position[4]== $token) && ($this->position[8] == $token)){
            $won = true;
       } 
       //right column
       else if (($this->position[2] == $token) && ($this->position[4]== $token) && ($this->position[6] == $token)){
            $won = true;
       } 
       //middle column
       else if (($this->position[1] == $token) && ($this->position[4]== $token) && ($this->position[7] == $token)){
            $won = true;
       } 
       //first diagonl
       else if (($this->position[0] == $token) && ($this->position[3]== $token) && ($this->position[6] == $token)){
            $won = true;
       } 
       //second diagonal
       else if (($this->position[2] == $token) && ($this->position[5]== $token) && ($this->position[8] == $token)){
            $won = true;
       } 
       return $won;
       } 
       
       //DISPLAYS THE A TABLE OF 9 BLOCKS
       function display(){
        echo '<h2>Welcome to Nancy\'s Tic Tac Toe </h2>';
        
        echo '<form action=>';
            echo '<div>';
                echo '<input type="hidden" name="board" value="---------"/>';
		echo '<input type="submit" name="new" value="New Game"/>';
            echo '</div>';
        echo '</form> </br>';
            echo '<table  border= "1" cols="3" style="font-size:50px; font-weight:bold">';
            echo '<tr>';
            
            //for loop iterates 8 times to create each position
            for ($pos=0; $pos <9;$pos++){
                echo $this->show_cell($pos);
                //end and create new row
                if ($pos %3 == 2){
                    echo '</tr><tr>';
                }
            }
            echo '<tr>';
            echo '</table>  </br>';
        }
        
       //function will show either '-' or the token 'x' or 'o'
       function show_cell($which) {
        $token = $this->position[$which];
        
        //display token inside the box if it isnt '-'
        if ($token <> '-') 
            return '<td>'.$token.'</td>';
        
        //making a copy of the position
        $this->newposition = $this->position;
        
        //this new position will be opponent 'x' turn
        $this->newposition[$which] = 'x';
        
        //adding o to the board array
        $move = implode($this->newposition);

        //adding to the link
        $link = '?board='.$move;
        
        //return a cell showing a '-'
        return '<td><a style="text-decoration: none;" href="'.$link.'">-</a></td>';
        }
       
        //function looks for the next available slot to place an o in
        function pick_move() { 
            
            //iterate through all the positions
            for($i=0;$i<8;$i++){
                
                //checking for an empty slot aka hyphens then replace with o
                if($this->position[$i] == '-'){
                    $this->position[$i] = 'o';
                    break;
                    } 
           
            }
            }
        
     }   
       
 ?>