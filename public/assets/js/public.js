document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       NAVBAR SCROLL
    ===================================================== */

    const navbar = document.querySelector(".public-navbar");

    function updateNavbar() {
        if (!navbar) return;

        if (window.scrollY > 25) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }

    updateNavbar();

    window.addEventListener("scroll", updateNavbar, {
        passive: true
    });


    /* =====================================================
       SCROLL REVEAL
    ===================================================== */

    const revealElements = document.querySelectorAll(".reveal");

    if ("IntersectionObserver" in window) {

        const revealObserver = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);

                });

            },
            {
                threshold: 0.12,
                rootMargin: "0px 0px -45px 0px"
            }
        );

        revealElements.forEach(function (element) {
            revealObserver.observe(element);
        });

    } else {

        revealElements.forEach(function (element) {
            element.classList.add("is-visible");
        });

    }


    /* =====================================================
       COUNTER ANIMATION
    ===================================================== */

    const counters = document.querySelectorAll(".counter");

    function animateCounter(element) {

        const target = parseInt(
            element.dataset.target || "0",
            10
        );

        if (target <= 0) {
            element.textContent = "0";
            return;
        }

        const duration = 1100;
        const startTime = performance.now();

        function updateCounter(currentTime) {

            const progress = Math.min(
                (currentTime - startTime) / duration,
                1
            );

            const easedProgress =
                1 - Math.pow(1 - progress, 3);

            const currentValue = Math.floor(
                easedProgress * target
            );

            element.textContent =
                currentValue.toLocaleString("id-ID");

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent =
                    target.toLocaleString("id-ID");
            }
        }

        requestAnimationFrame(updateCounter);
    }


    if ("IntersectionObserver" in window) {

        const counterObserver = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) {
                        return;
                    }

                    animateCounter(entry.target);

                    observer.unobserve(entry.target);

                });

            },
            {
                threshold: 0.5
            }
        );

        counters.forEach(function (counter) {
            counterObserver.observe(counter);
        });

    } else {

        counters.forEach(function (counter) {
            animateCounter(counter);
        });

    }


    /* =====================================================
       CLOSE MOBILE NAVBAR AFTER CLICK
    ===================================================== */

    const navLinks = document.querySelectorAll(
        ".public-navbar .nav-link"
    );

    const navbarCollapse =
        document.querySelector("#publicNavbar");

    if (navbarCollapse && window.bootstrap) {

        const collapseInstance =
            bootstrap.Collapse.getOrCreateInstance(
                navbarCollapse,
                {
                    toggle: false
                }
            );

        navLinks.forEach(function (link) {

            link.addEventListener("click", function () {

                if (
                    window.innerWidth < 992 &&
                    navbarCollapse.classList.contains("show")
                ) {
                    collapseInstance.hide();
                }

            });

        });

    }


    /* =====================================================
       SMOOTH ANCHOR
    ===================================================== */

    document.querySelectorAll(
        'a[href^="#"]'
    ).forEach(function (link) {

        link.addEventListener("click", function (event) {

            const targetId =
                this.getAttribute("href");

            if (
                !targetId ||
                targetId === "#"
            ) {
                return;
            }

            const target =
                document.querySelector(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            const navbarHeight =
                navbar
                    ? navbar.offsetHeight
                    : 0;

            const targetPosition =
                target.getBoundingClientRect().top +
                window.scrollY -
                navbarHeight -
                15;

            window.scrollTo({
                top: targetPosition,
                behavior: "smooth"
            });

        });

    });

});