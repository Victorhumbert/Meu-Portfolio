async function ApiGithub() {
    const user = "Victorhumbert";
    try{
        const responseApi = await fetch(`https://api.github.com/users/${user}/repos`);
        
        if (!responseApi.ok) {
            throw new Error(`Erro ao obter dados da API. Status: ${responseApi.status}`);
        }
        const dadosJSON = await responseApi.json();
        const listaRepositorios = dadosJSON;

        async function initProjetos() {
            const listaProjetos = document.querySelector(".lista-projetos");

            listaRepositorios.forEach(async (repositorio) => {
                const nome = repositorio.name;
                const urlImg = `https://raw.githubusercontent.com/${user}/${nome}/main/capa.png`;
                const urlSite = `https://${user}.github.io/${nome}/`;
                const urlRepositorio = repositorio.html_url;

                function criarLista() {
                    const criarElemento = document.createElement("li");
                    criarElemento.setAttribute("class", "item-lista");
                    criarElemento.innerHTML = `<img src="${urlImg}" alt="${nome}" width="520" height="320" class="img-projeto">
                        <div>
                            <a href="${urlSite}" target="_blank" class="url-pagina">Página</a>
                            <a href="${urlRepositorio}" target="_blank" class="">Repositório</a>
                        </div>`;
                    listaProjetos.appendChild(criarElemento);
                }

                criarLista();
            });
        }

        await initProjetos();
    } catch(error) {
        console.error("Erro durante a requisição:", error.message);
    }
}

ApiGithub()
