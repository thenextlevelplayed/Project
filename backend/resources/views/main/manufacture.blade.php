{{-- navbar引入 --}}
@extends('main.navbar')

{{-- head帶入 --}}
@section('main.head')
@endsection

@section('navTitle')
    <h4>
        <a class="navbar-brand" href="/main/manufacture">工單管理</a>
    </h4>
@endsection
@section('searchBox')
    <input type="search" class="form-control" name="query" placeholder="輸入單號或客戶名稱">
    <span class="input-group-addon" onclick="searchform.submit()">
        <i class="now-ui-icons ui-1_zoom-bold"></i>
    </span>
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
                                        工單編號
                                    </th>
                                    <th>
                                        客戶名稱
                                    </th>
                                    <th>
                                        工單狀態
                                    </th>
                                    <th>
                                        編輯
                                    </th>
                                    {{-- <th>
                                        出貨單號
                                    </th> --}}
                                </thead>
                                <tbody>
                                    @foreach ($manufacture as $mInfo)
                                        <tr>
                                            <td>
                                                <a href="/main/manufacture/{{ $mInfo->mid }}">
                                                    {{ $mInfo->mrownumber }}
                                            </td>
                                            <td>
                                                {{ $mInfo->cname }}
                                            </td>
                                            <td>
                                                <?php
                                                $host = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $dbname = 'backend';
                                                
                                                $conn = new mysqli($host, $username, $password, $dbname);
                                                
                                                $conn->query("CALL manufactureStatus($mInfo->oid ,@mDStatus,@mNStatus)");
                                                $result = $conn->query('SELECT @mDStatus as MDS,@mNStatus as MNS');
                                                $row = $result->fetch_assoc();
                                                
                                                $mDStatus = $row['MDS'];
                                                $mNStatus = $row['MNS'];
                                                
                                                echo $mNStatus . '/' . $mDStatus . '   ';
                                                
                                                if ($mNStatus / $mDStatus == 1 && $mInfo->mstatus == 'Y') {
                                                    echo "<span class='badge bg-success'>已成立出貨單</span>";
                                                } elseif ($mNStatus / $mDStatus == 1){
                                                    echo "<span class='badge bg-warning'>工單已完成</span>";
                                                }
                                                else {
                                                    echo "<span class='badge bg-danger'>工單未完成</span>";
                                                }
                                                
                                                // if ($mInfo->mstatus == 'Y') {
                                                //     echo "<span class='badge bg-success'>已成立出貨單</span>";
                                                // } else {
                                                //     //沒有不秀
                                                // }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <a href="/manufacture/edit/{{ $mInfo->mid }}" <?php if ($mNStatus / $mDStatus == 1 && $mInfo->mstatus == 'Y') {
                                                    echo 'hidden';
                                                } ?>>
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></button>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
