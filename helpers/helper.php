<?php

if (!function_exists('get_current_year')) {
    function get_current_year() {
        return date('Y');
    }
}

if (!function_exists('format_tanggal_indonesia')) {
    function format_tanggal_indonesia($tanggal) {
        return date('d F Y', strtotime($tanggal));
    }
}