<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900">
    <!-- Navigation -->
   
    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2026 portofolio TULALITTTT. Semoga suka yakkk.</p>
        </div>
    </footer>

    <!-- Global Music Player -->
    <style>
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
        }
    </style>

    <div class="music-player" id="musicPlayer">
        <div class="music-player-header">
            <div class="music-player-title">
                <i class="fas fa-music"></i>
                <span>Now Playing</span>
            </div>
            <button class="music-close-btn" onclick="toggleMusicPlayer()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <audio id="audioPlayer" controlsList="nodownload">
            <source src="{{ asset('music/Reality Club - Anything You Want (Official Lyric Video).mp3') }}" type="audio/mpeg">
        </audio>
        <div class="player-controls">
            <button onclick="document.getElementById('audioPlayer').play()">
                <i class="fas fa-play"></i> Play
            </button>
            <button onclick="document.getElementById('audioPlayer').pause()">
                <i class="fas fa-pause"></i> Pause
            </button>
            <button onclick="toggleMute()">
                <i class="fas fa-volume-mute"></i> Mute
            </button>
        </div>
    </div>

    <button class="music-toggle-btn" id="musicToggleBtn" onclick="toggleMusicPlayer()">
        <i class="fas fa-music"></i>
    </button>

    <script>
        // ============================================================
        // GLOBAL MUSIC PLAYER WITH PERSISTENT PLAYBACK
        // ============================================================
        
        function toggleMusicPlayer() {
            const musicPlayer = document.getElementById('musicPlayer');
            const toggleBtn = document.getElementById('musicToggleBtn');
            
            musicPlayer.classList.toggle('hidden');
            toggleBtn.classList.toggle('show');
            
            // Save state to localStorage
            const isHidden = musicPlayer.classList.contains('hidden');
            localStorage.setItem('musicPlayerHidden', isHidden);
        }

        function toggleMute() {
            const audio = document.getElementById('audioPlayer');
            if (audio.volume > 0) {
                audio.dataset.previousVolume = audio.volume;
                audio.volume = 0;
            } else {
                audio.volume = audio.dataset.previousVolume || 0.3;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('audioPlayer');
            const musicPlayer = document.getElementById('musicPlayer');
            const toggleBtn = document.getElementById('musicToggleBtn');
            
            // Set initial volume
            audio.volume = 0.3;

            // Restore player visibility state
            const wasHidden = localStorage.getItem('musicPlayerHidden') === 'true';
            if (wasHidden) {
                musicPlayer.classList.add('hidden');
                toggleBtn.classList.add('show');
            }

            // Restore audio playback state
            const savedCurrentTime = parseFloat(localStorage.getItem('audioCurrentTime')) || 0;
            const wasPlaying = localStorage.getItem('audioWasPlaying') === 'true';
            
            // Wait for audio to be loadable before setting currentTime
            audio.addEventListener('canplay', function() {
                audio.currentTime = savedCurrentTime;
                
                // Auto-play if it was playing before
                if (wasPlaying) {
                    audio.play().catch(function(err) {
                        console.log('Autoplay prevented by browser', err);
                    });
                }
            }, { once: true });

            // Fallback if canplay doesn't fire
            setTimeout(function() {
                if (audio.readyState > 0) {
                    audio.currentTime = savedCurrentTime;
                    if (wasPlaying) {
                        audio.play().catch(function(err) {
                            console.log('Autoplay prevented by browser', err);
                        });
                    }
                }
            }, 500);

            // Save current time every second
            setInterval(function() {
                if (!isNaN(audio.currentTime)) {
                    localStorage.setItem('audioCurrentTime', audio.currentTime);
                }
            }, 1000);

            // Save playing state when it changes
            audio.addEventListener('play', function() {
                localStorage.setItem('audioWasPlaying', 'true');
            });

            audio.addEventListener('pause', function() {
                localStorage.setItem('audioWasPlaying', 'false');
            });

            // Handle song end
            audio.addEventListener('ended', function() {
                localStorage.setItem('audioCurrentTime', 0);
                localStorage.setItem('audioWasPlaying', 'false');
            });
        });
    </script>
</body>
</html>
