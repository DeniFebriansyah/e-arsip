                    <!-- Modal -->
                    <div class="modal fade" id="modaladd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{route('nota-dinas.store')}}" method="post" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Tambah Nota Dinas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="nomorSurat" class="form-label">Nomor Surat</label>
                                            <input type="text" id="nomorSurat" name="nomor_surat" class="form-control"
                                                required placeholder="Masukkan Nomor Surat"
                                                value="{{ old('nomor_surat') }}" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" id="tanggal" name="tanggal" class="form-control" required
                                                value="{{ old('tanggal') }}" />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col mb-3">
                                            <label for="perihal" class="form-label">Perihal</label>
                                            <input type="text" id="perihal" name="perihal" class="form-control" required
                                                placeholder="Masukkan Perihal" value="{{ old('perihal') }}" />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col mb-3">
                                            <label for="tujuan" class="form-label">Tujuan</label>
                                            <input type="text" id="tujuan" name="tujuan" class="form-control" required
                                                placeholder="Masukkan Tujuan" value="{{ old('tujuan') }}" />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col mb-3">
                                            <label for="bidang" class="form-label">Bidang</label>
                                            <input type="text" id="bidang" name="bidang" class="form-control" required
                                                placeholder="Masukkan Bidang" value="{{ old('bidang') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Tutup
                                    </button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>