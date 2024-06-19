<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Data Peserta</h2>
                <button class="btn btn-sm btn-outline btn-default"><x-tabler-file-spreadsheet class="text-green-500 size-5" /> Export</button>
            </div>

          <div class="flex justify-between">
            <div></div>
            <input type="text" wire:model.live="search" class="input input-bordered" placeholder="Pencarian">

        </div>
          <div class="overflow-x-auto">
            <table class="table">
              <!-- head -->
              <thead>
                <tr >
                  <th class="w-2">No</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Prodi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr class="hover:bg-slate-100">
                  <th>1</th>
                  <td>Cy Ganderton</td>
                  <td>Quality Control Specialist</td>
                  <td>Blue</td>
                  <td>
                    <button class="btn btn-xs btn-square"><x-tabler-edit class="size-4"/></button>
                    <button class="btn btn-xs btn-square"><x-tabler-trash class="text-red-500 size-4"/></button>
                </td>
                </tr>
                <tr class="hover:bg-slate-100">
                  <th>2</th>
                  <td>Cy Ganderton</td>
                  <td>Quality Control Specialist</td>
                  <td>Blue</td>
                  <td>Blue</td>
                </tr>
                <tr class="hover:bg-slate-100">
                  <th>3</th>
                  <td>Cy Ganderton</td>
                  <td>Quality Control Specialist</td>
                  <td>Blue</td>
                  <td>Blue</td>
                </tr>
                <!-- row 2 -->

              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
