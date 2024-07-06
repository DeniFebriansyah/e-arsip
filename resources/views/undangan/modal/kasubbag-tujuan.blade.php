                    <!-- Modal -->
                    <div class="modal fade" id="kasubbagTujuan" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{route('undangan.kasubbag-tujuan', ['id' => $id])}}" method="post"
                                class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Tambah Tujuan Kasubbag</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col mb-3">
                                        <label for="asalSurat" class="form-label">Tujuan Kasubbag</label>
                                        <input type="text" id="asalSurat" name="kasubbag_tujuan" class="form-control"
                                            required placeholder="Masukkan Asal Surat" value="{{ old('asalSurat') }}" />
                                    </div>
                                    <div class="col mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea id="catatan" name="catatan" class="form-control" rows="3"
                                            placeholder="Masukkan Catatan...."></textarea>
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