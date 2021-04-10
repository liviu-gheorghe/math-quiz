let ADD_QUESTION_CONTAINER_OPEN_STATE = false;
let questionCount = 0;

const addQuestionContainer = document.getElementById('add_question_container');

document.getElementById('add_question_button').addEventListener('click', (e) => {
    toggleAddQuestionContainer(e);
});
const toggleAddQuestionContainer = (e) => {


    console.log(ADD_QUESTION_CONTAINER_OPEN_STATE);
    addQuestionContainer.style.display = ADD_QUESTION_CONTAINER_OPEN_STATE ? 'none' : 'flex';
    e.target.textContent = ADD_QUESTION_CONTAINER_OPEN_STATE ? 'Adauga intrebare' : 'Anuleaza';
    ADD_QUESTION_CONTAINER_OPEN_STATE = !ADD_QUESTION_CONTAINER_OPEN_STATE;

}


let now = Date.now();
console.log(now);

document.getElementById('add_question_title').addEventListener('keyup',(e) => {
    if(Date.now() - now > 2000) {
        now = Date.now();
        document.getElementById('mathjax_question_title').textContent = e.target.value;
        MathJax.typeset()
    }
    else setTimeout(
        () => {
            document.getElementById('mathjax_question_title').textContent = e.target.value;
            MathJax.typeset()
        }, (2000 - (Date.now() - now) +1)
    )
});

document.getElementById('save_new_question_button').addEventListener('click', () => {

    let newQuestionNode = document.getElementById('question_container_model').cloneNode(true);
    newQuestionNode.style.display = 'block';
    newQuestionNode.setAttribute('id','question_container_' + questionCount);

    newQuestionNode.querySelector(".qcm_question").textContent = document.getElementById('add_question_title').value;
    const qcmQuestionInput = newQuestionNode.querySelector(".qcm_question_input");
    qcmQuestionInput.value = document.getElementById('add_question_title').value;
    qcmQuestionInput.setAttribute('name', `question_title[${questionCount}]`);
    const questionAnswerOptions = Array.from(document.getElementsByClassName('answer_option')).map(e => e.value);
    newQuestionNode.querySelectorAll('.qcm_answer').forEach(
        (node, idx) => {
            node.textContent = questionAnswerOptions[idx];
        }
    )
    newQuestionNode.querySelectorAll('.qcm_answer_input').forEach(
        (node, idx) => {
            node.setAttribute('name', `question_answer[${questionCount}][${idx}]`);
            node.setAttribute('name',node.name.replace('*',questionCount));
            node.value = questionAnswerOptions[idx];
        }
    )
    const qcmCorrectOptionInput = newQuestionNode.querySelector('.qcm_correct_option');
    qcmCorrectOptionInput.value = document.getElementById('correct_answer_option').value;
    qcmCorrectOptionInput.setAttribute('name', `correct_answer_option[${questionCount}]`);

    questionCount++;
    document.getElementById('questions_list_container').appendChild(newQuestionNode);
    setTimeout(MathJax.typeset(), 1000);
})