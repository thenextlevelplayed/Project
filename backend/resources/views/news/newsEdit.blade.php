{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/quote">工單管理</a>
    </h4>
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/news/edit/{{ $newsEdit->newsid }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="container p-5">
                                <div>
                                    <div class="col-md-12 card-title text-center">
                                        <h3>楷模資訊 最新消息編輯</h3>
                                    </div>
                                    <div class="container-fluid row justify-content-end" style="padding-right: 0px">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFormControlTextarea2">消息圖片</label><br>
                                            <img src="\newsImg\{{ $newsEdit->img }}" alt="" id="showImg"
                                                style="max-height:300px"><br>
                                            <input type="file" class="mt-3" title="請選擇圖片" id="mainImg"
                                                name="mainImg" multiple accept="image/png,image/jpg,image/gif,image/JPEG" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-12 mb-3">
                                                <label for="exampleFormControlTextarea1">消息標題</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="title">{{ $newsEdit->title }}</textarea><br>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="exampleFormControlTextarea2">消息內容</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea2" rows="11" name="content">{{ $newsEdit->content }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                    </div>

                                    <div class="row">

                                    </div>
                                </div>

                                <div class="row justify-content-center mt-5 mb-3">
                                    <div class="col-md-2 p-1">
                                        <button type="submit" id="okOrCancel" name="okOrCancel"
                                            class="btn btn-primary btn-block"><i class="far fa-save"></i>&nbsp;存檔</button>
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <a href='/main/news' class="btn btn-danger btn-block">
                                            
                                                <i class="fa-solid fa-x"></i> &nbsp;取消
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#mainImg').on('change', function() {

            var tmppath = URL.createObjectURL(this.files[0]);
            // console.log(tmppath)
            $('#showImg').attr('src', tmppath)

        })
    </script>
@endsection
