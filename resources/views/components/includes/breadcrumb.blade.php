@props(['pageTitle' => ''])
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> {{ $pageTitle }}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">{{ $pageTitle }}</a></li>
        {{ $links  ?? ''}}
    </ul>
</div>