document.querySelectorAll('.player-entry').forEach((entry) => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-[slide-in-left_0.5s_ease-in-out_forwards]');
                observer.unobserve(entry.target);
            }
        });
    });

    observer.observe(entry);
});