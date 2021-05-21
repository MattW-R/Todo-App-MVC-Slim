let tags = document.querySelectorAll('.todo')

tags.forEach(tag => {
    tag.addEventListener('blur', e => {
        if (e.target.value !== '' && e.target.value !== e.target.dataset.currentValue) {
            e.target.parentElement.submit()
        }
    })
    tag.addEventListener('keyup', e => {
        if (e.key === 'Backspace' && e.target.value === '') {
            e.target.parentElement.action = 'tags/delete'
            e.target.parentElement.submit()
        }
    })
    tag.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            e.preventDefault()
            e.target.blur()
        }
    })
})

tags[tags.length - 1].focus()