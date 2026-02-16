@extends('layout')

@section('title', 'Portofolio - Talita')

@section('content')
<style>
    /* Custom CSS for advanced animations and effects */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
        50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6); }
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-gradient {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        position: relative;
    }
    
    .hero-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }
    
    .floating-element {
        animation: float 6s ease-in-out infinite;
    }
    
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }
    
    .pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }
    
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .skill-bar {
        height: 8px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
        border-radius: 4px;
        transition: width 1s ease-in-out;
    }
    
    .project-card {
        position: relative;
        overflow: hidden;
    }
    
    .project-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }
    
    .project-card:hover::before {
        opacity: 0.9;
    }
    
    .project-card:hover .project-content {
        opacity: 1;
        transform: translateY(0);
    }
    
    .project-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 2rem;
        color: white;
        z-index: 2;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    /* Music Player Styles */
    .music-player {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 15px 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        z-index: 50;
        max-width: 320px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .music-player.hidden {
        transform: translateX(400px);
        opacity: 0;
        pointer-events: none;
    }

    .music-player:hover {
        box-shadow: 0 15px 50px rgba(102, 126, 234, 0.4);
    }

    .music-player-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .music-player-title {
        color: white;
        font-weight: bold;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .music-player-title i {
        animation: pulse 1.5s infinite;
    }

    .music-close-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        cursor: pointer;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 12px;
    }

    .music-close-btn:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: rotate(90deg);
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .music-player audio {
        width: 100%;
        height: 30px;
        border-radius: 10px;
    }

    .player-controls {
        display: flex;
        gap: 8px;
        margin-top: 10px;
    }

    .player-controls button {
        flex: 1;
        padding: 8px;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        cursor: pointer;
        font-size: 12px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .player-controls button:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    .music-toggle-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        z-index: 49;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .music-toggle-btn.show {
        display: flex;
    }

    .music-toggle-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 15px 50px rgba(102, 126, 234, 0.4);
    }

    /* Voice Note Toggle Styles */
    .voice-note-container {
        position: fixed;
        bottom: 30px;
        left: 30px;
        z-index: 50;
        max-width: 320px;
        transition: all 0.3s ease;
    }

    .voice-note-container.hidden {
        transform: translateX(-120%);
        opacity: 0;
        pointer-events: none;
    }

    .voice-note-card {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        border-radius: 20px;
        padding: 15px;
        box-shadow: 0 10px 40px rgba(255, 107, 107, 0.3);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        animation: slideInLeft 0.5s ease;
        position: relative;
    }

    @keyframes slideInLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .voice-note-card:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 50px rgba(255, 107, 107, 0.5);
    }

    .voice-note-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .voice-note-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid white;
    }

    .voice-note-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .voice-note-info {
        flex: 1;
    }

    .voice-note-info h4 {
        color: white;
        font-weight: bold;
        margin: 0;
        font-size: 16px;
    }

    .voice-note-info p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        margin: 2px 0 0;
    }

    .voice-close-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        cursor: pointer;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 12px;
    }

    .voice-close-btn:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: rotate(90deg);
    }

    .voice-toggle-btn {
        position: fixed;
        bottom: 30px;
        left: 30px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        border: none;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        z-index: 49;
        box-shadow: 0 10px 40px rgba(255, 107, 107, 0.3);
        transition: all 0.3s ease;
        animation: pulse 2s infinite;
    }

    .voice-toggle-btn.show {
        display: flex;
    }

    .voice-toggle-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 15px 50px rgba(255, 107, 107, 0.5);
    }

    .voice-wave {
        display: flex;
        align-items: center;
        gap: 3px;
        height: 40px;
        margin: 10px 0;
    }

    .wave-bar {
        width: 4px;
        height: 20%;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 2px;
        transition: height 0.2s ease;
    }

    .voice-wave.playing .wave-bar {
        animation: waveAnimation 1s ease-in-out infinite;
    }

    .wave-bar:nth-child(1) { animation-delay: 0s; }
    .wave-bar:nth-child(2) { animation-delay: 0.1s; }
    .wave-bar:nth-child(3) { animation-delay: 0.2s; }
    .wave-bar:nth-child(4) { animation-delay: 0.3s; }
    .wave-bar:nth-child(5) { animation-delay: 0.4s; }
    .wave-bar:nth-child(6) { animation-delay: 0.5s; }
    .wave-bar:nth-child(7) { animation-delay: 0.6s; }
    .wave-bar:nth-child(8) { animation-delay: 0.7s; }
    .wave-bar:nth-child(9) { animation-delay: 0.8s; }
    .wave-bar:nth-child(10) { animation-delay: 0.9s; }

    @keyframes waveAnimation {
        0%, 100% { height: 20%; background: rgba(255, 255, 255, 0.3); }
        50% { height: 100%; background: white; }
    }

    .voice-note-controls {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
    }

    .voice-play-btn {
        width: 40px;
        height: 40px;
        background: white;
        border: none;
        border-radius: 50%;
        color: #ff6b6b;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .voice-play-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .voice-play-btn.playing {
        animation: pulse 1.5s infinite;
    }

    .voice-timer {
        color: white;
        font-size: 14px;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.2);
        padding: 5px 10px;
        border-radius: 15px;
    }

    .voice-message {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        padding: 10px 15px;
        margin-top: 10px;
        color: white;
        font-size: 13px;
        font-style: italic;
        border-left: 3px solid white;
    }

    .voice-message i {
        margin-right: 5px;
        color: #ffd700;
    }

    @media (max-width: 768px) {
        .music-player {
            bottom: 15px;
            right: 15px;
            max-width: 280px;
            padding: 12px 15px;
        }

        .music-toggle-btn {
            bottom: 15px;
            right: 15px;
        }
        
        .voice-note-container {
            bottom: 100px;
            left: 15px;
            max-width: 280px;
        }
        
        .voice-toggle-btn {
            bottom: 100px;
            left: 15px;
        }
    }

    /* Welcome Screen Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease forwards;
    }
    
    .animate-fadeIn {
        animation: fadeIn 1s ease forwards;
    }
    
    .typing-text {
        position: relative;
        display: inline-block;
    }
    
    .typing-text::after {
        content: '|';
        position: absolute;
        right: -8px;
        animation: blink 0.7s infinite;
    }
    
    @keyframes blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0; }
    }
    
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: white;
        border-radius: 50%;
        animation: float-particle 8s infinite;
    }
    
    @keyframes float-particle {
        0% {
            transform: translateY(0) translateX(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) translateX(100px);
            opacity: 0;
        }
    }

    /* Navbar Styles */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 40;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 1rem 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
        color: white !important;
    }

    .navbar-nav .nav-link {
        color: rgba(255,255,255,0.9) !important;
        font-weight: 500;
        margin: 0 10px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .navbar-nav .nav-link:hover {
        color: white !important;
        transform: translateY(-2px);
    }

    body {
        padding-top: 70px;
    }
</style>

<!-- Welcome Splash Screen -->
<div id="welcome-splash" class="fixed inset-0 z-[100] flex items-center justify-center bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 overflow-hidden">
    <!-- Background Animated Shapes -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-400/10 rounded-full blur-3xl animate-pulse delay-700"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-purple-500/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>
    
    <!-- Content -->
    <div class="relative z-10 text-center">
        <!-- Animated Text -->
        <h1 class="text-7xl md:text-8xl font-bold text-white mb-4 opacity-0 animate-fadeInUp" style="animation-delay: 0.3s">
            Welcome
        </h1>
        
        <!-- Name with Typing Effect -->
        <div class="h-20 overflow-hidden mb-8">
            <p class="text-3xl md:text-4xl text-white/90 font-light">
                <span id="typed-welcome"></span>
            </p>
        </div>
        
        <!-- Enter Button -->
        <button onclick="openPortfolio()" class="group relative px-12 py-5 bg-white text-gray-900 rounded-full font-bold text-xl overflow-hidden hover:text-white transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:scale-105">
            <span class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></span>
            <span class="relative z-10 flex items-center gap-3">
                Buka Portofolio
                <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
            </span>
        </button>
        
        <!-- Small Hint -->
        <p class="text-white/60 mt-6 text-sm animate-pulse">
            ✨ Klik tombol di atas untuk masuk ✨
        </p>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between">
            <a class="navbar-brand" href="#">
                <i class="fas fa-code me-2"></i>Talita Profile
            </a>
            <div class="hidden md:flex space-x-8">
                <a onclick="scrollToSection('home')" class="nav-link cursor-pointer">Home</a>
                <a onclick="scrollToSection('projects')" class="nav-link cursor-pointer">History</a>
                <a onclick="scrollToSection('videos')" class="nav-link cursor-pointer">Videos</a>
                <a onclick="scrollToSection('contact')" class="nav-link cursor-pointer">Contact</a>
            </div>
            <!-- Mobile menu button -->
            <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-3">
                <a onclick="scrollToSection('home')" class="nav-link cursor-pointer block">Home</a>
                <a onclick="scrollToSection('projects')" class="nav-link cursor-pointer block">History</a>
                <a onclick="scrollToSection('videos')" class="nav-link cursor-pointer block">Videos</a>
                <a onclick="scrollToSection('contact')" class="nav-link cursor-pointer block">Contact</a>
            </div>
        </div>
    </div>
</nav>

<!-- Voice Note Component dengan Toggle -->
<div class="voice-note-container" id="voiceNoteContainer">
    <div class="voice-note-card">
        <div class="voice-note-header">
            <div class="voice-note-avatar">
                <img src="{{ asset('images/talita.jpeg') }}" alt="Talita">
            </div>
            <div class="voice-note-info">
                <h4>Talita's Voice Note</h4>
                <p>klik play untuk dengar 😊</p>
            </div>
            <button class="voice-close-btn" onclick="closeVoiceNote()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Visualisasi Gelombang Suara -->
        <div class="voice-wave" id="voiceWave">
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
            <div class="wave-bar"></div>
        </div>
        
        <div class="voice-note-controls">
            <button class="voice-play-btn" id="voicePlayBtn" onclick="toggleVoiceNote()">
                <i class="fas fa-play" id="voicePlayIcon"></i>
            </button>
            <span class="voice-timer" id="voiceTimer">0:00 / 0:30</span>
        </div>
        
        <div class="voice-message">
            <i class="fas fa-quote-left"></i>
            Halo! Aku Talita. Makasih udah mampir ke portofolio aku. Jangan lupa follow ig aku ya! 😘
        </div>
        
        <!-- Audio element untuk voice note -->
        <audio id="voiceAudio" loop>
            <source src="{{ asset('audio/voice-note.mp3') }}" type="audio/mpeg">
        </audio>
    </div>
</div>

<!-- Voice Note Toggle Button (shown when voice note is hidden) -->
<button class="voice-toggle-btn" id="voiceToggleBtn" onclick="showVoiceNote()">
    <i class="fas fa-microphone"></i>
</button>

<!-- Main Content Wrapper (initially hidden) -->
<div id="main-content" class="opacity-0 transition-opacity duration-1000">
    <!-- Hero Section dengan Particle Effect -->
    <section id="home" class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center">
                <!-- Profile Image dengan Floating Effect -->
                <a href="#contact" class="mb-8 relative inline-block group hover:scale-110 transition-transform duration-300 cursor-pointer">
                    <div class="w-40 h-40 mx-auto rounded-full overflow-hidden border-4 border-white shadow-xl floating-element group-hover:shadow-2xl transition-shadow">
                        <img src="{{ asset('images/talita.jpeg') }}" 
                             alt="Profile" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-4 border-white pulse-glow"></div>
                </a>
                
                <!-- Nama dengan Gradient Text -->
                <h1 class="text-6xl md:text-7xl font-bold text-white mb-4">
                    Talita <span class="gradient-text">Bocil</span>
                </h1>
                
                <!-- Title dengan Typewriter Effect -->
                <p class="text-2xl md:text-3xl text-white mb-8 opacity-90">
                    <span class="typed-text"></span>
                </p>
                
                <!-- Deskripsi -->
                <p class="text-xl text-white mb-12 max-w-3xl mx-auto opacity-80 leading-relaxed">
                    Talita adalah seorang web developer berbakat kayanya.. Dengan keahlian dalam Nangis, suka matcha, dan suka orang yang gila, Talita mampu mengubah bahagia menjadi sedih dengan hitungan detik.
                </p>
            </div>
        </div>
    </section>

    <section id="projects" class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Histori</span>
                <h2 class="text-5xl font-bold mt-4 mb-6">
                    My <span class="gradient-text">history</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    history talita
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group relative overflow-hidden rounded-2xl h-96 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('images/odt.jpeg') }}" alt="Best Developer Award" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                        <div class="text-4xl mb-3">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">ODT</h3>
                        <p class="text-sm opacity-90">One Day Training</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl h-96 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('images/oprec.jpeg') }}" alt="100+ Projects" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                        <div class="text-4xl mb-3">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Forlachi</h3>
                        <p class="text-sm opacity-90">Forum Osis dan Pelajar Kota Cimahi</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl h-96 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('images/kalibata.jpeg') }}" alt="Certified Developer" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                        <div class="text-4xl mb-3">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">KALIBATA</h3>
                        <p class="text-sm opacity-90">panitia</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl h-96 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('images/fekasio.jpeg') }}" alt="Featured in Tech News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                        <div class="text-4xl mb-3">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Panitia Fekasio</h3>
                        <p class="text-sm opacity-90">panitia</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl h-96 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('images/gathos.jpeg') }}" alt="Community Leader" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                        <div class="text-4xl mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Gathos</h3>
                        <p class="text-sm opacity-90">Perkumpulan ketua osis</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl h-96 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('images/lomba.jpeg') }}" alt="Open Source Contributor" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                        <div class="text-4xl mb-3">
                            <i class="fas fa-code-branch"></i>
                        <h3 class="text-2xl font-bold mb-2">Lomba Sigap Terpana</h3>
                        <p class="text-sm opacity-90">Juara </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="videos" class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-400 font-semibold text-sm uppercase tracking-wider">video</span>
                <h2 class="text-5xl font-bold mt-4 mb-6">
                    My <span class="gradient-text">Highlights</span>
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    gabut pas syuting
                </p>
            </div>

            <div class="relative">
                <div class="highlights-container overflow-x-auto pb-4 md:overflow-x-visible">
                    <div class="flex gap-6 md:gap-8 md:justify-center min-w-min md:min-w-0">
                        <div class="highlight-item group cursor-pointer flex-shrink-0 w-48 md:w-56" onclick="openHighlight(0)">
                            <div class="relative h-96 md:h-[450px] rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 bg-black">
                                <img src="{{ asset('images/foto.jpg') }}" alt="Web Development" class="w-full h-full object-cover group-hover:brightness-75 transition-all duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex flex-col justify-between p-4">
                                    <div class="flex items-center justify-center h-full">
                                        <div class="bg-white/40 backdrop-blur-sm rounded-full p-3 group-hover:bg-white/60 transition-all transform group-hover:scale-110">
                                            <i class="fas fa-play text-3xl text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-white">Gabut pas syuting</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="highlight-item group cursor-pointer flex-shrink-0 w-48 md:w-56" onclick="openHighlight(1)">
                            <div class="relative h-96 md:h-[450px] rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                <img src="{{ asset('images/FF.jpeg') }}" alt="Coding" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex flex-col justify-between p-4">
                                    <div class="flex items-center justify-center h-full">
                                        <div class="bg-white/40 backdrop-blur-sm rounded-full p-3 group-hover:bg-white/60 transition-all transform group-hover:scale-110">
                                            <i class="fas fa-play text-3xl text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-white">JJ FF</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="highlight-item group cursor-pointer flex-shrink-0 w-48 md:w-56" onclick="openHighlight(2)">
                            <div class="relative h-96 md:h-[450px] rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                <img src="{{ asset('images/BANDUNG.jpeg') }}" alt="Design" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex flex-col justify-between p-4">
                                    <div class="flex items-center justify-center h-full">
                                        <div class="bg-white/40 backdrop-blur-sm rounded-full p-3 group-hover:bg-white/60 transition-all transform group-hover:scale-110">
                                            <i class="fas fa-play text-3xl text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-white">BANDUNG</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="highlight-item group cursor-pointer flex-shrink-0 w-48 md:w-56" onclick="openHighlight(3)">
                            <div class="relative h-96 md:h-[450px] rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                <img src="{{ asset('images/image.png') }}" alt="Project" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex flex-col justify-between p-4">
                                    <div class="flex items-center justify-center h-full">
                                        <div class="bg-white/40 backdrop-blur-sm rounded-full p-3 group-hover:bg-white/60 transition-all transform group-hover:scale-110">
                                            <i class="fas fa-play text-3xl text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-white">JJ</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button onclick="scrollHighlights('left')" class="hidden md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-black/60 hover:bg-black rounded-full w-10 h-10 flex items-center justify-center transition-all">
                    <i class="fas fa-chevron-left text-white"></i>
                </button>
                <button onclick="scrollHighlights('right')" class="hidden md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-black/60 hover:bg-black rounded-full w-10 h-10 flex items-center justify-center transition-all">
                    <i class="fas fa-chevron-right text-white"></i>
                </button>
            </div>
        </div>
    </section>

    <div id="highlightModal" class="hidden fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4">
        <div class="relative modal-box w-auto max-w-[92vw] max-h-[92vh]">
            <button onclick="closeHighlight()" class="absolute -top-12 right-0 bg-white/20 hover:bg-white/40 rounded-full w-10 h-10 flex items-center justify-center z-60 transition-all">
                <i class="fas fa-times text-white text-xl"></i>
            </button>

            <button onclick="prevHighlight()" class="absolute left-4 top-1/2 -translate-y-1/2 z-60 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full w-12 h-12 flex items-center justify-center transition-all transform hover:scale-110">
                <i class="fas fa-chevron-left text-white text-xl"></i>
            </button>
            <button onclick="nextHighlight()" class="absolute right-4 top-1/2 -translate-y-1/2 z-60 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full w-12 h-12 flex items-center justify-center transition-all transform hover:scale-110">
                <i class="fas fa-chevron-right text-white text-xl"></i>
            </button>

            <div class="bg-black rounded-3xl overflow-hidden shadow-2xl w-full max-h-[90vh] md:max-h-[80vh]">
                <div class="relative h-full">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gray-600 z-40">
                        <div id="highlightProgress" class="h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all"></div>
                    </div>

                    <video id="modalHighlightVideo" class="w-full h-full object-contain hidden" controls>
                        <source src="" type="video/mp4">
                    </video>
                    <img id="modalHighlightImage" src="" alt="Highlight" class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

                    <div class="absolute inset-0 flex flex-col justify-between p-6">
                        <div class="flex justify-between items-start">
                            <div class="flex gap-1">
                                <span id="highlightCounter" class="text-white text-sm bg-black/50 px-3 py-1 rounded-full">1/4</span>
                            </div>
                        </div>

                        <div>
                            <h2 id="modalHighlightTitle" class="text-3xl font-bold text-white mb-2"></h2>
                            <p id="modalHighlightDesc" class="text-gray-300 text-sm max-w-xs"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .highlights-container {
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .highlights-container::-webkit-scrollbar {
            height: 6px;
        }

        .highlights-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .highlights-container::-webkit-scrollbar-thumb {
            background: rgba(102, 126, 234, 0.5);
            border-radius: 10px;
        }

        .highlights-container::-webkit-scrollbar-thumb:hover {
            background: rgba(102, 126, 234, 0.8);
        }
    </style>

    <section id="contact" class="py-20 bg-gradient-to-br from-blue-600 to-purple-700">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <span class="text-blue-200 font-semibold text-sm uppercase tracking-wider">Get in Touch</span>
                    <h2 class="text-5xl font-bold mt-4 mb-6">
                        info tentang <span class="text-yellow-300">Tulalittttt</span>
                    </h2>
                    <p class="text-xl text-blue-100 mb-8">
                        aku butuh seseorang KARENA AKU ANAK PERTAMAAAAAA!
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-white group-hover:text-blue-600 transition-all">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-200">Email</p>
                                <p class="font-semibold">talita???@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-white group-hover:text-blue-600 transition-all">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-200">Phone</p>
                                <p class="font-semibold">08157291....😜</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-white group-hover:text-blue-600 transition-all">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-200">Location</p>
                                <p class="font-semibold">Rancabentang, Cimindi</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex gap-4 mt-8">
                        <a href="https://www.instagram.com/lita_azmiii?igsh=MWJxeTUzZzdranRxZw==" class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center hover:bg-white hover:text-blue-600 transition-all">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Music Player (Background Music) -->
<div class="music-player hidden" id="musicPlayer">
    <div class="music-player-header">
        <div class="music-player-title">
            <i class="fas fa-music"></i>
            Background Music
        </div>
        <button class="music-close-btn" onclick="closeMusicPlayer()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <audio id="backgroundMusic" loop>
        <source src="{{ asset('audio/background-music.mp3') }}" type="audio/mpeg">
    </audio>
    <div class="player-controls">
        <button onclick="playMusic()"><i class="fas fa-play"></i> Play</button>
        <button onclick="pauseMusic()"><i class="fas fa-pause"></i> Pause</button>
    </div>
</div>

<!-- Music Toggle Button (shown when player is hidden) -->
<button class="music-toggle-btn" id="musicToggleBtn" onclick="showMusicPlayer()">
    <i class="fas fa-music"></i>
</button>

<!-- Add Typed.js for typewriter effect -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1"></script>

<script>
    // Welcome Screen Logic
    const welcomeSplash = document.getElementById('welcome-splash');
    const mainContent = document.getElementById('main-content');
    
    // Typed.js for welcome screen
    new Typed('#typed-welcome', {
        strings: [
            'Talita Bocil',
            'Tulalittttt',
            'Matcha Lover',
            'Tukang nangis',
            'Suka orang gila',
            'Suka bahagia',
        ],
        typeSpeed: 50,
        backSpeed: 30,
        loop: true,
        showCursor: true,
        cursorChar: '|'
    });
    
    // Function to open portfolio
    function openPortfolio() {
        welcomeSplash.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        welcomeSplash.style.opacity = '0';
        welcomeSplash.style.transform = 'scale(1.1)';
        
        mainContent.style.opacity = '1';
        
        confetti({
            particleCount: 150,
            spread: 70,
            origin: { y: 0.6 },
            colors: ['#667eea', '#764ba2', '#ffffff', '#ff6b6b']
        });
        
        setTimeout(() => {
            welcomeSplash.style.display = 'none';
        }, 1000);
    }
    
    // Add floating particles
    function createParticles() {
        const container = document.getElementById('welcome-splash');
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 5 + 's';
            particle.style.background = `hsl(${Math.random() * 360}, 70%, 70%)`;
            container.appendChild(particle);
        }
    }
    createParticles();

    // Typed.js for main content
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed('.typed-text', {
            strings: [
                'Suka Matcha',
                'Suka Nangis',
                'Suka Orang Gila',
                'Suka Bahagia',
                'Suka Sedih'
            ],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true
        });
    });

    // Scroll function for navbar
    function scrollToSection(sectionId) {
        const element = document.getElementById(sectionId);
        if (element) {
            const navbarHeight = 70;
            const elementPosition = element.offsetTop - navbarHeight;
            
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
    }

    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    }

    // Highlight video logic
    let currentHighlight = 0;
    const totalHighlights = 4;

    const highlightData = [
        {
            title: 'gabut pas syuting',
            desc: 'lucu banget sih',
            video: "{{ asset('videos/video1.mp4') }}" 
        },
        {
            title: 'JJ',
            desc: 'FF',
            video: "{{ asset('videos/JJ2.mp4') }}" 
        },
        {
            title: 'BANDUNG',
            desc: 'bandung kala itu',
            video: "{{ asset('videos/BANDUNG.mp4') }}" 
        },
        {
            title: 'JJ',
            desc: 'jj lagi',
            video: "{{ asset('videos/JJ1.mp4') }}" 
        }
    ];

    function openHighlight(index) {
        currentHighlight = index;
        updateHighlightModal();
        document.getElementById('highlightModal').classList.remove('hidden');
    }

    function closeHighlight() {
        const videoElement = document.getElementById('modalHighlightVideo');
        if (videoElement) {
            videoElement.pause();
            videoElement.currentTime = 0;
        }
        document.getElementById('highlightModal').classList.add('hidden');
    }

    function nextHighlight() {
        currentHighlight = (currentHighlight + 1) % totalHighlights;
        updateHighlightModal();
    }

    function prevHighlight() {
        currentHighlight = (currentHighlight - 1 + totalHighlights) % totalHighlights;
        updateHighlightModal();
    }

    function updateHighlightModal() {
        const data = highlightData[currentHighlight];
        const videoElement = document.getElementById('modalHighlightVideo');
        const imageElement = document.getElementById('modalHighlightImage');
        
        if (data.video) {
            videoElement.src = data.video;
            videoElement.classList.remove('hidden');
            imageElement.classList.add('hidden');
            videoElement.play();
        } else {
            imageElement.src = data.image;
            imageElement.classList.remove('hidden');
            videoElement.classList.add('hidden');
        }
        
        document.getElementById('modalHighlightTitle').textContent = data.title;
        document.getElementById('modalHighlightDesc').textContent = data.desc;
        document.getElementById('highlightCounter').textContent = (currentHighlight + 1) + '/' + totalHighlights;
        
        const progress = ((currentHighlight + 1) / totalHighlights) * 100;
        document.getElementById('highlightProgress').style.width = progress + '%';
    }

    function scrollHighlights(direction) {
        const container = document.querySelector('.highlights-container');
        const scrollAmount = 300;
        if (direction === 'left') {
            container.scrollLeft -= scrollAmount;
        } else {
            container.scrollLeft += scrollAmount;
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeHighlight();
        } else if (event.key === 'ArrowRight') {
            nextHighlight();
        } else if (event.key === 'ArrowLeft') {
            prevHighlight();
        }
    });

    // Close mobile menu when clicking a link
    document.querySelectorAll('#mobileMenu .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.add('hidden');
        });
    });

    // Voice Note Toggle Functionality
    const voiceNoteContainer = document.getElementById('voiceNoteContainer');
    const voiceToggleBtn = document.getElementById('voiceToggleBtn');

    // Voice Note Functionality
    let voiceAudio = document.getElementById('voiceAudio');
    let voicePlayBtn = document.getElementById('voicePlayBtn');
    let voicePlayIcon = document.getElementById('voicePlayIcon');
    let voiceTimer = document.getElementById('voiceTimer');
    let voiceWave = document.getElementById('voiceWave');
    let isVoicePlaying = false;

    function closeVoiceNote() {
        // Pause audio jika sedang playing
        if (isVoicePlaying) {
            voiceAudio.pause();
            voicePlayIcon.className = 'fas fa-play';
            voiceWave.classList.remove('playing');
            voicePlayBtn.classList.remove('playing');
            isVoicePlaying = false;
        }
        
        // Hide voice note container
        voiceNoteContainer.classList.add('hidden');
        voiceToggleBtn.classList.add('show');
    }

    function showVoiceNote() {
        // Show voice note container
        voiceNoteContainer.classList.remove('hidden');
        voiceToggleBtn.classList.remove('show');
    }

    function toggleVoiceNote() {
        if (isVoicePlaying) {
            voiceAudio.pause();
            voicePlayIcon.className = 'fas fa-play';
            voiceWave.classList.remove('playing');
            voicePlayBtn.classList.remove('playing');
        } else {
            voiceAudio.play();
            voicePlayIcon.className = 'fas fa-pause';
            voiceWave.classList.add('playing');
            voicePlayBtn.classList.add('playing');
        }
        isVoicePlaying = !isVoicePlaying;
    }

    voiceAudio.addEventListener('timeupdate', function() {
        let minutes = Math.floor(voiceAudio.currentTime / 60);
        let seconds = Math.floor(voiceAudio.currentTime % 60);
        let totalMinutes = Math.floor(voiceAudio.duration / 60);
        let totalSeconds = Math.floor(voiceAudio.duration % 60);
        
        if (isNaN(totalMinutes)) totalMinutes = 0;
        if (isNaN(totalSeconds)) totalSeconds = 30;
        
        voiceTimer.textContent = `${minutes}:${seconds.toString().padStart(2, '0')} / ${totalMinutes}:${totalSeconds.toString().padStart(2, '0')}`;
    });

    voiceAudio.addEventListener('ended', function() {
        isVoicePlaying = false;
        voicePlayIcon.className = 'fas fa-play';
        voiceWave.classList.remove('playing');
        voicePlayBtn.classList.remove('playing');
        voiceTimer.textContent = '0:00 / 0:30';
    });

    function animateWave() {
        if (isVoicePlaying) {
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                let height = Math.random() * 100;
                bar.style.height = height + '%';
            });
            requestAnimationFrame(animateWave);
        }
    }

    voiceAudio.addEventListener('play', function() {
        animateWave();
    });

    // Music Player Functionality
    const backgroundMusic = document.getElementById('backgroundMusic');
    const musicPlayer = document.getElementById('musicPlayer');
    const musicToggleBtn = document.getElementById('musicToggleBtn');

    function playMusic() {
        backgroundMusic.play();
    }

    function pauseMusic() {
        backgroundMusic.pause();
    }

    function closeMusicPlayer() {
        musicPlayer.classList.add('hidden');
        musicToggleBtn.classList.add('show');
    }

    function showMusicPlayer() {
        musicPlayer.classList.remove('hidden');
        musicToggleBtn.classList.remove('show');
    }

    // Pastikan voice note muncul pertama kali
    setTimeout(() => {
        voiceNoteContainer.classList.remove('hidden');
        voiceToggleBtn.classList.remove('show');
    }, 1000);
</script>
@endsection