async function ApiGithub(){
    const responseApi = await fetch("https://api.github.com/users/victorhumbert/repos");
    const dadosJSON =  await responseApi.json();

    const lekaRepositorio = await dadosJSON[6];

    console.log(lekaRepositorio)

    // await dadosJSON.forEach(itens => {
    //     console.log(itens[6])
    // });
}
// blob/main/capa.png

// https://raw.githubusercontent.com/Victorhumbert/LekaCorretora.github.io/main/capa.png

// https://github.com/Victorhumbert/LekaCorretora.github.io/blob/main/capa.png