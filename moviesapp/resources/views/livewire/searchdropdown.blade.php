<div class="relative mt-3 md:mt-0" x-data="{isOpen:true}" @click.away="isOPen=false">
    
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 text-sm focus:outline:none" placeholder="search">
    <!-- <div class="absolute top-0">
        <svg fill="none" xmlns="http://www.w3.org/2000/svg"
        class="mt-1 ml-1 fill-current text-gray-500">
        <path d="M20.47 21.53a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-9.97-4.28a6.75 6.75 0 0 1-6.75-6.75h-1.5a8.25 8.25 0 0 0 8.25 8.25v-1.5ZM3.75 10.5a6.75 6.75 0 0 1 6.75-6.75v-1.5a8.25 8.25 0 0 0-8.25 8.25h1.5Zm6.75-6.75a6.75 6.75 0 0 1 6.75 6.75h1.5a8.25 8.25 0 0 0-8.25-8.25v1.5Zm11.03 16.72-5.196-5.197-1.061 1.06 5.197 5.197 1.06-1.06Zm-4.28-9.97c0 1.864-.755 3.55-1.977 4.773l1.06 1.06A8.226 8.226 0 0 0 18.75 10.5h-1.5Zm-1.977 4.773A6.727 6.727 0 0 1 10.5 17.25v1.5a8.226 8.226 0 0 0 5.834-2.416l-1.061-1.061Z"></path></svg>
    </div> -->
    <div wire:loading class="top-0 right-0 mr-2 mt-1 absolute">
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    @if (strlen($search>2))
        <div class="absolute bg-gray-800 rounded w-64 mt-4 text-sm" x-show="isOpen">
            @if ($searchResults -> count() > 0 )
                <ul>
                    
                    @foreach($searchResults as $searchResult)
                        <li class="border-b border-gray-700 ">
                            <a href="{{ url( 'movies' , $searchResult['id'] )}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                                @if ($searchResult['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{$searchResult['poster_path']}}" alt="" class='w-8'>
                                @else
                                    <img src="http://via.placeholder.com/50x75" alt="" class="w-8">
                                @endif
                                {{ $searchResult['original_title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">
                    No Results
                </div>
            @endif
        </div>
    @endif
    
</div>
