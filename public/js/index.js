document.querySelectorAll('.todo').forEach(input => {
    input.addEventListener('blur', e => {
        if (e.target.value !== '' && e.target.value !== e.target.dataset.currentValue) {
            e.target.parentElement.submit()
        }
    })
    input.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            e.preventDefault()
            e.target.blur()
        }
    })
})