//Menu
const menuBtn = document.querySelector('.menu-toggle')
const navlist = document.querySelector('.header__brand-links')

menuBtn.onclick = () => {
  navlist.classList.toggle('active')
}

let parallax = document.querySelectorAll('.parallax')
const force = 20

for (let i = 0; i < parallax.length; i++){
	window.addEventListener('mousemove', function(e) { 
    if (window.innerWidth < 1000) return false
		let x = e.clientX / window.innerWidth
		let y = e.clientY / window.innerHeight
		parallax[i].style.transform = `translate(-${x*force}px, -${y*force}px)`
	});	
}

function dropdown(e) {
  const el = e.parentElement.children[2];
  
  el.classList.toggle("show")
}

function select(e, a) {
	e.parentElement.parentElement.children[0].children[0].children[0].setAttribute("src", `./assets/icons/${a}.svg`)
}

function openModal(id) {
	document.querySelector(`#${id}`).classList.add("show")
}
function closeModal(e) {
	e.parentElement.parentElement.classList.remove("show")
}



