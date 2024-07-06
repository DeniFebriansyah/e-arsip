                    <!-- Modal -->
                    <div class="modal fade" id="modaladd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{route('surat-masuk.store')}}" method="post" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Tambah Surat Masuk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="asal_surat" class="form-label">Asal Surat</label>
                                            <input type="text" id="asal_surat" name="asal_surat" class="form-control"
                                                required placeholder="Masukkan Asal Surat"
                                                value="{{ old('asal_surat') }}" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                            <input type="text" id="nomor_surat" name="nomor_surat" class="form-control"
                                                required placeholder="Masukkan Nomor Surat"
                                                value="{{ old('nomor_surat') }}" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                            <input type="date" id="tanggal_surat" name="tanggal_surat"
                                                class="form-control" required value="{{ old('tanggal_surat') }}" />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col mb-3">
                                            <label for="perihal" class="form-label">Perihal</label>
                                            <textarea id="perihal" name="perihal" class="form-control" rows="3" required
                                                placeholder="Masukkan Perihal">{{ old('perihal') }}</textarea>
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