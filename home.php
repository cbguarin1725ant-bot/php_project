<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nails Haus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAVIGATION -->
    <header>
        <div class="navbar">
            <div class="logo">
                <h2>Nails Haus</h2>
                <span>by dhes</span>
            </div>
            <nav>
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#gallery">Gallery</a>
                <a href="#contact">Contact</a>
            </nav>
            <a href="#booking" class="book-button">Book Now</a>
        </div>
    </header>

    <!-- HOME -->
    <section id="home" class="hero">
        <div class="hero-content">
            <p class="subtitle">BEAUTY • CARE • CONFIDENCE</p>
            <h1>Color your day,<br>Slay your nails.</h1>
            <p>Treat yourself to stunning, long-lasting nail designs with a touch of elegance and care.</p>
            <div class="hero-buttons">
                <a href="#booking" class="button">Book Appointment</a>
                <a href="#services" class="button outline">View Services</a>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="section about">
        <div class="about-container">
            <div class="about-image">
                <img src="images/nails5.jpg" alt="Red and gold nail design">
            </div>
            <div class="about-text">
                <p class="section-title">WELCOME</p>
                <h2>Your Beauty,<br>Our Passion.</h2>
                <p>I started my nail business in April 2025. At first, doing nails was only a hobby for me, but as I continued practicing, I decided to turn it into a small business.</p>
                <p>I wanted to earn extra money while also improving and enhancing my nail skills. Through this business, I get to do something I enjoy while providing quality nail services to my clients.</p>
                <a href="#services" class="text-link">Explore Our Services →</a>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="section services">
        <div class="section-header">
            <p class="section-title">WHAT WE OFFER</p>
            <h2>Our Services</h2>
            <p>Choose from our selection of nail care services.</p>
        </div>
        <div class="service-container">
            <div class="service-card">
                <div class="icon">💅</div>
                <h3>Gel Polish</h3>
                <p>Smooth, glossy color for a clean and polished look.</p>
                <a href="#booking">Book Service →</a>
            </div>
            <div class="service-card">
                <div class="icon">💅</div>
                <h3>Softgel Extension</h3>
                <p>Add length and shape with lightweight softgel extensions.</p>
                <a href="#booking">Book Service →</a>
            </div>
            <div class="service-card">
                <div class="icon">💅</div>
                <h3>Softgel Extension Removal</h3>
                <p>Careful removal to keep your natural nails protected.</p>
                <a href="#booking">Book Service →</a>
            </div>
        </div>
    </section>

    <!-- FEATURE -->
    <section class="feature">
        <div class="feature-container">
            <div class="feature-text">
                <p class="section-title">OUR SPECIALTY</p>
                <h2>ANY DESIGN 649</h2>
                <p>Your dream nails are calling! Get ANY DESIGN for only ₱649 and let your nails be the main character.</p>
                <ul>
                    <li>PROMO RUNS: OCTOBER 1 - NOVEMBER 15</li>
                    <li>Limited slots only - don't miss out</li>
                </ul>
                <a href="#booking" class="button">Book Here</a>
            </div>
            <div class="feature-image">
                <img src="https://images.unsplash.com/photo-1610992015732-2449b76344bc?auto=format&fit=crop&w=900&q=80" alt="Gel nails">
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section id="gallery" class="section gallery">
        <div class="section-header">
            <p class="section-title">OUR WORK</p>
            <h2>Nail Designs</h2>
            <p>Get inspired by our beautiful nail designs.</p>
        </div>
        <div class="gallery-container">
            <div class="gallery-item"><img src="images/nails7.jpg" alt="Gold floral nail design"></div>
            <div class="gallery-item"><img src="images/nails5.jpg" alt="Red and gold nail design"></div>
            <div class="gallery-item"><img src="images/nails10.jpg" alt="Burgundy floral nail design"></div>
            <div class="gallery-item"><img src="images/nails9.jpg" alt="White dotted nail design"></div>
            <div class="gallery-item"><img src="images/nails8.jpg" alt="Red dotted nail design"></div>
            <div class="gallery-item"><img src="images/nails6.jpg" alt="Black and white dotted nail design"></div>
            <div class="gallery-item"><img src="images/nails4.jpg" alt="Burgundy and gold nail design"></div>
            <div class="gallery-item"><img src="images/nails3.jpg" alt="Pink floral nail design"></div>
            <div class="gallery-item"><img src="images/nails2.jpg" alt="Mixed charm nail design"></div>
            <div class="gallery-item"><img src="images/nails1.jpg" alt="Pink and white floral nail design"></div>
        </div>
    </section>

    <!-- BOOKING -->
    <section id="booking" class="booking">
        <div class="booking-container">
            <div class="booking-text">
                <p class="section-title">BOOK AN APPOINTMENT</p>
                <h2>Ready for<br>Beautiful Nails?</h2>
                <p>Fill out the form to request your appointment.</p>
            </div>
            <div class="booking-form">
                <?php if (isset($_GET['booked'])): ?>
                    <div class="success-message">Thank you! Your request was sent. We'll message you to confirm.</div>
                <?php endif; ?>

                <?php if (!empty($_GET['invalid'])): ?>
                    <div class="success-message"><?= htmlspecialchars($_GET['invalid']) ?></div>
                <?php endif; ?>

                <form action="booking.php" method="POST">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>

                    <label for="phone">Mobile Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="09XX XXX XXXX" required>

                    <label for="email">Email (optional)</label>
                    <input type="email" id="email" name="email" placeholder="Your Email">

                    <label for="service">Select Service</label>
                    <select id="service" name="service" required>
                        <option value="">Choose a service</option>
                        <option value="Gel Polish">Gel Polish</option>
                        <option value="Softgel Extension">Softgel Extension</option>
                        <option value="Softgel Extension Removal">Softgel Extension Removal</option>
                    </select>

                    <label for="date">Appointment Date</label>
                    <input type="date" id="date" name="date" min="<?= date('Y-m-d') ?>" required>

                    <label for="time">Time</label>
                    <select id="time" name="time" required>
                        <option value="">Choose a time</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                    </select>

                    <button type="submit" class="submit-button">Request Appointment</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="contact">
        <div class="footer-container">
            <div class="footer-about">
                <div class="footer-logo">
                    <h2>Nails Haus</h2>
                    <span>BY DHES</span>
                </div>
                <p>Beautiful nails, relaxing moments, and confidence in every detail.</p>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#gallery">Gallery</a>
            </div>
            <div class="footer-column">
                <h3>Services</h3>
                <a href="#services">Gel Polish</a>
                <a href="#services">Softgel Extension</a>
                <a href="#services">Softgel Extension Removal</a>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>📍 Cainta Rizal</p>
                <p>☎ 0917-000-0000</p>
                <p>✉ hello@nailsalon.com</p>
            </div>
        </div>
        <div class="copyright">
            <p>© <?php echo date("Y"); ?> Nails Haus. All Rights Reserved.</p>
        </div>
    </footer>
    <?php if (isset($_GET['booked'])): ?>
    <script>alert("Booking Successfully");</script>
    <?php endif; ?>
</body>

</body>
</html>