<html>
    
    <body>
    <center>
    
        <h2> Exam End! </h2>
        <?php if(array_sum($_SESSION['final_res']) == 5 ){ 
            echo "Your score = " . array_sum($_SESSION['final_res']) . "/5 .... congratulations"; }
              else{ echo "Your score = " . array_sum($_SESSION['final_res']) . "/5" ;

              } ?>
    </center>
    </body
    
    
</html>

