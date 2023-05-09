const buttons = document.querySelectorAll("[data-carousel-button]");

buttons.forEach(button => {
	button.addEventListener("click", () => {
		const offset = button.dataset.carouselButton === "next" ? 1 : -1
		const slides = button.closest("[data-carousel]").querySelector("[data-slides]")

		const activeSlide = slides.querySelector("[data-active]")
		let newIndex = [...slides.children].indexOf(activeSlide) + offset
		if (newIndex < 0) newIndex = slides.children.length - 1
		if (newIndex >= slides.children.length) newIndex = 0

		
		slides.children[newIndex].dataset.active = true
		delete activeSlide.dataset.active
	})
})



function signUp() {
    let signBtn = document.getElementById("signUp-block");
    signBtn.style.display = "block";
	signBtn.style.zIndex = "1000";

	let mainContainer = document.getElementById("mainContainer");
	mainContainer.style.opacity = "0.5";
    }
function exit() {
    let exitBtn = document.getElementById("signUp-block"); {
    exitBtn.style.display = "none";
	let mainContainer = document.getElementById("mainContainer");
	mainContainer.style.opacity = "1";
	}
}

//functions 
function openMenu() {
    let open = document.getElementById("menu-navigation");
    open.style.zIndex = "1001";
    open.style.left = "0";
    }
function exitMenu() {
    let exit = document.getElementById("menu-navigation"); {
    exit.style.left = "-999px";
    exit.style.zIndex = "-1";
	}
}

const departmentNav = document.querySelectorAll("[data-tab-target]")
const tabContents = document.querySelectorAll("[data-tab-content]")

departmentNav.forEach(tab => {
	tab.addEventListener('click', () => {
	const target = document.querySelector(tab.dataset.tabTarget)
	target.classList.add('active')
    })
});


const ceatNavTab = document.querySelectorAll('[data-tab-second-target]')
const ceatNavContents = document.querySelectorAll('[data-tab-second-content]')

ceatNavTab.forEach(tab => {
    tab.addEventListener('click', () => {
        const secondtarget = document.querySelector(tab.dataset.tabSecondTarget)
        ceatNavContents.forEach(NavContent => (NavContent.classList.remove('active')))
        secondtarget.classList.add('active')
    })
})

function exitTab() {
    tabContents.forEach(tabContent => (tabContent.classList.remove('active')))
    ceatNavContents.forEach(NavContent => (NavContent.classList.remove('active')))
    libraryContents.forEach(libraryContent => (libraryContent.classList.remove('active')))
}


const libraryChoices = document.querySelectorAll('[data-tab-third-target]')
const libraryContents = document.querySelectorAll('[data-tab-third-content]')

libraryChoices.forEach(tab => {
    tab.addEventListener('click', () => {
        const thirdtarget = document.querySelector(tab.dataset.tabThirdTarget)
        libraryContents.forEach(libraryContent => (libraryContent.classList.remove('active')))
        thirdtarget.classList.add('active')
    })
})


const dropDownButton = document.querySelectorAll('[data-tab-fourth-target]')
const dropDownContents = document.querySelectorAll('[data-tab-fourth-content]')

dropDownButton.forEach(tab => {
    tab.addEventListener('click', () => {
        const fourthtarget = document.querySelector(tab.dataset.tabFourthTarget)
        dropDownContents.forEach(dropDownContent => (dropDownContent.classList.remove('active')))
        fourthtarget.classList.add('active')
    })
})
