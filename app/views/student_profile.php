<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information — <?= htmlspecialchars($name); ?></title>
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
        .topline { display: flex; justify-content: space-between; align-items: center; margin-bottom: 3.5rem; font: 0.8rem Arial, sans-serif; color: var(--muted); }
        .status { color: #30734d; font-weight: bold; }
        .profile-heading { display: flex; align-items: end; gap: 1.5rem; padding-bottom: 2rem; border-bottom: 1px solid var(--line); }
        .avatar { flex: 0 0 auto; width: 88px; height: 88px; display: grid; place-items: center; background: var(--yellow); color: var(--blue); border-radius: 50%; font-size: 2.2rem; font-weight: bold; }
        h1 { font-size: clamp(2.8rem, 5vw, 5rem); line-height: 0.95; font-weight: normal; letter-spacing: -0.04em; }
        .profile-heading p { color: var(--blue); font: 700 0.78rem Arial, sans-serif; letter-spacing: 0.12em; text-transform: uppercase; margin-top: 0.7rem; }
        .profile-grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(240px, 0.55fr); gap: clamp(2rem, 8vw, 8rem); margin-top: 2.5rem; }
        .details { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); column-gap: 2rem; }
        .row { padding: 1rem 0; border-bottom: 1px solid var(--line); }
        .row .label { display: block; color: var(--muted); font: 700 0.68rem Arial, sans-serif; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 0.4rem; }
        .row .value { display: block; overflow-wrap: anywhere; font-size: 1.05rem; }
        .bio-panel { border-top: 4px solid var(--blue); padding-top: 1rem; }
        .bio-panel h2 { color: var(--blue); font: 700 0.75rem Arial, sans-serif; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1rem; }
        .bio { color: var(--muted); font-size: 1.1rem; line-height: 1.65; }
        @media (max-width: 760px) { .app-shell { display: block; } aside { padding: 1.25rem; } .brand { padding-bottom: 1.25rem; } nav { display: flex; overflow-x: auto; } nav a { white-space: nowrap; } .side-note { display: none; } main { padding: 2.5rem 1.25rem; } .topline { margin-bottom: 2.5rem; } .profile-heading { align-items: start; flex-direction: column; } .profile-grid { grid-template-columns: 1fr; } }
        @media (max-width: 480px) { .details { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
<div class="app-shell">
    <aside>
        <div class="brand">MCC <span>/</span> student</div>
        <div class="eyebrow">Your portal</div>
        <nav>
            <a href="<?= site_url('student'); ?>">Overview</a>
            <a class="active" href="<?= site_url('student/profile'); ?>">My profile</a>
        </nav>
        <p class="side-note">A focused space for your student information and campus identity.</p>
    </aside>
    <main>
        <div class="topline"><span>STUDENT DASHBOARD / PROFILE</span><span class="status">● Access active</span></div>
        <section class="profile-heading">
            <div class="avatar"><?= htmlspecialchars(strtoupper(substr($name, 0, 1))); ?></div>
            <div><h1><?= htmlspecialchars($name); ?></h1><p>Student identity record</p></div>
        </section>
        <section class="profile-grid">
            <div class="details">
        <div class="row"><span class="label">Student ID</span><span class="value"><?= htmlspecialchars($student_id); ?></span></div>
        <div class="row"><span class="label">Name</span><span class="value"><?= htmlspecialchars($name); ?></span></div>
        <div class="row"><span class="label">Course</span><span class="value"><?= htmlspecialchars($course); ?></span></div>
        <div class="row"><span class="label">Year Level</span><span class="value"><?= htmlspecialchars($year); ?></span></div>
        <div class="row"><span class="label">Section</span><span class="value"><?= htmlspecialchars($section); ?></span></div>
        <div class="row"><span class="label">Email</span><span class="value"><?= htmlspecialchars($email); ?></span></div>
        <div class="row"><span class="label">Address</span><span class="value"><?= htmlspecialchars($address); ?></span></div>
        <div class="row"><span class="label">Contact</span><span class="value"><?= htmlspecialchars($contact); ?></span></div>
        <div class="row"><span class="label">Skills</span><span class="value"><?= htmlspecialchars($skills); ?></span></div>
            </div>
            <div class="bio-panel"><h2>About me</h2><p class="bio">&ldquo;<?= htmlspecialchars($bio); ?>&rdquo;</p></div>
        </section>
    </main>
</div>

</body>
</html>
