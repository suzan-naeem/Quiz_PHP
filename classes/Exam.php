<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exam
 *
 * @author memad
 */


class Exam implements Exam_interface {

    private $url;
    private $questions;
    private $page;
    private $question_number;
    private $answers;
    
    function getQuestion_number() {
        return count($this->questions);
    }
 
    public function __construct() {
        $this->url = Helper::get_current_Page_URL();
        $this->questions = $this->get_questions();
        $this->answers = $this->get_answers();
    }

    public function load_exam_page($page) {
        if (isset($this->questions[$page - 1])) {
            return $this->questions[$page - 1];
        } else {

            throw new Exception("Question dosn't exist");
        }
    }


    

    private function get_questions() {
        $lines = file(exam_file);
        $questions = array();
        foreach ($lines as $line) {
            if (substr($line, 0, 1) === "Q") {
                $new_mcquestion = new MCQuestion($line);
                $questions[] = $new_mcquestion;
            } elseif (substr($line, 0, 1) === "*") {
                $new_tofquestion = new TrueOrFalseQuestion(str_replace("*", "", $line));
                $questions[] = $new_tofquestion;
            } else {
                $new_mcquestion->Add_an_Option($line);
            }
        }
        return $questions;
    }

    

    private function get_answers() {
        $lines = file(answers_file);
        $answers = array();
        foreach ($lines as $line) {
            $answers[] = $line;
        }
        return $answers;
    }

    public function check_results($ans) {
        if(trim($ans) == trim($this->answers[$_SESSION['page_no'] - 2])){
            $_SESSION['final_res'][$_SESSION['page_no'] - 2] =  1 ;
        } else {
            $_SESSION['final_res'][$_SESSION['page_no'] - 2] =  0;
        }
    }

  
}






