                    <!-- Modal -->
                    <div class="modal fade" id="bidangTujuan" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{route('surat-keluar.bidang-tujuan', ['id' => $id])}}" method="post"
                                class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Tambah Tujuan Kasubbag</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id" name="id">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="asalSurat" class="form-label">Tujuan Bidang</label>
                                            <input type="text" id="asalSurat" name="bidang" class="form-control"
                                                required placeholder="Masukkan Asal Surat"
                                                value="{{ old('asalSurat') }}" />
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