<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="{{ route('post.category') }}" style="background-color: white;padding:20px;" method="post" enctype="multipart/form-data" class="row col-12">
            {{ csrf_field() }}
            <div class="form-group col-5">
                <label for="formGroupExampleInput">عنوان دسته</label>
                <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="نام دسته">
            </div>



            <div class="col-5">
            <div class="form-group col-12">
                <label for="inputGroupSelect02">سطح دسته</label>
                    <select class="custom-select " id="q" name="main_parent">
                            <option value="0">سطح اول</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
            </div>
            <div id="" class="form-group col-12">
                    <select class="custom-select " id="w" name="child_1_parent" style="display:none">

                    </select>
            </div>
            <div id="" class="form-group col-12">
                    <select class="custom-select " id="s" name="child_2_parent"  style="display:none">

                    </select>
            </div>
        </div class="col-md-6">

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                <script>
                    $("#q").change(function(){
                        var rid = this.value;
                        $.get("/role_based_permission/laravel5.7/public/category-selector/"+rid+"/child1", function(data){
                                $('#w').html(data);
                                $('#w').css('display' , "block");
                                if(rid == 0){
                                    $('#w').css('display' , "none");
                                    $('#s').css('display' , "none");
                                }
                        });
                    });
                    $("#w").change(function(){
                        var rid = this.value;
                        $.get("/role_based_permission/laravel5.7/public/category-selector/"+rid+"/child2", function(data){
                                $('#s').html(data);
                                $('#s').css('display' , "block");
                                if(rid == 0){
                                    $('#s').css('display' , "none");
                                }

                        });
                    });

                </script>
                <button type="submit" class="btn btn-primary">Submit</button>

        </form>
</body>
</html>
