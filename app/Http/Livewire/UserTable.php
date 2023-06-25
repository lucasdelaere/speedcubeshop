<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $is_active = 1;
    public $tablesearch;

    public $sortAsc = true;
    public $sortField;

    protected $queryString = [
        "tablesearch",
        "is_active",
        "sortAsc",
        "sortField",
    ]; // steekt parameters in URL, wordt voornamelijk in backend gedaan

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function render()
    {
        return view("livewire.user-table", [
            "users" => User::where(function ($query) {
                $query
                    ->where(DB::raw("CONCAT(first_name, ' ', last_name)"), "like", "%" . $this->tablesearch . "%")
                    ->orWhere("email", "like", "%" . $this->tablesearch . "%");
            })
                // is_active functionaliteit kun je ook gebruiken voor aangeklikte filters die verschijnen en die je weer kan wegklikken (kruisje)
                ->where("is_active", $this->is_active)
                ->with(["role", "photo"])
                ->withTrashed()
                ->when($this->sortField, function ($query) {
                    $query->orderBy(
                        $this->sortField,
                        $this->sortAsc ? "asc" : "desc"
                    );
                })
                ->paginate(10),
        ]);
    }
    public function updatedIsActive()
    {
        $this->resetPage();
    }
    public function updatedTablesearch()
    {
        $this->resetPage();
    }
}
