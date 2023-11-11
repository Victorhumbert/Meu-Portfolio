async function ApiGithub(){
    const responseApi = await fetch("https://api.github.com/users/victorhumbert/repos");
    const dadosJSON =  await responseApi.json();

    await dadosJSON.forEach(itens => {
        console.log(itens.downloads_url)
    });
}
// blob/main/capa.png
