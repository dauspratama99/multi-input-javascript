
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kategori</th>
          <th scope="col">Detail Makanan</th>

        </tr>
      </thead>
      @foreach ($detail as $item)
      <tbody>
        <tr>
          <th class="table-primary">{{ $loop->iteration  }}</th>
          <td >{{ $item->kategori }}</td>
          <td>{{ $item->detail_makanan }}</td>
        </tr>
    </tbody>
    @endforeach

  </table>
