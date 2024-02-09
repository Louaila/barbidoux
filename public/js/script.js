function monProfil() {
    document.getElementById("modifUser").style.display = "block";
    document.getElementById("modifUser").style.display = "flex";
    document.getElementById("mesRandos").style.display = "none";
    document.getElementById("Objectifs").style.display = "none";
    document.getElementById("bMesObj").style.backgroundColor = "#C68D5E";
    document.getElementById("bMesRandos").style.backgroundColor = "#C68D5E";
    document.getElementById("bProfil").style.backgroundColor = "#DC5527";
}
document.getElementById("bProfil").addEventListener("click", monProfil);

function mesObj() {
    document.getElementById("Objectifs").style.display = "block";
    document.getElementById("bMesRandos").style.backgroundColor = "#C68D5E";
    document.getElementById("mesRandos").style.display = "none";
    document.getElementById("bProfil").style.backgroundColor = "#C68D5E";
    document.getElementById("modifUser").style.display = "none";
    document.getElementById("bMesObj").style.backgroundColor = "#DC5527";
}
document.getElementById("bMesObj").addEventListener("click", mesObj);

function mesRando() {
  document.getElementById("mesRandos").style.display = "block";
  document.getElementById("bMesObj").style.backgroundColor = "#C68D5E";
  document.getElementById("Objectifs").style.display = "none";
  document.getElementById("bProfil").style.backgroundColor = "#C68D5E";
  document.getElementById("modifUser").style.display = "none";
  document.getElementById("bMesRandos").style.backgroundColor = "#DC5527";
}
document.getElementById("bMesRandos").addEventListener("click", mesRando);


// JS RandoDetail
let acc = document.getElementsByClassName("accordion");
let i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    let panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
} 

// JS PAGE CONSEIL 

function conseils() {
  document.getElementById("focusConseils_1").style.display = "block";
  document.getElementById("focusConseils_2").style.display = "none";
  document.getElementById("focusConseils_3").style.display = "none";
}

document.getElementById("buttonEquipements").addEventListener("click", conseils);

function conseils_2() {
  document.getElementById("focusConseils_2").style.display = "block";
  document.getElementById("focusConseils_1").style.display = "none";
  document.getElementById("focusConseils_3").style.display = "none";
}

document.getElementById("buttonSante").addEventListener("click", conseils_2);

function conseils_3() {
  document.getElementById("focusConseils_3").style.display = "block";
  document.getElementById("focusConseils_2").style.display = "none";
  document.getElementById("focusConseils_1").style.display = "none";
}


document .getElementById("buttonTousNosConseils").addEventListener("click", conseils_3);


/*********************************meentions legales*****************************************************/
document.addEventListener('keydown', function(event) {
  if (event.key === "ArrowDown") {
      scrollDown();
  }
});

function scrollDown() {
  var scrollSection = document.getElementById('scrollSection');
  scrollSection.scrollTop += 70; // 
}
/***************************************fin mentions legales********************************************/