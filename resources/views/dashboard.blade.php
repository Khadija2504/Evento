<x-app-layout>

    <div class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <!--Left Col-->
          <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">What business are you?</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
              Main Hero Message to sell yourself!
            </h1>
            <p class="leading-normal text-2xl mb-8">
              Sub-hero message, not too long and not too short. Make it just right!
            </p>
            <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              Subscribe
            </button>
          </div>
          <!--Right Col-->
          <div class="w-full md:w-3/5 py-6 text-center">
            <img class="w-full md:w-4/5 z-50" src="../imgs/bg_stack.png" />
          </div>
        </div>
      </div>
      <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
              ></path>
              <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path
                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
              ></path>
            </g>
          </g>
        </svg>
      </div>
    </div>

    @role('utilisateur')
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>Get by category</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                @foreach ($categories as $category)
                    <form action="{{route('filtre', $category->id)}}" method="GET">
                        <button type="submit">{{$category->category_name}}</button>
                    </form>
                @endforeach
            </x-slot>
        </x-dropdown>
    </div>

    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>Get by date</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <form action="{{route('filtreDate', 'thisDay')}}" method="GET">
                    @csrf
                    <button type="submit">This Day</button>
                </form>
                <form action="{{route('filtreDate', 'thisMonth')}}" method="GET">
                    @csrf
                    <button type="submit">This Month</button>
                </form>
                <form action="{{route('filtreDate', 'thisWeek')}}" method="GET">
                    @csrf
                    <button type="submit">This Week</button>
                </form>
                <form action="{{route('filtreDate', 'thisYear')}}" method="GET">
                    @csrf
                    <button type="submit">This Year</button>
                </form>
            </x-slot>
        </x-dropdown>
    </div>

    <div>the most categories used</div>
    
    {{-- categories --}}
    <div class="browse-section">
        <section class="iconCategoryBrowse" data-testid="icon-category-browse">
            
            <div class="iconCategoryWrapper flex flex-row justify-center items-center" style="gap: 5%; overflow: scroll;">
                <a data-testid="category-card" data-heap-id="homepage-category-tiles">
                    @foreach ($music as $category)
                    <form action="{{route('filtre', $category->id)}}">
                        <button type="submit" class="iconCategoryCard flex flex-col justify-center items-center">
                            <div class="iconCategoryCardImageWrapper">
                                <svg width="40" height="41" fill="none" viewBox="0 0 40 41"><g id="mic_svg__icon_selection">
                                    <path id="mic_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M12.813 5.003a7.812 7.812 0 00-4.705 14.05 2.5 2.5 0 004.24 2.137l.556-.555 12.322 10.47c.247.21.614.195.845-.033l.517-.512c.494.43 1.141.693 1.85.693a2.8 2.8 0 001.497-.431l3.998 3.998a.625.625 0 00.884-.884l-3.998-3.998a2.8 2.8 0 00.43-1.497c0-.698-.254-1.337-.674-1.828l.546-.54a.625.625 0 00.035-.85L20.633 12.905l.554-.554a2.5 2.5 0 00-2.137-4.24 7.801 7.801 0 00-6.237-3.109zm15.624 25c-.36 0-.692-.122-.956-.327l2.201-2.18a1.562 1.562 0 01-1.245 2.507zm-8.691-16.21L18.1 15.439a.625.625 0 11-.884-.884l3.087-3.087A1.25 1.25 0 0018.535 9.7L9.697 18.54a1.25 1.25 0 101.768 1.768l3.072-3.073a.625.625 0 01.884.884l-1.63 1.63L25.599 29.78l4.23-4.188-10.083-11.799zm-1.882-5.166a6.548 6.548 0 00-5.127-2.373l3.7 3.778 1.215-1.216c.068-.068.139-.131.212-.19zm-6.678-2.17a6.543 6.543 0 00-2.551 1.298l4.933 4.962a.626.626 0 01.082.101l1.902-1.902-4.366-4.46zM7.751 8.639a6.543 6.543 0 00-1.297 2.55l4.465 4.36 1.866-1.866a.632.632 0 01-.103-.085l-4.93-4.96zm-1.5 4.099v.078c0 2.03.922 3.847 2.372 5.051.059-.073.122-.144.19-.212l1.222-1.222-3.784-3.695zm14.816 4.948a.625.625 0 00-.884.884l1.25 1.25a.625.625 0 10.884-.884l-1.25-1.25z" fill="#39364F">
                                    </path></g>
                                </svg>
                            </div>
                            <p class="iconCategoryCardTitle eds-text-weight--heavy">{{$category->category_name}}</p>
                        </button>
                    </form>
                    @endforeach
                </a>
                <a data-testid="category-card" data-heap-id="homepage-category-tiles">
                    @foreach ($art as $category)
                    <form action="{{route('filtre', $category->id)}}">
                        <button type="submit">
                        <div class="iconCategoryCard">
                        <div class="iconCategoryCardImageWrapper">
                            <svg width="40" height="41" fill="none" viewBox="0 0 40 41">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.625 5.002a.625.625 0 00-.623.67l.992 13.75a.632.632 0 00.006.056c.214 4.119 3.598 7.4 7.75 7.4a7.69 7.69 0 004.588-1.512l.16 2.173c.181 4.149 3.578 7.463 7.752 7.463 4.174 0 7.571-3.314 7.754-7.464l.994-13.74a.625.625 0 00-.623-.67h-.206a.62.62 0 00-.12.01c-1.894.374-4.678.614-7.799.614-1.544 0-3.009-.059-4.325-.164l.573-7.916a.625.625 0 00-.623-.67h-.206a.626.626 0 00-.12.012c-1.894.373-4.678.613-7.799.613-3.121 0-5.905-.24-7.798-.613a.625.625 0 00-.121-.012h-.206zm16.21 9.833l-.331 4.578a7.815 7.815 0 01-1.991 4.884l.232 3.16v.02c.15 3.494 3.009 6.275 6.505 6.275s6.355-2.78 6.505-6.277v-.008l.001-.01.94-12.983c-1.953.33-4.576.528-7.446.528-1.571 0-3.065-.06-4.415-.167zM13.75 6.877c-2.87 0-5.493-.199-7.446-.528l.932 12.913c.005.029.009.059.01.09.149 3.494 3.008 6.275 6.504 6.275 3.496 0 6.355-2.78 6.505-6.277l.001-.018.94-12.983c-1.953.33-4.576.528-7.446.528z" fill="#3A3247">
                                </path>
                                    <path d="M15.148 11.062h.003l.014-.004a5.129 5.129 0 01.293-.076c.2-.047.477-.106.787-.152.653-.097 1.32-.115 1.734.04.33.123.624.325.842.51a3.45 3.45 0 01.308.292l.013.014.001.002a.625.625 0 00.953-.809l-.477.404.477-.404-.002-.002-.001-.001-.002-.002-.008-.01a3.204 3.204 0 00-.12-.13 4.746 4.746 0 00-.337-.311 4.195 4.195 0 00-1.21-.725c-.738-.275-1.684-.204-2.355-.104a10.768 10.768 0 00-1.235.26l-.02.006-.007.002h-.002s-.001.001.172.59l-.172-.59a.626.626 0 00.351 1.2zM24.783 19.163a.625.625 0 00.49-1.15l-.245.575.246-.575h-.002l-.002-.002-.008-.002-.022-.01a5.257 5.257 0 00-.343-.121 6.967 6.967 0 00-.93-.223c-.765-.13-1.82-.18-2.918.175a.625.625 0 10.384 1.19c.845-.273 1.684-.241 2.326-.133a5.709 5.709 0 01.966.253l.048.019.01.004zM33.437 19.689c-1.099-.42-2.234-.802-3.308-.764-.337.012-.61.094-.821.234-.206.136-.39.35-.516.695-.263.719-.268 1.992.39 4.07.03.1.07.206.12.337l.076.204c.079.214.166.467.224.727.107.486.159 1.238-.468 1.746-.688.557-1.547.31-2.013.116a4.535 4.535 0 01-.904-.512l-.017-.013-.005-.004-.002-.001-.001-.001.357-.468-.357.468a.625.625 0 01.758-.994s.001.001-.379.497l.38-.496.007.005a2.295 2.295 0 00.175.118c.124.078.29.172.47.248.423.176.648.143.743.066.041-.033.12-.122.035-.505a4.523 4.523 0 00-.176-.566l-.059-.157c-.055-.147-.114-.305-.157-.438-.684-2.161-.778-3.764-.37-4.877.209-.572.55-1.011.999-1.308.443-.293.953-.422 1.467-.44 1.357-.048 2.71.43 3.798.845a.625.625 0 01-.446 1.168zM28.066 30.276a.625.625 0 00-.027-.884c-1.541-1.45-3.365-1.555-4.997-1.16a.625.625 0 00.294 1.215c1.369-.331 2.708-.216 3.847.855a.625.625 0 00.883-.026zM9.871 10.8c-1.082-.038-2.306.277-3.298.712a.625.625 0 11-.502-1.145c1.106-.484 2.52-.863 3.844-.816.514.018 1.024.147 1.467.44.448.297.79.736 1 1.308.407 1.113.313 2.716-.371 4.877-.042.133-.102.29-.157.437l-.059.158a4.523 4.523 0 00-.177.566c-.084.383-.006.471.035.505.096.077.321.11.744-.066a3.285 3.285 0 00.645-.366l.007-.005a.626.626 0 01.76.993l-.38-.497.38.497-.003.002-.006.004-.017.013a3.585 3.585 0 01-.25.17c-.161.1-.39.232-.654.342-.466.195-1.326.44-2.013-.116-.627-.508-.575-1.26-.468-1.746.058-.26.145-.513.224-.727l.076-.204c.049-.13.09-.237.12-.337.658-2.077.653-3.351.39-4.07-.126-.344-.31-.56-.516-.695-.211-.14-.484-.222-.821-.234zM16.62 20.41a.625.625 0 10-.857-.91c-1.138 1.071-2.478 1.187-3.847.855a.625.625 0 10-.294 1.215c1.632.395 3.456.291 4.997-1.16zM23.714 20.628a.977.977 0 011.004.95.977.977 0 01-.935 1.018c-.562.02-.983-.436-1.001-.95-.018-.514.37-.999.932-1.018z" fill="#3A3247">
                                    </path>
                                <path d="M31.214 20.628a.977.977 0 011.004.95.977.977 0 01-.935 1.018c-.562.02-.983-.436-1.001-.95-.018-.514.37-.999.932-1.018zM16.286 12.503a.977.977 0 00-1.004.95.977.977 0 00.935 1.019c.562.02.983-.437 1.001-.951.018-.514-.37-.999-.932-1.018zM8.786 12.503a.977.977 0 00-1.004.95.977.977 0 00.935 1.019c.562.02.983-.437 1.001-.951.018-.514-.37-.999-.932-1.018z" fill="#3A3247">
                                </path>
                            </svg>
                        </div>
                        <p class="iconCategoryCardTitle eds-text-weight--heavy">{{$category->category_name}}</p>
                    </div>
                        </button>
                    </form>
                    @endforeach
                </a>
                <a data-testid="category-card" data-heap-id="homepage-category-tiles">
                    @foreach ($health as $category)
                    <form action="{{route('filtre', $category->id)}}">
                        <button type="submit" class="iconCategoryCard flex flex-col justify-center items-center">
                            <div class="iconCategoryCard">
                                <div class="iconCategoryCardImageWrapper">
                                    <svg width="32" height="32" fill="none" viewBox="0 0 32 32">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75 5a.75.75 0 00-.75.75v.833a.75.75 0 101.5 0V5.75A.75.75 0 008.75 5zM7 5.75a1.75 1.75 0 113.5 0v.833a1.75 1.75 0 01-3.45.415A.506.506 0 017 7a1 1 0 00-.999.997l.017.088c.016.079.04.184.074.316.067.263.163.613.28 1.023.233.819.544 1.86.856 2.888A473.596 473.596 0 008.368 16h1.36a.5.5 0 01.5.5c0 1.15.837 2 1.772 2s1.773-.85 1.773-2a.5.5 0 01.5-.5h1.36a608.16 608.16 0 001.139-3.688c.312-1.027.623-2.07.857-2.888.116-.41.212-.76.279-1.023a7.927 7.927 0 00.09-.404L18 7.99A1 1 0 0017 7c-.017 0-.033 0-.05-.002a1.75 1.75 0 01-3.45-.415V5.75a1.75 1.75 0 113.5 0V6a2 2 0 012 2c0 .093-.021.205-.038.288-.02.099-.05.22-.085.358-.07.278-.17.639-.287 1.052-.235.827-.549 1.876-.862 2.904A474.015 474.015 0 0116.68 16H17a.5.5 0 01.5.5 5.5 5.5 0 01-4.98 5.476C12.75 24.807 15.02 27 17.75 27c2.88 0 5.25-2.442 5.25-5.5v-1.035a3.501 3.501 0 111 0V21.5c0 3.57-2.778 6.5-6.25 6.5-3.315 0-5.998-2.672-6.233-6.02A5.5 5.5 0 016.5 16.5.5.5 0 017 16h.32a495.395 495.395 0 01-1.048-3.398 183.988 183.988 0 01-.862-2.904 38.924 38.924 0 01-.287-1.052 8.747 8.747 0 01-.085-.358A1.534 1.534 0 015 8a2 2 0 012-2v-.25zM16.473 17a4.5 4.5 0 01-8.946 0h.461a.45.45 0 00.023 0h1.255c.218 1.388 1.325 2.5 2.734 2.5 1.41 0 2.516-1.112 2.734-2.5H16.472zM26 17a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM15.25 5a.75.75 0 00-.75.75v.833a.75.75 0 001.5 0V5.75a.75.75 0 00-.75-.75zm7.998 11.568a.5.5 0 10-.504-.864 1.5 1.5 0 102.049 2.057.5.5 0 10-.862-.508.5.5 0 11-.683-.685z" fill="#585163">
                                        </path>
                                    </svg>
                                </div>
                                <p class="iconCategoryCardTitle eds-text-weight--heavy">Health</p>
                            </div>
                        </button>
                    </form>
                    @endforeach
                </a>
                <a data-testid="category-card" data-heap-id="homepage-category-tiles">
                    @foreach ($workshops as $category)
                    <form action="{{route('filtre', $category->id)}}">
                        <button type="submit" class="iconCategoryCard flex flex-col justify-center items-center">
                            <div class="iconCategoryCard">
                                <div class="iconCategoryCardImageWrapper">
                                    <svg width="32" height="33" fill="none" viewBox="0 0 32 33"><g id="buisness-profession_svg__icon_selection"><path id="buisness-profession_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M15.002 5.936L15 6.01v.493h2V6.01l-.002-.073a1 1 0 00-1.996 0zM18 6.502h9.5a.5.5 0 010 1H27v16h.5a.5.5 0 110 1h-3.172l.046.046.006.005.006.007.067.072.011.012a2 2 0 01-2.833 2.813l-.01-.01-.065-.06-.006-.007-.004-.003-2.875-2.875H13.41l-2.873 2.874-.01.01-.065.061-.01.01a2 2 0 01-2.834-2.813l.011-.012.068-.072.011-.012.046-.046H4.5a.5.5 0 010-1H5v-16h-.5a.5.5 0 010-1H14v-.514l.003-.089v-.014a2 2 0 013.994 0v.014l.003.089v.514zm-12 1v16h20v-16H6zm16.914 17h-2.828l2.162 2.162.053.05a1 1 0 001.416-1.405l-.055-.06-.748-.747zm-10.919 0H9.167l-.747.747-.056.06a1 1 0 001.416 1.405l.054-.05 2.161-2.162zM8.145 9.65a.5.5 0 01.355-.147h6a.5.5 0 01.5.496l.04 5.5a.5.5 0 11-1 .008l-.036-5.004H9.002l.036 10h5.002v-2a.5.5 0 111 0v2.5a.5.5 0 01-.5.5h-6a.5.5 0 01-.5-.498l-.04-11a.5.5 0 01.146-.355zM17 18.002a.5.5 0 100 1h6.5a.5.5 0 000-1H17zm-.5-2.5a.5.5 0 01.5-.5h5.5a.5.5 0 110 1H17a.5.5 0 01-.5-.5zm.5-3.5a.5.5 0 100 1h6.5a.5.5 0 000-1H17z" fill="#3A3247"></path></g>
                                    </svg>
                                </div>
                                <p class="iconCategoryCardTitle eds-text-weight--heavy">{{$category->category_name}}</p>
                            </div>
                        </button>
                    </form>
                    @endforeach
                </a>
                <a data-testid="category-card" data-heap-id="homepage-category-tiles">
                    @foreach ($food as $category)
                    <form action="{{route('filtre', $category->id)}}">
                        <button type="submit" class="iconCategoryCard flex flex-col justify-center items-center">
                            <div class="iconCategoryCard">
                                <div class="iconCategoryCardImageWrapper">
                                    <svg width="40" height="41" fill="none" viewBox="0 0 40 41"><g id="food-drink_svg__icon_selection"><path id="food-drink_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M26.76 5.014a.625.625 0 01.721.462l1.444 5.777h5.45a.625.625 0 01.623.67l-1.659 22.5a.625.625 0 01-.623.58H21.66a.625.625 0 01-.624-.58l-.033-.457-.23.085c-1.667.595-3.928.951-6.397.951-2.468 0-4.73-.356-6.397-.951-.831-.297-1.548-.665-2.068-1.105C5.392 32.51 5 31.94 5 31.252c0-.528.234-.99.575-1.37l8.234-17.644a.625.625 0 011.132 0l5.295 11.345-.86-11.66a.625.625 0 01.624-.67h7.637L26.41 6.35l-9.42 1.766a.625.625 0 11-.231-1.228l10-1.875zm1.19 7.489h-7.277l.23 3.125H22.5a.625.625 0 110 1.25h-1.505l.72 9.768a.629.629 0 010 .104l1.461 3.133c.341.38.574.842.574 1.37 0 .686-.392 1.256-.91 1.693a4.752 4.752 0 01-.628.443l.027.363h9.896l1.245-16.874h-7.13a.625.625 0 110-1.25h2.48l-.78-3.125zm5.752 0l-.23 3.125H30c0-.05-.006-.101-.019-.152l-.743-2.973h4.464zM7.275 29.195L6.666 30.5a.626.626 0 01-.116.17c-.234.241-.3.437-.3.583 0 .177.098.429.466.74.365.307.93.613 1.682.881 1.5.536 3.613.88 5.977.88 2.364 0 4.477-.344 5.977-.88.753-.268 1.317-.574 1.682-.882.368-.31.466-.562.466-.739 0-.146-.066-.341-.299-.583a.625.625 0 01-.116-.17l-1.24-2.656a3.765 3.765 0 01-2.55.13 3.765 3.765 0 01-.631-6.946l-3.289-7.046-.626 1.341a3.763 3.763 0 01-3.046 6.526l-.932 1.999a3.77 3.77 0 012.778.418 3.763 3.763 0 11-5.274 4.93zm.857-1.838a2.514 2.514 0 002.508 2.664 2.512 2.512 0 10-1.727-4.336l-.78 1.672zm10.062-5.195l2.121 4.546a2.503 2.503 0 01-1.656.068 2.513 2.513 0 01-.465-4.614zm-6.924-1.527a2.512 2.512 0 001.913-4.1l-1.913 4.1z" fill="#39364F"></path></g>
                                    </svg>
                                </div>
                                <p class="iconCategoryCardTitle eds-text-weight--heavy">Gastronomie</p>
                            </div>
                        </button>
                    </form>
                    @endforeach
                </a>
            </div>
        </section>
    </div>
    @endrole

    @if(isset($events))

    <div class="home-category_tiles_block_component__wrapper">
        <div class="home-category_tiles_block_component__tiles">
            @foreach($events as $event)
            <div class="home-category_tile_component__root">
                <div class="home-category_tile_component__tileDetail">
                  <h2>
                    <a class="home-category_tile_component__tileTitle" title="View After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: link&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}"><p>{{$event->titre}}</p></a>
                  </h2>
              
                  <p class="home-category_tile_component__tileSubtitle">{{$event->organisateurs->name}}</p>
              
                  <a class="home-category_tile_component__tileLink" title="Newest After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: newest&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}">total places: {{$event->places_number}}</a>
                  <a class="home-category_tile_component__tileLink" title="Bestselling After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: bestsellers&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}">{{$event->category->category_name}}</a>
                  @foreach($reservetionCount as $reservations)
                    <a >Nombre des places restant: {{$event->places_number - $reservations->reservation_count}}</a>
                  @endforeach
                </div>
                <a class="home-category_tile_component__tileArt" title="View After Effects" href="{{route('showDetails', $event->id)}}">
                  <div class="home-category_tile_component__imageIconWrapper">
                    <picture class="home-category_tile_component__imageWrapper" style="max-height: 200px">
                      <img src="{{asset(''. $event->image)}}">
                    </picture>
                    <div class="home-category_tile_component__tileIcon">
                      <img alt="Avatar" width="64" height="64" loading="lazy" src="{{asset(''. $event->organisateurs->avatar)}}">
                    </div>
                  </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div>No result</div>
    @endif
    <div class="flex items-center justify-center"> {{$events->links()}} </div>

    <div>
        
    </div>

    <x-footer/>

</x-app-layout>