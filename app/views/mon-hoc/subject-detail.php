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
        .subject-name{
            text-decoration: none;
            color: #6c757d;
        }
        #div-name-subject{
            padding-top: 9px;
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

                </div>
            </div>
        </div>
        <div class="content" style="background-color: #F0F0F0">
            <div class="row" style="margin-top: 100px">
                <div class="col-1">
                    <img style="width: 70px" src="<?php echo BASE_URL ?>public/image/icon_root.svg">
                </div>
                <div class="col-11" id="div-title">
                    <span class="title-subject">Quiz - <?= $subject->name ?></span>
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <?php foreach ($quiz_subjects as $quiz_subject): ?>
                    <div class="row" style="background-color: #FFFFFF">
                        <div class="col-1">
                            <img style="width: 40px" src="<?php echo BASE_URL ?>public/image/folder.svg">
                        </div>
                        <div class="col-11" id="div-name-subject">
                            <a class="subject-name"
                               href="<?php echo BASE_URL ?>quiz?id=<?= $quiz_subject->id ?>"><?= $quiz_subject->name ?></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>