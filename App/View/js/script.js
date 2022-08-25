function mudarCor1(indice){
                        
    let item = document.querySelectorAll(".link");
    let descricao = document.querySelectorAll(".descricao");
    let icon = document.querySelectorAll(".icon-menu");
    descricao[indice].style.color = "#D9910D";
    icon[indice].src = `img/image-s${indice}.png`;



}

function mudarCor2(indice){
    let descricao = document.querySelectorAll(".descricao");
    let icon = document.querySelectorAll(".icon-menu");
    descricao[indice].style.color = "#8C4D16";
    icon[indice].src = `img/image-p${indice}.png`;


}