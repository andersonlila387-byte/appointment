# 🔥 FINAL MASTER PROMPT — UNIVERSAL APPOINTMENT & BOOKING PLATFORM (ULTIMATE)

Build a **production‑ready SaaS web application** for a universal **Appointment Scheduling & Booking Platform** with embeddable widgets, advanced customization, strong security, payments in Naira, and multi‑role support.

This system must feel like **infrastructure**, not a demo or basic form app.

---

## 1. CORE VISION

The platform allows **any business** (salons, clinics, consultants, agencies, schools) to:

* Accept appointments via widgets or landing pages
* Manage teams/workers
* Sync with Google Calendar
* Customize booking forms
* Receive branded emails
* Securely handle bookings and payments

Widget‑first. Security‑first. Customization‑first.

---

## 2. UI & DESIGN DIRECTION (LOCKED)

### Style Rules

* Boxy, modular, widget‑based UI
* Grid‑driven layouts
* Functional system UI (not decorative)

### Color Rules

* Max **2–3 colors total**
* Neutral grayscale + 1 brand color + optional status accent
* No gradients
* No heavy shadows

### Modes

* Light & Dark mode (Tailwind class‑based)
* Widgets auto‑inherit mode

### Mobile

* Responsive design
* **Bottom navigation on mobile**
* Reusable navigation components

---

## 3. UI INSPIRATION (REFERENCE ONLY)

Use for layout logic and spacing — not visuals or colors:

* [https://dribbble.com/search/dashboard-ui](https://dribbble.com/search/dashboard-ui)
* [https://dribbble.com/search/admin-dashboard](https://dribbble.com/search/admin-dashboard)
* [https://dribbble.com/search/scheduling-dashboard](https://dribbble.com/search/scheduling-dashboard)
* [https://dribbble.com/search/appointment-system](https://dribbble.com/search/appointment-system)
* [https://dribbble.com/search/booking-widget](https://dribbble.com/search/booking-widget)
* [https://dribbble.com/search/calendar-dashboard](https://dribbble.com/search/calendar-dashboard)

---

## 4. TECHNOLOGY STACK

* HTML
* Tailwind CSS
* Vanilla JavaScript
* PHP (PDO)
* MySQL
* Lucide Icons
* PHPMailer
* Google OAuth + Google Calendar API
* Paystack / Flutterwave (₦ payments)

No frontend frameworks.

---

## 5. SYSTEM ROLES

1. **Platform / Core System**
2. **Business Admin**
3. **Worker / Staff**
4. **Customer / Visitor**

---

## 6. AUTHENTICATION & USER FLOWS

### Required Pages

* Login
* Register (Business)
* Email verification
* Forgot password
* Reset password
* Google Sign‑in / Sign‑up
* Logout

### Rules

* Email verification required before activation
* Role‑based redirects (admin / worker)
* Secure password reset tokens (time‑limited)

---

## 7. EMAIL SYSTEM (PHPMailer)

### Email Requirements

All emails must be **custom‑branded** per business:

* Business name
* Business logo
* Visitor / client name
* Appointment details

### Email Types

* Verify email
* Forgot password
* Booking confirmation (visitor)
* New booking alert (business)
* Worker assignment alert
* Cancellation / reschedule
* Payment receipt

Clean HTML, boxy layout, no rounded corners.

### .ENV CONFIGURATION

```
DB_HOST=
DB_NAME=
DB_USER=
DB_PASS=

MAIL_HOST=
MAIL_PORT=
MAIL_USER=
MAIL_PASS=
MAIL_FROM=
MAIL_FROM_NAME=

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=
```

---

## 8. BLIND ID SECURITY SYSTEM

* Never expose real database IDs
* Generate **5‑character random Blind IDs**
* Use Blind IDs in:

  * Widget URLs
  * Booking references
  * Public APIs

Example:

```
Widget URL: ?w=A7F3Q
Booking Ref: BK‑9K2M8
```

---

## 9. SECURITY MEASURES (MANDATORY)

* Input sanitization & validation
* CSRF tokens (single‑use)
* Rate limiting per IP
* Login attempt lockout
* Honeypot fields
* Time‑to‑submit detection
* Conditional CAPTCHA
* Security & abuse logs

---

## 10. FORM ENGINE (CORE FEATURE)

### Form Types

* Simple booking
* Service + worker booking
* Multi‑step consultation
* Fully custom form

### Layouts

* Single column
* Stepper
* Compact widget

---

## 11. FORM EDITOR PAGE

Admins can:

* Add/remove fields
* Reorder fields
* Choose field types
* Set required/optional
* Enable worker selection

Live preview panel required.

---

## 12. CUSTOMIZATION PAGE

Controls:

* Widget size (S/M/L)
* Layout style
* Color selection (2–3 max)
* Light / Dark / Auto
* Business logo
* Widget title & description

Live preview required.

---

## 13. AVAILABILITY ENGINE

Available slots =

```
Business Hours
∩ Worker Availability
∩ Google Calendar Free Time
∩ No Existing Appointment
```

---

## 14. GOOGLE CALENDAR INTEGRATION

* OAuth per business & worker
* Read busy times
* Create/update/delete events
* Add client as calendar guest
* Encrypted token storage
* Fallback if disconnected

---

## 15. BOOKING WIDGET SYSTEM

* Iframe embed
* JavaScript embed
* Blind ID based
* Auto light/dark
* Responsive sizes

---

## 16. BUSINESS SUBDOMAIN LANDING PAGES

For businesses without websites:

```
https://businessname.platform.com
```

Includes:

* Business info
* Services
* Booking widget
* Contact info

---

## 17. PRICING PLANS (₦ NAIRA)

### Free

* Basic widget
* Limited bookings/month
* No Google Calendar

### Starter — ₦5,000/mo

* Google Calendar sync
* Worker support
* Email branding

### Pro — ₦15,000/mo

* Form editor
* Multi‑step forms
* Subdomain landing page

### Enterprise — ₦50,000/mo

* White‑label
* Advanced API
* Priority support

Payments via Paystack / Flutterwave.

---

## 18. COMPETITIVE ADVANTAGES

* Widget‑first architecture
* Blind ID security
* Built‑in form builder
* Multi‑step consultations
* Business‑branded emails
* Subdomain landing pages
* Naira payments
* Anti‑abuse baked in

---

## 19. BUILD ORDER (STRICT)

1. UI component system
2. Auth flows
3. Dashboard shell
4. Services & workers
5. Availability engine
6. Booking widget
7. Email system
8. Payments
9. Customization
10. Form editor
11. Google Calendar sync
12. Subdomain pages

---

## 20. PUBLIC LANDING PAGE SECTIONS

* Hero
* Core Modules (Engine)
* Security Stack (new)
* Connectivity
* Pricing

---

## END OF MASTER PROMPT
