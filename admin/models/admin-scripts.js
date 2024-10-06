const addPossibleAnswerBtn = document.getElementById('add-possible-answer-btn');

const removePossibleAnswerBtn = document.querySelectorAll('.remove-possible-answer-btn');

//Add additional possible answer inputs to the add question form
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