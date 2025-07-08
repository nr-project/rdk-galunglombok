<ul id="navbar-nav" class="group-data-[layout=horizontal]:flex group-data-[layout=horizontal]:flex-col group-data-[layout=horizontal]:md:flex-row">

    <li class="px-4 py-1 uppercase font-medium text-[11px] cursor-default tracking-wider group-data-[sidebar-size=sm]:hidden group-data-[layout=horizontal]:hidden inline-block group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:underline group-data-[sidebar-size=md]:text-center">
        <span data-key="t-menu">Menu</span>
    </li>

    <!-- Dashboard -->
    <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
        <a href="{{ route('home') }}" class="{{ set_active(['home']) }} relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5"
            >
            <span class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="monitor-dot" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden" data-key="t-dashboard">Dashboard</span>
        </a>
    </li>

    <!-- Potensi Wilayah (with dropdown) -->
    <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
        <a href="#!" class="dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="database" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span
                class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Potensi Wilayah</span>
        </a>
        <div class="dropdown-content hidden group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent">
            <ul class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 py-2">
                <li>
                    <a href="#!" class="flex items-center px-6 py-2 text-vertical-menu-sub-item transition-all duration-75 ease-linear hover:text-vertical-menu-sub-item-hover rounded-md">Sumber Daya Alam</a>
                </li>
                <li>
                    <a href="#!" class="flex items-center px-6 py-2 text-vertical-menu-sub-item transition-all duration-75 ease-linear hover:text-vertical-menu-sub-item-hover rounded-md">Sumber Daya Manusia</a>
                </li>
                <li>
                    <a href="#!" class="flex items-center px-6 py-2 text-vertical-menu-sub-item transition-all duration-75 ease-linear hover:text-vertical-menu-sub-item-hover rounded-md">Infrastruktur</a>
                </li>
            </ul>
        </div>
    </li>

    <!-- Kuantitas Penduduk -->
    <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
        <a href="/kelompok-umur" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="users" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Kuantitas Penduduk</span>
        </a>
    </li>

    <!-- Kualitas Penduduk -->
    <li>
        <a href="/jenis-kegiatan" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="file-text" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Kualitas Penduduk</span>
        </a>
    </li>

    <!-- Mobilitas Penduduk -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="bus" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Mobilitas Penduduk</span>
        </a>
    </li>

    <!-- Pembangunan Keluarga -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="users" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Pembangunan Keluarga</span>
        </a>
    </li>

    <!-- Adm. Kependudukan -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="folder" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Adm. Kependudukan</span>
        </a>
    </li>

    <!-- Perlindungan Sosial -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="message-square" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Perlindungan Sosial</span>
        </a>
    </li>

    <!-- Inovasi -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="box" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Inovasi</span>
        </a>
    </li>

    <!-- Dokumentasi -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="folder-plus" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Dokumentasi</span>
        </a>
    </li>

    <!-- Struktur Pengurus -->
    <li>
        <a href="#!" class="flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal rounded-md py-2.5">
            <span class="min-w-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center">
                <i data-lucide="user" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5"></i>
            </span>
            <span class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden">Struktur Pengurus</span>
        </a>
    </li>

</ul>
