<?php
namespace App\Http\Livewire;
trait LivewireTrait
{

    public $isOpen=0;

    public function openModal()
    {
        $this->isOpen= true;
    }
    public function closeModal()
    {
        $this->isOpen= false;
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
}
