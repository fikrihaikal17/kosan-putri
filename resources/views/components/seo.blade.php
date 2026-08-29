@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'url' => null,
    'type' => 'website',
    'keywords' => null,
    'business' => null,
    'contact' => null,
])

@php
    $siteDomain = 'https://kosanputri.kall.my.id';
    $siteName = 'Kost Putri Ibu Idah';
    $locale = 'id_ID';

    // 1. Resolve Title
    $resolvedTitle = !empty($title) 
        ? $title 
        : (!empty($business['og_title']) 
            ? $business['og_title'] 
            : (!empty($business['seo_title']) ? $business['seo_title'] : 'Kost Putri Ibu Idah'));

    // 2. Resolve Description
    $resolvedDescription = !empty($description)
        ? $description
        : (!empty($business['og_description'])
            ? $business['og_description']
            : (!empty($business['seo_description'])
                ? $business['seo_description']
                : 'Kos khusus putri dengan kamar nyaman, Wi-Fi, listrik dan air termasuk, serta fasilitas bersama.'));

    // 3. Resolve Image URL (always full absolute URL)
    $rawImage = !empty($image)
        ? $image
        : (!empty($business['og_image_url'])
            ? $business['og_image_url']
            : $siteDomain . '/images/og/og-default.png');

    if (str_starts_with($rawImage, 'http://') || str_starts_with($rawImage, 'https://')) {
        $resolvedImage = $rawImage;
    } elseif (str_starts_with($rawImage, '/')) {
        $resolvedImage = $siteDomain . $rawImage;
    } else {
        $resolvedImage = $siteDomain . '/' . $rawImage;
    }

    // 4. Resolve Canonical & OG URL (always full absolute URL)
    $currentPath = request()->getPathInfo() === '/' ? '' : request()->getPathInfo();
    $resolvedUrl = !empty($url) ? $url : ($siteDomain . $currentPath);

    // 5. Resolve Keywords
    $resolvedKeywords = !empty($keywords)
        ? $keywords
        : 'kost putri ciamis, kosan putri ibu idah, sewa kos putri ciamis, kos mahasiswi ciamis, kos dewasari cijeungjing, kamar mandi dalam ciamis';
@endphp

<!-- Primary Meta Tags -->
<title>{{ $resolvedTitle }}</title>
<meta name="title" content="{{ $resolvedTitle }}">
<meta name="description" content="{{ $resolvedDescription }}">
<meta name="keywords" content="{{ $resolvedKeywords }}">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<link rel="canonical" href="{{ $resolvedUrl }}">

<!-- Open Graph / Facebook / WhatsApp / Telegram / LinkedIn / Discord -->
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="{{ $locale }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $resolvedTitle }}">
<meta property="og:description" content="{{ $resolvedDescription }}">
<meta property="og:url" content="{{ $resolvedUrl }}">
<meta property="og:image" content="{{ $resolvedImage }}">
<meta property="og:image:secure_url" content="{{ $resolvedImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $resolvedTitle }}">

<!-- Twitter / X Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:domain" content="kosanputri.kall.my.id">
<meta name="twitter:url" content="{{ $resolvedUrl }}">
<meta name="twitter:title" content="{{ $resolvedTitle }}">
<meta name="twitter:description" content="{{ $resolvedDescription }}">
<meta name="twitter:image" content="{{ $resolvedImage }}">
<meta name="twitter:image:alt" content="{{ $resolvedTitle }}">

<!-- Geographic & Local SEO Meta Tags (Ciamis, Jawa Barat) -->
<meta name="geo.region" content="ID-JB">
<meta name="geo.placename" content="Ciamis">
<meta name="geo.position" content="-7.3226066;108.3780388">
<meta name="ICBM" content="-7.3226066, 108.3780388">
<meta name="city" content="Ciamis">
<meta name="country" content="Indonesia">
<meta name="language" content="Indonesian">
<meta name="author" content="{{ $siteName }}">
