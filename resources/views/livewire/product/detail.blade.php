<div class="">
    <div class="mb-2 form-floating">
        <input class="shadow form-control" placeholder="name" type="text" name="name" wire:model="name">
        <label>Name</label>
        @error('name')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2 input-group">
        <span class="input-group-text">Rp.</span>

        <input class="shadow form-control" placeholder="Price" type="text" name="price" wire:model="price">
        @error('price')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2 form-floating">
        <input class="shadow form-control"wire:key="image" placeholder="Image" type="file" name="image"
            wire:model="image">
        <label>image</label>
        @error('image')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" class="w-50 h-20 d-block my-2 rounded">
    @elseif($oldImage)
        <img src="{{ $oldImage }}" class="w-50 h-20 d-block my-2 rounded">
    @endif
    <button type="submit" class="mb-2 btn btn-info" wire:click="store" shadow>
        {{ $objId ? 'Update' : 'Create' }}
        <div class="spinner-border text-light" style="width: 15px;  height:15px;" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>

</div>
