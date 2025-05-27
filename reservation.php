<?php
// reservation.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Noble Nook - Book Your Room</title>
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
      gap: 50px;
      align-items: start;
    }

    h1 {
      font-size: 32px;
      letter-spacing: 0.15em;
      font-weight: 900;
      margin-bottom: 30px;
      grid-column: 1 / -1;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    fieldset {
      border: none;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    legend {
      font-weight: 700;
      font-size: 18px;
      margin-bottom: 15px;
      border-bottom: 2px solid #333;
      padding-bottom: 5px;
      letter-spacing: 0.02em;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="number"],
    input[type="date"] {
      padding: 10px 15px;
      font-size: 14px;
      border-radius: 10px;
      border: 1px solid #ccc;
      width: 100%;
      outline: none;
      transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
      border-color: #333;
    }

    input[placeholder] {
      color: #999;
    }

    /* Sidebar */
    aside {
      border: 1px solid #ddd;
      border-radius: 12px;
      padding: 30px 25px;
      font-size: 14px;
      color: #333;
      display: flex;
      flex-direction: column;
      gap: 20px;
      max-width: 350px;
      height: fit-content;
    }

    .room-summary {
      font-weight: 700;
      font-size: 18px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 15px;
    }

    .summary-item {
      margin-bottom: 10px;
      line-height: 1.4;
    }

    .estimated-cost {
      font-weight: 900;
      font-size: 20px;
      margin-top: 20px;
      margin-bottom: 5px;
    }

    .note {
      font-size: 12px;
      color: #666;
      margin-bottom: 15px;
    }

    /* Payment Section */
    .payment-methods {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
      align-items: center;
    }
    .payment-methods label {
      display: flex;
      align-items: center;
      gap: 5px;
      cursor: pointer;
      font-weight: 600;
    }
    .payment-methods input[type="checkbox"] {
      cursor: pointer;
    }

    .card-details {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .card-details input[type="text"],
    .card-details input[type="number"] {
      padding: 10px 15px;
      font-size: 14px;
      border-radius: 10px;
      border: 1px solid #ccc;
      outline: none;
      width: 100%;
      transition: border-color 0.3s ease;
    }
    .card-details input:focus {
      border-color: #333;
    }

    .card-expiry-cvv {
      display: flex;
      gap: 15px;
    }
    .card-expiry-cvv input {
      flex: 1;
    }

    /* Reserve Button */
    .reserve-btn {
      background-color: #333;
      color: white;
      padding: 15px;
      border-radius: 25px;
      font-weight: 700;
      cursor: pointer;
      border: none;
      font-size: 16px;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }
    .reserve-btn:hover {
      background-color: #555;
    }

    /* Confirmation Modal overlay */
    #confirmationModal {
      display: none; /* hidden by default */
      position: fixed;
      top: 0; left: 0;
      width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.5);
      backdrop-filter: blur(5px);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    #confirmationModal.active {
      display: flex;
    }
    #confirmationModal .modal-content {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      max-width: 500px;
      width: 90%;
      box-shadow: 0 10px 25px rgba(0,0,0,0.25);
      text-align: center;
      font-family: 'Georgia', serif;
      color: #333;
    }
    #confirmationModal h2 {
      font-weight: 900;
      margin-bottom: 15px;
      font-size: 24px;
      letter-spacing: 0.02em;
    }
    #confirmationModal p {
      font-size: 14px;
      margin-bottom: 25px;
    }
    #confirmationModal table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 25px;
      font-size: 14px;
    }
    #confirmationModal table td {
      padding: 8px 6px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    #confirmationModal table td:first-child {
      font-weight: 700;
      width: 45%;
    }
    #confirmationModal .modal-buttons {
      display: flex;
      justify-content: space-between;
      gap: 15px;
      flex-wrap: wrap;
    }
    #confirmationModal .modal-buttons button {
      flex: 1;
      padding: 12px 10px;
      border-radius: 25px;
      border: none;
      cursor: pointer;
      font-weight: 700;
      background-color: #333;
      color: white;
      transition: background-color 0.3s ease;
      font-size: 14px;
    }
    #confirmationModal .modal-buttons button:hover {
      background-color: #555;
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
    @media (max-width: 992px) {
      main {
        grid-template-columns: 1fr;
        gap: 30px;
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
      .payment-methods {
        flex-wrap: wrap;
      }
      .card-expiry-cvv {
        flex-direction: column;
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
  <h1>BOOK YOUR ROOM NOW</h1>

  <form id="reservationForm" novalidate>
    <fieldset>
      <legend>Personal Details</legend>
      <input type="text" name="fullname" placeholder="Full Name" required aria-required="true" />
      <input type="text" name="nic" placeholder="NIC Number" required aria-required="true" />
      <input type="email" name="email" placeholder="Email" required aria-required="true" />
      <input type="tel" name="phone" placeholder="Phone Number" required aria-required="true" />
    </fieldset>

    <fieldset>
      <legend>Stay Details</legend>
      <label>
        Check-In Date
        <input type="date" name="checkin" required aria-required="true" />
      </label>
      <label>
        Check-Out Date
        <input type="date" name="checkout" required aria-required="true" />
      </label>
      <input type="number" name="occupants" placeholder="Number of Occupants" min="1" required aria-required="true" />
      <input type="number" name="totalnights" placeholder="Total Nights" min="1" required aria-required="true" />
      <input type="text" name="requests" placeholder="Special Requests (e.g., Early Check-In, Club Facilities, Extra Bed)" />
    </fieldset>
  </form>

  <aside>
    <div class="room-summary">
      <div><strong>Twin Room</strong> #46782</div>
      <div class="summary-item">Price Per Night: $250</div>
      <div class="summary-item">Bed: 2</div>
      <div class="summary-item">Bathroom: 1</div>
      <div class="summary-item">Occupancy Limit: 4</div>
      <div class="summary-item">Included Facilities: Air Conditioner, Television, Free WiFi</div>
    </div>

    <div class="estimated-cost">$250</div>
    <div class="note">** Unpaid reservations will be held until 7 PM only and will be automatically cancelled after that time.</div>

    <form id="paymentForm">
      <label>
        <input type="checkbox" checked disabled />
        Secure my booking with a credit / debit card.
      </label>

      <div class="payment-methods" aria-label="Select payment method">
        <label><input type="checkbox" name="visa" /> VISA</label>
        <label><input type="checkbox" name="master" /> MASTER</label>
        <label><input type="checkbox" name="amex" /> AMEX</label>
      </div>

      <div class="card-details">
        <input type="text" name="cardholder" placeholder="Card Holder Name" required aria-required="true" />
        <input type="text" name="cardnumber" placeholder="Card Number" required aria-required="true" />
        <div class="card-expiry-cvv">
          <input type="text" name="month" placeholder="Month" maxlength="2" required aria-required="true" />
          <input type="text" name="year" placeholder="Year" maxlength="4" required aria-required="true" />
          <input type="text" name="cvv" placeholder="CVV" maxlength="3" required aria-required="true" />
        </div>
      </div>

      <button type="submit" class="reserve-btn">Reserve Now</button>
    </form>
  </aside>
</main>

<!-- Confirmation Modal -->
<div id="confirmationModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-describedby="modalDesc">
  <div class="modal-content">
    <h2 id="modalTitle">Reservation Confirmed!</h2>
    <p id="modalDesc">Thank you for your reservation.<br/>We've successfully recorded your booking.</p>
    <table>
      <tr><td>Reservation ID</td><td id="resId">NN52103</td></tr>
      <tr><td>Guest Name</td><td id="resGuest">Jhonne Doe</td></tr>
      <tr><td>NIC No.</td><td id="resNIC">254686547853</td></tr>
      <tr><td>Room Type</td><td id="resRoomType">Twin Room</td></tr>
      <tr><td>No. of Guests</td><td id="resGuests">3</td></tr>
      <tr><td>Check-In Date</td><td id="resCheckIn">2025-05-25</td></tr>
      <tr><td>Check-Out Date</td><td id="resCheckOut">2025-05-26</td></tr>
      <tr><td>Special Req.</td><td id="resSpecial">None</td></tr>
      <tr><td>Payment Method</td><td id="resPayment">**** 2525</td></tr>
      <tr><td>Total Price</td><td id="resPrice">$250</td></tr>
    </table>
    <div class="modal-buttons">
      <button id="returnHomeBtn">Return to Home</button>
      <button id="makeAnotherBtn">Make Another Reservation</button>
      <button id="downloadBillBtn">Download Bill</button>
    </div>
  </div>
</div>

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

<script>
  // Show modal on successful form submission simulation
  document.getElementById('paymentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = document.getElementById('reservationForm');
    const paymentForm = e.target;

    // Fill modal with form data
    document.getElementById('resId').textContent = 'NN' + Math.floor(Math.random() * 90000 + 10000);
    document.getElementById('resGuest').textContent = form.fullname.value || 'N/A';
    document.getElementById('resNIC').textContent = form.nic.value || 'N/A';
    document.getElementById('resRoomType').textContent = 'Twin Room';
    document.getElementById('resGuests').textContent = form.occupants.value || 'N/A';
    document.getElementById('resCheckIn').textContent = form.checkin.value || 'N/A';
    document.getElementById('resCheckOut').textContent = form.checkout.value || 'N/A';
    document.getElementById('resSpecial').textContent = form.requests.value || 'None';
    document.getElementById('resPayment').textContent = '**** ' + (paymentForm.cardnumber.value.slice(-4) || '****');
    document.getElementById('resPrice').textContent = '$250';

    // Show modal
    document.getElementById('confirmationModal').classList.add('active');
  });

  // Modal button handlers
  document.getElementById('returnHomeBtn').addEventListener('click', () => {
    window.location.href = 'index.php'; // Adjust as needed
  });

  document.getElementById('makeAnotherBtn').addEventListener('click', () => {
    document.getElementById('confirmationModal').classList.remove('active');
    document.getElementById('reservationForm').reset();
    document.getElementById('paymentForm').reset();
  });

  document.getElementById('downloadBillBtn').addEventListener('click', () => {
    const resId = document.getElementById('resId').textContent;
    const guest = document.getElementById('resGuest').textContent;
    const room = document.getElementById('resRoomType').textContent;
    const price = document.getElementById('resPrice').textContent;
    const billText = `
      Reservation Bill\n
      Reservation ID: ${resId}\n
      Guest Name: ${guest}\n
      Room Type: ${room}\n
      Total Price: ${price}\n
      Thank you for choosing Noble Nook!
    `;
    const blob = new Blob([billText], {type: 'text/plain'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `NobleNook_Reservation_${resId}.txt`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
  });
</script>

</body>
</html>
