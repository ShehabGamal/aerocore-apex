# AeroCore Apex — High-Converting DTC WooCommerce Product Detail Page (PDP)

[![Launch Live WordPress Demo](https://img.shields.io/badge/Live_Demo-WordPress_Playground-21759B?style=for-the-badge&logo=wordpress&logoColor=white)](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/ShehabGamal/aerocore-apex/main/blueprint.json)
![WordPress](https://img.shields.io/badge/WordPress-6.7+-21759B?style=flat-square&logo=wordpress)
![WooCommerce](https://img.shields.io/badge/WooCommerce-9.x-96588A?style=flat-square&logo=woocommerce)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![Vanilla JS](https://img.shields.io/badge/JavaScript-ES6+_Zero_jQuery-F7DF1E?style=flat-square&logo=javascript)

> **Live Interactive WordPress Demo ($0 Zero-Install via WordPress Playground):**  
> [**Launch AeroCore Apex in WordPress Playground →**](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/ShehabGamal/aerocore-apex/main/blueprint.json)

---

## Executive Overview

**AeroCore Apex** is a custom-engineered Direct-to-Consumer (DTC) **WooCommerce Product Detail Page (PDP) Theme** built for a flagship audiophile hardware product (*AeroCore Apex Lossless Planar Magnetic Wireless Headphones*).

Instead of relying on bloated multi-purpose themes or heavy jQuery plugins, this project demonstrates **hook-driven WooCommerce architecture**, **zero-reload AJAX cart fragment synchronization**, **dynamic tiered bundle pricing**, and **1-page checkout velocity optimization**.

---

## Key WordPress & WooCommerce Engineering Highlights

- **Hook-Driven Single Product Summary Re-Architecture (`woocommerce_single_product_summary`):**
  - Unhooks default WooCommerce summary callbacks and re-binds them in a conversion-optimized DTC hierarchy:
    1. Pre-title limited-production badge & verified star rating (`priority 4`)
    2. Product title & acoustic positioning subtitle (`priority 6–8`)
    3. Dynamic price block with **Klarna / Afterpay 4x interest-free installment** filter (`woocommerce_get_price_html` at `priority 12`)
    4. Visual finish swatch engine with URL state sync (`?color=space-obsidian`) & live low-stock urgency trigger (`priority 18`)
    5. Tiered hardware bundle builder & primary Add-to-Cart action (`priority 30`)
    6. Risk-reversal trust badges & technical specification accordions (`priority 35`)
- **Zero-Reload Slide-Over Mini-Cart & Free Shipping Progress Engine:**
  - Implements custom `woocommerce_add_to_cart_fragments` and an authenticated `wp_ajax_aerocore_update_mini_cart` endpoint calculating real-time progress toward the **$400 Free Express Shipping** threshold.
- **Checkout Friction Elimination (`woocommerce_checkout_fields`):**
  - Programmatically strips non-essential checkout inputs (`billing_company`, `billing_address_2`, `shipping_company`, `shipping_address_2`, and `order_comments`) to maximize 1-page checkout completion rates.
- **Below-the-Fold Objection Obliteration Architecture (`woocommerce/single-product.php`):**
  - Interactive exploded planar driver hotspot diagram, competitor benchmark matrix, studio UGC gallery, filterable verified buyer reviews, and 1-click cross-sell accessories.
- **Elementor & Block Editor Ready:**
  - Registers Elementor Theme Builder core locations (`elementor/theme/register_locations`) and provides an `Elementor Full Width` page template (`template-elementor.php`).

---

## Tech Stack

| Layer | Technologies |
| :--- | :--- |
| **CMS & E-Commerce** | WordPress 6.7+, WooCommerce 9.x |
| **Backend Engineering** | PHP 8.2, WooCommerce Actions & Filters, `WC_AJAX` / `admin-ajax.php`, Nonce Security |
| **Frontend Architecture** | Semantic HTML5, CSS3 Custom Properties (Design Tokens), Zero-jQuery Modular ES6+ JavaScript |
| **Page Builder Support** | Elementor Theme Builder Location API, Block Editor (`page.php`, `template-elementor.php`) |
| **Cloud / Demo Runtime** | WordPress Playground Blueprint (`git:directory` sparse checkout + automated WooCommerce provisioning) |

---

## Repository Structure

```text
aerocore-apex/
├── blueprint.json                                     # WordPress Playground automated provisioning blueprint
├── README.md                                          # Project documentation
├── wp-content/
│   └── themes/
│       └── aerocore-apex/
│           ├── style.css                              # WordPress theme header & metadata
│           ├── functions.php                          # Theme setup, asset enqueue & WooCommerce hook loader
│           ├── header.php                             # Global semantic header
│           ├── footer.php                             # Global footer & wp_footer() hook
│           ├── front-page.php                         # Flagship DTC PDP showcase template
│           ├── page.php                               # Standard WordPress / Gutenberg page template
│           ├── template-elementor.php                 # Elementor Full Width page template
│           ├── index.php                              # Fallback template
│           ├── assets/
│           │   ├── styles.css                         # Modular DTC design system & responsive layout
│           │   └── app.js                             # Swatch engine, bundle calculator, cart drawer & review filters
│           └── woocommerce/
│               ├── functions.php                      # WooCommerce summary re-order, Klarna filter, AJAX cart & checkout hooks
│               └── single-product.php                 # Custom 2-zone WooCommerce single-product template override
└── zips/
    └── aerocore-apex-theme.zip                        # Ready-to-upload installable WordPress theme package
```

---

## Installation & Deployment

### 1. Instant Browser Demo (WordPress Playground)
Click the live blueprint link to boot WordPress 6.7 + PHP 8.2 + WooCommerce + the `aerocore-apex` theme directly in your browser:
- [**Launch Live Demo**](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/ShehabGamal/aerocore-apex/main/blueprint.json)

### 2. Standard WordPress / LocalWP / Production Host
1. Install and activate **WooCommerce** in your WordPress site.
2. Go to **Appearance → Themes → Add New → Upload Theme** and upload `zips/aerocore-apex-theme.zip` (or copy `wp-content/themes/aerocore-apex` into your `/wp-content/themes/` directory).
3. Click **Activate**.
