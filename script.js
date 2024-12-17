// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};


let addplayer=document.getElementById("add")
let forum=document.getElementById("player_form")
addplayer.addEventListener("click",()=>{
forum.style.display="block"
});

let addclub=document.getElementById("addc")
let forumC=document.getElementById("club_form")
addclub.addEventListener("click",()=>{
forumC.style.display="block"
});