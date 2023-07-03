<?php

namespace App\Http\Livewire\Menu;

use App\Models\Promotion as ModelsPromotion;
use Livewire\Component;
use Livewire\WithPagination;

class Promotion extends Component
{
    use WithPagination;
    public $promotions, $title, $price, $description, $image, $status, $promotion_id;

    public $isModalOpen = false;

    public $rules = [

    ];

    public function render()
    {
        $this->promotions = ModelsPromotion::orderBy('id', 'DESC')->get();
        return view('livewire.menu.promotion', [
            'promotions' => $this->promotions
        ]);
    }

    public function updateSelectedPromotionStatus($promotionId)
    {
        $promotion = ModelsPromotion::findOrFail($promotionId);
        $promotion->status = $promotion->status === 1 ? 0 : 1;
        $promotion->save();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetCreateForm()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->image = '';
        $this->status = '';
    }

    public function store()
    {
        // $this->validate();

        ModelsPromotion::updateOrCreate(['id' => $this->promotion_id], [
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status,
        ]);

        session()->flash('message', 'promotion added!');
        $this->resetCreateForm();
        $this->closeModal();
    }

    public function edit($id)
    {
        $promotion = ModelsPromotion::findOrFail($id);
        $this->title = $promotion->title;
        $this->price = $promotion->price;
        $this->description = $promotion->description;
        $this->image = $promotion->image;
        $this->status = $promotion->status;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsPromotion::find($id)->delete();
        session()->flash('message', 'deleted!');
    }
}
