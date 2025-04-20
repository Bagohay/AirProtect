
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIRPROTECH - AC Services & Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #24365a;
            --secondary-color: #dc3545;
        }
        
        body {
            font-family: 'Arial', sans-serif;
        }
        
        /* Top Bar */
        .top-bar {
            background-color: var(--primary-color);
            font-size: 0.9rem;
        }
        
        .top-bar a {
            transition: opacity 0.3s ease;
        }
        
        .top-bar a:hover {
            opacity: 0.8;
        }
        
        .social-links a {
            transition: transform 0.3s ease;
        }
        
        .social-links a:hover {
            transform: translateY(-2px);
        }
        
        /* Navigation */
        .navbar {
            padding: 1rem 0;
        }
        
        .navbar-brand .brand-text {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
        }
        
        .nav-link {
            color: var(--primary-color) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
        }
        
        .nav-link:hover {
            color: #3949ab !important;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(36, 54, 90, 0.8), rgba(13, 22, 62, 0.9)), url('/assets/images/ac-banner.jpg');
            background-size: cover;
            background-position: center;
            padding: 60px 0;
            min-height: 50vh;
            display: flex;
            align-items: center;
        }
        
        /* Section Titles */
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
        }
        
        /* Services */
        .services-section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }
        
        .service-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            height: 100%;
            transition: transform 0.3s;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(36, 54, 90, 0.1);
            color: var(--primary-color);
            border-radius: 50%;
            margin: 0 auto 20px;
            font-size: 1.8rem;
        }
        
        .service-card h5 {
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .btn-book {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }
        
        .btn-book:hover {
            background-color: #c82333;
            color: white;
        }
        
        /* Booking Process */
        .booking-process {
            padding: 60px 0;
            background-color: #fff;
        }
        
        .process-step {
            text-align: center;
            padding: 20px;
        }
        
        .step-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            margin: 0 auto 15px;
            font-size: 1.4rem;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }
        
        .contact-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .form-control {
            padding: 10px 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        
        .btn-send {
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 4px;
            font-weight: 500;
        }
        
        .btn-send:hover {
            background-color: #c82333;
        }
        
        /* Footer */
        .footer {
            background-color: #121212;
            color: #fff;
            padding: 50px 0 20px;
        }
        
        .footer h4 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            color: #aaa;
        }
        
        .social-icon {
            color: #aaa;
            margin-right: 15px;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-icon:hover {
            color: white;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 0;
            }
            
            .display-4 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="contact-info">
                <a href="tel:+1234567890" class="me-3 text-white text-decoration-none">
                    <i class="fas fa-phone me-2"></i>+1 234 567 890
                </a>
                <a href="mailto:contact@airprotech.com" class="text-white text-decoration-none">
                    <i class="fas fa-envelope me-2"></i>contact@airprotech.com
                </a>
            </div>
            <div class="social-links">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/images/Air-TechLogo.jpg" alt="Logo" class="rounded-circle me-2" width="40" height="40">
                <span class="brand-text">AIR<span style="color: #dc3545;">PROTECH</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Our Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">My Orders</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark rounded-pill ms-2" href="#">Jacob Smith</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3">Professional AC Services & Solutions</h1>
                    <p class="mb-4">Expert installation, maintenance, and repair services for all your air conditioning needs</p>
                    <a href="#" class="btn btn-danger rounded-1 px-4 py-2">Book Service Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                <!-- Installation -->
                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-tools fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Installation</h5>
                            <p class="card-text small text-muted">24/7 Professional Service</p>
                        </div>
                    </div>
                </div>
                
                <!-- Repair -->
                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-wrench fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Repair</h5>
                            <p class="card-text small text-muted">Expert Professional Service</p>
                        </div>
                    </div>
                </div>
                
                <!-- Maintenance -->
                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-cogs fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Maintenance</h5>
                            <p class="card-text small text-muted">24/7 Professional Service</p>
                        </div>
                    </div>
                </div>
                
                <!-- Emergency Service -->
                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-exclamation-circle fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Emergency Service</h5>
                            <p class="card-text small text-muted">24/7 Professional Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="services-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Our Services</h2>
            <div class="row g-4">
                <!-- AC Installation -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="service-icon mx-auto mb-4">
                                <i class="fas fa-tools"></i>
                            </div>
                            <h5 class="card-title fw-bold">AC Installation</h5>
                            <p class="card-text text-muted mb-4">Professional installation of all AC brands</p>
                            <a href="#" class="btn btn-primary btn-sm px-4">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- Repair & Maintenance -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="service-icon mx-auto mb-4">
                                <i class="fas fa-wrench"></i>
                            </div>
                            <h5 class="card-title fw-bold">Repair & Maintenance</h5>
                            <p class="card-text text-muted mb-4">Expert repair and regular maintenance services</p>
                            <a href="#" class="btn btn-primary btn-sm px-4">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- Emergency Services -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="service-icon mx-auto mb-4">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <h5 class="card-title fw-bold">Emergency Services</h5>
                            <p class="card-text text-muted mb-4">24/7 emergency repair and support</p>
                            <a href="#" class="btn btn-primary btn-sm px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mt-4">
                <!-- Parts Replacement -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="service-icon mx-auto mb-4">
                                <i class="fas fa-cog"></i>
                            </div>
                            <h5 class="card-title fw-bold">Parts Replacement</h5>
                            <p class="card-text text-muted mb-4">Genuine parts replacements</p>
                            <a href="#" class="btn btn-primary btn-sm px-4">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- System Upgrade -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="service-icon mx-auto mb-4">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <h5 class="card-title fw-bold">System Upgrade</h5>
                            <p class="card-text text-muted mb-4">Upgrade your AC system for better efficiency</p>
                            <a href="#" class="btn btn-primary btn-sm px-4">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- Regular Checkup -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="service-icon mx-auto mb-4">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h5 class="card-title fw-bold">Regular Checkup</h5>
                            <p class="card-text text-muted mb-4">Scheduled maintenance and inspection</p>
                            <a href="#" class="btn btn-primary btn-sm px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Process -->
    <section class="booking-process py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Simple Booking Process</h2>
            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-md-3">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        <h5 class="mt-3 mb-0">Choose Service</h5>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="col-md-3">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h5 class="mt-3 mb-0">Select Schedule</h5>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="col-md-3">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <h5 class="mt-3 mb-0">Provide Details</h5>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="col-md-3">
                    <div class="process-step">
                        <div class="step-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h5 class="mt-3 mb-0">Confirmation</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section class="contact-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Contact Us</h2>
            <div class="row g-4">
                <!-- Map -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="h-100" style="min-height: 350px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30596073366!2d-74.25986652089843!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1647043435011!5m2!1sen!2sus" 
                            width="100%" 
                            height="100%" 
                            style="border:0; border-radius: 8px;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <!-- Company Info -->
                <div class="col-lg-3 col-md-6">
                    <h4>AIR<span class="text-danger">PROTECH</span></h4>
                    <p class="text-muted mb-4">Your reliable partner for air conditioning services with a commitment to quality and customer satisfaction.</p>
                    <div class="social-links mb-4">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-3 col-md-6">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6">
                    <h4>Contact Info</h4>
                    <ul class="footer-links">
                        <li><i class="fas fa-phone me-2"></i> 1-800-AIR-COOL</li>
                        <li><i class="fas fa-envelope me-2"></i> info@airprotech.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Cooling Street, AC City</li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h4>Newsletter</h4>
                    <p class="text-muted mb-3">Subscribe for updates and special offers</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control bg-dark text-white border-0" placeholder="Your email">
                        <button class="btn btn-danger">Subscribe</button>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 AIRPROTECH. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>