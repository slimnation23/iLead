//Menu
const menuBtn = document.querySelector('.menu-toggle')
const navlist = document.querySelector('.nav__ul')

menuBtn.onclick = () => {
    navlist.classList.toggle('active')
}

// Parallax
let parallax = document.querySelectorAll('.parallax')
const force = 20

for (let i = 0; i < parallax.length; i++) {
    window.addEventListener('mousemove', function (e) {
        if (window.innerWidth > 767) {
            let x = e.clientX / window.innerWidth
            let y = e.clientY / window.innerHeight
            parallax[i].style.transform = `translate(-${x * force}px, -${y * force}px)`
        } else {
            return false
        }
    })
}

