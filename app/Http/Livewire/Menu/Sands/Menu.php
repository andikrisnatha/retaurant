<?php

namespace App\Http\Livewire\Menu\Sands;

use App\Models\CategorySands;
use App\Models\SandsMenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $menus, $categories, $sandsMenu_id, $user_id, $sandsMenu;
    public  $main_title, $description, $title_1, $title_2, $title_3, $title_4, $price_1, $price_2, $price_3, $price_4, $image, $video_url, $category_id, $tag_id, $status;

    public $isModalOpen = false;
    public $isMenu = true;
    public $isCategory = false;
    public $isBoard = false;

    public function openCategory()
    {
        $this->isMenu = false;
        $this->isBoard = false;
        $this->isCategory = true;
    }
    public function openMenu()
    {
        $this->isMenu = true;
        $this->isBoard = false;
        $this->isCategory = false;
    }
    public function openBoard()
    {
        $this->isMenu = false;
        $this->isBoard = true;
        $this->isCategory = false;
    }


    protected $rules = [
        'main_title' => 'required',
        'description' => 'required',
        'price_1' => 'required',
        'image' => 'required',
        'video_url' => 'required',
        'category_id' => 'required',
        'tag_id' => 'required',
        'status' => 'required',
    ];

    public function render()
    {
        $this->menus = SandsMenu::orderBy('id', 'DESC')->get();
        $this->categories = CategorySands::all();
        return view('livewire.menu.sands.index', [
            'menus' => $this->menus,
            'categories' => $this->categories,
        ]);
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetCreteForm()
    {
        $this->main_title = '';
        $this->description = '';
        $this->title_1 = '';
        $this->title_2 = '';
        $this->title_3 = '';
        $this->title_4 = '';
        $this->price_1 = '';
        $this->price_2 = '';
        $this->price_3 = '';
        $this->price_4 = '';
        $this->image = '';
        $this->video_url = '';
        $this->category_id = '';
        $this->tag_id = '';
        $this->status = '';
    }


    public function store()
    {
        $this->validate();

        SandsMenu::updateOrCreate(['id' => $this->sandsMenu_id], [
        'main_title' => $this->main_title,
        'user_id' => Auth::id(),
        'description' => $this->description,
        'title_1' => $this->title_1,
        'title_2' => $this->title_2,
        'title_3' => $this->title_3,
        'title_4' => $this->title_4,
        'price_1' => $this->price_1,
        'price_2' => $this->price_2,
        'price_3' => $this->price_3,
        'price_4' => $this->price_4,
        'image' => $this->image,
        'video_url' => $this->video_url,
        'category_id' => $this->category_id,
        'tag_id' => $this->tag_id,
        'status' => $this->status,
        ]);

        session()->flash('message', $this->sandsMenu_id ? 'Menu Updated.' : 'Menu Created.');

        $this->resetCreteForm();
        $this->closeModal();
    }

    public function edit($id)
    {
        $sandsMenu = SandsMenu::findOrFail($id);
        $this->sandsMenu_id = $id;
        $this->main_title = $sandsMenu->main_title;
        $this->description = $sandsMenu->description;
        $this->title_1 = $sandsMenu->title_1;
        $this->title_2 = $sandsMenu->title_2;
        $this->title_3 = $sandsMenu->title_3;
        $this->title_4 = $sandsMenu->title_4;
        $this->price_1 = $sandsMenu->price_1;
        $this->price_2 = $sandsMenu->price_2;
        $this->price_3 = $sandsMenu->price_3;
        $this->price_4 = $sandsMenu->price_4;
        $this->image = $sandsMenu->image;
        $this->video_url = $sandsMenu->video_url;
        $this->category_id = $sandsMenu->category_id;
        $this->tag_id = $sandsMenu->tag_id;
        $this->status = $sandsMenu->status;

        $this->openModal();

    }

    public function delete($id)
    {
        SandsMenu::find($id)->delete();
        session()->flash('message', 'Deleted');
    }

    public function updateSelectedMenuStatus($menuId)
    {
        $menu = SandsMenu::findOrFail($menuId);
        $menu->status = $menu->status === 1 ? 0 : 1;
        $menu->save();

    }
}
