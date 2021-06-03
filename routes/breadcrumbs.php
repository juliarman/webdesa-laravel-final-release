<?php


//HOME
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});


//HOME > BERITA
Breadcrumbs::for('berita', function ($trail) {
    $trail->parent('home');
    $trail->push('Berita', route('berita'));
});


//HOME > BERITA
Breadcrumbs::for('surat', function ($trail) {
    $trail->parent('home');
    $trail->push('Surat', route('surat'));
});
