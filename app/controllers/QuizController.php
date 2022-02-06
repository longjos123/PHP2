<?php
namespace App\Controllers;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;

class QuizController{
    public function showQuiz(){
        $id = $_GET['id'];

        $quiz = Quiz::where('id', $id)->first();
        $questions = Question::where('quiz_id', $id)->get();
        $questions_answers = [];
        foreach ($questions as $question){
            $questions_answers[$question->id] = [
                'question' => $question->name,
                'question_img' => $question->img,
                'answer' => Answer::where('question_id', $question->id)->get()
            ];

        }

        include_once './app/views/quiz/index.php';
    }

    public function checkResultQuiz(){
        $id = $_GET['id'];
        $questions = Question::where('quiz_id', $id)->get();
        $student_answer = [];

        for($i = 1; $i <= count($questions); $i++){
            $student_answer[$i] = isset($_POST['answer'.$i]) ? $_POST['answer'.$i] : 0;
        }
        var_dump($_SESSION['AUTH']);die();
    }
}
?>