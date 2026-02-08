# Pages and Architecture

This document outlines all pages in the appointment platform and the accompanying frontend and backend architecture. It follows the master prompt: widget‑first, security‑first, customization‑first, with HTML + Tailwind + Vanilla JS on the frontend and PHP (PDO) + MySQL on the backend. All interactive flows use AJAX to minimize full page reloads.

## Directory Structure

- public/ — entry pages (index.php, login.php, dashboard.php, etc.)
- assets/css/ — Tailwind build output and minimal utility CSS
- assets/js/ — modular vanilla JS (controllers, services, widgets)
- components/ — HTML partials (headers, navs, dialogs, cards)
- templates/ — server‑rendered PHP view templates
- api/ — PHP JSON endpoints (auth, bookings, availability, etc.)
- lib/ — shared PHP libraries (db.php, auth.php, security.php, mailer.php)
- config/ — environment bootstrapping (reads .env)
- widgets/ — embeddable booking widget assets/pages

## Frontend Architecture

- No frameworks; use Tailwind utility classes and small vanilla JS modules
- Progressive enhancement: pages render server HTML, JS upgrades via AJAX
- State management: simple module‑scoped stores per page (no global singleton)
- Components: reusable UI pieces (cards, list items, modals, steppers)
- AJAX via fetch with JSON responses and CSRF token headers
- UX patterns: inline loaders, optimistic updates where safe, toast alerts
- Theme: light/dark via Tailwind class on html; widgets auto‑inherit
- Icons: Lucide via SVG; no rounded corners; boxy, grid‑driven layouts

## Backend Architecture

- PHP (PDO) with strict prepared statements and input validation
- api/* endpoints return JSON only; public pages render HTML via templates
- Session management for authenticated users; role‑based access control
- CSRF: single‑use tokens issued server‑side, required on state‑changing calls
- Blind IDs: 5‑char IDs for public refs (widgets, booking refs)
- Services: Auth, Business, Workers, Services, Availability, Bookings, Email, Payments, Google OAuth/Calendar
- Error handling: consistent JSON envelope; security & abuse logs

## AJAX Conventions

- Request: JSON body; include X‑CSRF‑Token header for POST/PUT/PATCH/DELETE
- Response envelope:
  - { status: "ok", data } for success
  - { status: "error", code, message, errors } for failures
- Pagination: query params page, per_page; response includes total, next_cursor
- Rate limiting feedback: HTTP 429 with retry_after seconds
- Idempotency: booking/payment initialization accepts Idempotency‑Key when applicable

## Pages by Role

### Public / Visitor

- Business Landing Page (subdomain) — services list, contact, embedded widget
- Booking Widget Page — compact/single/stepper layouts, service/worker selection
- Booking Confirmation — summary, calendar add link, email confirmation
- Payment Page — initialize and verify via Paystack/Flutterwave
- Policies — Terms of Service, Privacy Policy

### Authentication

- Login — email/password + Google Sign‑in
- Register (Business) — business profile and owner account
- Email Verification — token flow before activation
- Forgot Password — request reset email
- Reset Password — time‑limited token form
- Google OAuth Callback — token exchange and account link

### Business Admin Dashboard

- Overview — KPIs, upcoming bookings, quick actions
- Calendar — day/week/month views; create/update/cancel bookings
- Services Management — CRUD services, durations, prices
- Workers Management — CRUD workers, assignment rules
- Availability Settings — business hours, worker availability
- Form Editor — build booking forms, field types, order, required flags
- Widget Customization — size, layout, colors, mode, logo, title/description
- Email Templates — branded email previews and variables
- Payments & Billing — plan selection, invoices, receipts, payment methods
- Integrations — Google Calendar status, connect/disconnect, token health
- API & Webhooks — keys, usage, webhook endpoints configuration
- Security & Abuse Logs — rate limits, lockouts, audit entries

### Worker Dashboard

- My Schedule — assigned bookings, calendar view
- Availability — set personal availability windows
- Booking Details — view/update assigned slots within permissions
- Profile — basic info, notification preferences

### Platform / Core Admin

- Tenants — businesses list, status, plan, usage
- Monitoring — system health, queue, mail, payments
- Abuse — flagged IPs, CAPTCHA triggers, lockout counts

## Key API Endpoints (Outline)

- Auth
  - POST /api/auth/register
  - POST /api/auth/login
  - POST /api/auth/logout
  - POST /api/auth/verify
  - POST /api/auth/forgot
  - POST /api/auth/reset
  - GET  /api/auth/me
  - GET  /api/auth/google/url
  - GET  /api/auth/google/callback
- Business
  - GET  /api/business/:blind_id
  - PUT  /api/business/:blind_id
- Services
  - GET  /api/services
  - POST /api/services
  - PUT  /api/services/:id
  - DELETE /api/services/:id
- Workers
  - GET  /api/workers
  - POST /api/workers
  - PUT  /api/workers/:id
  - DELETE /api/workers/:id
- Availability
  - GET  /api/availability?service_id=&worker_id=&date=
  - POST /api/availability/business
  - POST /api/availability/worker/:id
- Bookings
  - POST /api/bookings          — create booking
  - GET  /api/bookings/:ref     — view booking by Blind Ref
  - PUT  /api/bookings/:ref     — reschedule/update
  - DELETE /api/bookings/:ref   — cancel
- Widget
  - GET  /api/widget/config?w=BLIND — load widget config
- Email
  - POST /api/email/test        — send preview with branding
- Payments (₦)
  - POST /api/payments/init     — initialize payment (gateway token)
  - POST /api/payments/verify   — verify payment status
- Integrations
  - GET  /api/google/status
  - POST /api/google/connect
  - POST /api/google/disconnect

## Database Entities (Sketch)

- users(id, role, email, password_hash, is_verified, business_id, created_at)
- businesses(id, blind_id, name, logo_url, plan, subdomain, created_at)
- workers(id, business_id, name, email, calendar_connected, blind_id)
- services(id, business_id, name, duration_min, price_naira, active)
- bookings(id, business_id, service_id, worker_id, visitor_name, visitor_email, start_at, end_at, status, blind_ref, created_at)
- availability_business(id, business_id, weekday, start_time, end_time)
- availability_worker(id, worker_id, weekday, start_time, end_time)
- oauth_tokens(id, user_id, provider, encrypted_token, expires_at)
- payments(id, business_id, booking_id, gateway, ref, amount, currency, status, created_at)
- email_logs(id, business_id, type, to_email, subject, status, created_at)
- abuse_logs(id, ip, action, result, meta_json, created_at)
- api_keys(id, business_id, key_hash, created_at, last_used_at)

## Security Practices

- Validate and sanitize all inputs server‑side
- Single‑use CSRF tokens for state changes
- Login attempt lockout with exponential backoff
- Honeypot + time‑to‑submit + conditional CAPTCHA on public forms
- Rate limiting per IP on sensitive endpoints
- Use Blind IDs for public references; never expose auto‑increment IDs
- Encrypted OAuth tokens; secure secrets via .env

## Page → API Mapping (Examples)

- Login page: POST /api/auth/login → set session; redirect via AJAX to role dashboard
- Register page: POST /api/auth/register → send verification email; show verify prompt
- Dashboard (Admin): GET summaries → /api/bookings?filter=upcoming, /api/services, /api/workers
- Calendar: GET availability → /api/availability; POST bookings; PUT reschedule; DELETE cancel
- Form Editor: GET/PUT form schema → /api/forms (stored as JSON schema)
- Widget Customization: GET/PUT widget config → /api/widget/config
- Payments: POST /api/payments/init then POST /api/payments/verify

## AJAX UI Patterns

- Form submissions use fetch, show inline validation, and success/error toasts
- List pages load with initial HTML; subsequent pagination via AJAX append/replace
- Calendar uses lazy loading per week; optimistic creation with rollback on conflict
- Modals for create/update forms; background refresh of dependent lists
- Skeleton loaders for cards and tables to minimize perceived latency

## Build Order Alignment

- Start with UI component system (components/, Tailwind tokens)
- Implement auth pages and api/auth/* endpoints
- Create dashboard shell pages with role‑based nav
- Add services and workers management (CRUD + AJAX)
- Implement availability engine and calendar UI
- Build booking widget (embeds + compact layouts)
- Integrate PHPMailer for branded emails
- Add payments flows with Paystack/Flutterwave
- Implement widget customization and live preview
- Create form editor (JSON schema + live preview)
- Integrate Google Calendar OAuth and event sync
- Generate business subdomain landing pages and hosting

## Notes

- Keep color palette to 2–3 colors max; boxy UI with grids; light/dark supported
- All endpoints must return consistent JSON envelopes and set proper HTTP codes
- Use modular JS files per page to avoid global conflicts and improve maintainability

