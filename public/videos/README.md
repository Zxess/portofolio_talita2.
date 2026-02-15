# Portfolio Videos

Folder ini untuk menyimpan file video yang ditampilkan di section highlights portfolio.

## 📹 File Video yang Dibutuhkan

Simpan video Anda dengan nama file berikut di folder `public/videos/`:

### 1. **tutorial.mp4**
   - Video untuk highlight "Web Development Tutorial"
   - Format: MP4 (H.264 codec recommended)
   - Ukuran recommended: 720p - 1080p
   - Durasi: 30-60 detik
   - File size: Max 50MB

### 2. **coding.mp4**
   - Video untuk highlight "Coding Live Session"
   - Format: MP4
   - Ukuran recommended: 720p - 1080p
   - Durasi: 30-60 detik
   - File size: Max 50MB

### 3. **design.mp4**
   - Video untuk highlight "UI/UX Design Walkthrough"
   - Format: MP4
   - Ukuran recommended: 720p - 1080p
   - Durasi: 30-60 detik
   - File size: Max 50MB

### 4. **project.mp4**
   - Video untuk highlight "Project Showcase"
   - Format: MP4
   - Ukuran recommended: 720p - 1080p
   - Durasi: 30-60 detik
   - File size: Max 50MB

## 🎬 Cara Upload

1. Siapkan file MP4 Anda
2. Letakkan di folder `public/videos/` dengan nama sesuai di atas
3. Pastikan browser bisa membaca format MP4 (H.264)
4. Refresh halaman portfolio, video akan otomatis tampil

## 📋 Video Format Requirements

- **Container**: MP4 (.mp4)
- **Video Codec**: H.264 (AVC)
- **Audio Codec**: AAC
- **Resolution**: 720p (1280x720) minimum, 1080p (1920x1080) recommended
- **Frame Rate**: 24-30 fps
- **Bitrate**: 2-5 Mbps
- **Aspect Ratio**: 9:16 (portrait) untuk Instagram-like look

## 💡 Tips Konversi Video

### Menggunakan FFmpeg:
```bash
ffmpeg -i input_video.mov -c:v libx264 -crf 23 -preset fast -c:a aac -b:a 128k output.mp4
```

### Menggunakan Online Tools:
- CloudConvert.com
- Online-Convert.com
- Convertio.co

## 🖼️ Thumbnail Images

Thumbnail untuk highlights sudah tersimpan di `public/images/`:
- video-tutorial.jpg
- video-coding.jpg
- video-design.jpg
- video-project.jpg

Pastikan thumbnail ada sebelum video diload.

## ✅ Checklist

- [ ] Siapkan 4 file MP4 (tutorial, coding, design, project)
- [ ] Format: H.264 video codec, AAC audio
- [ ] Resolusi: Minimal 720p, ideal 1080p
- [ ] Durasi: 30-60 detik per video
- [ ] File size: Di bawah 50MB per file
- [ ] Letakkan di folder `public/videos/` dengan nama tepat
- [ ] Pastikan thumbnail image sudah ada
- [ ] Test play di halaman portfolio

## 🔧 Troubleshooting

**Video tidak tampil?**
- Pastikan file ada di `public/videos/`
- Periksa nama file (case-sensitive)
- Cek browser console untuk error

**Video tidak bisa diplay?**
- Pastikan format MP4 dengan H.264 codec
- Coba konversi ulang dengan FFmpeg
- Test di browser lain

**Ukuran file terlalu besar?**
- Kurangi resolusi ke 720p
- Kurangi durasi video
- Gunakan bitrate 3Mbps alih-alih 5Mbps
