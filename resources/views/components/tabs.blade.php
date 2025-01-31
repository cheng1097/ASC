<!-- Default Tabs -->
<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">

    @foreach ($tabs as $key => $tab)
        @php
            $active = $key == 0 ? 'active' : '';
        @endphp

        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $active }}" id="tab-{{ $key }}"
                data-bs-toggle="tab" data-bs-target="#tab{{ $key }}" type="button"
                role="tab" aria-controls="tab{{ $key }}" aria-selected="true">
                {{ $tab[$title] }}
            </button>
        </li>
    @endforeach

</ul>
<div class="tab-content pt-2" id="myTabContent">

    @foreach ($tabs as $key => $tab)
        @php
            $active_show = $key == 0 ? 'show active' : '';
        @endphp

        <div class="tab-pane fade {{ $active_show }}" id="tab{{ $key }}" role="tabpanel"
            aria-labelledby="tab-{{ $key }}">
            {{ $tab['action'] }}
        </div>
    @endforeach

</div><!-- End Default Tabs -->