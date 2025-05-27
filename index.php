<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Noble Nook - Stay Class. Stay Noble.</title>
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

    /* Main Banner */
    main {
      margin-top: 60px;
      text-align: center;
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
    }
    main h1 {
      font-size: 28px;
      font-weight: 900;
      letter-spacing: 0.02em;
      margin-bottom: 40px;
      color: #222;
    }

    /* Booking Bar */
    .booking-bar {
      display: flex;
      justify-content: center;
      gap: 10px;
      background: #f5f5f5;
      border-radius: 25px;
      padding: 15px 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin-bottom: 60px;
    }
    .booking-bar > div {
      flex: 1;
      font-size: 14px;
      color: #666;
      position: relative;
    }
    .booking-bar select,
    .booking-bar input {
      width: 100%;
      border: none;
      background: transparent;
      outline: none;
      padding: 8px 10px;
      font-size: 14px;
      border-radius: 10px;
      cursor: pointer;
    }
    .booking-bar select option {
      color: #333;
    }
    .booking-bar input::placeholder {
      color: #999;
    }
    .booking-bar .search-btn {
      background-color: #333;
      border: none;
      padding: 0 20px;
      border-radius: 20px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      transition: background-color 0.3s ease;
      font-size: 16px;
    }
    .booking-bar .search-btn:hover {
      background-color: #555;
    }

    /* Popular Section */
    .section-title {
      font-weight: 700;
      font-size: 18px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-bottom: 3px solid #333;
      padding-bottom: 5px;
      width: fit-content;
    }
    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(160px,1fr));
      gap: 20px 25px;
      margin-bottom: 50px;
    }
    .card {
      background: #ddd;
      border-radius: 12px;
      padding: 20px 15px 15px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.05);
      cursor: pointer;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      height: 180px;
      position: relative;
      transition: box-shadow 0.3s ease;
    }
    .card:hover {
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }
    .card .avatar {
      width: 40px;
      height: 40px;
      background: #bbb;
      border-radius: 50%;
      position: absolute;
      top: 20px;
      left: 15px;
    }
    .card .label {
      font-weight: 600;
      color: #222;
      margin-top: auto;
      padding-left: 5px;
      z-index: 1;
      position: relative;
    }

    /* Footer */
    footer {
      background: #f5f5f5;
      padding: 30px 40px;
      font-size: 14px;
      color: #666;
      margin-top: auto;
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
    @media (max-width: 768px) {
      body {
        padding: 15px 20px;
      }
      header {
        flex-wrap: wrap;
        gap: 10px;
      }
      nav {
        gap: 15px;
        flex-wrap: wrap;
      }
      .booking-bar {
        flex-direction: column;
        padding: 20px;
      }
      .booking-bar > div {
        flex: none;
        width: 100%;
      }
      main h1 {
        font-size: 22px;
      }
      .cards-container {
        grid-template-columns: repeat(auto-fit,minmax(140px,1fr));
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
  <h1>WHERE COMFORT MEETS CLASS — BOOK NOW</h1>

  <form class="booking-bar" action="#" method="GET" role="search" aria-label="Room booking form">
    <div>
      <select name="room_type" aria-label="Select room type" required>
        <option value="" disabled selected>Room (Select Your Desired Room Type)</option>
        <option value="double">Double Room</option>
        <option value="king_deluxe">King Room (Deluxe)</option>
        <option value="junior_suite">Junior Suite</option>
        <option value="weekly_stay_suite">Weekly Stay Suite</option>
      </select>
    </div>
    <div>
      <input type="date" name="checkin" aria-label="Check In Date" required placeholder="Check In (Add Dates)" />
    </div>
    <div>
      <input type="date" name="checkout" aria-label="Check Out Date" required placeholder="Check Out (Add Dates)" />
    </div>
    <div>
      <select name="guests" aria-label="Number of guests" required>
        <option value="" disabled selected>Guests (Add Guests)</option>
        <option value="1">1 Guest</option>
        <option value="2">2 Guests</option>
        <option value="3">3 Guests</option>
        <option value="4">4 Guests</option>
      </select>
    </div>
<button
  type="button"
  class="search-btn"
  aria-label="Search rooms"
  onclick="window.location.href='search.php';"
>
  🔍
</button>

  </form>

  <!-- Popular Pick Section -->
  <section class="popular-section">
    <div class="section-title">Popular Pick</div>
    <div class="cards-container">
      <div class="card" tabindex="0">
        <div class="avatar"></div>
        <div class="label">Double Room</div>
      </div>
      <div class="card" tabindex="0">
        <div class="avatar"></div>
        <div class="label">King Room (Deluxe)</div>
      </div>
      <div class="card" tabindex="0">
        <div class="avatar"></div>
        <div class="label">Junior Suite</div>
      </div>
      <div class="card" tabindex="0">
        <div class="avatar"></div>
        <div class="label">Weekly Stay Suite</div>
      </div>
    </div>
  </section>

  <!-- Vacation Favorite -->
  <section>
    <div class="section-title">Vacation Favorite</div>
    <div class="cards-container">
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Sea View Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Balcony Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Honeymoon Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Presidential Suite</div></div>
    </div>
  </section>

  <!-- Standard Rooms -->
  <section>
    <div class="section-title">Standard Rooms</div>
    <div class="cards-container">
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Single Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Double Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Twin Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Economy Room</div></div>
    </div>
  </section>

  <!-- Deluxe Rooms -->
  <section>
    <div class="section-title">Deluxe Rooms</div>
    <div class="cards-container">
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">King Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Sea View Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Balcony Room</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Deluxe Room with Workspace</div></div>
    </div>
  </section>

  <!-- Suites -->
  <section>
    <div class="section-title">Suites</div>
    <div class="cards-container">
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Junior Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Executive Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Presidential Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Honeymoon Suite</div></div>
    </div>
  </section>

  <!-- Residential Suites -->
  <section>
    <div class="section-title">Residential Suites</div>
    <div class="cards-container">
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Weekly Stay Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Monthly Stay Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Studio Residential Suite</div></div>
      <div class="card" tabindex="0"><div class="avatar"></div><div class="label">Family Residential Suite</div></div>
    </div>
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
        <a href="#" aria-label="Facebook"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.5 9.7v-6.8h-2.3v-2.9h2.3V9.3c0-2.3 1.4-3.6 3.5-3.6 1 0 2 .1 2 .1v2.2h-1.1c-1.1 0-1.5.7-1.5 1.4v1.7h2.5l-.4 2.9h-2v6.8A10 10 0 0 0 22 12Z"/></svg></a>
        <a href="#" aria-label="Twitter"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14.86 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3Z"/></svg></a>
        <a href="#" aria-label="Instagram"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M7 2C4.2 2 2 
