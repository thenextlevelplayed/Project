{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('main.head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/news">前台最新消息管理</a>
    </h4>
@endsection
@section('searchBox')

@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary" style="white-space: nowrap">
                                    <th>
                                        <div class="justify-content-center">
                                            消息編號
                                        </div>
                                        
                                    </th>
                                    <th>
                                        消息標題
                                    </th>

                                    <th>
                                        消息圖片
                                    </th>
                                    <th>
                                        消息內容
                                    </th>

                                    <th>
                                        編輯
                                    </th>

                                    <th>
                                        刪除
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($news as $n)
                                        <tr>
                                            <td>
                                            <div class="text-primary"style="text-align:center;font-weight:600;">
                                            {{ $n->newsid }}
                                            </div>
                                                
                                            </td>
                                            <td>
                                                {{ $n->title }}
                                            </td>
                                            <td>
                                                <div>
                                                <img src="\newsImg\{{ $n->img }}" alt="" id="showImg"
                                                style="max-height:150px"><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class ="p-4">
                                                {{ $n->content }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="/news/edit/{{ $n->newsid }}">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </td>

                                            <td>
                                                <form class="delform" action="/news/{{ $n->newsid }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger btn-sm delBtn"
                                                        data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right mr-5 mb-3">
                        <a class="btn btn-primary" href="/news/create">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <span>新增最新消息</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- bootstrap對話框 --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="button" id="okBtn" class="btn btn-primary">確定</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>

        let delform; 

        $('.delBtn').click(function() {

            delform = $(this).closest('form');
            // console.log(this,delform)
            $('#exampleModal').modal('show');

        })

        $('#okBtn').click(function() {
            
            delform.submit();
            $('#exampleModal').modal('hide');
        })

    </script>
@endsection
