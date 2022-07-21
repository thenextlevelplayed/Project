@extends('main.navbar')

@section('header')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> 凱茂資訊 進貨單</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <h5>進貨單資訊</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨單編號</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->kmpid }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>採購人員</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->staffname }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>進貨日期</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->bookdate }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>備註</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->remark }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5>廠商資訊</h5>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司名稱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->sname }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>公司統編</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->sid }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡信箱</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->smail }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <p>聯絡電話</p>
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $info[0]->stel }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h5>進貨明細</h5>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <table class="table" id="purchaseTable">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">商品名稱</th>
                                                <th scope="col">商品編號</th>
                                                <th scope="col">數量</th>
                                                <th scope="col">成本</th>
                                                <th scope="col">小計</th>
                                                <th scope="col">入庫狀態</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail as $det)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td class="col-2"> {{ $det->mname }}</td>
                                                    <td class="col-2"> {{ $det->mnumber }}</td>
                                                    <td class="col-2"> {{ $det->quantity }}</td>
                                                    <td class="col-2"> {{ $det->cost }}</td>
                                                    <td class="col-2"> {{ $det->quantity * $det->cost }}</td>
                                                    <td class="col-2"> <?php
                                                    
                                                    if ($det->pstatus == 'Y') {
                                                        echo "<span class='badge bg-success'>已入庫</span>";
                                                    } else {
                                                        //點集 入庫並寫入庫存表
                                                        echo "<span class='badge bg-danger stockin'>未入庫</span>";
                                                    }
                                                    ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mb-1 text-right">

                                    <div class="col-lg-10" style="font-size: 24px">
                                        <span class="mr-1">總計:</span>
                                        <span>
                                            NT.
                                            <?php
                                            $tot = 0;
                                            foreach ($detail as $det) {
                                                $tot += $det->quantity * $det->cost;
                                            }
                                            echo $tot;
                                            ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary mr-3" href="/main/purchase">
                    <span>回上頁</span>
                </a>
                <a class="btn btn-primary mr-3" href="/purchase/edit/{{$info[0]->bid}}">
                    <span>編輯</span>
                </a>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script></script>
@endsection
