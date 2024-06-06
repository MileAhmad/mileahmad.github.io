const tombol = document.getElementById("menulabel");
const menu = document.getElementsByClassName('menu')[0];

	tombol.addEventListener('click', function() {
	menu.classList.toggle('hide');
	console.log('ok');
})