@extends('layout.index')
{{--修改继承过来的标题, 用 yield('title') 标记--}}
@section('title', '继承页面')

{{--修改继承过来的 content, 修改标记好的 content 内容--}}
    @section('content')
        <div style="height:500px;background: azure"> new content</div>
    @endsection
{{--删除继承过来的 footer--}}
    @section('footer')
    @endsection

{{-- 为模板中的空标记添加内容 --}}
@section('js')
    <script>
        alert('js');
    </script>
@endsection


{{--@section('sidebar')--}}
    {{--@parent--}}

    {{--<p>这边会附加在主要的侧边栏。</p>--}}
{{--@endsection--}}

{{--@section('content')--}}
    {{--<p>这是我的主要内容。</p>--}}
{{--@endsection--}}
