<?php

namespace App\Traits;


trait WithDataTable
{

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'tema':
                $temas = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.tema',
                    "temas" => $temas,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('tema.new'),
                            'create_new_text' => 'Buat Tema Kajian Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'video':
                $videos = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.video',
                    "videos" => $videos,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('video.new'),
                            'create_new_text' => 'Buat Video Kajian Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'category':
                $categories = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.category',
                    "categories" => $categories,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('category.new'),
                            'create_new_text' => 'Buat Category Kajian Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'ustadz':
                $ustadzs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.ustadz',
                    "ustadzs" => $ustadzs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('ustadz.new'),
                            'create_new_text' => 'Buat Data Ustadz Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'donation':
                $donations = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.donation',
                    "donations" => $donations,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('donation'),
                            'create_new_text' => 'new ',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'program':
                $programs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.program',
                    "programs" => $programs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('program.new'),
                            'create_new_text' => 'Buat Data program Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'method':
                $methods = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.method',
                    "methods" => $methods,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('method.new'),
                            'create_new_text' => 'Buat Data methode Donasi Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }
}
