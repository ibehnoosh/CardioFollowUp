<?php

namespace App\Http\Livewire;

Interface LivewireInterface
{
    public function render();
    public function store();
    public function create();
    public function edit($id);
    public function delete($id);
    public function resetInputFields();
    public function openModal();
    public function closeModal();
}


