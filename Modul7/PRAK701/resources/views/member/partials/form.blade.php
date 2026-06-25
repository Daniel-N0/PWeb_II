<div class="space-y-6">

    <x-input
        label="Nama Member"
        name="nama_member"
        placeholder="Masukkan nama member"
        :value="$member->nama_member ?? ''"
        required />

    <x-input
        label="Nomor Member"
        name="nomor_member"
        placeholder="Masukkan nomor member"
        :value="$member->nomor_member ?? ''"
        required />

    <x-textarea
        label="Alamat"
        name="alamat"
        placeholder="Masukkan alamat lengkap"
        :value="$member->alamat ?? ''"
        required />

    <x-input
        label="Tanggal Mendaftar"
        name="tgl_mendaftar"
        type="date"
        :value="isset($member) ? \Carbon\Carbon::parse($member->tgl_mendaftar)->format('Y-m-d') : ''"
        required />

    <x-input
        label="Tanggal Terakhir Bayar"
        name="tgl_terakhir_bayar"
        type="date"
        :value="isset($member) ? \Carbon\Carbon::parse($member->tgl_terakhir_bayar)->format('Y-m-d') : ''"
        required />

</div>
