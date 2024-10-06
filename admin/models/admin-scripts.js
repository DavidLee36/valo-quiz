const addPossibleAnswerBtn = document.getElementById('add-possible-answer-btn');
const addSubmitBtn = document.getElementById('add-question-submit');

const removePossibleAnswerBtn = document.querySelectorAll('.remove-possible-answer-btn');

//Add additional possible answer inputs to the form
addPossibleAnswerBtn.addEventListener('click', () => {
    var answerList = document.getElementById('possible-answers-list');
    var newAnswerInput = document.createElement('div');
    newAnswerInput.innerHTML = '<input type="text" name="possible_answers[]" class="possible-answer"> <button type="button" class="remove-answer-btn">-</button>';
    
    // Append the new input field
    answerList.appendChild(newAnswerInput);

    // Add event listener to remove button
    newAnswerInput.querySelector('.remove-answer-btn').addEventListener('click', () => {
        newAnswerInput.remove();
    });
});


//Works identically to the remove functionality in the addPossibleAnswerBtn event listener however this deals with any remove buttons that already exist
if(removePossibleAnswerBtn) {
    removePossibleAnswerBtn.forEach((e) => {
        e.addEventListener('click', () => {
            const parent = e.parentElement;
            parent.remove();
        })
    })
}


//Console log the possible answers submitted
if(addSubmitBtn) {
    addSubmitBtn.addEventListener('click', () => {
        const possibleAnswers = Array.from(document.querySelectorAll('.possible-answer'));
        possibleAnswers.forEach(element => {
            console.log(element.value);
        });
    });
}