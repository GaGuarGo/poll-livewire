<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{

    public $title;
    public $options = ['First'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption(): void
    {
        $this->options[] = '';
    }

    public function removeOption($index): void
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll(): void
    {
        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)->map(fn($option) => ['name' => $option])->all()
        );

//        foreach($this->options as $optionName) {
//            $poll->options()->create(['name' => $optionName]);
//        }

        $this->reset(['title', 'options']);
    }


//    public function mount() {
//
//    }
}
