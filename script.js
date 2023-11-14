async function ApiGithub(){
    const user = "Victorhumbert";
    const responseApi = await fetch(`https://api.github.com/users/${user}/repos`);
    const dadosJSON =  await responseApi.json();

    const listaRepositorios = await dadosJSON.forEach(repositório => {
        const nome = repositório.name;
        const urlImg = `https://raw.githubusercontent.com/${user}/${nome}/main/capa.png`;
        const urlSite = `https://${user}.github.io/${nome}/`;
        const urlRepositorio = repositório.html_url;
        
async function initProjetos(){
    const listaProjetos = document.querySelector(".lista-projetos");
    function criarLista(){
        const criarElemento = document.createElement("li");
        criarElemento.innerHTML = `<img src="${urlImg}" alt="${nome}" width="520" height="320" class="img-projeto">
        <div>
            <a href="${urlSite}" target="_blank" class="url-pagina">Página</a>
            <a href="${urlRepositorio}" target="_blank" class="">Repositório</a>
        </div>`;
        return criarElemento;
    }
    criarLista()
    }
    initProjetos()
    });
}


