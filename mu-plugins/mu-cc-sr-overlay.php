<?php

/**
 * Plugin Name: MU CC Slider Revolution Overlay Engine
 * Description: Overlay unificato, modulare e DRY per Slider Revolution (CodeCorn™)
 * Author: CodeCorn™ Technology
 * Version: 1.0.0
 * Author URI: https://github.com/CodeCornTech
 * Plugin URI: https://github.com/CodeCornTech/cc-revslider-overlay-engine
 */

defined('ABSPATH') || exit;

// =========================================================
// 🔹 Costanti globali
// =========================================================
defined('MU_CC_SR_OVERLAY_VERSION') || define('MU_CC_SR_OVERLAY_VERSION', '1.0.0');
defined('MU_CC_SR_OVERLAY_SLUG')    || define('MU_CC_SR_OVERLAY_SLUG', 'mu-cc-sr-overlay');
defined('MU_CC_SR_OVERLAY_DIR')     || define('MU_CC_SR_OVERLAY_DIR', __DIR__ . '/codecorn/sr-overlay/');
defined('MU_CC_SR_OVERLAY_URL')     || define('MU_CC_SR_OVERLAY_URL', plugin_dir_url(__FILE__) . 'codecorn/sr-overlay/');

// =========================================================
// 🔸 Enqueue CSS overlay
// =========================================================
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        MU_CC_SR_OVERLAY_SLUG,
        MU_CC_SR_OVERLAY_URL . 'assets/cc-sr-overlay.css',
        [],
        MU_CC_SR_OVERLAY_VERSION
    );
});
