<?php
/* booking.php — Unseen Trails Booking Page
   Handles both page render and AJAX form POST */

require_once 'config/db.php';
require_once 'config/booking_mailer.php'; // link config/ booking_mailer.php function to send booking confirmation email

/* ── AJAX POST handler ── */
if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    header('Content-Type: text/plain');
    $name  = trim($_POST['name']        ?? '');
    $email = trim($_POST['email']       ?? '');
    $dest  = trim($_POST['destination'] ?? '');
    $date  = trim($_POST['travel_date'] ?? '');
    $valid_dests = [
        'Ilam','Janakpur','Koshi Tappu','Kanchenjunga',
        'Rara Lake','Khaptad National Park','Tsho Rolpa Lake','Bardia National Park',
        'Upper Mustang','Dolpo','Phoksundo Lake','Gosaikunda Lake',
        'Pathibhara Temple','Manaslu Circuit','Shey Phoksundo NP','Api Himal',
        'Sinja Valley','Tsum Valley','Nar Phu Valley','Rolwaling Valley',
        'Halesi Mahadev','Bandipur','Sundarijal to Chisapani','Dhorpatan Hunting Reserve',
    ];

    if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL)
        || !in_array($dest, $valid_dests) || empty($date)
        || strtotime($date) < strtotime('today')) {
        echo 'INVALID'; exit;
    }
    $db   = getDB();
    $stmt = $db->prepare("INSERT INTO bookings (name,email,destination,travel_date) VALUES(?,?,?,?)");
    $stmt->bind_param('ssss', $name, $email, $dest, $date);
    $saved = $stmt->execute();
    $stmt->close(); $db->close();

    if (!$saved) {
      echo 'ERROR';
      exit;
    }

    $mailSent = sendBookingConfirmationEmail($name, $email, $dest, $date);
    if (!$mailSent) {
      error_log('Booking saved but email not sent for: ' . $email);
    }

    echo 'SUCCESS';
    exit;
}

/* Pre-fill destination from URL */
$validDests = [
    'Ilam','Janakpur','Koshi Tappu','Kanchenjunga',
    'Rara Lake','Khaptad National Park','Tsho Rolpa Lake','Bardia National Park',
    'Upper Mustang','Dolpo','Phoksundo Lake','Gosaikunda Lake',
    'Pathibhara Temple','Manaslu Circuit','Shey Phoksundo NP','Api Himal',
    'Sinja Valley','Tsum Valley','Nar Phu Valley','Rolwaling Valley',
    'Halesi Mahadev','Bandipur','Sundarijal to Chisapani','Dhorpatan Hunting Reserve',
];
$preDestination = '';
if (!empty($_GET['destination']) && in_array($_GET['destination'], $validDests)) {
    $preDestination = $_GET['destination'];
}
$minDate = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Your Journey — Unseen Trails</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <div class="nav-inner">
    <a href="index.php" class="nav-logo">
      <div class="nav-logo-badge">
        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      </div>
      <div class="nav-logo-text">Unseen<em>Trails</em></div>
    </a>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php#destinations-section">Destinations</a></li>
      <li><a href="index.php#map-section">Map</a></li>
      <li><a href="booking.php" class="active">Booking</a></li>
    </ul>
    <div class="nav-actions">
      <a href="booking.php" class="btn-book-nav">Book a Journey</a>
    </div>
    <button class="nav-burger" id="nav-burger"><span></span><span></span><span></span></button>
  </div>
  <div class="nav-mobile" id="nav-mobile">
    <a href="index.php">Home</a>
    <a href="index.php#destinations-section">Destinations</a>
    <a href="booking.php">Booking</a>
  </div>
</nav>

<!-- PAGE HEADER -->
<div style="background:var(--white);border-bottom:1px solid var(--border);padding:2.5rem 0 0">
  <div class="container">
    <a href="index.php" style="display:inline-flex;align-items:center;gap:0.45rem;font-size:0.8rem;color:var(--text3);margin-bottom:1.5rem;font-weight:500">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
      Back to Home
    </a>
    <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:2rem;flex-wrap:wrap;padding-bottom:2.5rem">
      <div>
        <div class="section-tag" style="margin-bottom:0.75rem"><span class="section-tag-dot"></span>Reserve Your Experience</div>
        <h1 style="font-size:clamp(1.8rem,3.5vw,2.6rem);font-weight:800;letter-spacing:-0.03em;color:var(--text);line-height:1.1">
          Book Your Hidden<br><span style="color:var(--green)">Nepal Journey</span>
        </h1>
      </div>
      <p style="font-size:0.88rem;color:var(--text2);max-width:340px;line-height:1.7">
        Secure your spot with a simple form. We'll reach out within 24 hours with your personalised trip details.
      </p>
    </div>
  </div>
</div>

<!-- BOOKING LAYOUT -->
<div class="booking-page">
  <div class="booking-wrapper">

    <!-- LEFT INFO PANEL -->
    <div class="booking-info au">
      <div class="booking-info-logo">
        <div class="booking-info-logo-icon">
          <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        UnseenTrails
      </div>
      <h2>Your adventure<br>starts here.</h2>
      <p>Every booking goes directly to local guides and communities. Travel that matters — for you and for Nepal.</p>

      <div class="booking-info-perks">
        <div class="booking-perk">
          <div class="booking-perk-icon">
            <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <div class="booking-perk-title">Secure Booking</div>
            <div class="booking-perk-sub">Your data is always protected</div>
          </div>
        </div>
        <div class="booking-perk">
          <div class="booking-perk-icon">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
          </div>
          <div>
            <div class="booking-perk-title">Local Expert Guides</div>
            <div class="booking-perk-sub">Curated by people who live there</div>
          </div>
        </div>
        <div class="booking-perk">
          <div class="booking-perk-icon">
            <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          </div>
          <div>
            <div class="booking-perk-title">Free Cancellation</div>
            <div class="booking-perk-sub">Up to 48 hours before travel</div>
          </div>
        </div>
        <div class="booking-perk">
          <div class="booking-perk-icon">
            <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.1 11.3a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .5h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          </div>
          <div>
            <div class="booking-perk-title">24hr Confirmation</div>
            <div class="booking-perk-sub">We respond to every booking</div>
          </div>
        </div>
      </div>

      <div class="booking-info-img">
        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600&q=80" alt="Nepal landscape">
      </div>
    </div>

    <!-- RIGHT FORM CARD -->
    <div class="booking-form-card au d2">

      <!-- Error banner -->
      <div class="form-error-msg" id="form-error" style="display:none">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <span></span>
      </div>

      <!-- Form -->
      <div id="form-wrapper">
        <div class="booking-form-title">Reserve Your Journey</div>
        <p class="booking-form-sub">Fill in your details and we'll handle the rest.</p>

        <form id="booking-form" novalidate>
          <div class="form-row">
            <!-- Name -->
            <div class="form-group">
              <div class="form-label">Full Name</div>
              <div class="input-wrap">
                <div class="input-icon">
                  <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <input class="form-input" type="text" name="name" placeholder="e.g. Aarav Sharma" required autocomplete="name">
              </div>
            </div>
            <!-- Email -->
            <div class="form-group">
              <div class="form-label">Email Address</div>
              <div class="input-wrap">
                <div class="input-icon">
                  <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <input class="form-input" type="email" name="email" placeholder="you@email.com" required autocomplete="email">
              </div>
            </div>
          </div>

          <div class="form-divider"></div>

          <!-- Destination -->
          <div class="form-group">
            <div class="form-label">Destination</div>
            <?php if ($preDestination): ?>
            <div class="input-wrap">
              <div class="input-icon">
                <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <input class="form-input" type="text" value="<?= htmlspecialchars($preDestination) ?>" readonly>
              <input type="hidden" name="destination" value="<?= htmlspecialchars($preDestination) ?>">
            </div>
            <?php else: ?>
            <div class="input-wrap">
              <div class="input-icon">
                <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <select class="form-select" name="destination" required>
                <option value="" disabled selected>Choose a destination…</option>
                <optgroup label="Eastern Nepal">
                  <option value="Ilam">Ilam — Tea Gardens</option>
                  <option value="Janakpur">Janakpur — Sacred City</option>
                  <option value="Koshi Tappu">Koshi Tappu — Wildlife Reserve</option>
                  <option value="Kanchenjunga">Kanchenjunga — Mountain Trek</option>
                  <option value="Pathibhara Temple">Pathibhara Temple — Hilltop Shrine</option>
                  <option value="Halesi Mahadev">Halesi Mahadev — Cave Temple</option>
                </optgroup>
                <optgroup label="Central &amp; Bagmati">
                  <option value="Tsho Rolpa Lake">Tsho Rolpa Lake — Glacial Lake</option>
                  <option value="Gosaikunda Lake">Gosaikunda Lake — Sacred Lake</option>
                  <option value="Rolwaling Valley">Rolwaling Valley — Remote Glacier Trek</option>
                  <option value="Sundarijal to Chisapani">Sundarijal to Chisapani — Day Trek</option>
                </optgroup>
                <optgroup label="Gandaki (Annapurna &amp; Manaslu Region)">
                  <option value="Upper Mustang">Upper Mustang — Forbidden Kingdom</option>
                  <option value="Manaslu Circuit">Manaslu Circuit — Mountain Circuit</option>
                  <option value="Tsum Valley">Tsum Valley — Sacred Himalayan Valley</option>
                  <option value="Nar Phu Valley">Nar Phu Valley — Restricted Valley</option>
                  <option value="Bandipur">Bandipur — Hilltop Village</option>
                </optgroup>
                <optgroup label="Karnali Province">
                  <option value="Rara Lake">Rara Lake — Alpine Lake</option>
                  <option value="Dolpo">Dolpo — Hidden Valley</option>
                  <option value="Phoksundo Lake">Phoksundo Lake — Deepest Lake</option>
                  <option value="Shey Phoksundo NP">Shey Phoksundo NP — Snow Leopard Country</option>
                  <option value="Sinja Valley">Sinja Valley — Ancient Capital</option>
                </optgroup>
                <optgroup label="Lumbini &amp; Far West">
                  <option value="Bardia National Park">Bardia National Park — Jungle Safari</option>
                  <option value="Dhorpatan Hunting Reserve">Dhorpatan — Highland Wilderness</option>
                  <option value="Khaptad National Park">Khaptad National Park — Sacred Plateau</option>
                  <option value="Api Himal">Api Himal — Untouched Peaks</option>
                </optgroup>
              </select>
              <div class="select-arrow">
                <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
              </div>
            </div>
            <?php endif; ?>
          </div>

          <!-- Date -->
          <div class="form-group">
            <div class="form-label">
              Travel Date
              <span class="form-label-opt">From today onwards</span>
            </div>
            <div class="input-wrap">
              <div class="input-icon">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <input class="form-input" type="date" name="travel_date" min="<?= $minDate ?>" required>
            </div>
          </div>

          <!-- Notes (optional) -->
          <div class="form-group">
            <div class="form-label">
              Special Requests
              <span class="form-label-opt">Optional</span>
            </div>
            <div class="input-wrap" style="align-items:flex-start">
              <div class="input-icon" style="padding-top:0.9rem">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              </div>
              <textarea
                class="form-input"
                name="notes"
                placeholder="Any dietary needs, accessibility requirements, group size…"
                rows="3"
                style="padding-top:0.85rem;resize:vertical"
              ></textarea>
            </div>
          </div>

          <button type="submit" class="btn-submit" id="submit-btn">
            Reserve My Journey
            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </button>

          <p style="text-align:center;font-size:0.75rem;color:var(--text3);margin-top:1rem">
            By booking you agree to our terms. No payment required at this step.
          </p>
        </form>
      </div>

      <!-- SUCCESS STATE -->
      <div class="booking-success" id="booking-success" style="display:none">
        <div class="success-anim">
          <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3 class="success-title">Booking Confirmed!</h3>
        <p class="success-sub">
          Your journey to <strong id="success-dest"></strong> has been reserved for <strong id="success-date"></strong>.
          We'll email <strong id="success-email"></strong> with full details within 24 hours.
        </p>
        <div class="success-detail">
          <div class="success-detail-row">
            <span class="success-detail-label">Traveller</span>
            <span class="success-detail-val" id="success-name"></span>
          </div>
          <div class="success-detail-row">
            <span class="success-detail-label">Destination</span>
            <span class="success-detail-val" id="success-dest2"></span>
          </div>
          <div class="success-detail-row">
            <span class="success-detail-label">Travel Date</span>
            <span class="success-detail-val" id="success-date2"></span>
          </div>
          <div class="success-detail-row">
            <span class="success-detail-label">Status</span>
            <span class="success-detail-val" style="color:var(--green)">✓ Confirmed</span>
          </div>
        </div>
        <a href="index.php" class="btn-success-home">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
          Explore More Destinations
        </a>
      </div>

    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="footer" style="margin-top:3rem">
  <div class="footer-inner">
    <div class="footer-top">
      <div>
        <div class="footer-logo">
          <div class="footer-logo-badge">
            <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          UnseenTrails
        </div>
        <p class="footer-brand-desc">Discover Nepal's hidden destinations.</p>
      </div>
      <div>
        <div class="footer-col-title">Destinations</div>
        <div class="footer-links">
          <a href="destination.php?place=ilam">Ilam</a>
          <a href="destination.php?place=janakpur">Janakpur</a>
          <a href="destination.php?place=koshi-tappu">Koshi Tappu</a>
          <a href="destination.php?place=kanchenjunga">Kanchenjunga</a>
        </div>
      </div>
      <div>
        <div class="footer-col-title">Explore</div>
        <div class="footer-links">
          <a href="index.php">Home</a>
          <a href="booking.php">Book a Trip</a>
        </div>
      </div>
      <div></div>
    </div>
    <div class="footer-bottom">
      <div class="footer-copy">&copy; <?= date('Y') ?> <span>Unseen Trails</span> · Hidden Nepal, Discovered</div>
    </div>
  </div>
</footer>

<script src="js/script.js"></script>
<script>
/* Override form submit for AJAX with X-Requested-With header */
document.addEventListener('DOMContentLoaded', () => {
  const form    = document.getElementById('booking-form');
  const success = document.getElementById('booking-success');
  const errorEl = document.getElementById('form-error');
  const wrapper = document.getElementById('form-wrapper');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    hideErr();
    const btn = document.getElementById('submit-btn');
    setLoad(btn, true);

    const name  = form.querySelector('[name="name"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();
    const dest  = form.querySelector('[name="destination"]')?.value || '';
    const date  = form.querySelector('[name="travel_date"]').value;

    if (!name || name.length < 2) return showErr('Please enter your full name (at least 2 characters).', btn);
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showErr('Please enter a valid email address.', btn);
    if (!dest) return showErr('Please select a destination.', btn);
    if (!date || new Date(date) < new Date(new Date().toDateString())) return showErr('Please choose a travel date from today or later.', btn);

    try {
      const fd = new FormData(form);
      const res = await fetch('booking.php', {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        body: fd
      });
      const txt = (await res.text()).trim();

      if (txt === 'SUCCESS') {
        const fmt = d => new Date(d + 'T00:00:00').toLocaleDateString('en-US', { weekday:'short', month:'long', day:'numeric', year:'numeric' });
        document.getElementById('success-name').textContent  = name;
        document.getElementById('success-dest').textContent  = dest;
        document.getElementById('success-dest2').textContent = dest;
        document.getElementById('success-date').textContent  = fmt(date);
        document.getElementById('success-date2').textContent = fmt(date);
        document.getElementById('success-email').textContent = email;
        wrapper.style.display = 'none';
        success.style.display = 'block';
        success.scrollIntoView({ behavior:'smooth', block:'center' });
      } else {
        showErr('Something went wrong. Please try again.', btn);
      }
    } catch {
      showErr('Connection error. Please try again.', btn);
    }
  });

  function setLoad(btn, on) {
    btn.classList.toggle('loading', on);
    btn.innerHTML = on
      ? `<div class="spinner"></div> Processing…`
      : `Reserve My Journey <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="17" height="17"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>`;
  }
  function showErr(msg, btn) {
    setLoad(btn, false);
    const s = errorEl.querySelector('span');
    if(s) s.textContent = msg;
    errorEl.style.display = 'flex';
    errorEl.scrollIntoView({ behavior:'smooth', block:'nearest' });
  }
  function hideErr() { errorEl.style.display = 'none'; }
});
</script>

</body>
</html>Booking Confirmed!
Your journey to Ilam has been reserved for Thu, April 23, 2026. We'll email jhol.momo.haii@gmail.com with full details within 24 hours.

Traveller
test
Destination
Ilam
Travel Date
Thu, April 23, 2026
Status
✓ Confirmed
Explore More Destinations