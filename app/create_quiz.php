<html>
    <head>
    <!-- MathJax -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

        <link rel="stylesheet" href="res/css/create_quiz.css"/>
        <title>Creeaza un quiz</title>
    </head>

    <body>
        <div id="page_container">
            <p class="title">Creeaza un quiz</p>
            <form name="create_quiz_form" action="post_create_quiz_data.php" method="POST">
                <div class="form-row">
                    <label for="quiz_title">Titlu</label>
                    <input type="text" required name="quiz_title"/>
                </div>
                <div class="form-row">
                    <label for="quiz_description">Descriere</label>
                    <textarea name="quiz_description"></textarea>
                </div>

                <div class="form-row">
                    <div id="questions_list_container">
                    </div>
                </div>

                <div class="form-row">
                    <div id="question_container_model" style="display:none" class="question_container">
                        <p class="qcm_question"></p>
                        <input style="display:none" class="qcm_question_input"/>
                        <div class="qcm_answers">
                            <div class="qcm_answer"></div>
                            <input style="display:none" class="qcm_answer_input" />
                            <div class="qcm_answer"></div>
                            <input style="display:none" class="qcm_answer_input" />
                            <div class="qcm_answer"></div>
                            <input style="display:none" class="qcm_answer_input" />
                            <div class="qcm_answer"></div>
                            <input style="display:none" class="qcm_answer_input" />
                        </div>
                        <input style="display:none" class="qcm_correct_option"/>
                    </div>
                </div>
                

                <div class="form-row">
                    <div id="add_question_container" style="display:none">
                        <label for="add_question_title">Intrebare</label>
                        <div class="side_by_side">
                            <textarea id="add_question_title"> </textarea>
                            <p id="mathjax_question_title"></p>
                        </div>
                        <div id="form-row">
                            <label for="answer_option">Varianta raspuns 1</label>
                            <input  class="answer_option" />
                        </div>
                        <div id="form-row">
                            <label for="answer_option">Varianta raspuns 2</label>
                            <input  class="answer_option"/>
                        </div>
                        <div id="form-row">
                            <label for="answer_option">Varianta raspuns 3</label>
                            <input  class="answer_option"/>
                        </div>
                        <div id="form-row">
                            <label for="answer_option">Varianta raspuns 4</label>
                            <input class="answer_option"/>
                        </div>
                        <div id="form-row">
                            <label for="correct_answer_option">Varianta corecta este</label>
                            <select id="correct_answer_option">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>

                        <button type="button" class="button" id="save_new_question_button">Salveaza</button>
                    </div>
                </div>

                <button type="button" class="button" id="add_question_button">Adauga intrebare</button>

                <div class="form-row">
                    <input type="submit" name="submit" id="form_submit_input" value="Creeza quiz"/>
                </div>
            </form>
        </div>
        <script src="res/js/create_quiz.js"></script>
    </body>

</html>