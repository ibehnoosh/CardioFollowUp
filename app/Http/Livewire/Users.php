<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component implements LivewireInterface
{
    use LivewireTrait;
    public $users;
    public $name;
    public $email;
    public $password;
    public $user_id;
    public $isOpen=0;
    public function render()
    {
        $this->provinces= User::all()->sortBy(['name']);
        return view('livewire.users');
    }

    public function store()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        User::updateOrCreate(
            ['id'=>$this->user_id ],
            ['name'=> $this->name , 'email' => $this->email]
        );
        session()->flash('message',
            $this->user_id ? 'User Update Successfully' : 'User Created Successfully');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function resetInputFields()
    {
        $this->name ='';
        $this->password='';
        $this->email='';
    }

    public function openModal()
    {
        // TODO: Implement openModal() method.
    }

    public function closeModal()
    {
        // TODO: Implement closeModal() method.
    }
}
