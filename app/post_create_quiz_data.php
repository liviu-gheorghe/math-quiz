<?php include_once ('db_utils.php') ?>

<?php 

    $dbConnection = getDbConnection();

    $formData = $_POST;


    $createQuizQuery =  sprintf("INSERT INTO quiz (title, description, difficulty) VALUES ('%s', '%s', '%s')",
        $formData['quiz_title'],
        $formData['quiz_description'],
        (array_key_exists('quiz_difficulty', $formData) ? $formData['quiz_difficulty'] : '1')
    );

    $result = executeQuery($dbConnection, $createQuizQuery);

    $lastQuizId = executeQuery($dbConnection, "SELECT id FROM quiz ORDER BY id DESC LIMIT 1")->fetch_assoc()["id"];

    $questionsCount = array_key_exists('question_title', $formData) ? count($formData['question_title']) : 0;
    if($questionsCount === 0) die();

    for($i=0;$i<$questionsCount;$i++) {
        $currentQuestion = [
            'title' => $formData['question_title'][$i] , 
            'option_1' => $formData['question_answer'][$i][0], 
            'option_2' => $formData['question_answer'][$i][1], 
            'option_3' => $formData['question_answer'][$i][2],
            'option_4' => $formData['question_answer'][$i][3],
            'correct_option' => intval($formData['correct_answer_option'][$i]),
            'quiz_id' => intval($lastQuizId)
        ];


        $createQuestionQuery =  sprintf(
            "INSERT INTO question (title, option_1, option_2, option_3, option_4, correct_option, quiz_id) VALUES ('%s', '%s', '%s','%s', '%s', %d, %d)",
            $currentQuestion['title'],
            $currentQuestion['option_1'],
            $currentQuestion['option_2'],
            $currentQuestion['option_3'],
            $currentQuestion['option_4'],
            $currentQuestion['correct_option'],
            $currentQuestion['quiz_id']
        );
        $result = executeQuery($dbConnection, $createQuestionQuery);
    }
?>

<style>
    .button {
        outline: none;
        margin: none;
        border: none;
        cursor: pointer;
        border-radius: 10px;
        width: 150px;
        height: 40px;
        color: #fff;
        background-color: red;
        align-self:center;
    }
</style>

<div style="display:flex; flex-direction: column; justify-content: center">
    <p style="font-size:25px; text-align: center">Quiz-ul a fost creat cu succes</p>
    <button class="button" onclick="window.location.href='/math-quiz/app'">OK</button>

</div>
