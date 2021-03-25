<?php
require_once "autoload.php";
if (!isset($_SESSION['page_no'])):
            $_SESSION['page_no'] = 1;


elseif (!isset($_POST['prev']) && !isset($_POST['next'])): 
    $_SESSION['page_no'] = 1;
    $_SESSION['final_res'] = array(0);
    
 else :
    if (isset($_POST["next"])):
        $_SESSION['page_no']++;
    elseif (isset($_POST["prev"])):
        $_SESSION['page_no']>1 ? $_SESSION['page_no']-- : 1;
    endif;
endif;

try {
    $exam = new Exam();
    if (isset($_POST["radio"])) {
        $exam->check_results($_POST["radio"]);
    } ;
    
    $current_page = $_SESSION['page_no'];
    if ($current_page == $exam->getQuestion_number()+1) {
        include_once("views/End.php");
        exit();
    } else {
        $current_question = $exam->load_exam_page($current_page);
    }
} catch (Exception $ex) {
    if (mode === "production") {
        include("views/error.php");
        exit();
    } else {
        echo $ex->getMessage();
        echo $ex->getTraceAsString();
        exit();
    }
}
?>


<html>
    <?php include "views/header.php"; ?>
    <body>
        <?php include "views/questions.php"; ?>
    </body>
</html>