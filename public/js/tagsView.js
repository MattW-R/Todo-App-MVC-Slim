let tags = document.querySelectorAll('.todo')

tags.forEach(tag => {
    tag.addEventListener('keyup', e => {
        if (e.key === 'Backspace' && e.target.value === '') {
            e.target.parentElement.action = 'tags/delete'
            e.target.parentElement.submit()
        }
    })
})

tags[tags.length - 1].focus()