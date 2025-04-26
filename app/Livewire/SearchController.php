<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\ExternalUser;
use App\Models\InternalUser;
use Livewire\WithPagination;

class SearchController extends Component
{
    use WithPagination;

    public $internalUser;
    public $search  = '';
    public $perPage = 10;

    public function render()
    {
        $this->internalUser = filter_var($this->search, FILTER_VALIDATE_EMAIL);
        $search = $this->search;
        $attendances = Attendance::when(($this->internalUser !== false), function ($query) use ($search) {
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
        })
            ->with(['internalUser', 'externalUser'])
            ->paginate($this->perPage);

        if (empty($this->search)) {
            $attendances = [];
        }

        return view('livewire.search-controller', compact('attendances'));
    }
}
