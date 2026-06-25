<div class="space-y-6">

    <x-input
        label="Judul Buku"
        name="judul"
        placeholder="Masukkan judul buku"
        :value="$buku->judul ?? ''"
        required />

    <x-input
        label="Penulis"
        name="penulis"
        placeholder="Masukkan nama penulis"
        :value="$buku->penulis ?? ''"
        required />

    <x-input
        label="Penerbit"
        name="penerbit"
        placeholder="Masukkan nama penerbit"
        :value="$buku->penerbit ?? ''"
        required />

    <x-input
        label="Tahun Terbit"
        name="tahun_terbit"
        type="number"
        min="1801"
        max="{{ date('Y') }}"
        placeholder="Contoh: 2024"
        :value="$buku->tahun_terbit ?? ''"
        required />

</div>
