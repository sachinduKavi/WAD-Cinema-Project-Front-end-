const imageContainer = document.querySelector('.image-container');
const images = document.querySelector('.images');

imageContainer.addEventListener('wheel', (e) => {
    e.preventDefault();
    images.scrollLeft += e.deltaY;
});