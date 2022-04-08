<!-- component -->
<div class="w-1/2 mx-auto mt-4 rounded">
    <!-- Tabs -->
    <div class="flex justify-center">
        <ul id="tabs" class="inline-flex w-full px-1 pt-2 justify-between">
        <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Tweets</a></li>
        <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Retweets</a></li>
        <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Likes</a></li>
        </ul>
    </div>
    <!-- Tab Contents -->
    <div id="tab-contents">
      <div id="first" class="p-4">
        @forelse ($tweets as $tweet)
            @include('_tweet')
        @empty
            <p class="p-4">No tweets yet.</p>
        @endforelse
      </div>
      <div id="second" class="hidden p-4">
        @forelse ($retweets as $tweet)
        @include('_tweet')
        @empty
        <p class="p-4">No retweets yet.</p>
        @endforelse
      </div>
      <div id="third" class="hidden p-4">
        @forelse ($likes as $tweet)
        @include('_tweet')
        @empty
        <p class="p-4">No likes yet.</p>
        @endforelse
      </div>
    </div>
  </div>

<script>
let tabsContainer = document.querySelector("#tabs");

let tabTogglers = tabsContainer.querySelectorAll("a");
console.log(tabTogglers);

tabTogglers.forEach(function(toggler) {
toggler.addEventListener("click", function(e) {
e.preventDefault();

let tabName = this.getAttribute("href");

let tabContents = document.querySelector("#tab-contents");

for (let i = 0; i < tabContents.children.length; i++) {

tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
if ("#" + tabContents.children[i].id === tabName) {
continue;
}
tabContents.children[i].classList.add("hidden");

}
e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
});
});

document.getElementById("default-tab").click();

</script>