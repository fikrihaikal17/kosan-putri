<div style="display: flex; flex-direction: row; flex-wrap: wrap; gap: 1.5rem; width: 100%; align-items: stretch;">
    
    <!-- Left Column: Executive Summary & Live Insights (60% Width on Desktop) -->
    <div style="flex: 1 1 58%; min-width: 340px; background-color: #ffffff; border: 2.5px solid #111111; box-shadow: 4px 4px 0px #111111; padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <!-- Header -->
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 0.75rem; border-bottom: 2px solid #111111; padding-bottom: 1rem; margin-bottom: 1.25rem;">
                <div>
                    <span style="font-size: 0.6875rem; font-weight: 900; background-color: #FFE600; color: #111111; padding: 0.2rem 0.5rem; border: 1.5px solid #111111; box-shadow: 1.5px 1.5px 0 #111111; text-transform: uppercase; letter-spacing: 0.05em; display: inline-block; margin-bottom: 0.35rem;">
                        🔴 Live Real-Time Analytics
                    </span>
                    <h3 style="font-size: 1.25rem; font-weight: 900; color: #111111; text-transform: uppercase; letter-spacing: -0.02em; margin: 0;">
                        Ringkasan & Kesimpulan Aktivitas Website
                    </h3>
                </div>
            </div>

            <!-- 4 Real-time Insights 2x2 Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem;">
                
                <!-- Insight 1: Traffic Realtime -->
                <div style="background-color: #FBF7EE; border: 2px solid #111111; box-shadow: 2.5px 2.5px 0px #111111; padding: 1rem;">
                    <span style="display: block; font-size: 0.6875rem; font-weight: 900; color: #555555; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 0.25rem;">
                        Traffic Hari Ini (Live)
                    </span>
                    <div style="font-size: 1.5rem; font-weight: 900; color: #111111; line-height: 1.1; margin-bottom: 0.25rem;">
                        {{ number_format($todayVisitors) }} <span style="font-size: 0.8125rem; font-weight: 800; color: #FF5E8A;">({{ number_format($todayViews) }} Views)</span>
                    </div>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #444444; margin: 0;">
                        Tercatat otomatis dari kunjungan real-time.
                    </p>
                </div>

                <!-- Insight 2: Most Visited Page -->
                <div style="background-color: #FFFDE6; border: 2px solid #111111; box-shadow: 2.5px 2.5px 0px #111111; padding: 1rem;">
                    <span style="display: block; font-size: 0.6875rem; font-weight: 900; color: #555555; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 0.25rem;">
                        Halaman Terpopuler
                    </span>
                    <div style="font-size: 1.125rem; font-weight: 900; color: #111111; line-height: 1.2; margin-bottom: 0.25rem;">
                        {{ $topPageName }}
                    </div>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #444444; margin: 0;">
                        Total <strong>{{ number_format($topPageHits) }}</strong> kali diakses calon penghuni.
                    </p>
                </div>

                <!-- Insight 3: Room Readiness -->
                <div style="background-color: #FFEBF1; border: 2px solid #111111; box-shadow: 2.5px 2.5px 0px #111111; padding: 1rem;">
                    <span style="display: block; font-size: 0.6875rem; font-weight: 900; color: #555555; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 0.25rem;">
                        Publikasi Kamar
                    </span>
                    <div style="font-size: 1.5rem; font-weight: 900; color: #111111; line-height: 1.1; margin-bottom: 0.25rem;">
                        {{ $activeRooms }} / {{ $totalRooms }} Tipe Aktif
                    </div>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #444444; margin: 0;">
                        Kamar mandi dalam & sharing siap disewa.
                    </p>
                </div>

                <!-- Insight 4: Total Traffic This Month -->
                <div style="background-color: #E6F9FF; border: 2px solid #111111; box-shadow: 2.5px 2.5px 0px #111111; padding: 1rem;">
                    <span style="display: block; font-size: 0.6875rem; font-weight: 900; color: #555555; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 0.25rem;">
                        Akumulasi Bulan Ini
                    </span>
                    <div style="font-size: 1.5rem; font-weight: 900; color: #111111; line-height: 1.1; margin-bottom: 0.25rem;">
                        {{ number_format($monthViews) }} <span style="font-size: 0.8125rem; font-weight: 800; color: #0284c7;">({{ number_format($monthVisitors) }} Orang)</span>
                    </div>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #444444; margin: 0;">
                        Tercatat secara aktual di database.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Right Column: Quick Action Panel (38% Width on Desktop) -->
    <div style="flex: 1 1 35%; min-width: 280px; background-color: #ffffff; border: 2.5px solid #111111; box-shadow: 4px 4px 0px #111111; padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <!-- Header -->
            <div style="border-bottom: 2px solid #111111; padding-bottom: 0.75rem; margin-bottom: 1rem;">
                <span style="font-size: 0.6875rem; font-weight: 900; background-color: #FF5E8A; color: #111111; padding: 0.2rem 0.5rem; border: 1.5px solid #111111; box-shadow: 1.5px 1.5px 0 #111111; text-transform: uppercase; letter-spacing: 0.05em; display: inline-block; margin-bottom: 0.35rem;">
                    ⚡ Pintasan Cepat
                </span>
                <h3 style="font-size: 1.125rem; font-weight: 900; color: #111111; text-transform: uppercase; margin: 0;">
                    Aksi Manajemen Konten
                </h3>
            </div>

            <!-- Vertical Action Buttons List -->
            <div style="display: flex; flex-direction: column; gap: 0.6rem;">
                <a href="{{ url('/admin/rooms') }}" style="display: flex; align-items: center; justify-content: space-between; background-color: #FBF7EE; color: #111111; font-weight: 900; font-size: 0.75rem; text-transform: uppercase; padding: 0.6rem 0.85rem; border: 2px solid #111111; box-shadow: 2px 2px 0 #111111; text-decoration: none; transition: transform 0.15s ease;">
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span>Kelola Pilihan Kamar</span>
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ url('/admin/facilities') }}" style="display: flex; align-items: center; justify-content: space-between; background-color: #FBF7EE; color: #111111; font-weight: 900; font-size: 0.75rem; text-transform: uppercase; padding: 0.6rem 0.85rem; border: 2px solid #111111; box-shadow: 2px 2px 0 #111111; text-decoration: none; transition: transform 0.15s ease;">
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        <span>Kelola Fasilitas Kos</span>
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ url('/admin/galleries') }}" style="display: flex; align-items: center; justify-content: space-between; background-color: #FBF7EE; color: #111111; font-weight: 900; font-size: 0.75rem; text-transform: uppercase; padding: 0.6rem 0.85rem; border: 2px solid #111111; box-shadow: 2px 2px 0 #111111; text-decoration: none; transition: transform 0.15s ease;">
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Upload Galeri Foto</span>
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ url('/admin/locations') }}" style="display: flex; align-items: center; justify-content: space-between; background-color: #FBF7EE; color: #111111; font-weight: 900; font-size: 0.75rem; text-transform: uppercase; padding: 0.6rem 0.85rem; border: 2px solid #111111; box-shadow: 2px 2px 0 #111111; text-decoration: none; transition: transform 0.15s ease;">
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Atur Lokasi & Peta</span>
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ url('/admin/business-settings') }}" style="display: flex; align-items: center; justify-content: space-between; background-color: #FFE600; color: #111111; font-weight: 900; font-size: 0.75rem; text-transform: uppercase; padding: 0.6rem 0.85rem; border: 2px solid #111111; box-shadow: 2px 2px 0 #111111; text-decoration: none; transition: transform 0.15s ease;">
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>WhatsApp & Profil</span>
                    </span>
                    <span>→</span>
                </a>
            </div>
        </div>

        <div style="margin-top: 1rem; padding-top: 0.75rem; border-top: 2px solid #111111;">
            <a href="{{ url('/') }}" target="_blank" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; background-color: #FF5E8A; color: #111111; font-weight: 900; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.04em; padding: 0.65rem 1rem; border: 2px solid #111111; box-shadow: 2.5px 2.5px 0px #111111; text-decoration: none;">
                <span>Buka Website Publik</span>
                <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </div>

</div>
