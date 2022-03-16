<div class="card sidebar-card">
    <div class="card-body p-0">
        <img src="{{asset('frontend/images/sobapoti.jpg')}}">
        <div>
            মোঃ মফিজ উদ্দিন
            সভাপতি
            বাংলাদেশ শিক্ষক সমিতি
            জামালপুর জেলা শাখা
            মোবাইল- 01712232456
        </div>
    </div>
</div>
<div class="card sidebar-card">
    <h5 class="card-header">Facebook Group</h5>
    <div class="card-body p-0">
        <iframe
            src="https://www.facebook.com/plugins/group.php?href=https%3A%2F%2Fwww.facebook.com%2Fgroups%2F701905733204557&width=250&show_social_context=true&show_metadata=false&appId=718444211993286&height=274"
            width="250" height="274" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
</div>

@php
$notices = Luova\Post\Models\Category::where(['slug' => 'notice-board'])->first();

@endphp
@if($notices)
<div class="card sidebar-card mt-3">
    <h5 class="card-header">Useful Links</h5>
    <div class="card-body">
        <ul class="notice-list">
            @foreach ($notices->posts as $item)
            <li> <a href="{{$item->slug}}">{{$item->title}}</a></li>
            @endforeach

        </ul>
    </div>
</div>

@endif

<div class="card sidebar-card">
    <h5 class="card-header">National Hotline</h5>
    <div class="card-body p-0">
        <img src="https://www.riverpolice.gov.bd/wp-content/uploads/2020/02/National-Helpline1001.jpg">
    </div>
</div>