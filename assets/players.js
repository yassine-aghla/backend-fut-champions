// let list = document.querySelectorAll(".navigation li");

// function activeLink() {
//   list.forEach((item) => {
//     item.classList.remove("hovered");
//   });
//   this.classList.add("hovered");
// }

// list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
// let toggle = document.querySelector(".toggle");
// let navigation = document.querySelector(".navigation");
// let main = document.querySelector(".main");

// toggle.onclick = function () {
//   navigation.classList.toggle("active");
//   main.classList.toggle("active");
// };





// document.addEventListener("DOMContentLoaded", () => {
//   const positionSelect = document.getElementById("position");
//   const avisPlayer = document.getElementById("avis_player");
//   const avisGardien = document.getElementById("avis_gardien");

//   function updateFormDisplay() {
//     console.log(yassine);
    
//     const selectedPosition = positionSelect.value;

//     if (selectedPosition === "GK") {
//       avisPlayer.style.display = "none";
//       avisGardien.style.display = "block";
//     } else {
//       avisPlayer.style.display = "block";
//       avisGardien.style.display = "none";
//     }
//   }

//   positionSelect.addEventListener("change", updateFormDisplay());

  

// });



const position = document.getElementById('position');
 
  position.addEventListener('change', () => {
    const divGk = document.querySelector('#avis_gardien');
    const divPlayer = document.querySelector('#avis_player');
      const selectedValue = position.value;
      console.log(selectedValue);
      console.log(divGk)
  if(selectedValue === "GK") {
      divGk.style.display = "block";
      divPlayer.style.display = "none";
  } else { 
      divPlayer.style.display = "block";
      divGk.style.display = "none"
  }
      
});



function showUpdateForm(player) {
  // Récupérez les éléments du formulaire
  const updateForm = document.getElementById('update-form');
  const playerIdField = document.getElementById('player_id');
  const isGoalkeeperField = document.getElementById('is_goalkeeper');
  const playerNameField = document.getElementById('player_name');
  const positionField = document.getElementById('position');
  const ratingField = document.getElementById('rating');
  
  // Champs spécifiques
  const fieldPlayerStats = document.getElementById('field-player-stats');
  const goalkeeperStats = document.getElementById('goalkeeper-stats');

  // Pré-remplir les champs communs
  playerIdField.value = player.player_id;
  isGoalkeeperField.value = player.is_goalkeeper;
  playerNameField.value = player.name;
  positionField.value = player.position;
  ratingField.value = player.rating;

  // Afficher ou masquer les champs spécifiques
  if (player.is_goalkeeper === "1") {
      goalkeeperStats.style.display = 'block';
      fieldPlayerStats.style.display = 'none';

      // Pré-remplir les champs spécifiques aux gardiens
      document.getElementById('diving').value = player.diving;
      document.getElementById('handling').value = player.handling;
      document.getElementById('kicking').value = player.kicking;
      document.getElementById('reflexes').value = player.reflexes;
      document.getElementById('speed').value = player.speed;
      document.getElementById('positioning').value = player.positioning;
  } else {
      goalkeeperStats.style.display = 'none';
      fieldPlayerStats.style.display = 'block';

      // Pré-remplir les champs spécifiques aux joueurs de champ
      document.getElementById('pace').value = player.pace;
      document.getElementById('shooting').value = player.shooting;
      document.getElementById('dribbling').value = player.dribbling;
      document.getElementById('passing').value = player.passing;
      document.getElementById('defending').value = player.defending;
      document.getElementById('physical').value = player.physical;
  }

  // Afficher le formulaire
  updateForm.style.display = 'block';
}
