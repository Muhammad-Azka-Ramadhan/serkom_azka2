document.addEventListener('DOMContentLoaded', function () {

    /* =========================
       SIDEBAR TOGGLE
    ========================= */

    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (!sidebarToggle || !sidebar || !overlay) {
        return;
    }

    sidebarToggle.addEventListener('click', function () {

        if (window.innerWidth <= 767) {

            // Mobile
            document.body.classList.toggle('sidebar-mobile-open');
            overlay.classList.toggle('show');

        } else {

            // Desktop
            document.body.classList.toggle('sidebar-collapsed');

        }

    });

    overlay.addEventListener('click', function () {

        document.body.classList.remove('sidebar-mobile-open');
        overlay.classList.remove('show');

    });

    window.addEventListener('resize', function () {

        if (window.innerWidth > 767) {
            document.body.classList.remove('sidebar-mobile-open');
            overlay.classList.remove('show');
        }

    });

});