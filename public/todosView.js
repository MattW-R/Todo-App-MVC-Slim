let todos = document.querySelectorAll('.todo')

todos.forEach(todo => {
    todo.addEventListener('blur', e => {
        if (e.target.value !== '' && e.target.value !== e.target.dataset.currentValue) {
            e.target.parentElement.submit()
        }
    })
    todo.addEventListener('keyup', e => {
        if (e.key === 'Enter') {
            e.target.blur()
        } else if (e.key === 'Backspace' && e.target.value === '') {
            e.target.parentElement.action = 'todos/delete'
            e.target.parentElement.submit()
        }
    })
    todo.addEventListener('click', e => {
        if (e.shiftKey && e.target.value !== '') {
            e.target.parentElement.action = 'todos/edit/done'
            e.target.parentElement.submit()
        }
    })
})

document.querySelectorAll('span').forEach(span => {
    span.addEventListener('click', e => {
        e.target.parentElement.submit()
    })
})

todos[todos.length - 1].focus()