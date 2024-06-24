<div>
    <form>
        <label>
            Poll Title
        </label>


        <input type="text" wire:model.live="title"/>

        Current Title: {{$title}}

        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">
                Add Option
            </button>
        </div>

        @foreach($options as $index => $option)
            <div class="mb-4">
                {{$index}} - {{$option}}
            </div>
        @endforeach
    </form>
</div>
