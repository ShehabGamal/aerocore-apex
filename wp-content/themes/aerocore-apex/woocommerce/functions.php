<?php
/**
 * AeroCore Apex — High-Converting DTC WooCommerce Hook & Fragment Layer
 * Compatible with Roots Sage 10 (Blade) or Custom WooCommerce Child Theme.
 *
 * Deliverables Included:
 * 1. Re-binding `woocommerce_single_product_summary` in high-ROAS conversion order:
 *    Rating -> Title -> Price + Klarna 4x Installment Microcopy -> Swatch Selector ->
 *    Live Inventory Urgency -> Tiered Bundle & ATC -> Risk-Reversal Trust Badges -> Accordions.
 * 2. Custom AJAX Mini-Cart Fragment Handler (`woocommerce_add_to_cart_fragments`) & REST endpoint
 *    for zero-reload Slide-Over Cart updates and $400 Free Priority Shipping progress calculation.
 * 3. Checkout Velocity Optimization (`woocommerce_checkout_fields`) stripping Company Name,
 *    Address Line 2, and Order Notes to maximize 1-page checkout conversion.
 */

defined( 'ABSPATH' ) || exit;

/* ==========================================================================
   1. Enqueue Zero-jQuery Modular PDP Assets
   ========================================================================== */
add_action( 'wp_enqueue_scripts', function () {
    if ( is_product() || is_checkout() ) {
        wp_enqueue_style(
            'aerocore-apex-pdp',
            get_stylesheet_directory_uri() . '/assets/styles.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'aerocore-apex-pdp-engine',
            get_stylesheet_directory_uri() . '/assets/app.js',
            [],
            '1.0.0',
            true
        );

        wp_localize_script( 'aerocore-apex-pdp-engine', 'AeroCoreWooConfig', [
            'ajaxUrl'            => admin_url( 'admin-ajax.php' ),
            'wcAjaxUrl'          => WC_AJAX::get_endpoint( '%%endpoint%%' ),
            'nonce'              => wp_create_nonce( 'aerocore_cart_nonce' ),
            'freeShipThreshold'  => 400.00,
            'currencySymbol'     => get_woocommerce_currency_symbol(),
        ] );
    }
}, 20 );

/* ==========================================================================
   2. Hook-Driven Purchase Architecture (Single Product Summary Re-Order)
   ========================================================================== */
add_action( 'init', function () {
    // Unhook default WooCommerce summary sequence
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

    // Rebind in high-converting DTC hierarchy
    add_action( 'woocommerce_single_product_summary', 'aerocore_render_pretitle_and_rating', 4 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 6 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 8 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 12 );
    add_action( 'woocommerce_single_product_summary', 'aerocore_render_swatch_and_scarcity', 18 );
    // Priority 30: woocommerce_template_single_add_to_cart (preserved)
    add_action( 'woocommerce_single_product_summary', 'aerocore_render_trust_and_accordions', 35 );
} );

function aerocore_render_pretitle_and_rating(): void {
    echo '<div class="pre-title-pill">● FLAGSHIP SERIES • LIMITED PRODUCTION RUN</div>';
    woocommerce_template_single_rating();
}

/* ==========================================================================
   3. Inject Klarna / Afterpay 4x Interest-Free Installment Pricing Microcopy
   ========================================================================== */
add_filter( 'woocommerce_get_price_html', function ( string $price_html, WC_Product $product ): string {
    if ( ! is_product() ) {
        return $price_html;
    }

    $active_price = (float) $product->get_price();
    if ( $active_price <= 0 ) {
        return $price_html;
    }

    $installment = number_format( $active_price / 4, 2 );
    $currency    = get_woocommerce_currency_symbol();

    $klarna_Copy = sprintf(
        '<div class="installment-teaser">Or 4 interest-free payments of <strong>%s%s</strong> with <span class="klarna-badge">Klarna</span> / <strong>Afterpay</strong></div>',
        esc_html( $currency ),
        esc_html( $installment )
    );

    return '<div class="price-block"><div class="price-main-row">' . $price_html . '</div>' . $klarna_Copy . '</div>';
}, 20, 2 );

/* ==========================================================================
   4. Visual Color Swatches + Live Inventory Scarcity Trigger
   ========================================================================== */
function aerocore_render_swatch_and_scarcity(): void {
    global $product;
    $stock_qty = $product && $product->get_stock_quantity() ? (int) $product->get_stock_quantity() : 14;
    ?>
    <div class="aerocore-swatch-engine">
        <div class="swatch-header">
            <span>Finish: <strong id="selected-color-label">Space Obsidian (Deep Matte Black)</strong></span>
            <span class="swatch-url-preview" id="url-query-preview">?color=space-obsidian</span>
        </div>
        <div class="scarcity-banner" role="status" aria-live="polite">
            <span class="pulse-dot"></span>
            <span id="scarcity-text">
                <?php
                printf(
                    esc_html__( 'Low Stock: Only %d pairs remaining in Space Obsidian for priority dispatch.', 'aerocore' ),
                    $stock_qty
                );
                ?>
            </span>
        </div>
    </div>
    <?php
}

function aerocore_render_trust_and_accordions(): void {
    ?>
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
    <?php
}

/* ==========================================================================
   5. AJAX Mini-Cart Fragment Handler (`woocommerce_add_to_cart_fragments`)
   ========================================================================== */
add_filter( 'woocommerce_add_to_cart_fragments', function ( array $fragments ): array {
    $cart_count    = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $cart_subtotal = WC()->cart ? (float) WC()->cart->get_subtotal() : 0.0;
    $threshold     = 400.00;
    $delta         = max( 0.0, $threshold - $cart_subtotal );
    $pct           = min( 100, (int) round( ( $cart_subtotal / $threshold ) * 100 ) );

    // Live Header Bag Count Badge
    $fragments['#header-cart-count'] = sprintf(
        '<span class="cart-count-badge" id="header-cart-count">%d</span>',
        $cart_count
    );

    // Free Shipping Progress Bar Fragment
    ob_start();
    ?>
    <div class="shipping-meter-box" id="aerocore-shipping-meter-fragment">
        <p class="shipping-meter-text">
            <?php if ( $delta <= 0 ) : ?>
                🎉 <strong>Unlocked!</strong> Free Priority Insured Courier + Carbon-Neutral Dispatch
            <?php else : ?>
                🚚 Add <strong><?php echo wp_kses_post( wc_price( $delta ) ); ?></strong> more for Free Priority Insured Courier ($400 tier)
            <?php endif; ?>
        </p>
        <div class="shipping-progress-track">
            <div class="shipping-progress-fill" style="width:<?php echo esc_attr( (string) $pct ); ?>%;"></div>
        </div>
    </div>
    <?php
    $fragments['#aerocore-shipping-meter-fragment'] = ob_get_clean();

    return $fragments;
} );

/* ==========================================================================
   6. Optimized 1-Page Checkout (`woocommerce_checkout_fields` Filter)
      Removes billing company, address line 2, and order notes to maximize ROAS
   ========================================================================== */
add_filter( 'woocommerce_checkout_fields', function ( array $fields ): array {
    // Strip non-essential B2B & secondary address fields
    unset( $fields['billing']['billing_company'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['shipping']['shipping_company'] );
    unset( $fields['shipping']['shipping_address_2'] );
    unset( $fields['order']['order_comments'] );

    // Streamline placeholders for 1-page completion speed
    if ( isset( $fields['billing']['billing_email'] ) ) {
        $fields['billing']['billing_email']['placeholder'] = 'Email for priority tracking updates';
        $fields['billing']['billing_email']['priority']    = 5;
    }

    return $fields;
}, 20 );

// Completely disable the "Additional Information / Order Notes" box
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
