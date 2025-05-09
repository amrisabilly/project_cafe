<?php
    session_start();
    
    $page = $_GET['page'] ?? 'home';

    switch ($page) {
        case 'home':
            $content = 'modul/landing/page/index.php';
            break;
        case 'menu':
            $content = 'modul/landing/menu.php';
            break;
        case 'about':
            $content = 'modul/landing/about.php';
            break;
        case 'contact':
            $content = 'modul/landing/contact.php';
            break;
        default:
            $content = 'modul/landing/home.php';
    }
    include 'modul/components/layout.php';


?>