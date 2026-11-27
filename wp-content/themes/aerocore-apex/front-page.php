<?php
/**
 * Front Page Template for AeroCore Apex DTC
 */
defined( 'ABSPATH' ) || exit;
get_header();
?>
<!-- =====================================================================
       0A. STICKY UTILITY BAR
       ===================================================================== -->
  <div class="utility-bar" role="region" aria-label="Shipping Announcement">
    ⚡ FREE WORLDWIDE EXPRESS SHIPPING ON ORDERS OVER $150 &nbsp;•&nbsp; <span>30-DAY RISK-FREE HOME AUDITION</span>
  </div>

  <!-- =====================================================================
       0B. GLOBAL HEADER: Logo | Collection | Technology | Reviews | Support | Cart Drawer Icon
       ===================================================================== -->
  <header class="site-header">
    <div class="container navbar">
      <div class="header-left">
        <button type="button" class="mobile-menu-btn" id="open-mobile-nav" aria-label="Open Menu">
          ☰
        </button>
        <a href="#" class="brand-logo">
          <span class="logo-mark">A</span>
          <span class="logo-text">
            <span class="logo-title">AEROCORE</span>
            <span class="logo-sub">ACOUSTIC LABS</span>
          </span>
        </a>
      </div>

      <nav aria-label="Primary Navigation">
        <ul class="nav-links">
          <li><a href="#pdp-top" class="active">Apex Flagship</a></li>
          <li><a href="#exploded-engineering">Acoustic Tech</a></li>
          <li><a href="#comparison-matrix">Benchmark</a></li>
          <li><a href="#editorial-ugc">In The Studio</a></li>
          <li><a href="#verified-reviews">Reviews (1,428)</a></li>
          <li><a href="#cross-sell">Accessories</a></li>
        </ul>
      </nav>

      <div class="header-actions">
        <select class="currency-select" id="currency-selector" aria-label="Currency Selector">
          <option value="USD" data-rate="1" data-symbol="$">USD $</option>
          <option value="EUR" data-rate="0.92" data-symbol="€">EUR €</option>
          <option value="GBP" data-rate="0.79" data-symbol="£">GBP £</option>
          <option value="AED" data-rate="3.67" data-symbol="AED ">AED د.إ</option>
        </select>

        <button type="button" class="cart-trigger-btn" id="open-cart-btn" aria-label="Open Shopping Bag">
          <span>🛒 Bag</span>
          <span class="cart-count-badge" id="header-cart-count">1</span>
        </button>
      </div>
    </div>
  </header>

  <main id="pdp-top">
    <!-- ===================================================================
         1. ABOVE-THE-FOLD SPLIT MATRIX (Desktop 55/45 split; Mobile stack)
         =================================================================== -->
    <section class="pdp-above-fold">
      <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <span>Home</span> / <span>Wireless Reference Audio</span> / <span>Planar Magnetic Series</span> / <strong>AeroCore Apex</strong>
        </nav>

        <div class="pdp-split-matrix">
          <!-- LEFT (55%): Interactive Media Gallery (Vertical Thumbs + 4K Zoom + 360 Spin) -->
          <div class="pdp-gallery-column">
            <div class="gallery-layout">
              <div class="thumb-rail" id="thumb-rail" role="tablist" aria-label="Product Angles">
                <button type="button" class="thumb-btn active" data-angle="0" role="tab" aria-selected="true">
                  <span class="thumb-dot"></span>
                  <span class="thumb-label">Front 3/4</span>
                </button>
                <button type="button" class="thumb-btn" data-angle="1" role="tab" aria-selected="false">
                  <span class="thumb-dot"></span>
                  <span class="thumb-label">Planar Cup</span>
                </button>
                <button type="button" class="thumb-btn" data-angle="2" role="tab" aria-selected="false">
                  <span class="thumb-dot"></span>
                  <span class="thumb-label">Hard Case</span>
                </button>
                <button type="button" class="thumb-btn" data-angle="3" role="tab" aria-selected="false">
                  <span class="thumb-dot"></span>
                  <span class="thumb-label">USB-C DAC</span>
                </button>
              </div>

              <div class="main-viewport" id="main-viewport">
                <div class="viewport-topbar">
                  <div class="status-pill">
                    <span class="status-pill-dot" id="viewport-swatch-dot"></span>
                    <span id="viewport-caption">4K STUDIO RENDER • SPACE OBSIDIAN</span>
                  </div>
                  <button type="button" class="spin-toggle-btn" id="spin-toggle-btn">
                    ↻ 360° Interactive Spin
                  </button>
                </div>

                <!-- Dynamic 4K SVG Headphone Render with Zoom & 360 Rotation -->
                <div class="headphone-stage" id="headphone-stage" title="Click to toggle 4K Studio Zoom">
                  <svg class="headphone-svg" id="headphone-svg" viewBox="0 0 360 360" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <radialGradient id="studioGlow" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#2563EB" stop-opacity="0.18"/>
                        <stop offset="100%" stop-color="#2563EB" stop-opacity="0"/>
                      </radialGradient>
                    </defs>
                    <!-- Ambient Acoustic Halo -->
                    <circle cx="180" cy="185" r="145" fill="url(#studioGlow)" />
                    <circle cx="180" cy="185" r="120" stroke="#2563EB" stroke-opacity="0.18" stroke-dasharray="4 6" />
                    <!-- Grade-5 Titanium Headband Arc -->
                    <path id="svg-headband" d="M78 190 C78 92, 282 92, 282 190" stroke="#111827" stroke-width="22" stroke-linecap="round" />
                    <path d="M90 175 C90 106, 270 106, 270 175" stroke="#94A3B8" stroke-opacity="0.45" stroke-width="4" stroke-linecap="round" />
                    <!-- CNC Anodized Yoke Hinges -->
                    <rect x="68" y="176" width="20" height="32" rx="6" fill="#64748B" />
                    <rect x="272" y="176" width="20" height="32" rx="6" fill="#64748B" />
                    <!-- Left & Right 50mm Planar Ear Cups -->
                    <rect id="svg-cup-left" x="52" y="192" width="54" height="104" rx="27" fill="#111827" stroke="#2563EB" stroke-width="2.5" />
                    <rect id="svg-cup-right" x="254" y="192" width="54" height="104" rx="27" fill="#111827" stroke="#2563EB" stroke-width="2.5" />
                    <!-- Memory Foam Ear Cushions -->
                    <rect x="96" y="200" width="16" height="88" rx="8" fill="#1E293B" />
                    <rect x="248" y="200" width="16" height="88" rx="8" fill="#1E293B" />
                    <!-- Planar Magnetic Acoustic Grill Lines -->
                    <line x1="68" y1="220" x2="68" y2="268" stroke="#60A5FA" stroke-opacity="0.55" stroke-width="2" stroke-linecap="round"/>
                    <line x1="78" y1="214" x2="78" y2="274" stroke="#60A5FA" stroke-opacity="0.75" stroke-width="2" stroke-linecap="round"/>
                    <line x1="282" y1="214" x2="282" y2="274" stroke="#60A5FA" stroke-opacity="0.75" stroke-width="2" stroke-linecap="round"/>
                    <line x1="292" y1="220" x2="292" y2="268" stroke="#60A5FA" stroke-opacity="0.55" stroke-width="2" stroke-linecap="round"/>
                    <!-- Center Angle Badge -->
                    <rect x="115" y="255" width="130" height="34" rx="17" fill="#FFFFFF" stroke="#E2E8F0" />
                    <text id="svg-angle-label" x="180" y="276" text-anchor="middle" fill="#0F172A" font-family="JetBrains Mono, monospace" font-size="10" font-weight="700">FRONT 3/4 STUDIO</text>
                  </svg>
                </div>

                <!-- 360 Spin Range Control -->
                <div class="spin-slider-wrap" id="spin-slider-wrap">
                  <span style="font-size:11px;font-weight:700;color:#2563EB;">360° Orbit:</span>
                  <input type="range" id="spin-range" min="-180" max="180" value="0" aria-label="Rotate 360 Degrees" />
                  <span id="spin-deg-label" style="font-family:var(--font-mono);font-size:11px;">0°</span>
                </div>

                <div class="viewport-bottombar">
                  <span class="zoom-hint" id="zoom-hint-text">🔍 Click headphone render to toggle 4K macro inspection</span>
                  <span class="status-pill" id="view-counter-pill">Angle 1 / 4</span>
                </div>
              </div>
            </div>

            <!-- Studio Highlights Under Gallery -->
            <div class="gallery-feature-strip">
              <div class="gallery-mini-card">
                <strong>50mm Planar Drivers</strong>
                <span>10Hz–48kHz • &lt;0.05% THD</span>
              </div>
              <div class="gallery-mini-card">
                <strong>48dB Hybrid ANC</strong>
                <span>6-Mic 380k/sec DSP</span>
              </div>
              <div class="gallery-mini-card">
                <strong>60-Hour Autonomy</strong>
                <span>USB-C 24-bit/192kHz DAC</span>
              </div>
            </div>
          </div>

          <!-- RIGHT (45%): Purchase Decision Engine -->
          <div class="purchase-engine-card">
            <div class="pre-title-pill">
              ● FLAGSHIP SERIES • LIMITED PRODUCTION RUN
            </div>

            <div class="rating-row">
              <span class="stars" aria-hidden="true">★★★★★</span>
              <strong>4.9/5</strong>
              <span>•</span>
              <a href="#verified-reviews" class="rating-link">1,428 Verified Buyer Reviews</a>
            </div>

            <div>
              <h1 class="product-title">AeroCore Apex</h1>
              <p class="product-tagline">
                Audiophile-grade lossless planar magnetic audio. Engineered with hybrid active noise cancellation and aerospace titanium framing.
              </p>
            </div>

            <!-- Dynamic Pricing & Klarna 4x Installment Block -->
            <div class="price-block">
              <div class="price-main-row">
                <span class="current-price" id="display-current-price">$389.00</span>
                <span class="original-price" id="display-original-price">$449.00</span>
                <span class="savings-pill" id="display-savings-pill">SAVE $60 (13% OFF)</span>
              </div>
              <p class="installment-teaser">
                Or 4 interest-free payments of <strong id="klarna-installment">$97.25</strong> with
                <span class="klarna-badge">Klarna</span> / <strong>Afterpay</strong>
              </p>
            </div>

            <hr class="divider" />

            <!-- Visual Color Swatches (4 Variations) -->
            <div>
              <div class="swatch-header">
                <span>Finish: <strong id="selected-color-label">Space Obsidian (Deep Matte Black)</strong></span>
                <span class="swatch-url-preview" id="url-query-preview">?color=space-obsidian</span>
              </div>

              <div class="swatch-grid" id="swatch-grid" role="radiogroup" aria-label="Product Color Finish">
                <button type="button" class="swatch-btn active"
                  data-color-slug="space-obsidian"
                  data-color-name="Space Obsidian"
                  data-color-desc="Deep Matte Black"
                  data-hex="#111827"
                  data-stock="14">
                  <span class="swatch-circle" style="background:#111827;"></span>
                  <span>
                    <span class="swatch-name">Space Obsidian</span>
                    <span class="swatch-sub">Deep Matte Black</span>
                  </span>
                </button>

                <button type="button" class="swatch-btn"
                  data-color-slug="lunar-silver"
                  data-color-name="Lunar Silver"
                  data-color-desc="Brushed Aluminum & White Leather"
                  data-hex="#CBD5E1"
                  data-stock="9">
                  <span class="swatch-circle" style="background:#E2E8F0;"></span>
                  <span>
                    <span class="swatch-name">Lunar Silver</span>
                    <span class="swatch-sub">Brushed Aluminum</span>
                  </span>
                </button>

                <button type="button" class="swatch-btn"
                  data-color-slug="nordic-sage"
                  data-color-name="Nordic Sage"
                  data-color-desc="Subtle Earthy Olive"
                  data-hex="#5F6F52"
                  data-stock="6">
                  <span class="swatch-circle" style="background:#5F6F52;"></span>
                  <span>
                    <span class="swatch-name">Nordic Sage</span>
                    <span class="swatch-sub">Subtle Earthy Olive</span>
                  </span>
                </button>

                <button type="button" class="swatch-btn"
                  data-color-slug="midnight-navy"
                  data-color-name="Midnight Navy"
                  data-color-desc="Dark Anodized Blue"
                  data-hex="#1E3A8A"
                  data-stock="11">
                  <span class="swatch-circle" style="background:#1E3A8A;"></span>
                  <span>
                    <span class="swatch-name">Midnight Navy</span>
                    <span class="swatch-sub">Dark Anodized Blue</span>
                  </span>
                </button>
              </div>
            </div>

            <!-- Live Urgency Scarcity Engine -->
            <div class="scarcity-banner" role="status" aria-live="polite">
              <span class="pulse-dot"></span>
              <span id="scarcity-text">Low Stock: Only 14 pairs remaining in Space Obsidian for priority dispatch.</span>
            </div>

            <!-- Bundle Builder (Tiered Incentive) -->
            <div>
              <span class="bundle-section-label">Bundle &amp; Save Upsell Selector</span>
              <div class="bundle-cards" id="bundle-selector">
                <label class="bundle-card active" data-bundle-id="single" data-price="389" data-orig="449" data-title="1x AeroCore Apex (Standard)">
                  <div class="bundle-left">
                    <input type="radio" name="apex-bundle" class="bundle-radio" checked />
                    <div>
                      <div class="bundle-title-row">
                        <span class="bundle-title">1x AeroCore Apex (Standard)</span>
                      </div>
                      <p class="bundle-desc">Includes USB-C Lossless DAC Cable, 3.5mm Cord &amp; Pouch</p>
                    </div>
                  </div>
                  <div class="bundle-price-col">
                    <span class="bundle-price" data-base-price="389">$389</span>
                    <span class="bundle-orig" data-base-orig="449">$449</span>
                  </div>
                </label>

                <label class="bundle-card" data-bundle-id="traveler" data-price="425" data-orig="499" data-title="Traveler Bundle (Apex + Hard Case + Flight Adapter)">
                  <div class="bundle-left">
                    <input type="radio" name="apex-bundle" class="bundle-radio" />
                    <div>
                      <div class="bundle-title-row">
                        <span class="bundle-title">Traveler Bundle</span>
                        <span class="bundle-tag">SAVE 15%</span>
                      </div>
                      <p class="bundle-desc">1x Apex + Magnetic Hard Travel Case + Gold Flight Adapter</p>
                    </div>
                  </div>
                  <div class="bundle-price-col">
                    <span class="bundle-price" data-base-price="425">$425</span>
                    <span class="bundle-orig" data-base-orig="499">$499</span>
                  </div>
                </label>

                <label class="bundle-card" data-bundle-id="duo" data-price="620" data-orig="778" data-title="Audiophile Duo (2x AeroCore Apex Sets)">
                  <div class="bundle-left">
                    <input type="radio" name="apex-bundle" class="bundle-radio" />
                    <div>
                      <div class="bundle-title-row">
                        <span class="bundle-title">Audiophile Duo (2x Sets)</span>
                        <span class="bundle-tag">SAVE 20%</span>
                      </div>
                      <p class="bundle-desc">2x AeroCore Apex Headphones + Dual 4.4mm Balanced Cables</p>
                    </div>
                  </div>
                  <div class="bundle-price-col">
                    <span class="bundle-price" data-base-price="620">$620</span>
                    <span class="bundle-orig" data-base-orig="778">$778</span>
                  </div>
                </label>
              </div>
            </div>

            <!-- Primary Dual CTA: Quantity Incrementer + AJAX Add to Cart + Apple Pay / Shop Pay -->
            <div class="cta-action-row" id="primary-atc-anchor">
              <div class="qty-selector" aria-label="Quantity">
                <button type="button" class="qty-btn" id="qty-minus" aria-label="Decrease quantity">−</button>
                <input type="text" class="qty-input" id="qty-input" value="1" readonly aria-label="Current quantity" />
                <button type="button" class="qty-btn" id="qty-plus" aria-label="Increase quantity">+</button>
              </div>

              <button type="button" class="btn-atc-primary" id="main-atc-btn">
                <span>Add to Cart</span>
                <span>—</span>
                <span id="atc-btn-price">$389.00</span>
              </button>
            </div>

            <div class="express-checkout-row">
              <button type="button" class="btn-express btn-apple-pay" id="apple-pay-btn">
                Buy with  Pay
              </button>
              <button type="button" class="btn-express btn-shop-pay" id="shop-pay-btn">
                Shop Pay • 1-Click
              </button>
            </div>

            <!-- Risk Reversal Trust Badges -->
            <div class="trust-badges-grid">
              <div class="trust-badge-item">
                <strong>✓ 30-Day Audition</strong>
                <span>Free return shipping</span>
              </div>
              <div class="trust-badge-item">
                <strong>✓ 2-Year Warranty</strong>
                <span>Global replacement</span>
              </div>
              <div class="trust-badge-item">
                <strong>✓ Ships in 24 Hours</strong>
                <span>Carbon Neutral Delivery</span>
              </div>
            </div>

            <!-- Collapsible Product Specs Accordions -->
            <div class="specs-accordion-group" id="specs-accordions">
              <div class="accordion-item open">
                <button type="button" class="accordion-trigger">
                  <span>Sound Profile &amp; 50mm Planar Drivers</span>
                  <span class="accordion-icon">▾</span>
                </button>
                <div class="accordion-content">
                  Custom 50mm planar magnetic transducers with a 2-micron ultra-low-mass diaphragm and dual N52 neodymium arrays. Delivers 10Hz–48kHz frequency response with &lt;0.05% harmonic distortion.
                </div>
              </div>

              <div class="accordion-item">
                <button type="button" class="accordion-trigger">
                  <span>Aerospace Titanium Materials &amp; Comfort</span>
                  <span class="accordion-icon">▾</span>
                </button>
                <div class="accordion-content">
                  CNC-milled Grade-5 titanium headband and anodized aluminum yokes distribute weight evenly (315g). Slow-rebound memory foam ear cushions wrapped in breathable protein leather eliminate heat buildup.
                </div>
              </div>

              <div class="accordion-item">
                <button type="button" class="accordion-trigger">
                  <span>60-Hour Battery &amp; Lossless Connectivity</span>
                  <span class="accordion-icon">▾</span>
                </button>
                <div class="accordion-content">
                  60 hours continuous playback with Hybrid ANC enabled (80 hours ANC off). Rapid 10-minute USB-C charge yields 8 hours of listening. Supports bit-perfect 24-bit/192kHz USB-C DAC, aptX Lossless, LDAC, and 4.4mm balanced analog.
                </div>
              </div>

              <div class="accordion-item">
                <button type="button" class="accordion-trigger">
                  <span>In the Box</span>
                  <span class="accordion-icon">▾</span>
                </button>
                <div class="accordion-content">
                  AeroCore Apex Headphones, Acoustic Zip Travel Pouch, 1.5m Braided USB-C Lossless DAC Cable, 1.2m 3.5mm OFC Audio Cable, Individual Frequency Calibration Certificate.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================================================================
         2. PROOF & PRESS MARQUEE (Wirecutter, TechRadar, GQ, Forbes)
         =================================================================== -->
    <section class="press-section" aria-label="Press Accolades">
      <div class="container">
        <p class="press-eyebrow">Acclaimed by Mastering Engineers &amp; Leading Audio Publications</p>
        <div class="press-grid">
          <article class="press-card">
            <div class="press-pub">WIRECUTTER • EDITORS' PICK</div>
            <p class="press-quote">“The first wireless headphone that genuinely rivals $1,200 open-back planar studio references.”</p>
          </article>
          <article class="press-card">
            <div class="press-pub">TECHRADAR • 5/5 STARS</div>
            <p class="press-quote">“Sub-bass extension and transient speed that makes standard dynamic drivers sound veiled.”</p>
          </article>
          <article class="press-card">
            <div class="press-pub">GQ MAGAZINE</div>
            <p class="press-quote">“CNC titanium and matte obsidian leather—industrial design worthy of a modern museum.”</p>
          </article>
          <article class="press-card">
            <div class="press-pub">FORBES AUDIO</div>
            <p class="press-quote">“At $389 direct-to-consumer, AeroCore Apex obliterates the retail markup of legacy audio brands.”</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ===================================================================
         3. EXPLODED ENGINEERING DIAGRAM (Interactive Hotspot Section)
         =================================================================== -->
    <section class="exploded-section" id="exploded-engineering">
      <div class="container">
        <div class="section-header-center">
          <span class="eyebrow-pill">INTERACTIVE HOTSPOT SCHEMATIC</span>
          <h2 class="section-title">Acoustic Engineering Without Compromise</h2>
          <p class="section-subtitle">
            Select any subsystem below to inspect the internal planar magnetic array, titanium chassis, and quad-core DSP engine.
          </p>
        </div>

        <div class="exploded-grid">
          <div class="exploded-diagram-stage">
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="font-family:var(--font-mono);font-size:11px;color:#60A5FA;">CAD EXPLODED DRIVER VIEW • 1:1 SCALE</span>
              <span style="font-family:var(--font-mono);font-size:11px;color:#94A3B8;" id="active-hotspot-indicator">ACTIVE: HOTSPOT 01</span>
            </div>

            <div class="exploded-layers" id="exploded-layers">
              <div class="exploded-layer-node active" data-hotspot="1">
                <button type="button" class="hotspot-pin-btn">01</button>
                <div>
                  <strong style="display:block;font-size:14px;">Ear Cups: Custom 50mm Planar Drivers</strong>
                  <span style="font-family:var(--font-mono);font-size:11px;color:#94A3B8;">10Hz–48kHz • &lt;0.05% Harmonic Distortion</span>
                </div>
              </div>

              <div class="exploded-layer-node" data-hotspot="2">
                <button type="button" class="hotspot-pin-btn">02</button>
                <div>
                  <strong style="display:block;font-size:14px;">Chassis: Aircraft-Grade Titanium Alloy Headband</strong>
                  <span style="font-family:var(--font-mono);font-size:11px;color:#94A3B8;">Slow-Rebound Memory Foam + Breathable Protein Leather</span>
                </div>
              </div>

              <div class="exploded-layer-node" data-hotspot="3">
                <button type="button" class="hotspot-pin-btn">03</button>
                <div>
                  <strong style="display:block;font-size:14px;">Internal Chipset: Dual Quad-Core DSP Processing</strong>
                  <span style="font-family:var(--font-mono);font-size:11px;color:#94A3B8;">6 Beamforming Mics • 380,000 Calc/Sec Inverse ANC</span>
                </div>
              </div>
            </div>

            <div style="font-size:12px;color:#94A3B8;display:flex;justify-content:space-between;">
              <span>✓ Zero Phase Shift</span>
              <span>✓ Dual N52 Magnet Flux</span>
              <span>✓ 24-Bit/192kHz Native DAC</span>
            </div>
          </div>

          <div class="hotspot-cards-col" id="hotspot-cards">
            <article class="hotspot-detail-card active" data-hotspot="1">
              <span class="hotspot-tag">HOTSPOT 01 • EAR CUPS</span>
              <h3>Custom 50mm Planar Drivers</h3>
              <p>
                Ultra-thin diaphragm delivering 10Hz–48kHz frequency response with sub-0.05% harmonic distortion—preserving every breath and room reverb tail.
              </p>
            </article>

            <article class="hotspot-detail-card" data-hotspot="2">
              <span class="hotspot-tag">HOTSPOT 02 • CHASSIS</span>
              <h3>Aircraft-Grade Titanium Alloy Headband</h3>
              <p>
                Memory-foam ear cushions wrapped in breathable protein leather for all-day fatigue-free listening and glasses-friendly acoustic sealing.
              </p>
            </article>

            <article class="hotspot-detail-card" data-hotspot="3">
              <span class="hotspot-tag">HOTSPOT 03 • INTERNAL CHIPSET</span>
              <h3>Dual Quad-Core DSP Processing</h3>
              <p>
                6 beamforming microphones calculating inverse ambient noise 380,000 times per second without compressing dynamic range.
              </p>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- ===================================================================
         4. VISUAL COMPARISON MATRIX
         =================================================================== -->
    <section class="comparison-section" id="comparison-matrix">
      <div class="container">
        <div class="section-header-center">
          <span class="eyebrow-pill" style="background:rgba(37,99,235,0.1);color:var(--color-brand-accent);">OBJECTIVE BENCHMARK</span>
          <h2 class="section-title" style="color:var(--color-text-primary);">AeroCore Apex vs. The Industry</h2>
          <p class="section-subtitle" style="color:var(--color-text-secondary);">
            Studio-monitor planar resolution meets flagship wireless convenience.
          </p>
        </div>

        <div class="comparison-table-wrap">
          <table class="comparison-table">
            <thead>
              <tr>
                <th>Specification</th>
                <th>AeroCore Apex ($389)</th>
                <th>Standard Wireless ($399+)</th>
                <th>Studio Monitors ($999+)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Driver Architecture</strong></td>
                <td class="apex-col">✓ 50mm Planar Magnetic</td>
                <td>✕ 40mm Dynamic Plastic</td>
                <td>✓ Planar / Open-Back</td>
              </tr>
              <tr>
                <td><strong>Total Harmonic Distortion</strong></td>
                <td class="apex-col">✓ &lt; 0.05% THD @ 1kHz</td>
                <td>✕ 0.8% – 1.5% THD</td>
                <td>✓ &lt; 0.1% THD</td>
              </tr>
              <tr>
                <td><strong>Lossless Audio Support</strong></td>
                <td class="apex-col">✓ USB-C 24-Bit/192kHz + aptX</td>
                <td>✕ Compressed AAC / SBC</td>
                <td>✕ Requires Desktop Amp</td>
              </tr>
              <tr>
                <td><strong>Active Noise Cancellation</strong></td>
                <td class="apex-col">✓ 48dB Hybrid 6-Mic DSP</td>
                <td>✓ Standard Consumer ANC</td>
                <td>✕ None (Open Acoustic Bleed)</td>
              </tr>
              <tr>
                <td><strong>Frame Construction</strong></td>
                <td class="apex-col">✓ Grade-5 Titanium &amp; Leather</td>
                <td>✕ Molded Polycarbonate</td>
                <td>✓ Heavy Steel (520g+)</td>
              </tr>
              <tr>
                <td><strong>Battery Life</strong></td>
                <td class="apex-col">✓ 60 Hours + Fast USB-C</td>
                <td>✕ 24 – 30 Hours</td>
                <td>✕ Wired Only</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- ===================================================================
         5. LIFESTYLE PHOTO & VIDEO EDITORIAL GRID (UGC & Influencer Clips)
         =================================================================== -->
    <section class="editorial-section" id="editorial-ugc">
      <div class="container">
        <div class="section-header-center">
          <span class="eyebrow-pill" style="background:rgba(217,119,6,0.1);color:var(--color-brand-amber);">COMMUNITY &amp; CREATORS</span>
          <h2 class="section-title" style="color:var(--color-text-primary);">Tested in World-Class Studios &amp; Long-Haul Cabins</h2>
        </div>

        <div class="editorial-grid">
          <article class="editorial-card">
            <div class="editorial-media">
              <span>▶ 0:42 STUDIO CLIP</span>
              <small style="opacity:0.8;">Space Obsidian • USB-C DAC Mode</small>
            </div>
            <strong>@marcus_mastering • London Mastering Engineer</strong>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              “I checked a final vinyl master on a flight to Tokyo using the built-in 24-bit USB-C DAC. Translation is dead-on.”
            </p>
          </article>

          <article class="editorial-card">
            <div class="editorial-media" style="background:linear-gradient(135deg,#1E293B 0%,#475569 100%);">
              <span>📸 LIFESTYLE EDITORIAL</span>
              <small style="opacity:0.8;">Lunar Silver • Protein Leather</small>
            </div>
            <strong>@elena.synth • Film Composer</strong>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              “Zero clamping fatigue after 8-hour scoring sessions. The planar transient response makes synth arpeggios sparkle.”
            </p>
          </article>

          <article class="editorial-card">
            <div class="editorial-media" style="background:linear-gradient(135deg,#14532D 0%,#365314 100%);">
              <span>▶ 1:15 UNBOXING</span>
              <small style="opacity:0.8;">Nordic Sage • Traveler Bundle</small>
            </div>
            <strong>@minimal_hardware • Industrial Designer</strong>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              “The CNC-milled titanium yokes and silent magnetic travel case put $600 legacy headphones to shame.”
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- ===================================================================
         6. CUSTOMER REVIEW ENGINE WITH FILTERABLE ATTRIBUTES
         =================================================================== -->
    <section class="reviews-section" id="verified-reviews">
      <div class="container">
        <div class="reviews-toolbar">
          <div>
            <div style="font-family:var(--font-display);font-size:26px;font-weight:800;">
              <span style="color:var(--color-brand-amber);">★★★★★</span> 4.9 / 5.0
            </div>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              Based on 1,428 Verified WooCommerce Buyers • 98% Would Recommend
            </p>
          </div>

          <div class="review-filters" id="review-filters" role="tablist" aria-label="Filter Reviews by Attribute">
            <button type="button" class="filter-pill-btn active" data-filter="all">All Reviews (1,428)</button>
            <button type="button" class="filter-pill-btn" data-filter="sound">Sound Profile</button>
            <button type="button" class="filter-pill-btn" data-filter="comfort">Comfort &amp; Fit</button>
            <button type="button" class="filter-pill-btn" data-filter="battery">60h Battery</button>
          </div>
        </div>

        <div class="reviews-grid" id="reviews-grid">
          <article class="review-card" data-category="sound">
            <div style="color:var(--color-brand-amber);font-weight:700;font-size:13px;">★★★★★ &nbsp;<strong style="color:var(--color-text-primary);">David K.</strong></div>
            <span class="review-verified">✓ Verified Buyer • Space Obsidian (Traveler Bundle)</span>
            <h3 style="font-size:15px;">Replaced my desktop planar headphones and travel ANC cans</h3>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              “The separation in complex orchestral tracks is breathtaking. Plugging in the USB-C cable unlocks true lossless clarity.”
            </p>
            <div class="review-meta-tags">Attribute: Sound 5/5 • Stage 5/5 • 📸 Photo Uploaded</div>
          </article>

          <article class="review-card" data-category="comfort">
            <div style="color:var(--color-brand-amber);font-weight:700;font-size:13px;">★★★★★ &nbsp;<strong style="color:var(--color-text-primary);">Sophia R.</strong></div>
            <span class="review-verified">✓ Verified Buyer • Lunar Silver (Single Unit)</span>
            <h3 style="font-size:15px;">Cloud-like memory foam even with prescription glasses</h3>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              “Wore them for an 11-hour flight from NYC to Dubai. Zero ear heat and the 6-mic ANC completely erased cabin drone.”
            </p>
            <div class="review-meta-tags">Attribute: Comfort 5/5 • ANC 5/5 • 📸 Photo Uploaded</div>
          </article>

          <article class="review-card" data-category="battery">
            <div style="color:var(--color-brand-amber);font-weight:700;font-size:13px;">★★★★★ &nbsp;<strong style="color:var(--color-text-primary);">Liam T.</strong></div>
            <span class="review-verified">✓ Verified Buyer • Nordic Sage (Audiophile Duo)</span>
            <h3 style="font-size:15px;">Three weeks of daily studio work on a single charge</h3>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              “The 60-hour battery rating is conservative—I easily get two weeks of heavy commuting and mixing before touching a charger.”
            </p>
            <div class="review-meta-tags">Attribute: Battery 5/5 • Build 5/5</div>
          </article>
        </div>
      </div>
    </section>

    <!-- ===================================================================
         7. CROSS-SELL / FREQUENTLY BOUGHT TOGETHER
         =================================================================== -->
    <section class="cross-sell-section" id="cross-sell">
      <div class="container">
        <h2 class="section-title" style="color:var(--color-text-primary);font-size:28px;">
          Frequently Bought Together — Complete Your Rig
        </h2>
        <div class="cross-sell-grid">
          <article class="cross-sell-card">
            <strong>Custom Molded Hard Shell Travel Case</strong>
            <span style="color:var(--color-brand-accent);font-weight:700;">$35.00 <small style="color:var(--color-text-secondary);text-decoration:line-through;">$50.00</small></span>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              Crushproof ballistic nylon shell with magnetic DAC cable compartment.
            </p>
            <button type="button" class="btn-secondary-add upsell-quick-add" data-upsell-title="Custom Molded Hard Travel Case" data-upsell-price="35">
              + Add to Bag ($35.00)
            </button>
          </article>

          <article class="cross-sell-card">
            <strong>Silver-Core Braided 4.4mm Balanced Cable</strong>
            <span style="color:var(--color-brand-accent);font-weight:700;">$49.00</span>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              Audiophile 8-core OCC silver-plated copper cable for balanced desktop amplifiers.
            </p>
            <button type="button" class="btn-secondary-add upsell-quick-add" data-upsell-title="Silver-Core 4.4mm Balanced Cable" data-upsell-price="49">
              + Add to Bag ($49.00)
            </button>
          </article>

          <article class="cross-sell-card">
            <strong>Magnetic Lambskin Memory Foam Ear Pads</strong>
            <span style="color:var(--color-brand-accent);font-weight:700;">$39.00</span>
            <p style="font-size:13px;color:var(--color-text-secondary);">
              Instant tool-free magnetic snap replacement ear cushions.
            </p>
            <button type="button" class="btn-secondary-add upsell-quick-add" data-upsell-title="Magnetic Lambskin Ear Cushions" data-upsell-price="39">
              + Add to Bag ($39.00)
            </button>
          </article>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© 2026 AeroCore Acoustic Labs Inc. • High-Converting DTC WooCommerce PDP &amp; Custom Hook Architecture</p>
    </div>
  </footer>

  <!-- =====================================================================
       8. PERSISTENT MOBILE STICKY ADD-TO-CART FOOTER BAR
       ===================================================================== -->
  <div class="mobile-sticky-atc" id="mobile-sticky-atc" aria-hidden="true">
    <div class="sticky-product-info">
      <div class="sticky-thumb" id="sticky-thumb"></div>
      <div>
        <strong style="display:block;font-size:13px;">AeroCore Apex</strong>
        <span style="font-size:11px;color:var(--color-text-secondary);" id="sticky-variant-label">Space Obsidian</span>
      </div>
    </div>
    <button type="button" class="btn-sticky-atc" id="sticky-atc-btn">
      Add to Cart — <span id="sticky-atc-price">$389</span>
    </button>
  </div>

  <!-- =====================================================================
       BACKDROP OVERLAY
       ===================================================================== -->
  <div class="backdrop-overlay" id="backdrop-overlay"></div>

  <!-- =====================================================================
       SLIDE-OVER MINI-CART DRAWER (Frictionless UX)
       ===================================================================== -->
  <aside class="mini-cart-drawer" id="mini-cart-drawer" aria-label="Shopping Bag Drawer">
    <div class="drawer-header">
      <h2 style="font-family:var(--font-display);font-size:19px;">
        Your Bag (<span id="drawer-item-count">1</span> Item)
      </h2>
      <button type="button" class="drawer-close-btn" id="close-cart-btn">✕ Close</button>
    </div>

    <!-- Free Shipping Progress Bar ($400 Threshold) -->
    <div class="shipping-meter-box">
      <p class="shipping-meter-text" id="shipping-meter-text">
        🚚 Add <strong>$11.00</strong> more for Free Priority Insured Courier ($400 tier)
      </p>
      <div class="shipping-progress-track">
        <div class="shipping-progress-fill" id="shipping-progress-fill" style="width:97%;"></div>
      </div>
    </div>

    <div class="drawer-body">
      <div id="cart-items-container" style="display:flex;flex-direction:column;gap:12px;"></div>

      <!-- In-Cart 1-Click Upsell Tile -->
      <div class="cart-upsell-tile">
        <span style="font-size:10px;font-weight:800;color:var(--color-brand-accent);letter-spacing:0.05em;display:block;margin-bottom:6px;">
          ⚡ IN-CART 1-CLICK UPSELL (30% OFF)
        </span>
        <label style="display:flex;align-items:center;justify-content:space-between;gap:10px;cursor:pointer;">
          <span style="display:flex;align-items:center;gap:8px;font-size:13px;font-weight:600;">
            <input type="checkbox" id="upsell-case-checkbox" style="width:16px;height:16px;accent-color:var(--color-brand-accent);" />
            <span>Add Custom Molded Travel Hard Case (+$35.00)</span>
          </span>
          <span class="savings-pill">30% OFF</span>
        </label>
      </div>
    </div>

    <div class="drawer-footer">
      <div style="display:flex;justify-content:space-between;align-items:center;">
        <span style="font-weight:600;">Subtotal</span>
        <strong style="font-family:var(--font-display);font-size:20px;" id="drawer-subtotal">$389.00</strong>
      </div>
      <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--color-text-secondary);">
        <span>Shipping</span>
        <span style="color:var(--color-success);font-weight:600;">Free Worldwide Express Eligible</span>
      </div>
      <button type="button" class="btn-atc-primary" id="proceed-checkout-btn" style="width:100%;">
        Proceed to Secure Checkout →
      </button>
      <p style="font-size:11px;color:var(--color-text-secondary);text-align:center;">
        🔒 256-Bit SSL Encryption • Visa • Mastercard • Amex • PayPal •  Pay
      </p>
    </div>
  </aside>

  <!-- =====================================================================
       MOBILE OFF-CANVAS NAVIGATION DRAWER
       ===================================================================== -->
  <aside class="mobile-nav-drawer" id="mobile-nav-drawer" aria-label="Mobile Navigation">
    <div style="display:flex;justify-content:space-between;align-items:center;">
      <strong style="font-family:var(--font-display);font-size:16px;">AEROCORE MENU</strong>
      <button type="button" class="drawer-close-btn" id="close-mobile-nav">✕</button>
    </div>
    <hr class="divider" />
    <div>
      <span class="bundle-section-label">PRODUCTS</span>
      <ul style="list-style:none;display:flex;flex-direction:column;gap:10px;font-weight:600;">
        <li><a href="#pdp-top">AeroCore Apex — $389</a></li>
        <li><a href="#pdp-top">Traveler Bundle — $425 (Save 15%)</a></li>
        <li><a href="#pdp-top">Audiophile Studio Duo — $620</a></li>
      </ul>
    </div>
    <hr class="divider" />
    <div>
      <span class="bundle-section-label">ECOSYSTEM &amp; STORY</span>
      <ul style="list-style:none;display:flex;flex-direction:column;gap:10px;font-weight:500;">
        <li><a href="#exploded-engineering">50mm Planar Drivers</a></li>
        <li><a href="#comparison-matrix">Studio Comparison Matrix</a></li>
        <li><a href="#verified-reviews">1,428 Verified Reviews</a></li>
      </ul>
    </div>
  </aside>

  <!-- =====================================================================
       OPTIMIZED 1-PAGE WOOCOMMERCE CHECKOUT MODAL
       ===================================================================== -->
  <div class="checkout-modal" id="checkout-modal" role="dialog" aria-modal="true" aria-label="1-Page Express Checkout">
    <div class="checkout-dialog">
      <div style="display:flex;justify-content:space-between;align-items:center;">
        <div>
          <span class="eyebrow-pill" style="margin-bottom:4px;">STRIPE SANDBOX • 1-PAGE CHECKOUT</span>
          <h2 style="font-family:var(--font-display);font-size:22px;">AeroCore Express Checkout</h2>
        </div>
        <button type="button" class="drawer-close-btn" id="close-checkout-modal">✕ Back to Store</button>
      </div>

      <div class="checkout-grid">
        <form class="checkout-card" id="checkout-form">
          <span class="bundle-section-label">1-Click Express Wallets</span>
          <div class="express-checkout-row">
            <button type="button" class="btn-express btn-apple-pay"> Pay</button>
            <button type="button" class="btn-express btn-shop-pay">Shop Pay</button>
          </div>
          <hr class="divider" />
          <span class="bundle-section-label">Shipping Details (Company &amp; Address 2 Stripped via Hook)</span>
          <input type="email" class="form-input" placeholder="Email Address" value="audiophile@studio.io" required />
          <input type="text" class="form-input" placeholder="Full Name" value="Alex Mercer" required />
          <input type="text" class="form-input" placeholder="Shipping Street Address, City, Postal Code" value="742 Evergreen Terrace, NY 10001" required />

          <span class="bundle-section-label">Stripe Payment Method</span>
          <div style="padding:12px;border:1px solid var(--border-strong);border-radius:8px;background:var(--color-bg-body);font-family:var(--font-mono);font-size:12px;">
            💳 4242 •••• •••• 4242 &nbsp;|&nbsp; EXP 08/29 &nbsp;|&nbsp; CVC 888
          </div>

          <button type="submit" class="btn-atc-primary" style="background:var(--color-success);">
            🔒 Complete Order — <span id="checkout-submit-total">$389.00</span>
          </button>
        </form>

        <div class="checkout-card">
          <h3 style="font-family:var(--font-display);font-size:17px;">Sticky Order Summary</h3>
          <div id="checkout-summary-items" style="font-size:13px;display:flex;flex-direction:column;gap:8px;"></div>
          <hr class="divider" />
          <div style="display:flex;gap:8px;">
            <input type="text" class="form-input" id="coupon-code-input" placeholder="Promo code (Try APEXVIP)" />
            <button type="button" class="drawer-close-btn" id="apply-coupon-btn" style="background:var(--color-text-primary);color:#fff;">Apply</button>
          </div>
          <p id="coupon-feedback" style="font-size:12px;color:var(--color-success);display:none;"></p>
          <hr class="divider" />
          <div style="display:flex;justify-content:space-between;font-size:13px;">
            <span>Express Carbon-Neutral Shipping</span>
            <strong style="color:var(--color-success);">FREE</strong>
          </div>
          <div style="display:flex;justify-content:space-between;font-size:18px;font-weight:800;">
            <span>Total Due</span>
            <span id="checkout-final-total">$389.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
get_footer();
