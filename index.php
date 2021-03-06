<?php
require_once './commons/helpers.php';
require_once './vendor/autoload.php';

use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\SubjectController;


$url = isset($_GET['url']) ? $_GET['url'] : "/";
// $url mong muốn của người gửi request
switch ($url) {
    case 'login':
        $login = new LoginController();
        $login->viewLogin();
        break;
    case 'checkLogin':
        $login = new LoginController();
        $login->checkLogin();
        break;
    case 'register':
        $regiter = new RegisterController();
        $regiter->viewRegister();
        break;
    case 'postRegister':
        $regiter = new RegisterController();
        $regiter->postRegister();
        break;
    case 'dashboard':
        break;
    case 'mon-hoc':
        $ctr = new SubjectController();
        $ctr->index();
        break;
    case 'mon-hoc/tao-moi':
        $ctr = new SubjectController();
        $ctr->addForm();
        break;
    case 'mon-hoc/luu-tao-moi':
        $ctr = new SubjectController();
        $ctr->saveAdd();
        break;
    case 'mon-hoc/cap-nhat':
        break;
    case 'mon-hoc/luu-cap-nhat':
        break;
    case 'mon-hoc/xoa':
        $ctr = new SubjectController();
        $ctr->remove();
        break;
    case 'mon-hoc/chi-tiet':
        $subject = new SubjectController();
        $subject->subjectDetail();
        break;
    case 'quiz':
        $quiz = new \App\Controllers\QuizController();
        $quiz->showQuiz();
        break;
    case 'quiz/checkQuiz':
        $quiz = new \App\Controllers\QuizController();
        $quiz->checkResultQuiz();
        break;
    case 'quiz/tao-moi':
        break;
    case 'quiz/luu-tao-moi':
        break;
    case 'quiz/cap-nhat':
        break;
    case 'quiz/luu-cap-nhat':
        break;
    case 'quiz/xoa':
        break;
    case 'quiz/lam-bai':
        break;
    default:
        echo "Đường dẫn bạn đang truy cập chưa được cho phép";
        break;
}
