<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Dashboard</h2>

            </div>
            <div class="stats shadow">
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <div class="stat">
                        <div class="stat-figure text-default">
                          <x-tabler-users class="inline-block w-8 h-8 stroke-current"/>
                        </div>
                        <div class="stat-title">Total Peserta</div>
                        <div class="stat-value text-primary">{{ $jumlah_peserta }}</div>
                        <div class="stat-desc">Jumlah Peserta yang telah terdaftar pada sistem Asesmen</div>
                      </div>

                      <div class="stat">
                        <div class="stat-figure text-secondary">
                            <div class="stat-figure text-primary">
                                <x-tabler-books class="inline-block w-8 h-8 stroke-current"/>
                            </div>
                        </div>
                        <div class="stat-title">Mata Kuliah</div>
                        <div class="stat-value text-secondary">{{ $jumlah_matakuliah }}</div>
                        <div class="stat-desc">Jumlah Mata Kuliah </div>
                      </div>

                      <div class="stat">
                        <div class="stat-figure text-secondary">
                            <div class="stat-figure text-success">
                                <x-tabler-user-check class="inline-block w-8 h-8 stroke-current"/>
                            </div>
                        </div>
                        <div class="stat-value">{{ $jumlah_peserta_selesai}}</div>
                        <div class="stat-title">Peserta Yang telah selesai Asesmen</div>
                        <div class="stat-desc text-secondary">{{ $sisa_peserta }} Sisa peserta yang belum selesai</div>
                      </div>
                </div>


              </div>

        </div>
      </div>
</div>
