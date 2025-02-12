const images = document.querySelectorAll(".conteneur-images img");
const suivante = document.querySelector(".droite");
const precedente = document.querySelector(".gauche");
const cercles = document.querySelectorAll(".cercle");
let index = 0;

suivante.addEventListener('click', changerSuivante);

function changerSuivante(){
    if (index < 2) {
        images[index].classList.remove("actif");
        index++;
        images[index].classList.add("actif");
    }
    else if (index === 2) {
        images[index].classList.remove("actif");
        index = 0;
        images[index].classList.add("actif");
    }
    // actualisé les cercles par rapport aux images
    for (i = 0; i < cercles.length; i++){
        if (cercles[i].getAttribute("data-clic") - 1  === index){
            cercles[i].classList.add("actif-cercle");
        }   
        else{
            cercles[i].classList.remove("actif-cercle");
        
        }
    }
}
precedente.addEventListener("click", changerPrecedente)

function changerPrecedente(){
    if (index > 0) {
        images[index].classList.remove("actif");
        index--;
        images[index].classList.add("actif");
    }
    else if (index === 0) {
        images[index].classList.remove("actif");
        index = 2;
        images[index].classList.add("actif");
    }
    // actualisé les cercles par rapport aux images
    for (i = 0; i < cercles.length; i++){
        if (cercles[i].getAttribute("data-clic") - 1  === index){
            cercles[i].classList.add("actif-cercle");
        }   
        else{
            cercles[i].classList.remove("actif-cercle");
    }
    
    }
}


document.addEventListener("keydown", presserTouche);

function presserTouche(e){
// www.keycode.info
if (e.keyCode === 37) {
    changerPrecedente();
} else if (e.keyCode === 39){
    changerSuivante();

} 
} 
//cercles

//fonction fleche

cercles.forEach((cercle) => {
    cercle.addEventListener("click", function(){
    for (i = 0; i < cercles.length; i++){
        cercles[i].classList.remove("actif-cercle");
        } 
        this.classList.add("actif-cercle");

        images[index].classList.remove("actif");
        index = this.getAttribute("data-clic") - 1;
        images[index].classList.add("actif");
    });
})