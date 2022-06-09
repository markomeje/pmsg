<?php


if (!function_exists('randomrgba')) {
    function randomrgba($opacity = 0.5) {
        return 'rgba('.rand(0, 255).','. rand(0, 255).','. rand(0, 255).','. $opacity.')';
    }
}