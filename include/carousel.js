
const text1_options = [
"We have officially launched!",
"Subscribe to our Instagram",
"Why bikes are better than public transport",
"We are hiring new developers to our team!"
];
const text2_options = [
"Our bikes and scooters are available in the city of Tallinn",
"We post interesting content",
"Read our Facebook article",
"Write on our email"
];
const color_options = ["#EBB9D2", "#FE9968", "#7FE0EB", "#6CE5B1"];
const image_options = [
"img/scooters2.jpg",
"img/instagramLogo.png",
"img/scooters4.jpg",
"img/scooters3.jpg",
];
var i = 0;
const currentOptionText1 = document.getElementById("current-option-text1");
const currentOptionText2 = document.getElementById("current-option-text2");
const currentOptionImage = document.getElementById("image");
const carousel = document.getElementById("carousel-wrapper");
const mainMenu = document.getElementById("carouselMenu");
const optionPrevious = document.getElementById("previous-option");
const optionNext = document.getElementById("next-option");

currentOptionText1.innerText = text1_options[i];
currentOptionText2.innerText = text2_options[i];
currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
mainMenu.style.background = color_options[i];
carousel.style.background = color_options[i];
optionNext.onclick = function () {
i = i + 1;
i = i % text1_options.length;
currentOptionText1.dataset.nextText = text1_options[i];

currentOptionText2.dataset.nextText = text2_options[i];

mainMenu.style.background = color_options[i];
carousel.style.background = color_options[i];
carousel.classList.add("anim-next");

setTimeout(() => {
currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
}, 455);

setTimeout(() => {
currentOptionText1.innerText = text1_options[i];
currentOptionText2.innerText = text2_options[i];
carousel.classList.remove("anim-next");
}, 650);
};

optionPrevious.onclick = function () {
if (i === 0) {
i = text1_options.length;
}
i = i - 1;
currentOptionText1.dataset.previousText = text1_options[i];

currentOptionText2.dataset.previousText = text2_options[i];

mainMenu.style.background = color_options[i];
carousel.style.background = color_options[i];
carousel.classList.add("anim-previous");

setTimeout(() => {
currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
}, 455);

setTimeout(() => {
currentOptionText1.innerText = text1_options[i];
currentOptionText2.innerText = text2_options[i];
carousel.classList.remove("anim-previous");
}, 650);
};

