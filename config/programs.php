<?php

/**
 * Training Alat Berat — Program Configuration
 *
 * Single source of truth for all heavy-equipment operator training and SIO programs.
 * Used by ProgramController, homepage, regional pages, and the article generator.
 *
 * Regulatory References:
 *   - UU No. 1 Tahun 1970 tentang Keselamatan Kerja
 *   - Permenaker No. 8 Tahun 2020 tentang Keselamatan dan Kesehatan Kerja Pesawat Angkat dan Pesawat Angkut
 *   - Permenaker No. 38 Tahun 2016 tentang K3 Pesawat Tenaga dan Produksi
 *
 * Content verified: All 9 mandatory SIO heavy-equipment categories preserved exactly.
 * Unverified claims (jadwal tetap, biaya instan, jaminan kelulusan mutlak) deliberately omitted.
 */

return [

    // ─────────────────────────────────────────────────────────────────────────
    // 9 MANDATORY SIO HEAVY EQUIPMENT SERVICE CATEGORIES
    // ─────────────────────────────────────────────────────────────────────────

    'sio-excavator' => [
        'slug'              => 'sio-excavator',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Excavator',
        'title'             => 'SIO Excavator',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Excavator | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Program training operator dan sertifikasi SIO Excavator resmi Kemnaker RI. Pembinaan teknik penggalian, loading, stabilitas lereng, dan keselamatan kerja.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Excavator',
        'hero_subheading'   => 'Pembinaan teknis operasional dan persiapan sertifikasi Surat Izin Alat / Lisensi K3 Operator Excavator sesuai Permenaker No. 8/2020 untuk sektor konstruksi, pertambangan, dan infrastruktur.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Excavator.',
        'introduction'      => 'Training dan sertifikasi SIO Excavator membekali operator dengan pemahaman komprehensif mengenai teknik penggalian (excavation), pemuatan material (loading), manuver aman di lereng, dan inspeksi harian (pre-operation check). Program ini mempersiapkan peserta menghadapi uji kompetensi dan verifikasi persyaratan penerbitan lisensi K3/SIO sesuai ketentuan Kementerian Ketenagakerjaan RI.',
        'target_audience'   => [
            'Operator excavator di sektor konstruksi, pertambangan, perkebunan, dan infrastruktur.',
            'Calon operator alat berat yang ingin meningkatkan kualifikasi dan legalitas kompetensi resmi.',
            'Supervisor lapangan, mandor, dan staf HSE penanggung jawab keselamatan pesawat angkat & angkut.',
            'Perusahaan kontraktor yang ingin memastikan kepatuhan regulasi K3 dan pemenuhan izin operator.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Operasional Penggalian & Pemuatan Aman',
                'description' => 'Menerapkan teknik penggalian terkontrol, pencegahan undercutting, dan pemuatan material ke dump truck dengan aman tanpa membahayakan kabin.',
            ],
            [
                'title'       => 'Pengawasan Stabilitas Lereng & Swing Radius',
                'description' => 'Menilai daya dukung tanah tempat berpijak, menjaga jarak aman dari tepi tebing atau galian, serta mengamankan zona putaran swing unit.',
            ],
            [
                'title'       => 'Pemeriksaan Harian (P2H) & Perawatan Ringan',
                'description' => 'Melaksanakan checklist pra-operasi pada sistem hidrolik, track undercarriage, pin bucket, oli mesin, dan indikator keselamatan kabin.',
            ],
        ],
        'curriculum_topics' => [
            'Dasar Hukum K3 Pesawat Angkat dan Angkut (UU No. 1/1970 & Permenaker No. 8/2020)',
            'Anatomi dan Prinsip Kerja Sistem Mekanikal & Hidrolik Excavator',
            'Prosedur Pemeriksaan Pra-Operasi Harian (P2H) dan Pengujian Fungsi Kontrol',
            'Teknik Penggalian Aman (Excavation, Trenching, dan Sloping)',
            'Prosedur Pemuatan Material (Loading) Efisien dan Manajemen Swing Radius',
            'Stabilitas Unit, Daya Dukung Tanah, dan Pengoperasian di Kontur Miring',
            'Pencegahan Bahaya Kontak Utilitas Bawah Tanah (Kabel Listrik, Pipa Gas/Air)',
            'Prosedur Tanggap Darurat, Pemadaman Api, dan Prosedur Parkir Aman',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Jadwal pembinaan reguler dan in-house training perusahaan dikonfirmasi melalui representasi resmi.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Durasi materi teori K3 dan praktik lapangan mengacu pada standar kurikulum Kemnaker RI.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Biaya pembinaan dan sertifikasi transparan. Hubungi kami untuk penawaran proposal resmi.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'Fotokopi KTP, ijazah terakhir, surat keterangan sehat, dan pasfoto sesuai ketentuan sertifikasi.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Sertifikasi kompetensi dan Surat Izin Alat (SIO/Lisensi K3) diterbitkan oleh Kementerian Ketenagakerjaan RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Apa itu SIO Excavator dan dasar hukum kewajibannya?',
                'answer'   => 'SIO (Surat Izin Alat) atau Lisensi K3 Operator Excavator adalah surat tanda kewenangan legal yang membuktikan kompetensi operator dalam mengoperasikan excavator secara aman, sesuai UU No. 1/1970 dan Permenaker No. 8/2020.',
            ],
            [
                'question' => 'Apakah mengikuti pelatihan langsung menjamin terbitnya SIO?',
                'answer'   => 'Pelatihan adalah pembinaan kompetensi teknis dan persiapan uji. Penerbitan SIO/Lisensi K3 merupakan keputusan administratif dan hasil evaluasi resmi dari instansi ketenagakerjaan yang berwenang.',
            ],
            [
                'question' => 'Apa saja materi utama yang dipelajari pada pelatihan operator excavator?',
                'answer'   => 'Materi mencakup regulasi K3, pengenalan komponen hidrolik, pemeriksaan harian P2H, teknik penggalian dan trenching yang aman, pemuatan ke dump truck, stabilitas di lereng, serta simulasi praktik operasi.',
            ],
        ],
    ],

    'sio-wheel-loader' => [
        'slug'              => 'sio-wheel-loader',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Wheel Loader',
        'title'             => 'SIO Wheel Loader',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Wheel Loader | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Pelatihan operator dan sertifikasi SIO Wheel Loader resmi Kemnaker RI. Penguasaan material handling, pemuatan bucket, dan keselamatan manuver stockpile.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Wheel Loader',
        'hero_subheading'   => 'Pembinaan kompetensi operator Wheel Loader dalam penanganan material, pemuatan stockpile, dan manuver aman di area industri, quarry, serta batching plant.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Wheel Loader.',
        'introduction'      => 'Wheel Loader memegang peranan krusial dalam pemindahan material curah pada tambang, batching plant, pelabuhan, dan konstruksi. Training ini fokus pada teknik pengisian bucket (penetration, crowding, rollback), kestabilan articulated frame saat berbelok dengan muatan penuh, dan prosedur keselamatan kerja K3 operator.',
        'target_audience'   => [
            'Operator Wheel Loader di stockpile batubara, tambang agregat, quarry, dan pabrik semen.',
            'Tenaga kerja konstruksi jalan dan jembatan yang menangani batching plant atau asphalt mixing plant.',
            'Calon operator alat berat yang ingin memiliki lisensi K3 resmi Kemnaker.',
            'Personel HSE industri manufaktur dan pergudangan material curah.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Material Handling & Pemuatan Efisien',
                'description' => 'Mengoperasikan bucket untuk memuat material curah ke hopper atau dump truck dengan siklus loading optimal (metode V-shape loading).',
            ],
            [
                'title'       => 'Pengendalian Stabilitas Articulated Frame',
                'description' => 'Menjaga keseimbangan pusat gravitasi unit berartikulasi saat berbelok dan melaju membawa beban berat di medan licin.',
            ],
            [
                'title'       => 'Inspeksi Ban, Rem, & Hidrolik Angkat',
                'description' => 'Memeriksa tekanan ban berukuran besar, sistem pengereman udara/hidrolik, kebocoran lift cylinder, dan fungsi safety pin.',
            ],
        ],
        'curriculum_topics' => [
            'Regulasi K3 Keselamatan Pesawat Angkat dan Angkut (Permenaker No. 8/2020)',
            'Prinsip Kerja Wheel Loader, Transmisi Powershift, dan Sambungan Artikulasi',
            'Pemeriksaan Pra-Operasi (P2H) Sistem Kemudi, Rem, dan Sistem Hidrolik',
            'Teknik Pengisian Bucket Optimal (Penetration, Crowding, dan Rollback)',
            'Pola Pemuatan Efisien (V-Cycle / Y-Cycle) ke Truk dan Hopper',
            'Manajemen Kestabilan Muatan di Tanjakan dan Jalan Bergelombang',
            'Komunikasi Sinyal Tangan dan Pencegahan Bahaya Tabrakan di Area Sempit',
            'Prosedur Tanggap Darurat dan Parkir Aman Unit Wheel Loader',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Jadwal kelas reguler dan in-house training perusahaan disesuaikan dengan kebutuhan pemohon.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Kombinasi teori regulasi K3 dan praktik pengoperasian sesuai silabus Kemnaker RI.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Informasi pembiayaan pelatihan dan sertifikasi dapat diperoleh melalui konsultasi.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, ijazah, surat keterangan sehat, dan dokumen administratif pendukung lainnya.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Uji kompetensi dan penerbitan SIO/Lisensi K3 operator di bawah regulasi Kemnaker RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa operator Wheel Loader wajib memiliki SIO?',
                'answer'   => 'Sesuai Permenaker No. 8/2020, alat berat angkat-angkut hanya boleh dioperasikan oleh tenaga kerja yang telah dibina dan memiliki lisensi K3 resmi untuk mencegah insiden rollover dan kecelakaan kerja.',
            ],
            [
                'question' => 'Apa risiko keselamatan terbesar pada pengoperasian Wheel Loader?',
                'answer'   => 'Risiko utama mencakup unit terbalik (rollover) akibat manuver belok tajam saat bucket terangkat tinggi dengan beban penuh, rem blong di turunan, dan blind spot pada pekerja sekitar.',
            ],
        ],
    ],

    'sio-bulldozer' => [
        'slug'              => 'sio-bulldozer',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Bulldozer',
        'title'             => 'SIO Bulldozer',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Bulldozer | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Program training operator dan sertifikasi SIO Bulldozer resmi Kemnaker RI. Teknik pendorongan tanah, perataan kontur, ripping, dan keselamatan lereng.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Bulldozer',
        'hero_subheading'   => 'Pembinaan teknis operasional Bulldozer untuk pekerjaan perataan tanah, pembukaan lahan, dan pendorongan material berat dengan standar keselamatan kerja tinggi.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Bulldozer.',
        'introduction'      => 'Bulldozer adalah alat utama pekerjaan pemindahan tanah mekanis (earthmoving) dan pembukaan lahan (land clearing). Program ini mempersiapkan operator Bulldozer untuk menguasai teknik pendorongan (pushing), perataan tanah (spreading), ripping pada tanah keras, serta pengendalian crawler undercarriage di lereng curam secara aman.',
        'target_audience'   => [
            'Operator Bulldozer di sektor pertambangan, perkebunan kelapa sawit, kehutanan, dan konstruksi sipil.',
            'Operator crawler tractor yang ingin meng-upgrade sertifikasi ke SIO resmi Kemnaker.',
            'Pengawas lapangan earthmoving dan safety officer di area penimbunan (disposal/dumping).',
            'Pencari kerja yang ingin berkarir sebagai operator alat berat profesional berlisensi.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Pendorongan & Perataan Tanah Presisi',
                'description' => 'Mengendalikan blade untuk mendorong volume material optimal, mengatur kemiringan cutting edge, dan menjaga kerataan permukaan dorong.',
            ],
            [
                'title'       => 'Manuver Aman pada Lereng & Kontur Curam',
                'description' => 'Mengoperasikan dozer pada batas kemiringan aman, menghindari traksi melintang berbahaya, dan menerapkan teknik slot dozing.',
            ],
            [
                'title'       => 'Operasi Ripping & Pemeliharaan Undercarriage',
                'description' => 'Mengoperasikan shank ripper pada batuan dengan sudut penetrasi tepat serta memeriksa kekencangan track dan roller.',
            ],
        ],
        'curriculum_topics' => [
            'Peraturan Perundangan K3 Alat Berat dan Tanggung Jawab Hukum Operator',
            'Konstruksi Dozer: Mesin Diesel, Torque Converter, Undercarriage, dan Blade Control',
            'Pemeriksaan Harian Pra-Operasi (P2H) dan Deteksi Kebocoran Hidrolik/Final Drive',
            'Teknik Dozing: Slot Dozing, Side-by-Side Dozing, dan Downhill Dozing',
            'Operasi Ripper pada Tanah Keras dan Pengaturan Kedalaman Penetrasi Shank',
            'Batas Kemiringan Maksimal dan Pencegahan Unit Terguling (ROPS/FOPS Safety)',
            'Prosedur Tanggap Darurat Kebakaran Mesin dan Penyelamatan Diri di Area Tambang',
            'Prosedur Parkir Aman: Menurunkan Blade dan Ripper ke Tanah Serta Kunci Transmisi',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Konsultasikan jadwal pelaksanaan batch terbaru melalui kontak WhatsApp.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Durasi mencakup pembelajaran teori keselamatan kerja dan praktik lapangan.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Biaya kompetitif sesuai ketentuan penyelenggara resmi. Dapatkan penawaran paket in-house.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'Identitas resmi KTP, ijazah terakhir, pasfoto, dan kesiapan mengikuti pembinaan.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Sertifikat dan Lisensi K3 diterbitkan oleh Kemnaker RI melalui mekanisme resmi.'],
        ],
        'faqs' => [
            [
                'question' => 'Apa perbedaan antara training operator dozer dan penerbitan SIO dozer?',
                'answer'   => 'Training operator adalah proses pembinaan kemampuan dan pengetahuan K3, sedangkan SIO adalah lisensi legal yang diterbitkan Kemnaker setelah peserta memenuhi syarat administratif dan lulus evaluasi.',
            ],
            [
                'question' => 'Mengapa teknik slot dozing penting dipelajari oleh operator?',
                'answer'   => 'Slot dozing meningkatkan efisiensi dorong dengan memanfaatkan dinding tanah samping untuk mencegah tumpahan material di ujung blade, sekaligus menjaga arah dorong tetap lurus dan stabil.',
            ],
        ],
    ],

    'sio-compactor' => [
        'slug'              => 'sio-compactor',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Compactor',
        'title'             => 'SIO Compactor',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Compactor | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Pelatihan operator dan pengurusan SIO Compactor resmi Kemnaker RI. Standar keselamatan kerja pemadatan tanah, fondasi jalan, dan ground preparation.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Compactor',
        'hero_subheading'   => 'Pembinaan kompetensi operator Compactor dalam pemadatan tanah dasar, sub-base jalan, dan perataan permukaan fondasi konstruksi dengan standar K3.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Compactor.',
        'introduction'      => 'Compactor (Road Roller / Tamping Roller) sangat menentukan kepadatan dan daya dukung tanah pada pekerjaan jalan raya, landasan pacu, dan tapak struktur gedung. Pelatihan ini melatih operator memahami pola lintasan pemadatan (rolling passes), pencegahan amblesan di tepi lereng, dan keselamatan operasional drum statis maupun tamping roller.',
        'target_audience'   => [
            'Operator alat pemadat tanah (roller/compactor) di proyek jalan tol, bandara, dan perumahan.',
            'Pekerja konstruksi sipil yang mengoperasikan pneumatic roller, tandem roller, atau sheepfoot roller.',
            'Calon operator pemadat tanah yang memerlukan Surat Izin Alat (SIO) resmi Kemnaker.',
            'Pelaksana jalan dan HSE officer proyek infrastruktur sipil.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Pola Lintasan Pemadatan Teratur',
                'description' => 'Menerapkan pola passes dengan overlap drum yang konsisten untuk mencapai kepadatan seragam tanpa merusak material urukan.',
            ],
            [
                'title'       => 'Pencegahan Bahaya Amblesan di Tepi Tanggul',
                'description' => 'Mengatur jarak aman drum dari tepi lereng jalan timbunan guna menghindari risiko amblas atau unit tergelincir.',
            ],
            [
                'title'       => 'Pemeriksaan Sistem Kemudi, Rem, & Scraper',
                'description' => 'Melakukan pengecekan rutin bilah pembersih drum (scraper), nozel semprotan air, serta rem parkir hidrolik.',
            ],
        ],
        'curriculum_topics' => [
            'Regulasi K3 Keselamatan Operasional Alat Berat Konstruksi Jalan',
            'Karakteristik Jenis Compactor: Static Smooth Drum, Tandem, Pneumatic, dan Tamping Roller',
            'Pemeriksaan Harian (P2H) Sistem Pengereman, Kemudi Artikulasi, dan Sistem Hidrolik',
            'Prinsip Mekanika Tanah: Kadar Air Optimum dan Penentuan Jumlah Lintasan Pemadatan',
            'Pola Lintasan Operasi (Rolling Passes) Efektif dan Pengaturan Kecepatan Maju-Mundur',
            'Keselamatan Bekerja di Bahu Jalan, Area Sempit, dan Jalur Lalu Lintas Aktif',
            'Prosedur Parkir Aman di Permukaan Datar dengan Chock / Pengganjal Roda',
            'Tindakan Tanggap Darurat saat Unit Mengalami Kegagalan Pengereman di Tanjakan',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Jadwal fleksibel untuk pelatihan reguler maupun in-house perusahaan konstruksi.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Mengacu pada jam pelajaran standar pelatihan keselamatan kerja alat berat.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Hubungi representasi resmi kami untuk rincian pembiayaan dan fasilitas pelatihan.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, ijazah pendidikan, surat keterangan sehat dokter, dan pasfoto.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Penerbitan SIO/Lisensi K3 operator compactor melalui jalur resmi Kemnaker RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa pemadatan tepi jalan membutuhkan keahlian khusus operator?',
                'answer'   => 'Karena tanah di tepi timbunan memiliki daya dukung lateral yang rendah. Operator yang tidak terlatih berisiko tinggi mengalami guling unit saat drum menginjak tanah yang belum stabil.',
            ],
            [
                'question' => 'Apakah SIO Compactor berlaku untuk semua jenis compactor?',
                'answer'   => 'Lisensi K3 mencakup kategori pesawat angkat-angkut terkait alat pemadat tanah sesuai kelas dan spesifikasi yang diverifikasi pada sertifikat kompetensi resmi.',
            ],
        ],
    ],

    'sio-motor-grader' => [
        'slug'              => 'sio-motor-grader',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Motor Grader',
        'title'             => 'SIO Motor Grader',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Motor Grader | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Training operator dan sertifikasi SIO Motor Grader resmi Kemnaker RI. Teknik perataan presisi, pembentukan elevasi jalan, crowning, dan ditching.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Motor Grader',
        'hero_subheading'   => 'Pembinaan keahlian operator Motor Grader untuk pekerjaan grading presisi, pembentukan kemiringan lereng (sloping), dan pemeliharaan jalan tambang/konstruksi.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Motor Grader.',
        'introduction'      => 'Motor Grader menuntut presisi tinggi dalam memadukan pergerakan moldboard (blade), artikulasi rangka (frame articulation), dan sudut kemiringan roda depan (wheel lean). Program ini melatih operator menguasai leveling permukaan, pembentukan kemiringan melintang jalan (crowning), pembuatan saluran air (ditching), dan pencegahan kecelakaan di jalan angkut.',
        'target_audience'   => [
            'Operator Motor Grader di proyek pembangunan jalan tol, bandara, dan kawasan industri.',
            'Operator maintenance jalan tambang (haul road maintenance) sektor batubara dan mineral.',
            'Calon operator profesional yang ingin memiliki Lisensi K3 resmi Kemnaker RI.',
            'Supervisor jalan dan safety inspector yang mengawasi operasional grading.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Grading Presisi & Leveling Permukaan',
                'description' => 'Mengatur sudut potong blade, pitch, dan rotasi circle untuk meratakan agregat dan tanah sesuai elevasi desain teknis.',
            ],
            [
                'title'       => 'Pembentukan Parit & Kemiringan Melintang',
                'description' => 'Melakukan ditching dan sloping tepi jalan dengan mempertahankan traksi roda dan kestabilan unit tanpa merusak struktur tebing.',
            ],
            [
                'title'       => 'Perawatan Rutin Jalan Angkut Tambang',
                'description' => 'Menghilangkan gelombang jalan (corrugation) dan lubang di haul road guna memperlancar lalu lintas dump truck.',
            ],
        ],
        'curriculum_topics' => [
            'Dasar Regulasi K3 Pengoperasian Alat Berat dan Tanggung Jawab Hukum Operator',
            'Komponen Motor Grader: Circle Drive, Moldboard Lift, Articulation, dan Front Wheel Lean',
            'Pemeriksaan Pra-Operasi Harian (P2H) Sistem Kemudi Ganda dan Hidrolik Kontrol',
            'Teknik Leveling dan Spreading Agregat dengan Moldboard Mengambang (Float Mode)',
            'Teknik Ditching (Pembuatan Parit) dan High Bank Sloping yang Aman',
            'Pemanfaatan Artikulasi Rangka untuk Manuver di Tikungan Sempit',
            'Keselamatan Operasi di Jalan Angkut Padat Armada Hauler dan Penggunaan Radio Komunikasi',
            'Prosedur Shutdown dan Parkir: Menurunkan Moldboard Rata ke Permukaan Tanah',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Konsultasikan batch reguler atau pengajuan in-house training perusahaan Anda.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Kombinasi pendalaman teori K3 dan praktik pengoperasian grader.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Hubungi kami untuk penawaran biaya resmi dan rincian fasilitas.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, ijazah pendidikan, pasfoto, dan kelengkapan administrasi lainnya.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Sertifikat kompetensi dan SIO diterbitkan oleh Kemnaker RI sesuai regulasi resmi.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa pengoperasian Motor Grader dianggap paling kompleks di antara alat berat?',
                'answer'   => 'Karena operator grader harus mengkoordinasikan lebih dari enam tuas kontrol hidrolik secara simultan, mengatur wheel lean untuk melawan gaya dorong samping blade, dan mempertahankan elevasi milimeter.',
            ],
            [
                'question' => 'Apa peran Motor Grader dalam keselamatan operasional jalan tambang?',
                'answer'   => 'Grader menjaga kerataan haul road dan menghilangkan tumpahan batuan. Jalan tambang yang terawat mencegah ban dump truck robek, suspensi patah, dan insiden terguling.',
            ],
        ],
    ],

    'sio-rig-drilling' => [
        'slug'              => 'sio-rig-drilling',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Rig Drilling',
        'title'             => 'SIO Rig Drilling',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Rig Drilling | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Pelatihan operator dan sertifikasi SIO Rig Drilling resmi Kemnaker RI. Keselamatan pengeboran pondasi tiang pancang, borehole, dan kestabilan menara bor.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Rig Drilling',
        'hero_subheading'   => 'Pembinaan keselamatan kerja dan sertifikasi operator alat bor (Rig Drilling) untuk pekerjaan fondasi tiang bor (bored pile), geoteknik, dan eksplorasi.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Rig Drilling.',
        'introduction'      => 'Operasional Rig Drilling (Alat Bor Fondasi / Eksplorasi) menuntut disiplin K3 tinggi karena melibatkan menara bor tinggi (mast), torsi putaran besar, tekanan hidrolik ekstrem, dan penanganan batang bor berat. Training ini membekali operator dengan pemahaman stabilitas penegakan mast, analisis daya dukung tanah untuk outrigger, serta prosedur aman pengeboran bored pile.',
        'target_audience'   => [
            'Operator mesin bor fondasi (hydraulic drilling rig, bored pile) proyek jembatan dan gedung bertingkat.',
            'Operator rig eksplorasi geoteknik, survei tanah, dan penambangan mineral.',
            'Calon operator alat bor yang ingin melengkapi lisensi resmi K3 Kemnaker.',
            'Safety engineer dan supervisor pekerjaan geoteknik serta fondasi dalam.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Pengeboran Terkontrol & Manajemen Torsi',
                'description' => 'Mengoperasikan rotary drive head, mengatur kecepatan putar dan penetrasi kelly bar tanpa membebani mast secara berlebihan.',
            ],
            [
                'title'       => 'Penegakan Mast & Pengawasan Stabilitas Unit',
                'description' => 'Mengawasi tegak lurus menara (verticality), penggunaan matting crawler, dan perhitungan beban angin maksimal.',
            ],
            [
                'title'       => 'Pencegahan Bahaya Bagian Berputar & Tekanan Tinggi',
                'description' => 'Menjaga zona aman putaran drill pipe, memeriksa selang oli hidrolik bertekanan tinggi, dan memasang safety pin interlocking.',
            ],
        ],
        'curriculum_topics' => [
            'Peraturan K3 Pengeboran dan Pekerjaan Fondasi Dalam (UU No. 1/1970 & Permenaker No. 8/2020)',
            'Konstruksi Rig Drilling: Mast, Rotary Drive, Winch Utama/Auxiliary, Kelly Bar, dan Undercarriage',
            'Pemeriksaan Harian (P2H) Wire Rope, Silinder Mast, dan Deteksi Kebocoran Fluida',
            'Prosedur Setup Alat: Uji Daya Dukung Tanah, Pemasangan Steel Mat, dan Leveling Unit',
            'Teknik Pengeboran Aman pada Berbagai Lapisan Tanah (Tanah Lunak, Pasir Berair, Batuan)',
            'Pencegahan Bahaya Runtuhan Lubang Bor (Borehole Collapse) dan Bahaya Gas Beracun',
            'Komunikasi Sinyal dengan Rigger / Pekerja Bantu dan Manajemen Zona Terlarang (Red Zone)',
            'Prosedur Tanggap Darurat Mast Collapse, Sambaran Petir, dan Evakuasi Rig',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Jadwal batch disesuaikan dengan ketersediaan sarana praktik dan peserta.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Mencakup pendalaman teori keselamatan fondasi dan praktik pengoperasian rig.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Dapatkan rincian proposal biaya dan penawaran in-house melalui konsultasi resmi.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, ijazah terakhir, pasfoto, dan surat keterangan sehat dari dokter.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Sertifikasi kompetensi dan Surat Izin Alat (SIO) diterbitkan oleh Kemnaker RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa kestabilan tanah tempat berpijak sangat krusial bagi rig drilling?',
                'answer'   => 'Karena titik pusat gravitasi rig drilling berada pada posisi tinggi saat mast berdiri tegak. Penurunan tanah beberapa sentimeter saja dapat mengakibatkan menara miring drastis dan roboh.',
            ],
            [
                'question' => 'Apakah sertifikasi SIO Rig Drilling mencakup semua jenis mesin bor?',
                'answer'   => 'Sertifikat dan lisensi dikeluarkan dengan spesifikasi kapasitas alat dan tipe pesawat tenaga/angkat sesuai uji kompetensi resmi yang dilaksanakan.',
            ],
        ],
    ],

    'sio-telehandler' => [
        'slug'              => 'sio-telehandler',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Telehandler',
        'title'             => 'SIO Telehandler',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Telehandler | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Program training operator dan sertifikasi SIO Telehandler Kemnaker RI. Pemahaman load chart, kapasitas angkat teleskopik, boom reach, dan stabilitas outrigger.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Telehandler',
        'hero_subheading'   => 'Pembinaan kompetensi operator Telescopic Handler dalam penanganan material angkat tinggi, pembacaan grafik beban (load chart), dan kestabilan boom.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Telehandler.',
        'introduction'      => 'Telescopic Handler (Telehandler) memadukan kemampuan forklift dan mobile crane, menjadikannya sangat fleksibel namun memiliki risiko tip-over tinggi. Program ini mengajarkan operator memahami grafik kapasitas beban (load capacity chart), sudut boom, jangkauan horizontal (reach), pengoperasian stabilizer, dan indikator momen beban longitudinal (LMI).',
        'target_audience'   => [
            'Operator Telehandler di proyek gedung bertingkat, industri migas, dan galangan kapal.',
            'Pekerja pergudangan logistik pelabuhan dan pabrik fabrikasi baja.',
            'Operator forklift yang ingin meningkatkan lisensi K3 ke jenjang telescopic handler.',
            'Supervisor lifting dan safety officer yang mengawasi pekerjaan pengangkatan material.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Perhitungan Kapasitas Angkat & Load Chart',
                'description' => 'Membaca grafik kapasitas beban dengan cermat berdasarkan ekstensi boom teleskopik, radius jangkauan, dan sudut kemiringan.',
            ],
            [
                'title'       => 'Pengendalian Stabilitas Boom & Outrigger',
                'description' => 'Memasang stabilizer/outrigger secara benar pada landasan kokoh sebelum mengekstensikan boom membawa beban berat.',
            ],
            [
                'title'       => 'Manuver Travelling dengan Beban Aman',
                'description' => 'Menerapkan prosedur membawa muatan pada posisi boom terendah dan fork mendongak untuk mencegah unit terbalik ke depan.',
            ],
        ],
        'curriculum_topics' => [
            'Regulasi K3 Pesawat Angkat dan Angkut untuk Peralatan Telescopic Handler',
            'Konstruksi Telehandler: Boom Teleskopik, Silinder Kompensasi, Outrigger, dan Steering Mode',
            'Pemeriksaan Harian (P2H) Selang Hidrolik, Rantai Boom Extension, dan Sensor Beban (LMI)',
            'Prinsip Titik Berat Beban, Segitiga Stabilitas, dan Dinamika Pengangkatan di Ketinggian',
            'Cara Membaca dan Menerapkan Load Capacity Chart untuk Berbagai Attachment (Fork, Bucket, Jib Hook)',
            'Prosedur Pengangkatan Aman Menggunakan Outrigger / Stabilizer',
            'Prosedur Travelling Aman: Pemilihan Mode Kemudi (2-Wheel, 4-Wheel, Crab Steering)',
            'Tindakan Tanggap Darurat saat Indikator Bahaya Tilt Sensor / Overload Berbunyi',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Konsultasikan ketersediaan jadwal batch pembinaan operator telehandler.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Sesuai kurikulum resmi Kemnaker RI meliputi teori keselamatan dan uji praktik.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Hubungi kami untuk penawaran resmi pelatihan dan biaya pengurusan sertifikasi.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, ijazah pendidikan, pasfoto, dan kesiapan mengikuti prosedur asesmen.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Sertifikat dan Lisensi K3 dikeluarkan secara sah oleh Kementerian Ketenagakerjaan RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa kapasitas angkat telehandler berubah drastis saat boom diekstensikan ke depan?',
                'answer'   => 'Karena semakin panjang boom dijulurkan ke depan, lengan momen beban (load moment arm) semakin besar, sehingga kapasitas angkat yang diizinkan menurun tajam agar alat tidak terbalik ke depan.',
            ],
            [
                'question' => 'Apa fungsi sistem Longitudinal Load Moment Indicator (LMI)?',
                'answer'   => 'LMI adalah sensor keselamatan otomatis yang memantau stabilitas gandar belakang telehandler dan memberi peringatan suara serta mengunci pergerakan ekstensi boom jika unit mendekati ambang bahaya terguling.',
            ],
        ],
    ],

    'sio-vibro' => [
        'slug'              => 'sio-vibro',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Vibro Roller',
        'title'             => 'SIO Vibro',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Vibro | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Pelatihan operator dan sertifikasi SIO Vibro Roller sesuai regulasi Kemnaker RI. Prosedur pemadatan getar, frekuensi vibrasi, dan keselamatan kerja.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Vibro',
        'hero_subheading'   => 'Pembinaan teknis keselamatan operator Vibratory Roller untuk pemadatan tanah subgrade, perkerasan granular, dan konstruksi bendungan/timbunan.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Vibro.',
        'introduction'      => 'Vibratory Roller (Vibro) memadatkan lapisan tanah dan material agregat secara cepat menggunakan gaya dinamis putaran poros eksentrik. Pengoperasian getaran di dekat struktur bangunan, lereng rawan longsor, atau jembatan menuntut kewaspadaan tinggi. Program ini mengajarkan pengaturan frekuensi getar, teknik pemadatan lereng, dan pencegahan paparan getaran berlebih.',
        'target_audience'   => [
            'Operator Vibratory Roller di proyek jalan tol, reklamasi, bendungan, dan lapangan terbang.',
            'Pekerja pemadatan subgrade tanah dan pondasi agregat kelas A/B.',
            'Calon operator alat pemadat getar yang membutuhkan Lisensi K3 resmi Kemnaker.',
            'Mandor tanah dan pengawas K3 proyek pemindahan tanah skala besar.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Pengaturan Frekuensi & Amplitudo Getaran',
                'description' => 'Memilih mode amplitudo tinggi atau rendah sesuai tebal lapisan dan jenis tanah untuk mencegah fenomena de-kompaksi.',
            ],
            [
                'title'       => 'Pencegahan Bahaya Getaran pada Struktur Sekitar',
                'description' => 'Mematikan sistem vibrasi ketika mendekati jembatan, retaining wall, pipa bawah tanah, atau lereng tebing rawan runtuh.',
            ],
            [
                'title'       => 'Pemeriksaan Damper Karet & Poros Eksentrik',
                'description' => 'Memeriksa keausan rubber shock absorber drum, kebocoran oli vibrator pod, dan kekencangan baut isolator.',
            ],
        ],
        'curriculum_topics' => [
            'Regulasi K3 Pesawat Angkat dan Angkut Pengoperasian Alat Pemadat Bergetar',
            'Prinsip Kerja Vibratory Pod, Poros Eksentrik, Sistem Penggerak Hidrostatis, dan Drum Isolator',
            'Pemeriksaan Harian (P2H) Sistem Getar, Oli Hidrolik, dan Kondisi Rubber Damper',
            'Mekanisme Pemadatan Getar: Hubungan Frekuensi, Kecepatan Maju, dan Daya Dukung Tanah',
            'Teknik Pemadatan di Tanjakan/Turunan dan Pengaturan Arah Manuver Unit',
            'Kesehatan Kerja Operator: Pencegahan Paparan Getaran Seluruh Tubuh (Whole-Body Vibration)',
            'Prosedur Mematikan Getaran Sebelum Mengubah Arah Maju/Mundur Unit',
            'Prosedur Tanggap Darurat dan Pengamanan Parkir di Area Proyek Konstruksi',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Jadwal kelas reguler dan in-house training perusahaan dikonfirmasi via WhatsApp.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Durasi mengacu pada silabus standar pembinaan keselamatan alat berat.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Konsultasikan kebutuhan pelatihan untuk mendapatkan penawaran resmi.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, ijazah pendidikan, surat keterangan sehat dokter, dan pasfoto.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Sertifikat kompetensi dan lisensi resmi diterbitkan oleh Kemnaker RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa getaran harus dimatikan saat vibro berhenti atau berbalik arah?',
                'answer'   => 'Jika sistem getar tetap aktif saat unit berhenti, energi getaran terpusat di satu titik drum yang dapat menyebabkan penurunan tanah setempat (alur ambles) dan merusak kerataan permukaan.',
            ],
            [
                'question' => 'Apa dampak paparan getaran berlebih bagi operator vibro roller?',
                'answer'   => 'Getaran kontinu yang tidak diredam baik dapat menimbulkan kelelahan ekstrem, gangguan tulang belakang, dan sindrom getaran. Oleh karena itu kondisi peredam karet (damper) kabin dan drum wajib diperiksa berkala.',
            ],
        ],
    ],

    'sio-dump-truck' => [
        'slug'              => 'sio-dump-truck',
        'category'          => 'training',
        'category_label'    => 'Sertifikasi & Pelatihan',
        'level'             => 'Operator Dump Truck',
        'title'             => 'SIO Dump Truck',
        'badge'             => 'Permenaker No. 8/2020 — Pesawat Angkat & Angkut',
        'meta_title'        => 'SIO Dump Truck | Training Operator Alat Berat & Sertifikasi Kemnaker',
        'meta_description'  => 'Training operator dan sertifikasi SIO Dump Truck / Hauler Kemnaker RI. Keselamatan manuver hauling, prosedur tipping/unloading, dan pencegahan blind spot.',
        'hero_heading'      => 'Training Operator &',
        'hero_highlight'    => 'SIO Dump Truck',
        'hero_subheading'   => 'Pembinaan keselamatan kerja dan sertifikasi operator Dump Truck untuk pengangkutan material tambang, kuari, dan proyek infrastruktur skala besar.',
        'wa_message'        => 'Halo, saya ingin konsultasi mengenai persyaratan dan jadwal training SIO Dump Truck.',
        'introduction'      => 'Dump Truck dan Rigid/Articulated Dump Truck (ADT) merupakan urat nadi pemindahan material volume besar. Tingginya angka insiden terguling saat mengangkat dump vessel (tipping), tabrakan akibat blind spot luas, dan rem blong di turunan menuntut operator yang terlatih dan berlisensi resmi. Program ini membina keterampilan manuver hauling aman, penanganan muatan, dan prosedur tipping stabil.',
        'target_audience'   => [
            'Driver dan operator dump truck di area pertambangan batubara, nikel, emas, dan quarry.',
            'Pengemudi dump truck tronton/trailer proyek jalan tol, bendungan, dan reklamasi.',
            'Calon operator armada angkut berat yang ingin memperoleh Lisensi K3 resmi Kemnaker.',
            'Dispatcher armada hauling dan supervisor keselamatan transportasi tambang.',
        ],
        'roles_and_responsibilities' => [
            [
                'title'       => 'Operasi Hauling Aman & Antisipasi Blind Spot',
                'description' => 'Mengendalikan kecepatan di jalan angkut, menjaga jarak iring konvoi, serta mengamati titik buta di sekeliling kendaraan besar.',
            ],
            [
                'title'       => 'Prosedur Tipping & Dumping Terkontrol',
                'description' => 'Memeriksa kerataan permukaan tanah sebelum menaikkan dump body di area disposal, dan menjaga jarak aman dari safety berm.',
            ],
            [
                'title'       => 'Pemeriksaan Rem, Retarder, & Silinder Hoist',
                'description' => 'Melaksanakan checklist P2H pada sistem retarder/exhaust brake, tekanan angin rem, kebocoran hidrolik hoist, dan ban.',
            ],
        ],
        'curriculum_topics' => [
            'Dasar Hukum K3 Kendaraan Angkut Berat (UU No. 1/1970 & Permenaker No. 8/2020)',
            'Konstruksi Dump Truck: Powertrain, Pengereman Udara/Hidrolik, Retarder, dan Sistem Hidrolik Hoist',
            'Pemeriksaan Harian Pra-Operasi (P2H): Uji Rem Parkir, Tekanan Ban, dan Fungsi Lampu Kerja/Rotary',
            'Manajemen Zona Blind Spot Kendaraan Tambang dan Tata Cara Komunikasi Radio Lapangan',
            'Prosedur Antrean dan Posisi Parkir Saat Pemuatan (Loading) Bersama Excavator / Loader',
            'Prosedur Tipping / Dumping Aman di Disposal Area dan Bahaya Muatan Menempel (Carryback)',
            'Teknik Berkendara di Turunan Curam: Pemanfaatan Engine Brake dan Retarder Tanpa Overheat',
            'Prosedur Darurat Rem Blong, Pemanfaatan Jalur Penyelamat (Runaway Ramp), dan Evakuasi Unit',
        ],
        'training_info' => [
            'jadwal'     => ['label' => 'Jadwal Pelatihan',      'status' => 'Hubungi kami', 'detail' => 'Konsultasikan batch reguler atau pengajuan in-house training perusahaan logistik/tambang.'],
            'durasi'     => ['label' => 'Durasi Pembinaan',      'status' => 'Sesuai kurikulum', 'detail' => 'Meliputi pembinaan teori K3 transportasi berat dan evaluasi praktik mengemudi aman.'],
            'investasi'  => ['label' => 'Investasi Biaya',       'status' => 'Hubungi kami', 'detail' => 'Hubungi representasi resmi kami untuk informasi biaya dan fasilitas lengkap.'],
            'persyaratan'=> ['label' => 'Persyaratan Peserta',   'status' => 'Perlu verifikasi', 'detail' => 'KTP, SIM relevan, surat keterangan sehat, pasfoto, dan kelengkapan administrasi.'],
            'otorisasi'  => ['label' => 'Regulasi & Sertifikasi', 'status' => 'Kemnaker RI', 'detail' => 'Penerbitan SIO/Lisensi K3 operator dump truck melalui jalur resmi Kemnaker RI.'],
        ],
        'faqs' => [
            [
                'question' => 'Mengapa unit dump truck berisiko tinggi terguling saat melakukan proses dumping?',
                'answer'   => 'Ketika bak dump terangkat ke atas, titik pusat gravitasi kendaraan berpindah jauh lebih tinggi. Jika permukaan tanah tidak rata atau material menempel di satu sisi, unit sangat rentan kehilangan keseimbangan dan terguling ke samping.',
            ],
            [
                'question' => 'Apa fungsi utama retarder pada dump truck bermuatan berat?',
                'answer'   => 'Retarder berfungsi memperlambat laju kendaraan secara hidrolik atau elektromagnetik tanpa mengandalkan rem gesek utama, sehingga mencegah terjadinya rem blong akibat panas berlebih (brake fade) di turunan panjang.',
            ],
        ],
    ],

];
