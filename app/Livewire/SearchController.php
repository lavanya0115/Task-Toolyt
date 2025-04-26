<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\ExternalUser;
use App\Models\InternalUser;

class SearchController extends Component
{
    public $internalUser;
    public $attendances;
    public $search = '';

    public function mount()
    {
        $this->attendances = [];
    }
    public function render()
    {


        $this->internalUser = filter_var($this->search, FILTER_VALIDATE_EMAIL);
        $search = $this->search;
        $this->attendances = Attendance::with(['internalUser', 'externalUser'])->when(($this->internalUser !== false), function ($query) use ($search) {
            return $query->whereHas('internalUser', function ($q) use ($search) {
                $q->where('email', $search);
            });
        })->when($this->internalUser === false, function ($query) use ($search) {
            return $query->where(function ($q) use ($search) {
                $q->whereHas('internalUser', function ($q1) use ($search) {
                    $q1->where('phone', 'like', '%' . $search . '%');
                })->orWhereHas('externalUser', function ($q2) use ($search) {
                    $q2->where('phone_2', 'like', '%' . $search . '%');
                });
            });
        })->get();

        if (empty($this->search)) {
            $this->attendances = [];
        }

        return view('livewire.search-controller');
    }
}
