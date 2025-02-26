// Getting the unique Ids
const quizId = document.querySelectorAll('.simplequizblock-random-id')

// Getting the container corresponding to each Id
Array.from(quizId).forEach(el => {
  // Select Element from block depending on the container
  const quizContainer = document.getElementById(el.textContent)
  const goodAnswer = quizContainer.querySelector('.simplequizblock-good')
  const hidden = quizContainer.querySelector('.simplequizblock-fill')
  const allAnswers = quizContainer.querySelectorAll('.simplequizblock-unique-answer')
  const result = quizContainer.querySelector('.simplequizblock-result')

  // prevent to click a second time after the user has answered
  let isClicked = false
  
  Array.from(allAnswers).forEach(answer => {
    answer.addEventListener('click', () => {

      if (isClicked === false) {
        let resultContent = document.createElement('div')
        if (answer.textContent === goodAnswer.textContent) {
          resultContent.classList.add('simplequizblock-good-answer')
          hidden.textContent === '1' ? answer.classList.add('simplequizblock-good-fill') : answer.classList.add('simplequizblock-good-border')
          resultContent.append('Félicitation ! 🥳')
        } else {
          resultContent.classList.add('simplequizblock-bad-answer')
          hidden.textContent === '1' ? answer.classList.add('simplequizblock-bad-fill') : answer.classList.add('simplequizblock-bad-border')
          resultContent.append(`Mauvaise réponse 😔... La bonne réponse était : ${goodAnswer.textContent}`)
        }
        result.prepend(resultContent)
        result.hidden = false
        isClicked = true
      }
    })
  })
})