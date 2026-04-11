<?php
/* index.php — Unseen Trails Homepage */
$destinations = [
  [
    'slug'     => 'ilam',
    'name'     => 'Ilam',
    'region'   => 'Koshi Province',
    'tag'      => 'Tea Gardens',
    'desc'     => 'Lose yourself in emerald tea gardens draped in mountain mist, where dawn breaks over Himalayan ridges and the world feels perfectly still.',
    'image'    => 'https://images.openai.com/static-rsc-4/HPj3McfRbGbli5Yz4P1_kf7ANoeDxaBZkOoI_u0lQYqWWWyhGbscuEogGrA9avQ4bUZJW_qOn91tA11ViRWvb0AXxg0OkTYkL2Xl_NF_fxgzMbEFZ2RNa46vKy0USER10vpRqBLfm-M7O6Qc2xQTb_L5o7EvxK2hQLTg1PFrWr2h0L2zrZeQtW25Uyg-ehBO?purpose=fullsize',
    'season'   => 'Mar – Jun',
    'distance' => '580 km',
    'keywords' => 'ilam tea gardens eastern hills mist himalaya province nature green',
  ],
  [
    'slug'     => 'janakpur',
    'name'     => 'Janakpur',
    'region'   => 'Madhesh Province',
    'tag'      => 'Sacred City',
    'desc'     => 'Ancient temples glow golden at dusk in this mythological city where Mithila art covers every wall and devotion fills the air.',
    'image'    => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/a9/7a/fb/the-beautiful-janaki.jpg?w=1400&h=1400&s=1',
    'season'   => 'Oct – Feb',
    'distance' => '225 km',
    'keywords' => 'janakpur temple culture mithila art sacred religion madhesh south',
  ],
  [
    'slug'     => 'koshi-tappu',
    'name'     => 'Koshi Tappu',
    'region'   => 'Koshi Province',
    'tag'      => 'Wildlife Reserve',
    'desc'     => 'A living sanctuary where 500+ bird species paint the sky, wild buffalo roam free, and the Koshi River breathes life into everything it touches.',
    'image'    => 'https://images.openai.com/static-rsc-4/UR9U6K1pGUXUlA8BYjloQmXG-oJL9yCNcHJGifHY4x8pRPKoqZjrwj8gXfb03ftw04lw-bypixbb2ocNdAJ5potfdLDEDojsbHv8WZifoqpX-Wi6J9fkT2xmuN_eZkfoFJ_yl028TlMKugqZUyJFMfIcLVUWXTQPupPJ1MQHoQx6pUwIVwcOarFSW_oaq9Hn?purpose=fullsize',
    'season'   => 'Nov – Apr',
    'distance' => '390 km',
    'keywords' => 'koshi tappu wildlife birds wetland safari buffalo river nature reserve',
  ],
  [
    'slug'     => 'kanchenjunga',
    'name'     => 'Kanchenjunga',
    'region'   => 'Koshi Province · Far East',
    'tag'      => 'Mountain Trek',
    'desc'     => 'Stand at the foot of the world\'s third highest peak on a trail so remote that silence itself becomes your companion on the journey.',
    'image'    => 'https://images.unsplash.com/photo-1533130061792-64b345e4a833?w=800&q=82',
    'season'   => 'Apr – May',
    'distance' => '680 km',
    'keywords' => 'kanchenjunga mountain trek adventure peak himalaya glacier snow camp',
  ],
  /* ── 20 Hidden Places of Nepal ── */
  [
    'slug'     => 'rara-lake',
    'name'     => 'Rara Lake',
    'region'   => 'Karnali Province',
    'tag'      => 'Alpine Lake',
    'desc'     => 'Nepal\'s largest and deepest lake shimmers sapphire-blue at 2,990 m, ringed by Himalayan forest so pristine it feels like the world forgot to put a road here.',
    'image'    => 'https://cdn-ildnegm.nitrocdn.com/KXxKXooeoKkfrapbonFlAAfUPSzqadeE/assets/images/optimized/rev-b3967c4/www.magicalnepal.com/wp-content/uploads/2017/12/rara-lake-e1621487299230.jpg',
    'season'   => 'Apr – Nov',
    'distance' => '780 km',
    'keywords' => 'rara lake alpine karnali pristine blue himalaya remote forest trekking',
  ],
  [
    'slug'     => 'khaptad',
    'name'     => 'Khaptad National Park',
    'region'   => 'Sudurpashchim Province',
    'tag'      => 'Sacred Plateau',
    'desc'     => 'A remote highland plateau of meadows and dense forests, dotted with Hindu shrines — far west Nepal\'s best-kept spiritual and ecological secret.',
    'image'    => 'https://www.himalayastrek.com/public/uploads/khaptad-1.jpg397163847jpg',
    'season'   => 'Apr – Jun',
    'distance' => '850 km',
    'keywords' => 'khaptad plateau meadows shrine spiritual west nepal forest wildlife',
  ],
  [
    'slug'     => 'tsho-rolpa',
    'name'     => 'Tsho Rolpa Lake',
    'region'   => 'Bagmati Province',
    'tag'      => 'Glacial Lake',
    'desc'     => 'One of Nepal\'s largest glacial lakes sits at 4,580 m in the Rolwaling Valley, its turquoise waters framed by towering glaciers and raw Himalayan silence.',
    'image'    => 'https://cdn-ildnegm.nitrocdn.com/KXxKXooeoKkfrapbonFlAAfUPSzqadeE/assets/images/optimized/rev-b3967c4/i0.wp.com/www.magicalnepal.com/wp-content/uploads/2025/02/eb455e2281c9d2adcc1cafaafbeeca6d.Tsho-Rolpa-Trek.webp',
    'season'   => 'May – Oct',
    'distance' => '155 km',
    'keywords' => 'tsho rolpa glacial lake high altitude rolwaling bagmati turquoise glacier',
  ],
  [
    'slug'     => 'bardia',
    'name'     => 'Bardia National Park',
    'region'   => 'Lumbini Province',
    'tag'      => 'Jungle Safari',
    'desc'     => 'Wilder and less crowded than Chitwan, Bardia shelters Bengal tigers, one-horned rhinos and Gangetic dolphins in a vast Terai jungle that swallows you whole.',
    'image'    => 'https://cdn.kimkim.com/files/a/images/0154e137ed055ff13ba90694407f33515ff781ba/original-c35f44388a4f983b7c6330d833878f61.jpg',
    'season'   => 'Oct – May',
    'distance' => '520 km',
    'keywords' => 'bardia jungle safari tiger rhino dolphin terai wildlife lumbini',
  ],
  [
    'slug'     => 'upper-mustang',
    'name'     => 'Upper Mustang',
    'region'   => 'Gandaki Province',
    'tag'      => 'Forbidden Kingdom',
    'desc'     => 'Ancient cave monasteries carved into ochre cliffs, a wind-sculpted desert beyond the Annapurna massif — the lost kingdom of Lo kept secret for centuries.',
    'image'    => 'https://assets-excellenttrek.b-cdn.net/wp-content/uploads/2025/06/Upper-Mustang.jpg',
    'season'   => 'Mar – Nov',
    'distance' => '280 km',
    'keywords' => 'upper mustang forbidden kingdom lo cave monastery desert arid gandaki',
  ],
  [
    'slug'     => 'dolpo',
    'name'     => 'Dolpo',
    'region'   => 'Karnali Province',
    'tag'      => 'Hidden Valley',
    'desc'     => 'The world\'s highest inhabited valleys, Buddhist crystal mountain, and a culture unchanged for a millennium — Dolpo is the Nepal most travellers never reach.',
    'image'    => 'https://cdn.kimkim.com/files/a/content_articles/featured_photos/c172407b1d4064e4bbbab6111f3bf2fc3fea8739/big-775089f298c647bc275b71cdb88f220b.jpg',
    'season'   => 'Jun – Oct',
    'distance' => '730 km',
    'keywords' => 'dolpo hidden valley buddhist crystal mountain tibet karnali high altitude',
  ],
  [
    'slug'     => 'phoksundo-lake',
    'name'     => 'Phoksundo Lake',
    'region'   => 'Karnali Province · Dolpo',
    'tag'      => 'Deepest Lake',
    'desc'     => 'Nepal\'s deepest lake glows in impossibly vivid shades of blue and emerald at 3,611 m, surrounded by dramatic cliffs in the heart of Dolpo.',
    'image'    => 'https://i0.wp.com/ghumante.com/wp-content/uploads/2021/03/72879400_3594431213904214_4152555221370798080_o.jpg?fit=1200%2C800&ssl=1',
    'season'   => 'May – Oct',
    'distance' => '740 km',
    'keywords' => 'phoksundo lake dolpo deepest emerald blue karnali remote cliff',
  ],
  [
    'slug'     => 'gosaikunda',
    'name'     => 'Gosaikunda Lake',
    'region'   => 'Bagmati Province',
    'tag'      => 'Sacred Lake',
    'desc'     => 'Pilgrims have walked to this high-altitude sacred lake for centuries; trekkers come for the stunning ridge views and the otherworldly silence at 4,380 m.',
    'image'    => 'https://www.discoveraltitude.com/uploads/package/gallery/gosaikunda-in-langtang.webp',
    'season'   => 'Mar – Jun',
    'distance' => '68 km',
    'keywords' => 'gosaikunda sacred lake pilgrimage bagmati altitude ridge langtang',
  ],
  [
    'slug'     => 'pathibhara',
    'name'     => 'Pathibhara Temple',
    'region'   => 'Koshi Province · Taplejung',
    'tag'      => 'Hilltop Shrine',
    'desc'     => 'Perched at 3,793 m near the Kanchenjunga corridor, this revered temple offers both spiritual energy and panoramic views across four Himalayan giants.',
    'image'    => 'https://hikeontreks.com/wp-content/uploads/2021/05/Pathibhara-View-Snowfall.webp',
    'season'   => 'Oct – May',
    'distance' => '650 km',
    'keywords' => 'pathibhara temple hilltop shrine taplejung himalaya province no 1',
  ],
  [
    'slug'     => 'manaslu',
    'name'     => 'Manaslu Circuit',
    'region'   => 'Gandaki Province',
    'tag'      => 'Mountain Circuit',
    'desc'     => 'Circle the world\'s eighth-highest peak through remote Tibetan-influenced villages, dramatic gorges and high passes that put this trail leagues ahead of the crowds.',
    'image'    => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Sunrise%2C_Manaslu.jpg',
    'season'   => 'Sep – Nov',
    'distance' => '175 km',
    'keywords' => 'manaslu circuit mountain trek gandaki eighth peak tibetan remote gorge',
  ],
  [
    'slug'     => 'shey-phoksundo',
    'name'     => 'Shey Phoksundo NP',
    'region'   => 'Karnali Province',
    'tag'      => 'Snow Leopard Country',
    'desc'     => 'Nepal\'s largest national park by area is a high-altitude wilderness where snow leopards hunt blue sheep across a stark, magnificent trans-Himalayan landscape.',
    'image'    => 'https://cms.altitudehimalaya.com/media/Blog/Adventures/Shey-Phoksundo-Lake-of-Nepal.jpeg',
    'season'   => 'Oct – Nov',
    'distance' => '750 km',
    'keywords' => 'shey phoksundo snow leopard national park karnali high altitude wilderness',
  ],
  [
    'slug'     => 'api-himal',
    'name'     => 'Api Himal',
    'region'   => 'Sudurpashchim Province',
    'tag'      => 'Untouched Peaks',
    'desc'     => 'Nepal\'s far-western frontier holds its tallest peak and some of its emptiest trails — a reward for those willing to go where almost no other trekker has gone.',
    'image'    => 'https://peakclimbingnepal.com/wp-content/uploads/2025/03/Api.jpg',
    'season'   => 'Apr – May',
    'distance' => '950 km',
    'keywords' => 'api himal far west peak frontier untouched sudurpashchim remote trek',
  ],
  [
    'slug'     => 'sinja-valley',
    'name'     => 'Sinja Valley',
    'region'   => 'Karnali Province',
    'tag'      => 'Ancient Capital',
    'desc'     => 'The birthplace of the Nepali language and once capital of the Khasa kingdom, Sinja Valley hides medieval ruins in a lush, roadless river valley.',
    'image'    => 'https://risingnepaldaily.com/storage/media/73384/Untitled-1.jpg',
    'season'   => 'Apr – Nov',
    'distance' => '700 km',
    'keywords' => 'sinja valley ancient capital nepali language khasa kingdom ruins karnali',
  ],
  [
    'slug'     => 'tsum-valley',
    'name'     => 'Tsum Valley',
    'region'   => 'Gandaki Province',
    'tag'      => 'Sacred Himalayan Valley',
    'desc'     => 'A hidden Tibetan Buddhist enclave near the Manaslu massif, Tsum Valley\'s ancient monasteries, chortens and festivals exist entirely off the tourist map.',
    'image'    => 'https://himalayan-masters.com/wp-content/uploads/2022/09/Manaslu-Tsum-Valley-Trek-.webp',
    'season'   => 'Mar – May',
    'distance' => '190 km',
    'keywords' => 'tsum valley tibetan buddhist manaslu monastery gandaki chorten hidden',
  ],
  [
    'slug'     => 'nar-phu',
    'name'     => 'Nar Phu Valley',
    'region'   => 'Gandaki Province',
    'tag'      => 'Restricted Valley',
    'desc'     => 'An off-limits permit-only valley beside the Annapurna circuit where Tibetan nomads, ancient gompas and wild Himalayan terrain remain utterly unchanged.',
    'image'    => 'https://www.visithimalayastrek.com/uploads/photos/1/Nar-Phu-Trek/Phu-Village.jpg',
    'season'   => 'Oct – Nov',
    'distance' => '250 km',
    'keywords' => 'nar phu restricted valley annapurna tibetan nomad gompa gandaki permit',
  ],
  [
    'slug'     => 'rolwaling',
    'name'     => 'Rolwaling Valley',
    'region'   => 'Bagmati Province',
    'tag'      => 'Remote Glacier Trek',
    'desc'     => 'Tucked beneath the Tibetan border, Rolwaling\'s moraine lakes and ice-draped peaks draw only the most determined adventurers seeking raw, unfiltered Himalayas.',
    'image'    => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCPPK1giSVOYAtO89gbx02MEGiHKqsV0SI5Q&s',
    'season'   => 'Sep – Oct',
    'distance' => '140 km',
    'keywords' => 'rolwaling glacier remote moraine tibet border bagmati adventure peak',
  ],
  [
    'slug'     => 'halesi-mahadev',
    'name'     => 'Halesi Mahadev',
    'region'   => 'Koshi Province · Khotang',
    'tag'      => 'Cave Temple',
    'desc'     => 'Revered by Hindus and Buddhists alike, this ancient cave temple complex near Khotang is Nepal\'s spiritual heartland east of Kathmandu, rarely visited by outsiders.',
    'image'    => 'https://upload.wikimedia.org/wikipedia/commons/3/3d/Maratika_cave_1.jpg',
    'season'   => 'Oct – Mar',
    'distance' => '320 km',
    'keywords' => 'halesi mahadev cave temple khotang hindu buddhist sacred province 1',
  ],
  [
    'slug'     => 'bandipurr',
    'name'     => 'Bandipur',
    'region'   => 'Gandaki Province',
    'tag'      => 'Hilltop Village',
    'desc'     => 'A perfectly preserved Newari town frozen in time atop a ridge, where cobbled lanes, pagoda shrines and sweeping Himalayan panoramas reward every slow step.',
    'image'    => 'https://fulltimeexplorer.com/wp-content/uploads/2020/05/Bandipur-Nepal-Travel-Guide-4206.jpg',
    'season'   => 'Oct – Apr',
    'distance' => '150 km',
    'keywords' => 'bandipur hilltop village newari gandaki ridge pagoda himalaya panorama',
  ],
  [
    'slug'     => 'sundarijal',
    'name'     => 'Sundarijal to Chisapani',
    'region'   => 'Bagmati Province',
    'tag'      => 'Day Trek',
    'desc'     => 'A gem just outside Kathmandu: this half-day trail winds through mossy forest, past waterfalls and up to Chisapani\'s jaw-dropping Himalayan sunrise panorama.',
    'image'    => 'https://accessnepaltour.com/wp-content/uploads/2025/08/Sundarijal.jpg',
    'season'   => 'Sep – May',
    'distance' => '20 km',
    'keywords' => 'sundarijal chisapani day trek waterfall forest bagmati sunrise himalaya',
  ],
  [
    'slug'     => 'dhorpatan',
    'name'     => 'Dhorpatan Hunting Reserve',
    'region'   => 'Lumbini Province',
    'tag'      => 'Highland Wilderness',
    'desc'     => 'Nepal\'s only hunting reserve is in fact a stunning highland meadow system where blue sheep graze against snow-capped ridges, completely off the trekking radar.',
    'image'    => 'https://www.footprintadventure.com/uploads/media/Dhorpatan%20Hunting%20Reserve/Sheeps%20in%20Dhorpatan.jpg',
    'season'   => 'Apr – Oct',
    'distance' => '430 km',
    'keywords' => 'dhorpatan hunting reserve highland meadow blue sheep lumbini wilderness',
  ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unseen Trails — Discover Hidden Nepal</title>
  <meta name="description" content="Discover Nepal's most hidden destinations. Tea gardens, sacred cities, wildlife reserves and mountain treks — all off the beaten path.">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ══════════════ NAVBAR ══════════════ -->
<nav class="navbar" id="navbar">
  <div class="nav-inner">
    <a href="index.php" class="nav-logo">
      <div class="nav-logo-badge">
        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      </div>
      <div class="nav-logo-text">Unseen<em>Trails</em></div>
    </a>

    <ul class="nav-links">
      <li><a href="index.php" class="active">Home</a></li>
      <li><a href="#destinations-section">Destinations</a></li>
      <li><a href="#map-section">Map</a></li>
      <li><a href="booking.php">Booking</a></li>
    </ul>

    <div class="nav-actions">
      <a href="booking.php" class="btn-book-nav">Book a Journey</a>
    </div>

    <button class="nav-burger" id="nav-burger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>

  <!-- Mobile menu -->
  <div class="nav-mobile" id="nav-mobile">
    <a href="index.php">Home</a>
    <a href="#destinations-section">Destinations</a>
    <a href="#map-section">Map</a>
    <a href="booking.php">Booking</a>
    <a href="booking.php" class="btn-book-nav">Book a Journey</a>
  </div>
</nav>

<!-- ══════════════ HERO ══════════════ -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <div class="hero-left">
      <div class="hero-pill au">
        <span class="hero-pill-dot"></span>
        Discover Hidden Nepal
      </div>

      <h1 class="au d1">
        The Trail Less<br>
        <em>Travelled</em>
      </h1>

      <p class="hero-sub au d2">
        Go beyond the guidebooks. We reveal Nepal's most extraordinary
        hidden places — for curious, intentional travellers.
      </p>

      <!-- HERO SEARCH -->
      <div class="au d3" style="position:relative" id="hero-search-wrapper">
        <div class="hero-search">
          <div class="hero-search-icon">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          </div>
          <input
            type="text"
            id="hero-search-input"
            placeholder="Search destinations, experiences…"
            autocomplete="off"
            aria-label="Search destinations"
          >
          <button class="hero-search-btn" id="hero-search-btn">Search</button>
        </div>
        <!-- Dropdown results -->
        <div class="search-results-dropdown" id="search-dropdown" role="listbox"></div>
      </div>

      <!-- Stats -->
      <div class="hero-stats au d4">
        <div class="hero-stat">
          <div class="hero-stat-num">20+</div>
          <div class="hero-stat-label">Hidden Destinations</div>
        </div>
        <div class="hero-stat-divider"></div>
        <div class="hero-stat">
          <div class="hero-stat-num">Nepal</div>
          <div class="hero-stat-label">Off the Beaten Path</div>
        </div>
        <div class="hero-stat-divider"></div>
        <div class="hero-stat">
          <div class="hero-stat-num">100%</div>
          <div class="hero-stat-label">Local Expertise</div>
        </div>
      </div>
    </div>

    <!-- Floating info cards (decorative) -->
    <div class="hero-right au d2">
      <div class="hero-card-float">
        <div class="hcf-label">Top Rated Experience</div>
        <div class="hcf-val">Ilam Tea Gardens</div>
        <div class="hcf-sub">Eastern Nepal · Spring Season</div>
        <div class="hcf-bar"><div class="hcf-fill" style="width:92%"></div></div>
      </div>
      <div class="hero-card-float">
        <div class="hcf-label">Wildlife Sightings</div>
        <div class="hcf-val">Koshi Tappu</div>
        <div class="hcf-sub">500+ bird species recorded</div>
        <div class="hcf-bar"><div class="hcf-fill" style="width:78%"></div></div>
      </div>
      <div class="hero-card-float">
        <div class="hcf-label">Cultural Immersion</div>
        <div class="hcf-val">Janakpur</div>
        <div class="hcf-sub">Mithila art · Sacred temples</div>
        <div class="hcf-bar"><div class="hcf-fill" style="width:85%"></div></div>
      </div>
    </div>
  </div>

  <div class="hero-shape"></div>
</section>

<!-- ══════════════ DESTINATIONS ══════════════ -->
<section class="destinations-section" id="destinations-section">
  <div class="container">
    <div class="section-header-split reveal">
      <div>
        <div class="section-tag"><span class="section-tag-dot"></span>Our Destinations</div>
        <h2 class="section-title">Hidden Gems of <em>Nepal</em></h2>
      </div>
      <div style="display:flex;flex-direction:column;align-items:flex-end;gap:0.75rem">
        <p class="section-sub" style="text-align:right;max-width:320px;font-size:0.9rem">
           Extraordinary places, each with a story that no postcard can tell.
        </p>
        <!-- Filter input -->
        <div style="position:relative">
          <input
            type="text"
            id="filter-input"
            placeholder="Filter destinations…"
            style="
              padding:0.6rem 1rem 0.6rem 2.4rem;
              border:1.5px solid var(--border2);
              border-radius:var(--r-full);
              font-size:0.85rem;font-family:var(--font);
              color:var(--text);background:var(--white);
              transition:all 0.2s;width:210px;
            "
            onfocus="this.style.borderColor='var(--green)';this.style.boxShadow='0 0 0 3px rgba(26,107,74,0.12)'"
            onblur="this.style.borderColor='';this.style.boxShadow=''"
          >
          <svg style="position:absolute;left:0.75rem;top:50%;transform:translateY(-50%);width:14px;height:14px;stroke:var(--text3);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;pointer-events:none" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
      </div>
    </div>

    <div class="cards-grid" id="cards-grid">
      <?php foreach($destinations as $d): ?>
      <a
        href="destination.php?place=<?= urlencode($d['slug']) ?>"
        class="dest-card reveal"
        data-keywords="<?= htmlspecialchars($d['keywords']) ?>"
        aria-label="Explore <?= htmlspecialchars($d['name']) ?>"
      >
        <div class="card-img-wrap">
          <img
            class="card-img-inner"
            src="<?= htmlspecialchars($d['image']) ?>"
            alt="<?= htmlspecialchars($d['name']) ?>"
            loading="lazy"
          >
          <div class="card-img-tag"><?= htmlspecialchars($d['tag']) ?></div>
          <button class="card-fav" aria-label="Save to wishlist" onclick="event.preventDefault()">
            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
          </button>
          <div class="card-img-location">
            <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?= htmlspecialchars($d['region']) ?>
          </div>
        </div>
        <div class="card-body">
          <div class="card-region"><?= htmlspecialchars($d['region']) ?></div>
          <h3 class="card-title"><?= htmlspecialchars($d['name']) ?></h3>
          <p class="card-desc"><?= htmlspecialchars($d['desc']) ?></p>
          <div class="card-footer">
            <div class="card-meta">
              <div class="card-meta-item">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <strong><?= htmlspecialchars($d['season']) ?></strong>
              </div>
              <div class="card-meta-item">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <strong><?= htmlspecialchars($d['distance']) ?></strong>
              </div>
            </div>
            <div class="card-explore">
              Explore
              <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </div>
          </div>
        </div>
      </a>
      <?php endforeach; ?>

      <!-- No results -->
      <div class="no-results" id="no-results" style="display:none">
        <div class="no-results-icon">🔍</div>
        <h3>No destinations found</h3>
        <p>Try searching for "tea", "wildlife", "culture", or "trek"</p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════ WHY CHOOSE US ══════════════ -->
<section class="why-section">
  <div class="container">
    <div class="section-header section-header-center reveal">
      <div class="section-tag"><span class="section-tag-dot"></span>Why Unseen Trails</div>
      <h2 class="section-title">Travel the Way It <em>Should Be</em></h2>
      <p class="section-sub">We believe the best travel experiences are the ones you'll never find in a package deal.</p>
    </div>

    <div class="why-grid">
      <div class="why-card reveal">
        <div class="why-icon">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
        </div>
        <h3 class="why-title">Discover Hidden Places</h3>
        <p class="why-desc">We curate destinations that don't appear in travel brochures — places where the road ends and real discovery begins. Every trail has a story.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-icon">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <h3 class="why-title">Support Local Communities</h3>
        <p class="why-desc">Every booking directly benefits local guides, homestays and artisans. We travel responsibly, ensuring your journey uplifts the communities you visit.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-icon">
          <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </div>
        <h3 class="why-title">Unique Experiences</h3>
        <p class="why-desc">From tea garden sunrise walks to jungle river safaris, we craft journeys that feel personal — because no two travellers see the same Nepal.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════ MAP ══════════════ -->
<section class="map-section section" id="map-section">
  <div class="container">
    <div class="map-inner">
      <div class="map-sidebar reveal-left">
        <div class="section-tag"><span class="section-tag-dot"></span>Explore the Map</div>
        <h2 class="section-title" style="font-size:clamp(1.6rem,3vw,2.2rem)">Find Your<br><em>Next Adventure</em></h2>
        <p class="section-sub" style="font-size:0.88rem;margin-top:0.75rem">
          All destinations plotted across Nepal's diverse landscape — from lowland wetlands to the high Himalayas.
        </p>

        <div class="map-places">
          <?php
          $mapPlaces = [
            ['slug'=>'ilam',         'name'=>'Ilam',         'desc'=>'Tea Gardens · Province No. 1',    'icon'=>'leaf'],
            ['slug'=>'janakpur',     'name'=>'Janakpur',     'desc'=>'Sacred City · Madhesh Province',  'icon'=>'star'],
            ['slug'=>'koshi-tappu',  'name'=>'Koshi Tappu',  'desc'=>'Wildlife · Koshi River Delta',    'icon'=>'bird'],
            ['slug'=>'kanchenjunga','name'=>'Kanchenjunga', 'desc'=>'Mountain Trek · Far East Nepal',  'icon'=>'mountain'],
          ];
          $icons = [
            'leaf'     => '<path d="M11 20A7 7 0 014.5 7.5c4.39-.47 8.74 2.31 9.5 6.5 0 0 .5-4.45 3.06-5.58A7 7 0 0120.5 15"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>',
            'star'     => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
            'bird'     => '<path d="M23 7l-7-5-7 5V2l7 5 7-5v5z"/><path d="M19 21V11h-3l-4-3-4 3H5v10h5v-4h4v4z"/>',
            'mountain' => '<polygon points="3 18 9 6 15 15 18 10 21 18"/>',
          ];
          foreach($mapPlaces as $p): ?>
          <button class="map-place-btn<?= $p['slug']==='ilam'?' active':'' ?>" data-slug="<?= $p['slug'] ?>">
            <div class="map-place-icon">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <?= $icons[$p['icon']] ?>
              </svg>
            </div>
            <div>
              <div class="map-place-name"><?= htmlspecialchars($p['name']) ?></div>
              <div class="map-place-desc"><?= htmlspecialchars($p['desc']) ?></div>
            </div>
          </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="reveal">
        <div id="main-map"></div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════ CTA ══════════════ -->
<section class="cta-section section-sm">
  <div class="container">
    <div class="cta-inner reveal">
      <div>
        <div class="cta-tag">Start Your Journey</div>
        <h2 class="cta-title">Ready to Discover<br>Hidden Nepal?</h2>
        <p class="cta-sub">Join travellers who chose the road less taken. Your next extraordinary experience is just one booking away.</p>
      </div>
      <div class="cta-actions">
        <a href="booking.php" class="btn-cta-primary">Reserve Your Journey</a>
        <a href="#destinations-section" class="btn-cta-ghost">View Destinations</a>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════ FOOTER ══════════════ -->
<footer class="footer">
  <div class="footer-inner">
    <div class="footer-top">
      <div>
        <div class="footer-logo">
          <div class="footer-logo-badge">
            <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
          UnseenTrails
        </div>
        <p class="footer-brand-desc">A discovery platform for Nepal's hidden destinations — built for curious travellers who want more than a tourist trail.</p>
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
          <a href="#map-section">Map</a>
          <a href="booking.php">Book a Trip</a>
        </div>
      </div>
      <div>
        <div class="footer-col-title">Nepal</div>
        <div class="footer-links">
          <a href="#">Tea Culture</a>
          <a href="#">Wildlife</a>
          <a href="#">Sacred Sites</a>
          <a href="#">Trekking</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-copy">&copy; <?= date('Y') ?> <span>Unseen Trails</span> · Hidden Nepal, Discovered</div>
      <div class="footer-copy">Made with care for responsible travellers</div>
    </div>
  </div>
</footer>

<!-- Google Maps JavaScript API -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyKfKdofsdxLUdB-3YyRSkGFI4EoziytI&callback=initGoogleMap"
  async defer>
</script>
<script src="js/script.js"></script>
<script src="js/map.js"></script>
</body>
</html>
