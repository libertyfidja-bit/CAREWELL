<?php
$centers = [
    ['name' => 'Harborview Family Health', 'type' => 'Primary care', 'location' => 'Westside', 'distance' => '0.8 mi', 'rating' => '4.9', 'open' => 'Open until 8:00 PM', 'color' => 'mint', 'icon' => '✚'],
    ['name' => 'Northstar Children\'s Clinic', 'type' => 'Pediatrics', 'location' => 'North district', 'distance' => '1.4 mi', 'rating' => '4.8', 'open' => 'Open until 6:00 PM', 'color' => 'sky', 'icon' => '✦'],
    ['name' => 'Oak & Stone Wellness', 'type' => 'Women\'s health', 'location' => 'Downtown', 'distance' => '2.1 mi', 'rating' => '4.7', 'open' => 'Open until 7:30 PM', 'color' => 'peach', 'icon' => '♡'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Find trusted health centers and book care near you.">
    <title>Carewell | Find care that fits your life</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="carewell-site">
<header class="care-header">
    <a class="care-logo" href="#top"><span class="care-logo-mark">+</span><span>carewell</span></a>
    <nav class="care-nav" id="care-nav" aria-label="Main navigation">
        <a href="#centers">Find a center</a><a href="#services">Services</a><a href="#about">About us</a>
    </nav>
    <div class="care-header-actions"><button class="login-link" type="button" data-auth-action="login">Sign in</button><a class="care-button care-button-dark booking-link" href="#booking">Book an appointment <span>↗</span></a></div>
    <button class="menu-button" id="menu-button" aria-label="Open menu" aria-expanded="false">☰</button>
</header>

<main id="top">
    <section class="care-hero">
        <div class="hero-copy">
            <p class="eyebrow"><span class="eyebrow-dot"></span> Care, closer to home</p>
            <h1>Good health starts <em>here.</em></h1>
            <p class="hero-lede">Find trusted healthcare professionals, welcoming centers, and appointments that work around your life.</p>
            <div class="care-search" role="search">
                <span class="search-symbol">⌕</span><input id="center-search" type="search" placeholder="Search by care, center, or location" aria-label="Search health centers"><button id="search-button" class="care-button care-button-coral">Search <span>↗</span></button>
            </div>
            <div class="hero-note"><span>⌖</span> Serving your neighborhood with <strong>same-day appointments</strong></div>
        </div>
        <div class="hero-visual" aria-label="A welcoming health center consultation">
            <div class="sun-shape"></div><div class="hero-arch"><div class="hero-person"></div><div class="hero-plant"></div></div>
            <div class="floating-note"><span class="note-check">✓</span><div><strong>Care made simple</strong><small>Appointments in 3 easy steps</small></div></div>
        </div>
    </section>

    <section class="trust-strip" aria-label="Carewell highlights"><div><strong>4.9/5</strong><span>patient satisfaction</span></div><i></i><div><strong>24k+</strong><span>people cared for</span></div><i></i><div><strong>18</strong><span>local care centers</span></div><i></i><div><strong>7 days</strong><span>appointments available</span></div></section>

    <section class="care-section" id="centers">
        <div class="section-heading"><div><p class="eyebrow">Explore care near you</p><h2>Meet your neighborhood <em>care team.</em></h2></div><a class="text-link booking-link" href="#booking">View all centers <span>↗</span></a></div>
        <div class="center-grid" id="center-grid">
            <?php foreach ($centers as $center): ?>
            <article class="center-card" data-search="<?= htmlspecialchars(strtolower($center['name'].' '.$center['type'].' '.$center['location'])) ?>">
                <div class="center-image <?= htmlspecialchars($center['color']) ?>"><span class="center-symbol"><?= $center['icon'] ?></span><span class="center-distance">⌖ <?= htmlspecialchars($center['distance']) ?></span></div>
                <div class="center-info"><div class="center-type"><?= htmlspecialchars($center['type']) ?></div><h3><?= htmlspecialchars($center['name']) ?></h3><p><?= htmlspecialchars($center['location']) ?> <span class="rating">★ <?= htmlspecialchars($center['rating']) ?></span></p><div class="center-footer"><span class="open-dot"></span><?= htmlspecialchars($center['open']) ?><a href="#booking" class="arrow-link booking-link" aria-label="Book at <?= htmlspecialchars($center['name']) ?>">↗</a></div></div>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="no-results" id="no-results" hidden>No centers matched your search. Try another location or type of care.</p>
    </section>

    <section class="care-section services-section" id="services"><div class="section-heading"><div><p class="eyebrow">Care for every chapter</p><h2>Whatever you need, <em>we're here.</em></h2></div></div><div class="service-list"><a href="#booking" class="booking-link"><span class="service-icon mint">✚</span><span><strong>Primary care</strong><small>Everyday health, made personal</small></span><b>↗</b></a><a href="#booking" class="booking-link"><span class="service-icon sky">♡</span><span><strong>Women's health</strong><small>Thoughtful care at every stage</small></span><b>↗</b></a><a href="#booking" class="booking-link"><span class="service-icon peach">✦</span><span><strong>Children's care</strong><small>Little patients, big attention</small></span><b>↗</b></a></div></section>

    <section class="booking-panel" id="booking"><div><p class="eyebrow">Ready when you are</p><h2>Take the first step<br><em>toward feeling better.</em></h2><p>Tell us what you need and our care team will help you find the right appointment.</p></div><form id="booking-form"><label>Your email address<input id="booking-email" type="email" required placeholder="you@example.com"></label><button class="care-button care-button-coral" type="submit">Start booking <span>↗</span></button><small>Sign in first so we can save your appointment request.</small></form></section>
</main>
<footer class="care-footer" id="about"><a class="care-logo" href="#top"><span class="care-logo-mark">+</span><span>carewell</span></a><span>Thoughtful healthcare for real life.</span><span>© 2026 Carewell Health</span></footer>
<div class="care-toast" id="care-toast" role="status"></div>
<div class="auth-overlay" id="auth-overlay" hidden>
    <section class="auth-modal" role="dialog" aria-modal="true" aria-labelledby="auth-title">
        <button class="auth-close" id="auth-close" type="button" aria-label="Close authentication dialog">×</button>
        <div class="auth-brand"><span class="care-logo-mark">+</span><span>carewell</span></div>
        <p class="eyebrow" id="auth-eyebrow">Welcome back</p>
        <h2 id="auth-title">Sign in to your care.</h2>
        <p class="auth-copy" id="auth-copy">Access your appointments and continue booking with Carewell.</p>
        <form id="auth-form">
            <div class="auth-signup-only" hidden><label>Full name<input id="auth-name" type="text" autocomplete="name"></label></div>
            <label>Email address<input id="auth-email" type="email" autocomplete="email" required></label>
            <label>Password<input id="auth-password" type="password" autocomplete="current-password" minlength="6" required></label>
            <div class="auth-signup-only" hidden><label>Confirm password<input id="auth-confirm-password" type="password" autocomplete="new-password" minlength="6"></label></div>
            <button class="care-button care-button-coral auth-submit" id="auth-submit" type="submit">Sign in <span>↗</span></button>
        </form>
        <p class="auth-switch"><span id="auth-switch-label">New to Carewell?</span> <button type="button" id="auth-switch">Create an account</button></p>
    </section>
</div>
<script src="assets/app.js"></script>
</body>
</html>
