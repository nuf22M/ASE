<?php
// details.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Noble Nook - Room Details</title>
  <style>
    /* Reset */
    *, *::before, *::after {
      margin: 0; padding: 0; box-sizing: border-box;
    }
    body {
      font-family: 'Georgia', serif;
      background: #fff;
      color: #333;
      line-height: 1.6;
      padding: 20px 40px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    a {
      text-decoration: none;
      color: inherit;
    }

    /* Header */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0;
      font-weight: 600;
      font-size: 16px;
      border-bottom: 1px solid #eee;
    }
    .logo {
      font-weight: bold;
      font-size: 22px;
      letter-spacing: 0.02em;
    }
    .logo small {
      display: block;
      font-weight: normal;
      font-size: 12px;
      color: #666;
      letter-spacing: 0.1em;
      margin-top: 2px;
    }
    nav {
      display: flex;
      gap: 30px;
      align-items: center;
    }
    nav a {
      color: #333;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    nav a:hover {
      color: #000;
    }
    .btn-book {
      background-color: #333;
      color: white;
      padding: 10px 25px;
      border-radius: 25px;
      font-weight: 700;
      cursor: pointer;
      border: none;
      transition: background-color 0.3s ease;
    }
    .btn-book:hover {
      background-color: #555;
    }

    /* Main Content */
    main {
      max-width: 1100px;
      margin: 40px auto 60px;
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 40px;
      align-items: start;
    }
    /* Gallery Grid */
    .gallery {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, 150px);
      gap: 15px;
      position: relative;
    }
    .gallery .large-photo {
      grid-column: 1 / 2;
      grid-row: 1 / 3;
      background: #ccc;
      border-radius: 12px;
    }
    .gallery .small-photo {
      background: #ccc;
      border-radius: 12px;
    }
    .gallery .photo-count {
      position: absolute;
      bottom: 20px;
      right: 20px;
      background: rgba(0,0,0,0.5);
      color: white;
      padding: 10px 15px;
      border-radius: 20px;
      font-weight: 700;
      cursor: default;
      user-select: none;
    }

    /* Details Section */
    .details-section {
      display: flex;
      flex-direction: column;
      gap: 25px;
    }
    .room-title {
      font-size: 24px;
      font-weight: 900;
      letter-spacing: 0.03em;
    }
    .room-code {
      font-weight: 700;
      font-size: 14px;
      color: #666;
      margin-top: -5px;
      margin-bottom: 20px;
      letter-spacing: 0.05em;
    }
    .description {
      font-size: 14px;
      color: #444;
      line-height: 1.5;
      max-width: 600px;
    }

    /* Amenities List */
    .amenities {
      display: flex;
      flex-wrap: wrap;
      gap: 20px 40px;
      max-width: 600px;
    }
    .amenity {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      color: #555;
      cursor: default;
      user-select: none;
    }
    .amenity svg {
      width: 18px;
      height: 18px;
      fill: #888;
      flex-shrink: 0;
    }

    /* Pricing Box */
    .pricing-box {
      border: 1px solid #ddd;
      border-radius: 12px;
      padding: 25px 30px;
      max-width: 320px;
      font-size: 14px;
      color: #333;
      display: flex;
      flex-direction: column;
      gap: 18px;
      justify-content: space-between;
      height: fit-content;
    }
    .price-range {
      font-weight: 900;
      font-size: 22px;
      letter-spacing: 0.02em;
      margin-bottom: 10px;
    }
    .price-breakdown p {
      margin-bottom: 8px;
    }
    .reserve-btn {
      background-color: #333;
      color: white;
      padding: 12px;
      border-radius: 25px;
      font-weight: 700;
      cursor: pointer;
      border: none;
      transition: background-color 0.3s ease;
      text-align: center;
      user-select: none;
    }
    .reserve-btn:hover {
      background-color: #555;
    }
    .contact-options {
      display: flex;
      gap: 15px;
      font-size: 13px;
      color: #666;
      cursor: pointer;
      user-select: none;
    }
    .contact-options label {
      cursor: pointer;
      transition: color 0.3s ease;
    }
    .contact-options label:hover {
      color: #000;
    }

    /* Footer */
    footer {
      background: #f5f5f5;
      padding: 30px 40px;
      font-size: 14px;
      color: #666;
    }
    footer .footer-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 40px;
    }
    footer .footer-col {
      flex: 1 1 220px;
      min-width: 220px;
    }
    footer .footer-col h3 {
      font-weight: 700;
      color: #222;
      margin-bottom: 15px;
    }
    footer .footer-col ul {
      list-style: none;
    }
    footer .footer-col ul li {
      margin-bottom: 10px;
    }
    footer .footer-col ul li a {
      color: #666;
      transition: color 0.3s ease;
    }
    footer .footer-col ul li a:hover {
      color: #000;
    }
    footer .footer-logo {
      font-family: 'Georgia', serif;
      font-weight: bold;
      font-size: 22px;
      margin-bottom: 10px;
    }
    footer .footer-logo small {
      display: block;
      font-weight: normal;
      font-size: 12px;
      letter-spacing: 0.1em;
      color: #999;
    }
    footer .contact-info p {
      margin-bottom: 8px;
    }
    footer .social-icons {
      margin-top: 10px;
      display: flex;
      gap: 15px;
    }
    footer .social-icons a {
      color: #666;
      font-size: 18px;
      transition: color 0.3s ease;
    }
    footer .social-icons a:hover {
      color: #000;
    }
    footer .copyright {
      text-align: center;
      margin-top: 25px;
      font-size: 13px;
      color: #999;
    }

    /* Responsive */
    @media (max-width: 992px) {
      main {
        grid-template-columns: 1fr;
        gap: 30px;
      }
      .gallery {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, 150px);
      }
      .gallery .large-photo {
        grid-column: 1 / 3;
        grid-row: 1 / 2;
      }
      .gallery .small-photo:nth-child(2) {
        grid-column: 1 / 2;
      }
      .gallery .small-photo:nth-child(3) {
        grid-column: 2 / 3;
      }
      .pricing-box {
        max-width: 100%;
        width: 100%;
      }
      .details-section {
        max-width: 100%;
      }
      .amenities {
        justify-content: start;
      }
    }
    @media (max-width: 480px) {
      body {
        padding: 15px 15px;
      }
      header nav {
        flex-wrap: wrap;
        gap: 10px;
      }
      .gallery {
        grid-template-columns: 1fr;
        grid-template-rows: repeat(5, 150px);
      }
      .gallery .large-photo {
        grid-column: 1 / 2;
        grid-row: 1 / 2;
      }
      .gallery .small-photo {
        grid-column: 1 / 2 !important;
      }
      .contact-options {
        flex-direction: column;
        gap: 8px;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="logo">
    Noble Nook
    <small>STAY CLASS. STAY NOBLE.</small>
  </div>
  <nav>
    <a href="index.php">Find a Room</a>
    <a href="#">Share Stories</a>
    <a href="#">Reservations</a>
    <a href="#">Contact</a>
    <button class="btn-book">Book Your Stay</button>
  </nav>
</header>

<main>
  <div class="gallery" aria-label="Room photos gallery">
    <div class="large-photo" role="img" aria-label="Main room photo"></div>
    <div class="small-photo" role="img" aria-label="Additional photo 1"></div>
    <div class="small-photo" role="img" aria-label="Additional photo 2"></div>
    <div class="small-photo" role="img" aria-label="Additional photo 3"></div>
    <div class="photo-count" aria-live="polite">+2 More Photos</div>
  </div>

  <section class="details-section" aria-label="Room details and reservation">
    <div>
      <h2 class="room-title">Twin Room</h2>
      <div class="room-code">46782</div>
      <p class="description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </p>
      <div class="amenities" aria-label="Offered amenities">
        <div class="amenity" title="Restaurant">
          <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M19 11V7a5 5 0 0 0-10 0v4"></path><path d="M7 19h10"></path><path d="M12 15v4"></path><path d="M7 19v2"></path><path d="M17 19v2"></path></svg>
          Restaurant
        </div>
        <div class="amenity" title="Television">
          <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="7" width="18" height="12" rx="2" ry="2"></rect><path d="M8 21h8"></path><path d="M12 17v4"></path></svg>
          Television
        </div>
        <div class="amenity" title="Air Conditioner">
          <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 3v18"></path><path d="M5 8h14"></path><path d="M5 16h14"></path></svg>
          Air Conditioner
        </div>
        <div class="amenity" title="Free WiFi">
          <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12" y2="20"></line></svg>
          Free WiFi
        </div>
        <div class="amenity" title="Balcony or Patio">
          <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 7V3H8v4"></path></svg>
          Balcony or Patio
        </div>
      </div>
    </div>

    <aside class="pricing-box" aria-label="Pricing and reservation">
      <div class="price-range">$250 - $500</div>
      <div class="price-breakdown">
        <p>Short Period: $250</p>
        <p>Medium Period: $400</p>
        <p>Long Period: $500</p>
      </div>
<button
  class="reserve-btn"
  type="button"
  aria-label="Reserve this room"
  onclick="window.location.href='reservation.php';"
>
  Reserve Now
</button>
      <div class="contact-options" role="group" aria-label="Contact options">
        <label><input type="checkbox" name="room_inquiry" disabled> Room Inquiry</label>
        <label><input type="checkbox" name="contact" disabled> Contact</label>
      </div>
    </aside>
  </section>
</main>

<footer>
  <div class="footer-container">
    <div class="footer-col">
      <div class="footer-logo">
        NOOBLE NOOK
        <small>Your luxury stay made simple. Experience comfort, elegance, and personalized service at every visit.</small>
      </div>
    </div>
    <div class="footer-col">
      <h3>COMPANY</h3>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Legal Information</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h3>HELP CENTER</h3>
      <ul>
        <li><a href="#">Find a Room</a></li>
        <li><a href="#">How To Pay?</a></li>
        <li><a href="#">Why Us?</a></li>
        <li><a href="#">FAQs</a></li>
        <li><a href="#">Rental Guides</a></li>
      </ul>
    </div>
    <div class="footer-col contact-info">
      <h3>CONTACT INFO</h3>
      <p>Phone: 1234567890</p>
      <p>Email: reservations@noblenook.com</p>
      <p>Location: 100 Smart Street, LA, USA</p>
      <div class="social-icons" role="list">
        <a href="#" aria-label="Facebook">FB</a>
        <a href="#" aria-label="Twitter">TW</a>
        <a href="#" aria-label="Instagram">IG</a>
        <a href="#" aria-label="LinkedIn">LI</a>
      </div>
    </div>
  </div>
  <div class="copyright">© 2025 Noble Nook | All rights reserved</div>
</footer>

</body>
</html>
