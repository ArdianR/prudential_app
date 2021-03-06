@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Hasil Rekomendasi Produk
		</div>

		<div class="panel-body">
			<h4>Counter Pengunjung {{ $riwayat->id }}</h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Identitas</th>
							<th>Kriteria</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<dl class="dl-horizontal">
									<dt>Nama</dt>
									<dd>{{ $riwayat->nama }}</dd>
									<dt>Alamat</dt>
									<dd>{{ $riwayat->alamat }}</dd>
									<dt>Kontak</dt>
									<dd>{{ $riwayat->kontak }}</dd>
									<dt>E-mail</dt>
									<dd>{{ $riwayat->email }}</dd>
									<dt>Rekomendasi</dt>
									<dd>{{ $riwayat->limit }}</dd>
									<dt>Tanggal</dt>
									<dd>{{ $riwayat->created_at->format('d F Y, H:i:s') }}</dd>
								</dl>
							</td>

							<td>							
								<dl class="dl-horizontal">
									@php
										$kriteriaUser = json_decode($riwayat->kriteria);
									@endphp

									@foreach($kriteriaUser as $kriteria)
										<dt>{{ $kriteria->kriteria }}</dt>
										<dd>
											{{ number_format($kriteria->nilai) }}
										</dd>
									@endforeach
								</dl>								
							</td>
						</tr>
					</tbody>
				</table>
			</div>								

			<hr>									

			<h4>Rekomendasi</h4>

			@php
				$no = 1;
			@endphp

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Produk</th>
							<th>Nilai</th>
						</tr>
					</thead>

					<tbody>
						@foreach(json_decode($riwayat->hasil) as $data)				
							<tr>
								<td>{{ $no++ }}</td>
								<td>
									<a target="_blank" href="{{ route('produk.show', $data->produk_id) }}">
										{{ $data->produk_title }}
									</a>
								</td>
								<td>{{ $data->hasil }}</td>
							</tr>						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel-footer">
			<a href="{{ route('konsultasi.registrasi') }}" class="btn btn-default">Kembali</a>
			<a href="{{ route('konsultasi.cetak', $riwayat->id) }}" class="btn btn-warning" target="_blank">Cetak</a>
		</div>
	</div>
@endsection