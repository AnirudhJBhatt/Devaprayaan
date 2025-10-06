<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Devaprayaan Tours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body{
            background-color: #f8fafc;
        }
        .contact-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .title-style {
            font-weight: 700;
            font-size: 2rem;
            color: #0d6efd;
        }

        .contact-form .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
    </style>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="flex-grow-1">
        <div class="container mt-5 py-5">

            <!-- Contact Info Section -->
            <section class="py-5" id="contact">
                <div class="text-center mx-auto mb-5" style="max-width:600px;">
                    <p class="text-muted mb-1">Contact Us</p>
                    <h3 class="title-style">Get In Touch</h3>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Location -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-card text-center p-4 shadow-sm rounded h-100">
                            <div class="mb-3">
                                <i class="fas fa-map-marked-alt fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-2">Our Location</h5>
                            <p>7/124/1A, R G Pai Road, South Cherlai, Kochi - 682002</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-card text-center p-4 shadow-sm rounded h-100">
                            <div class="mb-3">
                                <i class="fas fa-mobile-alt fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-2">Give us a call</h5>
                            <p><a href="tel:+919349612834" class="text-decoration-none">+91 93496 12834</a></p>
                            <p><a href="tel:+918137879348" class="text-decoration-none">+91 81378 79348</a></p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-card text-center p-4 shadow-sm rounded h-100">
                            <div class="mb-3">
                                <i class="fas fa-envelope-open-text fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-2">Help Desk</h5>
                            <p><a href="mailto:devaprayaantoursandtravels@gmail.com" class="text-decoration-none">devaprayaantoursandtravels@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Map Section -->
            <section class="py-5">
                <div class="map shadow-sm rounded overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.720223340651!2d76.2497101!3d9.9572196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b086d007dd41047%3A0x312c177072f69e35!2sDevaprayaan%20Tours%20And%20Travels!5e0!3m2!1sen!2sin!4v1756894698656!5m2!1sen!2sin" 
                        width="100%" 
                        height="500" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </section>

            <!-- Contact Form Section -->
            <section class="py-5">
                <div class="text-center mx-auto mb-5" style="max-width:600px;">
                    <p class="text-muted mb-1">Send your Queries</p>
                    <h3 class="title-style">Drop Us A Line</h3>
                </div>

                <form action="" method="POST" class="row g-3 contact-form">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="subject" placeholder="Subject" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <textarea name="message" placeholder="Message" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </form>
            </section>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>
