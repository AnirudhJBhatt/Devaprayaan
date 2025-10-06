<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Details - Devaprayaan Tours</title>
</head>

<body>
    <?php include '../includes/user-header.php'; ?>

    <?php
    // Dummy data (replace with DB later)
    $packages = [
        1 => [
            "title" => "Discovery Best Tours",
            "price" => "3500",
            "duration" => "10 Days",
            "location" => "Central Park West NY, USA",
            "image" => "assets/images/s1.jpg",
            "description" => "Experience the best of New York with guided tours, cultural attractions, and stunning sights.",
            "highlights" => ["City sightseeing", "Luxury hotel stay", "Guided tours", "Free breakfast included"]
        ],
        2 => [
            "title" => "Adventure Mountain Trek",
            "price" => "5500",
            "duration" => "7 Days",
            "location" => "Himalayas, India",
            "image" => "assets/images/s2.jpg",
            "description" => "A thrilling mountain trek with camping, local food, and breathtaking landscapes.",
            "highlights" => ["Trekking with guide", "Camping nights", "Local food experience", "Scenic photography"]
        ]
    ];

    $id = $_GET['id'] ?? 1;
    $package = $packages[$id] ?? $packages[1];
  ?>

    <!-- Hero Section -->
    <section class="text-white text-center d-flex align-items-center justify-content-center"
        style="background: url('<?php echo $package['image']; ?>') center/cover no-repeat; height: 60vh; position: relative;">
        <div class="overlay"
            style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
        </div>
        <div class="position-relative z-1">
            <h1 class="fw-bold" data-aos="fade-up">
                <?php echo $package['title']; ?>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-map-marker-alt"></i>
                <?php echo $package['location']; ?> |
                <i class="far fa-clock"></i>
                <?php echo $package['duration']; ?>
            </p>
            <h3 class="mt-3 text-warning" data-aos="zoom-in">From Rs
                <?php echo $package['price']; ?>
            </h3>
        </div>
    </section>

    <!-- Package Details -->
    <section class="container py-5">
        <div class="row g-5">
            <div class="col-lg-10 mx-auto" data-aos="fade-up">
                <h2>About this Package</h2>
                <p>
                    <?php echo $package['description']; ?>
                </p>

                <h4 class="mt-4">Highlights</h4>
                <ul class="list-unstyled">
                    <?php foreach($package['highlights'] as $point): ?>
                    <li><i class="fas fa-check-circle text-success"></i>
                        <?php echo $point; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <h4 class="mt-4">Itinerary (Sample)</h4>
                <div class="accordion" id="itineraryAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#day1">
                                Day 1 - Arrival & City Tour
                            </button>
                        </h2>
                        <div id="day1" class="accordion-collapse collapse show" data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">Welcome to your destination! Airport pickup and guided city
                                sightseeing.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#day2">
                                Day 2 - Adventure & Activities
                            </button>
                        </h2>
                        <div id="day2" class="accordion-collapse collapse" data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">Exciting activities and local cultural experiences.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Booking Form Section -->
    <section class="bg-light py-5" id="booking-form">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Book This Tour</h2>
                <p class="text-muted">Add details of all passengers below</p>
            </div>

            <form class="shadow p-4 rounded bg-white" id="passengerForm" method="post" action="submit-booking.php">
                <input type="hidden" name="package_id" value="<?php echo $id; ?>">

                <!-- Passenger Fields Container -->
                <div id="passengerContainer">
                    <!-- Passenger 1 -->
                    <div class="row g-3 passenger-item mb-4 border rounded p-3">
                        <h5>Passenger 1</h5>
                        <div class="col-md-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Age</label>
                            <input type="number" name="age[]" class="form-control" min="1" placeholder="Age" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender[0]" value="Male" required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender[0]" value="Female" required>
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender[0]" value="Other" required>
                                <label class="form-check-label">Other</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Phone No.</label>
                            <input type="tel" name="phone[]" class="form-control" placeholder="Enter phone number"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Add Passenger Button -->
                <div class="text-center mb-3">
                    <button type="button" id="addPassenger" class="btn btn-outline-primary">
                        <i class="fas fa-user-plus"></i> Add More Passenger
                    </button>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane"></i> Submit Booking
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        let passengerCount = 1;
        const passengerContainer = document.getElementById("passengerContainer");
        const addPassengerBtn = document.getElementById("addPassenger");

        addPassengerBtn.addEventListener("click", function () {
            const index = passengerCount; // unique index for radio names
            passengerCount++;

            const newPassenger = document.createElement("div");
            newPassenger.classList.add("row", "g-3", "passenger-item", "mb-4", "border", "rounded", "p-3");
            newPassenger.innerHTML = `
        <h5>Passenger ${passengerCount}</h5>
        <div class="col-md-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
        </div>
        <div class="col-md-2">
          <label class="form-label">Age</label>
          <input type="number" name="age[]" class="form-control" min="1" placeholder="Age" required>
        </div>
        <div class="col-md-4">
        <label class="form-label d-block">Gender</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender[${index}]" value="Male" required>
            <label class="form-check-label">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender[${index}]" value="Female" required>
            <label class="form-check-label">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender[${index}]" value="Other" required>
            <label class="form-check-label">Other</label>
          </div>
        </div>
        <div class="col-md-3">
          <label class="form-label">Phone No.</label>
          <input type="tel" name="phone[]" class="form-control" placeholder="Enter phone number" required>
        </div>
      `;
            passengerContainer.appendChild(newPassenger);
        });
    </script>

    <?php include '../includes/footer.php'; ?>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
</body>

</html>