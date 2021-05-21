let todos = document.querySelectorAll('.todo')

todos.forEach(todo => {
    todo.addEventListener('blur', e => {
        if (e.target.value !== '' && e.target.value !== e.target.dataset.currentValue) {
            e.target.parentElement.submit()
        }
    })
    todo.addEventListener('keyup', e => {
        if (e.key === 'Backspace' && e.target.value === '') {
            e.target.parentElement.action = 'todos/delete'
            e.target.parentElement.submit()
        }
    })
    todo.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            e.preventDefault()
            e.target.blur()
        }
    })
    todo.addEventListener('click', e => {
        if (e.shiftKey && e.target.value !== '') {
            e.target.parentElement.action = 'todos/edit/done'
            e.target.parentElement.submit()
        }
    })
})

document.querySelectorAll('.tag-button').forEach(span => {
    span.addEventListener('click', e => {
        if (e.shiftKey) {
            if (!window.location.href.match(/\?/)) {
                window.location.replace(window.location.href + '?tags=' + e.target.textContent)
            } else if (!window.location.href.match(e.target.textContent)) {
                window.location.replace(window.location.href + '+' + e.target.textContent)
            }
        } else {
            e.target.parentElement.submit()
        }
    })
})

todos[todos.length - 1].focus()