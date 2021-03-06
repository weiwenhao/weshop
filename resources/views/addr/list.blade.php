@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="/css/address.css"/>
    <style>

    </style>
@stop
@section('content')
    <!--顶部-->
    <div class="me-header-top">
        <div><a href="{{ request()->cookie('addrs_exit_url')?:url('me') }}"><span class="icon icon-back icon-lg"></span></a></div>
        <div>我的收货地址</div>
        <div></div>
    </div>
    <!--收货地址-->
    <div class="height-2rem"></div>
    @foreach($addrs as $addr)
        <div class="container me-address">
            <div class="row address">
                @if($addr->is_default)
                    <i class="icon icon-moren"><!--默认地址图标--></i>
                @endif
                <a href="" class="del-addr" addr_id="{{ $addr->id }}">
                    <div class="col-xs-1 me-a showIOSDialog1">
                        <i class="icon icon-roundclose icon-lg"></i>
                    </div>
                </a>
                <a href="{{ url('addrs/'.$addr->id.'/edit') }}">
                    <div class="col-xs-10 " >
                        <p>收货人:<b>{{ $addr->name }}</b> <tt>{{ $addr->phone }}</tt></p>
                        <p>惠州市技师学院，{{ $addr->floor_name }}，{{ $addr->number }}</p>
                    </div>
                    <div class="col-xs-1 me-a" name="addressGo">
                        <i class="icon icon-edit"></i>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
    <div class="weshop-center-block" style="display:{{ $addrs->toArray()?'none':'block' }}">
        <i class="icon icon-locationfill"></i>
        <div class="title">╮(￣▽￣")╭</div>
    </div>

    <a class="weui-btn weui-btn_primary new-address"  href="{{ url('addrs/create') }}">新增收货地址</a>
@stop
@section('js')
    <script type="text/javascript" src="/js/shopping_car.js"></script>
    <script>
        $('.del-addr').click(function (event) {
            event.preventDefault();

            let addr_id = $(this).attr('addr_id');
            if(!addr_id){
                weui.alert('系统错误,请联系客服');
                return;
            }
            weui.confirm('你确定要删除该收获地址吗？',  () =>{
                let loading = weui.loading('请稍等');
                setTimeout(function () { //如果超过5秒钟没有响应则自动关闭loading框,并提示一个超时响应
                    loading.hide(function() {
                        weui.topTips('请求超时', 3000);
                    });
                }, 5000);

                $.ajax({
                    type: "DELETE",
                    url: "/addrs/"+addr_id,
                    success: function(msg){
                        loading.hide(function () {
                            weui.toast('删除成功');
                        })
                        location.reload()
                    },
                    error: function (error) { //200系列以外的状态码走这里
                        loading.hide();
                        if(error.status == 403){
                            alert('系统错误,请联系客服');
                        }
                    }
                });
            });
        });
    </script>
@stop