<?php 

Namespace Ap\view\components; 

Useclosure; 

use Illuminate\Contracts\View\View; 

use Illuminate\View\Component; 

 

class ArtikelCard extends Component 

{ 

         /** 

           * Menerima satu data artikel dari halaman yang memanggil. 

          */ 

          public function __construct(public $artikel)  

         { 

         } 

          /** 

           * Menentukan view yang dirender oleh komponen ini. 

           */ 

           public function render(): View|Closure|string 

           { 

                     return view('components.artikel-card');  

            } 

 }