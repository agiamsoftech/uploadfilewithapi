@extends('layouts.app')

@section('content')
<style>
    .row{
        text-align: center;
        padding: 50px;
        display: unset !important;
    }
    .width40{
        width: 40% !important;
    }
</style>
<div class="container width40">
    <div class="row">  
        <form action="" method="post">
            <h2>Select image to upload:</h2>
            <input type="file" name="image_file" id="image_file" class="form-control">
            <br>
            <input type="button" value="Upload Image" name="submit" id="submit" class="btn btn-primary btn-sm" onclick="uploadfile()">
        </form>
    </div>
    
</div>
<script>
    function uploadfile(){
        var file_length   =   $("#image_file").val().length;
        if(file_length === 0){
            alert('Select File');
            return false;
        }

        var size = $('#image_file')[0].files[0].size;
        if(size > 500000){
            alert("Please upload file less than 500KB. Thanks!!");
            return false;
        }
                
        var token = $('input[name=_token]').val();
        var file_data = $("#image_file").prop("files")[0];
        var form_data = new FormData();
        form_data.append("image_file", file_data);
        form_data.append("_token", token);      
 
        $.ajax({
            url: '{{ route("home") }}',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(data){                     
                alert('File uploaded..');
                $("#image_file").val("");
            }
        });
    }
</script>
@endsection
