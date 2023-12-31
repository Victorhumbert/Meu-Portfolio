export default async function navMenu() {
	const navMenu = document.querySelector("[data-navMenu]");

	function abrirMenu(menu) {
		const dropDownMenu = document.querySelector(".info-header");
		if (menu.type === "click") {
			dropDownMenu.classList.toggle("ativo");
			navMenu.classList.toggle("ativo");
		} else {
			dropDownMenu.classList.add("ativo");
			navMenu.classList.add("ativo");
		}
		return;
	}

	navMenu.addEventListener("click", abrirMenu);
	navMenu.addEventListener("keyup", abrirMenu);
}
