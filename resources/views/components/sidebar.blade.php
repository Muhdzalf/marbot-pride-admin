@php
// menu side bar dideklarasikan disini
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "icon" => "fas fa-fire",
        "is_multi" => false,
    ],
    // User
    [
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "text" => "User",
        "icon" => "fas fa-user",
        "is_multi" => true,
    ],

    // Tema Kajian
    [
        "href" => [
            [
                "section_text" => "Tema Kajian",
                "section_list" => [
                    ["href" => "tema", "text" => "Data Tema Kajian"],
                    ["href" => "tema.new", "text" => "Buat Tema Kajian"]
                ]
            ]
        ],
        "text" => "Tema Kajian",
        "icon" => "fas fa-folder-open",
        "is_multi" => true,
    ],

    //Video Kajian
    [
        "href" => [
            [
                "section_text" => "Video Kajian",
                "section_list" => [
                    ["href" => "video", "text" => "Data Video Kajian"],
                    ["href" => "video.new", "text" => "Buat Video Kajian"]
                ]
            ]
        ],
        "text" => "Video Kajian",
        "icon" => "fas fa-play",
        "is_multi" => true,
    ],

    // Program

    [
        "href" => [
            [
                "section_text" => "Program",
                "section_list" => [
                    ["href" => "program", "text" => "Data Program"],
                    ["href" => "program.new", "text" => "Buat Program"]
                ]
            ]
        ],
        "text" => "Program",
        "icon" => "fas fa-book",
        "is_multi" => true,
    ],

    // Donasi
    [
        "href" => [
            [
                "section_text" => "Donasi",
                "section_list" => [
                    ["href" => "donation", "text" => "Data Donasi"],
                    ["href" => "method", "text" => "Data Metode Donasi"],
                ]
            ]
        ],
        "text" => "Donasi",
        "icon" => "fas fa-hands-helping",
        "is_multi" => true,
    ],

    // Ustadz
    [
        "href" => [
            [
                "section_text" => "Ustadz",
                "section_list" => [
                    ["href" => "ustadz", "text" => "Data Ustadz"],
                    ["href" => "ustadz.new", "text" => "Buat Data Ustadz Baru"],
                ]
            ]
        ],
        "text" => "Ustadz",
        "icon" => "fas fa-user",
        "is_multi" => true,
    ],

    // Category
    [
        "href" => [
            [
                "section_text" => "Category",
                "section_list" => [
                    ["href" => "category", "text" => "Data Category"],
                    ["href" => "category.new", "text" => "Buat Category Baru"],
                ]
            ]
        ],
        "text" => "Category",
        "icon" => "fas fa-book",
        "is_multi" => true,
    ],
    
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Marbot Pride</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <i class="d-inline-block fas fa-fire" width="32px" height="30.61px"></i>
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{$link->icon}}"></i><span>Dashboard</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{$link->icon}}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
