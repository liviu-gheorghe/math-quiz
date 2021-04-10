<div class="title"><?php echo $quizData[0]['quiz_title'] ?> </div>
<div id="result_overlay">
    <div id="result_overlay_text">
    </div>
    <button id="result_overlay_button" onclick="window.location.href='/math-quiz/app/quiz_list.php'">Ok</button>
</div>
<div id="questions_container">
    <?php

        $idx = 0;
        foreach($quizData as $question) {
            ?>
            <div class="form-row">
                <div class="question_container">
                    <p class="qcm_question"><?php echo $question['title']?></p>
                    <div class="qcm_answers" question_number=<?php echo $idx?>>
                        <div class="qcm_answer"><?php echo $question['option_1']?><div class="answer_box" option_number=1></div></div>
                        <div class="qcm_answer"><?php echo $question['option_2']?><div class="answer_box" option_number=2></div></div>
                        <div class="qcm_answer"><?php echo $question['option_3']?><div class="answer_box" option_number=3></div></div>
                        <div class="qcm_answer"><?php echo $question['option_4']?><div class="answer_box" option_number=4></div></div>
                    </div>
                    <script>
                        if(window.answers === undefined) {
                            window.answers = [];
                        }
                        window.answers.push(<?php echo $question['correct_option']?>);
                    </script>
                </div>
            </div>
            <?php
            $idx++;
        }
    ?>
</div>


<div id="finish_quiz_container">
        <button id="finish_quiz_button">Finalizeaza quiz</button>
</div>
<div id="timer">Timp scurs : <span id="time_value">00:00:00</span></div>

<script>

            const startDate = Math.floor(Date.now()/1000); 

            let timerInterval = setInterval(() => {
                var currentDate = Math.floor(Date.now()/1000);
                let elapsedHours = Math.floor((currentDate - startDate)/3600);
                let elapsedMinutes = Math.floor((currentDate - startDate)/60 - elapsedHours*60);
                let elapsedSeconds = Math.floor((currentDate - startDate) - elapsedHours*3600 - elapsedMinutes*60);

                let elapsedText = "hh:mm:ss";
                elapsedText = elapsedText.replace('hh',elapsedHours < 10 ? `0${elapsedHours}`:`${elapsedHours}`);
                elapsedText = elapsedText.replace('mm',elapsedMinutes < 10 ? `0${elapsedMinutes}`:`${elapsedMinutes}`);
                elapsedText = elapsedText.replace('ss',elapsedSeconds < 10 ? `0${elapsedSeconds}`:`${elapsedSeconds}`);

                document.getElementById('time_value').innerText = elapsedText;

            }, 1000);


            window.givenAnswers = [];

            answerButtons = Array.from(document.querySelectorAll('.answer_box'));
            answerButtons.forEach((element, idx) => {

                element.addEventListener('click', (e) => {
                    let element = e.target;
                    Array.from(element.parentNode.parentNode.querySelectorAll('.answer_box')).forEach((element) => {
                        if(element.classList.contains('correct')) {
                        element.classList.remove('correct');
                    }
                    });
                    if(!element.classList.contains('correct')) {
                        element.classList.add('correct');
                    }
                    else {
                        element.classList.remove('correct');
                    }
                    let rowId = Math.floor(idx/4);
                    window.givenAnswers[rowId] = parseInt(element.getAttribute('option_number'));

                });

            });

            document.getElementById('finish_quiz_button').addEventListener('click', () => {
                let score  = 0;
                for(let qid=0;qid < window.answers.length;qid++) {
                    if(window.answers[qid] === window.givenAnswers[qid]) score++;
                }
                document.getElementById('result_overlay').classList.add('visible');
                document.getElementById('result_overlay_text').innerText = `Felicitari, ai raspuns corect la ${score} ${score === 1? 'intrebare' : 'intrebari'} din ${ window.answers.length}`;
                console.log(`Felicitari, ai raspuns corect la ${score} ${score === 1? 'intrebare' : 'intrebari'} din ${ window.answers.length}`);

            });

</script>