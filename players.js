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



