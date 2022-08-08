var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
showSlides(slideIndex += n);
  }

function currentSlide(n) {
showSlides(slideIndex = n);
}    

function showSlides(n) {
var i;
var slides = document.getElementsByClassName("slidet");
var dots = document.getElementsByClassName("thumbnail");

if (n > slides.length) {slideIndex = 1}   
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
slides[i].classList.remove("active");  
}

for (i = 0; i < dots.length; i++) {
dots[i].classList.remove("active");
}
slides[slideIndex-1].classList.add("active"); 
dots[slideIndex-1].classList.add("active");

} ;