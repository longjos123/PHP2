<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Subject</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .logo{
            width: 200px;
            margin-top: 30px;
        }
        .title-subject{
            font-family: Arial;
            font-size: 30px;
            color: #2e3133;
        }
        #div-title{
            padding-top: 15px;
        }
        #button-finish{
            margin-left: 15px;
            margin-bottom: 20px;
            width: 633px;
        }
        #button-start{
            margin-left: 15px;
            margin-bottom: 20px;
            width: 633px;
        }
    </style>
</head>
<body>

<div class="container-fluid" style="background-color: #FFFFFF">
    <div class="container">
        <div class="header">
            <div class="row">
                <div class="col-3">
                    <img class="logo" src="<?php echo BASE_URL ?>public/image/logoQuizz.png">
                </div>
                //Hiện thông tin user
                <div class="col-9">
                    <?php var_dump($_SESSION['b']); ?>
                </div>
            </div>
        </div>
        <div class="content" style="background-color: #F0F0F0">
            <div class="row" style="margin-top: 100px">
                <div class="col-1">
                    <img style="width: 70px" src="<?php echo BASE_URL ?>public/image/icon_root.svg">
                </div>
                <div class="col-11" id="div-title">
                    <span class="title-subject">Quiz <?= $id ?></span>
                </div>
            </div>

           <div class="form-question">
               <div class="row">
                   <div class="col-6">
                       <button id="button-start" type="button" class="btn btn-primary">Bắt đầu làm bài</button>
                       <form method="post" id="form" action="<?= BASE_URL ?>quiz/checkQuiz?id=<?= $id ?>" style="display:none;" id="form">
                           <button id="button-finish" type="submit" class="btn btn-secondary">Hoàn thành kiểm tra</button>

                           <?php foreach ($questions_answers as $key => $questions_answer): ?>
                               <div class="row" style="margin-left: 15px; border: 1.5px solid #E0E0E0; border-radius: 5px; padding-top: 5px">
                                   <div class="question">
                                       <strong>
                                           <span>Câu <?= $key ?>:</span>
                                           <span><?= $questions_answer['question'] ?></span>
                                       </strong><hr>
                                       <?php if($questions_answer['question_img']): ?>
                                           <img style="width: 470px;" src="<?php echo BASE_URL. $questions_answer['question_img']?>">
                                       <?php endif; ?>
                                   </div>
                                   <div class="answer">
                                       <?php foreach ($questions_answer['answer'] as $answer): ?>
                                           <input name="answer<?= $key ?>" type="radio" style="margin-left: 10px" value="<?= $answer->is_correct ?>">  <?= $answer->content ?><br>
                                       <?php endforeach; ?>
                                   </div>
                               </div>
                               <br>
                           <?php endforeach; ?>
                           <button id="button-finish" type="submit" class="btn btn-secondary">Hoàn thành kiểm tra</button>
                       </form>
                   </div>
                   <div class="col-5" style="border: 1.5px solid #E0E0E0; border-radius: 5px; margin-left: 55px; padding-top: 5px">
                        <strong>
                            <span>Kết quả</span><hr>
                        </strong>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
<script>
    var form = document.getElementById('form');
    var start = document.getElementById('button-start');
    var finish = document.getElementById('button-finish');
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    start.onclick = function (){
        start.style.display = 'none';
        form.style.display = 'block';

        // get time start quiz
        var dateStart = date+' '+time;

        console.log(dateStart);
        var timeStart = today.getHours() + ":" + (today.getMinutes()+15) + ":" + today.getSeconds();
        var dateFinish = date+ ' '+time;
        console.log(dateFinish);

        setTimeout(function (){
            document.getElementById('form').submit();
        },<?= $quiz->duration_minutes * 60000 ?>);
    }
    finish.onclick = function (){
        var dateFinish = date+' '+time;
        console.log(dateFinish);
        alert('Xác nhận hoàn thành!!!');
    }
</script>
</body>
</html>