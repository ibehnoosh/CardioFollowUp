<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;

class Provinces extends Component
{
    public $provinces;
    public  $name;
    public  $province_id;
    public $isOpen=0;

    public function render()
    {
        $this->provinces= Province::all()->sortBy(['name']);
        return view('livewire.provinces');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen= true;
    }
    public function closeModal()
    {
        $this->isOpen= false;
    }
    private function resetInputFields()
    {
        $this->name ='';
        $this->province_id='';
    }
    public function  store()
    {
        $this->validate([
            'name'=>'required'
        ]);
        Province::updateOrCreate([
            'id'=>$this->province_id,
            'name'=> $this->name,
        ]);
        session()->flash('message',
        $this->province_id ? 'Province Update Successfully' : 'Province Created Successfully');

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $province= Province::findOrFail($id);

        $this->province_id=$id;
        $this->name=$province->name;

        $this->openModal();
    }
    public function delete($id)
    {
        Province::find($id)->delete();
        session()->flash('message','Province Deleted Successfully');
    }
}
