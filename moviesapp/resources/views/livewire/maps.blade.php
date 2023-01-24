<div class="p-4" x-data="{ from: '', to: '', loadSize: '', deliveryType: '' }">
    <div class="flex flex-col md:flex-row">
      <div class="w-full md:w-1/10">
        <div id="map" class="rounded-lg shadow-lg"></div>
      </div>
      <div class="w-full md:w-9/10 pl-4">
        <form class="bg-white rounded-lg p-6 shadow-lg">
          <div class="mb-4">
            <label class="block text-gray-800 font-medium">From</label>
            <select x-model="from" class="bg-gray-200 p-2 text-gray-800">
              <option value="1">Location 1</option>
              <option value="2">Location 2</option>
              <option value="3">Location 3</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-800 font-medium">To</label>
            <select x-model="to" class="bg-gray-200 p-2 text-gray-800">
              <option value="1">Location 1</option>
              <option value="2">Location 2</option>
              <option value="3">Location 3</option>
            </select>
          </div>
          <div class="mb-4" x-show="from && to">
            <label class="block text-gray-800 font-medium">Load Size</label>
            <div class="relative">
              <div class="relative">
                <select x-model="loadSize" class="bg-gray-200 p-2 text-gray-800">
                  <option value="small">Small</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>
            <label class="block text-gray-800 font-medium mt-4">Delivery Type</label>
            <div class="tabs">
              <ul>
                <li class="mr-1" x-bind:class="{ 'bg-green-500 text-white': loadSize === 'small' }">
                  <a href="#small-delivery" x-on:click="loadSize = 'small'">Small</a>
                </li>
                <li class="mr-1" x-bind:class="{ 'bg-green-500 text-white': loadSize === 'medium' }">
                  <a href="#medium-delivery" x-on:click="loadSize = 'medium'">Medium</a>
                </li>
                <li x-bind:class="{ 'bg-green-500 text-white': loadSize === 'large' }">
                  <a href="#large-delivery" x-on:click="loadSize = 'large'">Large</a>
                </li>
              </ul>
            </div>
            <div id="small-delivery" class="mt-4" x-show="loadSize === 'small'">
              <div class="flex items-center mb-2" x-bind:class="{ 'bg-green-500 text-white': deliveryType === 'bike' }">
                <svg class="fill-current h-6 w-6 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.34 15.66A7.97 7.97 0 0 0 9 17.94V10H5V8h4V5.83a3 3 0 1 1 2 0V8h4v2h-4v7.94a7.97 7.97 0 0 0 4.66-2.28l-1.42-1.42h5.66l-2.83 2.83a10 10 0 0 1-14.14 0L.1 14.24h5.66l-1.42 1.42zm6.56-6.56a3 3 0 0 1 4.24 0l2.83-2.83a3 3 0 0 1-4.24-4.24l-2.83 2.83z"/></svg>
                <span class="text-gray-800" x-on:click="deliveryType = 'bike'">Bike</span>
                <span class="ml-2 text-gray-600">$5.00</span>
              </div>
              <div class="flex items-center mb-2" x-bind:class="{ 'bg-green-500 text-white': deliveryType === 'tuktuk' }">
                <svg class="fill-current h-6 w-6 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.34 15.66A7.97 7.97 0 0 0 9 17.94V10H5V8h4V5.83a3 3 0 1 1 2 0V8h4v2h-4v7.94a7.97 7.97 0 0 0 4.66-2.28l-1.42-1.42h5.66l-2.83 2.83a10 10 0 0 1-14.14 0L.1 14.24h5.66l-1.42 1.42zm6.56-6.56a3 3 0 0 1 4.24 0l2.83-2.83a3 3 0 0 1-4.24-4.24l-2.83 2.83z"/></svg>
                <span class="text-gray-800" x-on:click="deliveryType = 'tuktuk'">Tuk Tuk</span>
                <span class="ml-2 text-gray-600">$10.00</span>
              </div>
              <div class="flex items-center mb-2" x-bind:class="{ 'bg-green-500 text-white': deliveryType === 'lorry' }">
                <svg class="fill-current h-6 w-6 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18 18H2V2h16v16zm-4-8c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0-4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm-4-4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 8c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg>
                <span class="text-gray-800" x-on:click="deliveryType = 'lorry'">Lorry</span>
                <span class="ml-2 text-gray-600">$15.00</span>
              </div>
            </div>
            <div id="medium-delivery" class="mt-4" x-show="loadSize === 'medium'">
              <!-- Delivery options and prices for medium package -->
            </div>
            <div id="large-delivery" class="mt-4" x-show="loadSize === 'large'">
              <!-- Delivery options and prices for large package -->
            </div>
          </div>
          <div class="text-center" x-show="from && to">
            <button class="bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <script>
        function initMap() {
            var location = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
</div>

      <script>
        function initMap() {
            var location = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
      </script>
      <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
      </script>
  <script>
    function initMap() {
        var location = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
  </script>
