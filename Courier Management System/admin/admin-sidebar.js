document.addEventListener('DOMContentLoaded', () => {
    const sidebarLinks = document.querySelectorAll('.admin-sidebar-nav a');
    sidebarLinks.forEach(link => {
        const linkPath = link.getAttribute('href');
        if (window.location.pathname.endsWith(linkPath)) {
            link.classList.add('active');
        }
    });
});
