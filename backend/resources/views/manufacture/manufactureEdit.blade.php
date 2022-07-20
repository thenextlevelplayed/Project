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
                        <form method="post" action="/manufacture/edit/{{$manu->mid}}" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="container p-5">
                                <div>
                                    <div class="col-md-12 card-title text-center">
                                        <h3>凱茂資訊 工單管理</h3>
                                    </div>
                                    <div class="container-fluid row justify-content-end" style="padding-right: 0px">
                                        <?php
                                        if($manu->mstatus == 'Y'){
                                        ?>
                                        <div class="form-check" style="margin-right: 30px">
                                            <input type="radio" name="inlineRadioOptions"
                                                id="flexRadioDefault1" value="Y" checked>
                                            <label for="flexRadioDefault1" style="font-size: 20px">
                                                已完成
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="inlineRadioOptions"
                                                id="flexRadioDefault2" value="N">
                                            <label for="flexRadioDefault2" style="font-size: 20px">
                                                未完成
                                            </label>
                                        </div>                                        
                                        <?php
                                        }
                                        elseif($manu->mstatus == 'N' or $manu->mstatus ==''){
                                        ?>
                                        <div class="form-check" style="margin-right: 30px">
                                            <input type="radio" name="inlineRadioOptions"
                                                id="flexRadioDefault1" value="Y">
                                            <label for="flexRadioDefault1" style="font-size: 20px">
                                                已完成
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="inlineRadioOptions"
                                                id="flexRadioDefault2" value="N" checked>
                                            <label for="flexRadioDefault2" style="font-size: 20px">
                                                未完成
                                            </label>
                                        </div>                                            
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">工單編號</label>
                                            <input class="form-control" type="text" placeholder="{{ $manu->mid }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶聯絡人</label>
                                            <input class="form-control" type="text" placeholder="{{ $manu->qcontact }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶名稱</label>
                                            <input class="form-control" type="text" placeholder="{{ $manu->cname }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶信箱</label>
                                            <input class="form-control" type="text" placeholder="{{ $manu->cmail }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">客戶統編</label>
                                            <input class="form-control" type="text" placeholder="{{ $manu->cid }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">工單成立日期</label>
                                            <input class="form-control" type="text" placeholder="{{ $manu->mDate }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12 mb-3">
                                            <label for="exampleFormControlTextarea1">工單備註</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="mremark">{{$manu->mremark}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <div class="col-md-12 card-title text-center">
                                        <h4>工單商品內容</h4>
                                    </div>
                                    <table class="table table-hover">
                                        <thead class="text-primary" style="white-space: nowrap">
                                            <th>
                                                商品名稱
                                            </th>
                                            <th>
                                                商品型號
                                            </th>
                                            <th>
                                                商品數量
                                            </th>
                                            <th>
                                                商品備註
                                            </th>
                                            <th>
                                                完成
                                            </th>

                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    {{ $manu->mname }}
                                                </td>
                                                <td>
                                                    {{ $manu->mnumber }}
                                                </td>
                                                <td>
                                                    {{ $manu->quantity }}
                                                </td>
                                                <td>
                                                    <div style="width:300px">
                                                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="1" name="remark">{{ $dtl->remark }}</textarea>
                                                    </div>
                                                </td>
                                                <?php
                                                if($dtl->pstatus == 'Y'){
                                                ?>
                                                <td style="text-align: center">
                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" name="pstatus"
                                                        value="Y" checked>
                                                </td>
                                                <?php
                                                }elseif($dtl->pstatus == 'N' || $dtl->pstatus == ""){
                                                ?>
                                                <td style="text-align: center">
                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" name="pstatus"
                                                        value="N">
                                                </td>
                                                <?php
                                                }
                                                ?>                                                                                                
                                            </tr>
                                            

                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class = "container-fluid border">
                                    <br>
                                    <br>
                                    
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                        企業方案：<br>
                                        週年慶滿千送百
                                    </div>
                                    <div class="col-md-6 mb-1 bg-light p-4 border border-white">
                                        業務專員：林小姐<br>
                                        凱茂信箱：km2468@gmail.com
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-5 mb-3">
                                    <div class="col-md-2 p-1">
                                        <a href = "/main/manufacture/pdf/view/{manufactureId}">
                                            <button class="btn btn-primary btn-block">
                                                <i class="fa-regular fa-eye"></i> &nbsp;預覽pdf
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <a href = "/main/manufacture/pdf/{manufactureId}">
                                            <button class="btn btn-primary btn-block">
                                                <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp;匯出pdf
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-2 p-1">
                                            <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-primary btn-block"><i class="far fa-save"></i>&nbsp;存檔</button>
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <a href='/main/manufacture/'>
                                            <button class="btn btn-danger btn-block">
                                                <i class="fa-solid fa-x"></i> &nbsp;取消
                                            </button>
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
