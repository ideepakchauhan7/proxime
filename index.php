<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <a href="utilities/register.php" class="register-button">Register</a>
    <a href="utilities/loginpage.php" class="login-button">Login</a>
    <!-- <a href="utilities/face_register.php" class="login-button">Face Register</a> -->

    <!-- Image overlay -->
    <div class="background-container">
        <div class="background-overlay"></div>
        <div class="text">
            <h3>Welcome to Proxime</h3>
            <h6>A Real-Estate ERP System</h6>
        </div>
    </div>

    <!-- About Us Section -->
<div class="about-us">
    <h2 class="about-heading">About Us</h2>
    <p class="about-subtitle">Pioneering Real Estate Excellence</p>

    <div class="about-content">
        <div class="about-text">
            <h3>Our Mission and Values</h3>
            <p>
                At Proxime, our mission is to transform the real estate experience through innovation, transparency, and trust. 
                We are committed to delivering exceptional ERP solutions tailored for developers to enhance project management, 
                streamline operations, and achieve business goals effectively.
            </p>
            <p>
                By prioritizing technology, teamwork, and ethical practices, Proxime empowers real estate businesses to optimize 
                resources, make data-driven decisions, and build lasting client relationships. We ensure that every investment 
                and project journey is seamless, efficient, and rewarding.
            </p>
        </div>

        <!-- Images -->
        <div class="about-images">
            <img src="./images/flatimg3.jpg" alt="Team Meeting" class="about-img img-up">
            <img src="./images/img1.jpg" alt="Team Discussion" class="about-img img-down">
        </div>
    </div>
</div>


     <!-- Why Choose us?? -->

     <div class="why-proxime">
    <div class="why-proxime-content">
        <h2>Why Choose Proxime?</h2>
        <div class="card-container">
            <div class="card">
                <h3>Innovative Tools</h3>
                <p>Proxime provides cutting-edge tools to streamline your real estate operations, from property management to client relationships.</p>
            </div>
            <div class="card">
                <h3>Customizable Features</h3>
                <p>Tailor the ERP to your specific needs, offering flexibility that aligns with your business goals.</p>
            </div>
            <div class="card">
                <h3>User-Friendly Interface</h3>
                <p>A clean and intuitive interface that makes it easy for your team to adopt and navigate the system.</p>
            </div>
            <div class="card">
                <h3>Real-Time Data</h3>
                <p>Make informed decisions with real-time data updates and reports that give you accurate insights into your business performance.</p>
            </div>
            <div class="card">
                <h3>Scalability</h3>
                <p>Whether you're a small agency or a large enterprise, Proxime scales with your business as it grows.</p>
            </div>
        </div>
    </div>
</div>


<!-- Founders Section -->
<div class="founders">
    <div class="founders-content">
        <h2 class="team">Our Team</h2>
        <div class="founders-cards">
            <!-- Founder 1 -->
            <div class="founder-card">
                <div class="founder-image" style="background-image: url('images/developers/Charu.jpg');">
                    <div class="founder-overlay">
                        <h3>Charu Goswami</h3>
                        <p>Fullstack Developer</p>
                    </div>
                </div>
            </div>
            <!-- Founder 2 -->
            <div class="founder-card">
                <div class="founder-image" style="background-image: url('images/developers/Ansh.jpg');">
                    <div class="founder-overlay">
                        <h3>Ansh Verma</h3>
                        <p>Fullstack Developer</p>
                    </div>
                </div>
            </div>
            <!-- Founder 3 -->
            <div class="founder-card">
                <div class="founder-image" style="background-image: url('images/developers/ayush.jpg');">
                    <div class="founder-overlay">
                        <h3>Ayush Kumar Jha</h3>
                        <p>AI & ML Engineer</p>
                    </div>
                </div>
            </div>
            <!-- Founder 4 -->
            <div class="founder-card">
                <div class="founder-image" style="background-image: url('images/developers/Anchal.jpg');">
                    <div class="founder-overlay">
                        <h3>Anchal Bhandari</h3>
                        <p>Data Analyst</p>
                    </div>
                </div>
            </div>
            <!-- Founder 5 -->
            <div class="founder-card">
                <div class="founder-image" style="background-image: url('images/developers/deepak.jpg');">
                    <div class="founder-overlay">
                        <h3>Deepak Chauhan</h3>
                        <p>ML Engineer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="contact" id="contact">
  <h2 class="contact-heading">Get in Touch</h2>
  <div class="contact-container">
    <div class="contact-wrapper">
      <!-- Left Side: Enquiry Image -->
      <div class="contact-image">
        <img src="images/contact.avif" alt="Enquiry" />
      </div>

      <!-- Right Side: Contact Form -->
      <div class="contact-form-container">
        <form id="contact-form" class="contact-form">

          <!-- First Name and Last Name -->
          <div class="form-row">
            <div class="form-group half-width">
              <label for="first-name">First Name</label>
              <input type="text" id="first-name" name="first_name" placeholder="Enter your first name" required />
            </div>
            <div class="form-group half-width">
              <label for="last-name">Last Name</label>
              <input type="text" id="last-name" name="last_name" placeholder="Enter your last name" required />
            </div>
          </div>

          <!-- Email and Phone Number -->
          <div class="form-row">
            <div class="form-group half-width">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter your email" required />
              <span class="error-message" id="email-error"></span>
            </div>
            <div class="form-group half-width">
              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required />
              <span class="error-message" id="phone-error"></span>
            </div>
          </div>

          <!-- Company and Job Title -->
          <div class="form-row">
            <div class="form-group half-width">
              <label for="company">Company</label>
              <input type="text" id="company" name="company" placeholder="Enter your company name" />
            </div>
            <div class="form-group half-width">
              <label for="job-title">Job Title</label>
              <input type="text" id="job-title" name="job_title" placeholder="Enter your job title" />
            </div>
          </div>

          <!-- Country -->
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" placeholder="Enter your country" required />
          </div>

          <!-- Message -->
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write your message here..." rows="5" required></textarea>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>



<div class="footer">
    &copy; 2024 Proxime. All rights reserved.
</div>

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script>
 window.onload = function() {
    console.log("Page Loaded!");
    
    // Check if EmailJS is loaded
    if (typeof emailjs === 'undefined') {
        console.error("EmailJS is not loaded properly.");
        return;
    }

    console.log("EmailJS loaded:", emailjs);

    // Initialize EmailJS
    emailjs.init("xvM53wGK74rr4vL3C");  // Replace with your actual public key
    console.log("EmailJS initialized.");

    // Form Submission Logic
    document.getElementById("contact-form").addEventListener("submit", function(event) {
        event.preventDefault();

        // Collect form values
        var firstName = document.getElementById("first-name").value.trim();
        var lastName = document.getElementById("last-name").value.trim();
        var email = document.getElementById("email").value.trim();
        var phone = document.getElementById("phone").value.trim();
        var company = document.getElementById("company").value.trim();
        var jobTitle = document.getElementById("job-title").value.trim();
        var country = document.getElementById("country").value.trim();
        var message = document.getElementById("message").value.trim();

        // Validation Flags
        let isValid = true;
        let errorMessage = "";

        // 🔹 Validate Required Fields
        if (firstName === "" || lastName === "" || email === "" || phone === "" || country === "" || message === "") {
            errorMessage += "All fields marked with * are required.\n";
            isValid = false;
        }

        // 🔹 Validate Email Format
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            errorMessage += "Please enter a valid email address.\n";
            isValid = false;
        }

        // 🔹 Validate Phone Number (Must be exactly 10 digits)
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone)) {
            errorMessage += "Please enter a valid 10-digit phone number.\n";
            isValid = false;
        }

        // 🔹 If validation fails, show alert and stop form submission
        if (!isValid) {
            alert(errorMessage);
            return;
        }

        // Send email using EmailJS
        emailjs.send("service_ewezc3f", "template_zxh7sj4", {
            first_name: firstName,
            last_name: lastName,
            email: email,
            phone: phone,
            company: company,
            job_title: jobTitle,
            country: country,
            message: message
        })
        .then(function(response) {
            console.log("Message sent successfully:", response);
            alert("Your message has been sent successfully!");
            document.getElementById("contact-form").reset();
        })
        .catch(function(error) {
            console.error("Error sending message:", error);
            alert("There was an error sending your message. Please try again later.");
        });
    });
};

</script>
</body>
</html>
