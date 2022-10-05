const balise1 = document.querySelector(".content_top");
const balise2 = document.querySelector(".content_middle");
const balise3 = document.querySelector(".content_bottom");
content1 = document.getElementById("text1");
content2 = document.getElementById("text2");
content3 = document.getElementById("text3");

balise1.addEventListener("click", () => {
  balise1.style.background = "#EEEEEE";
  balise2.style.background = "#00ADB5";
  balise3.style.background = "#00ADB5";
  balise1.style.height = "400px";
  balise2.style.height = "60px";
  balise3.style.height = "60px";
  content1.style.transition = "all 1.5s ease";
  content1.style.opacity = "1";
  console.log(content1);
});

balise1.addEventListener("click", () => {
  content2.style.opacity = "0";
  content3.style.opacity = "0";
  content2.style.transition = "all 0s ease";
  content3.style.transition = "all 0s ease";
});

balise2.addEventListener("click", () => {
  balise2.style.background = " #EEEEEE";
  balise1.style.background = "#00ADB5";
  balise3.style.background = "#00ADB5";
  balise2.style.height = "400px";
  balise1.style.height = "60px";
  balise3.style.height = "60px";
  content2.style.transition = "all 1.5s ease";
  content2.style.opacity = "1";
});

balise2.addEventListener("click", () => {
  content1.style.opacity = "0";
  content3.style.opacity = "0";
  content1.style.transition = "all 0s ease";
  content3.style.transition = "all 0s ease";
});

balise3.addEventListener("click", () => {
  balise3.style.background = "#EEEEEE";
  balise1.style.background = "#00ADB5";
  balise2.style.background = "#00ADB5";
  balise3.style.height = "400px";
  balise1.style.height = "60px";
  balise2.style.height = "60px";
  content3.style.transition = "all 1.5s ease";
  content3.style.opacity = "1";
});

balise3.addEventListener("click", () => {
  content1.style.opacity = "0";
  content2.style.opacity = "0";
  content1.style.transition = "all 0s ease";
  content2.style.transition = "all 0s ease";
});
