@extends('layout')

@section('title', 'Album - Talita')

@section('content')
<style>
    .album-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 20px;
        text-align: center;
        color: white;
    }

    .album-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        padding: 60px 20px;
    }

    .album-card {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        height: 300px;
    }

    .album-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    }

    .album-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .album-card:hover img {
        transform: scale(1.1);
    }

    .album-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        color: white;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .album-card:hover .album-overlay {
        opacity: 1;
    }

    .album-title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .album-description {
        font-size: 14px;
        margin-bottom: 10px;
        opacity: 0.9;
    }

    .album-count {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .album-count i {
        color: #FFD700;
    }

    .breadcrumb {
        padding: 20px 0;
        background: #f5f5f5;
    }

    .breadcrumb-link {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb-link:hover {
        text-decoration: underline;
    }
</style>

<!-- Album Hero Section -->
<section class="album-hero">
    <div class="container mx-auto">
        <h1 class="text-5xl md:text-6xl font-bold mb-4">Photo Album</h1>
        <p class="text-xl opacity-90">Explore my memories and creative moments</p>
    </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb">
    <div class="container mx-auto px-6">
        <a href="{{ route('portfolio.index') }}" class="breadcrumb-link">Home</a>
        <span class="mx-2 text-gray-600">/</span>
        <span class="text-gray-600">Album</span>
    </div>
</div>

<!-- Album Grid -->
<section class="py-12">
    <div class="container mx-auto px-6">
        <div class="album-grid">
            @forelse ($albums as $album)
                <div class="album-card group">
                    <img src="{{ $album['image'] }}" alt="{{ $album['title'] }}" loading="lazy">
                    <div class="album-overlay">
                        <div class="album-title">{{ $album['title'] }}</div>
                        <div class="album-description">{{ $album['description'] }}</div>
                        <div class="album-count">
                            <i class="fas fa-image"></i>
                            <span>{{ $album['count'] }} photos</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 col-span-full">
                    <i class="fas fa-image text-6xl text-gray-300 mb-4"></i>
                    <p class="text-2xl text-gray-500">No albums available yet</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Info Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-6 gradient-text">More Coming Soon!</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            I'm constantly capturing and sharing new moments. Follow me on social media to stay updated with the latest additions to my albums.
        </p>
        <div class="flex gap-4 justify-center">
            <a href="#" class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition">
                <i class="fab fa-instagram mr-2"></i> Follow on Instagram
            </a>
            <a href="{{ route('portfolio.index') }}" class="bg-gray-800 text-white px-8 py-3 rounded-full hover:bg-gray-900 transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Home
            </a>
        </div>
    </div>
</section>

<style>
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endsection
