<?php
/**
 * AeroCore Apex — Custom WooCommerce Single Product Template Override
 * Place in: `your-theme/woocommerce/single-product.php`
 *
 * Implements the 2-Zone High-Converting DTC Architecture:
 * - Zone 1: Above-the-Fold 55/45 Conversion Engine (`woocommerce_before_single_product_summary`
 *           4K Gallery + `woocommerce_single_product_summary` Sticky Purchase Column)
 * - Zone 2: Below-the-Fold Objection Obliteration Zone (Press Marquee, Exploded Driver Hotspots,
 *           Comparison Matrix, UGC Editorial Grid, Filterable Verified Reviews, Cross-Sells)
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<main id="pdp-top" class="aerocore-pdp-wrapper">
    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>

        <section class="pdp-above-fold">
            <div class="container">
                <?php woocommerce_breadcrumb(); ?>

                <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'pdp-split-matrix', get_the_ID() ); ?>>
                    <!-- LEFT (55%): Interactive Media Gallery (Swiper/4K Zoom + 360 Spin) -->
                    <div class="pdp-gallery-column">
                        <?php
                        /**
                         * Hook: woocommerce_before_single_product_summary.
                         * @hooked woocommerce_show_product_images - 20
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                        ?>
                    </div>

                    <!-- RIGHT (45%): Sticky Purchase Decision Engine -->
                    <div class="purchase-engine-card summary entry-summary">
                        <?php
                        /**
                         * Hook: woocommerce_single_product_summary.
                         * Rebound in `functions.php` to:
                         * 4  - aerocore_render_pretitle_and_rating
                         * 6  - woocommerce_template_single_title
                         * 8  - woocommerce_template_single_excerpt
                         * 12 - woocommerce_template_single_price (with Klarna 4x filter)
                         * 18 - aerocore_render_swatch_and_scarcity
                         * 30 - woocommerce_template_single_add_to_cart
                         * 35 - aerocore_render_trust_and_accordions
                         */
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Below-the-Fold Objection Obliteration Sections -->
        <?php do_action( 'aerocore_after_above_fold_pdp' ); ?>

    <?php endwhile; ?>
</main>

<?php
get_footer( 'shop' );
