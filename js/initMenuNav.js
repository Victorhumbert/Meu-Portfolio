export default async function navMenu(){
    const navMenu = document.querySelector("[data-navMenu]");

    function abrirMenu(menu){
        const dropDownMenu = document.querySelector(".info-header")
        dropDownMenu.classList.toggle("ativo");
        navMenu.classList.toggle("ativo");
        return
    };

    navMenu.addEventListener("click", abrirMenu);

}