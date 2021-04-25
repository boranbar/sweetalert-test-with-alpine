<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteUser($userID)
    {
        $user = User::find($userID);
        $user->delete();
    }

    public function render()
    {
        if ($this->search == null) {
            $users = User::latest()->paginate(10);
        } else {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('surname','like', '%' . $this->search . '%')
                ->orWhere('email','like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        }
        return view('livewire.user-list',compact('users'));
    }
}
