# HAMAI — Local AI Music Project Manager (Laravel)

HAMAI adalah aplikasi berbasis **Laravel** yang berfungsi untuk mengelola proyek musik berbasis AI secara lokal.  
Meskipun belum menggunakan AI yang sebenarnya, aplikasi ini sudah memiliki arsitektur lengkap seperti:

- Manajemen AI Project
- Penyimpanan metadata musik (Genre, Mood, BPM, Key)
- AI Text Generator (Dummy)  
  - Lyric Generator  
  - Song Brief Generator  
  - Chord Progression Generator  

Struktur ini dirancang agar bisa **dikembangkan menjadi AI music engine** di masa depan.

---

## ✨ Features

### 🎵 **AI Project Management**
- Membuat project musik (judul, genre, mood, BPM, key).
- Edit & delete project.
- Detail lengkap tiap project.

### ✍️ **AI Text Generator (Dummy Mode)**
- Generate:
  - Lirik musik (Lyric)
  - Song Brief
  - Chord Progression
- Prompt custom yang bisa dimasukkan user.
- Output disimpan ke database.
- Riwayat hasil AI Text ditampilkan per project.

### 🧱 **Clean Database Structure**
- `ai_projects`  
- `ai_text_generations`  
- `ai_audio_jobs` (untuk pengembangan audio AI ke depannya)

Struktur sudah siap dipakai untuk AI model yang lebih maju.

---

## 🛠️ Technology Stack

- **Laravel 11**
- **PHP 8.2**
- **MySQL (MAMP port 8889)**
- **Blade Template**
- **Localhost Dev Environment**

---

## 📦 Installation

### 1️⃣ Clone project
```bash
git clone https://github.com/yourusername/hamai.git
cd hamai
