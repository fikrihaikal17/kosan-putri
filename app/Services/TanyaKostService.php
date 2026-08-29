<?php

namespace App\Services;

use App\Models\BusinessSetting;
use App\Models\Faq;
use App\Models\HouseRule;
use App\Models\Room;

class TanyaKostService
{
    public function __construct(
        protected KostDataService $kostData
    ) {}

    /**
     * Process a user question and return a rich, conversational, context-aware answer strictly grounded in kos information.
     * Includes strict guardrails against out-of-domain queries and answers permission-based requests.
     *
     * @return array{answer: string, show_wa_cta: bool, wa_message: string}
     */
    public function answerQuestion(string $question): array
    {
        $q = mb_strtolower(trim($question));

        $setting = BusinessSetting::first();
        $phone = $setting?->whatsapp_number ?: '081339259179';
        $formattedPhone = $setting?->whatsapp_formatted ?: '0813-3925-9179';
        $gateTime = $setting?->gate_closing_time ?: '22.00 WIB';
        $address = $setting?->address ?: 'Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271';
        $landmark = $setting?->location_landmark ?: 'Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Ciamis';

        $waMessage = 'Halo Ibu Idah, saya ingin menanyakan: '.$question;

        // 0. Pertanyaan Kosong
        if (empty($q)) {
            return [
                'answer' => 'Halo! Saya asisten informasi Kost Putri Ibu Idah. Silakan tanyakan apa saja seputar pilihan kamar, fasilitas, listrik, air, aturan, lokasi, harga, maupun cara survey kamar.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // =========================================================================
        // GUARDRAIL: Deteksi Konten di Luar Topik Kosan (Matematika, Koding, Politik, Umum)
        // =========================================================================

        // 1A. Matematika / Angka & Operasi Hitung (contoh: "10 + 10", "5*5", "100/2")
        if (preg_match('/^[\d\s\+\-\*\/\=\%\^\(\)\.\,\:\;xX÷]+$/', $q) || preg_match('/\b(hitung|kalkulator|akar dari|persamaan|rumus matematika|sinus|cosinus)\b/i', $q)) {
            return [
                'answer' => 'Maaf, saya adalah asisten informasi khusus Kost Putri Ibu Idah. Saya hanya dapat menjawab pertanyaan seputar pilihan kamar, fasilitas, aturan, harga sewa, lokasi, dan survey kosan. Silakan tanyakan hal seputar kosan kami ya! 😊',
                'show_wa_cta' => false,
                'wa_message' => '',
            ];
        }

        // 1B. Koding / Programming / Teknologi Luar
        if (preg_match('/\b(koding|coding|programming|python|javascript|laravel|php|java|c\+\+|html|css|sql|github|git|script|chatgpt|openai|deepseek|gemini|buatkan kode|buatkan skrip)\b/i', $q)) {
            return [
                'answer' => 'Maaf, saya tidak dapat membantu pertanyaan seputar pemrograman atau teknologi umum. Saya khusus melayani informasi seputar Kost Putri Ibu Idah (fasilitas, kamar, aturan, harga, & lokasi).',
                'show_wa_cta' => false,
                'wa_message' => '',
            ];
        }

        // 1C. Politik / Pemerintahan / Hukum Umum
        if (preg_match('/\b(presiden|menteri|pemilu|pilpres|partai|dpr|gubernur|bupati|walikota|pemerintah|uu cipta|hukum pidana)\b/i', $q)) {
            return [
                'answer' => 'Maaf, topik tersebut di luar konteks layanan kami. Saya hanya dapat menjawab seputar informasi Kost Putri Ibu Idah di Ciamis.',
                'show_wa_cta' => false,
                'wa_message' => '',
            ];
        }

        // 1D. Hiburan, Game, Resep Masakan, Terjemahan, dll.
        if (preg_match('/\b(game|gaming|mobile legends|free fire|valorant|dota|chord gitar|lirik lagu|resep masakan|resep rendang|cuaca di|ibu kota negara|terjemahkan|translate)\b/i', $q)) {
            return [
                'answer' => 'Maaf, saya hanya dapat menjawab pertanyaan seputar operasional, fasilitas, aturan, harga, dan lokasi Kost Putri Ibu Idah.',
                'show_wa_cta' => false,
                'wa_message' => '',
            ];
        }

        // 1E. Kata-kata Kasar / Tidak Pantas
        if (preg_match('/\b(anjing|babi|bangsat|kontol|memek|pantek|tolol|goblok|bodoh|asu|bajingan)\b/i', $q)) {
            return [
                'answer' => 'Mohon gunakan bahasa yang sopan. Kami siap membantu memberikan informasi seputar hunian Kost Putri Ibu Idah dengan senang hati.',
                'show_wa_cta' => false,
                'wa_message' => '',
            ];
        }

        // =========================================================================
        // PERIZINAN & KEBIJAKAN KAMAR (Sesuai Perizinan Ibu Idah)
        // =========================================================================

        // 2A. Memaku Dinding / Pasang Gantungan / Modifikasi Dinding / Dekorasi
        if (preg_match('/(memaku|paku|dinding|bor|lubang|tempel|gantungan|wallpaper|cat ulang|dekorasi|pasang figura|pasang cermin|pasang rak)/i', $q)) {
            return [
                'answer' => 'Pemasangan paku atau modifikasi dinding kamar (seperti gantungan baju, rak, cermin, atau hiasan) diperbolehkan asal meminta izin terlebih dahulu kepada Ibu Idah agar kerapian dan struktur dinding tetap terjaga. Untuk gantungan ringan, disarankan menggunakan perekat tempel (magic hook/tape) yang aman untuk cat.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin meminta izin mengenai pemasangan gantungan / dekorasi dinding di kamar.',
            ];
        }

        // 2B. Membawa Barang Elektronik Tambahan / Berdaya Besar
        if (preg_match('/(bawa kulkas|bawa tv|bawa ac|pasang ac|bawa pc|bawa mesin cuci|bawa oven|bawa microwave|bawa dispenser|elektronik tambahan)/i', $q)) {
            return [
                'answer' => 'Barang elektronik standar seperti laptop, smartphone, rice cooker, setrika, dan kipas angin bebas digunakan tanpa biaya tambahan. Namun untuk membawa barang berdaya besar (seperti kulkas pribadi, TV besar, atau pasang AC tambahan), diperbolehkan dengan meminta izin dan konfirmasi terlebih dahulu ke Ibu Idah.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, apakah saya boleh membawa barang elektronik tambahan ke dalam kamar?',
            ];
        }

        // 2C. Membawa Kasur Busa Tambahan / Perabot Sendiri
        if (preg_match('/(bawa kasur|tambah kasur|bawa lemari sendiri|bawa meja sendiri|bawa perabot|tambah furniture)/i', $q)) {
            return [
                'answer' => 'Setiap kamar sudah disediakan kasur siap pakai. Jika Anda ingin membawa kasur busa tambahan atau perabot pribadi (meja/lemari kecil), hal tersebut diperbolehkan asal meminta izin terlebih dahulu ke Ibu Idah agar disesuaikan dengan luas kamar.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan izin membawa kasur/perabot pribadi ke dalam kamar.',
            ];
        }

        // 2D. Kepulangan Malam / Lembur Kerja / Tugas Malam
        if (preg_match('/(pulang larut|pulang malam|lembur|tugas malam|minta kunci gerbang|bawa kunci sendiri)/i', $q)) {
            return [
                'answer' => "Gerbang utama kos normalnya dikunci maksimal pukul {$gateTime}. Namun jika Anda memiliki jadwal lembur kerja, kegiatan kampus, atau tugas kelompok yang mengharuskan pulang larut malam, hal tersebut diperbolehkan dengan izin dan pemberitahuan sebelumnya ke Ibu Idah.",
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin mengonfirmasi terkait kepulangan malam jika ada lembur/tugas.',
            ];
        }

        // 2E. Keluarga / Ibu Kandung / Teman Perempuan Menginap
        if (preg_match('/(orang tua menginap|ibu menginap|keluarga menginap|saudara menginap|teman wanita menginap|teman cewek menginap)/i', $q)) {
            return [
                'answer' => 'Tamu sesama wanita seperti ibu kandung atau saudara perempuan diperbolehkan menginap sementara waktu, asalkan sudah meminta izin dan memberitahu Ibu Idah terlebih dahulu demi ketertiban dan kenyamanan bersama.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin meminta izin untuk keluarga/orang tua yang ingin menginap.',
            ];
        }

        // =========================================================================
        // NUANCED CONTEXT MATCHER (Kenapa/Mengapa, Alasan, Bagaimana, Kapan, Berapa)
        // =========================================================================

        // 3A. Alasan Kenapa Khusus Putri / Kenapa Cuma Wanita Saja / Kenapa Bukan Campur
        if (preg_match('/(kenapa|mengapa|alasan|sebab|tujuan).*(khusus|putri|wanita|cewek|perempuan|cuma wanita|hanya wanita|bukan campur)/i', $q) || preg_match('/(kenapa|mengapa).*(cuma|hanya).*(wanita|putri|cewek|perempuan)/i', $q)) {
            return [
                'answer' => 'Kost Putri Ibu Idah dikhususkan bagi wanita (mahasiswi & karyawati) demi menjamin keamanan maksimal, ketenangan belajar dan beristirahat, serta menjaga privasi penuh bagi seluruh penghuni perempuan. Dengan lingkungan homogen putri, suasana kos menjadi lebih aman, nyaman, tertib, dan bebas dari rasa canggung.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan informasi pendaftaran kos putri.',
            ];
        }

        // 3B. Alasan Kenapa Pria / Laki-laki Tidak Boleh Masuk Kamar
        if (preg_match('/(kenapa|mengapa|alasan).*(pria|laki|cowok|pacar|teman pria|tamu pria).*(tidak boleh|dilarang|gak boleh|masuk)/i', $q)) {
            return [
                'answer' => 'Tamu pria (termasuk teman pria maupun saudara) tidak diperkenankan masuk ke dalam area kamar demi menghormati privasi, kenyamanan, dan aurat seluruh penghuni wanita di dalam kos. Tamu pria tetap dapat bertamu secara sopan di area ruang tamu / teras depan.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan aturan kunjungan tamu.',
            ];
        }

        // 3C. Alasan Kenapa Ada Jam Malam / Kenapa Gerbang Dikunci Jam 22.00
        if (preg_match('/(kenapa|mengapa|alasan).*(jam malam|gerbang|dikunci|tutup|22\.00|pukul 22)/i', $q)) {
            return [
                'answer' => "Aturan penguncian gerbang utama maksimal pukul {$gateTime} diberlakukan demi menjaga keamanan aset kendaraan (motor), mencegah orang luar yang tidak berkepentingan masuk, dan memastikan waktu istirahat malam seluruh penghuni tenang tanpa kebisingan.",
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan kebijakan jam malam jika ada lembur/tugas.',
            ];
        }

        // 3D. Alasan Kenapa Listrik & Air Sudah Termasuk (All-in)
        if (preg_match('/(kenapa|mengapa|alasan).*(listrik|air|termasuk|gratis|all in|token)/i', $q)) {
            return [
                'answer' => 'Biaya sewa dibuat praktis dan transparan (all-in) sudah termasuk listrik dan air bersih agar penghuni tidak perlu pusing membeli token listrik tambahan atau membayar iuran air setiap bulan. Semuanya sudah ditanggung pengelola untuk kemudahan Anda.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 3E. Alasan Kenapa Maksimal 2 Orang Per Kamar
        if (preg_match('/(kenapa|mengapa|alasan).*(maksimal|2 orang|dua orang|berdua|kapasitas)/i', $q)) {
            return [
                'answer' => 'Kapasitas dibatasi maksimal 2 orang per kamar agar ruangan tidak terasa sesak atau pengap, sirkulasi udara kamar tetap terjaga sehat, dan seluruh fasilitas di dalam kamar dapat digunakan secara nyaman oleh penghuni.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan ketentuan sewa kamar 1 atau 2 orang.',
            ];
        }

        // 3F. Alasan Kenapa Hewan Peliharaan Dilarang
        if (preg_match('/(kenapa|mengapa|alasan).*(hewan|kucing|anjing|peliharaan)/i', $q)) {
            return [
                'answer' => 'Hewan peliharaan tidak diperkenankan demi menjaga kebersihan lingkungan kos, mencegah bau serta alergi bulu bagi penghuni lain, dan menjaga ketenangan tanpa gangguan suara hewan di area hunian bersama.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // =========================================================================
        // KNOWLEDGE BASE KOST (Topik Relevan Kost Putri Ibu Idah)
        // =========================================================================

        // 1. Sapaan / Salam / Pembuka
        if (preg_match('/^(halo|hai|hay|hei|pagi|siang|sore|malam|assalamu|permisi|sampurasun|kulonuwun)/i', $q)) {
            return [
                'answer' => 'Halo! Selamat datang di pusat informasi Kost Putri Ibu Idah (Ciamis). Ada yang bisa kami bantu? Anda dapat menanyakan ketersediaan kamar, fasilitas, listrik & air, jam gerbang, atau membuat janji survey.',
                'show_wa_cta' => false,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan informasi seputar kos putri.',
            ];
        }

        // 2. Ucapan Terima Kasih & Penutup
        if (preg_match('/(terima kasih|makasih|thx|thanks|nuhun|matur suwun|oke|ok|sip|siap|baik terima kasih)/i', $q)) {
            return [
                'answer' => 'Sama-sama! Senang bisa membantu Anda. Jika ada pertanyaan lain atau ingin survey lokasi langsung, jangan ragu untuk menghubungi Ibu Idah via WhatsApp.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, terima kasih atas informasinya.',
            ];
        }

        // 3. Khusus Putri / Gender / Penghuni Pria (Apakah kos putri / terima pria?)
        if (preg_match('/(khusus|putri|wanita|cewek|perempuan|pria|cowok|laki|campur|pasutri|keluarga)/i', $q)) {
            if (preg_match('/(pria|cowok|laki|campur|pasutri)/i', $q)) {
                return [
                    'answer' => 'Kost Putri Ibu Idah adalah kos KHUSUS PUTRI (mahasiswi & karyawati). Kos ini BUKAN kos campur dan tidak menerima pasangan/pria untuk menginap di dalam kamar demi kenyamanan dan privasi seluruh penghuni.',
                    'show_wa_cta' => true,
                    'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan informasi pendaftaran kos khusus putri.',
                ];
            }

            return [
                'answer' => 'Ya, Kost Putri Ibu Idah diperuntukkan khusus bagi putri (mahasiswi maupun karyawati). Lingkungan kos aman, tertib, dan nyaman khusus wanita.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin memastikan informasi pendaftaran kos putri.',
            ];
        }

        // 4. Kapasitas / Maksimal Orang Per Kamar
        if (preg_match('/(berapa orang|kapasitas|maksimal|sekamar|sendiri|berdua|isi berapa|tambah orang|bisa berdua|huni)/i', $q)) {
            $maxOcc = $setting?->max_occupants ?: 2;

            return [
                'answer' => "Setiap kamar di Kost Putri Ibu Idah dapat dihuni sendiri (1 orang) maupun berdua (maksimal {$maxOcc} orang per kamar). Suasana tetap nyaman dan tidak berdesakan.",
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan ketentuan sewa kamar untuk 1 atau 2 orang.',
            ];
        }

        // 5. Listrik (Sudah Termasuk) & Penggunaan Elektronik
        if (preg_match('/(listrik|token|pln|daya|biaya listrik|magicom|rice cooker|setrika|laptop|dispenser|elektronik)/i', $q)) {
            return [
                'answer' => 'Ya, listrik sudah termasuk dalam biaya sewa bulanan (tidak perlu beli token listrik terpisah). Penghuni diperbolehkan membawa perlengkapan standar seperti laptop, smartphone, rice cooker, dan kipas angin.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 6. Air Bersih (Sudah Termasuk)
        if (preg_match('/(air|pdam|sumur|kebersihan air|biaya air|air bersih|air lancar|mandi|toren)/i', $q)) {
            return [
                'answer' => 'Penggunaan air harian sudah TERMASUK dalam biaya sewa kos. Sumber air bersih, lancar, dan jernih untuk kebutuhan mandi, mencuci pakaian, dan kebutuhan sehari-hari.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 7. Wi-Fi & Koneksi Internet
        if (preg_match('/(wifi|wi-fi|internet|kuota|jaringan|hotspot|speed|kecepatan)/i', $q)) {
            return [
                'answer' => 'Tersedia koneksi Wi-Fi gratis untuk seluruh penghuni kos, sangat memadai untuk kebutuhan kuliah online, streaming, tugas kuliah, maupun bekerja.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 8. Kasur & Perlengkapan Kamar
        if (preg_match('/(kasur|tempat tidur|bed|springbed|busa|lemari|meja|kursi|perabot|furniture|jendela|ventilasi|fasilitas kamar)/i', $q)) {
            return [
                'answer' => 'Kasur sudah disediakan siap pakai di setiap kamar. Kamar juga memiliki sirkulasi udara dan jendela yang baik agar suasana kamar tetap sejuk dan terang.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan perlengkapan fasilitas yang ada di dalam kamar.',
            ];
        }

        // 9. Kamar Mandi Dalam vs Kamar Mandi Luar (Sharing)
        if (preg_match('/(kamar mandi|wc|toilet|kamar mandi dalam|km dalam|kamar mandi luar|km luar|sharing)/i', $q)) {
            return [
                'answer' => 'Tersedia 2 pilihan tipe kamar: (1) Kamar dengan Kamar Mandi Dalam / Pribadi untuk privasi lebih, dan (2) Kamar dengan Kamar Mandi Sharing / Luar yang bersih dan terawat bersama.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan ketersediaan tipe kamar mandi dalam dan luar.',
            ];
        }

        // 10. Dapur Bersama / Fasilitas Memasak
        if (preg_match('/(dapur|masak|kompor|gas|alat masak|kulkas|wastafel|makan)/i', $q)) {
            return [
                'answer' => 'Tersedia fasilitas Dapur Bersama (sharing) yang dapat digunakan penghuni untuk memasak air, mie, makanan sehari-hari, dan mencuci piring dengan tertib.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 11. Mencuci Baju / Tempat Cuci Pakaian
        if (preg_match('/(cuci baju|mencuci baju|cuci pakaian|mencuci pakaian|tempat cuci|nyuci|mencuci dimana|cuci dimana|mencuci)/i', $q)) {
            return [
                'answer' => 'Untuk mencuci baju, penghuni dapat mencuci di kamar mandi yang tersedia (baik kamar mandi dalam bagi tipe privat, maupun kamar mandi luar bagi tipe sharing) dengan air bersih yang sudah termasuk dalam biaya kos. Setelah dicuci, pakaian dapat dijemur di Area Jemur Pakaian bersama yang terlindung dan terkena sinar matahari.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 12. Area Jemur Pakaian / Menjemur
        if (preg_match('/(jemur|jemuran|area jemur|menjemur|tempat jemur)/i', $q)) {
            return [
                'answer' => 'Tersedia Area Jemur Pakaian bersama yang terlindung dan mendapatkan sinar matahari cukup, sehingga pakaian cepat kering, bersih, dan aman.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 12. Garasi & Parkir Motor / Mobil
        if (preg_match('/(parkir|garasi|motor|kendaraan|mobil|sepeda|helm|tempat parkir)/i', $q)) {
            if (preg_match('/(mobil)/i', $q)) {
                return [
                    'answer' => 'Kost Putri Ibu Idah menyediakan garasi parkir khusus MOTOR. Untuk parkir mobil, mohon konfirmasi ketersediaan tempat ke Ibu Idah via WhatsApp terlebih dahulu.',
                    'show_wa_cta' => true,
                    'wa_message' => 'Halo Ibu Idah, apakah tersedia space parkir untuk mobil?',
                ];
            }

            return [
                'answer' => 'Tersedia Garasi Parkir Motor di dalam area kos yang aman, tertutup gerbang, dan terlindung dari panas maupun hujan.',
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // 13. Jam Malam / Gerbang / Keamanan
        if (preg_match('/(gerbang|jam malam|jam berapa|pukul|kunci|tutup|pulang malam|lembur|tugas|portal|keamanan)/i', $q)) {
            return [
                'answer' => "Demi keamanan dan ketenangan bersama seluruh penghuni, gerbang utama kos dikunci maksimal pukul {$gateTime}. Jika ada keperluan mendesak/tugas kuliah malam, harap mengabari pengelola.",
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan kebijakan jam malam jika ada tugas kuliah.',
            ];
        }

        // 14. Tamu, Kunjungan & Menginap
        if (preg_match('/(tamu|bawa teman|teman menginap|orang tua|ibu menginap|keluarga|pacar|cowok main)/i', $q)) {
            return [
                'answer' => 'Tamu wanita atau orang tua (ibu) boleh berkunjung secara tertib. Tamu pria (termasuk teman/keluarga pria) hanya diperbolehkan di area luar/teras dan dilarang masuk ke dalam kamar penghuni demi menjaga privasi.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan aturan untuk kunjungan keluarga/orang tua.',
            ];
        }

        // 15. Aturan, Larangan, Hewan Peliharaan & Rokok
        if (preg_match('/(aturan|peraturan|tata tertib|kebijakan|syarat|rokok|merokok|vape|alkohol|hewan|kucing|anjing|peliharaan)/i', $q)) {
            if (preg_match('/(hewan|kucing|anjing|peliharaan)/i', $q)) {
                return [
                    'answer' => 'Demi kenyamanan, kebersihan, dan ketenangan seluruh penghuni, hewan peliharaan (seperti kucing/anjing) tidak diperkenankan dibawa ke dalam kos.',
                    'show_wa_cta' => false,
                    'wa_message' => $waMessage,
                ];
            }

            if (preg_match('/(rokok|merokok|vape)/i', $q)) {
                return [
                    'answer' => 'Dilarang merokok atau menggunakan vape di dalam kamar dan area tertutup kos untuk menjaga kesehatan dan kesegaran udara bersama.',
                    'show_wa_cta' => false,
                    'wa_message' => $waMessage,
                ];
            }

            $rules = HouseRule::where('is_active', true)->pluck('title')->implode(', ');
            $ruleSummary = $rules ?: 'Khusus putri, maksimal 2 orang/kamar, menjaga kebersihan & ketenangan bersama, parkir di garasi, dan gerbang dikunci maksimal 22.00 WIB.';

            return [
                'answer' => 'Tata tertib utama Kost Putri Ibu Idah: '.$ruleSummary,
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin menanyakan seputar peraturan kos.',
            ];
        }

        // 16. Harga Sewa, Biaya Bulanan / Tahunan & Pembayaran
        if (preg_match('/(harga|biaya|tarif|sewa|bayar berapa|per bulan|berapaan|pricelist|bulanan|tahunan|semester|dp|uang muka|cara bayar|transfer|cicil)/i', $q)) {
            $roomsWithPrice = Room::where('is_active', true)->whereNotNull('price')->get();
            if ($roomsWithPrice->isNotEmpty()) {
                $priceList = $roomsWithPrice->map(fn ($r) => "{$r->name}: {$r->formatted_price}")->implode(', ');

                return [
                    'answer' => "Biaya sewa: {$priceList} (sudah termasuk kasur, Wi-Fi, listrik, dan air tanpa biaya tersembunyi). Untuk informasi promo, potongan tahunan, atau cara pembayaran silakan hubungi WhatsApp Ibu Idah.",
                    'show_wa_cta' => true,
                    'wa_message' => 'Halo Ibu Idah, boleh tahu rincian harga sewa kamar saat ini?',
                ];
            }

            return [
                'answer' => 'Biaya sewa kos sudah all-in termasuk kasur, Wi-Fi, listrik, dan air tanpa biaya tambahan token/air. Untuk rincian nominal tarif terkini (bulanan/tahunan), silakan langsung chat Ibu Idah via WhatsApp.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, boleh tahu rincian harga sewa kamar saat ini?',
            ];
        }

        // 17. Ketersediaan Kamar / Booking / Masuk Kapan
        if (preg_match('/(ketersediaan|kamar kosong|kosong|ready|masih ada|penuh|booking|pesan kamar|daftar|kapan bisa masuk|kapan buka)/i', $q)) {
            return [
                'answer' => 'Untuk mengecek ketersediaan kamar kosong saat ini dan melakukan booking/tanda jadi, silakan langsung menghubungi Ibu Idah melalui WhatsApp agar segera diamankan.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, apakah saat ini masih ada kamar yang kosong untuk disewa?',
            ];
        }

        // 18. Alamat Lengkap, Lokasi, Patokan & Google Maps
        if (preg_match('/(alamat|lokasi|posisi|daerah|dimana|maps|google maps|patokan|ancer|desa dewasari|cijeungjing|ciamis|kh zakaria|arah|jalan)/i', $q)) {
            return [
                'answer' => "Kost Putri Ibu Idah beralamat di {$address}. Patokan: {$landmark}. Anda juga dapat membuka titik Google Maps presisi melalui menu 'Peta & Lokasi'.",
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, boleh minta share location / patokan detail menuju lokasi kos?',
            ];
        }

        // 19. Dekat Kampus, Sekolah, Rumah Sakit & Tempat Sekitar
        if (preg_match('/(dekat mana|kampus|unigal|universitas galuh|stikes|stikes muhammadiyah|rsud|stasiun|terminal|alun-alun|pasar|minimarket|indomaret|alfamart|akses)/i', $q)) {
            return [
                'answer' => 'Lokasi Kost Putri Ibu Idah strategis di kawasan Cijeungjing/Dewasari Ciamis, memiliki akses jalan yang mudah menuju Universitas Galuh (UNIGAL), STIKes, area perkantoran, fasilitas kesehatan, minimarket, dan pusat kota Ciamis.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, boleh tahu jarak kos dari kampus/tempat kerja saya?',
            ];
        }

        // 20. Survey Kamar / Janji Temu
        if (preg_match('/(survey|survei|lihat kamar|cek lokasi|kapan bisa survey|janji survey|mau datang|lihat langsung)/i', $q)) {
            return [
                'answer' => 'Demi menjaga keamanan dan kenyamanan privasi penghuni wanita, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp ke Ibu Idah.',
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya ingin membuat janji survey untuk melihat kamar kos.',
            ];
        }

        // 21. Kontak WhatsApp Resmi / Nomor Telepon
        if (preg_match('/(kontak|nomor|no hp|no wa|whatsapp|telepon|call|hubungi|ibu idah)/i', $q)) {
            return [
                'answer' => "Nomor WhatsApp resmi Ibu Idah adalah {$formattedPhone} ({$phone}). Silakan klik tombol chat di bawah untuk langsung terhubung.",
                'show_wa_cta' => true,
                'wa_message' => 'Halo Ibu Idah, saya menghubungi dari website Kost Putri Ibu Idah.',
            ];
        }

        // 22. Pencocokan dengan Data FAQ Database Dinamis
        $matchedFaq = Faq::where('is_active', true)
            ->get()
            ->first(function ($faq) use ($q) {
                $faqQ = mb_strtolower($faq->question);
                similar_text($faqQ, $q, $percent);

                return $percent > 60;
            });

        if ($matchedFaq) {
            return [
                'answer' => $matchedFaq->answer,
                'show_wa_cta' => false,
                'wa_message' => $waMessage,
            ];
        }

        // =========================================================================
        // GUARDRAIL 2: Verifikasi Relevansi Konteks Kosan
        // =========================================================================
        $hasKostContext = (bool) preg_match('/(kost|kos|kamar|sewa|huni|tipe|fasilitas|listrik|air|wifi|kasur|lemari|meja|kursi|dapur|jemur|cuci|parkir|garasi|gerbang|kunci|tamu|aturan|putri|ibu idah|pemilik|pengelola|dewasari|cijeungjing|ciamis|kampus|unigal|stikes|alamat|lokasi|harga|biaya|tarif|bayar|dp|booking|pesan|survey|survei|kontak|wa|telepon|masuk|ketersediaan|kosong|ready|foto|kebersihan|lingkungan|aman|nyaman|dinding|paku|memaku|tempel|gantungan|bor|cat|elektronik|kulkas|tv|ac|perabot|bawa|izin|boleh|menginap|tukar|pindah)/i', $q);

        // Jika pertanyaan SAMA SEKALI tidak berkaitan dengan kosan
        if (! $hasKostContext) {
            return [
                'answer' => 'Maaf, saya adalah asisten informasi khusus Kost Putri Ibu Idah. Saya hanya dapat menjawab pertanyaan seputar kamar, fasilitas, aturan, harga sewa, lokasi, dan cara survey kosan. Silakan tanyakan hal seputar kosan kami ya! 😊',
                'show_wa_cta' => false,
                'wa_message' => '',
            ];
        }

        // Jika pertanyaan relevan dengan kos tetapi detailnya sangat spesifik
        return [
            'answer' => 'Pertanyaan Anda seputar kos sangat spesifik. Untuk informasi lebih mendalam dan konfirmasi langsung, silakan hubungi Ibu Idah via WhatsApp di '.$formattedPhone.'.',
            'show_wa_cta' => true,
            'wa_message' => $waMessage,
        ];
    }
}
