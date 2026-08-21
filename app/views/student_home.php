<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal — Home</title>
    <style>
        :root { --ink: #17212b; --muted: #68727d; --paper: #f7f5ef; --line: #e5e1d8; --blue: #22577a; --yellow: #f2c14e; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Georgia, 'Times New Roman', serif; background: var(--paper); color: var(--ink); min-height: 100vh; }
        .app-shell { min-height: 100vh; display: grid; grid-template-columns: 250px minmax(0, 1fr); }
        aside { background: var(--blue); color: #fff; padding: 2.5rem 1.5rem; display: flex; flex-direction: column; }
        .brand { font-size: 1.4rem; font-weight: bold; letter-spacing: 0.03em; padding: 0 0.75rem 3.5rem; }
        .brand span { color: var(--yellow); }
        .eyebrow { color: #9ec3d6; font: 700 0.7rem/1.2 Arial, sans-serif; letter-spacing: 0.14em; text-transform: uppercase; margin: 0 0 0.8rem 0.75rem; }
        nav { display: grid; gap: 0.45rem; }
        nav a { color: #d9e8ef; text-decoration: none; font: 600 0.9rem Arial, sans-serif; padding: 0.85rem 0.75rem; border-left: 3px solid transparent; }
        nav a:hover, nav a.active { color: #fff; background: rgba(255,255,255,0.1); border-left-color: var(--yellow); }
        .side-note { margin-top: auto; color: #b9d3df; font: 0.8rem/1.5 Arial, sans-serif; padding: 1rem 0.75rem 0; border-top: 1px solid rgba(255,255,255,0.2); }
        main { padding: 4rem clamp(1.5rem, 6vw, 6rem); max-width: 1220px; width: 100%; }
        .topline { display: flex; justify-content: space-between; align-items: center; margin-bottom: 4.5rem; font: 0.8rem Arial, sans-serif; color: var(--muted); }
        .status { color: #30734d; font-weight: bold; }
        .hero { display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(260px, 0.8fr); gap: clamp(2rem, 7vw, 8rem); align-items: end; padding-bottom: 3rem; border-bottom: 1px solid var(--line); }
        h1 { font-size: clamp(3rem, 6vw, 5.8rem); line-height: 0.95; font-weight: normal; letter-spacing: -0.04em; max-width: 650px; }
        h1 em { color: var(--blue); font-style: normal; }
        p.sub { color: var(--muted); font: 1rem/1.7 Arial, sans-serif; max-width: 340px; }
        .welcome-mark { width: 94px; height: 94px; display: grid; place-items: center; background: var(--yellow); color: var(--blue); border-radius: 50%; font-size: 2.2rem; font-weight: bold; margin-bottom: 1.5rem; }
        .notice { background: #fff2ce; color: #765713; border-left: 4px solid var(--yellow); padding: 1rem 1.25rem; margin-top: 2rem; font: 0.88rem/1.5 Arial, sans-serif; }
        .actions { margin-top: 2rem; display: flex; align-items: center; gap: 1.25rem; }
        .btn { display: inline-block; background: var(--ink); color: #fff; text-decoration: none; padding: 0.95rem 1.3rem; font: 700 0.85rem Arial, sans-serif; }
        .btn:hover { background: var(--blue); }
        .text-link { color: var(--blue); font: 700 0.85rem Arial, sans-serif; text-decoration: none; }
        .text-link:hover { text-decoration: underline; }
        .quick-facts { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1px; background: var(--line); margin-top: 2rem; border: 1px solid var(--line); }
        .fact { background: var(--paper); padding: 1.35rem; }
        .fact strong { display: block; color: var(--blue); font-size: 1.5rem; margin-bottom: 0.35rem; }
        .fact span { color: var(--muted); font: 0.72rem Arial, sans-serif; text-transform: uppercase; letter-spacing: 0.08em; }
        @media (max-width: 760px) { .app-shell { display: block; } aside { padding: 1.25rem; } .brand { padding-bottom: 1.25rem; } nav { display: flex; overflow-x: auto; } nav a { white-space: nowrap; } .side-note { display: none; } main { padding: 2.5rem 1.25rem; } .topline { margin-bottom: 3rem; } .hero { grid-template-columns: 1fr; gap: 2rem; } h1 { font-size: clamp(3rem, 16vw, 5rem); } }
    </style>
</head>
<body>
<div class="app-shell">
    <aside>
        <div class="brand">MCC <span>/</span> student</div>
        <div class="eyebrow">Your portal</div>
        <nav>
            <a class="active" href="<?= site_url('student'); ?>">Overview</a>
            <a href="<?= site_url('student/profile'); ?>">My profile</a>
        </nav>
        <p class="side-note">A focused space for your student information and campus identity.</p>
    </aside>
    <main>
        <div class="topline"><span>STUDENT DASHBOARD</span><span class="status">● Access active</span></div>
        <section class="hero">
            <div>
                <div class="welcome-mark">M</div>
                <h1>Welcome,<br><em><?= htmlspecialchars($name); ?></em></h1>
            </div>
            <div>
                <p class="sub">Your student portal is ready. Keep your academic identity close, current, and easy to find.</p>
                <?php if ($denied): ?>
                    <div class="notice">Your access badge is active now. You can open your profile below.</div>
                <?php endif; ?>
                <div class="actions">
                    <a class="btn" href="<?= site_url('student/profile'); ?>">Open my profile</a>
                    <a class="text-link" href="<?= site_url('student/profile'); ?>">View details &rarr;</a>
                </div>
            </div>
        </section>
        <section class="quick-facts" aria-label="Student portal facts">
            <div class="fact"><strong>01</strong><span>Personal profile</span></div>
            <div class="fact"><strong>24/7</strong><span>Portal access</span></div>
        </section>
    </main>
</div>

</body>
</html>
