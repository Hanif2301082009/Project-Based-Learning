<h2>Daftar Produk</h2>
<a href="/customer/create">Tambah Produk</a>
<ul>
@foreach($customer as $item)
    <li>
        {{ $item['name'] }} - Rp {{ number_format($item['address']) }}
        <a href="/customer/{{ $item['id'] }}/edit">Edit</a>
        <form action="/customer/{{ $item['id'] }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </li>
@endforeach
</ul>
