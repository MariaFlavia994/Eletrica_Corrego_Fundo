function moveSlide(index) {
    let totalSlides = document.querySelectorAll('.slide').length;
    let percentage = 100 / totalSlides; // Divide corretamente o espaço de cada slide
    document.querySelector('.carousel').style.transform = `translateX(-${index * percentage}%)`;
}


