<?php
/**
 * Plugin Name: Exam Management Plugin
 * Plugin URI:  https://github.com/applab-wp/mt-exam
 * Description: Exam Management Plugin with students, exams, results, subjects, and term taxonomy.
 * Version:     1.0.0
 * Author:      AppLab WP (Enhanced)
 * License:     GPL-2.0+
 * Text Domain: mt-exam
 * Develop By: Ghulam Yaseen
 */

defined( 'ABSPATH' ) || exit;

define( 'MT_EXAM_VERSION', '2.0.0' );
define( 'MT_EXAM_DIR',     plugin_dir_path( __FILE__ ) );
define( 'MT_EXAM_URL',     plugin_dir_url( __FILE__ ) );

// ─── Load Modules ────────────────────────────────────────────────────────────
require_once MT_EXAM_DIR . 'includes/post-types.php';
require_once MT_EXAM_DIR . 'includes/meta-boxes.php';
require_once MT_EXAM_DIR . 'includes/ajax.php';
require_once MT_EXAM_DIR . 'includes/shortcodes.php';
require_once MT_EXAM_DIR . 'includes/csv-import.php';
require_once MT_EXAM_DIR . 'includes/reports.php';
require_once MT_EXAM_DIR . 'includes/term-meta.php';

// ─── Activation Hook ─────────────────────────────────────────────────────────
register_activation_hook( __FILE__, 'mt_exam_activate' );
function mt_exam_activate() {
    mt_exam_register_post_types();
    flush_rewrite_rules();
}

// ─── Enqueue Admin Assets ────────────────────────────────────────────────────
add_action( 'admin_enqueue_scripts', 'mt_exam_admin_assets' );
function mt_exam_admin_assets( $hook ) {
    $cpts = [ 'em_student', 'em_exam', 'em_result', 'em_subject' ];
    $screen = get_current_screen();

    wp_enqueue_style(
        'mt-exam-admin',
        MT_EXAM_URL . 'assets/css/admin.css',
        [],
        MT_EXAM_VERSION
    );

    wp_enqueue_script( 'jquery' );

    // Date-time picker
    wp_enqueue_script( 'flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js', [], null, true );
    wp_enqueue_style( 'flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], null );

    wp_enqueue_script(
        'mt-exam-admin',
        MT_EXAM_URL . 'assets/js/admin.js',
        [ 'jquery', 'flatpickr' ],
        MT_EXAM_VERSION,
        true
    );

    wp_localize_script( 'mt-exam-admin', 'mtExam', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'mt_exam_nonce' ),
    ] );
}
