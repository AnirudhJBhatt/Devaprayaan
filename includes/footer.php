    <footer class="py-3 text-light mt-auto">
        <div class="container text-center">
            <h6 class="text-uppercase fw-bold mb-4">Contact Info</h6>
            <div class="d-flex flex-wrap justify-content-center gap-4 mb-3">
                <span><i class="fas fa-map-marker-alt me-2"></i>7/124/1A, R G Pai Road, South Cherlai, Kochi - 682002</span>
                <span><i class="fas fa-phone me-2"></i><a href="tel:+919349612834">+91 93496 12834</a> <a href="tel:+918137879348">+91 81378 79348</a></span>
                <span><i class="fas fa-envelope me-2"></i><a href="mailto:devaprayaantoursandtravels@gmail.com">devaprayaantoursandtravels@gmail.com</a></span>
            </div>
            <div class="mt-3">
                <a href="#" class="me-2 social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="me-2 social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="me-2 social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="me-2 social-icon"><i class="fab fa-instagram"></i></a>
            </div>
            <hr class="border-light">
            <small>© 2025 <span class="fw-bold">Devaprayaan Tours and Travels</span>. All Rights Reserved.</small>
        </div>
    </footer>
    <!-- Bootstrap + AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });

        // Dark mode toggle logic
        const toggleBtn = document.getElementById('darkModeToggle');
        const body = document.body;

        // Save preference in localStorage
        function setDarkMode(on) {
            if (on) {
                body.classList.add('dark-mode');
                localStorage.setItem('devaprayaan-dark', '1');
            } else {
                body.classList.remove('dark-mode');
                localStorage.setItem('devaprayaan-dark', '0');
            }
        }

        // On load: check preference or system
        (function () {
            const saved = localStorage.getItem('devaprayaan-dark');
            if (saved === '1' || (saved === null && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                setDarkMode(true);
            }
        })();

        toggleBtn.addEventListener('click', function () {
            setDarkMode(!body.classList.contains('dark-mode'));
        });
    </script>