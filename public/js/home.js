document.addEventListener("DOMContentLoaded", () => {

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    }, { threshold: 0.25 });

    document.querySelectorAll(
        ".fade-up, .fade-left, .fade-gallery, .cta-text, .cta-image, .hero-text, .hero-image"
    ).forEach(el => {
        el.classList.add("animate");
        observer.observe(el);
    });

});