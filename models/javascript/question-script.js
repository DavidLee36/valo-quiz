const nextBtn = document.querySelector('.next-question-btn');
const possibleAnswers = document.querySelectorAll('.answer-btn');
const correctAnswer = document.querySelector('#correct-answer').value;

possibleAnswers.forEach((possibleAnswer) => {
    possibleAnswer.addEventListener('click', () => {
        if(possibleAnswer.name == correctAnswer) { //User clicked correct answer
            possibleAnswer.classList.add('answer-correct');
            nextBtn.style.display = "block";
        }else {
            possibleAnswer.classList.add('answer-incorrect');
        }
    });
});