<div class="text-center">
    <ul class="nav nav-tabs nav-justified mt-4 col-sm-6 custom-tabs">
        @foreach ($menusTabs as $key => $item)
        <li class="nav-item">
            <a class="nav-link {{$item[1] == url_tab(1) ? 'active': ''}}" href="{{$item[0]}}">{{$key}}</a>
        </li>
        @endforeach
    </ul>
</div>

<style>
.custom-tabs {
    border: none;
    margin: 0 auto;
    padding: 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.custom-tabs .nav-item {
    margin: 0;
    padding: 0;
}

.custom-tabs .nav-link {
    border: none;
    border-radius: 0;
    padding: 12px 20px;
    font-weight: 500;
    color: #555;
    transition: all 0.3s ease;
    position: relative;
    background-color: #f8f9fa;
    border-bottom: 2px solid transparent;
}

.custom-tabs .nav-link:hover {
    color: #000;
    background-color: #f1f1f1;
    border-color: #ddd;
}

.custom-tabs .nav-link.active {
    color: #fff !important;
    background-color: #000 !important;
    border-color: #000;
}

.custom-tabs .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #000;
    transition: width 0.3s ease;
}

.custom-tabs .nav-link:hover::after {
    width: 100%;
}

/* Style responsive */
@media (max-width: 768px) {
    .custom-tabs {
        width: 95%;
    }
    
    .custom-tabs .nav-link {
        padding: 10px 15px;
        font-size: 0.9rem;
    }
}
</style>