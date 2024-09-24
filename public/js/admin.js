const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

// date time 
const dateTime = document.querySelector('.date')

setInterval(()=>{
	dateTime.innerHTML = moment().format("MMMM D YYYY, dddd, h:mm:ss A");
}, 1000)

document.querySelector('.profile-img').addEventListener('click', function(){
	
});

// alert 
if(document.querySelector('.alert-close')){
	document.querySelector('.alert-close').addEventListener('click', function(){
		document.querySelector('.alert-container').style.display  = "none";
	});
}
