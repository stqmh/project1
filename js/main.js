console.log('jalan')

var button = document.querySelector('.add-new-key')
var body = document.body
var close = document.querySelector('.close')
var isUser = document.querySelector('.is-user')
var checkboxState = true
var userWrapper = document.querySelector('.user-wrapper')

button.onclick = function() {
	body.classList.add('open-popup')
}

close.onclick = function() {
	body.classList.remove('open-popup')
}

isUser.onchange = function() {
	checkboxState = !checkboxState
	checkboxState ? userWrapper.classList.add('hidden') : userWrapper.classList.remove('hidden')
}