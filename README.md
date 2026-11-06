# Carewell

A public website for finding health centers and starting an appointment request.
Sign-in, account creation and booking are currently demo features that run in the
browser (data is kept in `localStorage`, not on a server).

## Files

```
carewell/
├── index.php        page (PHP only fills in the centers list)
├── assets/
│   ├── style.css    all styles
│   └── app.js       search, sign-in demo, booking demo
├── Dockerfile       container for hosting (PHP + Apache)
├── render.yaml      Render.com blueprint
└── .dockerignore / .gitignore
```

## Run locally

Requires PHP 7.4+ (or 8.x).

```bash
php -S localhost:8080
```

Then open http://localhost:8080.

## Deploy on Render

1. Push this folder to its own GitHub repository.
2. In Render: **New → Blueprint**, pick the repository, and apply.
3. Open the `https://carewell-xxxx.onrender.com` URL when the deploy shows **Live**.

Free Render services sleep when idle, so the first visit after a quiet period is slow.

## Adding a real database later

Accounts and appointments are not stored on a server yet. To store them, create a
database for this site in your MySQL/TiDB dashboard, and connect to it from PHP using
environment variables (host, port, user, password) rather than values written in code.
