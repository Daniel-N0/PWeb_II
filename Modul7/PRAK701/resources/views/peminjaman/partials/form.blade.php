<div class="space-y-6">

    <x-select
        label="Member"
        name="id_member"
        required>

        <option value="">
            Pilih Member
        </option>

        @foreach($members as $member)

            <option
                value="{{ $member->id }}"
                @selected(old('id_member', $peminjaman->id_member ?? '') == $member->id)>

                {{ $member->nama_member }}

            </option>

        @endforeach

    </x-select>

    <x-select
        label="Buku"
        name="id_buku"
        required>

        <option value="">
            Pilih Buku
        </option>

        @foreach($bukus as $buku)

            <option
                value="{{ $buku->id }}"
                @selected(old('id_buku', $peminjaman->id_buku ?? '') == $buku->id)>

                {{ $buku->judul }}

            </option>

        @endforeach

    </x-select>

    <x-input
        label="Tanggal Pinjam"
        name="tgl_pinjam"
        type="date"
        :value="isset($peminjaman)
            ? \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('Y-m-d')
            : ''"
        required />

    <x-input
        label="Tanggal Kembali"
        name="tgl_kembali"
        type="date"
        :value="isset($peminjaman)
            ? \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('Y-m-d')
            : ''"
        required />

</div>
