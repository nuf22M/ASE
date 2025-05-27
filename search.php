<?php
// search.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Noble Nook - Search Results</title>
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

/* Search Filter Bar */
.filter-bar {
  margin: 40px auto 60px;
  max-width: 900px;
  display: flex;
  gap: 15px;
  background: #f5f5f5;
  padding: 15px 25px;
  border-radius: 30px;
  align-items: center;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  overflow-x: auto;
}

.filter-item {
  background: #ddd;
  padding: 8px 20px;
  border-radius: 30px;
  font-size: 14px;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: default;
  white-space: nowrap;
  user-select: none;
}

.filter-item .remove-btn {
  background: transparent;
  border: none;
  cursor: pointer;
  font-weight: bold;
  font-size: 16px;
  line-height: 1;
  color: #666;
  transition: color 0.3s ease;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.filter-item .remove-btn:hover {
  color: #000;
}

.filter-bar .search-btn {
  background-color: #333;
  border: none;
  padding: 10px 18px;
  border-radius: 20px;
  cursor: pointer;
  color: white;
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s ease;
  flex-shrink: 0;
}

.filter-bar .search-btn:hover {
  background-color: #555;
}

    /* Cards Container */
    .cards-container {
      max-width: 900px;
      margin: 0 auto 60px;
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(180px,1fr));
      gap: 20px 25px;
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
      .filter-bar {
        gap: 10px;
        padding: 15px 20px;
        overflow-x: scroll;
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
  <!-- Search Filter Bar -->
  <form class="filter-bar" action="#" method="GET" role="search" aria-label="Filter your search">
    <div class="filter-item">
      Double Room
      <button type="button" class="remove-btn" aria-label="Remove Double Room filter">&times;</button>
    </div>
    <div class="filter-item">
      2025-06-06
      <button type="button" class="remove-btn" aria-label="Remove check-in date filter">&times;</button>
    </div>
    <div class="filter-item">
      2025-06-09
      <button type="button" class="remove-btn" aria-label="Remove check-out date filter">&times;</button>
    </div>
    <div class="filter-item">
      3
      <button type="button" class="remove-btn" aria-label="Remove guests filter">&times;</button>
    </div>
<button
  type="button"
  class="search-btn"
  aria-label="Go to details page"
  onclick="window.location.href='details.php';"
>
  🔍
</button>
  </form>

  <!-- Search Result Cards -->
  <section class="cards-container" aria-label="Search results">
    <div class="card" tabindex="0">
      <div class="avatar"></div>
      <div class="label">Double Room</div>
    </div>
    <div class="card" tabindex="0">
      <div class="avatar"></div>
      <div class="label">Twin Room</div>
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
