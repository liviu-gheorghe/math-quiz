<?php include_once ('db_utils.php') ?>
<?php $dbConnection = getDbConnection(); ?>

<html>
    <head>
    <!-- MathJax -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

        <link rel="stylesheet" href="res/css/create_quiz.css"/>
        <link rel="stylesheet" href="res/css/components/quizzes_grid.css"/>
        <link rel="stylesheet" href="res/css/components/quiz.css"/>
        
        <title>Lista quiz-uri</title>
    </head>

    <body>

    <?php
        if(isset($_REQUEST['quiz_id'])) {
            $quiz_id = intval($_REQUEST['quiz_id']);
            $quizData = [];
            $quizDataResult = executeQuery(
                $dbConnection, 
                sprintf("SELECT quiz.title AS quiz_title, question.* FROM quiz INNER JOIN question ON quiz.id = question.quiz_id WHERE quiz.id = %d", $quiz_id)
            );


            while($row = $quizDataResult->fetch_assoc()) {
                $quizData[count($quizData)] = $row;
            }

            include("components/quiz.php");
        }
        else {

                $quizzesData = [];
                $quizzesResult = executeQuery(
                    $dbConnection, 
                    sprintf("SELECT quiz.*, COUNT(*) AS question_count FROM quiz INNER JOIN question ON quiz.id = question.quiz_id GROUP BY question.quiz_id;")
                );

                while($row = $quizzesResult->fetch_assoc()) {
                    $quizzesData[count($quizzesData)] = $row;
                }
                include("components/quizzes_grid.php");
        }
    ?>

    <body>
</html>