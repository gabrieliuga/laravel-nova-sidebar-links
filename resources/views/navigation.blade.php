@if(isset($groups) && $groups->count())
    @foreach($groups as $group)
    <h3 class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
        <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill="var(--sidebar-icon)"
                  d="M3 1h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3h-4zM3 11h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4h-4z"/>
        </svg>
        <span class="sidebar-label">
            {{ $group->name }}
        </span>
    </h3>
        @if($group->links->count())
            <ul class="list-reset mb-8">
                @foreach($group->links as $link)
                    <li class="leading-tight mb-4 ml-8 text-sm"><a href="{{ $link->url }}" target="{{ $link->type }}" class="text-white text-justify no-underline dim router-link-exact-active">{{ $link->name }}</a></li>
                @endforeach
            </ul>
        @endif
    @endforeach
@endif
@if(isset($links) && $links->count())
    <ul class="list-reset mb-8">
        @foreach($links as $link)
            <li class="leading-tight mb-4 ml-8 text-sm"><a href="{{ $link->url }}" target="{{ $link->type }}" class="text-white text-justify no-underline dim router-link-exact-active">{{ $link->name }}</a></li>
        @endforeach
    </ul>
@endif
