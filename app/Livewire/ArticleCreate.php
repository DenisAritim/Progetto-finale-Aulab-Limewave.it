<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ArticleCreate extends Component
{
    use WithFileUploads;
    
    #[Validate('required', message: 'Il titolo è necessario')]
    #[Validate('min:5', message: 'Il titolo deve contenere almeno 5 caratteri')]
    public $title = "";
    #[Validate('required', message: 'Il prezzo è necessario')]
    #[Validate('numeric', message: 'Il prezzo deve essere un numero')]
    #[Validate('min:0.01', message: 'Il prezzo non può essere zero')]
    public $price = "";
    #[Validate('required', message: 'Una descrizione è necessaria')]
    #[Validate('min:10', message: 'La descrizione deve contenere almeno 10 caratteri')]
    public $body = "";
    #[Validate('required', message: 'La categoria è necessaria')]
    public $category = "";

    public $temp_images = [];
    public $images = [];


    public function store()
    {
        $this->validate();
        $adminAccept = null ;
         if (Auth::user()->is_admin) {
            $adminAccept = true;
        };

        Article::create([
            "title" => $this->title,
            "price" => $this->price,
            "body" => $this->body,
            "user_id" => Auth::user()->id,
            "category_id" => $this->category,
            "is_accepted" => $adminAccept,
        ]);

        $this->dispatch('category-update');
        $this->reset();

        session()->flash('status', "Annuncio inserito con successo");
    }

    // TEMPORARY IMAGES SHOWN
    public function updatedTempImages() {
        foreach ($this->temp_images as $image) {
            $this->images[] = $image;
        }
    }
    // TEMPORARY IMAGES REMOVAL
    public function removeImage($key) {

        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.article-create', compact('categories'));
    }
}
