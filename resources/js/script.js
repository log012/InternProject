const pathName = window.location.pathname;
console.log(pathName);
const navLinks = document.querySelectorAll('.navbar-button');
navLinks.forEach(link => {
    console.log(link.href);
    if (link.href.includes(pathName) ) {
        link.classList.add('active');
    }
});