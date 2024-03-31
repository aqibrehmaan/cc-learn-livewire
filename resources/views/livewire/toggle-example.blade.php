<div x-data="{ editing: false }">
    <div x-show="editing">
        Editing state
    </div>

    <button x-on:click="editing = !editing">Edit</button>
</div>
