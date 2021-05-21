document.querySelectorAll('.line').forEach(line => line.addEventListener('click', e => {
    e.target.childNodes[0].childNodes[0].select()
}))