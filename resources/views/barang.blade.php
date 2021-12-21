<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>




 {{-- ini untuk tombol alert ketika berhasil simpan --}}
 @if (session('status'))
 <div class="alert alert-success">
     {{ session('status') }}
 </div>
     @endif

<a href="{{ url('/tampil') }}" class="btn btn-primary">Tampil Data</a>

    <div class="container my-5">
		<div class="row">
			<div class="col-md-8">
                    <div class="form-group">
                    <select class="form-control" id="tmakanan" aria-label="Default select example" name="tmakanan" style="width: 50%">
                        @foreach ($barang as $item)
                        <option value="{{ $item->id_barang }}" >{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>

                    <br><br>
				    <div class="form-group fieldGroup">
				        <div class="input-group">
				            <input type="text" id="detail_makanan" name="detail_makanan[]" class="form-control" placeholder="Masukan Detail Makanan"/>

				            <div class="input-group-addon ml-3">
				                <a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
				            </div>
				        </div>
				    </div>
                {{-- =================================================================================== --}}
				    <button class="btn btn-primary" type="button" onclick="simpan()">Submit</button>

				<div class="form-group fieldGroupCopy" style="display: none;">
				    <div class="input-group">
                        <input type="text" id="" name="detail_makanan[]" class="form-control detail_makanan" placeholder="Masukan Detail Makanan"/>

				        <div class="input-group-addon">
				            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
    <script>
	$(document).ready(function(){

    // membatasi jumlah inputan
    var maxGroup = 10;

    //melakukan proses multiple input

    // cek di submit ada gak class addmore kalau ada  buat .addMore dari class submit karna dia menggunakan class maka nya titik, kalau dia dikenal kan id maka gunakan #
    $(".addMore").click(function(){

        //ini di ambil dari body nya
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });

    //remove fields group
    $("body").on("click",".remove",function(){
        $(this).parents(".fieldGroup").remove();
    });
});

function simpan()
     {
    var kategori = $('#tmakanan').val()
    // var detail_makanan = $('#detail_makanan').val();


            var tmp = []
			var input = document.getElementsByName('detail_makanan[]');

			for (var i = 0; i < input.length; i++) {
				var a = input[i];
                tmp.push(a.value);
			}

    // cara kerja ajax
    $.ajax({
                        method: "POST",
                        url: "{{ route('proses.tambah') }}",
                        data: {
                            tmakanan: kategori,
                            detail_makanan:tmp,
                            "_token" : "{{ csrf_token() }}"
                        }
                    })
                    .done(function(response, textStatus, xhr) {
                        console.log(response)
                    });
}
	</script>



