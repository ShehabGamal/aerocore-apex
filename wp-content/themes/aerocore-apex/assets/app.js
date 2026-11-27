/**
 * AeroCore Apex — High-Converting DTC Product Detail Page (PDP) Engine
 * Vanilla ES6+ Modular Architecture (Zero jQuery Dependencies)
 */

(() => {
  'use strict';

  /* ========================================================================
     1. Application State (Variant, Bundle, Cart Fragments & Currency)
     ======================================================================== */
  const STATE = {
    colorSlug: 'space-obsidian',
    colorName: 'Space Obsidian',
    colorDesc: 'Deep Matte Black',
    colorHex: '#111827',
    stock: 14,
    angleIndex: 0,
    angleNames: ['FRONT 3/4 STUDIO', '50MM PLANAR CUP', 'MOLDED HARD CASE', 'USB-C DAC PORT'],
    bundleId: 'single',
    bundleTitle: '1x AeroCore Apex (Standard)',
    unitPrice: 389,
    origPrice: 449,
    qty: 1,
    currencyRate: 1,
    currencySymbol: '$',
    couponDiscount: 0,
    upsellHardCaseAdded: false,
    cart: [
      {
        id: 'apex-single-space-obsidian',
        title: '1x AeroCore Apex (Standard)',
        variant: 'Space Obsidian',
        hex: '#111827',
        price: 389,
        qty: 1,
      },
    ],
  };

  /* ========================================================================
     2. DOM Element References
     ======================================================================== */
  const dom = {
    swatchBtns: document.querySelectorAll('#swatch-grid .swatch-btn'),
    selectedColorLabel: document.getElementById('selected-color-label'),
    urlQueryPreview: document.getElementById('url-query-preview'),
    scarcityText: document.getElementById('scarcity-text'),
    viewportSwatchDot: document.getElementById('viewport-swatch-dot'),
    viewportCaption: document.getElementById('viewport-caption'),
    thumbBtns: document.querySelectorAll('#thumb-rail .thumb-btn'),
    thumbDots: document.querySelectorAll('#thumb-rail .thumb-dot'),
    svgHeadband: document.getElementById('svg-headband'),
    svgCupLeft: document.getElementById('svg-cup-left'),
    svgCupRight: document.getElementById('svg-cup-right'),
    svgAngleLabel: document.getElementById('svg-angle-label'),
    viewCounterPill: document.getElementById('view-counter-pill'),
    headphoneStage: document.getElementById('headphone-stage'),
    headphoneSvg: document.getElementById('headphone-svg'),
    spinToggleBtn: document.getElementById('spin-toggle-btn'),
    spinSliderWrap: document.getElementById('spin-slider-wrap'),
    spinRange: document.getElementById('spin-range'),
    spinDegLabel: document.getElementById('spin-deg-label'),
    bundleCards: document.querySelectorAll('#bundle-selector .bundle-card'),
    displayCurrentPrice: document.getElementById('display-current-price'),
    displayOriginalPrice: document.getElementById('display-original-price'),
    displaySavingsPill: document.getElementById('display-savings-pill'),
    klarnaInstallment: document.getElementById('klarna-installment'),
    qtyMinus: document.getElementById('qty-minus'),
    qtyPlus: document.getElementById('qty-plus'),
    qtyInput: document.getElementById('qty-input'),
    mainAtcBtn: document.getElementById('main-atc-btn'),
    atcBtnPrice: document.getElementById('atc-btn-price'),
    primaryAtcAnchor: document.getElementById('primary-atc-anchor'),
    mobileStickyAtc: document.getElementById('mobile-sticky-atc'),
    stickyThumb: document.getElementById('sticky-thumb'),
    stickyVariantLabel: document.getElementById('sticky-variant-label'),
    stickyAtcPrice: document.getElementById('sticky-atc-price'),
    stickyAtcBtn: document.getElementById('sticky-atc-btn'),
    openCartBtn: document.getElementById('open-cart-btn'),
    closeCartBtn: document.getElementById('close-cart-btn'),
    miniCartDrawer: document.getElementById('mini-cart-drawer'),
    backdropOverlay: document.getElementById('backdrop-overlay'),
    headerCartCount: document.getElementById('header-cart-count'),
    drawerItemCount: document.getElementById('drawer-item-count'),
    shippingMeterText: document.getElementById('shipping-meter-text'),
    shippingProgressFill: document.getElementById('shipping-progress-fill'),
    cartItemsContainer: document.getElementById('cart-items-container'),
    upsellCaseCheckbox: document.getElementById('upsell-case-checkbox'),
    drawerSubtotal: document.getElementById('drawer-subtotal'),
    currencySelector: document.getElementById('currency-selector'),
    openMobileNav: document.getElementById('open-mobile-nav'),
    closeMobileNav: document.getElementById('close-mobile-nav'),
    mobileNavDrawer: document.getElementById('mobile-nav-drawer'),
    proceedCheckoutBtn: document.getElementById('proceed-checkout-btn'),
    applePayBtn: document.getElementById('apple-pay-btn'),
    shopPayBtn: document.getElementById('shop-pay-btn'),
    checkoutModal: document.getElementById('checkout-modal'),
    closeCheckoutModal: document.getElementById('close-checkout-modal'),
    checkoutSummaryItems: document.getElementById('checkout-summary-items'),
    checkoutSubmitTotal: document.getElementById('checkout-submit-total'),
    checkoutFinalTotal: document.getElementById('checkout-final-total'),
    couponCodeInput: document.getElementById('coupon-code-input'),
    applyCouponBtn: document.getElementById('apply-coupon-btn'),
    couponFeedback: document.getElementById('coupon-feedback'),
    checkoutForm: document.getElementById('checkout-form'),
  };

  function formatMoney(usdAmount, decimals = 2) {
    const converted = usdAmount * STATE.currencyRate;
    return `${STATE.currencySymbol}${converted.toFixed(decimals)}`;
  }

  /* ========================================================================
     3. Dynamic Color Swatch Switching & Gallery Artwork Sync
     ======================================================================== */
  function updateGalleryVisuals() {
    // Update SVG Headphone colorway
    dom.svgHeadband.setAttribute('stroke', STATE.colorHex);
    dom.svgCupLeft.setAttribute('fill', STATE.colorHex);
    dom.svgCupRight.setAttribute('fill', STATE.colorHex);
    dom.viewportSwatchDot.style.background = STATE.colorHex;
    dom.stickyThumb.style.background = STATE.colorHex;

    dom.thumbDots.forEach((dot) => {
      dot.style.background = STATE.colorHex;
    });

    const angleLabel = STATE.angleNames[STATE.angleIndex] || 'FRONT 3/4 STUDIO';
    dom.svgAngleLabel.textContent = angleLabel;
    dom.viewportCaption.textContent = `4K STUDIO RENDER • ${STATE.colorName.toUpperCase()}`;
    dom.viewCounterPill.textContent = `Angle ${STATE.angleIndex + 1} / 4`;

    // Subtle perspective transform per angle
    const angleTransforms = [
      'rotate(0deg) scale(1)',
      'rotate(-8deg) scale(1.06)',
      'rotate(12deg) scale(0.94)',
      'rotate(4deg) scale(1.04)',
    ];
    dom.headphoneSvg.style.transform = angleTransforms[STATE.angleIndex] || 'none';
  }

  function selectColorSwatch(btn) {
    dom.swatchBtns.forEach((b) => b.classList.remove('active'));
    btn.classList.add('active');

    STATE.colorSlug = btn.dataset.colorSlug;
    STATE.colorName = btn.dataset.colorName;
    STATE.colorDesc = btn.dataset.colorDesc;
    STATE.colorHex = btn.dataset.hex;
    STATE.stock = Number(btn.dataset.stock || 14);

    dom.selectedColorLabel.textContent = `${STATE.colorName} (${STATE.colorDesc})`;
    dom.urlQueryPreview.textContent = `?color=${STATE.colorSlug}`;
    dom.scarcityText.textContent = `Low Stock: Only ${STATE.stock} pairs remaining in ${STATE.colorName} for priority dispatch.`;
    dom.stickyVariantLabel.textContent = STATE.colorName;

    // Update browser URL query string without reloading
    try {
      const url = new URL(window.location.href);
      url.searchParams.set('color', STATE.colorSlug);
      window.history.replaceState({}, '', url);
    } catch (_) {}

    updateGalleryVisuals();
  }

  dom.swatchBtns.forEach((btn) => {
    btn.addEventListener('click', () => selectColorSwatch(btn));
  });

  // Thumbnail Angle Switcher
  dom.thumbBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      dom.thumbBtns.forEach((b) => {
        b.classList.remove('active');
        b.setAttribute('aria-selected', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');
      STATE.angleIndex = Number(btn.dataset.angle || 0);
      updateGalleryVisuals();
    });
  });

  // 4K Studio Zoom Toggle
  dom.headphoneStage.addEventListener('click', () => {
    dom.headphoneStage.classList.toggle('zoomed');
  });

  // 360° Interactive Spin Slider
  dom.spinToggleBtn.addEventListener('click', () => {
    dom.spinToggleBtn.classList.toggle('active');
    dom.spinSliderWrap.classList.toggle('visible');
  });

  dom.spinRange.addEventListener('input', (e) => {
    const deg = Number(e.target.value);
    dom.spinDegLabel.textContent = `${deg}°`;
    const scaleX = Math.cos((deg * Math.PI) / 360);
    dom.headphoneSvg.style.transform = `rotate(${deg * 0.08}deg) scaleX(${Math.max(0.55, Math.abs(scaleX)).toFixed(2)})`;
  });

  /* ========================================================================
     4. Tiered Bundle Selector & Quantity Pricing Engine
     ======================================================================== */
  function updatePricingUI() {
    const lineTotal = STATE.unitPrice * STATE.qty;
    const origTotal = STATE.origPrice * STATE.qty;
    const savings = Math.max(0, origTotal - lineTotal);
    const pct = Math.round((savings / origTotal) * 100);

    dom.displayCurrentPrice.textContent = formatMoney(STATE.unitPrice, 2);
    dom.displayOriginalPrice.textContent = formatMoney(STATE.origPrice, 2);
    dom.displaySavingsPill.textContent = `SAVE ${formatMoney(STATE.origPrice - STATE.unitPrice, 0)} (${pct}% OFF)`;
    dom.klarnaInstallment.textContent = formatMoney(STATE.unitPrice / 4, 2);

    dom.atcBtnPrice.textContent = formatMoney(lineTotal, 2);
    dom.stickyAtcPrice.textContent = formatMoney(STATE.unitPrice, 0);

    // Update bundle cards display prices for active currency
    document.querySelectorAll('[data-base-price]').forEach((el) => {
      el.textContent = formatMoney(Number(el.dataset.basePrice), 0);
    });
    document.querySelectorAll('[data-base-orig]').forEach((el) => {
      el.textContent = formatMoney(Number(el.dataset.baseOrig), 0);
    });
  }

  dom.bundleCards.forEach((card) => {
    card.addEventListener('click', () => {
      dom.bundleCards.forEach((c) => c.classList.remove('active'));
      card.classList.add('active');
      const radio = card.querySelector('input[type="radio"]');
      if (radio) radio.checked = true;

      STATE.bundleId = card.dataset.bundleId;
      STATE.bundleTitle = card.dataset.title;
      STATE.unitPrice = Number(card.dataset.price);
      STATE.origPrice = Number(card.dataset.orig);
      updatePricingUI();
    });
  });

  dom.qtyMinus.addEventListener('click', () => {
    if (STATE.qty > 1) {
      STATE.qty -= 1;
      dom.qtyInput.value = String(STATE.qty);
      updatePricingUI();
    }
  });

  dom.qtyPlus.addEventListener('click', () => {
    if (STATE.qty < 10) {
      STATE.qty += 1;
      dom.qtyInput.value = String(STATE.qty);
      updatePricingUI();
    }
  });

  /* ========================================================================
     5. Simulated WooCommerce AJAX Mini-Cart & Fragment Engine
     ======================================================================== */
  function openCartDrawer() {
    dom.miniCartDrawer.classList.add('open');
    dom.backdropOverlay.classList.add('open');
  }

  function closeAllDrawers() {
    dom.miniCartDrawer.classList.remove('open');
    dom.mobileNavDrawer.classList.remove('open');
    dom.backdropOverlay.classList.remove('open');
  }

  function renderMiniCart() {
    const totalCount = STATE.cart.reduce((acc, item) => acc + item.qty, 0);
    const rawSubtotal = STATE.cart.reduce((acc, item) => acc + item.price * item.qty, 0);

    dom.headerCartCount.textContent = String(totalCount);
    dom.drawerItemCount.textContent = String(totalCount);
    dom.drawerSubtotal.textContent = formatMoney(rawSubtotal, 2);

    // Free Priority Courier threshold ($400.00)
    const threshold = 400;
    const delta = Math.max(0, threshold - rawSubtotal);
    const pct = Math.min(100, Math.round((rawSubtotal / threshold) * 100));
    dom.shippingProgressFill.style.width = `${pct}%`;

    if (delta === 0) {
      dom.shippingMeterText.innerHTML = '🎉 <strong>Unlocked!</strong> Free Priority Insured Courier + Carbon-Neutral Dispatch';
      dom.shippingProgressFill.style.background = 'var(--color-success)';
    } else {
      dom.shippingMeterText.innerHTML = `🚚 Add <strong>${formatMoney(delta, 2)}</strong> more for Free Priority Insured Courier ($400 tier)`;
      dom.shippingProgressFill.style.background = 'var(--color-brand-accent)';
    }

    // Render Cart Items
    dom.cartItemsContainer.innerHTML = '';
    if (STATE.cart.length === 0) {
      dom.cartItemsContainer.innerHTML = `
        <div style="text-align:center;padding:32px 12px;color:var(--color-text-secondary);">
          Your bag is currently empty. Select a finish above to audition AeroCore Apex.
        </div>
      `;
      return;
    }

    STATE.cart.forEach((item, idx) => {
      const row = document.createElement('div');
      row.className = 'cart-line-item';
      row.innerHTML = `
        <div class="cart-item-thumb" style="background:${item.hex || '#111827'};"></div>
        <div class="cart-item-info">
          <strong style="font-size:13.5px;display:block;">${item.title}</strong>
          <span style="font-size:12px;color:var(--color-text-secondary);">Finish: ${item.variant}</span>
          <div class="cart-item-bottom">
            <div style="display:inline-flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--border-divider);border-radius:6px;padding:2px 8px;">
              <button type="button" data-cart-dec="${idx}" style="border:none;background:none;font-weight:700;">−</button>
              <span style="font-size:12px;font-weight:700;">${item.qty}</span>
              <button type="button" data-cart-inc="${idx}" style="border:none;background:none;font-weight:700;">+</button>
            </div>
            <strong style="font-size:13.5px;">${formatMoney(item.price * item.qty, 2)}</strong>
            <button type="button" data-cart-remove="${idx}" style="border:none;background:none;font-size:11px;color:var(--color-urgency);text-decoration:underline;">Remove</button>
          </div>
        </div>
      `;
      dom.cartItemsContainer.appendChild(row);
    });

    // Bind dynamic line item controls
    dom.cartItemsContainer.querySelectorAll('[data-cart-inc]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const i = Number(btn.dataset.cartInc);
        STATE.cart[i].qty += 1;
        renderMiniCart();
      });
    });

    dom.cartItemsContainer.querySelectorAll('[data-cart-dec]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const i = Number(btn.dataset.cartDec);
        if (STATE.cart[i].qty > 1) {
          STATE.cart[i].qty -= 1;
        } else {
          STATE.cart.splice(i, 1);
        }
        renderMiniCart();
      });
    });

    dom.cartItemsContainer.querySelectorAll('[data-cart-remove]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const i = Number(btn.dataset.cartRemove);
        if (STATE.cart[i] && STATE.cart[i].id === 'upsell-hard-case') {
          dom.upsellCaseCheckbox.checked = false;
        }
        STATE.cart.splice(i, 1);
        renderMiniCart();
      });
    });
  }

  function addCurrentSelectionToCart() {
    const itemId = `apex-${STATE.bundleId}-${STATE.colorSlug}`;
    const existing = STATE.cart.find((item) => item.id === itemId);
    if (existing) {
      existing.qty += STATE.qty;
    } else {
      STATE.cart.push({
        id: itemId,
        title: STATE.bundleTitle,
        variant: STATE.colorName,
        hex: STATE.colorHex,
        price: STATE.unitPrice,
        qty: STATE.qty,
      });
    }
    renderMiniCart();
    openCartDrawer();
  }

  dom.mainAtcBtn.addEventListener('click', addCurrentSelectionToCart);
  dom.stickyAtcBtn.addEventListener('click', addCurrentSelectionToCart);
  dom.openCartBtn.addEventListener('click', openCartDrawer);
  dom.closeCartBtn.addEventListener('click', closeAllDrawers);
  dom.backdropOverlay.addEventListener('click', closeAllDrawers);

  // In-Cart 1-Click Travel Hard Case Upsell Checkbox
  dom.upsellCaseCheckbox.addEventListener('change', (e) => {
    const checked = e.target.checked;
    const existingIndex = STATE.cart.findIndex((i) => i.id === 'upsell-hard-case');
    if (checked && existingIndex === -1) {
      STATE.cart.push({
        id: 'upsell-hard-case',
        title: 'Custom Molded Travel Hard Case (30% Off)',
        variant: 'Ballistic Nylon',
        hex: '#1E293B',
        price: 35,
        qty: 1,
      });
    } else if (!checked && existingIndex > -1) {
      STATE.cart.splice(existingIndex, 1);
    }
    renderMiniCart();
  });

  // Frequently Bought Together Quick-Add Buttons
  document.querySelectorAll('.upsell-quick-add').forEach((btn) => {
    btn.addEventListener('click', () => {
      const title = btn.dataset.upsellTitle;
      const price = Number(btn.dataset.upsellPrice || 35);
      const id = 'cross-' + title.toLowerCase().replace(/[^a-z0-9]+/g, '-');
      const existing = STATE.cart.find((i) => i.id === id);
      if (existing) {
        existing.qty += 1;
      } else {
        STATE.cart.push({
          id,
          title,
          variant: 'Studio Accessory',
          hex: '#2563EB',
          price,
          qty: 1,
        });
      }
      renderMiniCart();
      openCartDrawer();
    });
  });

  /* ========================================================================
     6. Collapsible Specs Accordions, Exploded Hotspots & Review Filters
     ======================================================================== */
  document.querySelectorAll('#specs-accordions .accordion-trigger').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const parent = trigger.closest('.accordion-item');
      parent.classList.toggle('open');
    });
  });

  // Interactive Exploded Engineering Diagram Hotspots
  const layerNodes = document.querySelectorAll('#exploded-layers .exploded-layer-node');
  const hotspotCards = document.querySelectorAll('#hotspot-cards .hotspot-detail-card');
  const hotspotIndicator = document.getElementById('active-hotspot-indicator');

  function activateHotspot(num) {
    layerNodes.forEach((n) => n.classList.toggle('active', n.dataset.hotspot === String(num)));
    hotspotCards.forEach((c) => c.classList.toggle('active', c.dataset.hotspot === String(num)));
    if (hotspotIndicator) {
      hotspotIndicator.textContent = `ACTIVE: HOTSPOT 0${num}`;
    }
  }

  layerNodes.forEach((node) => {
    node.addEventListener('click', () => activateHotspot(node.dataset.hotspot));
  });
  hotspotCards.forEach((card) => {
    card.addEventListener('click', () => activateHotspot(card.dataset.hotspot));
  });

  // Filterable Customer Review Engine
  const filterBtns = document.querySelectorAll('#review-filters .filter-pill-btn');
  const reviewCards = document.querySelectorAll('#reviews-grid .review-card');

  filterBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      filterBtns.forEach((b) => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      reviewCards.forEach((card) => {
        const show = filter === 'all' || card.dataset.category === filter;
        card.style.display = show ? 'flex' : 'none';
      });
    });
  });

  /* ========================================================================
     7. Mobile Off-Canvas Drawer, Currency Selector & Sticky Bottom ATC Bar
     ======================================================================== */
  dom.openMobileNav.addEventListener('click', () => {
    dom.mobileNavDrawer.classList.add('open');
    dom.backdropOverlay.classList.add('open');
  });
  dom.closeMobileNav.addEventListener('click', closeAllDrawers);

  dom.currencySelector.addEventListener('change', (e) => {
    const opt = e.target.selectedOptions[0];
    STATE.currencyRate = Number(opt.dataset.rate || 1);
    STATE.currencySymbol = opt.dataset.symbol || '$';
    updatePricingUI();
    renderMiniCart();
  });

  // IntersectionObserver for Persistent Mobile Sticky ATC Bar
  if ('IntersectionObserver' in window && dom.primaryAtcAnchor) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const scrolledPast = !entry.isIntersecting && entry.boundingClientRect.top < 0;
          dom.mobileStickyAtc.classList.toggle('visible', scrolledPast);
          dom.mobileStickyAtc.setAttribute('aria-hidden', String(!scrolledPast));
        });
      },
      { threshold: 0 }
    );
    observer.observe(dom.primaryAtcAnchor);
  }

  /* ========================================================================
     8. Optimized 1-Page Express Checkout Modal & Coupon Engine
     ======================================================================== */
  function openCheckoutModal() {
    closeAllDrawers();
    const rawSubtotal = STATE.cart.reduce((acc, item) => acc + item.price * item.qty, 0);
    const finalTotal = Math.max(0, rawSubtotal * (1 - STATE.couponDiscount));

    dom.checkoutSummaryItems.innerHTML = STATE.cart
      .map(
        (i) =>
          `<div style="display:flex;justify-content:space-between;">
            <span>${i.qty}x ${i.title} (${i.variant})</span>
            <strong>${formatMoney(i.price * i.qty, 2)}</strong>
          </div>`
      )
      .join('');

    dom.checkoutSubmitTotal.textContent = formatMoney(finalTotal, 2);
    dom.checkoutFinalTotal.textContent = formatMoney(finalTotal, 2);
    dom.checkoutModal.classList.add('open');
  }

  dom.proceedCheckoutBtn.addEventListener('click', openCheckoutModal);
  dom.applePayBtn.addEventListener('click', openCheckoutModal);
  dom.shopPayBtn.addEventListener('click', openCheckoutModal);
  dom.closeCheckoutModal.addEventListener('click', () => {
    dom.checkoutModal.classList.remove('open');
  });

  dom.applyCouponBtn.addEventListener('click', () => {
    const code = (dom.couponCodeInput.value || '').trim().toUpperCase();
    if (code === 'APEXVIP' || code === 'STUDIO10') {
      STATE.couponDiscount = 0.1;
      dom.couponFeedback.style.display = 'block';
      dom.couponFeedback.textContent = `✓ Studio code ${code} applied (10% Off)!`;
    } else {
      STATE.couponDiscount = 0;
      dom.couponFeedback.style.display = 'block';
      dom.couponFeedback.textContent = 'Try promo code APEXVIP for 10% off your studio order.';
    }
    openCheckoutModal();
  });

  dom.checkoutForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('✅ AeroCore Apex Order Confirmed via Stripe Sandbox! Priority Dispatch Initiated.');
    dom.checkoutModal.classList.remove('open');
  });

  // Initialize from URL query parameter (?color=...) if present
  try {
    const params = new URLSearchParams(window.location.search);
    const initialColor = params.get('color');
    if (initialColor) {
      const matchingBtn = document.querySelector(`[data-color-slug="${initialColor}"]`);
      if (matchingBtn) selectColorSwatch(matchingBtn);
    }
  } catch (_) {}

  updatePricingUI();
  renderMiniCart();
})();
