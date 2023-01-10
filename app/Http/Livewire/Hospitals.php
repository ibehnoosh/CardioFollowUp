<?php

namespace App\Http\Livewire;

use App\Models\Province;
use Livewire\Component;
use App\Http\Livewire;
use App\Models\hospital;

class Hospitals extends Component implements LivewireInterface
{
    use LivewireTrait;
    public $hospitals;
    public $provinces;
    public  $name, $province_id;
    public  $hospital_id;
    public $isOpen=0;

    public function render()
    {
        $this->provinces=Province::all()->sortBy(['name']);
        $this->hospitals= Hospital::all()->sortBy(['name']);
        return view('livewire.hospitals');
    }
    public function resetInputFields()
    {
        $this->name ='';
        $this->hospital_id='';
        $this->province_id='';
    }
    public function store()
    {
        $this->validate([
            'name'=>'required'
        ]);
        hospital::updateOrCreate(
            ['id'=>$this->hospital_id],
            ['name'=> $this->name,'province_id'=>$this->province_id,]
        );
        session()->flash('message',
            $this->hospital_id ? 'Hospital Update Successfully' : 'Hospital Created Successfully');

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {

        $hospital= Hospital::findOrFail($id);
        $this->hospital_id=$id;
        $this->province_id=$hospital->province_id;
        $this->name=$hospital->name;

        $this->openModal();
    }
    public function delete($id)
    {
        Hospital::find($id)->delete();
        session()->flash('message','Hospital Deleted Successfully');
    }
}
