const nextBtn = document.querySelector('.next-question-btn');
const possibleAnswers = document.querySelectorAll('.answer-btn');
const correctAnswer = document.querySelector('#correct-answer').value;
const questionID = document.querySelector('#question-id').value;
const categoryID = document.querySelector('#category-id').value;
const correct = parseInt(document.querySelector('#correct').value);

if(correct === 1) { //User has previously answered this question correct
    possibleAnswers.forEach((possibleAnswer) => {
        if(possibleAnswer.name == correctAnswer) {
            possibleAnswer.classList.add('answer-correct');
            nextBtn.style.display = "block";
        }else { //disable-flag class used to prevent click actions
            possibleAnswer.classList.add('disable-flag');
        }
    });
}

possibleAnswers.forEach((possibleAnswer) => {
    possibleAnswer.addEventListener('click', () => {

        //Don't allow multi clicking on a button to avoid sending multiple requests to the database
        if(possibleAnswer.classList.contains('answer-correct') || 
        possibleAnswer.classList.contains('answer-incorrect') ||
        possibleAnswer.classList.contains('disable-flag')) {
            return;
        }

        let correct;
        if(possibleAnswer.name == correctAnswer) { //User clicked correct answer
            possibleAnswer.classList.add('answer-correct');
            nextBtn.style.display = "block";
            correct = 1;
            disableAnswers();
        }else {
            possibleAnswer.classList.add('answer-incorrect');
            correct = 0;
        }
        sendAttempt(correct);
    });
});

//Disable all possible answers so that any clicks won't be sent to the database
const disableAnswers = () => {
    possibleAnswers.forEach((possibleAnswer) => {
        possibleAnswer.classList.add('disable-flag');
    })
}

const sendAttempt = (correct) => {
    // Make an AJAX request to record the attempt
    fetch('https://valo-quiz.com/controllers/record-attempt.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `question_id=${questionID}&category_id=${categoryID}&correct=${correct}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            console.log('Attempt recorded successfully');
        } else {
            console.error('Failed to record attempt:', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}