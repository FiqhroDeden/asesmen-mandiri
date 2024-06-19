<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
    <form class="modal-box" wire:submit="simpan">
        <h3 class="font-bold text-lg">Uraian Mata Kuliah</h3>
        <div class="py-4 space-y-2">
            <label class="form-control w-full ">
                <div class="label">

                </div>
                <textarea @class(['textarea textarea-bordered', 'textarea-error' => $errors->first('form.uraian')]) wire:model="form.uraian" cols="80" rows="10"></textarea>
            </label>
        </div>
        <div class="modal-action flex justify-between">
            <button type="button" wire:click="closeModal" class="btn " >Close</button>
            <button  class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </form>
    </div>
</div>
