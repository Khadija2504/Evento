<x-app-layout>

    <div class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="pt-24">
            <div class=" text-center container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
              
              <div class=" ml-20 text-yellow-50 text-4xl">Statistics</div>
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
                    d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                </path>
                </g>
              </g>
            </svg>
          </div>
        </div>

    <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
        <h4 class="text-xl text-gray-900 font-bold">Statistics</h4>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-4">
            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-sm text-indigo-600">Valid events</span>
                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">New</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl 2xl:text-3xl font-bold">{{$validEvents}}</span>
                            <div class="flex items-center ml-2 mb-1">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-sm text-green-600">Available events</span>
                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">New</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl 2xl:text-3xl font-bold">{{$availableEvents}}</span>
                            <div class="flex items-center ml-2 mb-1">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-sm text-blue-600">Users Count</span>
                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">New</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-2.5 bg-blue-400 bg-opacity-20 rounded-full text-blue-600 border border-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl 2xl:text-3xl font-bold">{{$usersCount}}</span>
                            <div class="flex items-center ml-2 mb-1">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-sm text-indigo-600">invalid events</span>
                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">New</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl 2xl:text-3xl font-bold">{{$invalidEvents}}</span>
                            <div class="flex items-center ml-2 mb-1">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-sm text-green-600">Unavailable events</span>
                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">New</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl 2xl:text-3xl font-bold">{{$unavailableEvents}}</span>
                            <div class="flex items-center ml-2 mb-1">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <canvas id="verticalBarChart" style="display: block; box-sizing: border-box; height: 494.4px; width: 991.2px;" width="1239" height="618"></canvas>
        </div>
    </div>

<x-footer/>

</x-app-layout>