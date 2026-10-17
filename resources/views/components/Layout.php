<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Judul halaman, dikirim dari view yang memanggil layout.
     */
    public function __construct(public string $title = 'Beranda')
    {
    }

    /**
     * Menentukan view yang dirender oleh komponen ini.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}