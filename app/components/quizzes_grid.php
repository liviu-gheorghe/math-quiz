
<div id="quizzes_container">
    <?php

        foreach($quizzesData as $quiz) {
            ?>
                <a
                href="<?php echo "quiz_list.php?quiz_id=".$quiz["id"]?>"
                class="quiz_card">
                    <img src="<?php echo "res/img/integrals.jpg" ?>" alt=""/>
                    <div class="image_overlay">
                        <p class="quiz_title"><?php echo $quiz["title"] ?></p>
                        <p class="">Numar intrebari : <?php echo $quiz["question_count"]?></p>
                        <p class="">Timp estimat de rezolvare : <?php echo intval($quiz["question_count"])*5?> min</p>
                        <p class="">Dificultate : <?php echo $quiz["difficulty"]?></p>
                    </div>
                </a>
            <?php
        }
    ?>
</div>